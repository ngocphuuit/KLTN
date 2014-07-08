@extends('layout.default');
@section('content');
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
        <div class="content-ad">
              @foreach ($news as $newspost)
              <small>Ngày đăng: {{$newspost->post_date}}</small>
              <h1><strong>{{$newspost->post_title}}</strong></h1>
              {{$newspost->post_content}}
              @endforeach
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