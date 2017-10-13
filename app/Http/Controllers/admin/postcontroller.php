<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\model\user\post;
use App\model\user\category;

class postcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function __construct()
    {
        $this->middleware('auth:admin');
    }


    public function index()
    {   
        $posts = post::all();
        return view('admin.post.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = category::all();
        return view('admin.post.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       // return $request->all();
        $this->validate($request,[
         
         'title' => 'required',
         'subtitle' => 'required',
         'slug' => 'required',
         'body' => 'required',
         'image' => 'required',
           
           ]);

        if ($request->hasfile('image'))
        {
            $imagename = $request->image->store('public');
        }

        $post = new post;
        $post->title = $request->title;
        $post->subtitle = $request->subtitle;
        $post->slug = $request->slug;
        $post->body = $request->body;
        $post->image = $imagename;
        $post->save();
        $post->categories()->sync($request->categories);
        

        return redirect(route('post.index'))->with('message','post created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $posts = post::find($id);
        $categories = category::all();
        return view('admin.post.edit', compact('categories','posts'));
        
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
        $this->validate($request,[
         
         'title' => 'required',
         'subtitle' => 'required',
         'slug' => 'required',
         'body' => 'required',
           
           ]);
        
        $post = post::find($id);
        $post->title = $request->title;
        $post->subtitle = $request->subtitle;
        $post->slug = $request->slug;
        $post->body = $request->body;
        $post->save();
        $post->categories()->sync($request->categories);
        

        return redirect(route('post.index'))->with('message','post updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $posts = post::find($id);
        $posts->delete();
        return redirect()->route('post.index');
    }
}
