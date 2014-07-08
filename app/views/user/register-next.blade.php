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
            <div class="psn-menu module profile res">HÃY THAM GIA VỚI CHÚNG TÔI NGAY HÔM NAY</div>
        </div>
        <div class="rgt-content">

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

            <div class="module">
                    <div class="psn-menu profile res">
                        {{ Form::open(array('url' => 'user/register', 'method' => 'post', 'role' => 'form', 'class' => 'form-horizontal')) }}
                        <span class="profile">
                                    <div class="title-block">Tên đăng nhập của bạn</div>
                                    @if(Session::has('Sesuser'))
                                    {{Form::text('username',Session::get('Sesuser'),array('class'=>'form-control rgtnext-left','placeholder'=>'Tên tài khoản'))}}
                                    <div class="test-right alert alert-success">Tài khoản có thể sử dụng</div>
                                    @else
                                    {{Form::text('username',null,array('class'=>'form-control rgtnext-left','placeholder'=>'Tên tài khoản'))}}
                                    <div class="test-right alert alert-danger">Tài khoản đã tồn tại !</div>
                                    @endif
                                    <div class="clearfix"></div>
                            </span>
                            <span class="profile">
                                    <div class="title-block">Địa chỉ Email</div>
                                    @if(Session::has('Sesemail'))
                                    {{Form::email('email',Session::get('Sesemail'),array('class'=>'form-control rgtnext-left','placeholder'=>'Email'))}}
                                    <div class="test-right alert alert-success">Email có thể sử dụng</div>
                                    @else
                                     {{Form::email('email',null,array('class'=>'form-control rgtnext-left','placeholder'=>'Email'))}}
                                    <div class="test-right alert alert-danger">Email này đã được sử dụng</div>
                                    @endif
                                    <div class="clearfix"></div>
                            </span>
                            <span class="profile">

                                    <div class="title-block">Tạo mật khẩu</div>
                                    <input type="password" class="form-control rgtnext-left" placeholder = "Mật khẩu" name="password" value="{{Session::get('Sespass')}}">
                                    <div class="test-right alert alert-success">Mật khẩu tốt</div>
                                    <div class="clearfix"></div>
                            </span>
                            <span class="profile">
                                    <div class="title-block">Họ và tên</div>
                                    {{Form::text('firstname',null,array('class'=>'form-control rgtnext-left','placeholder'=>'Họ và tên của bạn'))}}
                                    <div class="test-right alert alert-info">Điền vào họ tên của bạn</div>
                                    <div class="clearfix"></div>
                            </span>
                             <span class="profile">
                                    <div class="title-block">Tỉnh thành</div>
                                    <select name="tinh" id="tinh" class="form-control rgtnext-left">
                                        @foreach($tinhthanh as $tinh)
                                            <option value="{{$tinh->province_id}}">{{$tinh->province_name}}</option>
                                        @endforeach
                                    </select>
                                    <div class="test-right alert alert-info">Chọn tỉnh của bạn đang sống</div>
                                    <div class="clearfix"></div>
                            </span>
                            <span class="profile" style="text-align: left;">
                                    <input class="btn btn-success" type="submit" value="Tạo tài khoản">
                            </span>
                       {{ Form::close() }}
                    </div>
                <div class="clearfix"></div>
            </div>
        </div>
        <div class="rgt-content">
            <span class="profile module">Need help? <a href="#">Please contact us.</a></span>
        </div>
    </section>
</div>
{{HTML::script('public/js/bootstrap.min.js');}}
</body>
</html>