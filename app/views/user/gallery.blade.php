@include('layout/headp1')
<div class="psn-wrap">
    <section class="psn-contain col-md-10 col-md-offset-1" style="margin-bottom:20px;">
        <div class="col-md-3 module" style="margin-left:15px;">
            <div class="aboutme">
            @foreach($infor as $infors)
            @endforeach
                <div class="roundava">
                    <a href="#">
                        <img src="{{asset('public/uploads/ava')}}/{{$infors->avatar}}" class="img-round">
                    </a>
                </div>
                <h1 id="site-name">{{$infors->username}}</h1>
            </div>
            <ul class="list-group box-s">
                <li class="list-group-item">
                    <div class="profile">Họ tên: {{$infors->firstname}}</div>
                </li>
                <li class="list-group-item">
                    <div class="profile">Ngày sinh: {{$infors->birthday}}</div>
                </li>
                <li class="list-group-item">
                    <div class="profile list-link">
                        <a href="{{asset('personal/infor')}}/{{$infors->username}}">Xem thông tin cá nhân</a>
                    </div>
                </li>
            </ul>
        </div>
        <div class="col-md-8" style="margin-left:15px;">
            <div class="main-tweet module">
                <div class="aboutme" style="padding:0px;">
                    <div class="title-album">
                        <i class="glyphicon glyphicon-picture"></i>
                        Album
                    </div>
                    <div class="post-detail2">
                        <div class="row-fluid">
                            <ul class="thumbnails" style="list-style:none;">
                                 @foreach ($album as $album)
                                <li class="col-md-3 col-md-offset-1">
                                    <a class="group1" href="{{asset('uploads/')}}/{{$album->id_img}}/{{$album->filename}}" title="{{$album->art_title}}">
                                    <img src="{{asset('uploads/')}}/{{$album->id_img}}/{{$album->filename}}" style="width:241px; height:161px;" class="thumbnail"></a>
                                    <div style="text-align:center"><a href="{{asset('articles')}}/{{$album->category_name}}/{{$album->art_id}}">Chi tiết</a></div>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
    </section>
    <div class="clearfix"></div>
</div>



{{HTML::script('public/js/bootstrap.min.js');}}
<script>
$(".group1").colorbox({rel:'group1'});

$(".ajax").colorbox();

$('#button').button();

$('#follow').click(function() {
    $(this).button('loading');
});
$('#follow').button();

$('#button').click(function() {
    $('#follow').button('reset');
});
$('[data-toggle="popoverhover"]').popover({
    trigger: 'hover',
        'placement': 'right'
});
</script>




<style>
body{
    padding: 0px;
}
.headbg{
    -webkit-background-size: cover;
    -moz-background-size: cover;
    -o-background-size: cover;
    background-size: cover;
    background-color: #444;
    padding: 0;
    text-align: center;
    overflow: hidden;
    background-repeat: no-repeat;
    -webkit-box-shadow: inset 0 -1px 0 rgba(0,0,0,.1);
    box-shadow: inset 0 -1px 0 rgba(0,0,0,.1);
    width:518px;
    height:260px;
}
.panel-body{
    width:518px;
}
.modal-body{
    padding:8px 8px;
}
.modal-footer{
    padding:8px 8px;
}
</style>
{{HTML::script('public/js/classie-menu.js');}}
{{HTML::script('public/js/gnmenu.js');}}
<script>
    new gnMenu( document.getElementById( 'gn-menu' ) );
</script>


</body>
</html>