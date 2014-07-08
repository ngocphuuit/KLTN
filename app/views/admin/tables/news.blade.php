@extends('admin/layout/defaut')
@section('content')
<div id="main">
<div class="container-fluid">
<div class="row-fluid">
<div class="span12">
<h3 class="page-title">
Quản lý tin tức
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
<li><a href="{{asset('/admin/news')}}">Quản lý tin tức</a>
</li>
</ul> </div>
</div>
<div class="row-fluid">
<div class="span12">
<div class="social-box">
<div class="header">
<div class="btn-group hidden-phone">
<a class="btn btn-primary" href="{{asset('admin/post_news')}}"><i class="icon-pencil"></i> Thêm tin tức</a>
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
<th>Tiêu đề</th>
<th>Ngày post</th>
<th>Ảnh</th>
<th>Chỉnh sửa</th>
</tr>
</thead>
<tbody>
@foreach($news as $k => $new)
    <tr>
	<td><input type="checkbox" id="inlineCheckbox2" value="option2"></td>
	<td>{{$k+1}}</td>
	<td>{{$new->post_title}}</td>
	<td>{{$new->post_date}}</td>
	<td><img src="{{asset('public/uploads/slide')}}/{{$new->slide}}" alt="Nokia Lumia" ></td>
	<td><a href="{{asset('admin/news')}}/{{$new->post_id}}" class="btn btn-success">Chỉnh</a></td>
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
