<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/
/*index*/

// Route::get('example',function(){
// 	$data = Users::get();
// 	Cart::add('192ao12', 'Product 1', 1, 9.99);
// 	Cart::add('1239ad0', 'Product 2', 2, 5.95, array('size' => 'large'));
// 	//$get = Cart::get('48fbda389bdf5384a826acc3d7164a1a');
// 	$c1 = Cart::count();      // Total items
//  	$c2 = Cart::count(false);
// 	$content = Cart::content();
// 	$s =  Cart::search(array('id' => '7'));
// 	return View::make('test')
// 				->with('cart',$content)
// 				->with('c1',$c1)
// 				->with('c2',$c2)
// 				->with('s',$s);
// 				//->with('get',$get) ;
// });

// Route::get('example1',array(
// 	//$data = Articles::show_all_articles('baohoason615');
// 	//return View::make('upload')
// 	//->with('data',$data);
// 	'uses'=>'ArticlesController@showcount'

// ));
Route::get('/', array(
	'uses'=>'AdminPostProController@showProduct'
));
Route::get('product/all', array(
	'uses'=>'AdminPostProController@showAll'
));
Route::get('product/phone', array(
	'uses'=>'AdminPostProController@showPhone'
));
Route::get('product/lap', array(
	'uses'=>'AdminPostProController@showLap'
));

/*Login*/
Route::get("viewlogin", array(
	'uses' => 'UserController@viewlogin'
));

Route::post('login', array(
    'uses' => 'UserController@actionlogin'
));

Route::get('logout', array(
    'as' => 'logout',
    'uses' => 'UserController@actionlogout'
));
/*register user*/
Route::post('check_register', array(
	"as"=>"check_register",
	"uses"=>"UserController@check_register"
));

Route::post('user/register', array(
    'uses' => 'UserController@register'
));

/*thông tin cá nhân*/
// Route::get('user/infor',array(
// 	'as'=>'userinfo',
// 	'uses'=>'UserController@userinfo'
// ));
Route::get('personal/infor/{username}/follower',array(
	'as'=>'follower',
	'uses'=>'UserController@showfollower'
))->before('checklogin');
Route::get('personal/infor/{username}/following',array(
	'as'=>'following',
	'uses'=>'UserController@showfollowing'
))->before('checklogin');
		//xem thông tin
Route::get('personal/infor/{username}',array(
	'as'=>'infor_personal',
	'uses'=>'UserController@showinfor'
))->before('checklogin');
//
Route::get('personal/infor/{username}/history',array(
	'as'=>'history_personal',
	'uses'=>'UserController@history'
));
Route::get('personal/infor/{username}/trade',function(){
	return View::make('user.tradehis');
});
Route::get('personal/infor/{username}/notify',function(){
	return View::make('user.notify');
});
Route::get('personal/infor/{username}/findfriend',function(){
	return View::make('user.findfriend');
});

/*thông tin bài đăng*/
		//theo mặt hàng
Route::get('articles/{mathang}',array(
	'as'=>'mathang',
	'uses'=>'ArticlesController@showArticles'
));
		//chi tiết thông tin bài đăng.
Route::get('articles/{mathang}/{id}',array(
	'as'=>'chitiet',
	'uses'=>'ArticlesController@ArticleDetail'
))->where('id','[0-9]+');
Route::get('articles/{mathang}/{id}/buy',array(
	'as'=>'chitiet',
	'uses'=>'ArticlesController@registerbuy'
))->where('id','[0-9]+')->before('checklogin');
Route::get('articles/{mathang}/{id}/unbuy',array(
	'as'=>'chitiet',
	'uses'=>'ArticlesController@unregisterbuy'
))->where('id','[0-9]+');
//comment bai dang
Route::post('article/comment', array(
	'uses'=>'ArticlesController@comment'
));
//like bai dang
Route::get('like/{post}', array(
	'uses'=>'ArticlesController@like'
))->before('checklogin');
// đăng sản phẩm bán
Route::post('article/postart', array(
	'as'=>'post_article',
	'uses'=>'ArticlesController@postarticle'
))->before('checklogin');
Route::post('article/postart2', array(
	'as'=>'post_article2',
	'uses'=>'ArticlesController@postarticle2'
))->before('checklogin');
// vote sản phẩm
Route::get('article/{id}/{vote}', array(
	'as'=>'vote_array',
	'uses'=>'ArticlesController@vote_art'
))->where('vote', '[0-1]');
// Route::get('articles/{mathang}/{id}','ArticlesController@ArticleDetail', function($mathang,$id){
// 	//chi tiết thông tin bài đăng.
// })->where('id','[0-9]+');
Route::get('personal/history/findfriend', function(){
	$noti = Articles::notification();
	return View::make('user.findfriend')
	->with('noti',$noti)
	->with('title','tìm bạn')
	->with('tieude','tìm bạn');
});

