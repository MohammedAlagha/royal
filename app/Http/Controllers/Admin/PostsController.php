<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PostRequest;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Yajra\DataTables\DataTables;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.posts.index');
    }

    public function data()
    {
        $posts = Post::get();

        return DataTables::of($posts)->addColumn('action', function ($post) {

            return " <a class='btn btn-xs btn-success show' href='" . route('admin.posts.show', $post->id) . "' data-value='" . $post->name . "'><i class='fa fa-eye'></i></a>
                    <a class='btn btn-xs btn-primary edit' href='" . route('admin.posts.edit', $post->id) . "' data-value='" . $post->name . "'><i class='fa fa-edit'></i></a>
                    <a class='btn btn-xs btn-danger delete' data-id='" . $post->id. "' data-url='" . route('admin.posts.destroy', $post->id) . "'><i class='fa fa-trash'></i></a>";

        })->editColumn('details', function ($post) {
            return substr($post->details, '0', '20') . '....';
        })->editColumn('image', function ($post) {
            return "<img src='" . asset("images/posts/$post->image") . "' height='50' width='50'  alt='no image'>";
        })->rawColumns(['image', 'action'])
            ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
        $request_data = $request->except('image');

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $image = Image::make($request->image)->resize('1140', '696')->encode('jpg');

            Storage::disk('images')->put('posts/' . $request->image->hashName(), (string)$image, 'public');

            $request_data['image'] = $request->image->hashName();
        }


        Post::create($request_data);

        session()->flash('success','Data Added Successfully');

        return redirect()->route('admin.posts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('admin.posts.show',compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('admin.posts.edit',compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(PostRequest $request, Post $post)
    {
        $request_data = $request->except('image');

        if ($post->image){
            Storage::disk('images')->delete("posts/$post->image");
        }


        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $image = Image::make($request->image)->resize('1140', '696')->encode('jpg');

            Storage::disk('images')->put('posts/' . $request->image->hashName(), (string)$image, 'public');

            $request_data['image'] = $request->image->hashName();
        }

        $post->update($request_data);

        session()->flash('success','Data Edited Successfully');

        return redirect()->route('admin.posts.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();

        if ($post->image){
            Storage::disk('images')->delete("posts/$post->image");
        }

        return response()->json(['message'=>'Deleted Successfully']);

    }
}
