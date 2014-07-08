<?php
Class AdminController extends BaseController{
		public function index(){
			$infor = Users::where('username',Session::get('user'))->get();
			$socum = DB::table('province_clusters')->select(array((DB::raw('count(id) as soluong'))))->get();
			$array = DB::table('article_clusters')->select(array('art_cost as gia'))->groupBy('art_cost')->get();
			return View::make('admin/index')
						->with('datas',$array)
						->with('info',$infor)
						->with('socum',$socum);
		}
}