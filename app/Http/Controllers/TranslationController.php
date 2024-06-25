<?php
// app/Http/Controllers/TranslationController.php

namespace App\Http\Controllers;

use App\Models\Translation;
use Illuminate\Http\Request;

class TranslationController extends Controller
{
    public function index(Request $request)
    {
        $query = Translation::query();

        // Default sorting options
        $sortBy = $request->query('sort', 'key');
        $sortDirection = $request->query('direction', 'asc');

        // Validate sorting options
        $sortableColumns = ['key', 'nl_be_translation', 'en_translation','nl_translation',];
        if (!in_array($sortBy, $sortableColumns)) {
            $sortBy = 'key'; // Default sorting column
        }
        if (!in_array($sortDirection, ['asc', 'desc'])) {
            $sortDirection = 'asc'; // Default sorting direction
        }

        // Apply sorting
        $query->orderBy($sortBy, $sortDirection);

        // Searching
        $searchTerm = $request->query('search');
        if ($searchTerm) {
            $query->where('key', 'like', '%'.$searchTerm.'%')
                  ->orWhere('nl_be_translation', 'like', '%'.$searchTerm.'%')
                  ->orWhere('en_translation', 'like', '%'.$searchTerm.'%')
                  ->orWhere('nl_translation', 'like', '%'.$searchTerm.'%');
        }

        // Paginate the results
        $translations = $query->Paginate(10); // Adjust the pagination number as per your requirement
        // dd($translations);
        return view('backend.translationlibrary.index', compact('translations'));
    }

    public function create()
    {
        $translations = Translation::all();
       
        return view('backend.translationlibrary.form',compact('translations'));
    }
    public function store(Request $request)
    {
       
        $request->validate([
            'key' => 'required|string',
            'nl_be_translation' => 'nullable|string',
            'en_translation' => 'nullable|string',
            'nl_translation' => 'nullable|string',
        ]);
    

        $translation = new translation;
        $translation->key = $request->key;
      
        $translation->nl_be_translation = $request->nl_be_translation;
        $translation->nl_translation = $request->nl_translation;
        $translation->en_translation = $request->en_translation;
        $translation->save();

        return redirect()->route('translations.index');
    }
    public function edit(Translation $translation)
    {
        return view('backend.translationlibrary.form', compact('translation'));
    }

    public function update(Request $request, Translation $translation)
    {
        
        $request->validate([
            'key' => 'required|string',
            'nl_be_translation' => 'nullable|string',
            'nl_translation' => 'nullable|string',
            'en_translation' => 'nullable|string',
        ]);

        $translation->update([
            'key' => $request->key,
            'nl_be_translation' => $request->nl_be_translation,
            'nl_translation' => $request->nl_translation,
            'en_translation' => $request->en_translation,
        ]);

        return redirect()->route('translations.index')->with('success', 'Translation updated successfully!');
    }
    public function destroy(translation $translation)
    {
      
        $translation->delete();
        return redirect()->route('translations.index');
    }
    public function search(Request $request)
    {
       
    }
    // Other methods like create(), store(), destroy() are handled by resourceful routing
}
