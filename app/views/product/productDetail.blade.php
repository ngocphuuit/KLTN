@extends('layout.default');
@section('content');
<style type="text/css">
.product-details{
    display: block;
    overflow: auto;
    float: left;
    border: 1px solid white;
    padding: 10px;
    -webkit-box-shadow: 0 1px 1px rgba(0,0,0,.1);
    -moz-box-shadow: 0 0 20px rgba(0,0,0,.3);
    box-shadow: inset 1px 0px 3px 5px rgba(0,0,0,.1);
}
.thumbnail{
    padding: 4px;
    line-height: 1.428571429;
    border: 1px solid rgba(0,0,0,.2);
    border-radius: 0px;
    background: transparent;
    -webkit-transition: all 0.2s ease-in-out;
    -webkit-box-shadow: 1px 0px 3px rgba(0,0,0,.1);
    -moz-box-shadow: 1px 0px 3px rgba(0,0,0,.1);
    box-shadow: 1px 0px 3px rgba(0,0,0,.1);
    transition: all 0.2s ease-in-out;
    display: inline-block;
    max-width: 100%;
    height: auto;
    display: block;
}
.btn-primary{
    -webkit-box-shadow: 3px -2px 2px 1px rgba(0,0,0,.1);
    -moz-box-shadow: 3px -2px 2px 1px rgba(0,0,0,.1);
    box-shadow: 3px -2px 2px 1px rgba(0,0,0,.1);
    background: rgba(0,0,0,0.5) !important;
    -webkit-transition: ease-in-out .15s, box-shadow ease-in-out .15s;
    transition: ease-in-out .15s, box-shadow ease-in-out .15s;
}
.btn-primary:active{
    background: RGBA(0,0,0,0.9);
    -webkit-box-shadow: 3px -1px 2px 1px rgba(0,0,0,.1);
    -moz-box-shadow: 3px -1px 2px 1px rgba(0,0,0,.1);
    box-shadow: inset 3px -1px 2px 1px rgba(0,0,0,.1);
    border-color: rgba(0,0,0,0.1) rgba(0,0,0,0.1) rgba(0,0,0,0.25);
}
.nav-tabs>li>a {
background: rgba(0,0,0,0.1);
-webkit-box-shadow: 3px -2px 2px 1px rgba(0,0,0,.1);
-moz-box-shadow: 3px -2px 2px 1px rgba(0,0,0,.1);
box-shadow: 3px -2px 2px 1px rgba(0,0,0,.1);
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
              @foreach ($product as $products)
              <h3><strong>{{$products->product_name}}</strong></h3>
              <div style="width: 35%;float: left;" >
              <img src="{{asset('public/uploads/product')}}/{{$products->img_url}}" class="thumbnail col-md-3" style="width: 200px;margin-bottom: 20px;">
              <a href="{{asset('product/cart')}}/{{$products->product_id}}" class="btn btn-primary">Thêm vào giỏ</a>
            </div>
              <small style="width:60%; float:right; display:block;">{{$products->product_des}}</small>
              <div class="clearfix"></div>
              <ul id="myTab" class="nav nav-tabs" style="margin-top: 90px;">
                <li class="active"><a href="#binhluan" data-toggle="tab">Bình luận</a></li>
                <li><a href="#thongso" data-toggle="tab">Thông số</a></li>
              </ul>
              <div id="myTabContent" class="tab-content">
                <div class="tab-pane fade active in" id="binhluan">
                    <div class="product-details col-md-12">
                    @if(Session::has('user'))
                    <form id="comment-form" method="POST" data-url="{{asset('product/comments')}}">
                        <div class="inputcomment">
                            <div class="form-group">
                                <input type="hidden" name="product_id" value="{{$products->product_id}}">
                                <small><label for="comment">Lời bình</label></small>
                                <textarea id="comment" name="comment" class="form-control" rows="3" placeholder="Để lại lời bình.."></textarea>
                            </div>
                            <div class="form-group">
                                <input type="submit" value="BÌNH LUẬN" class="btn btn-primary">
                            </div>
                        </div> <!--input_comment-->
                    </form>
                    @else
                    <p>Bạn phải đăng nhập để bình luận. <a href="{{asset('viewlogin')}}">Đăng Nhập</a></p>
                    @endif
                        <div class="outcomment">
                            <div class="form-group">
                                <small><label>Ý kiến bạn đọc</label></small>
                            </div>
                            <div class="comment_line"></div>
                            @foreach($showcomment as $comment)
                            <div class="form-group dotted">
                                <div class="comment-p"><a href="">
                                    <div class="ava-comment">
                                        <img src="{{asset('public/uploads/ava')}}/{{$comment->avatar}}" class="ava-round">
                                    </div>
                                    <div class="col-md-8" style="height:60px">
                                        <strong><small><i class="glyphicon glyphicon-user"></i> {{$comment->username}}</small></strong></a> &nbsp &nbsp &nbsp
                                        <small><i class="glyphicon glyphicon-dashboard"></i> &nbsp Ngày đăng: {{$comment->date_comment}}</small>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="comment_text">
                                    <p>{{$comment->comment}}</p>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="thongso">
                    <div class="product-details col-md-12">{{$products->product_details}}
                    </div>
                </div>
              </div>

              @endforeach
        </div>
        <div class="content-ad col-md-4 col-md-offset-1 ">
              <div class="right-content">
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
                        <div class="side">
                            <div class="border-title">
                            <h4>Tin ngẫu nhiên</h4>
                            </div>
                            @foreach($shownew as $values)
                                <div class="entry">
                                    <div class="da-thumbs">
                                        <a href="#" class="entry-left">
                                        <img src="{{asset('public/uploads/slide')}}/{{$values->slide}}" style="width:50px; height:50px;" alt="">
                                        </a>
                                    </div>
                                    <div class="entry-right">
                                        <h3><a href="product-detail.html" class="newprd-name">{{$values->post_title}}</a></h3>
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
        {{HTML::script('public/js/ajax/comment_product.js');}}
    <script>
      new gnMenu( document.getElementById( 'gn-menu' ) );
    </script>
    {{HTML::style('public/css/ClassifiedAd.css');}}
@endsection