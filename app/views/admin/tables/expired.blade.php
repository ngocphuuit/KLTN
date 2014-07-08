@extends('admin/layout/defaut')
@section('content')
<div id="main">
<div class="container-fluid">
<div class="row-fluid">
<div class="span12">
<h3 class="page-title">
Quản lý đơn hàng
</h3>
<ul class="breadcrumb">
<li>
<i class="icon-home"></i>
<a href="{{asset('/admin')}}">Trang chính</a>
<span class="icon-angle-right"></span>
</li>
<li><a href="#">Quản lý</a>
<span class="icon-angle-right"></span>
</li>
<li><a href="{{asset('/admin/news')}}">Quản lý đơn hàng</a>
</li>
</ul> </div>
</div>
<div class="row-fluid">
<div class="span12">
<div class="social-box">
<div class="header">
<div class="btn-group hidden-phone">
	<a class="btn btn-danger"><i class="icon-pencil"></i>Những đơn hàng quá 3 ngày chưa thanh toán sẽ hết hạn</a>
</div>
<div class="tools">
<div class="btn-group">
<button class="btn dropdown-toggle" data-toggle="dropdown"><i class="icon-cog"></i></button>
<ul class="dropdown-menu pull-right">
<li><a href="#">In</a></li>
<li><a href="#">Lưu dưới dạng PDF</a></li>
</ul>
</div>
</div>
</div>
<div class="body" style="overflow:auto;">
<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
<thead>
<tr>
<th>Mã đơn</th>
<th>Ngày mua</th>
<th>Người thanh toán</th>
<th>ĐC người thanh toán</th>
<th>SĐT người thanh toán</th>
<th>Người nhận</th>
<th>ĐC người nhận</th>
<th>SĐT người nhận</th>
<th>PT thanh toán</th>
<th>Tổng tiền</th>
<th>Tình trạng</th>
</tr>
</thead>
<tbody>
	@foreach($expired as $showOrder)
    <tr>
		<td>{{$showOrder->order_id}}</td>
		<td>{{$showOrder->date_buy}}</td>
		<td>{{$showOrder->order_user_name}}</td>
		<td>{{$showOrder->order_user_address}}</td>
		<td>0{{$showOrder->order_user_phone}}</td>
		<td>{{$showOrder->ship_user_name}}</td>
		<td>{{$showOrder->ship_user_address}}</td>
		<td>0{{$showOrder->ship_user_phone}}</td>
		<td>{{$showOrder->pay_name}}</td>
		<td>{{$showOrder->total_cost}}</td>
		<td><input type="button" class="btn btn-warning disabled"  value="Quá hạn!!"></td>
	</tr>
	@endforeach
</tbody>
</table>
</div>
</div></div>
</div>
</div>
</div>
<style>
	.table img{
		width: 75px;
		height: 100px !important;
	}
</style>
@endsection
