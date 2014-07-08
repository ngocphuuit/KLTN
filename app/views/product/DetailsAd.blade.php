@extends('layout.default');
@section('content');
{{HTML::style('public/css/bootstrap.css')}}
<div class="bg-purple">
<div class="ad-container">
    <div style="width: 100%; height: 30px;"></div>
    <ol class="breadcrumb">
      <li><a href="#">Trang chủ</a></li>
      <li><a href="#">Trang rao vặt</a></li>
      <li class="active">Chi tiết sản phẩm</li>
    </ol>
      @include('layout/menuAd')
    <div class="main-ad">
        <div class="content-ad" style="height: auto; overflow: hidden;">
                @foreach($info as $value)
                @endforeach
            <div class="title-dts"><h4>Cần bán điện thoại</h4>
            <span>Đăng lúc: {{$value->date_post}} | Đã xem: {{$value->daxem}}</span>
            </div>

            <div class="left-dtscontent">
            <!-- id="floating-box2" -->
                <div class="contact" >
                    <span class="small-list1">Mã tin: {{$value->art_id}}</span>
                    <span class="small-list1">Người đăng: {{$value->username}}</span>
                    <span class="small-list1">SĐT: {{$value->phone}}</span>
                    <span class="small-list1" title="123@321.com">Email: {{$value->email}}</span>
                    <span class="small-list1">Phạm vi rao: {{$value->province_name}}</span>
                    <span class="small-list1">Giá bán: {{$value->art_cost}} VNĐ</span>
                    <button type="button" class="btn btn-success border-btn" data-toggle="modal" data-target="#mess"><div class="email" title="Gửi tin nhắn"></div></button>
                    <a href="{{asset('personal/infor/'.$value->username)}}" target="_blank"  class="btn btn-success border-btn" title="Xem trang cá nhân của người này">
                        <div class="user-icon" title="Xem trang cá nhân của người này"></div>
                    </a>
                    @if($value->username != Session::get('user'))
                        @if(Session::has('reguser'))
                        <a href="{{asset('articles/'.$value->category_name.'/'.$value->art_id.'/unbuy')}}" class="btn btn-danger border-btn" style="margin-left: 345px;" title="Đăng ký mua sản phẩm này">Hủy đăng ký mua</a>
                        @else
                        <a href="{{asset('articles/'.$value->category_name.'/'.$value->art_id.'/buy')}}" class="btn btn-danger border-btn" style="margin-left: 345px;" title="Đăng ký mua sản phẩm này">Đăng ký mua</a>
                        @endif
                    @endif

                </div>

                <div class="post-content detailpost">
                    {{$value->content}}
                </div>
                <div class="image">
                <ul class="enlarge">
                    @foreach($image as $images)
                        <li><img src="{{asset('uploads')}}/{{$images->id_img}}/{{$images->filename}}" width="150px" height="150px" alt=""><span><img src="{{asset('uploads')}}/{{$images->id_img}}/{{$images->filename}}"  alt=""><br />{{$images->filename}}</span></li>
                    @endforeach
                </ul>
                </div>
                <!--vote article-->
                <div class="col-lg-12">
            <div>
                <div class="well">

                    <div class="progress">
                        <div class="progress-bar progress-bar-success" style="width: {{ $votes['good_percent'] }}%" data-toggle="tooltip" title="{{ $votes['good_votes'] }}"></div>
                        <div class="progress-bar progress-bar-danger" style="width: {{ $votes['bad_percent'] }}%" data-toggle="tooltip" title="{{ $votes['bad_votes'] }}"></div>
                    </div>

                    <div class="alert alert-danger" id="vote-alert"></div>

                        <a href="{{asset('article/'.$value->art_id.'/1')}}" class="btn btn-success btn-sm vote" >
                            <span class="glyphicon glyphicon-hand-up"></span>
                        </a>
                        <a href="{{asset('article/'.$value->art_id.'/0')}}" class="btn btn-danger btn-sm vote" >
                            <span class="glyphicon glyphicon-hand-down"></span>
                        </a>

                    <a class="btn btn-default btn-sm" disabled="disabled" href="#">
                        <span class="glyphicon glyphicon-user"></span>{{$value->username}}
                    </a>

                    <a class="btn btn-default btn-sm" disabled="disabled" href="#">
                        <span class="glyphicon glyphicon-calendar"></span>
                        <i>{{ $value->date_post }}</i>
                    </a>

                </div>
            </div>
        </div>
                <!--end vote article-->
            </div>
            <div class="right-dtscontent">
                <div class="contact-2">
                    <div class="alert alert-warning">
                        <button type="button" class="btn btn-warning">Báo tin rác</button>
                        <button type="button" class="btn btn-warning">Đánh dấu-tin</button>
                        <div class="warning">
                            <div class="title" style="margin-top: 10px;">HƯỚNG DẪN MUA HÀNG AN TOÀN</div>
                            <ul>
                                <li>Không trả tiền trước khi nhận hàn</li>
                                <li>Kiểm tra hàng cẩn thận, đặc biệt với hàng đắt tiền</li>
                                <li>Nếu bạn mua hàng hiệu, hãy gặp mặt ở cửa hàng để nhờ xác minh, tránh mua phải hàng giả.</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<form action="{{asset('sendmail')}}" method="POST">
<div class="modal fade" id="mess" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog small-content">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Gửi tin nhắn</h4>
      </div>
      <div class="modal-body">
        <input type="hidden" name="username" value="{{$value->username}}">
        <label>Vấn đề :</label>
        <input type="text" class="form-control" name="name_mail">
        <label>Nội dung :</label>
        <textarea class="form-control" rows="3" name="content_mail"></textarea>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-success">Gửi</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
      </div>
    </div><!-- /.modal-content help-->
  </div><!-- /.modal-dialog help-->
</div><!-- /.modal help-->
</form>
</div>
{{HTML::style('public/css/image.css')}}
{{HTML::script('public/js/ajax/vote.js')}}
{{HTML::script('public/js/bootstrap.min.js')}}
<script>
$('[data-toggle="popoverbottom"]').popover({
    trigger: 'focus',
        'placement': 'bottom'
});
$('[data-toggle="popoverright"]').popover({
    trigger: 'focus',
        'placement': 'right'
});

$(window).scroll(function(e){
    var top = $(window).scrollTop();

    if (top > 70){
        $("#floating-box2").addClass("fixed2");
    }
    else
        $("#floating-box2").removeClass("fixed2");
});


</script>
<!--upload-->

{{HTML::script('public/js/classie-menu.js');}}
{{HTML::script('public/js/gnmenu.js');}}
<!-- Add fancyBox main JS and CSS files -->
{{HTML::script('public/js/bootstrap.min.js');}}
<script>
    new gnMenu( document.getElementById( 'gn-menu' ) );
</script>
@endsection