<?php
Class ProductController extends BaseController{
	public $_count;
	public function __construct(){
		$this->_count = DB::table("user")->where("username","=",Input::get("txtuser"))
									  ->where("password","=",Input::get("txtpass"))
									  ->count();
	}
	public function addcart($id){
		$date = date('Y-m-d');
		$sohoadon = DB::table('order')->where('user_id',Users::where('username',Session::get('user'))->pluck('user_id'))->where('date_buy',$date)->count();
		if($sohoadon >= 1)
		{
			$total = Cart::count();
			return View::make('product/cart')
					->with('tieude','Trang giỏ hàng')
					->with('title','Chi tiết giỏ hàng')
					->with('infor',Users::where('username',Session::get('user'))->get())
					->with('thongbao','Bạn đã đặt 3 hóa đơn trong ngày')
					->with('total',$total);
		}
		else{
		$input = array(
			'id' => $id,
			'name' => DB::table('products')->where('product_id',$id)->pluck('product_name'),
			'qty' => 1,
			'price' => DB::table('products')->where('product_id',$id)->pluck('cost')
			);
		Cart::add($input);
		return Redirect::to('product/cart');
		}
	}
	public function checkout(){
		$mahd = "HD_".str_random(10);
		$content = Cart::content();
		$province = Users::province();
		return View::make('product/cartnext')
		->with('tieude','Trang giỏ hàng')
		->with('title','Chi tiết giỏ hàng')
		->with('data',$content)
		->with('mahd',$mahd)
		->with('province',$province)
		->with('infor',Users::where('username',Session::get('user'))->get());
	}
	public function thanhtoan(){
		$content = Cart::content();
		$input1 = array(
				'order_id'=>Input::get('mahd'),
				'date_buy'=>date('Y-m-d H:i:s'),
				'user_id' =>Users::where('username',Session::get('user'))->pluck('user_id'),
				'total_cost'=>Cart::total()
		);
		DB::table('order')->insert($input1);
		$input2 = array(
				'ship_user_name'=>Input::get('hoten1'),
				'ship_user_email'=>Input::get('email1'),
				'ship_user_address'=>Input::get('diachi1'),
				'ship_user_phone'=>Input::get('sdt1'),
				'order_id'=>Input::get('mahd')
		);
		DB::table('ship_users')->insert($input2);
		$input3 = array(
				'user_id'=>Users::where('username',Session::get('user'))->pluck('user_id'),
				'order_user_name'=>Input::get('hoten'),
				'order_user_email'=>Input::get('email'),
				'order_user_address'=>Input::get('diachi'),
				'order_user_phone'=>Input::get('sdt'),
				'order_id'=>Input::get('mahd')
		);
		DB::table('order_user')->insert($input3);
		foreach($content as $contents)
		{
			$input = array(
				'order_id'=>Input::get('mahd'),
				'product_id'=>$contents->id,
				'number'=>$contents->qty,
				'cost'=>$contents->price,
				'total_price'=>$contents->subtotal
			);
			DB::table('order_details')->insert($input);
		}
		Cart::destroy();
		return Redirect::to('/');
	}
	public function updatecart(){
		$count = Cart::count(false);
		for($i=1 ; $i < $count+1; $i++)
		{
			$rowid = Input::get('rowid'.$i);
			$soluong = Input::get('number'.$i);
			Cart::update($rowid, $soluong);
		}
		return Redirect::to('product/cart');
	}
	public function delete($rowid){
		Cart::remove($rowid);
		return Redirect::to('product/cart');
	}
}