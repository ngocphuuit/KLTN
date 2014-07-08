<?php
Class AdminUserController extends BaseController{
	
	public function showuser(){
		$listuser = Users::all_user();
		return View::make('admin/tables/user')
				->with('list',$listuser);
	}
	public function privilege(){
		$listuser = Users::all_user_level();
		return View::make('admin/tables/privilege')
				->with('list',$listuser)
				->with('level',DB::table('level')->get());
	}
	public function privilege_edit($id){
		$level = Input::get('level');
		Users::where('user_id',$id)->update(array('level' => $level));
		return Redirect::to('admin/privilege');
	}
	public function lock($id){
		Users::where('user_id',$id)->update(array('user_type_id' => 0));
		return Redirect::to('admin/user');
	}
	public function unlock($id){
		Users::where('user_id',$id)->update(array('user_type_id' => 1));
		return Redirect::to('admin/user');
	}
	public function showAblums($username){
		$user = Users::where('username',$username)->get();
		$album=Product::showAlbums($username);
		$noti = Articles::notification();
		return View::make('user/gallery')
			->with('album',$album)
			->with('title','Album')
			->with('tieude','Album')
			->with('noti',$noti)
			->with('infor',$user);
	}
}