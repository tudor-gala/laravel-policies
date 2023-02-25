<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::latest()->take(3)->get();

        return view('posts.index', compact('posts'));
    }

    public function create()
    {
        $this->authorize('create', Post::class);

        return view('posts.form');
    }

    public function store(Request $request)
    {
        $this->authorize('create', Post::class);

        $post = Post::create($request->input());

        $post->author_id = $request->user()->id;
        $post->save();

        return redirect()->route('posts.index');
    }

    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    public function edit(Post $post)
    {
        $this->authorize('update', $post);

        return view('posts.form', compact('post'));
    }

    public function update(Request $request, Post $post)
    {
        $this->authorize('update', $post);

        $post->update($request->input());

        return redirect()->route('posts.index');
    }

    public function destroy(Post $post)
    {
        $this->authorize('delete', Post::class);

        $post->delete();

        return redirect()->route('posts.index');
    }
}
