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
    -webkit-transition: ease-in-out .15s, box-shadow ease-in-out .15s;
    transition: ease-in-out .15s, box-shadow ease-in-out .15s;
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
    <form name="cart" method="POST" action="{{asset('product/checkout')}}" id="checkout-form">
    <div class="main-ad">
        <div class="content-ad">
          <div class="row">
              <div class="col-md-5" style="border: 1px solid green;margin-left: 15px;margin-bottom: 15px;">
                <div class="checkbox">
                <label>
                <h3>Thông tin người mua</h3>
                (Thông tin người mua hàng)
                </label>
                </div>
                @foreach($infor as $infors)
                @endforeach
                <div class="form-group">
                  <label for="exampleInputEmail1">Họ tên*</label>
                  <input name="hoten" type="text" class="form-control" id="exampleInputEmail1" placeholder="Họ tên người thanh toán" value="{{$infors->firstname}}" required>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Địa chỉ*</label>
                  <input name="diachi" type="text" class="form-control" id="exampleInputPassword1" placeholder="Địa chỉ người thanh toán" value="{{$infors->address}}" required>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Tỉnh thành</label>
                  <div class="controls">
                    <select class="form-control" name="tinhthanh">
                      <option value="">Chọn tỉnh thành</option>
                                  @foreach($province as $prov)
                                  <option value="{{$prov->province_id}}" '@if($prov->province_id == $infors->province_id) selected @endif'>{{$prov->province_name}}</option>
                                  @endforeach
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Email*</label>
                  <input name="email" type="Email" class="form-control" id="exampleInputPassword1" placeholder="Email người thanh toán" value="{{$infors->email}}" required>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Số điện thoại*</label>
                  <input name="sdt" type="text" class="form-control" id="exampleInputPassword1" placeholder="Số điện thoại người thanh toán" value="{{$infors->phone}}" required>
                </div>
          </div>
          <div id="form2" class="col-md-5 col-md-offset-1" style="border: 1px solid green;margin-bottom: 15px;">

          <div class="checkbox">
            <label>
              <h3>Thông tin người nhận</h3>
              <input type="checkbox" id="check"> Cùng thông tin người nhận
            </label>
          </div>
          <div id="trendingdisplay">
                <div class="form-group">
                  <label for="exampleInputEmail11">Họ tên*</label>
                  <input name="hoten1" type="text" class="form-control" id="hoten1" placeholder="Họ tên người nhận" required>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword11">Địa chỉ*</label>
                  <input name="diachi1" type="text" class="form-control" id="diachi1" placeholder="Địa chỉ người nhận" required>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword11">Tỉnh thành</label>
                  <div class="controls">
                    <select class="form-control" name="tinhthanh1" id="tinhthanh1">
                      <option value="">Chọn tỉnh thành</option>
                                  @foreach($province as $prov)
                                    <option value="{{$prov->province_id}}">{{$prov->province_name}}</option>
                                  @endforeach
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword11">Email*</label>
                  <input name="email1" type="Email" class="form-control" id="email1" placeholder="Email người nhận" required>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword11">Số điện thoại*</label>
                  <input name="sdt1" type="text" class="form-control" id="sdt1" placeholder="Số điện thoại người nhận" required>
                </div>


          </div>
          </div>
          </div>
          <div class="row">
            <div class="col-md-5" style="background:white;  border:1px solid orange; border-radius:4px; margin-left:15px;">
              <label>Đơn hàng của bạn</label>
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th>
                      Tên sản phẩm
                    </th>
                    <th>
                      Số lượng
                    </th>
                    <th>
                      Giá
                    </th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($data as $datas)
                  <tr>
                    <td>
                      {{$datas->name}}
                    </td>
                    <td>
                      {{$datas->qty}}
                    </td>
                    <td>
                      {{$datas->subtotal}}
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
              <input type="hidden" name="mahd" value="{{$mahd}}">
              <div class="col-md-8 col-md-offset-4" style="color:orange;">
                Tổng giá: {{Cart::total();}}VNĐ
              </div>
            </div>
            <div class="col-md-5 col-md-offset-1">
              <div class="radio">
                <label>
                  <input type="radio" name="opthanhtoan" id="baokim" checked> Bảo kim
                </label>
              </div>
              <div class="radio">
                <label>
                  <input type="radio" name="opthanhtoan"  id="nganluong"> Ngân lượng
                </label>
              </div>
              <div class="radio">
                <label>
                  <input type="radio" name="opthanhtoan"  id="tructiep"> Thanh toán trực tiếp
                </label>
              </div>
            </div>
          </div>
          <div class="row" style="padding-top:40px;padding-bottom:60px;">
            <div class="col-md-1 col-md-offset-4">
            <a type="submit" id="baokimb" target="_blank" href="https://www.nganluong.vn/button_payment.php?receiver=ngocphu.uit@gmail.com&product_name=HD0001&price=2000000&return_url=URL thanh toán thành công&comments=Đơn test số 1" class="btn btn-primary" value="Thanh toán" style="width:200px; margin-left:50px; position:absolute">Thanh toán bảo kim</a>

            <a type="submit" id="nganluongb" target="_blank" href="https://www.nganluong.vn/button_payment.php?receiver=ngocphu.uit@gmail.com&product_name={{$mahd}}&price={{Cart::total();}}&return_url=URL thanh toán thành công&comments=Hóa đơn thanh toán" class="btn btn-primary" value="Thanh toán" style="width:200px; margin-left:50px; position:absolute">Thanh toán ngân lượng</a>

            <input type="submit" id="tructiepb" class="btn btn-primary" value="Thanh toán trực tiếp" style="width:200px; margin-left:50px; position:absolute">
            </div>
          </div>
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
$('#nganluongb').click(function(){
        var form = document.getElementById("checkout-form");
            form.submit();
});
$('#check').click(function(){
        var hoten = document.getElementById("hoten1");
        var diachi = document.getElementById("diachi1");
        var email = document.getElementById("email1");
        var tinhthanh = document.getElementById("tinhthanh1");
        var sdt = document.getElementById("sdt1");
    if($("#check").prop('checked')){
        hoten.value = '{{$infors->firstname}}';
        diachi.value = '{{$infors->address}}';
        email.value = '{{$infors->email}}';
        tinhthanh.value = '{{$infors->province_id}}';
        sdt.value = '{{$infors->phone}}';
    }
    else
    {
        hoten.value = '';
        diachi.value = '';
        email.value = '';
        tinhthanh.value = '';
        sdt.value = '';
    }
  });
  $('#nganluongb').hide();
  $('#tructiepb').hide();
  $('#baokim').click(function(){
    $('#baokimb').fadeIn();
    $('#nganluongb').fadeOut();
    $('#tructiepb').fadeOut();
});
  $('#nganluong').click(function(){
    $('#baokimb').fadeOut();
    $('#nganluongb').fadeIn();
    $('#tructiepb').fadeOut();
});
  $('#tructiep').click(function(){
    $('#baokimb').fadeOut();
    $('#nganluongb').fadeOut();
    $('#tructiepb').fadeIn();
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
<!--upload-->

    {{HTML::script('public/js/classie-menu.js');}}
        {{HTML::script('public/js/gnmenu.js');}}
        <!-- Add fancyBox main JS and CSS files -->
        {{HTML::script('public/js/bootstrap.min.js');}}
    <script>
      new gnMenu( document.getElementById( 'gn-menu' ) );
    </script>
    {{HTML::style('public/css/ClassifiedAd.css');}}
@endsection

