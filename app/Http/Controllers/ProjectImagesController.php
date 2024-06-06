<?php

namespace App\Http\Controllers;
use Intervention\Image\Facades\Image;
use App\Models\ProjectImages;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectImagesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projectsWithImages = Project::with('images')->get();
        return view('backend.projectimages.list', compact('projectsWithImages'));
    }
    public function addprojectimages()
    {
        $projectlist = Project::all();
        return view('backend.projectimages.add', compact('projectlist'));
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
            'project_id' => 'required|exists:projects,id',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:40960', // 40 MB in kilobytes
        ]);
        if ($request->hasFile('images')) {
        foreach ($request->file('images') as $image) {
            // Resize and compress the image
            $resizedImage = Image::make($image)
                ->resize(1920, null, function ($constraint) {
                    $constraint->aspectRatio(); // Maintain aspect ratio
                    $constraint->upsize(); // Prevent upsizing
                })
                ->encode('jpg', 100); // Encode to JPEG format with 60% quality
    
            // Generate unique filename
            $filename = time() . '_' . $image->getClientOriginalName();
    
            // Save or store the resized image
            $resizedImage->save(public_path('admin/projectimages/' . $filename));
    
            // Save image details to database
            $projectImage = new ProjectImages();
            $projectImage->project_id = $validatedData['project_id'];
            $projectImage->images = 'admin/projectimages/' . $filename;
            $projectImage->save();
        }
    } else {
        // Handle the case where no images are uploaded
        return redirect()->back()->with('error', 'Please upload at least one image');
    }
        return redirect()->route('admin.listprojectimages')->with('success', 'Project Images stored successfully!');
    }
    
    /**
     * Display the specified resource.
     */
    public function show(ProjectImages $projectImages)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ProjectImages $projectImages)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ProjectImages $projectImages)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $image = ProjectImages::findOrFail($id);


        $imagePath = public_path($image->images);
        if (file_exists($imagePath)) {
            unlink($imagePath);
        }
    
    
        $image->delete();
    
        return response()->json(['success' => 'Image deleted successfully']);
    }
}
