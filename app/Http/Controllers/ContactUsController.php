<?php

namespace App\Http\Controllers;

use App\Models\ContactUs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Config;
use Symfony\Component\Mime\Email;

use Symfony\Component\Mime\Part\HtmlPart;

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
                // $message->from($data['email']);
            });
            Log::info('Email sent.');
        } catch (\Exception $e) {
            Log::error('Mail sending failed: ' . $e->getMessage());
        }

        return redirect()->back()->with('success', trans('Success contact us message'));
    }

    public function reply(Request $request, $id)
    {
        // Validate the reply
        $request->validate([
            'reply' => 'required|string',
        ]);

        // Find the contact message
        $contactMessage = ContactUs::findOrFail($id);
        $data = [
            'reply' => $request->reply,
            'contactMessage' => $contactMessage,
        ];
        try {
            // Create an email message using Symfony's Email class
            Mail::send('emails.reply_contactus', $data, function ($message) use ($contactMessage) {
                $message->from('info@queswin.be')
                    ->to($contactMessage->email)
                    ->subject('Re: Your Contact Message');
            });
            $contactMessage->reply_sent = true;
            $contactMessage->save();
            return redirect()->back()->with('success', 'Reply sent successfully!');
        } catch (\Exception $e) {
            Log::error('Mail sending failed: ' . $e->getMessage());
            // Redirect back with error message
            return redirect()->back()->with('error', 'Failed to send reply.');
        }
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
