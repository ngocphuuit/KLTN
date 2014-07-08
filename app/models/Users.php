<?php
Class Users extends Eloquent{
     protected $guarded = array(
        'id'
    );

	protected $table = 'user';

	public $timestamps = false;

	public static $rulesRegister = array(
		'username' => 'required|unique:user',
        'email' => 'required|unique:user|email',
        'password' => 'required',
        'firstname' => 'required'
    );

    public static $rulesLogin = array(
        'txtuser' => 'required',
        'txtpass' => 'required'
    );

    public static $rulesPasswordChange = array(
        'old_password' => 'required',
        'new_password' => 'required|alphanum|between:4,8|confirmed',
        'new_password_confirmation' => 'required'
    );

    public static function validateRegister($data)
    {
        return Validator::make($data, static::$rulesRegister);
    }

    public static function validateLogin($data)
    {
        return Validator::make($data, static::$rulesLogin);
    }

    public static function validatePublic($data)
    {
        return Validator::make($data,
            array(
                'name' => 'min:4',
                'email' => 'required|email|unique:user,email,' . Auth::user()->id,
                'url' => 'url'
            )
        );
    }

    public static function validatePasswordChange($data)
    {
        return Validator::make($data, static::$rulesPasswordChange);
    }

    //hien thi thong tin nguoi dung
    public static function showinforuser($username)
    {
        return Users::where('username',$username)->get();
    }
    public static function insertUser()
    {
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $date = date('Y-m-d');
        return Users::insert(array(
                "username"=>Input::get("username"),
                "email" =>Input::get("email"),
                "password"=>Hash::make(Input::get("password")),
                "firstname"=>Input::get("firstname"),
                "province_id"=>Input::get("tinh"),
                "reg_time"=>$date,
                "level"=>2
        ));
    }
    //update user
    public static function updateInfo()
    {
            return DB::table('user')
                ->where('username',Session::get('user'))
                ->update(array(
                "firstname"=>Input::get("firstname"),
                "birthday"  =>Input::get("birthday"),
                "sex"   =>Input::get("sex"),
                "phone"=>Input::get("phone"),
                "address"=>Input::get("address")
        ));
    }
    public static function follower($username){
        return Users::whereIn('user_id',function($query){
                                                        $query->select('follow_by_user')
                                                        ->from('user_follow')
                                                        ->where('user_id',Users::where('username',Session::get('user'))
                                                        ->pluck('user_id'));})->get();
    }
    public static function countfollower($username){
        return DB::table('user_follow')->where('user_id',Users::where('username',$username)->pluck('user_id'))->count();
    }
    public static function countfollowing($username){
        return DB::table('user_follow')->where('follow_by_user',Users::where('username',$username)->pluck('user_id'))->count();
    }

    public static function province(){
        return DB::table('province')->get();
    }
    //admin
    public static function all_user(){
        return Users::orderby('user_id','desc')->get();
    }

    public static function all_user_level(){
        return Users::join('level','user.level','=','level.id_level')->get();
    }
    //show avatar
    public static function showAva($username){
        return DB::table('user')
        ->where('username',$username)
        ->get();
    }
    //so nguoi duoc theo doi nhieu nhat
    public static function showfollow(){
        return Users::select(array('user.*',(DB::raw('count(user_follow.user_id) as soluong'))))
                            ->join('user_follow','user.user_id','=','user_follow.user_id')
                            ->groupBy('user_follow.user_id')
                            ->orderBy('soluong','desc')
                            ->skip(0)
                            ->take(5)
                            ->get();
    }
    public static function showinvite(){
        $loai1 = Articles::join('register_buy','register_buy.art_id','=','articles.art_id')
                            ->select(array('categori_id',(DB::raw('count(*) as soluong'))))
                            ->where('register_buy.userregister_id',Users::where('username',Session::get('user'))->pluck('user_id'))
                            ->groupBy('categori_id')
                            ->orderBy('soluong','desc')
                            ->take(1)
                            ->get();
                            foreach($loai1 as $l1)
        $loai2 = Articles::join('register_buy','register_buy.art_id','=','articles.art_id')
                            ->select(array('categori_id',(DB::raw('count(*) as soluong'))))
                            ->where('register_buy.userregister_id',Users::where('username',Session::get('user'))->pluck('user_id'))
                            ->groupBy('categori_id')
                            ->orderBy('soluong','desc')
                            ->skip(1)
                            ->take(1)
                            ->get();
                            foreach($loai2 as $l2)

        return Users::join('articles','articles.user_id','=','user.user_id')
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
            ->where(function($query) use ($l1, $l2) {$query->where('articles.categori_id',$l1->categori_id)->orwhere('articles.categori_id',$l2->categori_id);})
            ->where('user.user_id','<>',Users::where('username',Session::get('user'))->pluck('user_id'))->groupBy('user.user_id')->orderBy(DB::raw('RAND()'))->take(5)->get();
    }
    public static function test1(){
        return Articles::join('register_buy','register_buy.art_id','=','articles.art_id')
                            ->select(array('categori_id',(DB::raw('count(*) as soluong'))))
                            ->where('register_buy.userregister_id',Users::where('username',Session::get('user'))->pluck('user_id'))
                            ->groupBy('categori_id')
                            ->orderBy('soluong','desc')
                            ->skip(1)
                            ->take(1)
                            ->get();
    }
    //report

    public static function recentpost(){
        return Articles::join('user','articles.user_id','=','user.user_id')
                            ->orderBy('username','asc')
                            ->get();
    }
    public static function showRecentReg(){
        $starting_time = new DateTime('today');

        $ending_time = new DateTime('today');
        $ending_time->modify('-7 day');

        return $users = DB::table('user')
                ->whereBetween('reg_time', array($ending_time, $starting_time))
                ->orderby('user_id','desc')
                ->get();

    }
    public static function showRecentPost(){
        $starting_time = new DateTime('today');
        $starting_time->modify('+1 day');
        $ending_time = new DateTime('today');
        $ending_time->modify('-7 day');

        return $users = DB::table('articles')
                ->select(array('username',(DB::raw('count(username) as number'))))
                ->join('user','articles.user_id','=','user.user_id')
                ->whereBetween('date_post', array($ending_time, $starting_time))
                ->groupBy('username')
                ->orderby('number','desc')
                ->get();

    }

    public static function countPost(){
        return DB::table('articles')
                ->select(array('username',(DB::raw('count(username) as number'))))
                ->join('user','articles.user_id','=','user.user_id')
                ->whereBetween('date_post', array(Input::get('begin2'), Input::get('end2')))
                ->groupBy('username')
                ->orderby('number','desc')
                ->get();
    }

    public static function countOutStock(){
        return DB::table('products')
                ->where('number',0)
                ->orderby('product_id')
                ->get();
    }
    public static function countOS(){
        return DB::table('products')
                ->select(array(DB::raw('count(*) as number')))
                ->where('number',0)
                ->orderby('product_id')
                ->get();
    }
    public static function countStock(){
        return DB::table('products')
                ->select(array(DB::raw('count(*) as number')))
                ->get();
    }

    public static function recentNews(){
        $starting_time = new DateTime('today');
        $starting_time->modify('+1 day');
        $ending_time = new DateTime('today');
        $ending_time->modify('-7 day');

        return $users = DB::table('news_post')
                ->select(array('post_id','post_date','post_title','slide','username'))
                ->whereBetween('post_date', array($ending_time, $starting_time))
                ->orderby('post_id','desc')
                ->get();
    }
     public static function countRegBuy(){
        return DB::table('register_buy')
                ->select(array('art_title','register_buy.art_id',(DB::raw('count(register_buy.art_id) as number'))))
                ->join('articles','articles.art_id','=','register_buy.art_id')
                ->groupBy('articles.art_id')
                ->orderby('number','desc')
                ->get();
    }
    public static function selectSearch(){
        return DB::table('count_search')
                ->where('username',Session::get('user'))
                ->where('province_id',Input::get("diadiem"))
                ->where('category_id',Input::get("loai"))
                ->where('min_cost',Input::get("tugia"))
                ->where('max_cost',Input::get("dengia"))
                ->count();
    }
    public static function insertSearch(){
        return DB::table('count_search')
                ->insert(array(
                "username"=>Session::get('user'),
                "province_id" =>Input::get("diadiem"),
                "category_id"=>Input::get("loai"),
                "min_cost"=>Input::get("tugia"),
                "max_cost"=>Input::get("dengia"),
                "count_search"=>1
                ));
    }
    public static function processing(){
        return DB::table('order')
                ->join('order_details','order.order_id','=','order_details.order_id')
                ->join('ship_users','ship_users.order_id','=','order.order_id')
                ->join('payment_method','payment_method.pay_id','=','order.payment_method_id')
                ->join('order_user','order_user.order_id','=','order.order_id')
                ->join('order_status','order_status.order_status_id','=','order.order_status_id')
                ->orderby('date_buy','desc')
                ->get();
    }
    public static function expired(){
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $date = new DateTime('today');
        $date->modify('-3 day');
        return DB::table('order')
                ->join('order_details','order.order_id','=','order_details.order_id')
                ->join('ship_users','ship_users.order_id','=','order.order_id')
                ->join('payment_method','payment_method.pay_id','=','order.payment_method_id')
                ->join('order_user','order_user.order_id','=','order.order_id')
                ->join('order_status','order_status.order_status_id','=','order.order_status_id')
                ->where('date_buy','>','$date')
                ->where('order.order_status_id','=',2)
                ->where('order.delivered','=',1)
                ->orderby('date_buy','desc')
                ->get();
    }
    public static function bill(){
        return DB::table('order')
                ->join('order_details','order.order_id','=','order_details.order_id')
                ->join('ship_users','ship_users.order_id','=','order.order_id')
                ->join('payment_method','payment_method.pay_id','=','order.payment_method_id')
                ->join('order_user','order_user.order_id','=','order.order_id')
                ->join('order_status','order_status.order_status_id','=','order.order_status_id')
                ->where('order.delivered','=',2)
                ->orderby('date_buy','desc')
                ->get();
    }
    public static function findfriend(){
        return DB::table('user')
            ->where('username','!=',Session::get('user'))
            ->whereNotIn('user.user_id',function($query){
                $query->select('follow_by_user')
                            ->from('user')
                            ->join('user_follow','user.user_id','=','user_follow.user_id')
                            ->where('username',Session::get('user'))
                            ->get();
            })
            ->whereIN('province_id',function($query){
                                $query->select('province_id')
                                ->from('province')
                                ->where('cluster_id',DB::table('province')->where('province_id',Users::where('username',Session::get('user'))->pluck('province_id'))->pluck('cluster_id'))
                                ->get();
                                })
            ->orderBy(DB::raw('RAND()'))
            ->take(12)
            ->get();
    }
    //dem so hoa don chua giao hang
     public static function countProcess(){
        return DB::table('order')
                ->select(array('order_id',(DB::raw('count(order_id) as number'))))
                ->where('order_status_id','=',1)//Khach hang da thanh toan
                ->where('delivered','=',1)//chua giao hang
                ->orderby('date_buy','desc')
                ->get();
    }
}