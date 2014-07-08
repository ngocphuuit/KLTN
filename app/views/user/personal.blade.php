@extends('layout.df_personal')
                @section('content')
                <div class="main-tweet module">
                    <div class="list-link">
                    @foreach($info as $k =>$values)
                    @endforeach
                        <div class="title-tweet">BÀI ĐĂNG</div>
                        @if($values->username == Session::get('user'))
                        <a class="btn btn-success post-btn" data-toggle="modal" data-target="#post">Đăng tin</a>
                        @else
                            @if($count3 > 0)
                                <a class="btn btn-success post-btn unfollow" href="{{asset('unfollow')}}/{{$values->username}}" >Hủy theo dõi</a>
                            @else
                                <a class="btn btn-success post-btn follower" href="{{asset('follow')}}/{{$values->username}}" >Theo dõi</a>
                            @endif
                        @endif
                    </div>
                    @foreach($infor as $ks => $post)
                    <div class="post-detail">
                        <div class="content">
                                <a class="account-group" href="{{asset('personal/infor')}}/{{$post->username}}">
                                    <img src="{{asset('public/uploads/ava')}}/{{$post->avatar}}" alt="" class="avatar">
                                    <span class="account-group-inner">
                                        <b class="fullname">{{$post->username}}</b>
                                        <span>‏</span>
                                        <span class="username">
                                            <s>@</s>
                                            <span class="js-username">{{$post->firstname}}</span>
                                        </span>
                                    </span>
                                </a>
                                <div class="time">{{$post->date_post}}</div>
                               <!--  <button id="follow" data-loading-text="Loading..." class="btn btn-primary">
                                  Đăng ký mua
                                </button> -->
                        </div>
                        <style type="text/css">
    .psn-wrap{
        overflow: hidden;
    }
    .psn-contain{
        overflow: initial;
    }
