@include('test.head')
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
        <form role="form" method="post" action="/guestbook">
            {{csrf_field()}}
            <div class="form-group">
                <label for="exampleInputEmail1">标题</label>
                <input type="text" name="title" class="form-control" value="{{old('title')}}" placeholder="请输入标题">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">正文</label>
                <textarea type="textarea" name="text" class="form-control" placeholder="请输入正文">{{old('text')}}</textarea>
            </div>
            <button type="submit" class="btn btn-default">提交</button>
        </form>
    </div>
</div>


</div>
</body>
</html>


