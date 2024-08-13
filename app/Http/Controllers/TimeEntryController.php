<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Task;
use App\Models\TimeEntry;
use Illuminate\Http\Request;

class TimeEntryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $result = TimeEntry::with('entryproject','entrytask')->get();
        return view('admin.time.index', compact('result'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $result = TimeEntry::get();
        $project = Project::get();
        $task = Task::get();
        return view('admin.time.create', compact('result', 'project', 'task'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate(
            [
                'project_id' => 'required',

            ],
            [
                'project_id.required' => 'Title is required',

            ]
        );

        $input = $request->all();
        $success = TimeEntry::create($input);
        if ($success) {
            return redirect()->back()->with('success', 'Added Successfully');
        } else {
            return redirect()->back()->with('error', 'Try Again');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(TimeEntry $timeEntry)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(String $id)
    {

        $result  = TimeEntry::find($id);

        $project = Project::get();
        $task = Task::get();
        return view('admin.time.edit', compact('result', 'project', 'task'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, String $id)
    {
        $input = $request->all();


        $inputs = TimeEntry::find($id);
        $success = $inputs->update($input);
        if ($success) {

            return back()->with('success', '  Updated Successfully');
        } else {
            return back()->with('error', 'Try Again');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(String $id)
    {
        $input = TimeEntry::find($id);
        $success = $input->delete();
        if ($success) {
            return back()->with('danger', 'Deleted Successfully');
        } else {
            return back()->with('error', 'Try Again');
        }
    }
}
