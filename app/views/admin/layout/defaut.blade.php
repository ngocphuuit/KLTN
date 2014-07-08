<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="utf-8">
<title>Admin</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">
{{HTML::style('public/css/twitter-bootstrap/bootstrap.css');}}
{{HTML::style('public/css/twitter-bootstrap/bootstrap-responsive.css');}}
{{HTML::style('public/css/social.css');}}
{{HTML::style('public/css/social.plugins.css');}}
{{HTML::style('public/css/social.examples.css');}}
{{HTML::style('public/css/font-awesome.css');}}
{{HTML::style('public/css/docs.css');}}
{{HTML::style('public/js/jqvmap/jqvmap/jqvmap.css');}}
{{HTML::style('public/css/jchartfx.css')}}
{{HTML::script('public/js/ckeditor/ckeditor.js')}}
{{HTML::script('public/js/chart/jchartfx.system.js')}}
{{HTML::script('public/js/chart/jchartfx.coreVector.js')}}
{{HTML::script('public/js/jquery 1.8.2.js')}}
<link rel="shortcut icon" href="http://cesarlab.com/templates/social/assets/img/favicon.ico"/>
<link rel="icon" type="image/gif" href="../assets/img/favicon.gif">
<style>#g1,#g2,#g3{width:200px;height:160px;display:inline-block; }</style>
<style>.wraper #main{margin-top:40px;}</style>
<script>
        ie = false;
    </script>
 
<!--[if lt IE 9]>
      <script src="/templates/social/assets/js/html5shiv.js"></script>
    <![endif]-->
<!--[if lte IE 8]>
    <script src="/templates/social/assets/js/respond/respond.min.js"></script>
    <script>
        ie = 8;
    </script>
    <![endif]-->
<!--[if lte IE 8]><script language="javascript" type="text/javascript" src="/templates/social/assets/js/jquery-flot/excanvas.min.js"></script><![endif]-->
<script type="text/javascript">
      /*<![CDATA[*/
      var _gaq = _gaq || [];
      _gaq.push(['_setAccount', 'UA-38708835-1']);
      _gaq.push(['_trackPageview']);
      (function() {
        var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
        ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
        var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
      })();
      /*]]>*/
    </script>
</head>
<body>
<div class="wraper sidebar-full">
<!-- __________________________Tùy chỉnh nhanh___________________________ -->
<aside class="social-sidebar sidebar-full">
  <div class="user-settings">
    <div class="arrow"></div>
    <h3 class="user-settings-title">Tùy chỉnh nhanh</h3>
    <div class="user-settings-content">
      <a href="{{asset('personal/infor')}}/{{Session::get('user')}}">
        <div class="icon">
          <i class="icon-user"></i>
        </div>
        <div class="title">Thông tin của tôi</div>
        <div class="content">Xem thông tin của bạn</div>
      </a>
      <a href="{{asset('personal/infor')}}/{{Session::get('user')}}/{{('history')}}">
        <div class="icon">
          <i class="icon-tasks"></i>
        </div>
        <div class="title">Quản lý tài khoản</div>
        <div class="content">Quản lý tài khoản của bạn</div>
      </a>
      <a href="{{asset('logout')}}">
        <div class="icon">
        <i class="icon-off"></i>
        </div>
        <div class="title">Đăng xuất</div>
        <div class="content">Thoát khỏi tài khoản</div>
      </a>
    </div>
    <div class="user-settings-footer">
      <a href="#more-settings">Xem thêm</a>
    </div>
  </div>
  <!-- __________________________Thanh menu trái___________________________________ -->
  <div class="social-sidebar-content">
  <div class="scrollable">
    <!-- __________________________Ava cá nhân___________________________________ -->
      <div>
        <div class="user">
        <img src="{{asset('public/uploads/ava')}}/{{Users::where('username',Session::get('user'))->pluck('avatar');}}" class="avatar" style="width:25px; height:25px;" alt="">
        <span data-toggle="dropdown">{{Session::get('user')}}</span>
        <i class="icon-user trigger-user-settings"></i>
        </div>
        <div class="navigation-sidebar">
        <i class="switch-sidebar-icon icon-chevron-left"></i>
        <i class="switch-sidebar-full icon-chevron-right"></i>
        <span>Danh mục</span>
        </div>
        <div class="search-sidebar">
        <form class="search-sidebar-form">
        <input type="text" class="search-query input-block-level" placeholder="Tìm kiếm..">
        </form>
        </div>
      </div>

  <!-- __________________________Menu___________________________________ -->

      <section class="menu">
      <div class="accordion" id="accordion2">
          <div class="accordion-group active">
                <div class="accordion-heading">
                  <a class="accordion-toggle opened" href="{{asset('/admin')}}">
                    {{HTML::image('/public/img/icons/stuttgart-icon-pack/32x32/home.png');}}
                    <span>Trang chính</span>
                  </a>
                </div>
          </div>
          <div class="accordion-group ">
                <div class="accordion-heading">
                  <a class="accordion-toggle " data-toggle="collapse" data-parent="#accordion2" href="#collapse-ui-elements">
                    {{HTML::image('/public/img/icons/stuttgart-icon-pack/32x32/invoice.png');}}
                    <span>Quản lý</span><span class="arrow"></span>
                  </a>
                </div>
                <ul id="collapse-ui-elements" class="accordion-body collapse nav nav-list collapse ">
                  <li><a href="{{asset('admin/user')}}">Quản lý người dùng</a></li>
                  <li><a href="{{asset('admin/post')}}">Quản lý bài đăng</a></li>
                  <li><a href="{{asset('admin/product')}}">Quản lý sản phẩm</a></li>
                  <li><a href="{{asset('admin/news')}}">Quản lý tin tức</a></li>
                </ul>
          </div>
          <div class="accordion-group ">
                <div class="accordion-heading">
                  <a class="accordion-toggle " data-toggle="collapse" data-parent="#accordion2" href="#collapse-ui-elements2">
                    {{HTML::image('/public/img/icon/order.png');}}
                    <span>Quản lý hóa đơn</span><span class="arrow"></span>
                  </a>
                </div>
                <ul id="collapse-ui-elements2" class="accordion-body collapse nav nav-list collapse ">
                  <li><a href="{{asset('admin/order')}}">Xử lý hóa đơn</a></li>
                  <li><a href="{{asset('admin/expired')}}">Đơn hàng hết hạn</a></li>
                  <li><a href="{{asset('admin/bill')}}">Đơn hàng thành công</a></li>
                </ul>
          </div>
          <div class="accordion-group ">
                <div class="accordion-heading">
                  <a class="accordion-toggle " href="{{asset('/admin/privilege')}}">
                    {{HTML::image('/public/img/icons/stuttgart-icon-pack/32x32/sitemap.png');}}
                    <span>Phân quyền</span>
                  </a>
                </div>
          </div>
          <div class="accordion-group ">
                <div class="accordion-heading">
                  <a class="accordion-toggle " href="{{asset('admin/report/day')}}">
                    {{HTML::image('/public/img/icons/stuttgart-icon-pack/32x32/statistics.png');}}
                    <span>Thống kê - Báo cáo</span>
                  </a>
                </div>
          </div>
      </div>
      </section>
  </div>
  </div>
