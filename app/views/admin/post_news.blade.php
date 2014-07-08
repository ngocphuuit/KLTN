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
<span class="icon-angle-right"></span>
</li>
<li><a href="#">Đăng bài</a>
<span class="icon-angle-right"></span>
</li>
</ul> </div>
</div>
<div class="row-fluid">
<div class="span12">
<div class="social-box">
	<div class="header">
		<h4>
			<i class="icon-bar-chart"></i>
			Đăng tin
		</h4>
		<div class="tools">
		</div>
	</div>
	@if(isset($infor))
	@foreach($infor as $info)
	@endforeach
	<form action="{{asset('admin/news/edit')}}" method="POST" accept-charset="UTF-8" enctype="multipart/form-data">
	<div class="body">
		<div class="form-horizontal">
			<div class="control-group">
				<label class="control-label">Tiêu đề bài viết</label>
				<div class="controls">
					<input type="text" class="span6" required placeholder="Tiêu đề" name="post_title" value="{{$info->post_title}}">
					<input type="hidden" name="post_id" value="{{$info->post_id}}">
				</div>
			</div>
			<div class="control-group">
				<label class="control-label">Up ảnh slide</label>
				<div class="controls">
				<div class="span6">
					<input type="file" name="image">
				</div>
				</div>
			</div>
			<div class="control-group">
				<label class="control-label">Nội dung bài viết</label>
				<div class="controls">
					<textarea name="post_content" id="post_content" rows="10" cols="80" value="{{$info->post_content}}">
		            </textarea>
		            <script>
                		CKEDITOR.replace( 'post_content' );
            		</script>
				</div>
			</div>

			<div class="control-group">
				<div class="controls">
					<button type="submit" class="btn btn-primary">Đăng tin</button>
				</div>

			</div>
		</div>
	</div>
	</form>
	@else
	<form action="{{asset('admin/newspost')}}" method="POST" accept-charset="UTF-8" enctype="multipart/form-data">
	<div class="body">
		<div class="form-horizontal">
			<div class="control-group">
				<label class="control-label">Tiêu đề bài viết</label>
				<div class="controls">
					<input type="text" class="span6" required placeholder="Tiêu đề" name="post_title">
				</div>
			</div>
			<div class="control-group">
				<label class="control-label">Up ảnh slide</label>
				<div class="controls">
				<div class="span6">
					<input type="file" name="image">
				</div>
				</div>
			</div>
			<div class="control-group">
				<label class="control-label">Nội dung bài viết</label>
				<div class="controls">
					<textarea name="post_content" id="post_content" rows="10" cols="80">
		            </textarea>
		            <script>
                		CKEDITOR.replace( 'post_content' );
            		</script>
				</div>
			</div>

			<div class="control-group">
				<div class="controls">
					<button type="submit" class="btn btn-primary">Đăng tin</button>
				</div>

			</div>
		</div>
	</div>
	</form>
	@endif
</div>
</div>
</div>
</div>
</div>
{{HTML::script('public/js/ckeditor/ckeditor.js');}}
@endsection
