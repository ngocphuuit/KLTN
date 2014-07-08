<?php
Class AdminPostController extends BaseController{
	
	public function showuser(){
		$listpost = Articles::all_articles();
		return View::make('admin/tables/post')
				->with('list',$listpost);
	}
	public function lock($id){
		Articles::where('art_id',$id)->update(array('tinhtrang' => 2));
		return Redirect::to('admin/post');
	}
	public function unlock($id){
		Articles::where('art_id',$id)->update(array('tinhtrang' => 1));
		return Redirect::to('admin/post');
	}
}