@extends('layout.default')
@section('content')
<!--content-->
<div id="featured">
                    <div class="camera_wrap camera_emboss " id="camera_wrap_1">
                    @foreach($news as $newspost)
                    
                    <div  data-src="{{asset('public/uploads/slide')}}/{{$newspost->slide}}">
                        <div class="camera_caption moveFromLeft">
                            <h2>{{$newspost->post_title}}</h2>
                            <div class="button">
                              <a href="news/details/{{$newspost->post_id}}">Xem thêm</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    </div><!-- #camera_wrap_1 -->
                    <div style="clear:both; display:block; height:40px"></div>
</div><!--end:featured-->


<div class="container">
 <section>
    <!--intro-->
    <div class="text-intro">Chúng tôi sẽ giúp bạn trao đổi &amp; mua bán những gì bạn muốn</div>
    <div class="intro">
    <div class="panel-group arrow_box" id="accordion1">
            <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion1" href="#collapse1" id="">
            <div class="intro-wrap blue-deep">
            <div class="intro-affect">
                <div class="tittle">
                    điện thoại - máy tính bảng
                </div>
                <div class="intro-content">
                    Bạn có thể tìm mua, đăng bán hay tìm kiếm các dịch vụ lắp đặt, sửa chữa điện thoại, máy tính bảng tại đây
                    <p>.</p><p></p><p>
                        {{HTML::image('/public/img/icon/mobile_sticker.png');}}
                    </p>

                </div>
            </div>
            </div>
            </a>
            <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion1" href="#collapse2">
            <div class="intro-wrap blue-white">
            <div class="intro-affect">
                <div class="tittle">
                    Máy tính - laptop
                </div>
                <div class="intro-content">
                    Tại đây sẽ đăng các tin tức liên quan đến các loại máy tính, laptop, các dịch vụ lắp đặt, sửa chữa
                    cũng như tin tức nhu cầu mua bán các mặt hàng này
                    <p></p>
                    <p></p>
                    <p></p><p>
                    {{HTML::image('/public/img/icon/laptop_sticker.png');}}
                    </p>
                </div>
            </div>
            </div>
            </a>
            <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion1" href="#collapse3">
            <div class="intro-wrap green-deep">
            <div class="intro-affect">
                <div class="tittle">
                    điện tử - kỹ thuật số
                </div>
                <div class="intro-content">
                    Bạn có thể tìm kiếm các sản phẩm điện tử dành cho văn phòng hay các loại máy móc thiết bị gia dụng hữu ích
                    cũng như các thiết bị giải trí tại đây.
                    <p></p>
                    <p>
                    {{HTML::image('/public/img/icon/camera_sticker.png');}}
                    </p>
                </div>
            </div>
            </div>
            </a>
            <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion1" href="#collapse4">
            <div class="intro-wrap green-white">
            <div class="intro-affect">
                <div class="tittle">
                    tổng hợp khác
                </div>
                <div class="intro-content">
                    Bạn có thể đăng ký mua bán các sản phẩm đa dạng đa chủng loại tùy nhu cầu của bạn.
                     Yêu cầu là các mặt hàng này không nằm trong các loại đã giới thiệu
                    <p></p><p></p><p>
                    {{HTML::image('/public/img/icon/expand_sticker.png');}}
                    </p>
                </div>
            </div>
            </div>
            </a>
            <div class="panel panel-default width97">

            <div id="collapse1" class="panel-collapse collapse border-inf" style="height: 0px;">
            <div class="arrow_box1" style="height: 10px;"></div>
                      <div class="panel-body blue-deep pdg15">
                        <div class="list-intro">
                            <div class="tittle">Điện thoại - Máy tính bảng</div>
                            <ul>
                                <li>
                                    <a href="#">Cần bán</a>
                                </li>
                                <li>
                                    <a href="#">Cần mua</a>
                                </li>
                                <li>
                                    <a href="#">Sửa chữa - Cài đặt</a>
                                </li>
                                <li>
                                    <a href="#">Khác</a>
                                </li>
                            </ul>
                            <div class="small-list">
                            <ul>
                                <li>
                                    <a href="#">Nokia</a>
                                </li>
                                <li>
                                    <a href="#">Samsung</a>
                                </li>
                                <li>
                                    <a href="#">Iphone</a>
                                </li>
                                <li>
                                    <a href="#">Sony</a>
                                </li>
                                <li>
                                    <a href="#">Blackberry</a>
                                </li>
                                <li>
                                    <a href="#">HTC</a>
                                </li>
                                <li>
                                    <a href="#">Qmobile, Fmobile</a>
                                </li>
                                <li>
                                    <a href="#">LG, Motorola</a>
                                </li>
                                <li>
                                    <a href="#">EVN, Philips</a>
                                </li>
                                <li>
                                    <a href="#">Linh phụ kiện</a>
                                </li>
                                <li>
                                    <a href="#">Khác</a>
                                </li>
                            </ul>
                            </div>
                        </div>
                      </div>
            </div>
            <div id="collapse2" class="panel-collapse collapse border-inf" style="height: 0px;">
           <div class="arrow_box2" style="height: 10px;"></div>
                      <div class="panel-body blue-white pdg15">
                        <div class="list-intro">
                            <div class="tittle">Máy tính - Laptop</div>
                            <ul>
                                <li>
                                    <a href="#">Cần bán</a>
                                </li>
                                <li>
                                    <a href="#">Cần mua</a>
                                </li>
                                <li>
                                    <a href="#">Sửa chữa - Cài đặt</a>
                                </li>
                                <li>
                                    <a href="#">Khác</a>
                                </li>
                            </ul>
                            <div class="small-list">
                            <ul>
                                <li>
                                    <a href="#">Máy tính để bàn</a>
                                </li>
                                <li>
                                    <a href="#">Màn hình</a>
                                </li>
                                <li>
                                    <a href="#">Máy chiếu, In, Scan</a>
                                </li>
                                <li>
                                    <a href="#">Laptop, Netbook</a>
                                </li>
                                <li>
                                    <a href="#">Loa, Mix, Headphone</a>
                                </li>
                                <li>
                                    <a href="#">Web, Phần mềm, Mạng</a>
                                </li>
                                <li>
                                    <a href="#">Ổ cứng ngoài, Ram, Linh kiện</a>
                                </li>
                                <li>
                                    <a href="#">Balo, Túi, Phụ kiện Laptop</a>
                                </li>
                                <li>
                                    <a href="#">Khác</a>
                                </li>
                            </ul>
                            </div>
                        </div>
                      </div>
            </div>
            <div id="collapse3" class="panel-collapse collapse border-inf" style="height: 0px;">
            <div class="arrow_box3" style="height: 10px;"></div>
                      <div class="panel-body green-deep">
                        <div class="list-intro">
                            <div class="tittle">điện tử - kỹ thuật số</div>
                            <ul>
                                <li>
                                    <a href="#">Cần bán</a>
                                </li>
                                <li>
                                    <a href="#">Cần mua</a>
                                </li>
                                <li>
                                    <a href="#">Sửa chữa - Cài đặt</a>
                                </li>
                                <li>
                                    <a href="#">Khác</a>
                                </li>
                            </ul>
                            <div class="small-list">
                            <ul>
                                <li>
                                    <a href="#">Điện máy gia dụng</a>
                                </li>
                                <li>
                                    <a href="#">Điện lạnh</a>
                                </li>
                                <li>
                                    <a href="#">Thiết bị văn phòng</a>
                                </li>
                                <li>
                                    <a href="#">Phụ kiện âm thanh</a>
                                </li>
                                <li>
                                    <a href="#">Máy ảnh, phụ kiện</a>
                                </li>
                                <li>
                                    <a href="#">Game - Từ điển</a>
                                </li>
                                <li>
                                    <a href="#">Máy quay, phụ kiện</a>
                                </li>
                                <li>
                                    <a href="#">Đầu HD, KTS, ổ cứng</a>
                                </li>
                                <li>
                                    <a href="#">Khác</a>
                                </li>
                            </ul>
                            </div>
                        </div>
                      </div>
            </div>
            <div id="collapse4" class="panel-collapse collapse border-inf" style="height: 0px;">
            <div class="arrow_box4" style="height: 10px;"></div>
                      <div class="panel-body green-white">
                        
                      </div>
            </div>
            </div>
    </div>
    </div>
    <!--close intro-->
    <div class="wrap-content">
        <div class="new-wrap">
            <div class="title-feature">
                <h2><a href="product/lap">Máy tính</a></h2>
            </div>
            <div class="n-content">
            @foreach($showcompu as $value)
            <?php $c=$value->invent;
            if($c==0)
            { ?>
                <div class="new-prd new-border bubbleInfo">
                    <div class="trigger">
                        <div class="bg-star">
                            <div class="rateit" data-rateit-value="4.5" data-rateit-ispreset="true" data-rateit-readonly="true"></div>
                            <span class="new-icon">
                                {{HTML::image('/public/img/icon/newprd.png','', array('style'=>'width:60px; height:60px;'));}}
                            </span>
                        </div>
                        <div class="img-new">
                            <img src="">
                            <img src="{{asset('public/uploads/product')}}/{{$value->img_url}}" style="width:220px; height:277px;">
                        </div>
                        <div class="newprd-title">
                            <a href="#" class="newprd-name" title="{{$value->product_name}}">{{$value->product_name}}</a>
                            <div class="newprd-price">{{$value->cost}}VNĐ</div>
                        </div>
                        <div class="link-detail">
                            <a href="{{asset('product/cart')}}/{{$value->product_id}}" class="btn-a new-background">Thêm vào giỏ</a>
                            <a href="{{asset('product/details')}}/{{$value->product_id}}" class="btn-a new-background">&nbsp;&nbsp;&nbsp;&nbsp;Chi tiết&nbsp;&nbsp;&nbsp;&nbsp;</a>
                        </div>
                    </div>
                    <div class="popup row show-grid">
                        <!-- your information content -->
                        <div class="col-md-6" style="float:left; height:100%">
                        <img src="{{asset('public/uploads/product')}}/{{$value->img_url}}" class="thumbnail" style="width:240px;">
                        <a href="#" style="color:white; font-weight:bold;" title="{{$value->product_name}}">{{$value->product_name}}</a>
                        </div>
                        <div class="col-md-5" style="float:right; height:100%">
                        <div class="newprd-price" style="float:right; color: white !important; font-size: 11px; text-align:left">{{$value->product_des}}</div>
                        </div>
                    </div>
                </div>
                <?php }
                ?>
            @endforeach
            </div>
        </div>
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
    <div style="clear: both;"></div>

</section>
<!-- Button and menu sidebar-->
</div>
					<!-- Class "cbp-spmenu-open" gets applied to menu -->

		<!-- Classie - class helper functions by @desandro https://github.com/desandro/classie -->
        {{HTML::style('public/css/popup.css');}}
        {{HTML::script('public/js/classie.js');}}
        {{HTML::script('public/js/jquery.rateit.js');}}
        {{HTML::script('public/js/classie-menu.js');}}
        {{HTML::script('public/js/gnmenu.js');}}
        <!-- Add fancyBox main JS and CSS files -->
        {{HTML::script('public/js/bootstrap.min.js');}}
		<script>
			new gnMenu( document.getElementById( 'gn-menu' ) );
		</script>
@endsection
