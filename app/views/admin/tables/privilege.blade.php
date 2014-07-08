@extends('admin/layout/defaut')
@section('content')
<div id="main">
<div class="container-fluid">
<div class="row-fluid">
<div class="span12">
<h3 class="page-title">
Phân quyền</h3>
<ul class="breadcrumb">
<li>
<i class="icon-home"></i>
<a href="{{asset('/admin')}}">Trang chính</a>
<span class="icon-angle-right"></span>
</li>
<li><a href="#">Phân Quyền</a>
<span class="icon-angle-right"></span>
</li>
<li><a href="{{asset('/admin/user')}}">Phân quyền khách hàng</a>
</li>
</ul> </div>
</div>
<div class="row-fluid">
<div class="span12">
<div class="social-box">
<div class="header">
<div class="btn-group hidden-phone">
<a class="btn btn-primary" id="add-row" href="#"><i class="icon-pencil"></i> Thêm dòng</a>
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
<th>Tên User</th>
<th>Email</th>
<th>Chức vụ</th>
<th>Trang cá nhân</th>
<th>Phân quyền</th>
</tr>
</thead>
<tbody>
@foreach($list as $k => $listuser)
	
	<tr class="odd gradeX">
	{{Form::open(array('action' => array('AdminUserController@privilege_edit', $listuser->user_id)))}}
	<td><input type="checkbox" id="inlineCheckbox2" value="option2"></td>
	<td>{{$k+1}}</td>
	<td>{{$listuser->username}}</td>
	<td>{{$listuser->email}}</td>
	<td class="center">
		<div class="control-group">
		<div class="controls">
		<select name="level" class="input-xlarge">
		@foreach($level as $lv)
			<option value="{{$lv->id_level}}" @if( $lv->level == $listuser->level ) selected @endif>
				{{$lv->level}}
			</option>
		@endforeach
		</select>
	</div>
	</div></td>

	<td class="center"><a href="{{asset('personal/infor')}}/{{$listuser->username}}">Xem</a></td>
	<td class="center">
		<input type="submit" class="btn btn-success" value="Lưu">
	</td>
	{{Form::close()}}
	</tr>
@endforeach
</tbody>
</table>
</div>
</div> </div>
</div>
</div>

@endsection
