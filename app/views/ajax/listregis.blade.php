{{HTML::script('public/js/jquery 1.8.2.js')}}
{{HTML::style('public/css/bootstrap.min.css');}}
{{HTML::style('public/style.css');}}

<div class="modal fade" id="list-buy" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" name="modal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">Danh sách người mua</h4>
      </div>
      <div class="modal-body">
        <table class="table table-striped">
              <thead>
                <tr>
                  <th>STT</th>
                  <th>Tên người mua</th>
                  <th>Địa chỉ</th>
                  <th>Số điện thoại</th>
                  <th>Trang cá nhân</th>
                </tr>
              </thead>
              <tbody>
              @foreach($data as $k => $datas)
                <tr>
                  <td>{{$k+1}}</td>
                  <td>{{$datas->username}}</td>
                  <td>{{$datas->address}}</td>
                  <td>{{$datas->phone}}</td>
                  <td><a href="{{asset('personal/infor')}}/{{$datas->username}}">Trang cá nhân</a></td>
                </tr>
                @endforeach
              </tbody>
            </table>
      </div>
      <div class="modal-footer">
        <button type="button" id="close" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div><!-- /.modal-content help-->
  </div><!-- /.modal-dialog help-->
</div><!-- /.modal help-->
<script type="text/javascript">
  $(document).ready(function() {
    $('#close').on('click', function(event) {
        event.preventDefault();
       var data = $(this).serialize();
        $.ajax({
            url: $(this).attr('href'),
            type: 'GET',
            data: data,
            success: function(data) {
                $('#list-buy').removeClass('in blockm');

            }
        });
        console.log($(this).attr('href'));
        return window.location.reload();

    });
});
</script>
