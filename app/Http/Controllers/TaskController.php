<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\User;


class TaskController extends Controller
{
    public function index()
    {
       // $tasks = response()->json(Task::all());
  		$tasks = response()->json(Task::with('user')->get());
        return $tasks;
    }
    public function show($id)
    {
         $tasks = response()->json(Task::with('user')->find($id));
        return $tasks;
    }
    public function destroy($id)
    {
        $tasks = Task::find($id)->delete();
        //return redirect('/task/list');
    }
    public function store(Request $request)
    {
        echo $request;
        $task = new Task();
        $task->title = $request->title;
        $task->description = $request->description;
        $task->end_date = $request->end_date;
        // $task->userId = $request->userId;
        $task->status = $request->status;
        $task->save();
        return Task::find($task->id);
    }
    public function update(Request $request, $id)
    {
        $task = Task::find($id);
        $task->title = $request->title;
        $task->description = $request->description;
        $task->end_date = $request->end_date;
        $task->user_id = $request->userId;
        $task->status = $request->status;
        $task->save();
        return Task::find($task->id);
    }

}
