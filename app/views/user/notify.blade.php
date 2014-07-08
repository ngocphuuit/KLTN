@include('layout.headp1');
<!-- .site-nav -->
</div>
<div class="content-wrapper">
    <div class="hero-unit">
      <h2>Thông báo</h2>
      Thông báo gần đây của bạn
    </div>
    <div class="wizard"></div>
    <div class="links">
        <div class="link-list">
        <!--item-->
            @foreach($noti as $notis)
              <div class="link">
                  <div class="item item-rich">
                      <div class="avatar-img">
                      <img src="{{asset('public/uploads/ava')}}/{{$notis->avatar}}" class="avatar-img" alt="">
                          <b>storm11</b>
                      </div>
                      <div class="item-rich-wrapper">

                          <div class="title-wrapper">
                            <a href="{{asset('personal/infor')}}/{{$notis->username}}" class="title" target="_blank"><b>{{$notis->username}}</b></a> đã bình luận về: <a href="{{asset('articles')}}/{{DB::table('product_category')->where('category_id',$notis->categori_id)->pluck('category_name')}}/{{$notis->art_id}}"><b>{{$notis->art_title}}</b></a>
                          </div>

                          <div class="meta">
                            <span class="link-rank">
                                <a href=""><span>{{$notis->comment}}</span></a>
                            </span>
                          </div>

                          <div class="meta meta-secondary">
                            <div class="actions">
                              <a href="#" class="action-link bookmark-btn">Chia sẻ lên tường bạn</a>
                            </div>
                              <time datetime="2013-12-11T04:44:40+07:00" class="date" title="12:00 am">6h</time>
                          </div>
                      </div>
                  </div>
              </div>
            @endforeach
        </div>
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
</body>
<script src="../js/bootstrap.min.js"></script>
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