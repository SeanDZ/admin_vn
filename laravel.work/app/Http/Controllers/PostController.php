<?php

namespace App\Http\Controllers;

use \App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::orderBy('created_at','desc')->paginate(8);
        return view('post/index',compact('posts'));
    }
    public function show($id)
    {
        $post = Post::find($id);
        return view('post/show',compact('post'));
    }
    public function create()
    {
        return view('post/create');
    }
    public function store(Request $request)
    {
        if($request->isMethod('POST')){
            $this->validate($request,[
                'Post.title' => 'required',
                'Post.content' => 'required',
                ],
                [
                    'required' => ':attribute不能为空！',//还可以修改resources/lang/en中文 修改config/app.php的配置  'locale' => 'en',
                ],
                [
                    'Post.title' => '文章标题',
                    'Post.content' => '文章内容',
                ]);
            $data = $request->input('Post');
            $post = new Post();
            $post->title = $data['title'];
            $post->content = $data['content'];
            if($post->save()){
                return redirect('post/index')->with('success','添加成功！');
            }
            return redirect()->back()->withInput();
        }
    }

    public function edit()
    {
        return view('post/edit');
    }
    public function update()
    {

    }
    public function delete()
    {

    }
}
