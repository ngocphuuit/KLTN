@extends('admin/layout/defaut')
@section('content')
<div id="main">
<div class="container-fluid">
<div class="row-fluid">
<div class="span12">
<h3 class="page-title">
Quản lý khách hàng
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
<li><a href="{{asset('/admin/user')}}">Quản lý khách hàng</a>
</li>
</ul> </div>
</div>
<div class="row-fluid">
<div class="span12">
<div class="social-box">
<div class="header">
<div class="btn-group hidden-phone">
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
<th>Tên khách hàng</th>
<th>Email</th>
<th>SĐT</th>
<th>Trang cá nhân</th>
<th>Khóa tài khoản</th>
</tr>
</thead>
<tbody>

@foreach($list as $k => $listuser)
	<tr class="odd gradeX">
	<td><input type="checkbox" id="inlineCheckbox2" value="option2"></td>
	<td>{{$k+1}}</td>
	<td>{{$listuser->username}}</td>
	<td>{{$listuser->email}}</td>
	<td class="center"> {{$listuser->phone}}</td>
	<td class="center"><a href="{{asset('personal/infor')}}/{{$listuser->username}}">Xem</a></td>
	<td class="center">
	@if($listuser->user_type_id == 0)
		<a href="{{asset('admin/user/unlock')}}/{{$listuser->user_id}}" class="btn btn-success">Phục hồi</a>
	@else
		<a href="{{asset('admin/user/lock')}}/{{$listuser->user_id}}" class="btn btn-danger">Khóa</a>
	@endif
	</td>
	</tr>
@endforeach
</tbody>
</table>
</div>
</div> </div>
</div>
</div>
</div>
@endsection
