@extends('admin/layout/defaut')
@section('content')
<style type="text/css">
.icon-btn .rela{
  position: relative;
}
.icon-btn .pad{
  padding: 10px;
}
.warning{
  background-color: #f89406 !important;
  color: white;
}
</style>
<div id="main">
<div class="container-fluid">
<div class="row-fluid">
<div class="span12">
<h3 class="page-title">
THỐNG KÊ-BÁO CÁO
</h3>
<ul class="breadcrumb">
<li>
<i class="icon-home"></i>
<a href="{{asset('/admin')}}">Trang chính</a>
<span class="icon-angle-right"></span>
</li>
<li><a href="#">Thống kê - báo cáo</a>
</li>
</ul> </div>
</div>
<div class="row-fluid">
      <a href="#" class="icon-btn span2 offset2" style="height:132px">
        <i class="icon-inbox icon-2x"></i>
          <div>Số sản phẩm đang bán</div>
          @foreach($countStock as $countStock)
          <span class="badge label-info rela pad" style="font-size: 24px;">{{$countStock->number}}</span>
          @endforeach
          @foreach($countOS as $countOS)
          <span class="badge label-warning"><i class="icon-warning-sign"></i>{{$countOS->number}} sản phẩm hết hàng</span>
          @endforeach
      </a>
      <a href="{{asset('admin/order')}}" class="icon-btn span2" style="height:132px">
        <i class="icon-edit icon-2x"></i>
          @foreach($countProcess as $countProcess)
          <div>Hóa đơn đang chờ xử lý</div>
          <span class="badge label-info rela pad" style="font-size: 24px;">{{$countProcess->number}}</span>
          @endforeach
      </a>
      <a href="#" class="icon-btn span2">
          <i class="icon-calendar icon-2x"></i>
          <div>Calendar</div>
          <span class="badge label-important">4</span>
      </a>
      <a href="#" class="icon-btn span2">
          <i class="icon-inbox icon-2x"></i>
          <div>Inbox</div>
          <span class="badge label-success badge-right">2</span>
      </a>
</div>
<div class="row-fluid">
  <div class="span6">
    <div class="social-box" id="reg1">
    <div class="header">
      <h4>
        <i class="icon-bar-chart"></i>
        Các tài khoản đăng ký
        <form class="data-form" method="POST" data-url="{{asset('admin/recent')}}">
        <div class="row-fluid show-grid">
          <div style="float:left">
            <label for="begin">Từ ngày</label>
            <input type="date" name="begin" id="begin">
          </div>
          <div style="float:left; margin-left:10px;">
            <label for="end">Đến ngày</label>
            <input type="date" name="end" id="end">
          </div>
          <input type="submit" name="" class="btn btn-default" value="Xem" />
        </div>
      </form>
      </h4>
    </div>
      <div class="body chat">
        <div class="tabbable tabs-left" style="position: relative;overflow: auto;width: auto;height: 300px;" >
          <div class="tab-content" id="tab1">
            Các tài khoản đăng ký trong tuần
                <table class="table table-striped">
                      <thead>
                        <tr>
                        <th>#</th>
                        <th>Tên đăng nhập</th>
                        <th>Họ tên</th>
                        <th>Ngày đk tài khoản</th>
                        <th>Số ID</th>
                        </tr>
                      </thead>
                      <tbody class="slimScrollDiv" style="height:100px;">
                        <?php $k=1; ?>
                        @foreach($recentReg as $recent)
                        <tr>
                        <td><span class="badge badge-success">{{$k}}</span></td>
                        <td>{{$recent->username}}</td>
                        <td>{{$recent->lastname}} {{$recent->firstname}}</td>
                        <td>{{$recent->reg_time;}}</td>
                        <td>{{$recent->user_id;}}</td>
                        </tr>
                        <?php
                        $k=$k+1;
                        
                        ?>
                        @endforeach
                      </tbody>
                    </table>
                Tổng số người đăng ký:{{$k-1}}
          </div>
        </div>
      
      </div>
    </div>
  </div>
  <div class="span6">
    <div class="social-box">
    <div class="header">
      <h4>
        <i class="icon-bar-chart"></i>
          Số lần đăng tin của người dùng
        <form class="data-form2" method="POST" data-url="{{asset('admin/recentPost')}}">
        <div class="row-fluid show-grid">
          <div style="float:left">
            <label for="begin2">Từ ngày</label>
            <input type="date" name="begin2" id="begin2">
          </div>
          <div style="float:left; margin-left:10px;">
            <label for="end2">Đến ngày</label>
            <input type="date" name="end2" id="end2">
          </div>
          <input type="submit" name="" class="btn btn-default" value="Xem" />
        </div>
      </form>
      </h4>
    </div>
    <div class="body chat">
        <div class="tabbable tabs-left" style="position: relative;overflow: auto;width: auto;height: 300px;" >
        <div class="tab-content" id="tab2">
          Số lần đăng trong tuần
              <table class="table table-striped">
                <thead>
                  <tr>
                  <th>#</th>
                  <th>Tên đăng nhập</th>
                  <th>Số lần đăng bán</th>
                  </tr>
                </thead>
                <tbody class="slimScrollDiv" style="height:100px;">
                  <?php $k=1;$a=0; ?>
                  @foreach($recentpost as $recentpost)
                  <tr>
                  <td><span class="badge badge-success">{{$k}}</span></td>
                  <td>{{$recentpost->username}}</td>
                  
                  <?php
                  $a= $a+$recentpost->number;
                  ?>
              
                  <td>{{$recentpost->number}}</td>
                  </tr>
                  <?php
                  $k=$k+1;
                  ?>
                  @endforeach
                </tbody>
              </table>
              Tổng số bài đăng: {{$a}}
        </div>
        </div>
      
      </div>
    </div>
  </div>
