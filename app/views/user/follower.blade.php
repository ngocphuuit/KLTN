@extends('layout.df_personal')
                @section('content')
                <div class="main-tweet module">
                    <div class="list-link">
                        <div class="title-tweet">NGƯỜI ĐANG THEO DÕI BẠN</div>
                    </div>
                    @foreach($info1 as $value)
                    <div class="post-detailfl">
                        <div class="content">
                                <a class="account-group" href="{{asset('personal/infor')}}/{{$value->username}}" title="{{$value->firstname}}">
                                    <img src="{{asset('public/uploads/ava')}}/{{$value->avatar}}" alt="" class="avatar">
                                    <span class="account-group-inner eclip nameblock">
                                        <b class="fullname">{{$value->firstname}}</b>
                                    </span>
                                </a>
                                <a href="#" id="follow" class="btn btn-primary" disabled="disabled">
                                  Đang theo dõi bạn
                                </a>
                                <a href="{{asset('unfollower')}}/{{$value->username}}" id="follow" class="btn btn-danger">
                                  Chặn theo dõi
                                </a>
                        </div>
                    </div>
                    @endforeach
                </div>
            @endsection