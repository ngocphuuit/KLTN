@extends('layout.default');
@section('content');
<style type="text/css">
.thumbnail{
    background: rbga(0,0,0,0.1);
}
h3{
    margin-top: 0px;
}
</style>
<div class="bg-purple">
<div class="ad-container">
    <div style="width: 100%; height: 30px;"></div>
    <ol class="breadcrumb">
      <li><a href="#">Trang chủ</a></li>
      <li class="active">Trang tin tức</li>
    </ol>
    <aside id="floating-box" class="sidebar-ad">
        <nav class="clearfix">
            <ul class="nolist">
                <li class="mobile">
                    <a href="{{asset('articles/điện thoại')}}">Điện thoại</a>
                </li>
                <li class="pad">
                    <a href="{{asset('articles/Máy tính bảng')}}">Máy tính bảng</a>
                </li>
                <li class="computer">
                    <a href="{{asset('articles/Máy tính bàn')}}">Máy tính để bàn</a>
                </li>
                <li class="laptop">
                    <a href="{{asset('articles/Laptop')}}">Laptop</a>
                </li>
                <li class="elec">
                    <a href="{{asset('articles/Điện tử')}}">Điện tử</a>
                </li>
                <li class="camera">
                    <a href="{{asset('articles/Kỹ thuật số')}}">Kỹ thuật số</a>
                </li>
                <li class="synthesis">
                    <a href="{{asset('articles/Khác')}}">Khác</a>
                </li>
            </ul>
        </nav>
    </aside>
    <div class="main-ad">
        <div class="content-ad col-md-7">
              @foreach ($news as $newspost)
              <section class="thumbnail-news">
                <img src="{{asset('public/uploads/slide')}}/{{$newspost->slide}}" class="img-news">
              
              
              <h3><a href="news/details/{{$newspost->post_id}}">{{$newspost->post_title}}</a></h3>
              <small><i class="glyphicon glyphicon-user"></i> &nbsp Posted by: {{$newspost->username}}&nbsp&nbsp&nbsp&nbsp
              <i class="glyphicon glyphicon-dashboard"></i>  &nbsp Ngày đăng: {{$newspost->post_date}}</small>
              <!--?php
              $content = $newspost->post_content;
              if(strlen($content) > 235) { 
                            $content = substr($content, 0, 235) . "...";
                        }     
               ?>
              <div class="summ">
                <div style="font-size:14px !important;"><php echo $content ?></div>
              </div>-->
              <div class="clearfix"></div>
              </section>
              @endforeach
              <div id='paginate' style="display:block; text-align:center">
                  {{$news->links()}}
              </div>
        </div>
        <div class="content-ad col-md-4 col-md-offset-1 ">
              <div class="right-content">
                        <div class="side">
                            <div class="border-title">
                            <h4>Được theo dõi nhiều nhất</h4>
                            </div>
                            @foreach($showfollow as $values)
                                <div class="entry">
                                <div class="da-thumbs">
                                    <a href="{{asset('personal/infor')}}/{{$values->username}}" class="entry-left">
                                    <img src="{{asset('public/uploads/ava')}}/{{$values->avatar}}" style="width:80px; height:80px" alt="">
                                    </a>
                                </div>
                                <div class="entry-right">
                                    <h3><a href="{{asset('personal/infor')}}/{{$values->username}}" class="newprd-name">{{$values->username}}</a></h3>
                                    <div class="newprd-price">Số lượt: {{$values->soluong}}</div>
                                </div>
                                </div>
                            @endforeach
                        </div><!--end:side-->
                        <div class="side">
                            <div class="border-title">
                            <h4>Rao bán sản phẩm</h4>
                            </div>
                            @foreach($showarticle as $values)
                            <div class="entry">
                                <div class="entry-right" style="float:left;width:300px">
                                    <h3><a href="{{asset('articles')}}/{{$values->category_name}}/{{$values->art_id}}" class="newprd-name">{{$values->art_title}}</a></h3>
                                    <div class="newprd-price">Bởi: <a href="{{asset('personal/infor')}}/{{$values->username}}">{{$values->username}}</a></div>
                                </div>
                            </div>
                            @endforeach
                        </div><!--end:side-->
        </div>
        </div>
    </div>
</div>
 {{HTML::script('public/js/classie-menu.js');}}
        {{HTML::script('public/js/gnmenu.js');}}
        <!-- Add fancyBox main JS and CSS files -->
        {{HTML::script('public/js/bootstrap.min.js');}}
    <script>
      new gnMenu( document.getElementById( 'gn-menu' ) );
    </script>
    {{HTML::style('public/css/ClassifiedAd.css');}}
@endsection