<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\user\Category;
use App\Model\user\Post;
use App\Model\user\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        return view('admin.posts.show')->with('posts', $posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::user()->can('posts.create')) {

            $tags = Tag::all();
            $categories = Category::all();
            return view('admin.posts.posts', compact('tags', 'categories'));
        }

        return redirect(route('admin.home'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    //  $this->validate($request, [
    //     'title' => 'required',
    //     'slug' => 'required', 
    //     'body' => 'required'
    // ]);

     // return $request->all();
     $post = new Post;
     $post->title = $request->input('title');
     $post->slug = $request->input('slug');
     $post->body = $request->input('body');
     $post->status = $request->input('status');

     $file = request()->file('image');
     $imagename = time().'.'.$file->getClientOriginalExtension();
     $filepath = 'upload/'.$imagename;
     $storage = Storage::disk('s3');
     $storage->put($filepath, fopen($file, 'r+'), 'public');
     $post->image = $filepath;

     $post->save();
     $post->categories()->sync($request->input('categories'));
     $post->tags()->sync($request->input('tags'));

     //return Storage::disk('s3')->url($filepath);
     return redirect(route('posts.index'))->with('success', 'Post Created Successfully');
 }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $posts = Post::all();
        return redirect(route('posts.index'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (Auth::user()->can('posts.update')) {
            $posts = Post::with('tags', 'categories')->where('id', $id)->first(); 
            //return $posts;
            $tags = Tag::all();
            $categories = Category::all();
            return view('admin.posts.edit', compact('tags', 'categories', 'posts'));
        }
        return redirect(route('admin.home'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required',
            'slug' => 'required', 
            'body' => 'required'
        ]);
        
        $post = Post::where('id', $id)->first();
        $post->title = $request->input('title');
        $post->slug = $request->input('slug');
        $post->body = $request->input('body');
        $post->status = $request->input('status');

        // $file = request()->file('image');
        // $imagename = time().'.'.$file->getClientOriginalExtension();
        // $filepath = 'upload/'.$imagename;
        // $storage = Storage::disk('s3');
        // $storage->put($filepath, fopen($file, 'r+'), 'public');
        // $post->image = $filepath;
        
        $post->save();
        $post->categories()->sync($request->input('categories'));
        $post->tags()->sync($request->input('tags'));

        return redirect(route('posts.index'))->with('success', 'Post Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Post $filepath)
    {
        $post = Post::where('id', $id)->delete();
        Storage::disk('s3')->delete($filepath);
        return redirect()->back()->with('delete', 'Post Deleted Successsfully');
    }
}
