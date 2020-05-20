<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Post;
use App\Tag;
use Auth;

class PostController extends Controller
{
    public function index()
    {    
        return view('user_task.index');
    }
    // here mehode is define for show post forms
    
    public function add_post()
    {   
        $tag = Tag::get();
    	return view('show_task.add_task',['tag' =>$tag]);
    }

    // here mehode is define for save post
    public function save_task(Request $request)
    {    
    	// print_r('expression'); die;
        $validate =  request()->validate([
            'title'=>'required',
            'long_desc' => 'required',
            'tags' => 'required',
            'featured_image' =>'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);
        $user = Auth::user();
    	$post = new Post;
        $post->title = request('title');
        $post->long_desc = request('long_desc');
        $tag_names = request('tags');
        $post->tag_id = implode(',', $tag_names);
        // print_r($post->tag_name); die;
        $post->user_id = $user->id;
       	// upload image here
       	$file = $request->file('featured_image');
       	$imageName = time().'.'.$file->getClientOriginalExtension();
       	$file->move(public_path('images/'), $imageName);
       	$post->featured_image = $imageName;

       	// here insert unique slug
       	$post->slug = $this->createSlug($post->title);
        $post->save();
        return redirect('/add-post')->with('success','Task created successfully!');
    }
    //For Generating Unique Slug Our Custom function
    public function createSlug($title, $id = 0)
    {
        // Normalize the title
        $slug = str_slug($title);
        // Get any that could possibly be related.
        // This cuts the queries down by doing it once.
        $allSlugs = $this->getRelatedSlugs($slug, $id);
        // If we haven't used it before then we are all good.
        if (! $allSlugs->contains('slug', $slug)){
            return $slug;
        }
        // Just append numbers like a savage until we find not used.
        for ($i = 1; $i <= 10; $i++) {
            $newSlug = $slug.'-'.$i;
            if (! $allSlugs->contains('slug', $newSlug)) {
                return $newSlug;
            }
        }
        throw new \Exception('Can not create a unique slug');
    }

    public function getRelatedSlugs($slug, $id = 0)
    {
        return Post::select('slug')->where('slug', 'like', $slug.'%')
        ->where('id', '<>', $id)
        ->get();
    }

    // here mehode for show all task

    public function show_post()
    {
    	$post = new Post;
    	$post = Post::simplePaginate(6);
    	// echo "<pre>";
        return view('show_task.showlist_task',['post' => $post]);
    }

    // here mehode for edit task

    public function edit_post($id)
    {   
    	$post = new Post;
    	$edit_post = Post::where('id',$id)->get();
        return view('show_task.edit_task',['edit_post' => $edit_post]);
    }

    // here mehode for update task

    public function update_post(Request $request, $id)
    {   
       $validate =  request()->validate([
         'title'=>'required',
          'long_desc' => 'required',
          'featured_image' =>'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);
    	$post = Post::find($id); 
    	$post->title = request('title');
        $post->long_desc = request('long_desc');
        $post->slug = $this->createSlug($post->title);
        // upload image here
       	$file = $request->file('featured_image');
       	$imageName = time().'.'.$file->getClientOriginalExtension();
       	$file->move(public_path('images/'), $imageName);
       	$post->featured_image = $imageName;
        $post->save(); 
        return redirect('/show-post')->with('success','Task updated successfully!');
    }

    // here methode for delete task

    public function delete_post($id)
    {    
        $res = Post::where('id',$id)->delete(); 
        if($res){
           return redirect('/show-post')->with('success','Deleted task successfully.');
        }     
    }

    public function new_dashboard() 
    {
       return view('new-dashboard');
    }

    // method for show all post
    public function show_all_post() 
    {   
        $tag = Tag::get();
        $post = Post::simplePaginate(6);
        // echo "<pre>";
        return view('user_task.show_all_task',['post' => $post, 'tag' =>$tag]);
    }

    // method for define view details of post
    public function view_post($slug){
        $post = new Post;
        $edit_post = Post::where('slug',$slug)->get();
        return view('user_task.view_post_details',['edit_post' => $edit_post]);
    }
}   


