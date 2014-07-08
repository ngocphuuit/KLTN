@include('layout.headp1');
<!-- .site-nav -->
</div>
<div class="content-wrapper"><div class="notification">
</div>
<div class="hero-unit">
  <h2>Tùy chỉnh</h2>
  Tùy chỉnh tài khoản &amp; thông tin cá nhân của bạn
</div>
@foreach($info as $k => $value)
@endforeach
<div class="link-nav">
  <ul class="actions">
  @if($value->username == Session::get('user'))
    <li class="active"><a href="#profile" data-toggle="tab">Thông tin cá nhân</a></li>
    <li class=""><a href="#ava" data-toggle="tab">Đổi ảnh đại diện</a></li>
    <li class=""><a href="#account" data-toggle="tab">Đổi email</a></li>
    <li class=""><a href="#password" data-toggle="tab">Đổi password</a></li>
    <li class=""><a href="#order" data-toggle="tab">Sản phẩm đã đặt mua</a></li>
    <li class=""><a href="#sell" data-toggle="tab">Sản phẩm đã(đang) bán</a></li>
  @else
    <li class="active"><a href="#profile" data-toggle="tab">Thông tin cá nhân</a></li>
    <li class=""><a href="#sell" data-toggle="tab">Sản phẩm đã(đang) bán</a></li>
  @endif
  </ul>
</div>

