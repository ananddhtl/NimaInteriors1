<?php
// app/Http/Controllers/EmailController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Email;

class EmailController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:emails',
        ]);

        $email = new Email();
        $email->email = $request->input('email');
        $email->save();

        return response()->json(['success' => true]);
    }


    public function uploadBrochure(Request $request)
    {
        $request->validate([
            'brochure' => 'required|mimes:pdf|max:25600', // Max 25MB PDF file
        ]);

        if ($request->file('brochure')->isValid()) {
            // Get the file name with extension
            // $fileNameWithExtension = $request->file('brochure')->getClientOriginalName();
            // Get just the file name
            // $fileName = pathinfo($fileNameWithExtension, PATHINFO_FILENAME);
            // Get just the extension
            $extension = $request->file('brochure')->getClientOriginalExtension();

            // Rename the file
            // $fileNameToStore = $fileName . '_' . time() . '.' . $extension;

            // Move the file to public directory
            $request->file('brochure')->move(public_path('admin/brochures'), 'latest_brochure.pdf');

            // If you want to redirect back to a list view
            return redirect()->route('admin.download')->with('success', 'Brochure uploaded successfully.');

            // If you want to return a JSON response
            // return response()->json(['path' => $path]); // Return the file path for frontend handling
        }

        // Handle upload failure
        return response()->json(['error' => 'Failed to upload brochure.'], 400);
    }



    public function addBrochure()
    {

        return view('backend.download.add');
    }
}
