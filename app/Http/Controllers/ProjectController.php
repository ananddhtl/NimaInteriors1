<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Project::get();
        return view('backend.project.list', compact('data'));
    }

    public function addproject()
    {
        return view('backend.project.add');
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

        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'thumbnail' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'description' => 'required',
        ]);
        $project = new Project();
        $project->title = $validatedData['title'];
        $project->description = $validatedData['description'];
        $project->slug = Str::slug($validatedData['title']);
        if ($request->hasFile('thumbnail')) {
            $thumbnail = $request->file('thumbnail');
            $filename = time() . '.' . $thumbnail->getClientOriginalExtension();
            $thumbnail->move(public_path('admin/project'), $filename);
            $project->thumbnail = $filename;
        }
        $project->save();
        return redirect()->route('admin.listproject')->with('success', 'Project created successfully!');
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
    public function edit($id)
    {
        //
        $project = Project::findOrFail($id);

        return view('backend.project.edit', compact('project'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
{
    // Validate the incoming request data
    $validatedData = $request->validate([
        'title' => 'required|max:255',
        'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        'description' => 'required',
    ]);
    $project = Project::findOrFail($id);
    
    // Update the project's attributes
    $project->title = $validatedData['title'];
    $project->description = $validatedData['description'];
    $project->slug = Str::slug($validatedData['title']);

 
    // Check if a new thumbnail file is uploaded
    if ($request->hasFile('thumbnail')) {
        // Delete the old thumbnail if it exists
      
        // Handle the new thumbnail upload
        $thumbnail = $request->file('thumbnail');
        $filename = time() . '.' . $thumbnail->getClientOriginalExtension();
        $thumbnail->move(public_path('admin/project'), $filename);
        $project->thumbnail = $filename;
    }

    // Save the updated project
    $project->save();

    // Redirect with a success message
    return redirect()->route('admin.listproject')->with('success', 'Project updated successfully!');
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project, $id)
    {
        $project = Project::findorfail($id);
        $project->delete();
        return back()->with('message', 'Project is delete successfully');
    }
}