<div class="settings-wrapper">
  <div class="tab-content">
        <div class="tab-pane active" id="profile">
          <div class="panel panel-info">
            <div class="panel-heading">
              <h3 class="panel-title">
          Thông tin cá nhân</h3>
            </div>

          <div class="panel-body">
            <div class="col-md-2">
              <div class="avatar-wrapper">
                @foreach($ava as $avas)
                <img src="{{asset('public/uploads/ava')}}/{{$avas->avatar}}" class="avatar-img avatar_display thumbnail">
                @endforeach
              </div>
              <h3 class="subtitle">Avatar <small>(Giới hạn: 2 MB)</small></h3>
            </div>
            
            
            <form action="{{asset('infoupdate')}}" method="POST" accept-charset="UTF-8" enctype="multipart/form-data">
              <fieldset>
                <legend>Public Profile</legend>
                
                <div class="form-group">
                  <input type="text" id="display_name" value="{{$value->firstname}}" class="form-control" name="firstname">
                  <label for="display_name">Tên của bạn</label>
                </div>
                <div class="form-group">
                  <input type="text" id="display_name" value="{{$value->birthday}}" class="form-control" name="birthday">
                  <label for="display_name">Ngày sinh</label>
                </div>
                <div class="form-group">
                  <input type="text" id="display_name" value="{{$value->sex}}" class="form-control" name="sex">
                  <label for="display_name">Giới tính</label>
                </div>
                <div class="form-group">
                  <input type="text" id="display_name" value="{{$value->phone}}" class="form-control" name="phone">
                  <label for="display_name">Số điện thoại</label>
                </div>
                <div class="form-group">
                  <input type="text" id="display_name" value="{{$value->address}}" class="form-control" name="address">
                  <label for="display_name">Địa chỉ</label>
                </div>
                <div class="form-group">
                  <textarea id="bio" rows="1" class="form-control" maxlength="140"></textarea>
                  <label for="bio">Giới thiệu bản thân<span id="bio_chars_remaining" class="pull-right">140</span></label>
                </div>
                <div class="form-group">
                  <input type="url" id="url" value="" class="form-control" spellcheck="false">
                  <label for="url">Website</label>
                </div>
                  @if($value->username == Session::get('user'))
                <div class="form-group">
                  <button type="submit" class="text-btn text-btn-primary" id="profile_submit">Lưu</button>
                </div>
                  @endif
              </fieldset>
            </form>
          </div>
        </div>
    </div>
    <div class="tab-pane fade" id="ava">
      <div class="panel panel-info">
      <div class="panel-heading">
        <h3 class="panel-title">
    Đổi ảnh đại diện</h3>
      </div>
      <div class="panel-body">
        <div class="demo">
            <div class="bbody">
                <form id="upload_form" enctype="multipart/form-data" method="post" action="{{asset('avaupload')}}" onSubmit="return checkForm()">
                    <!-- hidden crop params -->
                    <input type="hidden" id="x1" name="x1" />
                    <input type="hidden" id="y1" name="y1" />
                    <input type="hidden" id="x2" name="x2" />
                    <input type="hidden" id="y2" name="y2" />

                    <h2>Bước 1: Chọn file ảnh</h2>
                    <div><input type="file" name="image_file" id="image_file" onChange="fileSelectHandler()" /></div>

                    <div class="error alert alert-danger alert-dismissable"></div>

                    <div class="step2">
                        <h2>Bước 2: Cắt ảnh</h2>
                        <img id="preview" />

                        <div class="info">
                            <label class="inline-block">Kích thước file</label> <input type="text" id="filesize" name="filesize" class="upava" />
                            <label class="inline-block">Loại</label> <input type="text" id="filetype" name="filetype" class="upava"/>
                            <label class="inline-block">Kích thước ảnh</label> <input type="text" id="filedim" name="filedim" class="upava"/>
                            <label class="inline-block">W</label> <input type="text" id="w" name="w" class="upava"/>
                            <label class="inline-block">H</label> <input type="text" id="h" name="h" class="upava"/>
                        </div>

                        <input type="submit" value="Đăng ảnh" />
                    </div>
                </form>
            </div>
        </div>
      </div>
    </div>
          
    </div>
    <div class="tab-pane fade" id="account">
    Nhập/thay đổi email của bạn
        <form id="email_form">
        <fieldset>
          <legend>Email của bạn</legend>
          <div class="form-group">
            <input type="email" id="profile_email" value="{{$value->email}}" class="form-control" required="" spellcheck="false">
            <label for="profile_email">Email</label>
          </div>
              @if($value->username == Session::get('user'))
          <div class="form-group">
            <button class="text-btn text-btn-primary" id="email_submit">Lưu</button>
          </div>
              @endif
        </fieldset>
      </form>
    </div>
    <div class="tab-pane fade" id="password">
        <form id="password_form">
        <fieldset>
          <legend>Thay đổi mật khẩu</legend>
          <div class="form-group">
            <input type="password" id="original_password" class="form-control" required="">
            <label for="original_password">Mật khẩu hiện tại</label>
          </div>
          <div class="form-group">
            <input type="password" id="new_password" class="form-control" minlength="8">
            <label for="new_password">Mật khẩu mới</label>
          </div>
          <div class="form-group">
            <input type="password" id="new_password_confirm" class="form-control" minlength="8">
            <label for="new_password_confirm">Nhập lại mật khẩu mới</label>
          </div>
          @if($value->username == Session::get('user'))
          <div class="form-group">
            <button class="text-btn text-btn-primary" id="password_submit">Lưu</button>
            <span class="text-danger" id="password_error"></span>
          </div>
          @endif
        </fieldset>
      </form>
    </div>
    <div class="tab-pane fade" id="order">
        <table class="table table-striped">
              <thead>
                <tr>
                  <th>STT</th>
                  <th>Tên sản phẩm</th>
                  <th>Tên người bán</th>
                  <th>Số điện thoại</th>
                  <th>Ngày đăng ký mua</th>
                  <th>Trang đăng bán</th>
                  <th>Tình trạng</th>
                  <th>Đánh giá sản phẩm</th>
                </tr>
              </thead>
              <tbody>
              @foreach($register as $ks => $registerbuy)
                <tr>
                  <td>{{$ks+1}}</td>
                  <td>{{$registerbuy->art_title}}</td>
                  <td>{{$registerbuy->firstname}}</td>
                  <td>{{$registerbuy->phone}}</td>
                  <td>11/12/2013</td>
                  <td><a href="#">
                      @foreach($artcat as $artcats)
                        @if($registerbuy->art_cat_id == $artcats->art_cat_id)
                          {{$artcats->art_cat_name}}
                        @endif
                      @endforeach
                  </a></td>
                  <td>
                    <a class="btn btn-danger unregis" href="{{asset('unregis')}}/{{$registerbuy->id_register}}">
                      Hủy đặt mua
                    </a>
                  </td>
                  <td>
                    <div class="progress progress-striped active" style="height: 10px; margin:9px 0 0 0">
                      <div class="progress-bar"  role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width:
                      @if(in_array($registerbuy->art_id, $votes ))
                        @if(in_array($registerbuy->art_id,$allgoodvotes))
                          @foreach($countgoodvotes as $goodvotes)
                            @if($registerbuy->art_id == $goodvotes->art_id)
                              @foreach($count as $counts)
                                @if($counts->art_id == $goodvotes->art_id)
                                  {{$goodvotes->goodvote/$counts->soluong*100}}%
                                @endif
                              @endforeach
                            @endif
                          @endforeach
                        @else
                            0%
                        @endif
                      @else
                        100%
                      @endif">
                        <span class="sr-only">45% Complete</span>
                      </div>
                    </div><!-- id sản phẩm, average chỉ số sao của sản phẩm-->
                </tr>
              @endforeach
              </tbody>
            </table>
    </div>
     <div class="tab-pane fade" id="sell">


        <table class="table table-striped">
              <thead>
                <tr>
                  <th>STT</th>
                  <th>Tên sản phẩm</th>
                  <th>Loại sản phẩm</th>
                  <th>Ngày đăng ký bán</th>
                  <th>Trang đăng bán</th>
                  <th>Tình trạng</th>
                  <th>Đánh giá trung bình</th>
                  <th>Tổng lượt đánh giá</th>
                  <th>Lịch sử GD</th>
                </tr>
              </thead>
              <tbody>
              @foreach($infor as $v => $data)
                <tr>
                  <td>{{$v+1}}</td>
                  <td>{{$data->art_title}}</td>
                  <td>
                    @foreach($procat as $procats)
                        @if($data->categori_id == $procats->category_id)
                          {{$procats->category_name}}
                        @endif
                      @endforeach
                  </td>
                  <td>{{$data->date_post}}</td>
                  <td><a href="#">
                      @foreach($artcat as $artcats)
                        @if($data->art_cat_id == $artcats->art_cat_id)
                          {{$artcats->art_cat_name}}
                        @endif
                      @endforeach
                  </a></td>
                  <td>
                    
                      @if($value->username == Session::get('user'))
                        @if($data->tinhtrang == 2)
                          <a class="btn btn-danger closetopic" href="#" disabled >
                            Bị Khóa
                          </a>
                        @elseif($data->tinhtrang == 1)
                          <a class="btn btn-danger closetopic" href="{{asset('closetopic')}}/{{$data->art_id}}">
                            Đóng topic
                          </a>
                        @else
                          <a class="btn btn-danger opentopic"  href="{{asset('opentopic')}}/{{$data->art_id}}">
                            Mở
                          </a>
                        @endif
                      @else
                        @if($data->tinhtrang == 1)
                        <a class="btn btn-success">
                          Đang bán
                        </a>
                        @else
                          <a class="btn btn-primary">
                          Đã bán
                          </a>
                        @endif
                      @endif
                    
                  </td>
                  <td>
                    <div class="progress progress-striped active" style="height: 10px; margin:9px 0 0 0">
                      <div class="progress-bar"  role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width:
                      @if(in_array($data->art_id, $votes ))
                        @if(in_array($data->art_id,$allgoodvotes))
                          @foreach($countgoodvotes as $goodvotes)
                            @if($data->art_id == $goodvotes->art_id)
                              @foreach($count as $counts)
                                @if($counts->art_id == $goodvotes->art_id)
                                  {{$goodvotes->goodvote/$counts->soluong*100}}%
                                @endif
                              @endforeach
                            @endif
                          @endforeach
                        @else
                            0%
                        @endif
                      @else
                        100%
                      @endif">
                        <span class="sr-only">45% Complete</span>
                      </div>
                    </div>
                  </td><!-- id sản phẩm, average chỉ số sao của sản phẩm-->
                    @if(in_array($data->art_id, $votes ))
                        @foreach($count as $counts)
                          @if($data->art_id == $counts->art_id)
                            <td>{{$counts->soluong}}</td>
                          @endif
                        @endforeach
                    @else
                        <td>0</td>
                    @endif
                  <td><a href="{{asset('personal/history/trade')}}">Xem</a></td>
                </tr>
                @endforeach
              </tbody>
            </table>
    </div>
    </div>
