@extends('layout.default');
@section('content');
{{HTML::style('public/js/jScrollPane/jScrollPane.css');}}
{{HTML::style('public/css/page.css');}}
{{HTML::style('public/css/chat.css');}}
<div id="chatContainer">

    <div id="chatTopBar" class="rounded"></div>
    <div id="chatLineHolder"></div>

    <div id="chatUsers" class="rounded"></div>
    <div id="chatBottomBar" class="rounded">
    	<div class="tip"></div>

        <form id="loginForm" method="post" action="">
        <input type="text" id="name" name="name" class="rounded" maxlength="16" value="{{Session::get('user')}}" readonly="true">
        <input type="text" id="email" name="email" class="rounded" value="{{DB::table('user')->where('username',Session::get('user'))->pluck('email')}}" readonly="true">
            <input type="submit" class="blueButton" value="Login" />
        </form>

        <form id="submitForm" method="post" action="">
            <input id="chatText" name="chatText" class="rounded" maxlength="255" />
            <input type="submit" class="blueButton" value="Submit" />
        </form>

    </div>

</div>
{{HTML::script('public/js/jquery-1.8.2.min.js');}}
{{HTML::script('public/js/jScrollPane/jquery.mousewheel.js');}}
{{HTML::script('public/js/jScrollPane/jScrollPane.min.js');}}
{{HTML::script('public/js/scripts.js');}}
{{HTML::script('public/js/classie-menu.js');}}
{{HTML::script('public/js/gnmenu.js');}}
        <script>
            new gnMenu( document.getElementById( 'gn-menu' ) );
        </script>
@endsection