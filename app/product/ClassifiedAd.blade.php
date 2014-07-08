@extends('layout.default');
@section('content');
{{ HTML::style('public/css/basic.css');}}
{{ HTML::script('public/js/dropzone.min.js') }}
<style type="text/css">
.selectbox{
  background: transparent;
  color: #5f6f81;
  border: none;
  border-bottom: 1px solid #111;
}
</style>
<div class="bg-purple">
<div class="ad-container">
    <div style="width: 100%; height: 30px;"></div>
    <ol class="breadcrumb">
      <li><a href="#">Trang chủ</a></li>
      <li class="active">Trang rao vặt</li>
    </ol>
   @include('layout/menuAd')
    <div class="main-ad">
      <form class="data-form" name="search" method="POST" action="{{asset('product/searchAd/all')}}">
        <div id="floating-box2" class="nav3">
        <ul style="margin:20px auto;">
          <li class="tittle-ad logohead">
              Rao vặt trên
          </li>
          <li>
            <select name="diadiem" class="form-control selectbox">
              <option value="">Toàn quốc</option>
              @foreach($area as $areas)
              <option value="{{$areas->province_id}}">{{$areas->province_name}}</option>
              @endforeach
            </select>
          </li>
          <li>
            <select name="loai" class="form-control selectbox">
              <option value="">Loại sản phẩm</option>
              @foreach($listcat as $k => $listcats)
              <option value="{{$listcats->category_id}}">{{$listcats->category_name}}</option>
              @endforeach
            </select>
          </li>
          <li >
            <select name="tugia" class="form-control selectbox">
              <option value="0">Từ giá</option>
              <option value="1000000">1,000,000 VNĐ</option>
              <option value="3000000">3,000,000 VNĐ</option>
            </select>
          </li>
          <li >
            <select name="dengia" class="form-control selectbox">
              <option value="999999999">Đến giá</option>
              <option value="1000000">1,000,000 VNĐ</option>
              <option value="3000000">3,000,000 VNĐ</option>
            </select>
          </li>
          <li><input type="submit" value="Tìm kiếm" class="btn btn-warning"></li>
       
          <li>|||</li>
          <li><button class="btn btn-info" data-toggle="modal" data-target="#help">Giúp đỡ</button></li>
                <li><button class="btn btn-info" data-toggle="modal" data-target="#post">Đăng tin</button></li>
                <li style="margin-right: 85px;"></li>
        </ul>
        </div>
         </form>
        <div class="content-ad">
              <ul id="myTab" class="nav nav-tabs">
                <li class="active"><a href="#all" data-toggle="tab">Tất cả</a></li>
                <li><a href="#buy" data-toggle="tab">Cần mua</a></li>
                <li><a href="#sell" data-toggle="tab">Cần bán</a></li>
                <li><a href="#repair" data-toggle="tab">Sửa chữa, cài đặt</a></li>
                <li><a href="#other" data-toggle="tab">Khác</a></li>
              </ul>
              <div id="myTabContent" class="tab-content">
                <div class="tab-pane fade active in" id="all">
                  <p>
                  <ul class="panel-group pagination" id="accordion">
                  <div id="change">
                  @foreach($info as $k => $value)
                      <li class="panel panel-default " >
                        <div class="panel-heading pointer">
                          <h4 class="panel-title">
                            <div class="title-news">
                              <div class="block-title">
                                <div class="inline eclip" data-toggle="collapse" data-parent="#accordion" href="#{{$k+1}}" title="{{$value->art_title}}">{{$value->art_title}}</div>
                                </div>
                                <a href="{{asset('articles')}}/{{$value->category_name}}/{{$value->art_id}}" class="inline">Xem chi tiết</a>
                              </div>
                              <div class="clearfix"></div>
                            <div class="price">{{$value->art_cost}} VNĐ</div>
                          </h4>
                          <div class="info-ad">
                            <div class="user-nnews c999">{{$value->username}}</div>
                            <div class="sdt c999">{{$value->phone}}</div>
                          </div>
                          <div class="count-view">
                            {{$value->daxem}}
                          </div>
                          <div class="count-view">
                            {{$value->date_post}}
                          </div>
                        </div>
                        <div id="{{$k+1}}" class="panel-collapse collapse">
                          <div class="panel-body">
                            <div class="details">
                                {{$value->content}}
                            </div>
                            <div class="info-user">
                                <div class="detail-info">Mã tin: {{$value->art_id}}</div>
                                <div class="detail-info">Người đăng: {{$value->username}}</div>
                                <div class="detail-info">Tel: {{$value->phone}}</div>
                                <div class="detail-info">Phạm vi rao: {{$value->area}}</div>
                            </div>
                          </div>
                        </div>
                      </li>
                      @endforeach
                      </div>
                  </ul>
                  <div id='paginate' style="display:block; text-align:center">
                  {{$info->links()}}
                  </div>
                  </p>
                </div>
                <div class="tab-pane fade" id="buy">
                  <div class="tab-pane fade active in" id="all">
                  <p>
                  <ul class="panel-group" id="accordion">
                      @foreach($info as $k => $value)
                      @if($value->art_cat_id == 1)
                      <li class="panel panel-default " >
                        <div class="panel-heading pointer">
                          <h4 class="panel-title">
                            <div class="title-news">
                              <div class="block-title">
                                <div class="inline eclip" data-toggle="collapse" data-parent="#accordion" href="#{{$k+1000}}" title="{{$value->art_title}}">{{$value->art_title}}</div>
                                </div>
                                <a href="{{asset('articles')}}/{{$value->category_name}}/{{$value->art_id}}" class="inline">Xem chi tiết</a>
                              </div>
                              <div class="clearfix"></div>
                            <div class="price">{{$value->art_cost}} VNĐ</div>
                          </h4>
                          <div class="info-ad">
                            <div class="user-nnews c999">{{$value->username}}</div>
                            <div class="sdt c999">{{$value->phone}}</div>
                          </div>
                          <div class="count-view">
                            {{$value->daxem}}
                          </div>
                          <div class="count-view">
                            {{$value->date_post}}
                          </div>
                        </div>
                        <div id="{{$k+1000}}" class="panel-collapse collapse">
                          <div class="panel-body">
                            <div class="details">
                                {{$value->content}}
                            </div>
                            <div class="info-user">
                                <div class="detail-info">Mã tin: {{$value->art_id}}</div>
                                <div class="detail-info">Người đăng: {{$value->username}}</div>
                                <div class="detail-info">Tel: {{$value->phone}}</div>
                                <div class="detail-info">Phạm vi rao: {{$value->area}}</div>
                            </div>
                          </div>
                        </div>
                      </li>
                      @endif
                      @endforeach
                  </ul>
                  </p>
                </div>
                </div>
                <div class="tab-pane fade" id="sell">
                  <div class="tab-pane fade active in" id="all">
                  <p>
                  <ul class="panel-group" id="accordion">
                      @foreach($info as $k => $value)
                      @if($value->art_cat_id == 2)
                      <li class="panel panel-default " >
                        <div class="panel-heading pointer">
                          <h4 class="panel-title">
                            <div class="title-news">
                              <div class="block-title">
                                <div class="inline eclip" data-toggle="collapse" data-parent="#accordion" href="#{{$k+100000}}" title="{{$value->art_title}}">{{$value->art_title}}</div>
                                </div>
                                <a href="{{asset('articles')}}/{{$value->category_name}}/{{$value->art_id}}" class="inline">Xem chi tiết</a>
                              </div>
                              <div class="clearfix"></div>
                            <div class="price">{{$value->art_cost}} VNĐ</div>
                          </h4>
                          <div class="info-ad">
                            <div class="user-nnews c999">{{$value->username}}</div>
                            <div class="sdt c999">{{$value->phone}}</div>
                          </div>
                          <div class="count-view">
                            {{$value->daxem}}
                          </div>
                          <div class="count-view">
                            {{$value->date_post}}
                          </div>
                        </div>
                        <div id="{{$k+100000}}" class="panel-collapse collapse">
                          <div class="panel-body">
                            <div class="details">
                                {{$value->content}}
                            </div>
                            <div class="info-user">
                                <div class="detail-info">Mã tin: {{$value->art_id}}</div>
                                <div class="detail-info">Người đăng: {{$value->username}}</div>
                                <div class="detail-info">Tel: {{$value->phone}}</div>
                                <div class="detail-info">Phạm vi rao: {{$value->area}}</div>
                            </div>
                          </div>
                        </div>
                      </li>
                      @endif
                      @endforeach
                  </ul>
                  </p>
                </div>
                </div>
                <div class="tab-pane fade" id="repair">
                  <div class="tab-pane fade active in" id="all">
                  <p>
                  <ul class="panel-group" id="accordion">
                      @foreach($info as $k => $value)
                      @if($value->art_cat_id == 3)
                      <li class="panel panel-default " >
                        <div class="panel-heading pointer">
                          <h4 class="panel-title">
                            <div class="title-news">
                              <div class="block-title">
                                <div class="inline eclip" data-toggle="collapse" data-parent="#accordion" href="#{{$k+10000000}}" title="{{$value->art_title}}">{{$value->art_title}}</div>
                                </div>
                                <a href="{{asset('articles')}}/{{$value->category_name}}/{{$value->art_id}}" class="inline">Xem chi tiết</a>
                              </div>
                              <div class="clearfix"></div>
                            <div class="price">{{$value->art_cost}} VNĐ</div>
                          </h4>
                          <div class="info-ad">
                            <div class="user-nnews c999">{{$value->username}}</div>
                            <div class="sdt c999">{{$value->phone}}</div>
                          </div>
                          <div class="count-view">
                            {{$value->daxem}}
                          </div>
                          <div class="count-view">
                            {{$value->date_post}}
                          </div>
                        </div>
                        <div id="{{$k+10000000}}" class="panel-collapse collapse">
                          <div class="panel-body">
                            <div class="details">
                                {{$value->content}}
                            </div>
                            <div class="info-user">
                                <div class="detail-info">Mã tin: {{$value->art_id}}</div>
                                <div class="detail-info">Người đăng: {{$value->username}}</div>
                                <div class="detail-info">Tel: {{$value->phone}}</div>
                                <div class="detail-info">Phạm vi rao: {{$value->area}}</div>
                            </div>
                          </div>
                        </div>
                      </li>
                      @endif
                      @endforeach
                  </ul>
                  </p>
                </div>
                </div>
                <div class="tab-pane fade" id="other">
                  <div class="tab-pane fade active in" id="all">
                  <p>
                  <ul class="panel-group" id="accordion">
                      @foreach($info as $k => $value)
                      @if($value->art_cat_id == 4)
                      <li class="panel panel-default " >
                        <div class="panel-heading pointer">
                          <h4 class="panel-title">
                            <div class="title-news">
                              <div class="block-title">
                                <div class="inline eclip" data-toggle="collapse" data-parent="#accordion" href="#{{$k+100000000}}" title="{{$value->art_title}}">{{$value->art_title}}</div>
                                </div>
                                <a href="{{asset('articles')}}/{{$value->category_name}}/{{$value->art_id}}" class="inline">Xem chi tiết</a>
                              </div>
                              <div class="clearfix"></div>
                            <div class="price">{{$value->art_cost}} VNĐ</div>
                          </h4>
                          <div class="info-ad">
                            <div class="user-nnews c999">{{$value->username}}</div>
                            <div class="sdt c999">{{$value->phone}}</div>
                          </div>
                          <div class="count-view">
                            {{$value->daxem}}
                          </div>
                          <div class="count-view">
                            {{$value->date_post}}
                          </div>
                        </div>
                        <div id="{{$k+100000000}}" class="panel-collapse collapse">
                          <div class="panel-body">
                            <div class="details">
                                {{$value->content}}
                            </div>
                            <div class="info-user">
                                <div class="detail-info">Mã tin: {{$value->art_id}}</div>
                                <div class="detail-info">Người đăng: {{$value->username}}</div>
                                <div class="detail-info">Tel: {{$value->phone}}</div>
                                <div class="detail-info">Phạm vi rao: {{$value->area}}</div>
                            </div>
                          </div>
                        </div>
                      </li>
                      @endif
                      @endforeach
                  </ul>
                  </p>
                </div>
                </div>

        </div>
    </div>
