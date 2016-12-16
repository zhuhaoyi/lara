@include('test.head')
@if(session('msg'))
    <div class="alert alert-success alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span
                    class="sr-only">Close</span></button>
        {{session('msg')}}
    </div>
@endif
@if(count($errors)>0)
    <div class="alert alert-danger alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span
                    class="sr-only">Close</span></button>
        @foreach($errors->all() as $error)
            {{$error}}<br>
        @endforeach
    </div>
@endif
<div class="panel panel-default">
    <div class="panel-body">
        <form role="form" method="post" action="/guestbook/{{$data->id}}">
            {{csrf_field()}}
            {{method_field('PUT')}}
            <div class="form-group">
                <label for="exampleInputEmail1">标题</label>
                <input type="text" name="title" class="form-control" value="{{$data->title}}">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">正文</label>
                <textarea type="textarea" rows="8" name="text" class="form-control" style="resize:none">{{$data->text}}</textarea>
            </div>
            <button type="submit" class="btn btn-default">提交</button>
        </form>
    </div>
</div>
</div>
</body>
</html>


