<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\model\user\post;
use App\model\user\category;
use App\Repositories\PostRepository;
use App\Repositories\CategoryRepository;


class postcontroller extends Controller
{
    
    protected $post;

    protected $category;


     public function __construct(PostRepository $post, CategoryRepository $category)
    {
        $this->post = $post;

        $this->category = $category;

        $this->middleware('auth:admin');
    }


    public function index()
    {   
        $posts = $this->post->getall();
        return view('admin.post.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Auth::user()->can('posts.create')){
        $categories = $this->category->getall();
        return view('admin.post.create', compact('categories'));
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
       // return $request->all();
        $this->validate($request,[
         
         'title' => 'required',
         'subtitle' => 'required',
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
        $post->slug = $request->title;
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
        if(Auth::user()->can('posts.update')){
        $posts = $this->post->getById($id);
        $categories = $this->category->getall();
        return view('admin.post.edit', compact('categories','posts'));
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
        $this->validate($request,[
         
         'title' => 'required',
         'subtitle' => 'required',
         'body' => 'required',
         'image' => 'required'
           
           ]);

        if ($request->hasfile('image'))
        {
            $imagename = $request->image->store('public');
        }
        
        $post = post::find($id);
        $post->title = $request->title;
        $post->subtitle = $request->subtitle;
        $post->slug = $request->title;
        $post->body = $request->body;
        $post->image = $imagename;
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
        $this->post->delete($id);
        return redirect()->route('post.index');
    }
}
