
@include('layout.headp1');
<!-- .site-nav -->
<style type="text/css">
body{
    background-color: #54364a;
    
    background:url("{{asset('public/img/j.jpg')}}");
    background-size: cover;
}
</style>
</div>
<div class="content-wrapper"><div id="notif:ipad:1" class="news">
</div><div class="hero-unit" style="border-bottom:none; background:white;">
  <div class="info">
    <h2 class="name">
      Tìm kiếm bạn bè
      <input onClick="window.location.reload()" type="button" class="btn btn-primary" value="Làm mới">
    </h2>
  </div>
</div>
<section class="psn-contain col-md-12" style="margin-bottom:20px;">
@foreach ($find as $value)
<div class="col-md-3 module" style="margin-left:15px; width:23.3%;">
            <div class="aboutme">
           
            
                <div class="roundava">
                    <a href="#">
                        <img src="{{asset('public/uploads/ava')}}/{{$value->avatar}}" class="img-round">
                    </a>
                </div>
                <h1 id="site-name">{{$value->username}}</h1>
            </div>
            <ul class="list-group box-s">
                <li class="list-group-item">
                    <div class="profile">Họ tên: {{$value->firstname}}</div>
                </li>
                <li class="list-group-item">
                    <div class="profile">Ngày sinh: {{$value->birthday}}</div>
                </li>
                <li class="list-group-item">
                <a href="{{asset('following')}}/{{$value->username}}" id="follow" data-loading-text="Loading..." class="btn btn-primary btnfl" >
                Theo dõi
                </a>
                </li>
                <li class="list-group-item">
                    <div class="profile list-link">
                        <a href="{{asset('personal/infor')}}/{{$value->username}}">Xem thông tin cá nhân</a>
                    </div>
                </li>
            </ul>
        </div>
@endforeach
</section>
  

</div>
</div>

<div class="load-more on">
  <div class="logo load-icon">
    <i class="s1"></i>
    <i class="s2"></i>
    <i class="s3"></i>
    <i class="s4"></i>
  </div>
</div>
</div>
<div class="clearfix"></div>
</body>
{{HTML::script('public/js/bootstrap.min.js');}}
<script>
$(document).ready(function(){
  $("#showLeft").click(function(){
    $(".sidebar").toggleClass("margin");
    $("#showLeft").toggleClass("left0");
    $("#showLeft").toggleClass("anm");
  });
});
$('[data-toggle="popoverhover"]').popover({
    trigger: 'hover',
        'placement': 'right'
});
</script>
{{HTML::script('public/js/bootstrap.min.js');}}
    {{HTML::script('public/js/classie-menu.js');}}
        {{HTML::script('public/js/gnmenu.js');}}
        <!-- Add fancyBox main JS and CSS files -->
        {{HTML::script('public/js/bootstrap.min.js');}}
    <script>
      new gnMenu( document.getElementById( 'gn-menu' ) );
    </script>
    <!-- Optional theme -->
    <!-- Add mousewheel plugin (this is optional) -->
    <!-- Latest compiled and minified JavaScript -->
</html>