<?php

namespace App\Http\Controllers;

use Intervention\Image\Facades\Image;
use App\Models\ProjectImages;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

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
    // public function store(Request $request)
    // {
    //     $validatedData = $request->validate([
    //         'project_id' => 'required|exists:projects,id',
    //         'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:40960', // 40 MB in kilobytes
    //     ]);
    //     if ($request->hasFile('images')) {
    //     foreach ($request->file('images') as $image) {
    //         // Resize and compress the image
    //         $resizedImage = Image::make($image)
    //             ->resize(1920, null, function ($constraint) {
    //                 $constraint->aspectRatio(); // Maintain aspect ratio
    //                 $constraint->upsize(); // Prevent upsizing
    //             })
    //             ->encode('jpg', 100); // Encode to JPEG format with 60% quality

    //         // Generate unique filename
    //         $filename = time() . '_' . $image->getClientOriginalName();

    //         // Save or store the resized image
    //         $resizedImage->save(public_path('admin/projectimages/' . $filename));

    //         // Save image details to database
    //         $projectImage = new ProjectImages();
    //         $projectImage->project_id = $validatedData['project_id'];
    //         $projectImage->images = 'admin/projectimages/' . $filename;
    //         $projectImage->save();
    //     }
    // } else {
    //     // Handle the case where no images are uploaded
    //     return redirect()->back()->with('error', 'Please upload at least one image');
    // }
    //     return redirect()->route('admin.listprojectimages')->with('success', 'Project Images stored successfully!');
    // }
    // updated code for upload the image upto 500mb 

    public function store(Request $request)
    {
        \Log::info('Store method called from Dropzone upload.', $request->all());

        $validatedData = $request->validate([
            'project_id' => 'required|exists:projects,id',
            'images.*' => 'required|image|mimes:jpeg,png,jpg,gif|max:1048576', // 1048 MB in kilobytes
        ]);

        if ($request->hasFile('images')) {
            \Log::info('Files found:', $request->file('images'));
            foreach ($request->file('images') as $image) {
                try {
                    \Log::info('Processing file:', ['name' => $image->getClientOriginalName()]);
                    // Resize and compress the image
                    $resizedImage = Image::make($image)
                        ->resize(1920, null, function ($constraint) {
                            $constraint->aspectRatio(); // Maintain aspect ratio
                            $constraint->upsize(); // Prevent upsizing
                        })
                        ->encode('jpg', 85); // Compress to JPEG format with 85% quality

                    // Generate unique filename
                    $generatedFilename = time() . '_' . uniqid() . '.jpg';
                    $originalFilename = $image->getClientOriginalName();
                    // Save the resized image to the public directory
                    $resizedImage->save(public_path('admin/projectimages/' . $generatedFilename));

                    // Save image details to database
                    $projectImage = new ProjectImages();
                    $projectImage->project_id = $validatedData['project_id'];
                    $projectImage->image_name = $originalFilename;
                    $projectImage->images = 'admin/projectimages/' . $generatedFilename;
                    $projectImage->save();

                    \Log::info('Image saved successfully: ' . $generatedFilename);
                } catch (\Exception $e) {
                    \Log::error('Error saving image: ' . $e->getMessage());
                }
            }
            \Log::info('All images processed successfully.');
            return response()->json(['success' => true, 'message' => 'Images uploaded successfully!']);
        } else {
            \Log::error('No files found in the request.');
            return response()->json(['error' => 'Please upload at least one image'], 400);
        }
    }





    private function getChunkFilename(Request $request)
    {
        $uuid = $request->input('dzuuid');
        $chunkIndex = $request->input('dzchunkindex');
        return "{$uuid}_{$chunkIndex}";
    }

    private function isLastChunk(Request $request)
    {
        $totalChunks = $request->input('dztotalchunkcount');
        $chunkIndex = $request->input('dzchunkindex');
        return ($chunkIndex + 1) == $totalChunks;
    }
    private function processChunks($filename, $projectId)
    {
        $path = storage_path('app/tmp');
        $files = glob("{$path}/{$filename}_*");
        sort($files);

        $finalPath = "{$path}/{$filename}";
        $out = fopen($finalPath, 'wb');

        foreach ($files as $file) {
            $in = fopen($file, 'rb');
            stream_copy_to_stream($in, $out);
            fclose($in);
            unlink($file); // Delete chunk file after processing
        }

        fclose($out);

        // Resize and compress the image
        $resizedImage = Image::make($finalPath)
            ->resize(1920, null, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            })
            ->encode('jpg', 85); // Compress to JPEG format with 85% quality

        $finalFilename = time() . '_' . uniqid() . '.jpg';
        $resizedImage->save(public_path('admin/projectimages/' . $finalFilename), 85);

        // Save image details to database
        $projectImage = new ProjectImages();
        $projectImage->project_id = $projectId;
        $projectImage->images = 'admin/projectimages/' . $finalFilename;
        $projectImage->save();

        // Clean up the temporary file
        unlink($finalPath);
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
    public function updateImagePositions(Request $request)
    {
        $order = $request->input('order');

        foreach ($order as $item) {
            ProjectImages::where('id', $item['id'])->update(['position' => $item['position']]);
        }

        return response()->json(['success' => true, 'message' => 'Image positions updated successfully!']);
    }
}
