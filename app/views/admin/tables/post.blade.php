@extends('admin/layout/defaut')
@section('content')
<div id="main">
<div class="container-fluid">
<div class="row-fluid">
<div class="span12">
<h3 class="page-title">
Quản lý bài đăng
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
<li><a href="{{asset('/admin/post')}}">Quản lý bài đăng</a>
</li>
</ul> </div>
</div>
<div class="row-fluid">
<div class="span12">
<div class="social-box">
<div class="header">
<div class="btn-group hidden-phone">
<a class="btn btn-primary" href="{{asset('admin/post_news')}}"><i class="icon-pencil"></i> Thêm bài đăng</a>
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
<th>Tiêu đề bài đăng</th>
<th>Người đăng</th>
<th>SĐT</th>
<th>Trang đăng bài</th>
<th>Đóng bài đăng</th>
</tr>
</thead>
<tbody>
@foreach($list as $k => $listpost)
	<tr class="odd gradeX">
	<td><input type="checkbox" id="inlineCheckbox2" value="option2"></td>
	<td>{{$k+1}}</td>
	<td>{{$listpost->category_name}}</td>
	<td>{{$listpost->art_title}}</td>
	<td>{{$listpost->username}}</td>
	<td class="center"> {{$listpost->phone}}</td>
	<td class="center"><a href="{{asset('articles')}}/{{$listpost->category_name}}/{{$listpost->art_id}}">Xem</a></td>
	<td class="center">
	@if($listpost->tinhtrang == 2)
		<a href="{{asset('admin/post/unlock')}}/{{$listpost->art_id}}" class="btn btn-success">Phục hồi</a>
	@else
		<a href="{{asset('admin/post/lock')}}/{{$listpost->art_id}}" class="btn btn-danger">Khóa</a>
	@endif
	</tr>
@endforeach
</tbody>
</table>
</div>
</div></div>
</div>
</div>
</div>
@endsection
