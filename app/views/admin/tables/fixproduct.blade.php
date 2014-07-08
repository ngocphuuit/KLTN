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
<li><a href="{{asset('/admin/product')}}">Quản lý sản phẩm</a>
<span class="icon-angle-right"></span>
</li>
<li>Cập nhật sản phẩm</a>
</li>
</ul> </div>
</div>
<div class="row-fluid">
<div class="span12">
<div class="social-box">
	<div class="header">
		<h4>
			<i class="icon-bar-chart"></i>
			Cập nhật sản phẩm
		</h4>
		<div class="tools">
		</div>
	</div>
	<form action="{{asset('productUpdate')}}" method="POST" accept-charset="UTF-8" enctype="multipart/form-data">
	<div class="body">
		<div class="form-horizontal">
			<div class="control-group">
				@foreach($fixProduct as $k => $fixProduct)
				<label class="control-label">Tên sản phẩm</label>
				<div class="controls">
					<input type="text" value="{{$fixProduct->product_name}}" class="span6" required placeholder="Tên sản phẩm" name="product_name">
				</div>
			<div style="display:none"><input type="text" value="{{$fixProduct->product_id}}" name="product_id"></div>
			</div>
			<div class="control-group">
				<label class="control-label">Giá sản phẩm</label>
				<div class="controls">
				<div class="input-prepend input-append">
					<span class="add-on">Giá</span><input class=" " value="{{$fixProduct->cost}}" required placeholder="Giá sản phẩm" type="text" name="cost"><span class="add-on">VNĐ</span>
				</div>
				</div>
			</div>
			<div class="control-group">
				<label class="control-label">VAT</label>
				<div class="controls">
					<input type="text" class=" " value="{{$fixProduct->vat}}" required placeholder="Thuế VAT" name="vat">
				</div>
			</div>
			
			<div class="control-group">
				<label class="control-label">Loại sản phẩm</label>
				<div class="controls">
					<select class=" chzn-select chzn-done" name="category_id">
						<option value="{{$fixProduct->category_id}}">{{$fixProduct->category_name}}</option>
						@foreach($listcat as $k => $listcats)
						<option value="{{$listcats->category_id}}">{{$listcats->category_name}}</option>
						@endforeach
						
					</select>
				</div>
			</div>
			
			<div class="control-group">
				<label class="control-label">Hãng sản xuất</label>
				<div class="controls">
					<select class=" chzn-select chzn-done" name="manufactory_id">
						<option value="{{$fixProduct->manufactory_id}}">{{$fixProduct->manufactory_name}}</option>
						@foreach($listmanu as $k => $listmanus)
						<option value="{{$listmanus->manufactory_id}}">{{$listmanus->manufactory_name}}</option>
						@endforeach
					</select>
				</div>
			</div>
			<div class="control-group">
				<label class="control-label">Số lượng hàng</label>
				<div class="controls">
					<input type="text" class=" " value="{{$fixProduct->number}}" required placeholder="Số lượng" name="number">
				</div>
			</div>
			<div class="control-group">
				<label class="control-label">Tóm lược</label>
				<div class="controls">
				<div class="textarea">
				<textarea name="product_des" id="post_des" rows="8" cols="80">
		                {{$fixProduct->product_des}}
		        </textarea>
		        <script>
                		CKEDITOR.replace( 'post_des', {
						uiColor: '#2e4773',
						toolbar: [
							[ 'Bold', 'Italic', '-', 'NumberedList', 'BulletedList', '-', 'Link', 'Unlink' ,'Font'],
							[ 'FontSize', 'TextColor', 'BGColor' ]
						]
					});
            		</script>
				</div>
				</div>
			</div>
			<div class="control-group">
				<label class="control-label">Mô tả sản phẩm</label>
				<div class="controls">
				<div class="textarea">
				<textarea name="product_details" id="post_content" rows="10" cols="80">
		                {{$fixProduct->product_details}}
		        </textarea>
		            <script>
                		CKEDITOR.replace( 'post_content' ,{
						uiColor: '#2e4773'
					});
            		</script>
				</div>
				</div>
			</div>
			<div class="control-group">
				<div class="controls">
					<button type="submit" class="btn btn-primary">Cập nhật</button>
				</div>
			</div>
			@endforeach
		</div>
	</div>
	</form>
</div>
</div>
</div>
</div>
</div>
@endsection
