<?php

namespace App\Http\Controllers;

use App\Models\ContactForm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactFormController extends Controller
{

    public function index() {
        return view('index');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request) {
        $fullName                = $request->get('fullName');
        $email                   = $request->get('email');
        $phoneNumber             = $request->get('phoneNumber');
        $messageText             = $request->get('message');

        // Validating
        $request->validate([
            'fullName'           => 'required',
            'email'              => 'required',
            'message'            => 'required',
        ]);

        // Gathering the data to store in the DB
        $data = [
            'full_name'          => $fullName,
            'email'              => $email,
            'phone_number'       => $phoneNumber,
            'message'            => $messageText
        ];

        $this->sendEmail($fullName, $email, $phoneNumber, $messageText); // Send email
        $storeData = ContactForm::create($data); // Store copy of the data in the DB

        if(!$storeData) {
            return redirect()->back()->with('failed', 'not submitted!');
        }

        return redirect()->back()->with('success', 'Submitted successfully!');

    }

    /**
     * @param $fullName
     * @param $email
     * @param $phoneNumber
     * @param $messageText
     */
    public function sendEmail($fullName, $email, $phoneNumber, $messageText) : void {
        $data = [
            'fullName'        => $fullName,
            'email'           => $email,
            'phoneNumber'     => $phoneNumber,
            'messageText'     => $messageText
        ];

        Mail::send('mail', $data, function($message) {
            $message->to('vartanian.garen@yahoo.com');
        });

        view('mail', compact('fullName','email', 'phoneNumber', 'messageText'));
    }
}
