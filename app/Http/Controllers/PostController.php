<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
use App\Models\Post;
use App\Models\Category;
use App\Models\Block;
use Cloudinary;

class PostController extends Controller
{
    /**
     * Post一覧を表示する
     * 
     * @param Post Postモデル
     * @return array Postモデルリスト
     */
    public function index(Post $post)//インポートしたPostをインスタンス化して$postとして使用。
    {
        return view('posts/index')->with(['posts' => $post->getPaginateByLimit()]);
    }
    
    /**
     * 特定IDのpostを表示する
     *
     * @params Object Post // 引数の$postはid=1のPostインスタンス
     * @return Reposnse post view
     */
    public function show(Post $post)
    {
        return view('posts/show')->with(['post' => $post]);
     //'post'はbladeファイルで使う変数。中身は$postはid=1のPostインスタンス。
    }
    
    public function create(Category $category, Block $block)
    {
        return view('posts/create')
        ->with([
            'categories' => $category->get(),
            'blocks' => $block->get()
        ]);
    }
    
    public function store(PostRequest $request, Post $post)
    {
        
        
        $block_id = $request['block'];
        
        // 投稿保存
        $input = $request['post'];
        
        // ファイルが存在する場合
        if ($request->file('image')) {
            $image_url = Cloudinary::upload($request->file('image')->getRealPath())->getSecurePath();
            $input += ['image' => $image_url];
        }

        $post->fill($input)->save();
        
        // ブロックのID 保存
        $post->blocks()->attach($block_id);
        
        return redirect('/posts/' . $post->id);
    }
    
    public function edit(Post $post, Block $block)
    {
        return view('posts/edit')
        ->with([
            'post' => $post,
            'blocks' => $block->get()
        ]);
    }
    
    public function update(PostRequest $request, Post $post)
    {
        $block_id = $request['block'];
        
        // 投稿更新
        $input_post = $request['post'];
        $post->fill($input_post)->save();
        
        // 投稿に紐づくブロックを削除
        $post->blocks()->detach();
        
        // ブロックのID 更新
        $post->blocks()->attach($block_id);
    
        return redirect('/posts/' . $post->id);
    }
    
    public function delete(Post $post)
    {
        $post->delete();
        return redirect('/');
    }
}
