<!DOCTYPE HTML>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<head>
	<title>{{$title}}</title>
    {{HTML::style('public/css/bootstrap.min.css');}}
    {{HTML::style('public/css/docs.css');}}
    {{HTML::style('public/css/colorbox.css');}}
    {{HTML::style('public/style.css');}}
    {{HTML::style('public/css/component.css');}}
    {{HTML::style('public/css/demo-menu.css');}}
    {{HTML::style('public/css/component-menu.css');}}
    {{HTML::style('public/css/ClassifiedAd.css');}}
    {{HTML::style('public/css/jRating.jquery.css');}}
    {{HTML::style('public/css/personal.css');}}
    {{HTML::style('public/css/discovery.css');}}
    {{HTML::style('public/css/mainava.css');}}
    {{HTML::style('public/css/jquery.Jcrop.min.css');}}
    {{HTML::style('public/css/search.css');}}
    {{HTML::style('public/css/twitter-bootstrap/bootstrap-responsive.css');}}
    {{HTML::script('public/js/jsapi.js');}}
    {{HTML::script('public/js/search.js');}}
    
    <!-- JS file-->
    {{HTML::script('public/js/jquery 1.8.2.js');}}
    {{HTML::script('public/js/jquery.js');}}
    {{HTML::script('public/js/jquery.min.js');}}
    {{HTML::script('public/js/jquery.colorbox.js');}}
    {{HTML::script('public/js/jquery.Jcrop.min.js');}}
    {{HTML::script('public/js/avascript.js');}}
    <!-- Optional theme -->
    <!-- Add mousewheel plugin (this is optional) -->
    <!-- Latest compiled and minified JavaScript -->
    <meta charset="UTF-8" />

</head>

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
                                <li><a class="gn-icon gn-icon-person " href="{{asset('personal/infor')}}/{{Session::get('user')}}">Trang cá nhân</a></li>
                                <li><a class="gn-icon gn-icon-chat" href="{{asset('personal/history/notify')}}">Thông báo mới<span class="badge">
                                          {{-- */$i=0;/* --}}
                                          @foreach($noti as $notifi)
                                             {{-- */$i++;/* --}}
                                          @endforeach
                                          {{$i}}
                                        </span></a></li>
                                <li><a class="gn-icon gn-icon-findperson" href="{{asset('user/findfriend')}}">Tìm bạn bè</a></li>
								<li><a class="gn-icon gn-icon-cog">Tùy chỉnh</a></li>
							</ul>
						</div><!-- /gn-scroller -->
					</nav>
				</li>
				<li><a href="#" class="logohead">P2P | Mạng trao đổi &amp; mua bán</a></li>
				<li>
				<form id="searchform">
                <div class="gn-search-item">
                    <div class="extra-icon gn-icon gn-icon-search"></div>
                    <input id="inputString" onkeyup="lookup(this.value);" placeholder="Tìm kiếm" type="search" class="gn-search">
                    <div id="suggestions"></div>
                </div></li>
                </form></li>
                <li>
                    <a href="#" class="logohead page">{{$tieude}}</a>
                </li>
                <li>
                    <ul class="userul">
                       @if(Session::has('user'))
                        <li>
                            <?php $avatar = DB::table('user')->where('username',Session::get('user'))->pluck('avatar')?>
                            <img src="{{asset('public/uploads/ava')}}/{{$avatar}}" alt="" class="imgtiny">
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