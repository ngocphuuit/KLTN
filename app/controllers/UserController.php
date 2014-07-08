<?php
Class UserController extends BaseController{
	public $_count;
	public function __construct(){
		$this->_count = DB::table("user")->where("username","=",Input::get("txtuser"))
									  ->where("password","=",Input::get("txtpass"))
									  ->count();
	}
	//đến trang đang nhập
	public function viewlogin(){
		return View::make("user.register", array("tieude"=>"Trang Đăng Ký","title"=>"Trang Đăng Ký"));
	}

	// Đăng nhập
	public function actionlogin(){
		$inputs = array(
			    "username"=>Input::get("txtuser"),
				"password"=>Input::get("txtpass")
				);
		$validation = Users::validateLogin(Input::all());
		if ($validation->fails()) {
			$errors = $validation->messages();
			return View::make("user.register",array("tieude"=>"Trang Đăng Ký","title"=>"Trang Đăng Ký","error"=>$errors));
		}else{
			if(Auth::attempt($inputs, true)){
                $tinhtrang = Users::where('username',Input::get("txtuser"))->pluck('user_type_id');
                if($tinhtrang == 1){
        				Session::put("user",Input::get("txtuser"));
        				return Redirect::to("personal/infor/".Session::get('user'));
                     }
                else {
                    return View::make("user.register",array("tieude"=>"Trang Đăng Ký","title"=>"Trang Đăng Ký","loi"=>"Tài khoản của bạn đã bị khóa"));
                }
			}else{
				return View::make("user.register",array("tieude"=>"Trang Đăng Ký","title"=>"Trang Đăng Ký","loi"=>"Sai tài khoản hoặc mật khẩu"));
			}
		}
	}
	public function actionlogout(){
        Cart::destroy();
		Session::flush();
		Auth::logout();
		return Redirect::to("viewlogin");
	}

	// Đăng ký user
	public function check_register(){
		$validator = Validator::make(
			array(
			    "username"=>Input::get("txtusername"),
			    "email"	=>Input::get("txtemail"),
				"password"=>Input::get("txtpassword")
				),
			array(
				"username"=>"required",
				"email"=>"required|email",
				"password"=>"required"
			)
			);
		if ($validator->fails()) {
			$errors = $validator->messages();
			return View::make("user.register",array("tieude"=>"Trang Đăng Ký","title"=>"Trang Đăng Ký","error"=>$errors));
		}else{
				$checkuser = DB::table("user")->where("username","=",Input::get("txtusername"))
									  ->count();
				$checkemail = DB::table("user")->where("email","=",Input::get("txtemail"))
									  ->count();
				if($checkuser > 0){
					$err1 = "Tai khoan ton tai";
				}
				else{
					$user = Input::get("txtusername");
					$pass = Input::get("txtpassword");
					Session::flash('Sesuser', $user);
					Session::flash('Sespass', $pass);
				}
				if($checkemail > 0){
					$err2 = "Email ton tai";
				}
				else{
					$email = Input::get("txtemail");
					Session::flash('Sesemail', $email);
				}
				return View::make('user.register-next')
				->with('tieude','trang đăng ký')
				->with('title','trang đăng ký')
                ->with('tinhthanh',DB::table('province')->get());
		}
	}
	public function register()
    {
        $validation = Users::validateRegister(Input::all());

        if (! $validation->fails()) {
            Users::insertUser();
            return View::make('user/register')
                        ->with('tieude','Trang Đăng Ký')
                        ->with('title','Trang Đăng Ký')
                        ->with('mes','Bạn đã đăng ký thành công!');
        } else {
        	$errors = $validation->messages();
        	return View::make("user.register-next",array("error"=>$errors,"tieude"=>"trang đăng ký","title"=>"Trang Đăng Ký Thành Viên"));
        }
    }
    //thông tin cá nhân
        //show information
    public function showinfor($username){
//////////-------------------------------------------------
        //gioi thieu san pham theo tim kiem
        $countsearch = DB::table('count_search')->where('username',Session::get('user'))->count();
        if($countsearch <=3)
        {
            $articles_search = Articles::join('product_category','articles.categori_id','=','product_category.category_id')
                            ->whereIN('province_id',function($query){
                                $query->select('province_id')
                                ->from('province')
                                ->where('cluster_id',DB::table('province')->where('province_id',Users::where('username',Session::get('user'))->pluck('province_id'))->pluck('cluster_id'))
                                ->get();
                                })
                            ->where('user_id','<>',Users::where('username',Session::get('user'))->pluck('user_id'))
                            ->where('tinhtrang',1)
                            ->where('art_cat_id',2)
                            ->orderBy(DB::raw('RAND()'))->take(5)->get();
        }
        else{
            $soluong_search = Articles::sum_all_search();
            $nhieunhat = Articles::first_search();
            if($nhieunhat->count_search / $soluong_search *100 >=60)
            {
                $articles_search = Articles::join('product_category','articles.categori_id','=','product_category.category_id')
                            ->where('province_id',$nhieunhat->province_id)
                            ->where('articles.categori_id',$nieunhat->category_id)
                            ->whereBetween('art_cost', array($nhieunhat->min_cost,$nhieunhat->max_cost))
                            ->where('user_id','<>',Users::where('username',Session::get('user'))->pluck('user_id'))
                            ->where('tinhtrang',1)
                            ->where('art_cat_id',2)
                            ->orderBy(DB::raw('RAND()'))->take(5)->get();
            }
            else{
                $articles_search = Articles::join('product_category','articles.categori_id','=','product_category.category_id')
                            ->whereIN('province_id',function($query){
                                $query->select('province_id')
                                ->from('province')
                                ->where('cluster_id',DB::table('province')->where('province_id',Users::where('username',Session::get('user'))->pluck('province_id'))->pluck('cluster_id'))
                                ->get();
                                })
                            ->where('user_id','<>',Users::where('username',Session::get('user'))->pluck('user_id'))
                            ->where('tinhtrang',1)
                            ->where('art_cat_id',2)
                            ->orderBy(DB::raw('RAND()'))->take(5)->get();
            }
        }
        //gioi thieu san pham theo dang ky mua
        //đếm đã đăng ký mua sản phẩm nào chưa
        $count_buy = DB::table('register_buy')->where('userregister_id',Users::where('username',Session::get('user'))->pluck('user_id'))->count();
        if($count_buy < 3)
        {
            $userfollow = Users::whereIN('province_id',function($query){
                $query->select('province_id')
                                ->from('province')
                                ->where('cluster_id',DB::table('province')->where('province_id',Users::where('username',Session::get('user'))->pluck('province_id'))->pluck('cluster_id'))
                                ->get();
            })
            ->whereNotIn('user_id',function($query){
                $query->select('user_id')
                                ->from('user_follow')
                                ->where('follow_by_user',Users::where('username',Session::get('user'))->pluck('user_id'))
                                ->get();
            })
            ->where('user_id','<>',Users::where('username',Session::get('user'))->pluck('user_id'))->orderBy(DB::raw('RAND()'))->take(5)->get();
//// chọn sản phẩm gợi ý
            $article_buy = Articles::join('product_category','articles.categori_id','=','product_category.category_id')
                            ->whereIN('province_id',function($query){
                                $query->select('province_id')
                                ->from('province')
                                ->where('cluster_id',DB::table('province')->where('province_id',Users::where('username',Session::get('user'))->pluck('province_id'))->pluck('cluster_id'))
                                ->get();
                                })
                            ->where('user_id','<>',Users::where('username',Session::get('user'))->pluck('user_id'))
                            ->where('tinhtrang',1)
                            ->where('art_cat_id',2)
                            ->orderBy(DB::raw('RAND()'))->take(5)->get();
        }
        else
            {

                //------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
                $minsupp = 60;
                // Tính tập phổ biến mua sản phẩm
                $sanphammuanhieu = DB::table('register_buy')->select(array('articles.categori_id',(DB::raw('count(userregister_id) as soluong'))))
                                                        ->join('articles','articles.art_id','=','register_buy.art_id')
                                                        ->where('userregister_id',Users::where('username',Session::get('user'))->pluck('user_id'))
                                                        ->groupBy('categori_id')
                                                        ->first();
                $muanhieu = $sanphammuanhieu->soluong;
                $phobien = $muanhieu / $count_buy * 100;
                if($phobien >= $minsupp)
                    {
                        $article_buy = Articles::join('product_category','articles.categori_id','=','product_category.category_id')
                                                    ->whereIN('province_id',function($query){
                                                        $query->select('province_id')
                                                                        ->from('province')
                                                                        ->where('cluster_id',DB::table('province')->where('province_id',Users::where('username',Session::get('user'))->pluck('province_id'))->pluck('cluster_id'))
                                                                        ->get();
                                                    })// sản phẩm thuộc cùn khu vực
                                                    ->whereNotIn('art_id',function($query){
                                                        $query->select('art_id')
                                                                        ->from('register_buy')
                                                                        ->where('userregister_id',Users::where('username',Session::get('user'))->pluck('user_id'))
                                                                        ->get();
                                                    })//sản phẩm đã đăng ký mua
                                                    ->where('tinhtrang',1) // sản phẩm còn hoạt động
                                                    ->where('art_cat_id',2) // sản phẩm thuộc dạng là bán
                                                    ->where('user_id','<>',Users::where('username',Session::get('user'))->pluck('user_id'))// không phải sản phẩm mình đăng
                                                    ->where('articles.categori_id',$sanphammuanhieu->categori_id)
                                                    ->orderBy(DB::raw('RAND()'))
                                                    ->take(5)->get();
                        $userfollow = Users::leftJoin('articles','articles.user_id','=','user.user_id')
                        ->select('user.username','user.user_id','user.avatar','user.firstname')
                        ->whereIN('user.province_id',function($query){
                        $query->select('province_id')
                                        ->from('province')
                                        ->where('cluster_id',DB::table('province')->where('province_id',Users::where('username',Session::get('user'))->pluck('province_id'))->pluck('cluster_id'))
                                        ->get();
                        })
                        ->whereNotIn('user.user_id',function($query){
                            $query->select('user_id')
                                            ->from('user_follow')
                                            ->where('follow_by_user',Users::where('username',Session::get('user'))->pluck('user_id'))
                                            ->get();
                        })
                        ->where('articles.categori_id',$sanphammuanhieu->categori_id)
                        ->where('user.user_id','<>',Users::where('username',Session::get('user'))->pluck('user_id'))->orderBy(DB::raw('RAND()'))->take(5)->distinct()->get();
                    }
                    else
                    {
                        $article_buy = Articles::join('product_category','articles.categori_id','=','product_category.category_id')
                                                    ->whereIN('province_id',function($query){
                                                        $query->select('province_id')
                                                                        ->from('province')
                                                                        ->where('cluster_id',DB::table('province')->where('province_id',Users::where('username',Session::get('user'))->pluck('province_id'))->pluck('cluster_id'))
                                                                        ->get();
                                                    })// sản phẩm thuộc cùn khu vực
                                                    ->whereNotIn('art_id',function($query){
                                                        $query->select('art_id')
                                                                        ->from('register_buy')
                                                                        ->where('userregister_id',Users::where('username',Session::get('user'))->pluck('user_id'))
                                                                        ->get();
                                                    })//sản phẩm đã đăng ký mua
                                                    ->where('tinhtrang',1) // sản phẩm còn hoạt động
                                                    ->where('art_cat_id',2) // sản phẩm thuộc dạng là bán
                                                    ->where('user_id','<>',Users::where('username',Session::get('user'))->pluck('user_id'))// không phải sản phẩm mình đăng
                                                    ->whereIn('articles.categori_id',function($query){
                                                        $query->select('articles.categori_id')
                                                              ->from('articles')
                                                              ->join('register_buy','register_buy.art_id','=','articles.art_id')
                                                              ->where('register_buy.userregister_id',Users::where('username',Session::get('user'))->pluck('user_id'))
                                                              ->distinct()
                                                              ->get();
                                                    })
                                                    ->orderBy(DB::raw('RAND()'))
                                                    ->take(5)->get();
                        //userfollow
                        $userfollow = Users::whereIN('province_id',function($query){
                        $query->select('province_id')
                                        ->from('province')
                                        ->where('cluster_id',DB::table('province')->where('province_id',Users::where('username',Session::get('user'))->pluck('province_id'))->pluck('cluster_id'))
                                        ->get();
                        })
                        ->whereNotIn('user_id',function($query){
                            $query->select('user_id')
                                            ->from('user_follow')
                                            ->where('follow_by_user',Users::where('username',Session::get('user'))->pluck('user_id'))
                                            ->get();
                        })
                        ->where('user_id','<>',Users::where('username',Session::get('user'))->pluck('user_id'))->orderBy(DB::raw('RAND()'))->take(5)->get();
                    }
            }
///----------------------------------------------------------
        $image = DB::table('article_img')->get();
        $countfollow = DB::table('user_follow')->where('user_id',Users::where('username',$username)->pluck('user_id'))
                                           ->where('follow_by_user',Users::where('username',Session::get('user'))->pluck('user_id'))
                                           ->count();
        $artimg = Articles::get_image($username);
    	$userinfo = Users::showinforuser($username);
    	$countfl = Users::countfollower($username);
    	$countflw = Users::countfollowing($username);
    	$countpost = Articles::countpost($username);
    	$data = Articles::show_all_articles($username);
    	$comment = Articles::showcomment();
        $noti = Articles::notification();
        $showshare = Articles::show_share($username);
    	return View::make('user.personal')
    				->with('tieude','Trang cá nhân')
    				->with('title','Trang cá nhân')
    				->with('info',$userinfo)
    				->with('count',$countfl)
    				->with('count1',$countflw)
    				->with('count2',$countpost)
    				->with('infor',$data)
    				->with('comments',$comment)
                    ->with('count3',$countfollow)
                    ->with('follow',$userfollow)
                    ->with('article',$article_buy)
                    ->with('noti',$noti)
                    ->with('img',$image)
                    ->with('artimg',$artimg)
                    ->with('showshare',$showshare)
                    ->with('articles_search',$articles_search)
                    ->with('artcat',Articles::article_cat())
                    ->with('procat',Product::product_cat())
                    ->with('area',Users::province());
    }

    //show follower
    public function showfollower($username){
        //////////-------------------------------------------------
        //đếm đã đăng ký mua sản phẩm nào chưa
        //đếm đã đăng ký mua sản phẩm nào chưa
         $countsearch = DB::table('count_search')->where('username',Session::get('user'))->count();
        if($countsearch <=3)
        {
            $articles_search = Articles::join('product_category','articles.categori_id','=','product_category.category_id')
                            ->whereIN('province_id',function($query){
                                $query->select('province_id')
                                ->from('province')
                                ->where('cluster_id',DB::table('province')->where('province_id',Users::where('username',Session::get('user'))->pluck('province_id'))->pluck('cluster_id'))
                                ->get();
                                })
                            ->where('user_id','<>',Users::where('username',Session::get('user'))->pluck('user_id'))
                            ->where('tinhtrang',1)
                            ->where('art_cat_id',2)
                            ->orderBy(DB::raw('RAND()'))->take(5)->get();
        }
        else{
            $soluong_search = Articles::sum_all_search();
            $nhieunhat = Articles::first_search();
            if($nhieunhat->count_search / $soluong_search *100 >=60)
            {
                $articles_search = Articles::join('product_category','articles.categori_id','=','product_category.category_id')
                            ->where('province_id',$nhieunhat->province_id)
                            ->where('articles.categori_id',$nieunhat->category_id)
                            ->whereBetween('art_cost', array($nhieunhat->min_cost,$nhieunhat->max_cost))
                            ->where('user_id','<>',Users::where('username',Session::get('user'))->pluck('user_id'))
                            ->where('tinhtrang',1)
                            ->where('art_cat_id',2)
                            ->orderBy(DB::raw('RAND()'))->take(5)->get();
            }
            else{
                $articles_search = Articles::join('product_category','articles.categori_id','=','product_category.category_id')
                            ->whereIN('province_id',function($query){
                                $query->select('province_id')
                                ->from('province')
                                ->where('cluster_id',DB::table('province')->where('province_id',Users::where('username',Session::get('user'))->pluck('province_id'))->pluck('cluster_id'))
                                ->get();
                                })
                            ->where('user_id','<>',Users::where('username',Session::get('user'))->pluck('user_id'))
                            ->where('tinhtrang',1)
                            ->where('art_cat_id',2)
                            ->orderBy(DB::raw('RAND()'))->take(5)->get();
            }
        }
        //đếm đã đăng ký mua sản phẩm nào chưa
        $count_buy = DB::table('register_buy')->where('userregister_id',Users::where('username',Session::get('user'))->pluck('user_id'))->count();
        if($count_buy < 3)
        {
            $userfollow = Users::whereIN('province_id',function($query){
                $query->select('province_id')
                                ->from('province')
                                ->where('cluster_id',DB::table('province')->where('province_id',Users::where('username',Session::get('user'))->pluck('province_id'))->pluck('cluster_id'))
                                ->get();
            })
            ->whereNotIn('user_id',function($query){
                $query->select('user_id')
                                ->from('user_follow')
                                ->where('follow_by_user',Users::where('username',Session::get('user'))->pluck('user_id'))
                                ->get();
            })
            ->where('user_id','<>',Users::where('username',Session::get('user'))->pluck('user_id'))->orderBy(DB::raw('RAND()'))->take(5)->get();
//// chọn sản phẩm gợi ý
            $article_buy = Articles::join('product_category','articles.categori_id','=','product_category.category_id')
                            ->whereIN('province_id',function($query){
                                $query->select('province_id')
                                ->from('province')
                                ->where('cluster_id',DB::table('province')->where('province_id',Users::where('username',Session::get('user'))->pluck('province_id'))->pluck('cluster_id'))
                                ->get();
                                })
                            ->where('user_id','<>',Users::where('username',Session::get('user'))->pluck('user_id'))
                            ->where('tinhtrang',1)
                            ->where('art_cat_id',2)
                            ->orderBy(DB::raw('RAND()'))->take(5)->get();
        }
        else
            {
                //userfollow
                $userfollow = Users::whereIN('province_id',function($query){
                $query->select('province_id')
                                ->from('province')
                                ->where('cluster_id',DB::table('province')->where('province_id',Users::where('username',Session::get('user'))->pluck('province_id'))->pluck('cluster_id'))
                                ->get();
                })
                ->whereNotIn('user_id',function($query){
                    $query->select('user_id')
                                    ->from('user_follow')
                                    ->where('follow_by_user',Users::where('username',Session::get('user'))->pluck('user_id'))
                                    ->get();
                })
                ->where('user_id','<>',Users::where('username',Session::get('user'))->pluck('user_id'))->orderBy(DB::raw('RAND()'))->take(5)->get();

                //------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
                $minsupp = 60;
                // Tính tập phổ biến mua sản phẩm
                $sanphammuanhieu = DB::table('register_buy')->select(array('articles.categori_id',(DB::raw('count(userregister_id) as soluong'))))
                                                        ->join('articles','articles.art_id','=','register_buy.art_id')
                                                        ->where('userregister_id',Users::where('username',Session::get('user'))->pluck('user_id'))
                                                        ->groupBy('categori_id')
                                                        ->first();
                $muanhieu = $sanphammuanhieu->soluong;
                $phobien = $muanhieu / $count_buy * 100;
                if($phobien >= $minsupp)
                    {
                        $article_buy = Articles::join('product_category','articles.categori_id','=','product_category.category_id')
                                                    ->whereIN('province_id',function($query){
                                                        $query->select('province_id')
                                                                        ->from('province')
                                                                        ->where('cluster_id',DB::table('province')->where('province_id',Users::where('username',Session::get('user'))->pluck('province_id'))->pluck('cluster_id'))
                                                                        ->get();
                                                    })// sản phẩm thuộc cùn khu vực
                                                    ->whereNotIn('art_id',function($query){
                                                        $query->select('art_id')
                                                                        ->from('register_buy')
                                                                        ->where('userregister_id',Users::where('username',Session::get('user'))->pluck('user_id'))
                                                                        ->get();
                                                    })//sản phẩm đã đăng ký mua
                                                    ->where('tinhtrang',1) // sản phẩm còn hoạt động
                                                    ->where('art_cat_id',2) // sản phẩm thuộc dạng là bán
                                                    ->where('user_id','<>',Users::where('username',Session::get('user'))->pluck('user_id'))// không phải sản phẩm mình đăng
                                                    ->where('articles.categori_id',$sanphammuanhieu->categori_id)
                                                    ->orderBy(DB::raw('RAND()'))
                                                    ->take(5)->get();
                    }
                    else
                    {
                        $article_buy = Articles::join('product_category','articles.categori_id','=','product_category.category_id')
                                                    ->whereIN('province_id',function($query){
                                                        $query->select('province_id')
                                                                        ->from('province')
                                                                        ->where('cluster_id',DB::table('province')->where('province_id',Users::where('username',Session::get('user'))->pluck('province_id'))->pluck('cluster_id'))
                                                                        ->get();
                                                    })// sản phẩm thuộc cùn khu vực
                                                    ->whereNotIn('art_id',function($query){
                                                        $query->select('art_id')
                                                                        ->from('register_buy')
                                                                        ->where('userregister_id',Users::where('username',Session::get('user'))->pluck('user_id'))
                                                                        ->get();
                                                    })//sản phẩm đã đăng ký mua
                                                    ->where('tinhtrang',1) // sản phẩm còn hoạt động
                                                    ->where('art_cat_id',2) // sản phẩm thuộc dạng là bán
                                                    ->where('user_id','<>',Users::where('username',Session::get('user'))->pluck('user_id'))// không phải sản phẩm mình đăng
                                                    ->whereIn('articles.categori_id',function($query){
                                                        $query->select('articles.categori_id')
                                                              ->from('articles')
                                                              ->join('register_buy','register_buy.art_id','=','articles.art_id')
                                                              ->where('register_buy.userregister_id',Users::where('username',Session::get('user'))->pluck('user_id'))
                                                              ->distinct()
                                                              ->get();
                                                    })
                                                    ->orderBy(DB::raw('RAND()'))
                                                    ->take(5)->get();
                }
            }
///----------------------------------------------------------
         $artimg = Articles::get_image($username);
    	$userinfo = Users::showinforuser($username);
    	$follower = Users::follower($username);
		$countfl = Users::countfollower($username);
		$countflw = Users::countfollowing($username);
		$countpost = Articles::countpost($username);
        $noti = Articles::notification();
        $showshare = Articles::show_share($username);
    	return View::make('user.follower')
    				->with('tieude','Trang cá nhân')
    				->with('title','Trang cá nhân')
    				->with('info',$userinfo)
    				->with('info1',$follower)
    				->with('count',$countfl)
    				->with('count1',$countflw)
    				->with('count2',$countpost)
                    ->with('follow',$userfollow)
                    ->with('article',$article_buy)
                     ->with('noti',$noti)
                    ->with('articles_search',$articles_search)
                     ->with('showshare',$showshare)
                     ->with('artimg',$artimg);
    }

    //show following
    public function showfollowing($username){
        //////////-------------------------------------------------
        //đếm đã đăng ký mua sản phẩm nào chưa
         $countsearch = DB::table('count_search')->where('username',Session::get('user'))->count();
        if($countsearch <=3)
        {
            $articles_search = Articles::join('product_category','articles.categori_id','=','product_category.category_id')
                            ->whereIN('province_id',function($query){
                                $query->select('province_id')
                                ->from('province')
                                ->where('cluster_id',DB::table('province')->where('province_id',Users::where('username',Session::get('user'))->pluck('province_id'))->pluck('cluster_id'))
                                ->get();
                                })
                            ->where('user_id','<>',Users::where('username',Session::get('user'))->pluck('user_id'))
                            ->where('tinhtrang',1)
                            ->where('art_cat_id',2)
                            ->orderBy(DB::raw('RAND()'))->take(5)->get();
        }
        else{
            $soluong_search = Articles::sum_all_search();
            $nhieunhat = Articles::first_search();
            if($nhieunhat->count_search / $soluong_search *100 >=60)
            {
                $articles_search = Articles::join('product_category','articles.categori_id','=','product_category.category_id')
                            ->where('province_id',$nhieunhat->province_id)
                            ->where('articles.categori_id',$nieunhat->category_id)
                            ->whereBetween('art_cost', array($nhieunhat->min_cost,$nhieunhat->max_cost))
                            ->where('user_id','<>',Users::where('username',Session::get('user'))->pluck('user_id'))
                            ->where('tinhtrang',1)
                            ->where('art_cat_id',2)
                            ->orderBy(DB::raw('RAND()'))->take(5)->get();
            }
            else{
                $articles_search = Articles::join('product_category','articles.categori_id','=','product_category.category_id')
                            ->whereIN('province_id',function($query){
                                $query->select('province_id')
                                ->from('province')
                                ->where('cluster_id',DB::table('province')->where('province_id',Users::where('username',Session::get('user'))->pluck('province_id'))->pluck('cluster_id'))
                                ->get();
                                })
                            ->where('user_id','<>',Users::where('username',Session::get('user'))->pluck('user_id'))
                            ->where('tinhtrang',1)
                            ->where('art_cat_id',2)
                            ->orderBy(DB::raw('RAND()'))->take(5)->get();
            }
        }
        //đếm đã đăng ký mua sản phẩm nào chưa
        $count_buy = DB::table('register_buy')->where('userregister_id',Users::where('username',Session::get('user'))->pluck('user_id'))->count();
        if($count_buy < 3)
        {
            $userfollow = Users::whereIN('province_id',function($query){
                $query->select('province_id')
                                ->from('province')
                                ->where('cluster_id',DB::table('province')->where('province_id',Users::where('username',Session::get('user'))->pluck('province_id'))->pluck('cluster_id'))
                                ->get();
            })
            ->whereNotIn('user_id',function($query){
                $query->select('user_id')
                                ->from('user_follow')
                                ->where('follow_by_user',Users::where('username',Session::get('user'))->pluck('user_id'))
                                ->get();
            })
            ->where('user_id','<>',Users::where('username',Session::get('user'))->pluck('user_id'))->orderBy(DB::raw('RAND()'))->take(5)->get();
//// chọn sản phẩm gợi ý
            $article_buy = Articles::join('product_category','articles.categori_id','=','product_category.category_id')
                            ->whereIN('province_id',function($query){
                                $query->select('province_id')
                                ->from('province')
                                ->where('cluster_id',DB::table('province')->where('province_id',Users::where('username',Session::get('user'))->pluck('province_id'))->pluck('cluster_id'))
                                ->get();
                                })
                            ->where('user_id','<>',Users::where('username',Session::get('user'))->pluck('user_id'))
                            ->where('tinhtrang',1)
                            ->where('art_cat_id',2)
                            ->orderBy(DB::raw('RAND()'))->take(5)->get();
        }
        else
            {
                //userfollow
                $userfollow = Users::whereIN('province_id',function($query){
                $query->select('province_id')
                                ->from('province')
                                ->where('cluster_id',DB::table('province')->where('province_id',Users::where('username',Session::get('user'))->pluck('province_id'))->pluck('cluster_id'))
                                ->get();
                })
                ->whereNotIn('user_id',function($query){
                    $query->select('user_id')
                                    ->from('user_follow')
                                    ->where('follow_by_user',Users::where('username',Session::get('user'))->pluck('user_id'))
                                    ->get();
                })
                ->where('user_id','<>',Users::where('username',Session::get('user'))->pluck('user_id'))->orderBy(DB::raw('RAND()'))->take(5)->get();

                //------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
                $minsupp = 60;
                // Tính tập phổ biến mua sản phẩm
                $sanphammuanhieu = DB::table('register_buy')->select(array('articles.categori_id',(DB::raw('count(userregister_id) as soluong'))))
                                                        ->join('articles','articles.art_id','=','register_buy.art_id')
                                                        ->where('userregister_id',Users::where('username',Session::get('user'))->pluck('user_id'))
                                                        ->groupBy('categori_id')
                                                        ->first();
                $muanhieu = $sanphammuanhieu->soluong;
                $phobien = $muanhieu / $count_buy * 100;
                if($phobien >= $minsupp)
                    {
                        $article_buy = Articles::join('product_category','articles.categori_id','=','product_category.category_id')
                                                    ->whereIN('province_id',function($query){
                                                        $query->select('province_id')
                                                                        ->from('province')
                                                                        ->where('cluster_id',DB::table('province')->where('province_id',Users::where('username',Session::get('user'))->pluck('province_id'))->pluck('cluster_id'))
                                                                        ->get();
                                                    })// sản phẩm thuộc cùn khu vực
                                                    ->whereNotIn('art_id',function($query){
                                                        $query->select('art_id')
                                                                        ->from('register_buy')
                                                                        ->where('userregister_id',Users::where('username',Session::get('user'))->pluck('user_id'))
                                                                        ->get();
                                                    })//sản phẩm đã đăng ký mua
                                                    ->where('tinhtrang',1) // sản phẩm còn hoạt động
                                                    ->where('art_cat_id',2) // sản phẩm thuộc dạng là bán
                                                    ->where('user_id','<>',Users::where('username',Session::get('user'))->pluck('user_id'))// không phải sản phẩm mình đăng
                                                    ->where('articles.categori_id',$sanphammuanhieu->categori_id)
                                                    ->orderBy(DB::raw('RAND()'))
                                                    ->take(5)->get();
                    }
                    else
                    {
                        $article_buy = Articles::join('product_category','articles.categori_id','=','product_category.category_id')
                                                    ->whereIN('province_id',function($query){
                                                        $query->select('province_id')
                                                                        ->from('province')
                                                                        ->where('cluster_id',DB::table('province')->where('province_id',Users::where('username',Session::get('user'))->pluck('province_id'))->pluck('cluster_id'))
                                                                        ->get();
                                                    })// sản phẩm thuộc cùn khu vực
                                                    ->whereNotIn('art_id',function($query){
                                                        $query->select('art_id')
                                                                        ->from('register_buy')
                                                                        ->where('userregister_id',Users::where('username',Session::get('user'))->pluck('user_id'))
                                                                        ->get();
                                                    })//sản phẩm đã đăng ký mua
                                                    ->where('tinhtrang',1) // sản phẩm còn hoạt động
                                                    ->where('art_cat_id',2) // sản phẩm thuộc dạng là bán
                                                    ->where('user_id','<>',Users::where('username',Session::get('user'))->pluck('user_id'))// không phải sản phẩm mình đăng
                                                    ->whereIn('articles.categori_id',function($query){
                                                        $query->select('articles.categori_id')
                                                              ->from('articles')
                                                              ->join('register_buy','register_buy.art_id','=','articles.art_id')
                                                              ->where('register_buy.userregister_id',Users::where('username',Session::get('user'))->pluck('user_id'))
                                                              ->distinct()
                                                              ->get();
                                                    })
                                                    ->orderBy(DB::raw('RAND()'))
                                                    ->take(5)->get();
                }
            }
///----------------------------------------------------------
         $artimg = Articles::get_image($username);
    	$userinfo = Users::showinforuser($username);
    	$user = Session::get('user');
    	$id = Users::where('username',$user)->pluck('user_id');
    	$countfl = Users::countfollower($username);
    	$countflw = Users::countfollowing($username);
    	$countpost = Articles::countpost($username);
        $noti = Articles::notification();
        $showshare = Articles::show_share($username);
    	return View::make('user.following')
    				->with('tieude','Trang cá nhân')
    				->with('title','Trang cá nhân')
    				->with('info',$userinfo)
    				->with('info2',Users::join('user_follow','user.user_id','=','user_follow.user_id')
    					->where('follow_by_user',$id)->get())
    				->with('count',$countfl)
    				->with('count1',$countflw)
    				->with('count2',$countpost)
                    ->with('follow',$userfollow)
                    ->with('article',$article_buy)
                     ->with('noti',$noti)
                    ->with('articles_search',$articles_search)
                     ->with('showshare',$showshare)
                     ->with('artimg',$artimg);
    }
    //information yourself
    // public function userinfo(){
    // 	return View::make('user.personal')
    // 				->with('tieude','Trang cá nhân')
    // 				->with('title','Trang cá nhân')
    // 				->with('info',Users::where('username',Session::get('user'))->get());
    // }
    public function history($username){
    	$userinfo = Users::showinforuser($username);
    	$data = Articles::show_all($username);
    	$registerbuy = Articles::registerbuy($username);
    	$count = Articles::count_vote($username);
    	$vote = Articles::showallvote();
    	$countgoodvote = Articles::count_good_vote();
    	$allgoodvote = Articles::all_good_vote();
    	$art_cat = Articles::article_cat();
    	$pro_cat = Product::product_cat();
        $noti = Articles::notification();
        $showAva = Users::showAva($username);
    	return View::make('user.discovery')
    				->with('tieude','Thông tin cá nhân')
    				->with('title','Thông tin cá nhân')
    				->with('info',$userinfo)
    				->with('infor',$data)
    				->with('register',$registerbuy)
    				->with('count',$count)
    				->with('votes',$vote)
    				->with('countgoodvotes',$countgoodvote)
    				->with('allgoodvotes',$allgoodvote)
    				->with('artcat',$art_cat)
    				->with('procat',$pro_cat)
                    ->with('noti',$noti)
                    ->with('ava',$showAva);
    }
    public function send_mail(){
        $data = array(
            'from' => Users::where('username',Session::get('user'))->pluck('email'),
            'to' => Users::where('username',Input::get('username'))->pluck('email'),
            'sub' => Input::get('name_mail'),
            'content' => Input::get('content_mail')
            );
        Mail::send('user/mail',$data, function($message) use ($data)
        {
            $message->to($data['to'])->from($data['from'])->subject($data['sub']);
        });
        return Redirect::to('/');
    }
    // theo doi
    public function follower($username){
        $input = array(
            'user_id' => Users::where('username',$username)->pluck('user_id'),
            'follow_by_user' => Users::where('username',Session::get('user'))->pluck('user_id')
            );
        DB::table('user_follow')->insert($input);
        return View::make('ajax/unfollow')
        ->with('username',$username);
    }
    public function following($username){
        $input = array(
            'user_id' => Users::where('username',$username)->pluck('user_id'),
            'follow_by_user' => Users::where('username',Session::get('user'))->pluck('user_id')
            );
        DB::table('user_follow')->insert($input);
        return Redirect::to('personal/infor/'.Session::get('user'));
    }
    // huy theo doi
    public function unfollow($username){
        DB::table('user_follow')
                ->where('user_id',Users::where('username',$username)->pluck('user_id'))
                ->where('follow_by_user',Users::where('username',Session::get('user'))->pluck('user_id'))
                ->delete();
       return View::make('ajax/follow')
        ->with('username',$username);
    }
    //
    public function unfollowing($username){
        DB::table('user_follow')
                ->where('user_id',Users::where('username',$username)->pluck('user_id'))
                ->where('follow_by_user',Users::where('username',Session::get('user'))->pluck('user_id'))
                ->delete();
       return Redirect::to('personal/infor/'.Session::get('user').'/following');
            
    }
    //
    public function unfollower($username){
        DB::table('user_follow')
                ->where('user_id',Users::where('username',Session::get('user'))->pluck('user_id'))
                ->where('follow_by_user',Users::where('username',$username)->pluck('user_id'))
                ->delete();
       return Redirect::to('personal/infor/'.Session::get('user').'/follower');
    }
    //
    public function listregis($id){
        $data = DB::table('register_buy')
                    ->join('user','register_buy.userregister_id','=','user.user_id')
                    ->where('art_id',$id)->get();
        return View::make('ajax/listregis')
                    ->with('data',$data);
    }
    //update thong tin khach hang
    public static function updateInfo()
    {
                 Users::updateInfo();
                 return Redirect::to('personal/infor/'.Session::get('user').'/history');
    }
    //insert avatar
    public function uploadImageFile() { // Note: GD library is required for this function

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $iWidth = $iHeight = 200; // desired image result dimensions
        $iJpgQuality = 90;

        if ($_FILES) {
            // if no errors and size less than 250kb
            if (! $_FILES['image_file']['error'] && $_FILES['image_file']['size'] < 250 * 1024) {
                if (is_uploaded_file($_FILES['image_file']['tmp_name'])) {

                    // new unique filename
                    $sfilnames=md5(time().rand());
                    $sTempFileName = 'public/uploads/ava/'.$sfilnames;

                    // move uploaded file into cache folder
                    move_uploaded_file($_FILES['image_file']['tmp_name'], $sTempFileName);

                    // change file permission to 644
                    @chmod($sTempFileName, 0644);

                    if (file_exists($sTempFileName) && filesize($sTempFileName) > 0) {
                        $aSize = getimagesize($sTempFileName); // try to obtain image info
                        if (!$aSize) {
                            @unlink($sTempFileName);
                            return;
                        }

                        // check for image type
                        switch($aSize[2]) {
                            case IMAGETYPE_JPEG:
                                $sExt = '.jpg';

                                // create a new image from file 
                                $vImg = @imagecreatefromjpeg($sTempFileName);
                                break;
                            /*case IMAGETYPE_GIF:
                                $sExt = '.gif';

                                // create a new image from file 
                                $vImg = @imagecreatefromgif($sTempFileName);
                                break;*/
                            case IMAGETYPE_PNG:
                                $sExt = '.png';

                                // create a new image from file 
                                $vImg = @imagecreatefrompng($sTempFileName);
                                break;
                            default:
                                @unlink($sTempFileName);
                                return;
                        }

                        // create a new true color image
                        $vDstImg = @imagecreatetruecolor( $iWidth, $iHeight );

                        // copy and resize part of an image with resampling
                        imagecopyresampled($vDstImg, $vImg, 0, 0, (int)$_POST['x1'], (int)$_POST['y1'], $iWidth, $iHeight, (int)$_POST['w'], (int)$_POST['h']);

                        // define a result image filename
                        $sResultFileName = $sTempFileName . $sExt;
                        $fullname=$sfilnames.$sExt;
                        // output image to file
                        imagejpeg($vDstImg, $sResultFileName, $iJpgQuality);
                        @unlink($sTempFileName);
                        Users::where('user_id',Users::where("username",Session::get('user'))->pluck('user_id'))->update(array('avatar'=>$fullname));
                        // DB::table('user_ava')
                        //         ->insertGetId(array(
                        //             "user_id"=>Users::where("username",Session::get('user'))->pluck('user_id'),
                        //             "url_img_ava"=>$fullname
                        //             ));
                        return Redirect::to('personal/infor/'.Session::get("user").'/history');


                    }
                }
            }
        }
    }
    }
    public function uploadCoverFile() { // Note: GD library is required for this function

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $iWidth =  518;// desired image result dimensions
        $iHeight = 260;
        $iJpgQuality = 90;

        if ($_FILES) {
            // if no errors and size less than 250kb
            if (! $_FILES['image_file']['error'] && $_FILES['image_file']['size'] < 1024 * 1024) {
                if (is_uploaded_file($_FILES['image_file']['tmp_name'])) {

                    // new unique filename
                    $sfilnames=md5(time().rand());
                    $sTempFileName = 'public/uploads/cover/'.$sfilnames;

                    // move uploaded file into cache folder
                    move_uploaded_file($_FILES['image_file']['tmp_name'], $sTempFileName);

                    // change file permission to 644
                    @chmod($sTempFileName, 0644);

                    if (file_exists($sTempFileName) && filesize($sTempFileName) > 0) {
                        $aSize = getimagesize($sTempFileName); // try to obtain image info
                        if (!$aSize) {
                            @unlink($sTempFileName);
                            return;
                        }

                        // check for image type
                        switch($aSize[2]) {
                            case IMAGETYPE_JPEG:
                                $sExt = '.jpg';

                                // create a new image from file 
                                $vImg = @imagecreatefromjpeg($sTempFileName);
                                break;
                            /*case IMAGETYPE_GIF:
                                $sExt = '.gif';

                                // create a new image from file 
                                $vImg = @imagecreatefromgif($sTempFileName);
                                break;*/
                            case IMAGETYPE_PNG:
                                $sExt = '.png';

                                // create a new image from file 
                                $vImg = @imagecreatefrompng($sTempFileName);
                                break;
                            default:
                                @unlink($sTempFileName);
                                return;
                        }

                        // create a new true color image
                        $vDstImg = @imagecreatetruecolor( $iWidth, $iHeight );

                        // copy and resize part of an image with resampling
                        imagecopyresampled($vDstImg, $vImg, 0, 0, (int)$_POST['x1'], (int)$_POST['y1'], $iWidth, $iHeight, (int)$_POST['w'], (int)$_POST['h']);

                        // define a result image filename
                        $sResultFileName = $sTempFileName . $sExt;
                        $fullname=$sfilnames.$sExt;
                        // output image to file
                        imagejpeg($vDstImg, $sResultFileName, $iJpgQuality);
                        @unlink($sTempFileName);
                        Users::where('user_id',Users::where("username",Session::get('user'))->pluck('user_id'))->update(array('cover'=>$fullname));
                        // DB::table('user_ava')
                        //         ->insertGetId(array(
                        //             "user_id"=>Users::where("username",Session::get('user'))->pluck('user_id'),
                        //             "url_img_ava"=>$fullname
                        //             ));
                        return Redirect::to('personal/infor/'.Session::get("user"));


                    }
                }
            }
        }
    }
    }
    public function test(){
        $data = Articles::whereNotIn('art_id',function($query){
                $query->select('art_id')
                                ->from('register_buy')
                                ->where('userregister_id',Users::where('username',Session::get('user'))->pluck('user_id'))
                                ->get();
            })->where('tinhtrang',1)
        ->where(function($query){
            $query->where('id_cluster',1)
                  ->orwhere('id_cluster',2);
        })
        ->get();
        return View::make('upload')
        ->with('data',$data);
    }
    public function notification(){
        $noti = Articles::notification();
        DB::table('article_comments')
        ->whereIN('art_id',function($query){
            $query -> select('art_id')
                    ->from('articles')
                    ->where('user_id',Users::where('username',Session::get('user'))->pluck('user_id'))
                    ->get();
        })->update(array('notification'=>0));
        return View::make('user.notify')
                    ->with('noti',$noti)
                    ->with('title','Thông Báo')
                    ->with('tieude','Thông Báo');
    }
    //share
    public function share($id){
        $input = array(
                'user_id'=>Users::where('username',Session::get('user'))->pluck('user_id'),
                'art_id'=>$id,
                'date_share'=>date('Y-m-d H:i:s')
            );
        DB::table('share')->insert($input);
        return View::make('user/share');
    }
     public function showRecent(){
        $recentReg = Users::showRecentReg();
        $recentpost = Users::showRecentPost();
        $countOutStock = Users::countOutStock();
        $countOS = Users::countOS();
        $countStock = Users::countStock();
        $recentNews = Users::recentNews();
        $countRegBuy = Users::countRegBuy();
        $countProcess = Users::countProcess();
        return View::make('admin/report/reportday')
                        ->with('recentNews',$recentNews)
                        ->with('countRegBuy',$countRegBuy)
                        ->with('countOS',$countOS)
                        ->with('countStock',$countStock)
                        ->with('recentReg',$recentReg)
                        ->with('OutStock',$countOutStock)
                        ->with('countProcess',$countProcess)
                        ->with('recentpost',$recentpost);

    }
    public function contact(){
        $data = array(
            'from' => Input::get('email'),
            'to' => 'ngocphu.uit@gmail.com',
            'sub' => Input::get('name'),
            'content' => Input::get('message')
            );
        Mail::send('user/mail',$data, function($message) use ($data)
        {
            $message->to($data['to'])->from($data['from'])->subject($data['sub']);
        });
        return Redirect::to('lienhe');
    }
    public function showOrder(){
        $showOrder = Users::processing();
        return View::make('admin/tables/order')
                        ->with('showOrder',$showOrder);
    }
    public function expired(){
        $expired = Users::expired();
        return View::make('admin/tables/expired')
                        ->with('expired',$expired);
    }
    public function bill(){
        $bill = Users::bill();
        return View::make('admin/tables/bill')
                        ->with('bill',$bill);
    }
    public function findfriend(){
        $find = Users::findfriend();
        $noti = Articles::notification();
        return View::make('user/findfriend')
            ->with('title','Tìm kiếm bạn bè')
            ->with('tieude','Tìm kiếm bạn bè')
            ->with('noti',$noti)
            ->with('find',$find);
    }
    public function socum(){
        $socum = Input::get('socum');
        DB::statement(DB::raw('CALL kmeans_province('.$socum.');'));
        return Redirect::to('admin');
    }
}