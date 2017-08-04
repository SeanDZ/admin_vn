@extends('layout.main')
@section('content')
    @include('common.validator')
        <div class="col-sm-8 blog-main">
            <form action="/post/store" method="POST">
                {{csrf_field()}}
                {{--<input type="hidden" name="_token" value="MESUY3topeHgvFqsy9EcM916UWQq6khiGHM91wHy">--}}
                <div class="form-group">
                    <label>标题</label>
                    <input name="Post[title]" type="text" class="form-control" placeholder="{{old('Post')['title']}}">
                </div>
                <div class="form-group">
                    <label>内容</label>
                    <textarea id=""  style="height:400px;max-height:500px;" name="Post[content]" class="form-control" placeholder="{{old('Post')['content']}}"></textarea>
                </div>
                <button type="submit" class="btn btn-default">提交</button>
            </form>
            <br>
        </div>
@endsection