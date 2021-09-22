<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index() {
        // $posts = Post::get(); all
        $posts = Post::latest()->with(['user', 'likes'])->paginate(5);

        return view('posts.index', [
            'posts' => $posts
        ]);
    }

    public function show(Post $post) {
        return view('posts.show', [
            'post' => $post
        ]);
    }

    public function store(Request $request) {
        $this->validate($request, [
            'body' => 'required'
        ]);

        $request->user()->posts()->create($request->only('body'));

        /* These two options are valid as well */

        // $request->user()->posts()->create([
        //     // user_id will be automatically filled
        //     'body' => $request->body
        // ]);

        // Post::create([
        //     'user_id' => auth()->id(),
        //     'body' => $request->body
        // ]);

        // Redirect to the last page
        return back();
    }

    public function destroy(Post $post) {
        $this->authorize('delete', $post);
        
        $post->delete();

        return back();
    }
}