<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $result = Project::get();
        return view('admin.project.index', compact('result'));
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
    public function show(Project $project)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(String $id)
    {
        $input = Project::find($id);
        $success = $input->delete();
        if ($success) {
            return back()->with('danger', 'Deleted Successfully');
        } else {
            return back()->with('error', 'Try Again');
        }
    }

    public function activateProject($id)
    {
        $user = Project::findOrFail($id);
        $user->project_is_active = !$user->project_is_active;
        $user->save();

        return redirect()->back()->with('status', ' status updated!');
    }

    
    public function getProjectHours($projectId)
    {
        // Fetch the project with its tasks
        $project = Project::with('tasks')->find($projectId);
    
        if ($project) {
            // Sum the hours for all tasks related to this project
            $totalHours = $project->tasks->sum('hour');
    
            // Prepare the response data
            return response()->json([
                'project_name' => $project->project_name,
                'total_hours' => $totalHours,
                'tasks' => $project->tasks->map(function($task) {
                    return [
                        'task_name' => $task->task_name,
                        'hour' => $task->hour // Make sure 'hour' is the correct field name
                    ];
                })
            ]);
        } else {
            return response()->json([
                'error' => 'Project not found'
            ], 404);
        }
    }
    
}
