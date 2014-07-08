 <?php
Class Product extends Eloquent{
	 protected $guarded = array(
        'id'
    );

	protected $table = 'products';

	public $timestamps = false;

	public static function product_cat(){
		return DB::table('product_category')->orderBy('category_id','desc')->get();
	}
	public static function product_manu(){
		return DB::table('product_manufactory')->orderBy('manufactory_id','desc')->get();
	}
	public static function showProduct(){
		return DB::table('products')
		->join('product_category','products.category_id','=','product_category.category_id')
		->join('product_manufactory','products.manufactory_id','=','product_manufactory.manufactory_id')
		->orderBy('product_id','desc')->take(9)->skip(0)->get();
	}
	public static function showProductAd(){
		return DB::table('products')
		->join('product_category','products.category_id','=','product_category.category_id')
		->join('product_manufactory','products.manufactory_id','=','product_manufactory.manufactory_id')
		->orderBy('product_id','desc')->take(4)->skip(0)->get();
	}
	public static function showAllProduct(){
		return DB::table('products')
		->join('product_category','products.category_id','=','product_category.category_id')
		->join('product_manufactory','products.manufactory_id','=','product_manufactory.manufactory_id')
		->orderBy('product_id','desc')->get();
	}
	public static function showphone(){
		return DB::table('products')
		->join('product_category','products.category_id','=','product_category.category_id')
		->join('product_manufactory','products.manufactory_id','=','product_manufactory.manufactory_id')
		->where('products.category_id',1)->orderBy('product_id','desc')->take(6)->skip(0)->get();
	}
	public static function showAllphone(){
		return DB::table('products')
		->join('product_category','products.category_id','=','product_category.category_id')
		->join('product_manufactory','products.manufactory_id','=','product_manufactory.manufactory_id')
		->where('products.category_id',1)->orderBy('product_id','desc')->get();
	}
	public static function showcompu(){
		return DB::table('products')
		->join('product_category','products.category_id','=','product_category.category_id')
		->join('product_manufactory','products.manufactory_id','=','product_manufactory.manufactory_id')
		->where('products.category_id',3)->orderBy('product_id','desc')->take(6)->skip(0)->get();
	}
	public static function showAllcompu(){
		return DB::table('products')
		->join('product_category','products.category_id','=','product_category.category_id')
		->join('product_manufactory','products.manufactory_id','=','product_manufactory.manufactory_id')
		->where('products.category_id',3)->orderBy('product_id','desc')->get();
	}
	public static function showNews(){
		$per_page=6;
		return DB::table('news_post')
		->orderBy('post_id','desc')->paginate($per_page);
	}
	public static function showNewsDetails($post_id){
		return DB::table('news_post')
		->where('post_id',$post_id)
		->orderBy('post_id','desc')->take(5)->skip(0)->get();
	}
	public static function showProductDetail($product_id){
		return DB::table('products')
		->where('product_id',$product_id)
		->orderBy('product_id','desc')->take(5)->skip(0)->get();
	}
	public static function showAlbums($username){
		return DB::table('article_img')
		->join('articles','articles.id_img','=','article_img.id_img')
		->join('user','user.user_id','=','articles.user_id')
		->join('product_category','product_category.category_id','=','articles.categori_id')
		->where('username',$username)
		->orderBy('art_img_id','desc')->get();
	}
	//fix product
	public static function fixProduct($p_id){
		return DB::table('products')
		->join('product_category','products.category_id','=','product_category.category_id')
		->join('product_manufactory','products.manufactory_id','=','product_manufactory.manufactory_id')
		->where('product_id',$p_id)
		->get();
	}
	 public static function updateProduct()
    {
            return DB::table('products')
                ->where('product_id',Input::get('product_id'))
                ->update(array(
                "product_name"=>Input::get("product_name"),
			    "cost"	=>Input::get("cost"),
			    "vat"	=>Input::get("vat"),
				"product_des"=>Input::get("product_des"),
				"product_details"=>Input::get("product_details"),
				"category_id"=>Input::get("category_id"),
				"manufactory_id"=>Input::get("manufactory_id"),
				"number"=>Input::get("number"),
				"invent"=>0,
				"product_views"=>0
        ));
    }
    public static function show_articles(){
    	return Articles::join('product_category','product_category.category_id','=','articles.categori_id')
    	->where('tinhtrang',1)->orderBy('daxem','desc')->take(5)->get();
    }
}