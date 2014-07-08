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
	<a class="btn btn-danger"><i class="icon-pencil"></i> Quá 3 ngày sẽ hết hạn thanh toán</a>
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
<th>Ngày giao hàng</th>
<th>Người nhận</th>
<th>ĐC người nhận</th>
<th>SĐT người nhận</th>
<th>PT thanh toán</th>
<th>Tổng tiền</th>
<th>Thanh Toán</th>
<th>Ghi chú</th>
<th>Tình trạng</th>
</tr>
</thead>
<tbody>
	@foreach($showOrder as $showOrder)
    <tr>
		<td>{{$showOrder->order_id}}</td>
		<td>{{$showOrder->date_buy}}</td>
		<td>{{$showOrder->order_user_name}}</td>
		<td>{{$showOrder->order_user_address}}</td>
		<td>0{{$showOrder->order_user_phone}}</td>
		<?php
		$b=$showOrder->date_ship;
		?>
		<td><input type="text" disabled name="deliverday" value="{{$b}}" id="deliverday" style="width:80px"></td>
		<td>{{$showOrder->ship_user_name}}</td>
		<td>{{$showOrder->ship_user_address}}</td>
		<td>0{{$showOrder->ship_user_phone}}</td>
		<td>{{$showOrder->pay_name}}</td>
		<td>{{$showOrder->total_cost}}</td>
		<td>{{$showOrder->order_status_name}}</td>
		<td>{{$showOrder->note}}</td>
		<?php
		$a=$showOrder->delivered;
		$c=$showOrder->order_status_id;
		if($c==2)//chưa thanh toán thanh toán
		{
		if($a==1)//tình trạng giao hàng 1=chưa giao
		{
			date_default_timezone_set('Asia/Ho_Chi_Minh');
			$date = new DateTime('today');
			$datebuy=$showOrder->date_buy;
			$date->modify('-3 day');
			if($date<=$datebuy)//so sánh ngày mua-hiện tại
			{
		?>
			<td>
				<a href="{{asset('admin/delive/')}}/{{$showOrder->order_id}}" class="btn btn-info">Giao hàng</a>
			</td>
			<?php
			}
			else{
			?>
			<td><input type="button" class="btn btn-warning disabled"  value="Quá hạn"></td>
		<?php
		}}
		else
		{
		?>
		<td><input type="button" class="btn btn-success disabled" value="Đã giao hàng"></td>
		<?php } 
		}
		else//đã thanh toán
		{if($a==1)//tình trạng giao hàng
		{
		?>
			<td><a href="{{asset('admin/delive/')}}/{{$showOrder->order_id}}" class="btn btn-info">Giao hàng</a></td>
			<?php
			}
		else
		{
		?>
		<td><input type="button" class="btn btn-success disabled" value="Đã giao hàng"></td>
		<?php } 
		}
		?>
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
