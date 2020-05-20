<?php

namespace App\Http\Controllers;

use App\Task;
use App\User;
use App\Article;
use DB;

use Illuminate\Http\Request;

class TaskController extends Controller
{   

    public function index()
    {   
     //    $task = new Task;
    	// $task = Task::limit(3)->get();
    	// return view('user_task.index')->with('task', $task); 
        return view('user_task.index');
    }
    // this methode is load clients

    public function our_clients()
    {
        return view('user_task.our_clients');
    }
    // this methode is load clients

    public function about_us()
    {
        return view('user_task.about_us');
    }
    // this methode is load clients

    public function careers()
    {
        return view('user_task.careers');
    }
    // this methode is load clients

    public function contact_us()
    {
        return view('user_task.contact_us');
    }
    // here mehode is define for show load add task

    public function add_task()
    {   
    	return view('show_task.add_task');
    }

    // here mehode is define for save task

    public function save_task()
    {    
         $validate =  request()->validate([
             'title'=>'required',
             'short_desc' => 'required',
             'long_desc' => 'required'
         ]);
    	 $task = new Task;
         $task->title = request('title');
         $task->short_desc = request('short_desc');
         $task->long_desc = request('long_desc');
         $task->save();
         return redirect('/add-tasks')->with('success','Task created successfully!');
    }

    // here mehode for show all task

    public function showlist_tasks()
    {
    	$task = new Task;
    	$task = Task::simplePaginate(4); 
        return view('show_task.showlist_task',['task' => $task]);
    }

    // here mehode for edit task

    public function edit_tasks($id)
    {   
    	$task = new Task;
    	$edit_task = Task::where('id',$id)->get();
        return view('show_task.edit_task',['edit_task' => $edit_task]);
    }

    // here mehode for update task

    public function update_task($id)
    {   
       $validate =  request()->validate([
         'title'=>'required',
         'short_desc' => 'required',
         'long_desc' => 'required'
        ]);
    	 $task = Task::find($id); 
    	 $task->title = request('title');
         $task->short_desc = request('short_desc');
         $task->long_desc = request('long_desc');
         $task->save(); 
         return redirect('/showList-tasks')->with('success','Task updated successfully!');
    }


    // here mehode for show full description

    public function full_descrption($id)
    {   
    	$task = new Task;
    	$full_desc = Task::where('id',$id)->get();
        return view('show_task.full_description',['full_desc' => $full_desc]);
    }

    // here methode for used get user details

     public function getuserDeatil()
     {
         $user = User::find(4);
         print_r($user->articles);
             
     }

     // here methode for delete task

     public function delete_tasks($id)
     {    
         $res = Task::where('id',$id)->delete(); 
         if($res){
           return redirect('/showList-tasks')->with('success','Deleted task successfully.');
         }     
     }

}
