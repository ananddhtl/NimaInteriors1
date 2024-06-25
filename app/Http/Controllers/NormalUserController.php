<?php

namespace App\Http\Controllers;

use App\Models\NormalUser;
use App\Models\AddressBook;
use App\Models\Brand;
use App\Models\Order;
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
    public function dashboard()
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
    public function store($locale, Request $request)
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
        $contactInfo = Brand::first();
        $locale = session('locale', 'be');
        return redirect()->route('dashboard', compact('locale', 'contactInfo'));
    }
    public function login($locale, Request $request)
    { 
        $contactInfo = Brand::first();
        $credentials = $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        if (auth()->attempt($credentials)) {
            if (Session::get('from_checkout')) {
                Session::forget('from_checkout');

                return redirect()->route('checkout', ['locale', 'contactInfo'])->with('success', 'You are logged in successfully');
            } else {
                return redirect()->route('dashboard', ['locale', 'contactInfo'])->with('success', 'You are logged in successfully');
            }
        } else {
            return back()->withInput()->withErrors(['email' => 'Incorrect email or password.']);
        }
    }


    public function forgotPassword($locale, Request $request)
    {
        try {
            // Validate the email input
            $request->validate([
                'email' => 'required|string|email',
            ]);

            // Get the email from the request
            $email = $request->input('email');

            // Store the email in session
            Session::put('reset_email', $email);
            
            // Generate the reset password URL with locale and email
            $resetPasswordUrl = URL::signedRoute('customer.changepassword', ['locale' => $locale, 'email' => $email]);
          
            // Send the reset password email
            Mail::send('frontend.emailtemplate.reset_password', ['resetPasswordUrl' => $resetPasswordUrl], function ($message) use ($email) {
                $message->to($email)->subject('Reset Password');
            });

            // Redirect back with success message
            return redirect()->route('customer.login', ['locale'])->with('status', 'Password reset link has been sent to your email.');
        } catch (\Exception $e) {
            // Log the error message
            \Log::error('Error in forgotPassword: ' . $e->getMessage());

            // Redirect back with error message
            return redirect()->back()->withErrors(['email' => 'An unexpected error occurred. Please try again later.']);
        }
    }

    public function changePassword($locale,Request $request)
    {
       
        // Ensure the user is authenticated
        // if (!Auth::check()) {
        //     return redirect()->route_with_locale('login',compact('locale'))->withErrors(['error' => 'Please log in to change your password.']);
        // }
        
        $request->validate([
            'new_password' => 'required|string|min:8',
        ]);

        try {

            $email = Session::get('reset_email');

            // dd($email);
            $user = NormalUser::where('email', $email)->first();
            dd($user);
            if (!$user) {
                return redirect()->route_with_locale('login',compact('locale'))->withErrors(['error' => 'User not found.']);
            }


            $user->password = Hash::make($request->input('new_password'));
            $user->save();


            Session::forget('reset_email');

            return redirect()->route_with_locale('dashboard',compact('locale'))->with('success', 'Password changed successfully.');
        } catch (\Exception $e) {
            dd($e->getMessage());
            return redirect()->back()->withErrors(['error' => 'An unexpected error occurred. Please try again later.']);
        }
    }
    public function logout()
    {
        Auth::logout();

        $locale = session('locale', 'be');
        return redirect()->route('customer.login', ['locale' => $locale]);
    }

    public function addressbook($locale)
    {
        $contactInfo = Brand::first();
        $user_id = auth()->id();

        $data = AddressBook::where('user_id', $user_id)->get();

        return view('frontend.customer.account.addressbook', compact('locale','data', 'contactInfo'));
    }
    /**
     * Display the specified resource.
     */
    public function show(NormalUser $normalUser)
    {
        //
    }

    public function addressbookpage($locale)
    {
        $contactInfo = Brand::first();


        return view('frontend.customer.account.addaddress', compact('locale','contactInfo'));
    }
    public function storeaddressbook($locale, Request $request)
    {

        $validatedData = $request->validate([
            'addresstype' => 'required|string',
            'fullname' => 'required|string',
            'postalcode' => 'required|string',
            'houseNo' => 'required|string',
            'additional' => 'nullable|string',
        ]);

        $user_id = auth()->id();

        $addressBook = new AddressBook();
        $addressBook->user_id = $user_id;
        $addressBook->addresstype = $request->addresstype;
        $addressBook->fullname = $request->fullname;
        $addressBook->postcode = $request->postalcode; // Corrected field name
        $addressBook->housenumber = $request->houseNo; // Corrected field name
        $addressBook->addition = $request->additional; // Corrected field name
        $addressBook->save();

        $locale = session('locale');
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
    public function checkout($locale,Request $request)
    {
        $contactInfo = Brand::first();
        if (Auth::check()) {
            $checkout = AddressBook::where('user_id', Auth::user()->id)->first();

            return view('frontend.shopping.checkout', compact('locale','checkout', 'contactInfo'));
        } else {

            Session::put('from_checkout', true);

            return redirect()->route('customer.login',compact('locale'))->with('success', 'Please Login First');
        }
    }
    public function ordercheckout($locale, Request $request)
    {

        $orderData = [
            'active_tab' => $request->active_tab,
            'companyname' => $request->companyname,
            'refno' => $request->refno,
            'vatno' => $request->vatno,
            'fname' => $request->fname,
            'lname' => $request->lname,
            'postalcode' => $request->postalcode,
            'streetname' => $request->streetname,
            'houseno' => $request->houseno,
            // 'suffix' => $request->suffix,
            'busno' => $request->busno,
            'phoneno' => $request->phoneno,
        ];
        $locale = session('locale');
        $request->session()->put('order_data', $orderData);

        return redirect()->route('shoppingdelivery', compact('locale'));
    }
    public function orderdelivery($locale, Request $request)
    {

        $deliveryData = [
            'delivery_option' => $request->input('delivery_option'),

        ];

        $request->session()->put('delivery_data', $deliveryData);

        return redirect()->route('shoppingoverview', compact('locale'));
    }
    public function orderhistory($locale)
    {
        $contactInfo = Brand::first();
        $orders = Order::where('user_id', auth()->id())->get();

        return view('frontend.customer.account.orderhistory', compact('orders', 'contactInfo'));
    }
}
