<!DOCTYPE HTML>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<head>
	<title>{{$title}}</title>
    {{HTML::style('public/css/bootstrap.min.css');}}
    {{HTML::style('public/style.css');}}
    {{HTML::style('public/css/docs.css');}}
    {{HTML::style('public/css/bootstrap-theme.min.css');}}
    {{HTML::style('public/css/personal.css');}}
    {{HTML::style('public/css/register.css');}}
    {{HTML::style('public/css/component-menu.css');}}
    {{HTML::style('public/css/demo-menu.css');}}

    <!-- JS file-->
    {{HTML::script('public/js/jquery 1.8.2.js');}}
    {{HTML::script('public/js/jquery.js');}}

</head>

<body style="margin-top: 60px;;">
<ul id="gn-menu" class="gn-menu-main">
        <li class="gn-trigger">
          <a class="gn-icon gn-icon-menu"><span>Menu</span></a>
          <nav class="gn-menu-wrapper">
            <div class="gn-scroller">
              <ul class="gn-menu">
                <li><a class="gn-icon gn-icon-home" href="{{asset('/')}}">Trang chủ</a></li>
                <li><a class="gn-icon gn-icon-adver" href="{{asset('articles/all')}}">Trang rao vặt</a></li>
               @if(Session::has('user'))
                                <li><a class="gn-icon gn-icon-person" href="{{asset('personal/infor')}}/{{Session::get('user')}}">Trang cá nhân</a></li>
                <li><a class="gn-icon gn-icon-cog">Quản lý tài khoản</a></li>
                                @endif
                <li><a class="gn-icon gn-icon-help">Giúp đỡ</a></li>
                <li>
                  <a class="gn-icon gn-icon-archive" href="{{asset('lienhe')}}">Liên hệ</a>
                </li>
              </ul>
            </div><!-- /gn-scroller -->
          </nav>
        </li>
        <li><a href="#" class="logohead">P2P | Mạng trao đổi &amp; mua bán</a></li>
        <li>
        <div class="gn-search-item">
                    <div class="extra-icon gn-icon gn-icon-search"></div>
            <input placeholder="Tìm kiếm" type="search" class="gn-search">
        </div>
                </li>
                <li>
                    <a href="#" class="logohead page">{{$tieude}}</a>
@include('layout/headp2')
<div class="rgt-wrap">
    <section class="rgt-contain">
        <div class="rgt-content">
            <div class="psn-menu module profile res">
            <p>NƠI MUA BÁN TRAO ĐỔI SẢN PHẨM VÀ KẾT NỐI BẠN BÈ</p>
            @if(isset($err))
            <p class="alert alert-danger">{{$err}}</p>
            @endif
            @if(isset($mes))
            <p class="alert alert-success" style="height: 35px;">{{$mes}}</p>
            @endif
            </div>
            <div class="left-psncontent">
            {{ Form::open(array('url' => 'login', 'method' => 'post', 'role' => 'form', 'class' => 'form-horizontal')) }}
                <div class="psn-menu module">
                    <ul class="list-group">
                      <li class="list-group-item">
                        <span class="profile">
                            <input class="form-control" type="text" name="txtuser" placeholder="Tên đăng nhập hoặc email">
                        </span>
                      </li>
                      <li class="list-group-item">
                        <span class="profile">
                        <div class="input-group">
                            <input class="form-control" type="password" name="txtpass" placeholder="Mật khẩu">
                            <span class="input-group-btn">
                            <input type="submit" class="btn btn-default" value="Đăng nhập" >
                            </span>
                        </div>
                        </span>
                      </li>
                      <li class="list-group-item">
                        <span class="profile">
                        <label class="checkbox-inline">
                          <input type="checkbox" id="inlineCheckbox1" value="option1"> Nhớ mật khẩu - 
                          <a href="#">Quên mật khẩu?</a>
                        </label>
                        @if(isset($error))
                            @foreach ($error->all()  as $mess) 
                              <div class="alert alert-danger">
                                <button type="button" class="close" data-dismiss="alert">x</button>
                                {{ $mess }}
                            </div>
                            @endforeach
                          @endif
                          @if(isset($loi))
                            <div class="alert alert-danger">
                                <button type="button" class="close" data-dismiss="alert">x</button>
                                {{ $loi }}
                            </div>
                          @endif
                        <span>
                      </li>
                    </ul>
                </div>
             {{ Form::close() }}
            </div><!--left psn-->
            <div class="right-rgt">
            {{ Form::open(array('url' => 'check_register', 'method' => 'post', 'role' => 'form', 'class' => 'form-horizontal')) }}
                <div class="psn-menu module">
                    <ul class="list-group">
                        <span class="profile">
                        <a href="#" class="list-link" style="padding: 10px 15px; font-size:16px; line-height:20px;">Bạn chưa có tài khoản UrShop? Hãy đăng ký để tham gia với chúng tôi
                        </a>
                        </span>
                      <li class="list-group-item">
                        <span class="profile">
                            <input class="form-control" type="text" name="txtusername" placeholder="Tên tài khoản">
                        </span>
                      </li>
                      <li class="list-group-item">
                        <span class="profile">
                            <input class="form-control" type="email" name="txtemail" placeholder="Email">
                        </span>
                      </li>
                      <li class="list-group-item">
                        <span class="profile">
                        <div class="input-group">
                            <input class="form-control" type="password" name="txtpassword" placeholder="Mật khẩu">
                            <span class="input-group-btn">
                                <input class="btn btn-default" type="submit" value="Đăng Ký">
                            </span>
                        </div>
                        </span>
                      </li>
                    </ul>
                </div>
            {{ Form::close() }}
            </div>
            <div style="clear: both;"></div>
            
        </div>
        
        <div class="rgt-content">
            <span class="profile module">Cần giúp đỡ ?. <a href="#">Hãy liên hệ với chúng tôi.</a></span>
        </div>
    </section>
</div>
{{HTML::script('public/js/bootstrap.min.js');}}
{{HTML::script('public/js/classie-menu.js');}}
        {{HTML::script('public/js/gnmenu.js');}}
        <!-- Add fancyBox main JS and CSS files -->
        {{HTML::script('public/js/bootstrap.min.js');}}
    <script>
      new gnMenu( document.getElementById( 'gn-menu' ) );
    </script>
</body>
</html>