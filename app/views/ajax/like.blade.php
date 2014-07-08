<div id="accordion">
        <a href="#" onclick="return false;">Bạn đã thích</a>
        <a href="#" onclick="return false;">
            <span class="glyphicon glyphicon-thumbs-up"></span>
            {{$count_like = DB::table('like')->where('art_id',$id)->count()}}
        </a>
</div>