</div>
<div class="modal fade" id="help" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Một số điều cần lưu ý</h4>
      </div>
      <div class="modal-body">
        <br>Tin có thể bị xóa khi
        <br>Sử dụng ký tự đặc biệt
        <br>Nội dung sơ sài, không có xuất xứ, tình trạng máy
        <br>Giá bán không hợp lý, có dấu hiệu lừa đảo. VD: 1đ, 100đ
        <br>Quảng cáo cho shop, công ty
        <br>Số điện thoại không liên lạc được
        <br>Quy định đăng tin
        <br>Giải đáp thắc mắc:
        <br>1900561292
        <br>Số máy bàn: nhánh 8012
        <br>(từ 9:00 - 17:00)
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div><!-- /.modal-content help-->
  </div><!-- /.modal-dialog help-->
</div><!-- /.modal help-->
<div id="modalform">
   {{ Form::open(array('url' => 'article/postart', 'method' => 'post', 'id' => 'upload-image', 'enctype' => 'multipart/form-data', 'files' => true)) }}
<!-- <form action="{{asset('article/postart')}}" method="POST" enctype="multipart/form-data" files="true"> -->
<div class="modal fade" id="post" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Đăng tin rao vặt (<a href="#" data-toggle="popoverhover" data-content="Nhiều chọn lựa hơn">Đăng tin nâng cao</a>)</h4>
      </div>
      <div class="modal-body">
      <div class="wrap-modal">
        <div class="col-md-12">
          <div class="input-group">
            <div class="input-group">
              <div class="input-group-btn">
                <select class="form-control btn-primary ts" style="width:220px" name="artid">
                  @foreach($artcat as $artcats)
                  <option value="{{$artcats->art_cat_id}}">{{$artcats->art_cat_name}}</option>
                  @endforeach
                </select>
              </div>
              <input type="text" data-toggle="popoverright" data-content="Dùng tiếng việt có dấu.Một tin chỉ rao tối đa một sản phẩm." class="tittle-rao form-control" required placeholder="Tiêu đề" name="tieu_de">
            </div>
          </div>
        </div>
        <div class="col-md-12">
          <div class="inline">
              <div class="tieude logohead">GIÁ</div>
              <div class="input-group">
                <input type="text" required class="form-control" name="gia">
                <span class="input-group-addon">VNĐ</span>
              </div>
          </div>
          <div class="inline">
              <div class="tieude logohead">PHẠM VI RAO</div>
              <select class="form-control btn-primary ts" name="phamvi">
                @foreach($area as $areas)
                <option value="{{$areas->province_id}}">{{$areas->province_name}}</option>
                @endforeach
              </select>
          </div>
          <div class="inline">
              <div class="tieude logohead">DANH MỤC RAO</div>
              <select class="form-control btn-primary ts" name="catid">
                @foreach($procat as $procats)
                <option value="{{$procats->category_id}}">{{$procats->category_name}}</option>
                @endforeach
              </select>
          </div>
        </div>
        <span style="padding:10px;"></span>
        <div class="col-md-12">
          <textarea required class="form-control" rows="5" placeholder="Nội dung bài đăng" name="noidung"></textarea>
        </div>

        <div class="clearfix"></div>

        <article>
        <div class="col-md-12">
          <br>
          <p>Hình Ảnh:</p>
          </div>
          {{ Form::file('file[]', array('multiple' => 'multiple', 'id' => 'multiple-files', 'accept' => 'image/*')) }} <br>
           <div id="files"></div>
        </article>

        <div class="clearfix"></div>

    </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Hủy</button>
        <input type="submit" class="btn btn-primary" value="Đăng tin">
        <input type="reset" value="Làm mới" id="reset" class="btn btn-primary">
      </div>
    </div><!-- /.modal-content post-->
  </div><!-- /.modal-dialog post-->
