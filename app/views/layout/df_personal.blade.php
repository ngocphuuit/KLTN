<!DOCTYPE HTML>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<head>
	<title>{{$title}}</title>
    {{HTML::style('public/css/bootstrap.min.css');}}
    {{HTML::style('public/css/bootstrap.css');}}
    {{HTML::style('public/style.css');}}
    {{HTML::style('public/css/docs.css');}}
    {{HTML::style('public/css/jRating.jquery.css');}}
    {{HTML::style('public/css/personal.css');}}
    {{HTML::style('public/css/ClassifiedAd.css');}}
    {{HTML::style('public/css/component-menu.css');}}
    {{HTML::style('public/css/demo-menu.css');}}
    {{HTML::style('public/css/cover.css');}}
    {{HTML::style('public/css/mainava.css');}}
    {{HTML::style('public/css/jquery.Jcrop.min.css');}}
    {{HTML::style('public/css/search.css');}}
    {{HTML::script('public/js/jsapi.js');}}
    {{HTML::script('public/js/search.js');}}
    <!-- JS file-->
    {{HTML::script('public/js/jquery 1.8.2.js');}}
    {{HTML::script('public/js/jquery.js');}}

    {{HTML::script('public/js/jquery.min.js');}}
    {{HTML::script('public/js/jquery.Jcrop.min.js');}}
    {{HTML::script('public/js/coverscript.js');}}

</head>
<style type="text/css">
    .blockm{
        display: block !important;
        -webkit-transition: display 1s; /* For Safari 3.1 to 6.0 */
        transition: display 1s;
    }
    .dialog3{
        left: 50%;
        right: auto;
        width: 800px !important;
        padding-top: 30px;
        padding-bottom: 30px;
        }
    .fullname{
        overflow: hidden;
        -o-text-overflow: ellipsis;
        text-overflow: ellipsis;
        display: inherit;
        width: inherit;
        white-space: nowrap;
        -ms-text-overflow: ellipsis;

    }
    .btnfl{
        margin-top: -13px !important;
    }
</style>

