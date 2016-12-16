@include('test.head')


{{--single--}}
@if(session('msg'))
    <div class="alert alert-success alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span
                    class="sr-only">Close</span></button>
        {{session('msg')}}
    </div>
@endif
@foreach($data as $k => $v)
    <div class="panel panel-default">
        <div class="panel-heading" style="height: 38px;">
            <h3 class="panel-title" style="width: 250px; float: left;">{{$v->id}} <a
                        href="guestbook/{{$v->id}}">{{mb_substr($v->title,0,20)}}</a></h3>

            <div class="btn-group" style="float:right;  margin-top: -9px;">
                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                    更多 <span class="caret"></span>
                </button>
                <ul class="dropdown-menu" role="menu">
                    <li><a href="/guestbook/{{$v->id}}/edit">编辑</a></li>
                    <li><a href="/guestbook/{{$v->id}}/delete">删除</a></li>
                </ul>
            </div>
        </div>
        <div class="panel-body">
            {!! str_replace(["\n",' '],['<br>',"&ensp;"],htmlentities($v->text)) !!}
            <br><small style="color: grey;">发布于 <u>{{date('Y年m月d日',$v->time)}}</u></small>
        </div>
    </div>
@endforeach

    {{--single-end--}}
    {{$data}}

    </div>
    </div>


    </body>
    </html>


