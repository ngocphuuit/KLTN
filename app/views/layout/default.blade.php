<!DOCTYPE HTML>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<head>
	<title>{{$title}}</title>
    {{HTML::style('public/css/bootstrap.min.css');}}
    {{HTML::style('public/css/docs.css');}}
    {{HTML::style('public/css/rateit.css');}}
    {{HTML::style('public/style.css');}}
    {{HTML::style('public/css/camera.css');}}
    {{HTML::style('public/css/component.css');}}
    {{HTML::style('public/css/demo-menu.css');}}
    {{HTML::style('public/css/component-menu.css');}}
    {{HTML::style('public/css/ClassifiedAd.css');}}
    {{HTML::style('public/css/search.css');}}
    {{HTML::script('public/js/jsapi.js');}}
    {{HTML::script('public/js/search.js');}}
    <!-- JS file-->

    {{HTML::script('public/js/jquery 1.8.2.js');}}
    {{HTML::script('public/js/tooltip.js');}}
    {{HTML::script('public/js/jquery.js');}}
    {{HTML::script('public/js/jquery.mousewheel-3.0.6.pack.js');}}
    {{HTML::script('public/js/modernizr.custom.js');}}
    {{HTML::script('public/js/jquery.prettyPhoto.js');}}
    {{HTML::script('public/js/jquery.tipsy.js');}}
    {{HTML::script('public/js/jquery.easing.1.3.js');}}
    {{HTML::script('public/js/camera.min.js');}}
    {{HTML::script('public/js/jquery-hover-effect.js');}}
    {{HTML::script('public/js/jquery.quovolver.js');}}
    {{HTML::script('public/js/custom.js');}}
    <!-- Optional theme -->
    <!-- Add mousewheel plugin (this is optional) -->
    <!-- Latest compiled and minified JavaScript -->
    <meta charset="UTF-8" />

</head>
<style type="text/css">
.breadcrumb{
    padding: 8px 15px;
    margin-bottom: 20px;
    list-style: none;
    background-color: rgba(99,54,176,0.3);
    border-radius: 4px;
    border: 1px solid white;
    box-shadow: 3px 3px 3px rgba(0,0,0,.1);
}
.breadcrumb>.active {
color: white;
}
.nav-tabs>li.active>a, .nav-tabs>li.active>a:hover, .nav-tabs>li.active>a:focus {
color: #555555;
background-color: transparent;
border: 1px solid white;
border-bottom-color: transparent;
cursor: default;}

.nav-tabs>li>a {
margin-right: 2px;
line-height: 1.428571429;
border: 1px solid white;
border-radius: 4px 4px 0 0;
background: rgba(0,0,0,0.1);
}
.panel-default{
    border: 0px;
}
.panel{
    background: none;
}
.panel-default>.panel-heading {
margin-bottom: 5px;
border: 1px solid white;
}
</style>
<body>
<ul id="gn-menu" class="gn-menu-main">
				<li class="gn-trigger">
					<a class="gn-icon gn-icon-menu"><span>Menu</span></a>
					<nav class="gn-menu-wrapper">
						<div class="gn-scroller">
							<ul class="gn-menu">
                                <li><a class="gn-icon gn-icon-home onchoose" href="{{asset('/')}}">Trang chủ</a></li>
                                <li><a class="gn-icon gn-icon-adver" href="{{asset('articles/all')}}">Trang rao vặt</a></li>
                                <li><a class="gn-icon gn-icon-news" href="{{asset('news')}}">Trang tin tuc</a></li>
                                <li><a class="gn-icon gn-icon-chat" href="{{asset('chat')}}">Phòng chat</a></li>
                                @if(Session::has('user'))
                                <li><a class="gn-icon gn-icon-person" href="{{asset('personal/infor')}}/{{Session::get('user')}}">Trang cá nhân</a></li>
								<li><a class="gn-icon gn-icon-cog" href="{{asset('personal/infor')}}/{{Session::get('user')}}/{{('history')}}">Quản lý tài khoản</a></li>
                                @endif
								<li>
									<a class="gn-icon gn-icon-archive" href="{{asset('lienhe')}}">Liên hệ</a>
								</li>
							</ul>
						</div><!-- /gn-scroller -->
					</nav>
				</li>
				<li><a href="{{asset('/')}}" class="logohead">P2P | Mạng trao đổi &amp; mua bán</a></li>
				<li>
				<form id="searchform">
                <div class="gn-search-item">
                    <div class="extra-icon gn-icon gn-icon-search"></div>
                    <input id="inputString" onkeyup="lookup(this.value);" placeholder="Tìm kiếm" type="search" class="gn-search">
                    <div id="suggestions"></div>
                </div></li>
                </form>     </li>
                <li>
                    <a href="#" class="logohead page">{{$tieude}}</a>
                </li>
                <li>
                    <ul class="userul">
                    @foreach($infor as $infos)
                    @endforeach
                        @if(Session::has('user'))
                        <li>
                            <img src="{{asset('public/uploads/ava')}}/{{$infos->avatar}}" alt="" class="imgtiny">
                            <div class="nametiny"><a href="{{asset('personal/infor')}}/{{Session::get('user')}}">{{Session::get('user')}} </a></div>
                           
                        </li>
                        <li>
                            <a href="{{asset('logout')}}">Đăng xuất</a>
                        </li>
                    @else
                        <li>
                            <a href="{{asset('viewlogin')}}">Đăng nhập/Đăng ký</a>
                        </li>
                        @endif
                    </ul>
                </li>
