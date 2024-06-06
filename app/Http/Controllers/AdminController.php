<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function showloginform()
    {
        return view('backend.Auth.login');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function dashboard()
    {
        return view('backend.dashboard');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function login(Request $request)
    {
     
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

         if (auth()->guard('admin')->attempt($credentials)) {
          
            return redirect()->route('admin.dashboard');
        } else {
            
            return back()->withErrors(['email' => 'Invalid credentials']);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Admin $admin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Admin $admin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Admin $admin)
    {
        //
    }

    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/admin/login');
    }
}