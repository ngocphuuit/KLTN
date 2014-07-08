<?php
Class AdminPostProController extends BaseController{
	
	public function showCate(){
		$listcat = Product::product_cat();
		$listmanu = Product::product_manu();
		return View::make('admin/postproduct')
				->with('listcat',$listcat)
				->with('listmanu',$listmanu);
	}
	public static function insertProduct()
    {
        $id = Product::select('product_id')->orderBy('product_id','desc')->first();
    	$idimg = $id['product_id']+1;

		 if (Input::hasFile('image')) {
		        $file            = Input::file('image');
		        $sfilnames=md5(time().rand()).'.jpg';
                //$extension       = $file->getClientOriginalExtension();
                //$folderName      = str_random(12);
                $destinationPath = 'public/uploads/product';
                $file->move($destinationPath, $sfilnames);
		    }
		    	 DB::table('products')
        		->insertGetId(array(
        		"product_name"=>Input::get("product_name"),
			    "cost"	=>Input::get("cost"),
			    "vat"	=>Input::get("vat"),
				"product_des"=>Input::get("product_des"),
				"product_details"=>Input::get("product_details"),
				"category_id"=>Input::get("category_id"),
				"manufactory_id"=>Input::get("manufactory_id"),
				"number"=>Input::get("number"),
				"invent"=>0,
				"product_views"=>0,
				'img_url'=>$sfilnames
        ));
        		return Redirect::to('admin/product');
    }
    public static function insertPost()
    {

		 if (Input::hasFile('image')) {
		         $file            = Input::file('image');
		        $sfilnames=md5(time().rand()).'.jpg';
                //$extension       = $file->getClientOriginalExtension();
                //$folderName      = str_random(12);
                $destinationPath = 'public/uploads/slide';
                $file->move($destinationPath, $sfilnames);
		    }
			date_default_timezone_set('Asia/Ho_Chi_Minh');
			$date = date('Y-m-d H:i:s');
		    DB::table('news_post')
        		->insertGetId(array(
        		"username"=>Session::get('user'),
			    "post_date"	=>$date,
			    "post_content"	=>Input::get("post_content"),
				"post_title"=>Input::get("post_title"),
				"post_guid"=>0,
				'slide'=>$sfilnames
        ));
        		return Redirect::to('admin/post_news');
    }

    public function showProduct(){
    	$infor=Users::where('username',Session::get('user'))->get();
		$showProduct = Product::showProduct();
		$showNews=Product::showNews();
		$showphone=Product::showphone();
		$showcompu=Product::showcompu();
		$showfollow=Users::showfollow();
		$showarticle=Articles::five_articles();
		$shownew = DB::table('news_post')->orderBy('post_id','desc')->take(5)->get();
		return View::make('index')
				->with('infor',$infor)
				->with('showphone',$showphone)
				->with('showarticle',$showarticle)
				->with('showfollow',$showfollow)
				->with('showcompu',$showcompu)
				->with('product',$showProduct)
				->with('news',$showNews)
				->with('shownew',$shownew)
				->with('tieude','Trang chủ')
				->with('title','Website mua bán mà kết nối người dùng');
		;
	}
	public function showAll(){
    	$infor=Users::where('username',Session::get('user'))->get();
		$showProduct = Product::showAllProduct();
		$showNews=Product::showNews();
		$showfollow=Users::showfollow();
		$showarticle=Articles::five_articles();
		$shownew = DB::table('news_post')->orderBy('post_id','desc')->take(5)->get();
		return View::make('product/all')
				->with('infor',$infor)
				->with('showarticle',$showarticle)
				->with('showfollow',$showfollow)
				->with('product',$showProduct)
				->with('news',$showNews)
				->with('shownew',$shownew)
				->with('tieude','Trang chủ')
				->with('title','Website mua bán mà kết nối người dùng');
		;
	}
	public function showPhone(){
    	$infor=Users::where('username',Session::get('user'))->get();
		$showAllphone = Product::showAllphone();
		$showProduct = Product::showProduct();
		$showNews=Product::showNews();
		$showfollow=Users::showfollow();
		$showarticle=Articles::five_articles();
		$shownew = DB::table('news_post')->orderBy('post_id','desc')->take(5)->get();
		return View::make('product/phone')
				->with('infor',$infor)
				->with('showarticle',$showarticle)
				->with('showfollow',$showfollow)
				->with('showphone',$showAllphone)
				->with('product',$showProduct)
				->with('news',$showNews)
				->with('shownew',$shownew)
				->with('tieude','Trang chủ')
				->with('title','Website mua bán mà kết nối người dùng');
		;
	}
	public function showLap(){
    	$infor=Users::where('username',Session::get('user'))->get();
		$showAllphone = Product::showAllphone();
		$showAllcompu = Product::showAllcompu();
		$showNews=Product::showNews();
		$showfollow=Users::showfollow();
		$showarticle=Articles::five_articles();
		$shownew = DB::table('news_post')->orderBy('post_id','desc')->take(5)->get();
		return View::make('product/lap')
				->with('infor',$infor)
				->with('showarticle',$showarticle)
				->with('showfollow',$showfollow)
				->with('showcompu',$showAllcompu)
				->with('news',$showNews)
				->with('shownew',$shownew)
				->with('tieude','Trang chủ')
				->with('title','Website mua bán mà kết nối người dùng');
		;
	}
	public function allnews(){
		$news = DB::table('news_post')->orderBy('post_id','desc')->orderBy('post_id','desc')->get();
		return View::make('admin/tables/news')
						->with('news',$news);
	}
	public function editnews($id){
		$news = DB::table('news_post')->where('post_id',$id)->get();
		return View::make('admin.post_news')
					->with('infor',$news);
	}
	public function updatenews(){
		$date = date('Y-m-d H:i:s');
		DB::table('news_post')
		->where('post_id',Input::get('post_id'))
		->update(array(
        		"username"=>Session::get('user'),
			    "post_date"	=>$date,
			    "post_content"	=>Input::get("post_content"),
				"post_title"=>Input::get("post_title"),
				"post_guid"=>0
				));
		return Redirect::to('admin/news');
	}
	public function showNews(){
		$showNews=Product::showNews();
		$infor=Users::where('username',Session::get('user'))->get();
		$showfollow=Users::showfollow();
		$showarticle=Articles::five_articles();
		return View::make('list_news')
				->with('infor',$infor)
				->with('title','Tin tức')
				->with('tieude','Tin tức')
				->with('showarticle',$showarticle)
				->with('showfollow',$showfollow)
				->with('news',$showNews);
		;
	}
	public function showNewsDetails($post_id){
		$showNews=Product::showNewsDetails($post_id);
		$infor=Users::where('username',Session::get('user'))->get();
		return View::make('news')
				->with('infor',$infor)
				->with('title','Tin tức')
				->with('tieude','Tin tức')
				->with('news',$showNews);
		;
	}
	public function showProductDetail($product_id){
		$showProduct = Product::showProductDetail($product_id);
		$infor=Users::where('username',Session::get('user'))->get();
		$shownew = DB::table('news_post')->orderBy('post_id','desc')->take(5)->get();
		$showarticle=Articles::five_articles();
		$showcomment = DB::table('product_comments')
							->join('user','user.user_id','=','product_comments.user_id')
							->where('product_id',$product_id)
							->orderBy('comment_id','desc')
							->get();
		return View::make('product/productDetail')
				->with('infor',$infor)
				->with('title','Thông tin sản phẩm')
				->with('tieude','Thông tin')
				->with('showarticle',$showarticle)
				->with('shownew',$shownew)
				->with('product',$showProduct)
				->with('showcomment',$showcomment);
		;
	}
	public function save(){
		$id = Articles::select('art_id')->orderBy('art_id','desc')->first();
    	$idimg = $id['art_id']+1;
            $input = Input::all();
            $rules = array(
            'file' => 'image|max:3000',
        );

        $validation = Validator::make($input, $rules);

        if ($validation->fails())
        {
            return Response::make($validation->errors->first(), 400);
        }

        $file = Input::file('file');
                    $fileName        = $file->getClientOriginalName();
                    $extension       = $file->getClientOriginalExtension();
                    $folderName      = str_random(12);
                    $destinationPath = 'uploads/' . $idimg;
                    $file->move($destinationPath, $fileName);
                    DB::table('article_img')->insert(array(
                    		'art_id'=>$idimg,
                    		'filename'=>$fileName
                    	));
	}
	public function comments(){
		$input = Input::get('comment');
		$date = date('Y-m-d H:i:s');
		DB::table('product_comments')->insert(array(
					'user_id'=>Users::where('username',Session::get('user'))->pluck('user_id'),
					'product_id'=>Input::get('product_id'),
					'date_comment'=>$date,
					'comment'=>Input::get('comment')
			));
		return View::make('product/comment_product')
					->with('comments',$input)
					->with('infor_user',Users::where('username',Session::get('user'))->get())
					->with('date',$date);
	}
	//update product
	public function fixProduct($p_id){
		$fixProduct=Product::fixProduct($p_id);
		$infor=Users::where('username',Session::get('user'))->get();
		$listcat = Product::product_cat();
		$listmanu = Product::product_manu();;
		return View::make('admin/tables/fixproduct')
				->with('listcat',$listcat)
				->with('listmanu',$listmanu)
				->with('infor',$infor)
				->with('title','Tin tức')
				->with('tieude','Tin tức')
				->with('fixProduct',$fixProduct);
		;
	}
	//block
	public static function blockProduct($b_id){
		DB::table('products')
		->where('product_id',$b_id)
		->update(array(
                "invent"=>1
                ));
		return Redirect::to('admin/product');
	}
	public static function unblockProduct($b_id){
		DB::table('products')
		->where('product_id',$b_id)
		->update(array(
                "invent"=>0
                ));
		return Redirect::to('admin/product');
	}
	 public static function productUpdate()
    {
		Product::updateProduct();
        return Redirect::to('admin/product');
    }
    //order delive
	public static function deliveProduct($b_id){
		date_default_timezone_set('Asia/Ho_Chi_Minh');
		$date = new DateTime('today');
		DB::table('order')
		->where('order_id',$b_id)
		->update(array(
                "delivered"=>2,
                "date_ship"=>$date
                ));
		return Redirect::to('admin/order');
	}
}