</ul>

@yield('content');

<div class="foot">
    <div class="container">
    <div class="foot-menu">
        <section class="wwid">
        </section>
        <section class="block">
            <h3>LUXURY MOBILE PHONES</h3>
            <ul class="block-list">
                <li>
                    <a href="http://www.mainguyen.vn/dien-thoai/mobiado.html">- Mobiado Luxury Mobile Phones</a>
                </li>
                <li>
                    <a href="http://www.mainguyen.vn/dien-thoai/mobiado.html">- Mobiado Luxury Mobile Phones</a>
                </li>
                <li>
                    <a href="http://www.mainguyen.vn/dien-thoai/mobiado.html">- Mobiado Luxury Mobile Phones</a>
                </li>
            </ul>
        </section>
        <section class="block"><h3>Phụ kiện</h3>
            <ul class="block-list">
                <li>
                    <a href="http://www.mainguyen.vn/dien-thoai/mobiado.html">- Tai nghe</a>
                </li>
                <li>
                    <a href="http://www.mainguyen.vn/dien-thoai/mobiado.html">- Ốp lưng</a>
                </li>
                <li>
                    <a href="http://www.mainguyen.vn/dien-thoai/mobiado.html">- Chuyên trang phụ kiện Samsung chính hãng</a>
                </li>
                <li>
                    <a href="http://www.mainguyen.vn/dien-thoai/mobiado.html">- Phụ kiện Iphone-Ipod</a>
                </li>
            </ul>
        </section>
        <section class="block">
            <section class="social">
                <h3 class="social-tittle">SOCIAL NETWORK</h3>
                <div class="social-content">
                    <div class="social-list">
                        <ul>
                            <li><a href="#">{{HTML::image('/public/img/icon/twitter.png','', array('style'=>'width:40px; height:40px;'));}}</a></li>
                            <li><a href="#">{{HTML::image('/public/img/icon/facebook.png','', array('style'=>'width:40px; height:40px;'));}}</a></li>
                        </ul>
                    </div>
                </div>
            </section>
            <div style="clear: both;"></div>
            <h3>HỆ THỐNG CỬA HÀNG</h3>
            <ul class="block-list">
                <li>
                    <a href="http://www.mainguyen.vn/dien-thoai/mobiado.html">- 14/10 đường số 9, Thủ Đức, TP. HCM- ĐT: (08) 38 208 222 - 38 209 222</a>
                </li>
            </ul>
        </section>
    </div><!-- foot menu -->
    </div>
</div>
</body>
</html>