</style>
                        <div class="post-content">
                            {{$post->content}}
                        </div>
                        
                        <div class="image">
                            <ul class="enlarge">
                                @foreach($img as $images)
                                    @if($images->id_img == $post->id_img)
                                   <li><img src="{{asset('uploads')}}/{{$images->id_img}}/{{$images->filename}}" width="150px" height="150px" alt=""><span><img src="{{asset('uploads')}}/{{$images->id_img}}/{{$images->filename}}"  alt=""><br />{{$images->filename}}</span></li>
                                    @endif
                                @endforeach
                            </ul>
                        </div>
                        @foreach($comments as $comm)
                            @if($post->art_id == $comm->art_id)
                                <div class="content fix-comment"><!--cooment -->
                                <a class="account-group" href="{{asset('personal/infor')}}/{{$comm->username}}">
                                    <img src="{{asset('public/uploads/ava')}}/{{$comm->avatar}}" alt="" class="avatar">
                                    <span class="account-group-inner">
                                        <b class="fullname">{{$comm->username}}</b>
                                        <span>‏</span>
                                        <span class="username">
                                            <s>@</s>
                                            <span class="js-username">{{$comm->firstname}}</span>
                                        </span>
                                    </span>
                                </a>
                                <div class="comments" style="
    padding-top: 15px;">{{$comm->comment}}</div>
                        </div><!--cooment -->
                            @endif
                        @endforeach
                        <div class="comment" style="display: none;"></div>

                        <div class="stream-item" id="accordion">
                            <ul class="stream-item right-item">
                                <li class="reply">
                                    <div id="accordion1">
                                    @if(DB::table('like')->where('user_id',Users::where('username',Session::get('user'))->pluck('user_id'))->where('art_id',$post->art_id)->count()>0)
                                        <a href="#" onclick="return false;">Bạn đã thích</a>
                                    @else
                                        <a href="{{asset('like')}}/{{$post->art_id}}" class="like">
                                            <span class="icon sm-fvr"></span>
                                            Thích
                                        </a>
                                    @endif
                                        <a href="#" onclick="return false;">
                                            <span class="glyphicon glyphicon-thumbs-up"></span>
                                            {{$count_like = DB::table('like')->where('art_id',$post->art_id)->count();}}
                                        </a>
                                    </div>
                                </li>
                                </li>
                                <li class="reply">
                                    <div id="accordion2">
                                    @if($post->username != Session::get('user') && DB::table('user_follow')->where('user_id',Users::where('username',$post->username)->pluck('user_id'))->where('follow_by_user',Users::where('username',Session::get('user'))->pluck('user_id'))->count()==0)
                                        @if(DB::table('share')->where('user_id',Users::where('username',Session::get('user'))->pluck('user_id'))->where('art_id',$post->art_id)->count()>0)
                                            <a href="#" onclick="return false;">Đã chia sẻ</a>
                                        @else
                                            <a href="{{asset('share')}}/{{$post->art_id}}" class="share">
                                                <span class="icon sm-rtw"></span>
                                                Chia sẻ
                                            </a>
                                        @endif
                                    @endif
                                    </div>
                                </li>
                                <li class="reply">
                                    <div >
                                        <a data-toggle="collapse" data-parent="#accordion" href="#CM{{$ks+1}}">
                                            <span class="icon sm-reply"></span>
                                            Trả lời
                                        </a>
                                    </div>
                                </li>
                                <li class="reply">
                                    <div id="accordion">
                                        <a data-toggle="popoverhover" data-content="Danh sách người đăng ký mua sản phẩm này" href="{{asset('list/register')}}/{{$post->art_id}}" id="{{$post->art_id}}">
                                            <span class="icon sm-ds" ></span>
                                            Danh sách
                                            <span id="listregister"></span>
                                        </a>
                                    </div>
                                </li>
                            </ul>

                            <div class="clearfix"></div>
                            <div id="CM{{$ks+1}}" class="panel-collapse collapse">
                                <form class="comment-form" method="POST" data-url="{{asset('article/comment')}}">
                                <div class="panel-body">
                                    <div class="modal-body">
                                        <input type="hidden" name="article_id" value="{{$post->art_id}}">
                                        <textarea class="form-control" rows="3" style="resize: none;" name="comment_art" id ="comment" required></textarea><br />
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-success">Gửi</button>
                                    </div>
                                </div>
                                {{Form::close()}}
                            </div>
                        </div>
                        <script type="text/javascript">
                            $(document).ready(function() {
                                $('#{{$post->art_id}}').on('click', function(event) {
                                    event.preventDefault();
                                   var data = $(this).serialize();
                                    $.ajax({
                                        url: $(this).attr('href'),
                                        type: 'GET',
                                        data: data,
                                        success: function(data) {
                                            console.log($(this).attr('href'));
                                            $('#listregister').replaceWith(data);
                                            $('#list-buy').addClass('in');
                                            $('#list-buy').addClass('blockm');

                                        }
                                    });
                                    console.log($(this).attr('href'));
                                    return false;
                                });
                            });
                            </script>
                    </div><!--END_post detail-->
                    
                    @endforeach
                    {{HTML::style('public/css/image.css')}}
                    {{HTML::script('public/js/ajax/comment.js')}}
                    {{HTML::script('public/js/ajax/follow.js')}}
                    {{HTML::script('public/js/ajax/unfollow.js')}}
                    {{HTML::script('public/js/ajax/listregister.js')}}
                    {{HTML::script('public/js/ajax/like.js')}}
                    {{HTML::script('public/js/ajax/share.js')}}
                    <div id="modalform">
   {{ Form::open(array('url' => 'article/postart2', 'method' => 'post', 'id' => 'upload-image', 'enctype' => 'multipart/form-data', 'files' => true)) }}
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
        		<label>
                    {{ Form::hidden('private', 0); }}
                    {{ Form::checkbox('private', 1); }} Chỉ đăng trên trang cá nhân
                </label>

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
<script language="javascript">
  $('#multiple-files').on('change', function() {
    $('#form-buttons').show();
    $('#notifications').hide();
    $('#files').html('');
    for (var i = 0; i < this.files.length; i++) {
        $('#files').append('<div class="alert alert-info" style="height: 50px; margin-bottom: 10px;">Hình : <b>' + this.files[i].name + '</b></div>');
    }
});

  $('#reset').on('click', function() {
    $('#files').html('');
});
</script>
@endsection