</div><!-- /.modal post-->

</div>
<!-- </form> -->
{{Form::close()}}
</div>
</div>

</div>
<script language="javascript">
  $('#multiple-files').on('change', function() {
    $('#form-buttons').show();
    $('#notifications').hide();
    $('#files').html('');
    for (var i = 0; i < this.files.length; i++) {
        $('#files').append('<div class="alert alert-info">Hình : <b>' + this.files[i].name + '</b></div>');
    }
});

  $('#reset').on('click', function() {
    $('#files').html('');
});
</script>
 {{HTML::script('public/js/bootstrap.min.js');}}
    <script>
    $('[data-toggle="popoverbottom"]').popover({
        trigger: 'focus',
            'placement': 'bottom'
    });
    $('[data-toggle="popoverright"]').popover({
        trigger: 'focus',
            'placement': 'right'
    });
    $('[data-toggle="popoverhover"]').popover({
        trigger: 'hover',
            'placement': 'right'
    });
    </script>
<!--upload-->
    <script>
    var holder = document.getElementById('holder'),
        tests = {
          filereader: typeof FileReader != 'undefined',
          dnd: 'draggable' in document.createElement('span'),
          formdata: !!window.FormData,
          progress: "upload" in new XMLHttpRequest
        },
        support = {
          filereader: document.getElementById('filereader'),
          formdata: document.getElementById('formdata'),
          progress: document.getElementById('progress')
        },
        acceptedTypes = {
          'image/png': true,
          'image/jpeg': true,
          'image/gif': true
        },
        progress = document.getElementById('uploadprogress'),
        fileupload = document.getElementById('upload');

    "filereader formdata progress".split(' ').forEach(function (api) {
      if (tests[api] === false) {
        support[api].className = 'fail';
      } else {
        // FFS. I could have done el.hidden = true, but IE doesn't support
        // hidden, so I tried to create a polyfill that would extend the
        // Element.prototype, but then IE10 doesn't even give me access
        // to the Element object. Brilliant.
        support[api].className = 'hidden';
      }
    });

    function previewfile(file) {
      if (tests.filereader === true && acceptedTypes[file.type] === true) {
        var reader = new FileReader();
        reader.onload = function (event) {
          var image = new Image();
          image.src = event.target.result;
          image.width = 250; // a fake resize
          holder.appendChild(image);
        };

        reader.readAsDataURL(file);
      }  else {
        holder.innerHTML += '<p>Uploaded ' + file.name + ' ' + (file.size ? (file.size/1024|0) + 'K' : '');
        console.log(file);
      }
    }

    function readfiles(files) {
        debugger;
        var formData = tests.formdata ? new FormData() : null;
        for (var i = 0; i < files.length; i++) {
          if (tests.formdata) formData.append('file', files[i]);
          previewfile(files[i]);
        }

        // now post a new XHR request
        if (tests.formdata) {
          var xhr = new XMLHttpRequest();
          xhr.open('POST', '/devnull.php');
          xhr.onload = function() {
            progress.value = progress.innerHTML = 100;
          };

          if (tests.progress) {
            xhr.upload.onprogress = function (event) {
              if (event.lengthComputable) {
                var complete = (event.loaded / event.total * 100 | 0);
                progress.value = progress.innerHTML = complete;
              }
            }
          }

          xhr.send(formData);
        }
    }

    if (tests.dnd) {
      holder.ondragover = function () { this.className = 'hover'; return false; };
      holder.ondragend = function () { this.className = ''; return false; };
      holder.ondrop = function (e) {
        this.className = '';
        e.preventDefault();
        readfiles(e.dataTransfer.files);
      }
    } else {
      fileupload.className = 'hidden';
      fileupload.querySelector('input').onchange = function () {
        readfiles(this.files);
      };
    }

    </script>
    {{HTML::script('public/js/classie-menu.js');}}
        {{HTML::script('public/js/gnmenu.js');}}
        <!-- Add fancyBox main JS and CSS files -->
        {{HTML::script('public/js/bootstrap.min.js');}}
    <script>
      new gnMenu( document.getElementById( 'gn-menu' ) );
    </script>
    {{HTML::style('public/css/ClassifiedAd.css');}}
@endsection

