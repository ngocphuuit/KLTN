<?php
Class ArticlesController extends BaseController{
	public $_count;
	public function __construct(){
		$this->_count = DB::table("user")->where("username","=",Input::get("txtuser"))
									  ->where("password","=",Input::get("txtpass"))
									  ->count();
	}
	public function showArticles($mathang){
		$info = DB::table('user')->where('username',Session::get('user'))->get();
		$per_page=10;
		$listcat = Product::product_cat();
		$showProductAd = Product::showProductAd();
		$listmanu = Product::product_manu();
		$showart = Product::show_articles();
		if($mathang == 'all')
		{
			return View::make('product.ClassifiedAd')
						->with('tieude','Rao vặt')
						->with('title','Trang Rao Vặt')
						->with('info',Articles::join('user',"articles.user_id","=","user.user_id")
							->join('product_category','articles.categori_id','=','product_category.category_id')
							->where('private',0)
							->where('tinhtrang',1)
							->orderBy("art_id",'desc')
							->paginate($per_page))
						->with('artcat',Articles::article_cat())
						->with('procat',Product::product_cat())
						->with('listcat',$listcat)
						->with('listmanu',$listmanu)
						->with('showart',$showart)
						->with('showProductAd',$showProductAd)
						->with('area',Users::province())
						->with('infor',$info);
		}
		else{
			return View::make('product.ClassifiedAd')
						->with('tieude','Rao vặt')
						->with('title','Trang Rao Vặt')
						->with('info',Articles::join('user',"articles.user_id","=","user.user_id")
							->join('product_category','articles.categori_id','=','product_category.category_id')
							->where('private',0)
							->where('tinhtrang',1)
							->where('category_name',$mathang)
							->orderBy("art_id",'desc')
							->paginate($per_page))
						->with('artcat',Articles::article_cat())
						->with('procat',Product::product_cat())
						->with('listcat',$listcat)
						->with('listmanu',$listmanu)
						->with('showart',$showart)
						->with('showProductAd',$showProductAd)
						->with('area',Users::province())
						->with('infor',$info);
		}
	}
	public function ArticleDetail($mathang,$id){
		//vote san pham
		$info = DB::table('user')->where('username',Session::get('user'))->get();
		$view = Articles::where('art_id',$id)->pluck('daxem');
		Articles::where('art_id',$id)->update(array('daxem'=>$view+1));
		$goodVotes = $this->vote_count($id, 1);
        $badVotes = $this->vote_count($id, 0);
        //
        if ($goodVotes == false && $badVotes == false) {
            $goodVotesPercent = 100;
            $badVotesPercent = 0;
        } else {
            $goodVotesPercent = ($goodVotes / ($goodVotes + $badVotes)) * 100;
            $badVotesPercent = 100 - $goodVotesPercent;
        }
        //
        $img = Articles::where('art_id',$id)->pluck('id_img');
        $image = DB::table('article_img')->where('id_img',$img)->get();
		$articles = Articles::showArticle($id);
		$article = Articles::where('art_id',$id)->get();
		//kiem tra da dang ky mua chua
		$countreg = DB::table("register_buy")->where("art_id","=","$id")->where("userregister_id",Users::where('username',Session::get('user'))->pluck('user_id'))->count();
		if($countreg >0){
			Session::flash("reguser", "Đã đăng ký mua");
		}

		return  View::make('product.DetailsAd')
		->with('tieude','Chi tiết')
		->with('title','Chi tiết tin')
		->with('info',$articles)
		->with('votes', array(
                        'good_votes' => $goodVotes,
                        'bad_votes' => $badVotes,
                        'good_percent' => $goodVotesPercent,
                        'bad_percent' => $badVotesPercent
                    ))
		->with('infor',$info)
		->with('image',$image);
	}

	 /**
     * Counting current image votes.
     *
     * @param  int $id
     * @param  bool $type
     * @return int | bool
     */
	private function vote_count($id, $type)
    {
        $votes = Votes::where('art_id', $id)->where('vote', $type)->count();
        if ($votes !== 0) {
            return $votes;
        } else {
            return false;
        }
    }
    //vote choice
    public function vote_art($id, $vote)
    {

        if (!Session::has('user')) {
            return Response::json(array('success' => false, 'message' => 'Bạn phải đăng nhập để đánh giá sản phẩm!'));

        } else {
            $vote_count = Votes::where('art_id', $id)->where('user_id', Users::where('username',Session::get('user'))->pluck('user_id'))->count();

            if ((int) $vote_count !== 0) {
                return Response::json(array('success' => false, 'message' => 'Bạn đã đánh giá rồi!'));

            } else {
                Votes::insertVote($id, $vote);
                return Response::json(array('success' => true, 'message' => 'Cảm ơn đã đánh giá sản phẩm!'));
            }
        }
    }

	//đăng sản phẩm
	public function postarticle(){
		$folderName = str_random(10);
		$inputs = array(
			'art_title' => Input::get('tieu_de'),
			'art_cat_id' => Input::get('artid'),
			'user_id' => Users::where('username',Session::get('user'))->pluck('user_id'),
			'categori_id' => Input::get('catid'),
			'art_cost' => Input::get('gia'),
			'content' => Input::get('noidung'),
			'province_id' => Input::get('phamvi'),
			'id_img'=>$folderName
		);
		DB::table('articles')->insert($inputs);
		if(Input::hasFile('file')){
		$files = Input::file('file');
    	foreach ($files as $file) {
            // Validate files from input file
            $validation = Articles::validateImage(array('file'=> $file));

            if (! $validation->fails()) {

                // If validation pass, get filename and extension
                // Generate random (12 characters) string
                // And specify a folder name of uploaded image
                $fileName        = $file->getClientOriginalName();
                $extension       = $file->getClientOriginalExtension();
                $destinationPath = 'uploads/' . $folderName;

                // Move file to generated folder
                $file->move($destinationPath, $fileName);

                // Crop image (possible by Intervention Image Class)
                // And save as miniature
                //Image::make($destinationPath . '/' . $fileName)->crop(250, 250, 10, 10)->save($destinationPath . '/min_' . $fileName);

                // Insert image information to database
                DB::table('article_img')->insert(array('id_img'=>$folderName,'filename'=>$fileName));
            } else {
                return Redirect::route('articles/all');
            }
        }
        }
        DB::statement(DB::raw('CALL kmeans(5);'));
		return Redirect::to('articles/all');
	}
	public function postarticle2(){
		$folderName = str_random(10);
		$inputs = array(
			'art_title' => Input::get('tieu_de'),
			'art_cat_id' => Input::get('artid'),
			'user_id' => Users::where('username',Session::get('user'))->pluck('user_id'),
			'categori_id' => Input::get('catid'),
			'art_cost' => Input::get('gia'),
			'content' => Input::get('noidung'),
			'province_id' => Input::get('phamvi'),
			'id_img'=>$folderName,
			'private'    => Input::get('private') ? 1 : 0
		);
		DB::table('articles')->insert($inputs);
		$files = Input::file('file');
    	foreach ($files as $file) {
            // Validate files from input file
            $validation = Articles::validateImage(array('file'=> $file));

            if (! $validation->fails()) {

                // If validation pass, get filename and extension
                // Generate random (12 characters) string
                // And specify a folder name of uploaded image
                $fileName        = $file->getClientOriginalName();
                $extension       = $file->getClientOriginalExtension();
                $destinationPath = 'uploads/' . $folderName;

                // Move file to generated folder
                $file->move($destinationPath, $fileName);

                // Crop image (possible by Intervention Image Class)
                // And save as miniature
                //Image::make($destinationPath . '/' . $fileName)->crop(250, 250, 10, 10)->save($destinationPath . '/min_' . $fileName);

                // Insert image information to database
                DB::table('article_img')->insert(array('id_img'=>$folderName,'filename'=>$fileName));
            } else {
                return Redirect::route('articles/all');
            }
        }
        DB::statement(DB::raw('CALL kmeans(5);'));
		return Redirect::to('articles/all');
	}
	//đăng ký mua
	public function registerbuy($mathang,$id){
		$userid = Users::where('username',Session::get('user'))->pluck('user_id');
		$data_input = array("userregister_id" => $userid,
 							"art_id" => $id);
 		DB::table("register_buy")->insert($data_input);
 		return Redirect::to("articles/$mathang/$id");
	}
	//hủy đăng ký mua
	public function unregisterbuy($mathang,$id){
 		DB::table("register_buy")->where("userregister_id",Users::where('username',Session::get('user'))->pluck('user_id'))->where("art_id","=","$id")->delete();
 		return Redirect::to("articles/$mathang/$id");
	}
	public function showcount(){
		$avg = Articles::join('register_buy','articles.art_id','=','register_buy.art_id')->where('userregister_id',Users::where('username',Session::get('user'))->pluck('user_id'))->avg('art_cost');
		$data = DB::table('article_clusters')->get();
		//$data2 = DB::table('article_clusters')->first();
		$data3 = DB::table('articles')->orderBy('art_cost','desc')->first();
		// $max = 0;
		// $min = $data2->art_cost;
		// foreach ($data as $value) {
		// 	if ($max < $value->art_cost) {
		// 		if ($min>$value->art_cost) {
		// 			$min ->$value->art_cost;
		// 		}
		// 		$max = $value->art_cost;
		// 	}
		// 	else{
		// 		if ($min > $value->art_cost) {
		// 			$min = $value->art_cost;
		// 		}
		// 	}
		// }
		//$min2 = $data2->art_cost;
		$min2 = 0;
		$max2 = $data3->art_cost;
		foreach ($data as $values) {
			if ($avg > $values->art_cost && $avg-$values->art_cost < $avg-$min2) {
				$min2 = $values->art_cost;
			}
			elseif ($values->art_cost > $avg && $values->art_cost-$avg < $max2-$avg) {
				$max2 = $values->art_cost;
			}
		}
		if($min2 == 0){
                $cluster1 = 0;
            }
            else{
                $cluster1 = DB::table('article_clusters')->where('art_cost',$min2)->pluck('id');
            }
            $cluster2 = DB::table('article_clusters')->where('art_cost',$max2)->pluck('id');

            $province = Users::where('username',Session::get('user'))->pluck('province_id');
            $article_buy = Articles::whereIN('province_id',function($query){
                $query->select('province_id')
                                ->from('province')
                                ->where('cluster_id',DB::table('province')->where('province_id',Users::where('username',Session::get('user'))->pluck('province_id'))->pluck('cluster_id'))
                                ->get();
            })->get();

		// $data = Articles::showcount();
		//$id = Articles::select('art_id')->orderBy('art_id','desc')->first();
		//$data = Articles::count_vote('admin');
		//$data = Articles::showallname();
		//$data1 = Articles::all_good_vote();
		return View::make('test')
						//->with('info',$data)
						->with('info',$avg)
						->with('min2',$min2)
						->with('max2',$max2)
						->with('clus1',$cluster1)
						->with('clus2',$cluster2)
						->with('art',$article_buy)
						->with('province',$province);
	}
	public function comment(){
		$id = Users::where('username',Session::get('user'))->pluck('user_id');
		$input =  array(
				'art_id' => Input::get('article_id'),
				'user_id' => $id,
				'comment' => Input::get('comment_art')
			);
		DB::table('article_comments')->insert($input);
		return View::make('product.comment')
				->with('comment',Input::get('comment_art'))
				->with('username',Users::where('username',Session::get('user'))->get());
	}
	public function like($post){
		DB::table('like')->insert(array('art_id'=>$post,'user_id'=>Users::where('username',Session::get('user'))->pluck('user_id')));
		return View::make('ajax/like')->with('id',$post);
	}
	public function closetopic($id){
		Articles::where('art_id',$id)->update(array('tinhtrang'=>0));
		return View::make('ajax/close')
						->with('id',$id);
	}
	public function opentopic($id){
		Articles::where('art_id',$id)->update(array('tinhtrang'=>1));
		return View::make('ajax/open')
						->with('id',$id);
	}
	public function unreg($id){
		DB::table('register_buy')->where('id_register',$id)->delete();
		return View::make('ajax/unregis');
	}

	//report
	public function recent(){
		$recent = DB::table('user')
				->whereBetween('reg_time', array(Input::get('begin'),Input::get('end')))
                ->get();
        return View::make('admin/layout/table')
        		->with('recent',$recent);
	}
	public function recentPost(){
		$recentPost = Users::countPost();
        return View::make('admin/layout/tablePost')
        		->with('recentPost',$recentPost);
	}


	//end report
	public function findAd($mathang){
		$showart = Product::show_articles();
		$info = DB::table('user')->where('username',Session::get('user'))->get();
		$per_page=10;
		$listcat = Product::product_cat();
		$listmanu = Product::product_manu();
		$showProductAd = Product::showProductAd();
		if (Session::get('user')) {
			        $data = Users::selectSearch();
			        $id_search= DB::table('count_search')
			        			->where('username',Session::get('user'))
				                ->where('province_id',Input::get("diadiem"))
				                ->where('category_id',Input::get("loai"))
				                ->where('min_cost',Input::get("tugia"))
				                ->where('max_cost',Input::get("dengia"))
				                ->pluck('id_search');
				    $k = DB::table('count_search')
			        			->where('id_search',$id_search)
			        			->pluck('count_search');
			        $k=($k+1);
			        if($data==0){
			        	Users::insertSearch();
			        }
			        else
			        {
			        DB::table('count_search')
			    		->where('id_search',$id_search)
                		->update(array(
	                    "count_search"=>$k
	                    ));
        			}

				}
		$inputs = DB::table('product_category')
					->where('category_id',Input::get("loai"))
					->get();
		$inputs1 = DB::table('province')
					->where('province_id',Input::get("diadiem"))
					->get();
		$findAd = Articles::showAllSearch();
        if($mathang == 'all')
		{
			return View::make('ajax/findAd')
						->with('tieude','Rao vặt')
						->with('title','Trang Rao Vặt')
						->with('info',DB::table('articles')
							->join('user',"articles.user_id","=","user.user_id")
							->join('product_category','articles.categori_id','=','product_category.category_id')
							->join('province',"articles.province_id","=","province.province_id")
							->where('categori_id',Input::get('loai'))
							->where('articles.province_id',Input::get('diadiem'))
							->whereBetween('art_cost', array(Input::get('tugia'),Input::get('dengia')))
							->orderBy("art_id",'desc')
							->paginate($per_page))
						->with('artcat',Articles::article_cat())
						->with('procat',Product::product_cat())
						->with('area',Users::province())
						->with('infor',$info)
						->with('listcat',$listcat)
						->with('listmanu',$listmanu)
						->with('inputs',$inputs)
						->with('inputs1',$inputs1)
						->with('showart',$showart)
						->with('showProductAd',$showProductAd)
						->with('findAd',$findAd);
		}
		else{
			return View::make('ajax/findAd')
						->with('tieude','Rao vặt')
						->with('title','Trang Rao Vặt')
						->with('info',DB::table('articles')
							->join('user',"articles.user_id","=","user.user_id")
							->join('product_category','articles.categori_id','=','product_category.category_id')
							->join('province',"articles.province_id","=","province.province_id")
							->where('categori_id',Input::get('loai'))
							->where('articles.province_id',Input::get('diadiem'))
							->whereBetween('art_cost', array(Input::get('tugia'),Input::get('dengia')))
							->orderBy("art_id",'desc')
							->paginate($per_page))
						->with('artcat',Articles::article_cat())
						->with('procat',Product::product_cat())
						->with('area',Users::province())
						->with('infor',$info)
						->with('listcat',$listcat)
						->with('listmanu',$listmanu)
						->with('inputs',$inputs)
						->with('inputs1',$inputs1)
						->with('showProductAd',$showProductAd)
						->with('findAd',$findAd);
		}

	}

	public function keyword($mathang){
		$info = DB::table('user')->where('username',Session::get('user'))->get();
		$listcat = Product::product_cat();
		$listmanu = Product::product_manu();
		$per_page=10;
		$showKeySearch = Articles::showKeySearch();
		$showProductAd = Product::showProductAd();
		$showart = Product::show_articles();
		if($mathang == 'all')
		{
			return View::make('ajax/findAd')
						->with('tieude','Rao vặt')
						->with('title','Trang Rao Vặt')
						->with('info',DB::table('articles')
							->join('user',"articles.user_id","=","user.user_id")
							->join('product_category','articles.categori_id','=','product_category.category_id')
							->join('province',"articles.province_id","=","province.province_id")
							->where('articles.art_title','%'.Input::get('keyword').'%')
							->orderBy("art_id",'desc')
							->paginate($per_page))
						->with('artcat',Articles::article_cat())
						->with('procat',Product::product_cat())
						->with('area',Users::province())
						->with('infor',$info)
						->with('listcat',$listcat)
						->with('listmanu',$listmanu)
						->with('showProductAd',$showProductAd)
						->with('showart',$showart)
						->with('findAd',$showKeySearch);
		}
		else{
			return View::make('ajax/findAd')
						->with('tieude','Rao vặt')
						->with('title','Trang Rao Vặt')
						->with('info',DB::table('articles')
							->join('user',"articles.user_id","=","user.user_id")
							->join('product_category','articles.categori_id','=','product_category.category_id')
							->join('province',"articles.province_id","=","province.province_id")
							->where('articles.art_title','%'.Input::get('keyword').'%')
							->orderBy("art_id",'desc')
							->paginate($per_page))
						->with('artcat',Articles::article_cat())
						->with('procat',Product::product_cat())
						->with('area',Users::province())
						->with('infor',$info)
						->with('listcat',$listcat)
						->with('listmanu',$listmanu)
						->with('inputs',$inputs)
						->with('inputs1',$inputs1)
						->with('showProductAd',$showProductAd)
						->with('showart',$showart)
						->with('findAd',$showKeySearch);
		}
	}

}