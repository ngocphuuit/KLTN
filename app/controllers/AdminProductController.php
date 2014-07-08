<?php
Class AdminProductController extends BaseController{
	
	public function showproduct(){
		//$listpost = Articles::all_articles();
		return View::make('admin/tables/product')
					->with('data',DB::table('products')->join('product_category','products.category_id','=','product_category.category_id')->orderBy('product_id','desc')->get());
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