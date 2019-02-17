<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use model
use App\Post;

class PostsController extends Controller
{
    // authorization
    public function __construct()
    {
        $this->middleware('auth')->except('index', 'show');
    }

    // index
    public function index () {

        // all records
        // $posts = Post::all();

        // to get five record
        // $posts = Post::take(5)->get();

        // where function
        // $posts = Post::where('id', 1)->get();

        // order function
        // $posts = Post::orderBy('title', 'asc')->get();
        $posts = Post::orderBy('id', 'desc')->paginate(5);

        $count = Post::count();
        return view('posts.index', compact('posts', 'count'));
    }

    // show
    public function show($id) {
        $post = Post::find($id);
        return view('posts.show', compact('post'));
    }
    
    // create post
    public function create () {
        return view('posts.create');
    }

    // store post
    public function store (Request $request) {
        $request->validate([
            'title' => 'required|max:100',
            'body' => 'required|max:500',
            'coverImage' => 'image|mimes:jpeg,png,bmp|max:1999'
        ]);

        // post has image ?

        
        if ($request->hasFile('coverImage')) {
            $file = $request->file('coverImage');

            $ext = $file->getClientOriginalExtension();

            $filename = 'cover_image_'. time() . '.'. $ext;

            $file->storeAs('public\coverImages', $filename);
        } else {
            $fielname = 'no_image';
        }

        $post = new Post();
        $post->title = $request->title;
        $post->body = $request->body;
        $post->image = $filename ;
        $post->user_id = auth()->user()->id;

        $post->save();
        return redirect('/posts')->with('status', 'Post was created !');
    }

    // edit post
    public function edit($id) {
        $post = Post::find($id);

        if (auth()->user()->id !== $post->user_id) {
            return redirect('/posts')->with('error', 'You cannot edit this post !');
        }
        
        return view('posts.edit', compact('post'));
    }

    // update post
    public function update (Request $request, $id) {
        $request->validate([
            'title' => 'required|max:100',
            'body' => 'required|max:500'
        ]);

        $post = Post::find($id);
        $post->title = $request->title;
        $post->body = $request->body;
        $post->save();
        return redirect('/posts')->with('status', 'Post was updated !');
    }

    // destroy post
    public function destroy($id) {
        $post = Post::find($id);
        $post->delete();
        return redirect('/posts')->with('status', 'Post was deleted !');
    }

}