</div>

</div>
<div class="load-more on">
  <div class="logo load-icon">
    <i class="s1"></i>
    <i class="s2"></i>
    <i class="s3"></i>
    <i class="s4"></i>
  </div>
</div>
</div>
<script type="text/javascript">
var __lc = {};
__lc.license = 3778021;

(function() {
  var lc = document.createElement('script'); lc.type = 'text/javascript'; lc.async = true;
  lc.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'cdn.livechatinc.com/tracking.js';
  var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(lc, s);
})();
</script>
</body>
  <!-- JS file-->
  {{HTML::script('public/js/ajax/closetopic.js');}}
  {{HTML::script('public/js/ajax/opentopic.js');}}
  {{HTML::script('public/js/ajax/unregis.js');}}
  {{HTML::script('public/js/bootstrap.min.js');}}
  {{HTML::script('public/js/jRating.jquery.js');}}
<script type="text/javascript">
  $(document).ready(function(){
    $(".basic").jRating({
	  //type:'small', // type of the rate.. can be set to 'small' or 'big'
	  length : 5, // nb of stars
	  decimalLength : 1 // number of decimal in the rate
    });
  });
</script>
<script type="text/javascript">
  $(document).ready(function(){
	$(".dis").jRating({
	  isDisabled : true
	});
  });
</script>
<script>
$(document).ready(function(){
  $("#showLeft").click(function(){
    $(".sidebar").toggleClass("margin");
    $("#showLeft").toggleClass("left0");
    $("#showLeft").toggleClass("anm");
    $(".content-wrapper").toggleClass("margin0");
  });
});
$('[data-toggle="popoverhover"]').popover({
    trigger: 'hover',
        'placement': 'right'
});
</script>
{{HTML::script('public/js/bootstrap.min.js');}}
    {{HTML::script('public/js/classie-menu.js');}}
        {{HTML::script('public/js/gnmenu.js');}}
        <!-- Add fancyBox main JS and CSS files -->
        {{HTML::script('public/js/bootstrap.min.js');}}
    <script>
      new gnMenu( document.getElementById( 'gn-menu' ) );
    </script>

<style type="text/css">
.panel-heading{
  padding: 10px 15px !important;
}
</style>
</html>