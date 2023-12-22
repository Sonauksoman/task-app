<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use  App\Models\Category;
use  App\Models\Task;
use Illuminate\Support\Facades\Auth;



class TaskController extends Controller
{
   public function taskView(){

    $tasks=Task::latest()->paginate(20);
    $categories=Category::pluck('category','id');
    return view('task.task-list',compact('tasks','categories'));

   }

   public function taskForm(){

   $categories=Category::all();
    return view('task.task-form',compact('categories'));

   }

   public function taskSubmit(Request $request){

    $this->validate($request, [
        'title' => 'required|max:10',
        'description' => 'required|min:10',
        'due_date'  =>  'required',
        'category'  =>  'required|not_in:0',

    ]);

    $task= new Task;
    $task->title=$request->title;
    $task->description=$request->description;
    $task->due_date=$request->due_date;
    $task->category_id=$request->category;
    $task->save();
    session()->flash('success', 'Task Assigned Succesfully');           
    return redirect('/task');

 }

 public function singleTask($id){

    $id=decrypt($id);
    $task=Task::find($id);
    $categories=Category::all();
    return view('task.task-update',compact('task','categories'));

 }

 public function updateTask(Request $request ,$id){

    $this->validate($request, [
        'title' => 'required|max:10',
        'description' => 'required|min:10',
        'due_date'  =>  'required',
        'category'  =>  'required|not_in:0',

    ]);

    $task= Task::find($id);
    $task->title=$request->title;
    $task->description=$request->description;
    $task->due_date=$request->due_date;
    $task->category_id=$request->category;
    $task->save();
    session()->flash('success', 'Task Updated Succesfully');           
    return redirect('/task');

 }

 public function deleteTask($id){

  $id=decrypt($id);
  $task=Task::find($id);
   $task->delete();
   session()->flash('error', 'Task Deleted Succesfully');
   return redirect('/task');
           
 }
 public function profileView(){

   return view('user.profile');

 }

 public function logout(){

   auth()->logout();
   return redirect('/');

 }
}
