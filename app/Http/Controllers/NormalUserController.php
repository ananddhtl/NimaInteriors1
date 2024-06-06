<?php

namespace App\Http\Controllers;

use App\Models\NormalUser;
use App\Models\AddressBook;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\URL;

class NormalUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = NormalUser::all();
        return view('backend.normaluser.list', compact('data'));

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
            'fullname' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:normal_users',
            'password1' => 'required|string|min:8',
        ]);
     
    
        $user = new NormalUser();
    
        $user->fullname = $validatedData['fullname'];
        $user->email = $validatedData['email']; 
        $user->password = Hash::make($validatedData['password1']); 
        $user->save();
    
        auth()->guard('web')->login($user);
        return redirect()->route('dashboard');
    }
    
    public function login(Request $request)
{
    $credentials = $request->validate([
        'email' => 'required|string|email',
        'password' => 'required|string',
    ]);

    if (auth()->attempt($credentials)) {
       
        return redirect()->route('dashboard');
    } else {
       
        return back()->withInput()->withErrors(['email' => 'Incorrect email or password.']);
    }
}


public function forgotPassword(Request $request)
{
    try {
        $request->validate([
            'email' => 'required|string|email',
        ]);

        $email = $request->input('email');
        Session::put('reset_email', $email); 
      
        $resetPasswordUrl = URL::signedRoute('customer.changepassword', ['email' => $email]);


       
        Mail::send('frontend.emailtemplate.reset_password', ['resetPasswordUrl' => $resetPasswordUrl], function ($message) use ($email) {
            $message->to($email)->subject('Reset Password');
        });

        return redirect()->back()->with('status', 'Password reset link has been sent to your email.');
    } catch (\Exception $e) {
      dd($e->getMessage());
        return redirect()->back()->withErrors(['email' => 'An unexpected error occurred. Please try again later.']);
    }
}
public function changePassword(Request $request)
{
    // Ensure the user is authenticated
    if (!Auth::check()) {
        return redirect()->route('login')->withErrors(['error' => 'Please log in to change your password.']);
    }

    $request->validate([
        'new_password' => 'required|string|min:8',
    ]);

    try {
       
        $email = Session::get('reset_email');

        
        $user = NormalUser::where('email', $email)->first();
        
        if (!$user) {
            return redirect()->route('login')->withErrors(['error' => 'User not found.']);
        }

       
        $user->password = Hash::make($request->input('new_password'));
        $user->save();

       
        Session::forget('reset_email');

        return redirect()->route('dashboard')->with('success', 'Password changed successfully.');
    } catch (\Exception $e) {
        return redirect()->back()->withErrors(['error' => 'An unexpected error occurred. Please try again later.']);
    }
}
public function logout()
{
    Auth::logout();

   
    return redirect()->route('login');
}

    public function addressbook()
    {
 
        $user_id = auth()->id();

        $data = AddressBook::where('user_id', $user_id)->get();
    
        return view('frontend.customer.account.addressbook', compact('data'));

   
    


    } /**
     * Display the specified resource.
     */
    public function show(NormalUser $normalUser)
    {
        //
    }

    public function addressbookpage ()
    {
 
       
    
        return view('frontend.customer.account.addaddress');

   
    


    } 
    public function storeaddressbook(Request $request)
    {
    dd($request->all());
    $request->validate([
        'addresstype' => 'required',
        'fullname' => 'required',
        'postalcode' => 'required',
        'houseNo' => 'required',
        'additional' => 'required',
    ]);


    $user_id = auth()->id();

    $addressBook = new AddressBook();
    $addressBook->user_id = $user_id; 
    $addressBook->addresstype = $request->addresstype;
    $addressBook->fullname = $request->fullname;
    $addressBook->postcode = $request->postcode;
    $addressBook->housenumber = $request->housenumber;
    $addressBook->addition = $request->addition;
    $addressBook->save();
    return redirect()->back()->with('success', 'Address saved successfully.');
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(NormalUser $normalUser)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, NormalUser $normalUser)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(NormalUser $normalUser)
    {
        //
    }
}