Route::get('personal/history/notify', array(
	'uses'=>'UserController@notification'
));

// close topic 
Route::get('closetopic/{id}',array(
	'uses'=>'ArticlesController@closetopic'
));
Route::get('opentopic/{id}',array(
	'uses'=>'ArticlesController@opentopic'
));
Route::get('unregis/{id}',array(
	'uses'=>'ArticlesController@unreg'
));
Route::post('sendmail', array(
	'uses'=>'UserController@send_mail'
))->before('checklogin');
//follow
Route::get('follow/{username}',array(
	'uses'=>'UserController@follower'
));
Route::get('following/{username}',array(
	'uses'=>'UserController@following'
));
//unfollow
Route::get('unfollow/{username}',array(
	'uses'=>'UserController@unfollow'
));
Route::get('unfollowing/{username}',array(
	'uses'=>'UserController@unfollowing'
));
Route::get('unfollower/{username}',array(
	'uses'=>'UserController@unfollower'
));
///example
Route::get('email',function(){
	$data = array(
		'to'=>'phunn.uit@gmail.com',
		'content'=>'test'
		);
	Mail::send('user/mail', $data, function($ms) use ($data){
		$ms->to('phunn.uit@gmail.com')->subject('laravel_mailer');
	});
	return 'Done!';
});
Route::get('user/upload', function(){
	return View::make('upload');
});
Route::post('user/upload', array(
	'uses'=>'ArticlesController@post_upload'
	));
Route::get('list/register/{id}',array(
    'uses'=>'UserController@listregis'
));
//---------------------------------------------------ADMIN------------------------------------------------
Route::get('admin', array(
	'as'=>'admin_index',
	'uses'=>'AdminController@index'
))->before('checklogin');
// Route::group(array('prefix' => 'admin'), function() {
//     Route::get('admin/user', 'Admin_UsersController@showuser');
// });
Route::get('admin/user', array(
	'as'=>'admin_user',
	'uses'=>'AdminUserController@showuser'
))->before('checklogin');
//lock user
Route::get('admin/user/lock/{id}', array(
	'as'=>'admin_user_lock',
	'uses'=>'AdminUserController@lock'
))->before('checklogin');
//unlock
Route::get('admin/user/unlock/{id}', array(
	'as'=>'admin_user_unlock',
	'uses'=>'AdminUserController@unlock'
))->before('checklogin');
//post
Route::get('admin/post', array(
	'as'=>'admin_post',
	'uses'=>'AdminPostController@showuser'
))->before('checklogin');
//lock post
Route::get('admin/post/lock/{id}', array(
	'as'=>'admin_post_lock',
	'uses'=>'AdminPostController@lock'
))->before('checklogin');
//unlock
Route::get('admin/post/unlock/{id}', array(
	'as'=>'admin_post_unlock',
	'uses'=>'AdminPostController@unlock'
))->before('checklogin');
//////quan ly san pham cong ty
Route::get('admin/product', array(
	'as'=>'admin_product',
	'uses'=>'AdminProductController@showproduct'
))->before('checklogin');
//////phan quyen
Route::get('admin/privilege', array(
	'as'=>'admin_pri',
	'uses'=>'AdminUserController@privilege'
))->before('checklogin');
//chinh sua phan quyen
Route::post('admin/privilege/{id}',array(
	'as'=>'admin_pri_edit',
	'uses'=>'AdminUserController@privilege_edit'
))->before('checklogin');
//
Route::get('admin/charts', function()
{
	return View::make('admin/charts');
});
//them san pham
Route::get('admin/postproduct', array(
	'as'=>'admin_postproduct',
	'uses'=>'AdminPostProController@showCate'
));
Route::post('testpost', array(
    'uses' => 'AdminPostProController@insertProduct'
));

