@extends('layout.df_personal')
                @section('content')
                <div class="main-tweet module">
                    <div class="list-link">
                        <div class="title-tweet">NGƯỜI BẠN ĐANG THEO DÕI</div>
                    </div>
                    @foreach($info2 as $value)
                    <div class="post-detailfl">
                        <div class="content">
                                <a class="account-group" href="{{asset('personal/infor')}}/{{$value->username}}" title="{{$value->firstname}}">
                                   <img src="{{asset('public/uploads/ava')}}/{{$value->avatar}}" alt="" class="avatar">
                                    <span class="account-group-inner eclip nameblock">
                                        <b class="fullname">{{$value->firstname}}</b>
                                    </span>
                                </a>
                                <a href="{{asset('unfollowing')}}/{{$value->username}}" id="following" class="btn btn-primary">
                                  Hủy theo dõi
                                </a>
                        </div>
                    </div>
                    @endforeach
                </div>
                {{HTML::script('public/js/ajax/unfollowing.js')}}
                @endsection