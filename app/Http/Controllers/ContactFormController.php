<?php

namespace App\Http\Controllers;

use App\Models\ContactForm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class ContactFormController extends Controller
{

    public function index() {
        return view('index');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|object
     * @throws \Exception
     */
    public function store(Request $request) {

        try {
            $fullName                = $request->get('fullName');
            $email                   = $request->get('email');
            $phoneNumber             = $request->get('phoneNumber');
            $messageText             = $request->get('message');

            // Validating input fields.
            // For example, it'll accept: 7183848940, 718-384-8948, (718) 384-8948 and
            // many other forms of phone number inputs
            $validation = Validator::make($request->all() , [
                'fullName'           => 'required|string|max:20',
                'email'              => 'required|email',
                'phoneNumber'        => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
                'message'            => 'required|min:10|max:1000',
            ]);

            // Gathering the data to store in the DB.
            $data = [
                'full_name'          => $fullName,
                'email'              => $email,
                'phone_number'       => $phoneNumber,
                'message'            => $messageText
            ];

            // If the validation passes, then proceed to send the email and store a copy of the contact form in the DB.
            // And redirect back to the main page with a success flash message.
            if(!$validation->fails()) {
                $this->sendEmail($fullName, $email, $phoneNumber, $messageText); // Send email
                ContactForm::create($data); // Store copy of the data in the DB

                return redirect()->back()->with('success', 'Successfully Submitted! 🙂')->setStatusCode(200);
            }

            // Else, redirect to the main page with an error flash message if something outlandish went wrong.
            // In most cases, this won't be reached because frontend validation is also present just to make the
            // contact form more bulletproof.  This is here basically as a worst case scenario redirect.
            return redirect()->back()->with('failed', 'Failed Submitting!')->setStatusCode(401);
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            throw new \Exception($e->getMessage(), $e->getCode(), $e);
        }

    }

    /**
     * @param $fullName
     * @param $email
     * @param $phoneNumber
     * @param $messageText
     */
    public function sendEmail($fullName, $email, $phoneNumber, $messageText) : void {

        try {
            $data = [
                'fullName' => $fullName,
                'email' => $email,
                'phoneNumber' => $phoneNumber,
                'messageText' => $messageText
            ];

            Mail::send('mail', $data, function ($message) {
                $message->to('guy-smiley@example.com');
            });

            view('mail', compact('fullName', 'email', 'phoneNumber', 'messageText'));
        } catch(\Exception $e) {
            Log::error($e->getMessage());
            throw new \Exception($e->getMessage(), $e->getCode(), $e);
        }

    }
}
