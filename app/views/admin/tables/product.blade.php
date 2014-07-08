@extends('admin/layout/defaut')
@section('content')
<div id="main">
<div class="container-fluid">
<div class="row-fluid">
<div class="span12">
<h3 class="page-title">
Quản lý sản phẩm
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
<li><a href="#">Quản lý sản phẩm</a>
</li>
</ul> </div>
</div>
<div class="row-fluid">
<div class="span12">
<div class="social-box">
<div class="header">
<div class="btn-group hidden-phone">
<a class="btn btn-primary" href="{{asset('admin/postproduct')}}"><i class="icon-pencil"></i> Thêm sản phẩm</a>
<a class="btn btn-danger disabled" href="#" id="delete-row"><i class="icon-trash"></i> Xóa</a>
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
<div class="body">
<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
<thead>
<tr>
<th><input type="checkbox" id="toggle-checkboxes" value="option2"></th>
<th>ID</th>
<th>Loại sản phẩm</th>
<th>Tên sản phẩm</th>
<th>Giá</th>
<th>Số lượng</th>
<th>Hình ảnh</th>
<th>Đóng sản phẩm</th>
</tr>
</thead>
<tbody>
@foreach($data as $k => $datas)
    <tr>
	<td><input type="checkbox" id="inlineCheckbox2" value="option2"></td>
	<td>{{$k+1}}</td>
	<td>{{$datas->category_name}}</td>
	<td>{{$datas->product_name}}</td>
	<td>{{$datas->cost}}</td>
	<td>{{$datas->number}}</td>
	<td><img src="{{asset('public/uploads/product')}}/{{$datas->img_url}}" alt="Nokia Lumia" ></td>
	<td>
		<?php $a=$datas->invent;
			if($a==0)
			{
		 ?>
		<a href="{{asset('admin/block/')}}/{{$datas->product_id}}" class="btn btn-danger">Khóa</a>
		<?php
		}
		else
		{
		?>
		<a href="{{asset('admin/unblock/')}}/{{$datas->product_id}}" class="btn btn-warning">Mở khóa</a>
		<?php 
		}
		?>
		<a href="{{asset('admin/fixproduct/')}}/{{$datas->product_id}}" class="btn btn-info">Cập nhật</a></td>
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
