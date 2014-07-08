@include('layout.headp1');
<!-- .site-nav -->
</div>
<div class="content-wrapper"><div id="notif:ipad:1" class="news">
</div><div class="hero-unit">
  <div class="info">
    <h2 class="name">
      Lịch sử giao dịch sản phẩm LG G2 - ID:23123
    </h2>
    
  </div>
  
</div>
<table class="table table-striped">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Tên sản phẩm</th>
                  <th>Tên người mua</th>
                  <th>Số điện thoại</th>
                  <th>Ngày đăng ký mua</th>
                  <th>Trang đăng bán</th>
                  <th></th>
                  <th>Đã giá sản phẩm</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>1</td>
                  <td>samsung note3</td>
                  <td>mark1</td>
                  <td>01232233331</td>
                  <td>11/12/2013</td>
                  <td><a href="#">Cần bán sản phẩm</a></td>
                  <td><a class="btn btn-danger">Hủy đặt mua</a></td>
                  <td><div class="dis" data-average="18" data-id="2"></div></td><!-- id sản phẩm, average chỉ số sao của sản phẩm-->                    
                </tr>
                <tr>
                  <td>1</td>
                  <td>samsung note3</td>
                  <td>mark1</td>
                  <td>01232233331</td>
                  <td>11/12/2013</td>
                  <td><a href="#">Cần bán sản phẩm</a></td>
                  <td><a class="btn btn-danger">Hủy đặt mua</a></td>
                  <td><div class="dis" data-average="16" data-id="2"></div></td><!-- id sản phẩm -->   
                </tr>
                <tr>
                  <td>1</td>
                  <td>samsung note3</td>
                  <td>mark1</td>
                  <td>01232233331</td>
                  <td>11/12/2013</td>
                  <td><a href="#">Cần bán sản phẩm</a></td>
                  <td><a class="btn btn-danger">Hủy đặt mua</a></td>
                  <td><div class="dis" data-average="10" data-id="2"></div></td><!-- id sản phẩm -->   
                </tr>
                <tr>
                  <td>1</td>
                  <td>samsung note3</td>
                  <td>mark1</td>
                  <td>01232233331</td>
                  <td>11/12/2013</td>
                  <td><a href="#">Cần bán sản phẩm</a></td>
                  <td><a class="btn btn-danger" disabled="disabled">Sản phẩm đã bán</a></td>
                  <td><div class="dis" data-average="14" data-id="2"></div></td><!-- id sản phẩm -->   
                </tr>
              </tbody>
            </table>
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
</body>
{{HTML::script('public/js/bootstrap.min.js');}}
{{HTML::script('public/js/jRating.jquery.js');}}
<script>
$(document).ready(function(){
  $("#showLeft").click(function(){
    $(".sidebar").toggleClass("margin");
    $("#showLeft").toggleClass("left0");
    $("#showLeft").toggleClass("anm");
  });
});
$('[data-toggle="popoverhover"]').popover({
    trigger: 'hover',
        'placement': 'right'
});
</script>
<script type="text/javascript">
  $(document).ready(function(){
	$(".dis").jRating({
	  isDisabled : true
	});
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
    <!-- Optional theme -->
    <!-- Add mousewheel plugin (this is optional) -->
    <!-- Latest compiled and minified JavaScript -->
</html>