<?php

namespace App\Http\Controllers;
use App\Post;
use App\User;
use App\Tag;
use DB;
use Auth;
use Illuminate\Http\Request;

class TagsController extends Controller
{
     public function index()
    { 
        return view('tags.show_tags');
    }
    // here mehode is define for save tags

    public function save_tags()
    {    
        $validate =  request()->validate([
             'name'=>'required'
        ]);
    	$tags = new Tag;
        $tags->tag_name = request('name');
        $tags->save();
        return redirect('/add-tags')->with('success','Task created successfully!');
    }

    // methode for load add task & tags form

     public function show_tasktag()
     {  
        $get_tag = Tag::all(); 
        return view('tasktags.show_tagstask', ['get_tags' =>$get_tag ]);
     }

     //  methode for save task and tag data in form

     public function save_tasktags(Request $request)
     {   

         $validate =  request()->validate([
             'short_desc'=>'required',
             'tags'=>'required',
         ]);

         $tasks = new task;
         $tasks->title = '';
         $tasks->short_desc = request('short_desc');
         $tasks->long_desc = '';
         $tasks->save();
         $lastTaskId = $tasks->id;
         $short_desc = $request->get('short_desc');
         $tags_id = $request->get('tags');

         foreach($tags_id as $val){
            $task = Task::find($lastTaskId);
            $task->tags()->attach(1,['task_id' =>$lastTaskId, 'tag_id' =>$val]);
         }
          $request->session()->flash('success', 'Add task  successfully!');
             return redirect('/show-tasktag');
        
     }
     // to show all the tags of that particuler task

    public function show_data_tags(Request $request){
        $tag_id =  $request->get('tags');
        $data['get_post_data'] = DB::table('posts')
         ->whereRaw("FIND_IN_SET('$tag_id', tag_id)")
         ->get();
        // echo "<pre>";
        // print_r($data['get_post_data']);die;
        if($data['get_post_data']){
           $res = ['success' =>1, 'msg' =>'save Data Successfully', 'data' => $data['get_post_data']];
          echo json_encode($res);
          exit();
        } else {
             $res = ['success' =>0, 'msg' =>'Failed', 'data' => $data['get_post_data']];
        }
         echo json_encode($res);
    }

}
