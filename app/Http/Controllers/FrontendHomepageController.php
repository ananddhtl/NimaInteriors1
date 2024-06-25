<?php
// app/Http/Controllers/FrontendHomepageController.php

namespace App\Http\Controllers;

use App\Models\FrontendHomepage;
use App\Models\Project;
use App\Models\CarouselItem;
use Illuminate\Http\Request;

class FrontendHomepageController extends Controller
{
    public function index()
    {
        $contents = FrontendHomepage::with('carouselItems.project')->get();
     
        return view('backend.frontendhomepage.index', compact('contents'));
    }

    public function create()
    {
        $projects = Project::all();
        return view('backend.frontendhomepage.form', compact('projects'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'carousel_items' => 'required|array',
            'carousel_items.*.text' => 'required|string',
            'carousel_items.*.image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'carousel_items.*.project_id' => 'nullable|exists:projects,id',
        ]);
    
        // Handle storage of homepage image
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('homepage_images', 'public');
        }
    
        $homepage = FrontendHomepage::create($data);
    
        // Handle storage of carousel items
        foreach ($request->carousel_items as $item) {
            $carouselItem = new CarouselItem();
            $carouselItem->text = $item['text'];
            $carouselItem->project_id = $item['project_id'];
    
            // Handle image upload for carousel item
            if (isset($item['image'])) {
                $carouselItem->image = $item['image']->store('carousel_images', 'public');
            }
    
            $homepage->carouselItems()->save($carouselItem);
        }
    
        return redirect()->route('homepage.index')->with('success', 'Content added successfully');
    }
    

    public function edit($id)
    {
        $content = FrontendHomepage::findOrFail($id);
        $projects = Project::all();
        return view('backend.frontendhomepage.form', compact('content', 'projects'));
    }

   

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $homepage = FrontendHomepage::findOrFail($id);

        // Handle storage of homepage image if updated
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('homepage_images', 'public');
        }

        $homepage->update($data);

        // Delete existing carousel items and save new ones
        $homepage->carouselItems()->delete();

        foreach ($request->carousel_items as $item) {
            $carouselItemData = [
                'text' => $item['text'],
                'project_id' => $item['project_id'],
            ];

            // Handle image upload for carousel item
            if (isset($item['image'])) {
                $carouselItemData['image'] = $item['image']->store('carousel_images', 'public');
            }

            // Create CarouselItem and associate with FrontendHomepage
            $carouselItem = new CarouselItem($carouselItemData);
            $homepage->carouselItems()->save($carouselItem);
        }

        return redirect()->route('homepage.index')->with('success', 'Content updated successfully');
    }

    public function destroy($id)
    {
        $content = FrontendHomepage::findOrFail($id);
        $content->delete();
        return redirect()->route('homepage.index')->with('success', 'Content deleted successfully');
    }
}
