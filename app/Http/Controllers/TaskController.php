<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    #限制只有登入的user可進入TaskController底下的路由
    public function __construct()
    {
        $this -> middleware('auth');
    }

    public function index(Request $request)
    {
        $tasks = Task::where('user_id',$request->user()->id)->get();

        return view('tasks.index',[
            'tasks' => $tasks,
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request,
        [
            #任務名稱為必填欄位，且字數不可超過255
            'name' => 'required|max:255',
        ]);

        $request->user()->tasks()->create([
            'name' => $request->name,
        ]);

        return redirect('/tasks');
    }

    public function destroy(Request $request,Task $task)
    {
        $this->authorize('destroy',$task);
        $task->delete();
        return redirect('/tasks');
    }
}
