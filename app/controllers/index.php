<?php
/**
*  
*/
class index_Controller extends BaseController
{
	public $restful = true;
	public function get_index{
		$view = View::make('index');
		$view->title = 'Trang';
		return $view;
	}
}

?>