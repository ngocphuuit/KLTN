<?php
Class Articles extends Eloquent{
	 protected $guarded = array(
        'id'
    );

	protected $table = 'articles';
	public $timestamps = false;
	//hien thi tat ca san pham
	public static $rules = array(
        'file' => 'mimes:jpeg,bmp,png|max:3000'
    );

    /**
     * Validate image method.
     *
     * @param  file $data
     * @return object Validator
     */
    public static function validateImage($data)
    {
        return Validator::make($data, static::$rules);
    }

	public static function all_articles(){
		return Articles::join('user',"articles.user_id","=","user.user_id")
							->join('product_category','articles.categori_id','=','product_category.category_id')
							->orderBy("art_id")
							->get();
	}
	//chon 5 sản phẩm mới nhất
	public static function five_articles(){
		return Articles::join('user',"articles.user_id","=","user.user_id")
							->join('product_category','articles.categori_id','=','product_category.category_id')
							->orderBy("art_id",'desc')
							->skip(0)
							->take(5)
							->get();
	}
	//show tất cả sản phẩm theo username
	public static function show_all($username){
		return Articles::join('user',"articles.user_id","=","user.user_id")
							->where('articles.user_id',DB::table('user')
								->where('username',$username)
								->pluck('user_id'))
							->get();
	}
	// đếm xem mỗi sản phẩm của user có bao nhiêu đánh giá.
	public static function count_vote($username){
			return Articles::select(array('articles.art_id',(DB::raw('count(article_votes.vote) as soluong'))))
								->join('article_votes','articles.art_id','=','article_votes.art_id')
								->where('articles.user_id',DB::table('user')
									->where('username',$username)
									->pluck('user_id'))
								->groupBy('article_votes.art_id')
								->get();
	}
	//
	public static function showallvote(){
		$data = Votes::select('art_id')->get();
		$array = $data->toArray();
		return $arrays = array_pluck($array,'art_id');
	}
	//dem good vote
	public static function count_good_vote(){
		return Votes::select(array('art_id',(DB::raw('count(vote) as goodvote'))))
						->where('vote',1)
						->groupBy('art_id')
						->get();
	}
	//chon tat ca cac good vote
	public static function all_good_vote(){
		$data = Votes::select('art_id')->where('vote',1)->get();
		$array = $data->toArray();
		return $arrays = array_pluck($array,'art_id');
	}
	//
	public static function show_all_articles($username){
		return Articles::join('user',"articles.user_id","=","user.user_id")
							->whereIn('articles.user_id',function($query) use ($username){
								$query->select('user_id')
											->from('user_follow')
											->where('follow_by_user',User::where('username',$username)->pluck('user_id'))
											->get();
							})
							->orWhere('articles.user_id',User::where('username',$username)->pluck('user_id'))
							->orderBy('articles.art_id', 'desc')
							->get();
	}
	//show comment
	public static function showcomment(){
		return DB::table('article_comments')->join('user','user.user_id','=','article_comments.user_id')->get();
	}
	public static function showArticle($id){
		return Articles::join('user',"articles.user_id","=","user.user_id")
					   ->join('product_category','articles.categori_id','=','product_category.category_id')
					   ->join('province','articles.province_id','=','province.province_id')
					   ->where('art_id',$id)->get();
	}
	//report
	public static function countpost($username){
        return Articles::where('user_id',DB::table('user')->where('username',$username)->pluck('user_id'))->count();
    }
	public static function showcount(){
		return Articles::select(array('user_id',(DB::raw('count(*) as number'))))
							->groupBy('user_id')
							->get();
	}
	//xem san pham da dang kys mua
	public static function registerbuy($username){
		return Articles::join('user',"articles.user_id","=","user.user_id")
						->join('register_buy','articles.art_id','=','register_buy.art_id')
						->where('userregister_id',User::where('username',$username)->pluck('user_id'))
						->get();
	}
	// article category
	public static function article_cat(){
		return DB::table('article_categories')->orderBy('art_cat_id','desc')->get();
	}
	// show notification comment
	public static function notification(){
		return DB::table('article_comments')->join('articles','articles.art_id','=','article_comments.art_id')
		->join('user','user.user_id','=','article_comments.user_id')
		->whereIN('article_comments.art_id',function($query){
			$query -> select('art_id')
					->from('articles')
					->where('user_id',Users::where('username',Session::get('user'))->pluck('user_id'))
					->get();
		})
		->where('article_comments.user_id','<>',Users::where('username',Session::get('user'))->pluck('user_id'))
		->where('notification',1)
		->get();
	}
	//lay hinh anh
	public static function get_image($username){
		$id = Users::where('username',$username)->pluck('user_id');
		return Articles::join('article_img','articles.id_img','=','article_img.id_img')->where('user_id',$id)->skip(0)->take(6)->get();
	}
	public static function show_share($username){
		return DB::table('share')->join('articles','articles.art_id','=','share.art_id')
								 ->join('product_category','product_category.category_id','=','articles.categori_id')
									->where('share.user_id',Users::where('username',Session::get('user'))->pluck('user_id'))
									->orderBy('date_share','desc')
									->get();
	}

	public static function showAllSearch(){
		return DB::table('articles')
				->join('user',"articles.user_id","=","user.user_id")
				->join('product_category','articles.categori_id','=','product_category.category_id')
				->join('province',"articles.province_id","=","province.province_id")
				->where('categori_id',Input::get('loai'))
				->where('articles.province_id',Input::get('diadiem'))
				->whereBetween('art_cost', array(Input::get('tugia'),Input::get('dengia')))
                ->get();
	}
	public static function showKeySearch(){
		return DB::table('articles')
							->join('user',"articles.user_id","=","user.user_id")
							->join('product_category','articles.categori_id','=','product_category.category_id')
							->join('province',"articles.province_id","=","province.province_id")
							->where('articles.art_title','LIKE','%'.Input::get('keyword').'%')
                			->get();
	}

	//gioi thieu theo tim kiem
	public static function sum_all_search(){
		return DB::table('count_search')->where('username',Session::get('user'))->sum('count_search');
	}
	//chon theo tinh thanh, loai sarn pham, gia ca
	public static function first_search(){
		return DB::table('count_search')->where('username',Session::get('user'))->orderBy('count_search','desc')->first();
	}
	//chon theo tinh thanh, loai san pham
}