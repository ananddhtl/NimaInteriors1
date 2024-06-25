<?php

// app/Http/Controllers/PartnerController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Partner;
use Illuminate\Support\Facades\Storage;

class PartnerController extends Controller
{
    public function index()
    {
        $partners = Partner::all();
        return view('backend.partners.index', compact('partners')); 
    }

    public function create()
    {
        $partners = Partner::all();
       
        return view('backend.partners.form',compact('partners'));
    }

    public function store(Request $request)
    {
       
        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'required|image|max:2048',
            'link' => 'required|url|max:255',
        ]);
    
        $path = $request->file('image')->store('images', 'public');

        $partner = new Partner;
        $partner->name = $request->name;
        $partner->image = $path;
        $partner->link = $request->link;
        $partner->save();

        return redirect()->route('partners.index');
    }

    public function edit(Partner $partner)
    {
        return view('backend.partners.form', compact('partner'));
    }

    public function update(Request $request, Partner $partner)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|max:2048',
            'link' => 'required|url|max:255',
        ]);

        if ($request->hasFile('image')) {
            Storage::disk('public')->delete($partner->image);
            $path = $request->file('image')->store('images', 'public');
            $partner->image = $path;
        }

        $partner->name = $request->name;
        $partner->link = $request->link;
        $partner->save();

        return redirect()->route('partners.index');
    }

    public function destroy(Partner $partner)
    {
        Storage::disk('public')->delete($partner->image);
        $partner->delete();
        return redirect()->route('partners.index');
    }
}
