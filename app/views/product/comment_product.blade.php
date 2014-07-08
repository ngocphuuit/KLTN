                            @foreach($infor_user as $infor)
                            @endforeach
                            <div class="comment_line"></div>
                            <div class="form-group dotted">
                                <div class="comment-p"><a href="">
                                    <div class="ava-comment">
                                        <img src="{{asset('public/uploads/ava')}}/{{$infor->avatar}}" class="ava-round">
                                    </div>
                                    <div class="col-md-8" style="height:60px">
                                        <strong><small><i class="glyphicon glyphicon-user"></i>{{$infor->username}}</small></strong></a> &nbsp &nbsp &nbsp
                                        <small><i class="glyphicon glyphicon-dashboard"></i> &nbsp Ngày đăng: {{$date}}</small>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="comment_text">
                                    <p>{{$comments}}</p>
                                </div>
                            </div>