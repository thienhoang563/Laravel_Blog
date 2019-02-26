<?php

namespace App\Http\Controllers;

use App\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $blogs = Blog::all();
       return view('index', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create', compact('blogs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $blog = new Blog();
        $blog->title = $request->input('title');
        $blog->author = $request->input('author');
        $blog->description = $request->input('description');

        //upload image
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $path = $image->store('images','public');
            $blog->image = $path;
        }
        $blog->save();
        Session::flash('success', 'Created successfull!');
        return redirect()->route('index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $blog = Blog::findOrFail($id);
        return view('show', compact('blog'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $blog = Blog::findOrFail($id);
        return view('edit', compact('blog'));
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
        $blog = Blog::findOrFail($id);
//        dd($blog);
        $blog->title = $request->input('title');
        $blog->author = $request->input('author');
        $blog->description = $request->input('description');
        if ($request->hasFile('image')) {
            $currentImg = $blog->image;
            if ($currentImg) {
                Storage::delete('/public' . $currentImg);
            }

            $image = $request->file('image');
            $path = $image->store('images','public');
            $blog->image = $path;
        }
        $blog->save();
        Session::flash('success', 'Updated successfull');
        return redirect()->route('index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $blog = Blog::findOrFail($id);
        $image = $blog->image;

        if ($image){
          Storage::delete('/public/'. $image);
        }
        $blog->delete();
        Session::flash('success', 'Deleted');
        return redirect()->route('index');
    }
}
