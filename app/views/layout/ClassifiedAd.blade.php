@extends('layout.default');
@section('content');
<div class="bg-purple">
<div class="ad-container">
    <div style="width: 100%; height: 30px;"></div>
    <ol class="breadcrumb">
      <li><a href="#">Trang chủ</a></li>
      <li class="active">Trang rao vặt</li>
    </ol>
    <aside id="floating-box" class="sidebar-ad">
        <nav class="clearfix">
            <ul class="nolist">
                <li class="mobile">
                    <a href="#">Điện thoại</a>
                </li>
                <li class="pad">
                    <a href="#">Máy tính bảng</a>
                </li>
                <li class="computer">
                    <a href="#">Máy tính để bàn</a>
                </li>
                <li class="laptop">
                    <a href="#">Laptop</a>
                </li>
                <li class="elec">
                    <a href="#">Điện tử</a>
                </li>
                <li class="camera">
                    <a href="#">Kỹ thuật số</a>
                </li>
                <li class="synthesis">
                    <a href="#">Khác</a>
                </li>
            </ul>
        </nav>
    </aside>
    <div class="main-ad">
        <nav id="floating-box2" class="nav3">
    		<ul>
                <li class="tittle-ad logohead">
                    Rao vặt trên
                </li>
    			<li class="drop">
    				<a href="#">Toàn Quốc</a>

    				<div class="dropdownContain">
    					<div class="dropOut">
    						<div class="triangle"></div>
    						<ul>
    							<li class="active">Toàn Quốc</li>
    							<li>Account Settings</li>
    							<li>Switch Account</li>
    							<li>Sign Out</li>
    						</ul>
    					</div>
    				</div>
    			</li>
                <li class="drop">
    				<a href="#">Tất cả hãng</a>

    				<div class="dropdownContain">
    					<div class="dropOut">
    						<div class="triangle"></div>
    						<ul>
    							<li class="active">Tất cả hãng</li>
    							<li>Samsung</li>
    							<li>iPhone</li>
    							<li>Sign Out</li>
    						</ul>
    					</div>
    				</div>
    			</li>
                <li class="drop">
    				<a href="#">Mọi mức giá</a>

    				<div class="dropdownContain">
    					<div class="dropOut">
    						<div class="triangle"></div>
    						<ul>
    							<li class="active">Mọi mức giá</li>
    							<li>Trên 10 triệu</li>
    							<li>Dưới 10 triệu</li>
    							<li>Sign Out</li>
    						</ul>
    					</div>
    				</div>
    			</li>
    			<li><button class="btn btn-info" data-toggle="modal" data-target="#help">Giúp đỡ</button></li>
                <li><button class="btn btn-info" data-toggle="modal" data-target="#post">Đăng tin</button></li>
                <li style="margin-right: 85px;"></li>
    		</ul>
        </nav>
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
                  <ul class="panel-group" id="accordion">
                      <li class="panel panel-default " >
                        <div class="panel-heading pointer">
                          <h4 class="panel-title">
                            <div class="title-news">
                              <div class="block-title">
                                <div class="inline eclip" data-toggle="collapse" data-parent="#accordion" href="#1" title="Mua bán điện thoại">Mua bán điện thoại</div>
                                </div>
                                <a href="#" class="inline">Xem chi tiết</a>
                              </div>
                              <div class="clearfix"></div>
                            <div class="price">1.000.000 VNĐ</div>
                          </h4>
                          <div class="info-ad">
                            <div class="user-nnews c999">Yến trang</div>
                            <div class="sdt c999">099229999</div>
                          </div>
                          <div class="count-view">
                            1
                          </div>
                          <div class="count-view">
                            20 phút trước
                          </div>
                        </div>
                        <div id="1" class="panel-collapse collapse">
                          <div class="panel-body">
                            <div class="details">
                                Ai có nhu cầu thực su hãy phone nhé, miễn trả gái, mình mới mua do thua độ nên bán, em này sài ok
                                <a href="#">view more</a>
                            </div>
                            <div class="info-user">
                                <div class="detail-info">Mã tin: 1001620</div>
                                <div class="detail-info">Người đăng: Cuong</div>
                                <div class="detail-info">Tel: 0989466148</div>
                                <div class="detail-info">Phạm vi rao: Bình Dương</div>
                            </div>
                          </div>
                        </div>
                      </li>
                      <li class="panel panel-default " >
                        <div class="panel-heading pointer">
                          <h4 class="panel-title">
                            <div class="title-news">
                              <div class="block-title">
                                <div class="inline eclip" data-toggle="collapse" data-parent="#accordion" href="#2" title="Mua bán điện thoại">Mua bán điện thoại</div>
                                </div>
                                <a href="#" class="inline">Xem chi tiết</a>
                              </div>
                              <div class="clearfix"></div>
                            <div class="price">1.000.000 VNĐ</div>
                          </h4>
                          <div class="info-ad">
                            <div class="user-nnews c999">Yến trang</div>
                            <div class="sdt c999">099229999</div>
                          </div>
                          <div class="count-view">
                            1
                          </div>
                          <div class="count-view">
                            20 phút trước
                          </div>
                        </div>
                        <div id="2" class="panel-collapse collapse">
                          <div class="panel-body">
                            <div class="details">
                                Ai có nhu cầu thực su hãy phone nhé, miễn trả gái, mình mới mua do thua độ nên bán, em này sài ok
                                <a href="#">view more</a>
                            </div>
                            <div class="info-user">
                                <div class="detail-info">Mã tin: 1001620</div>
                                <div class="detail-info">Người đăng: Cuong</div>
                                <div class="detail-info">Tel: 0989466148</div>
                                <div class="detail-info">Phạm vi rao: Bình Dương</div>
                            </div>
                          </div>
                        </div>
                      </li>
                      <li class="panel panel-default " >
                        <div class="panel-heading pointer">
                          <h4 class="panel-title">
                            <div class="title-news">
                              <div class="block-title">
                                <div class="inline eclip" data-toggle="collapse" data-parent="#accordion" href="#3" title="Mua bán điện thoại">Mua bán điện thoại</div>
                                </div>
                                <a href="#" class="inline">Xem chi tiết</a>
                              </div>
                              <div class="clearfix"></div>
                            <div class="price">1.000.000 VNĐ</div>
                          </h4>
                          <div class="info-ad">
                            <div class="user-nnews c999">Yến trang</div>
                            <div class="sdt c999">099229999</div>
                          </div>
                          <div class="count-view">
                            1
                          </div>
                          <div class="count-view">
                            20 phút trước
                          </div>
                        </div>
                        <div id="3" class="panel-collapse collapse">
                          <div class="panel-body">
                            <div class="details">
                                Ai có nhu cầu thực su hãy phone nhé, miễn trả gái, mình mới mua do thua độ nên bán, em này sài ok
                                <a href="#">view more</a>
                            </div>
                            <div class="info-user">
                                <div class="detail-info">Mã tin: 1001620</div>
                                <div class="detail-info">Người đăng: Cuong</div>
                                <div class="detail-info">Tel: 0989466148</div>
                                <div class="detail-info">Phạm vi rao: Bình Dương</div>
                            </div>
                          </div>
                        </div>
                      </li>
                  </ul>
                  </p>
                </div>
                <div class="tab-pane fade" id="buy">
                  <div class="tab-pane fade active in" id="all">
                  <p>
                  <ul class="panel-group" id="accordion">
                      <li class="panel panel-default " >
                        <div class="panel-heading pointer">
                          <h4 class="panel-title">
                            <div class="title-news">
                            <div></div>Mua bán điện thoại<a href="#">(Xem chi tiết)</a>
                            </div>
                            <div class="price">1.000.000 VNĐ</div>
                          </h4>
                          <div class="info-ad">
                            <div class="user-nnews c999">Yến trang</div>
                            <div class="sdt c999">099229999</div>
                          </div>
                          <div class="count-view">
                            1
                          </div>
                          <div class="count-view">
                            20 phút trước
                          </div>
                        </div>
                        <div id="5" class="panel-collapse collapse">
                          <div class="panel-body">
                            <div class="details">
                                Ai có nhu cầu thực su hãy phone nhé, miễn trả gái, mình mới mua do thua độ nên bán, em này sài ok
                                <a href="#">view more</a>
                            </div>
                            <div class="info-user">
                                <div class="detail-info">Mã tin: 1001620</div>
                                <div class="detail-info">Người đăng: Cuong</div>
                                <div class="detail-info">Tel: 0989466148</div>
                                <div class="detail-info">Phạm vi rao: Bình Dương</div>
                            </div>
                          </div>
                        </div>
                      </li>
                  </ul>
                  </p>
                </div>
                </div>
                <div class="tab-pane fade" id="sell">
                  <p>Etsy mixtape wayfarers, ethical wes anderson tofu before they sold out mcsweeney's organic lomo retro fanny pack lo-fi farm-to-table readymade. Messenger bag gentrify pitchfork tattooed craft beer, iphone skateboard locavore carles etsy salvia banksy hoodie helvetica. DIY synth PBR banksy irony. Leggings gentrify squid 8-bit cred pitchfork. Williamsburg banh mi whatever gluten-free, carles pitchfork biodiesel fixie etsy retro mlkshk vice blog. Scenester cred you probably haven't heard of them, vinyl craft beer blog stumptown. Pitchfork sustainable tofu synth chambray yr.</p>
                </div>
                <div class="tab-pane fade" id="repair">
                  <p>Trust fund seitan letterpress, keytar raw denim keffiyeh etsy art party before they sold out master cleanse gluten-free squid scenester freegan cosby sweater. Fanny pack portland seitan DIY, art party locavore wolf cliche high life echo park Austin. Cred vinyl keffiyeh DIY salvia PBR, banh mi before they sold out farm-to-table VHS viral locavore cosby sweater. Lomo wolf viral, mustache readymade thundercats keffiyeh craft beer marfa ethical. Wolf salvia freegan, sartorial keffiyeh echo park vegan.</p>
                </div>
                <div class="tab-pane fade" id="other">
                  <p>otherviral, mustache readymade thundercats keffiyeh craft beer marfa ethical. Wolf salvia freegan, sartorial keffiyeh echo park vegan.</p>
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
<div class="modal fade" id="post" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<form>
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Đăng tin rao vặt (<a href="#" data-toggle="popoverhover" data-content="Nhiều chọn lựa hơn">Đăng tin nâng cao</a>)</h4>
      </div>
      <div class="modal-body">
      <div class="wrap-modal">
        <div class="tieude">
            TIÊU ĐỀ
        </div>
        <div class="input-group">
          <div class="input-group">
            <div class="input-group-btn">
              <button type="button" class="btn btn-default" tabindex="-1">Sửa chữa, cài đặt</button>
              <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" tabindex="-1">
                <span class="caret"></span>
                <span class="sr-only">Toggle Dropdown</span>
              </button>
              <ul class="dropdown-menu" role="menu">
                <li><a href="#">Cần mua</a></li>
                <li><a href="#">Cần bán</a></li>
                <li><a href="#">Sửa chữa, cài đặt</a></li>
                <li><a href="#">Khác</a></li>
              </ul>
            </div>
            <input type="text" data-toggle="popoverright" data-content="Dùng tiếng việt có dấu.Một tin chỉ rao tối đa một sản phẩm." class="tittle-rao form-control">
          </div>
        </div>
        <div class="tieude">
            NỘI DUNG TIN
        </div>
        <textarea class="form-control" rows="3"></textarea>
        <div class="inline">
            <div class="tieude">GIÁ</div>
            <div class="input-group">
              <input type="text" class="form-control">
              <span class="input-group-addon">VNĐ</span>
            </div>
        </div>
        <div class="inline">
            <div class="tieude">PHẠM VI RAO</div>
            <select class="form-control">
              <option>TP.HCM</option>
              <option>2</option>
              <option>3</option>
              <option>4</option>
              <option>5</option>
            </select>
        </div>
        <div class="inline">
            <div class="tieude">DANH MỤC RAO</div>
            <select class="form-control">
              <option>Điện thoại</option>
              <option>Máy tính bảng</option>
              <option>Máy tính để bàn</option>
              <option>Laptop</option>
              <option>Điện tử</option>
              <option>Kỹ thuật số</option>
              <option>Khác</option>
            </select>
        </div>
        <div class="clearfix"></div>

        <article>
          <div id="holder">
          </div>
          <p id="upload" class="hidden"><label>Drag &amp; drop not supported, but you can still upload via this input field:<br><input type="file"></label></p>
          <p id="filereader" class="hidden">File API &amp; FileReader API not supported</p>
          <p id="formdata" class="hidden">XHR2's FormData is not supported</p>
          <p id="progress" class="hidden">XHR2's upload progress isn't supported</p>
          <p>Upload progress: <progress id="uploadprogress" min="0" max="100" value="0">0</progress></p>
          <p>Drag an image from your desktop on to the drop zone above to see the browser both render the preview, but also upload automatically to this server.</p>
        </article>
        <div class="inline">
            <div class="tieude">HỌ TÊN</div>
            <input class="form-control" type="text" placeholder="Nhập họ tên..">
        </div>
        <div class="inline">
            <div class="tieude">SỐ ĐIỆN THOẠI</div>
            <input data-toggle="popoverbottom" data-content="Sử dụng để bạn có thể xóa tin để rao thông qua sms số điện thoại này" class="form-control" type="text" placeholder="Số điện thoại..">
        </div>
        <div class="inline">
            <div class="tieude">EMAIL</div>
            <input class="form-control" type="email" placeholder="Email của bạn..">
        </div>
        <div class="clearfix"></div>
    </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Hủy</button>
        <button type="button" class="btn btn-primary">Đăng tin</button>
      </div>
    </div><!-- /.modal-content post-->
  </div><!-- /.modal-dialog post-->
</div><!-- /.modal post-->
</form>
</div>
</div>

</div>
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

