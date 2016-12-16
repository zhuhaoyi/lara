@include('test.head')

<form role="form" method="post" action="/guestbook/{{$data->id}}">
    <div class="panel panel-danger">
        <div class="panel-body bg-danger">
            <h4>确定要删除这篇文章吗？</h4>
            <button type="submit" class="btn btn-danger">确定删除</button>
            <button type="button" class="btn btn-default">取消</button>
        </div>
    </div>
    {{method_field('DELETE')}}
    {{csrf_field()}}
</form>

<div class="panel panel-danger">
    <div class="panel-heading" style="height: 38px;">
        <h3 class="panel-title" style="width: 250px; float: left;">{{$data->id}} {{substr($data->title,0,20)}}</h3>
    </div>
    <div class="panel-body">
        {!! str_replace("\n",'<br>',htmlentities($data->text)) !!}
    </div>
</div>


</div>
</body>
</html>