<body style="margin-top: 60px;;">
<ul id="gn-menu" class="gn-menu-main">
				<li class="gn-trigger">
					<a class="gn-icon gn-icon-menu"><span>Menu</span></a>
					<nav class="gn-menu-wrapper">
						<div class="gn-scroller">
							<ul class="gn-menu">
                                <li><a class="gn-icon gn-icon-home" href="{{asset('/')}}">Trang chủ</a></li>
                                <li><a class="gn-icon gn-icon-adver" href="{{asset('articles/all')}}">Trang rao vặt</a></li>
                                <li><a class="gn-icon gn-icon-news" href="{{asset('news')}}">Trang tin tuc</a></li>
                                <li><a class="gn-icon gn-icon-chat" href="{{asset('chat')}}">Phòng chat</a></li>
                                @foreach($info as $k1 =>$values1)
                                @endforeach
                                @if(Session::has('user'))
                                <li><a class="gn-icon gn-icon-person" href="{{asset('personal/infor')}}/{{Session::get('user')}}">Trang cá nhân</a></li>
                                <li><a class="gn-icon gn-icon-cog" href="{{asset('personal/infor')}}/{{Session::get('user')}}/{{('history')}}">Quản lý tài khoản</a></li>
                                <li><a class="gn-icon gn-icon-chat" href="{{asset('personal/history/notify')}}">
                                      Thông báo mới
                                        <span class="badge">
                                          {{-- */$i=0;/* --}}
                                          @foreach($noti as $notifi)
                                             {{-- */$i++;/* --}}
                                          @endforeach
                                          {{$i}}
                                        </span>
                                    </a>
                                </li>
                                      @if($values1->level == 1)
                                         <li><a class="gn-icon gn-icon-cog" href="{{asset('admin')}}">Quản trị</a></li>
                                      @endif
                                @endif
                								<li>
                									<a class="gn-icon gn-icon-archive" href="{{asset('lienhe')}}">Liên hệ</a>
                								</li>
							</ul>
						</div><!-- /gn-scroller -->
					</nav>
				</li>
				<li><a href="#" class="logohead">UrShop | trao đổi &amp; mua bán</a></li>
				<li>
				<form id="searchform">
                <div class="gn-search-item">
                    <div class="extra-icon gn-icon gn-icon-search"></div>
                    <input id="inputString" onkeyup="lookup(this.value);" placeholder="Tìm kiếm" type="search" class="gn-search">
                    <div id="suggestions"></div>
                </div></li>
                </form>
                </li>
                <li>
                    <a href="#" class="logohead page">{{$tieude}}</a>
@include('layout/headp2')
@foreach($info as $k =>$values)
@endforeach
<div class="psn-wrap">
    <section class="psn-contain">
        <div class="psn-content">
            <div class="left-psncontent">
                <div class="psn-menu module">
                    <a href="{{asset('personal/infor')}}/{{$values->username}}/history" class="list-link">Thông tin cá nhân
                     </a>
                    <ul class="list-group">
                      <li class="list-group-item">
                        <span class="profile">Họ tên: {{$values->firstname}}</span>
                      </li>
                      <li class="list-group-item">
                        <span class="profile">Ngày sinh: {{$values->birthday}}</span>
                      </li>
                      <li class="list-group-item">
                        <span class="profile">Sống ở: {{$province = DB::table('province')->where('province_id',$values->province_id)->pluck('province_name');}}</span>
                      </li>
                    </ul>
                </div>
                <div class="psn-menu module">
                    <a href="{{asset('personal/gallery')}}/{{$values->username}}" class="list-link">Album hình ảnh
                     </a>
                    <div class="media-box">
                        @foreach($artimg as $artimgs)
                            <span class="thumbnail-placeholder">
                                <img src="{{asset('uploads')}}/{{$artimgs->id_img}}/{{$artimgs->filename}}" alt="" class="palbum">
                            </span>
                        @endforeach
                    </div>
                </div>
                <div class="psn-menu module">
                    <div class="list-link">Gợi ý theo dõi<a href="#" class="small">Làm mới</a><a href="#" class="small">Xem tất cả</a>
                    </div>
                    <div class="wrap-user"><!-- content user -->
                    @foreach($follow as $userfl)
                        <div class="account-summary alert fade in">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            <div class="content">
                                <a class="account-group" href="#">
                                    <img src="{{asset('public/uploads/ava')}}/{{$userfl->avatar}}" alt="" class="avatar">
                                    <span class="account-group-inner">
                                        <b class="fullname blockm">{{$userfl->username}}</b>
                                        <span>‏</span>
                                    </span>
                                </a>
                                <a href="{{asset('following')}}/{{$userfl->username}}" id="follow" data-loading-text="Loading..." class="btn btn-primary btnfl" >
                                  Theo dõi
                                </a>
                                <a href="{{asset('personal/infor')}}/{{$userfl->username}}" class="btn btnfl" id="button" data-loading-text="Loading...">Xem thông tin</a>
                            </div>
                        </div>
                    @endforeach
                    </div><!-- end content user -->
                </div>
                <div class="psn-menu module">
                    <div class="list-link">Gợi ý sản phẩm<a href="#" class="small">Làm mới</a><a href="#" class="small">Xem tất cả</a>
                    </div>
                    <div class="wrap-user"><!-- content user -->
                    @foreach($article as $articles)
                        <div class="account-summary alert fade in">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            <div class="content">
                                <a class="account-group" href="#">
                                    @if(DB::table('article_img')->where('id_img',$articles->id_img)->count()>0)
                                        <img src="{{asset('uploads')}}/{{$articles->id_img}}/{{DB::table('article_img')->where('id_img',$articles->id_img)->take(1)->pluck('filename');}}" class="avatar" alt="">
                                    @else
                                        {{HTML::image('/public/uploads/noimage.jpg','', array('class'=>'avatar'));}}
                                    @endif
                                    <span class="account-group-inner">
                                        <b class="fullname blockm">{{$articles->art_title}}</b>
                                        <span>‏</span>
                                    </span>
                                </a>
                                <a href="{{asset('articles')}}/{{$articles->category_name}}/{{$articles->art_id}}" id="follow" data-loading-text="Loading..." class="btn btn-primary btnfl" >
                                  Xem
                                </a>
                            </div>
                        </div>
                    @endforeach
                    </div><!-- end content user -->
                </div>
                <div class="psn-menu module">
                    <div class="list-link">Gợi ý theo tìm kiếm<a href="#" class="small">Làm mới</a><a href="#" class="small">Xem tất cả</a>
                    </div>
                    <div class="wrap-user"><!-- content user -->
                    @foreach($articles_search as $articles_sr)
                        <div class="account-summary alert fade in">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            <div class="content">
                                <a class="account-group" href="#">
                                    @if(DB::table('article_img')->where('id_img',$articles_sr->id_img)->count()>0)
                                        <img src="{{asset('uploads')}}/{{$articles_sr->id_img}}/{{DB::table('article_img')->where('id_img',$articles_sr->id_img)->take(1)->pluck('filename');}}" class="avatar" alt="">
                                    @else
                                        {{HTML::image('/public/uploads/noimage.jpg','', array('class'=>'avatar'));}}
                                    @endif
                                    <span class="account-group-inner">
                                        <b class="fullname blockm">{{$articles_sr->art_title}}</b>
                                        <span>‏</span>
                                    </span>
                                </a>
                                <a href="{{asset('articles')}}/{{$articles->category_name}}/{{$articles_sr->art_id}}" id="follow" data-loading-text="Loading..." class="btn btn-primary btnfl" >
                                  Xem
                                </a>
                            </div>
                        </div>
                    @endforeach
                    </div><!-- end content user -->
                </div>
                <div class="psn-menu module">
                    <div class="list-link">Sản phẩm đã chia sẻ<a href="#" class="small">Làm mới</a><a href="#" class="small">Xem tất cả</a>
                    </div>
                    <div class="wrap-user"><!-- content user -->
                    @foreach($showshare as $articles)
                        <div class="account-summary alert fade in">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            <div class="content">
                                <a class="account-group" href="#">
                                    @if(DB::table('article_img')->where('id_img',$articles->id_img)->count()>0)
                                        <img src="{{asset('uploads')}}/{{$articles->id_img}}/{{DB::table('article_img')->where('id_img',$articles->id_img)->take(1)->pluck('filename');}}" class="avatar" alt="">
                                    @else
                                        {{HTML::image('/public/img/champions/Ahri_Square_0.png','', array('class'=>'avatar'));}}
                                    @endif
                                    <span class="account-group-inner">
                                        <b class="fullname blockm">{{$articles->art_title}}</b>
                                        <span>‏</span>
                                    </span>
                                </a>
                                <a href="{{asset('articles')}}/{{$articles->category_name}}/{{$articles->art_id}}" id="follow" data-loading-text="Loading..." class="btn btn-primary btnfl" >
                                  Xem
                                </a>
                            </div>
                        </div>
                    @endforeach
                    </div><!-- end content user -->
                </div>
            </div><!--left psn-->
            <div class="right-psncontent">
                <div class="header-back module">
                    <div><img src="{{asset('public/uploads/cover')}}/{{$values1->cover}}" alt="" class="headbg">
                        <div class="profilebg">
                            <img src="{{asset('public/uploads/ava')}}/{{$values1->avatar}}" alt="" class="avatar2">
                        </div>
                    </div>
                    <div class="wrap-tweet">
                        <ul class="tweet">
                        @if($values->username == Session::get('user'))
                            <li>
                                <a class="js-nav" href="{{asset('personal/infor')}}/{{$values->username}}">
                                    <strong>{{$count2}}</strong>
                                    Bài đã đăng
                                </a>
                            </li>
                            <li>
                                <a class="js-nav" href="{{asset('personal/infor/'.$values->username.'/follower')}}">
                                    <strong>{{$count}}</strong>
                                    Người theo dõi
                                </a>
                            </li>
                            <li>
                                <a class="js-nav" href="{{asset('personal/infor/'.$values->username.'/following')}}">
                                    <strong>{{$count1}}</strong>
                                    Đang theo dõi
                                </a>
                            </li>
                            <a class="btn btn-success" data-toggle="modal" data-target="#list-buy">Đổi ảnh bìa</a>
                        @else
                            <li>
                                <a class="js-nav" href="{{asset('personal/infor')}}/{{$values->username}}">
                                    <strong>{{$count2}}</strong>
                                    Bài đã đăng
                                </a>
                            </li>
                            <li>
                                <a class="js-nav" href="#">
                                    <strong>{{$count}}</strong>
                                    Người theo dõi
                                </a>
                            </li>
                            <li>
                                <a class="js-nav" href="{{asset('personal/infor')}}/{{$values->username}}/history">
                                    Lịch sử bán
                                </a>
                            </li>
                        @endif
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                </div>
                
                @yield('content')

            </div><!--right psn-->
            <div style="clear:both;"></div>
        </div><div style="clear:both;"></div>
    </section>
</div>


<div class="modal fade" id="list-buy" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog2">
    <div class="modal-content">
      <div class="panel panel-info">
      <div class="panel-heading">
        <h3 class="panel-title">
    Đổi cover</h3>
      </div>
      <div class="panel-body" style="width:auto !important">
        <div class="demo">
            <div class="bbody">
                <form id="upload_form" enctype="multipart/form-data" method="post" action="{{asset('coverupload')}}" onSubmit="return checkForm()">
                    <!-- hidden crop params -->
                    <input type="hidden" id="x1" name="x1" />
                    <input type="hidden" id="y1" name="y1" />
                    <input type="hidden" id="x2" name="x2" />
                    <input type="hidden" id="y2" name="y2" />

                    <h2>Bước 1: Chọn file ảnh</h2>
                    <div><input type="file" name="image_file" id="image_file" onChange="fileSelectHandler()" /></div>

                    <div class="error alert alert-danger alert-dismissable"></div>

                    <div class="step2">
                        <h2>Bước 2: Cắt ảnh</h2>
                        <img id="preview" />

                        <div class="info">
                            <label class="inline-block">Kích thước file</label> <input type="text" id="filesize" name="filesize" class="upava" />
                            <label class="inline-block">Loại</label> <input type="text" id="filetype" name="filetype" class="upava"/>
                            <label class="inline-block">Kích thước ảnh</label> <input type="text" id="filedim" name="filedim" class="upava"/>
                            <label class="inline-block">W</label> <input type="text" id="w" name="w" class="upava"/>
                            <label class="inline-block">H</label> <input type="text" id="h" name="h" class="upava"/>
                        </div>

                        <input type="submit" value="Đăng ảnh" />
                    </div>
                </form>
            </div>
        </div>
      </div>
    </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div><!-- /.modal-content help-->
  </div><!-- /.modal-dialog help-->
</div><!-- /.modal help-->

{{HTML::script('public/js/bootstrap.min.js');}}
<script>
$('#button').button();

$('#follow').click(function() {
    $(this).button('loading');
});
$('#follow').button();

$('#button').click(function() {
    $('#follow').button('reset');
});
$('[data-toggle="popoverhover"]').popover({
    trigger: 'hover',
        'placement': 'right'
});
</script>
<style>
.headbg{
    -webkit-background-size: cover;
    -moz-background-size: cover;
    -o-background-size: cover;
    background-size: cover;
    background-color: #444;
    padding: 0;
    text-align: center;
    overflow: hidden;
    background-repeat: no-repeat;
    -webkit-box-shadow: inset 0 -1px 0 rgba(0,0,0,.1);
    box-shadow: inset 0 -1px 0 rgba(0,0,0,.1);
    width:518px;
    height:260px;
}
.panel-body{
    width:518px;
}
.modal-body{
    padding:8px 8px;
}
.modal-footer{
    padding:8px 8px;
}
</style>
{{HTML::script('public/js/classie-menu.js');}}
{{HTML::script('public/js/gnmenu.js');}}
<script>
	new gnMenu( document.getElementById( 'gn-menu' ) );
</script>
</body>
</html>