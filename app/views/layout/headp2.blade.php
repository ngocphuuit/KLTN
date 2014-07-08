                </li>
				<li>
                    <ul class="userul">
                    @if(Session::has('user'))
                        <li>
                           <?php $avatar = DB::table('user')->where('username',Session::get('user'))->pluck('avatar')?>
                            <img src="{{asset('public/uploads/ava')}}/{{$avatar}}" alt="" class="imgtiny">
                            <div class="nametiny"><a href="{{asset('personal/infor')}}/{{Session::get('user')}}">{{Session::get('user')}} </a></div>
                           
                        </li>
                        <li>
                            <a href="{{asset('logout')}}">Đăng xuất</a>
                        </li>
                    @else
                        <li>
                            <a href="{{asset('viewlogin')}}">Đăng nhập/Đăng ký</a>
                        </li>
                        @endif
                    </ul>
                </li>
</ul>