</div><!--row2 end -->
<div class="row-fluid">
  <div class="span6">
    <div class="social-box">
      <div class="header warning">
        <h4>
        <i class="icon-bar-chart"></i>
        Các sản phẩm hết hàng
      </h4>
      </div>
      <div class="body">
        <div class="tabbable tabs-left" style="position: relative;overflow: auto;width: auto;height: 200px;" >
        <div class="tab-content" id="tab3">
              <table class="table table-striped">
                <thead>
                  <tr>
                  <th>#</th>
                  <th>ID sản phẩm</th>
                  <th>Tên sản phẩm</th>
                  <th>Ảnh</th>
                  </tr>
                </thead>
                <tbody class="slimScrollDiv" style="height:100px;">
                  <?php $k=1; ?>
                  @foreach($OutStock as $OutStock)
                  <tr>
                  <td><span class="badge badge-important">{{$k}}</span></td>
                  <td>{{$OutStock->product_id}}</td>
                  <td>{{$OutStock->product_name}}</td>
                  
              
                  <td><img src="{{asset('public/uploads/product')}}/{{$OutStock->img_url}}" class="thumbnail" style="width:32px; height:32px;"></td>
                  </tr>
                  <?php
                  $k=$k+1;
                  ?>
                  @endforeach
                </tbody>
              </table>
        </div>
        </div>
      </div>
    </div>
  </div>
  <div class="span6">
    <div class="social-box">
      <div class="header">
        <h4>
        <i class="icon-bar-chart"></i>
        Danh sách tin đã đăng trong tuần
      </h4>
      </div>
      <div class="body">
        <div class="tabbable tabs-left" style="position: relative;overflow: auto;width: auto;height: 200px;" >
        <div class="tab-content" id="tab3">
              <table class="table table-striped">
                <thead>
                  <tr>
                  <th>#</th>
                  
                  <th>Tiêu đề</th>
                  <th>Ngày đăng</th>
                  <th>Người đăng</th>
                  <th>ID tin</th>
                  </tr>
                </thead>
                <tbody class="slimScrollDiv" style="height:100px;">
                  <?php $k=1; ?>
                  @foreach($recentNews as $recentNews)
                  <tr>
                  <td><span class="badge badge-info">{{$k}}</span></td>
                  
                  <td>{{$recentNews->post_title}}</td>
                  <td>{{$recentNews->post_date}}</td>
                  <td>{{$recentNews->username}}</td>
                  <td>{{$recentNews->post_id}}</td>
                  </tr>
                  <?php
                  $k=$k+1;
                  ?>
                  @endforeach
                </tbody>
              </table>
        </div>
        </div>
      </div>
    </div>
  </div>

</div><!--row3 end -->
<div class="row-fluid">
  <div class="span6">
    <div class="social-box">
      <div class="header">
        <h4>
        <i class="icon-bar-chart"></i>
        Các bài đăng có người đăng ký mua nhiều nhất
      </h4>
      </div>
      <div class="body">
        <div class="tabbable tabs-left" style="position: relative;overflow: auto;width: auto;height: 200px;" >
        <div class="tab-content" id="tab5">
              <table class="table table-striped">
                <thead>
                  <tr>
                  <th>#</th>
                  <th>Tiêu đề</th>
                  <th>Số lượt đăng ký</th>
                  <th>Id bài</th>
                  </tr>
                </thead>
                <tbody class="slimScrollDiv" style="height:100px;">
                  <?php $k=1; ?>
                  @foreach($countRegBuy as $countRegBuy)
                  <tr>
                  <td><span class="badge badge-info">{{$k}}</span></td>
                  
                  <td>{{$countRegBuy->art_title}}</td>
                  <td>{{$countRegBuy->number}}</td>
                  <td>{{$countRegBuy->art_id}}</td>
                  </tr>
                  <?php
                  $k=$k+1;
                  ?>
                  @endforeach
                </tbody>
              </table>
        </div>
        </div>
      </div>
    </div>
  </div>
</div><!--row4 end -->
</div>
</div>
{{HTML::script('public/js/ajax/recentPost.js')}}
{{HTML::script('public/js/ajax/regis.js')}}
{{HTML::script('public/js/ckeditor/ckeditor.js');}}
@endsection
