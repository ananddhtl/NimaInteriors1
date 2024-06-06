<?php

namespace App\Http\Controllers;

use App\Models\ContactUs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Config;
class ContactUsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = ContactUs::get();
        return view('backend.contactusdata', compact('data'));
        
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
            'fname' => 'required',
            'lname' => 'required',
            'phonenumber' => 'required',
            'email' => 'required|email',
            'streetnumber' => 'required',
            'pcodeandc' => 'required',
            'iam' => 'required',
            'project' => 'required',
            'message' => 'required',
        ], [
            'fname.required' => 'Voornaam is verplicht',
            'lname.required' => 'Achternaam is verplicht',
            'phonenumber.required' => 'Telefoonnummer is verplicht',
            'email.required' => 'E-mailadres is verplicht',
            'email.email' => 'Voer een geldig e-mailadres in',
            'streetnumber.required' => 'Straat en nummer is verplicht',
            'pcodeandc.required' => 'Postcode en stad is verplicht',
            'iam.required' => 'Selecteer een optie voor "Ik ben"',
            'project.required' => 'Selecteer een projecttype',
            'message.required' => 'Het berichtveld is verplicht',
        ]);
       
        $contactus = new ContactUs();
    
        $contactus->fname = $request->input('fname');
        $contactus->lname = $request->input('lname');
        $contactus->phonenumber = $request->input('phonenumber');
        $contactus->email = $request->input('email');
        $contactus->streetno = $request->input('streetnumber');
        $contactus->postcodeandcity = $request->input('pcodeandc');
        $contactus->iam = $request->input('iam');
        $contactus->project = $request->input('project');
        $contactus->message = $request->input('message');
    
        $contactus->save();
    
        $data = $request->all();
        $data['emailMessage'] = $data['message'];
        unset($data['message']);
        Log::info('Sending email with data:', $data);
        Config::set('mail.from.address', $data['email']);
        try {
            Mail::send('frontend.emailtemplate.contactus', $data, function ($message) use ($data) {
                $message->to('info@queswin.be');
                $message->subject('You have received a message from the contact us section');
          
            });
            Log::info('Email sent.');
        } catch (\Exception $e) {
            Log::error('Mail sending failed: ' . $e->getMessage());
        }
        
        return redirect()->back()->with('success', '<p>Ons team zal uw bericht zorgvuldig bekijken en zo snel mogelijk een passend antwoord voorzien. Hebt u een dringende vraag? Aarzel dan niet om telefonisch contact met ons op te nemen +32 475 65 12 32.</p><p>Bedankt voor je bericht! We hebben je aanvraag ontvangen en zullen zo spoedig mogelijk contact met je opnemen. Heb je dringende vragen, bereik ons dan telefonisch op +32 475 65 12 32. Nogmaals bedankt voor je interesse in Nima Interiors.</p>');

    }
    
    

    /**
     * Display the specified resource.
     */
    public function show(ContactUs $contactUs)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ContactUs $contactUs)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ContactUs $contactUs)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ContactUs $contactUs)
    {
        //
    }
}