//update thông tin cá nhân
Route::post('infoupdate', array(
    'uses' => 'UserController@updateInfo'
));
//avatar
//up ảnh đại diện
Route::post('avaupload', array(
    'uses' => 'UserController@uploadImageFile'
));
//upcover
Route::post('coverupload', array(
    'uses' => 'UserController@uploadCoverFile'
));
Route::get('backup',function(){
	return View::make('backup');
});
//post
Route::get('admin/news', array(
	'uses'=>'AdminPostProController@allnews'
));
Route::get('admin/news/{id}',array(
	'uses'=>'AdminPostProController@editnews'
));
Route::post('admin/news/edit',array(
	'uses'=>'AdminPostProController@updatenews'
));
Route::get('admin/post_news', function()
{
	return View::make('admin/post_news');
});
Route::post('admin/newspost', array(
    'uses' => 'AdminPostProController@insertPost'
));
//post-news
Route::get('news', array(
    'uses' => 'AdminPostProController@showNews'
));
Route::get('news/details/{id}', array(
	'uses'=>'AdminPostProController@showNewsDetails'
));
// chat room
Route::get('chat', function(){
	return View::make('chat.ajax-chat')
	->with('title','Chat room')
	->with('tieude','Phòng Chat')
	->with('infor',Users::where('username',Session::get('user'))->get());
})->before('checklogin');

Route::get('product/details/{id}', array(
	'uses'=>'AdminPostProController@showProductDetail'
));
Route::post('product/comments', array(
	'uses'=>'AdminPostProController@comments'
))->before('checklogin');
Route::get('personal/gallery/{username}', array(
	'uses'=>'AdminUserController@showAblums'
));
Route::get('product/cart', function()
{
	$total = Cart::count();
	$content = Cart::content();
	return View::make('product/cart')
		->with('tieude','Trang giỏ hàng')
		->with('title','Chi tiết giỏ hàng')
		->with('infor',Users::where('username',Session::get('user'))->get())
		->with('data',$content)
		->with('total',$total);
})->before('checklogin');

Route::get('product/cart/{id}',array(
	'uses'=>'ProductController@addcart'
))->before('checklogin');

Route::get('product/cartnext', array(
	'uses'=>'ProductController@checkout'
));
Route::post('product/checkout', array(
	'uses'=>'ProductController@thanhtoan'
));
Route::post('product/updatecart', array(
	'uses'=>'ProductController@updatecart'
));
Route::get('product/delete/{rowid}', array(
	'uses'=>'ProductController@delete'
));
//share
Route::get('share/{id}',array(
	'uses'=>'UserController@share'
))->before('checklogin');
//report
Route::get('admin/report/day', array(
	'uses'=>'UserController@showRecent'
));
Route::post('admin/recent', array(
	'uses'=>'ArticlesController@recent'
));
Route::post('admin/recentPost', array(
	'uses'=>'ArticlesController@recentPost'
));

Route::get('admin/fixproduct/{id}', array(
	'uses'=>'AdminPostProController@fixProduct'
));
Route::get('admin/block/{id}', array(
	'uses'=>'AdminPostProController@blockProduct'
));
Route::get('admin/unblock/{id}', array(
	'uses'=>'AdminPostProController@unblockProduct'
));
Route::post('productUpdate', array(
    'uses' => 'AdminPostProController@productUpdate'
));

//find Ad
Route::post('product/searchAd/{mathang}', array(
	'as'=>'mathang',
    'uses' => 'ArticlesController@findAd'
));
Route::post('product/findproduct/{mathang}', array(
	'as'=>'mathang',
	'uses'=>'ArticlesController@findAd'
));
Route::post('product/keyword/{mathang}', array(
	'as'=>'mathang',
    'uses' => 'ArticlesController@keyword'
));
//contact
Route::get('lienhe',function(){
	$infor=Users::where('username',Session::get('user'))->get();
	return View::make('lienhe')
					->with('title','Liên Hệ')
					->with('tieude','Liên Hệ')
    				->with('infor',$infor);
});
Route::post('contact',array(
	'uses'=>'UserController@contact'
));
Route::get('admin/order', array(
	'uses'=>'UserController@showOrder'
));
Route::get('admin/delive/{id}', array(
	'uses'=>'AdminPostProController@deliveProduct'
));
Route::get('admin/expired', array(
	'uses'=>'UserController@expired'
));
Route::get('admin/bill', array(
	'uses'=>'UserController@bill'
));

Route::get('user/findfriend', array(
	'uses'=>'UserController@findfriend'
));
Route::post('admin/socum',array(
	'as'=>'socumvung',
	'uses'=>'UserController@socum'
))->before('checklogin');