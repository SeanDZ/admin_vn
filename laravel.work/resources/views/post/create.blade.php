@extends('layout.main')
<script src="/public/utf8-php/ueditor.config.js">/*引入配置文件*/</script>
<script src="/public/utf8-php/ueditor.all.js">/*引入源码文件*/</script>
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
                    <textarea id="content"  style="height:400px;max-height:500px;" name="Post[content]" class="form-control" placeholder="{{old('Post')['content']}}"></textarea>
                    {{--<textarea id="content" rows="10" cols="70" style="border:1px solid #E5E5E5;">55222</textarea>--}}
                    <script type="text/javascript">
                        UE.getEditor("content");//实例化编辑器  传参,id为将要被替换的容器。
                    </script>
                </div>
                <button type="submit" class="btn btn-default">提交</button>
            </form>
            <br>
        </div>
@endsection
