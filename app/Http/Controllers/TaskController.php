<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $result = Task::with('task')->get();
        return view('admin.task.index',compact('result'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Task $task)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(String $id)
    {
        $input = Task::find($id);
        $success = $input->delete();
        if ($success) {
            return back()->with('danger', '  Deleted Successfully');
        } else {
            return back()->with('error', 'Try Again');
        }
    }
    public function activateTask($id)
    {
        $user = Task::findOrFail($id);
        $user->task_is_active = !$user->task_is_active;
        $user->save();

        return redirect()->back()->with('status', ' status updated!');
    }
}


