<div class="tab-content" id="tab1">
<table class="table table-striped">
                      <thead>
                        <tr>
                        <th>#</th>
                        <th>Tên đăng nhập</th>
                        <th>Họ tên</th>
                        <th>Ngày ĐK tài khoản</th>
                        <th>Số ID</th>
                        </tr>
                      </thead>
                      <tbody class="slimScrollDiv" style="height:100px;">
                        <?php $k=1; ?>
                        @foreach($recent as $recent)
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