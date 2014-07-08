@foreach($username as $user)
@endforeach
<div class="content fix-comment"><!--cooment -->
                                <a class="account-group" href="#">
                                    <img src="{{asset('public/uploads/ava')}}/{{$user->avatar}}" alt="" class="avatar">
                                    <span class="account-group-inner">
                                        <b class="fullname">{{$user->username}}</b>
                                        <span>‏</span>
                                        <span class="username">
                                            <s>@</s>
                                            <span class="js-username">DavidHenrie</span>
                                        </span>
                                    </span>
                                </a>
                                <div class="comments">{{$comment}}</div>
</div>
<div class="comment" style="display: none; padding-top:15px;"></div>