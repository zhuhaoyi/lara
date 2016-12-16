@include('test.head')

<div class="panel panel-default">
    <div class="panel-heading" style="height: 38px;">
        <h3 class="panel-title" style="width: 250px; float: left;">{{$data->id}} <a
                    href="/guestbook/{{$data->id}}">{{substr($data->title,0,20)}}</a></h3>

        <div class="btn-group" style="float:right;  margin-top: -9px;">
            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                更多 <span class="caret"></span>
            </button>
            <ul class="dropdown-menu" role="menu">
                <li><a href="/guestbook/{{$data->id}}/edit">编辑</a></li>
                <li><a href="/guestbook/{{$data->id}}/delete">删除</a></li>
            </ul>
        </div>
    </div>
    <div class="panel-body">
        {!! str_replace(["\n",' '],['<br>',"&ensp;"],htmlentities($data->text)) !!}
    </div>
    <div class="panel-body">
        @if($prevpage)
            <p>上一页 <a href="/guestbook/{{$data->id-1}}">{{$prevpage->title}}</a></p>
        @endif
        @if($nextpage)
            <p>下一页 <a href="/guestbook/{{$data->id+1}}">{{$nextpage->title}}</a></p>
        @endif
    </div>


</div>
</div>
</body>
</html>