</aside>

<!-- __________________________Menu ngang___________________________________ -->
<header>
    <nav class="navbar navbar-blue navbar-fixed-top social-navbar">
      <div class="navbar-inner">
      <div class="container-fluid">
        <a class="btn btn-navbar" data-toggle="collapse" data-target=".social-sidebar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        </a>
        <a class="brand" href="{{asset('/')}}">
        P2P | Mạng mua bán &amp; trao đổi sản phẩm
        </a>
      </div>
      </div>
    </nav>
</header>

<!-- __________________________content___________________________________ -->
@yield('content');
 <!-- __________________________endcontent___________________________________ -->
<footer id="footer">
<div class="container-fluid">
2014 © <em>P2P | Mạng trao đổi và mua bán</em>.
</div>
</footer> </div>
</div>

 
 {{HTML::script('public/js/jquery.min.js');}}
 {{HTML::script('public/js/jquery-ui/js/jquery-ui-1.10.1.custom.min.js');}}
 {{HTML::script('public/js/twitter-bootstrap/bootstrap.js');}}
 {{HTML::script('public/js/jquery-slimscroll/jquery.slimscroll.min.js');}}
  {{HTML::script('public/js/extents.js');}}
 {{HTML::script('public/js/app.js');}}
{{HTML::script('public/js/jquery-fullcalendar/fullcalendar/fullcalendar.min.js');}}
 
 {{HTML::script('public/js/datatables/media/js/jquery.dataTables.min.js');}}
 
 {{HTML::script('public/js/tables.dynamic.js');}}
<script>
        $(function() {
           $('#toggle-checkboxes').click(function(){
                var $checkbox = $("table").find(':checkbox');
                if ($(this).attr('checked')){
                    $checkbox.attr('checked', true);
                }else{
                    $checkbox.attr('checked', false);
                }
           });
        });
    </script>
<script>
      /*<![CDATA[*/
      var _gauges = _gauges || [];
      (function() {
        var t   = document.createElement('script');
        t.type  = 'text/javascript';
        t.async = true;
        t.id    = 'gauges-tracker';
        t.setAttribute('data-site-id', '');
        t.src = '//secure.gaug.es/track.js';
        var s = document.getElementsByTagName('script')[0];
        s.parentNode.insertBefore(t, s);
      })();
      /*]]>*/
    </script>
</body>

</html>
