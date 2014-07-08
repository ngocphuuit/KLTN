@extends('layout.default');
@section('content');
{{ HTML::style('public/css/basic.css');}}
{{ HTML::script('public/js/dropzone.min.js') }}
<style type="text/css">
.btn-primary{
    -webkit-box-shadow: 3px -2px 2px 1px rgba(0,0,0,.1);
    -moz-box-shadow: 3px -2px 2px 1px rgba(0,0,0,.1);
    box-shadow: 3px -2px 2px 1px rgba(0,0,0,.1);
    background: rgba(0,0,0,0.5) !important;
    -webkit-transition: ease-in-out .15s, box-shadow ease-in-out .15s;
    transition: ease-in-out .15s, box-shadow ease-in-out .15s;
}
.btn-default{
    -webkit-box-shadow: 3px -2px 2px 1px rgba(127,0,0,.1);
    -moz-box-shadow: 3px -2px 2px 1px rgba(0,0,0,.1);
    box-shadow: 3px -2px 2px 1px rgba(0,0,0,.1);
    background: rgba(127,0,0,0.5) !important;
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
</style>
<div class="bg-purple">
<div class="ad-container">
    <div style="width: 100%; height: 30px;"></div>
    <ol class="breadcrumb">
      <li><a href="#">Trang chủ</a></li>
      <li class="active">Trang rao vặt</li>
    </ol>
   @include('layout/menuAd')
    <div class="main-ad">
        <div class="content-ad">
          <h3 style="text-align:center;">Chi tiết giỏ hàng</h3>
          <form name="cart" method="POST" action="{{asset('product/updatecart')}}">
              @if($total>0)
              <table class="table" style="border-radius:8px;">
                <thead style="background:white; ">
                  <tr>
                  <th>STT</th>
                  <th>Hình ảnh</th>
                  <th>Sản phẩm</th>
                  <th>Giá</th>
                  <th>Số lượng</th>
                  <th>Tổng tiền</th>
                  <th>Hủy</th>
                  </tr>
                </thead>
                <tbody class="slimScrollDiv" style="background:white; ">
                {{--*/$i=0/*--}}
                @foreach($data as $k => $datas)
                  {{--*/$i++/*--}}
                  <tr>
                  <th><span class="badge badge-success">{{$i}}</span><input type="hidden" name="rowid{{$i}}" value="{{$datas->rowid}}"></th>
                  <th><img src="{{asset('public/uploads/product')}}/{{DB::table('products')->where('product_id',$datas->id)->pluck('img_url')}}" width="32px" height="32px"></th>
                  <th>{{$datas->name}}</th>
                  <th>{{$datas->price}}</th>
                  <th><input name="number{{$i}}" type="number" style="width:60px;" class="form-control" value="{{$datas->qty}}"></th>
                  <th>{{$datas->subtotal}}</th>
                  <th><a href="{{asset('product/delete')}}/{{$datas->rowid}}">Hủy</a></th>
                  </tr>

                @endforeach
                  <tr>
                    <th colspan="4"></th>
                    <th>Tổng Cộng:</th>
                    <th>{{Cart::total();}}</th>
                    <th></th>
                  </tr>
                </tbody>
                <tr style="border:1px solid white">
                  <th colspan='3'></th>
                  <th><input type="submit" class="btn btn-default" value="Cập nhật giỏ"></th>
                  <th colspan='2'><a href="{{asset('product/cartnext')}}"  name="thanhtoan" class="btn btn-primary">Thanh toán</a></th>
                  </tr>
                </tbody>
              </table>
              @else
              <div id="cart-detail" style="text-align:center;">
                Bạn chưa mua sản phẩm nào <br>
                <a href="{{asset('/')}}">Về lại trang chủ để bắt đầu mua sản phẩm</a>
              @endif
              </div>
            </form>
        </div>
    </div>
</div>

</div>
<script language="javascript">
  $('#multiple-files').on('change', function() {
    $('#form-buttons').show();
    $('#notifications').hide();
    $('#files').html('');
    for (var i = 0; i < this.files.length; i++) {
        $('#files').append('<div class="alert alert-info">Hình : <b>' + this.files[i].name + '</b></div>');
    }
});

  $('#reset').on('click', function() {
    $('#files').html('');
});
</script>
 {{HTML::script('public/js/bootstrap.min.js');}}
    <script>
    $('[data-toggle="popoverbottom"]').popover({
        trigger: 'focus',
            'placement': 'bottom'
    });
    $('[data-toggle="popoverright"]').popover({
        trigger: 'focus',
            'placement': 'right'
    });
    $('[data-toggle="popoverhover"]').popover({
        trigger: 'hover',
            'placement': 'right'
    });
    </script>

    {{HTML::script('public/js/classie-menu.js');}}
        {{HTML::script('public/js/gnmenu.js');}}
        <!-- Add fancyBox main JS and CSS files -->
        {{HTML::script('public/js/bootstrap.min.js');}}
    <script>
      new gnMenu( document.getElementById( 'gn-menu' ) );
    </script>
    {{HTML::style('public/css/ClassifiedAd.css');}}
@endsection

