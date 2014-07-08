<div class="tab-content" id="tab2">
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
                  @foreach($recentPost as $recentPost)
                  <tr>
                  <td><span class="badge badge-success">{{$k}}</span></td>
                  <td>{{$recentPost->username}}</td>
                  <?php

                    $a=$a+$recentPost->number;
                  ?>
                  
              
                  <td>{{$recentPost->number}}</td>
                  </tr>
                  <?php
                  $k=$k+1;
                  ?>
                  @endforeach
                </tbody>
              </table>
              Tổng số bài đăng: {{$a}}
</div>