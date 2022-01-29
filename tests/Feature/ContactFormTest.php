<?php

namespace Tests\Feature;
use Tests\TestCase;

class ContactFormTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_can_post_contact_form_data()
    {

        $formData = [
            'fullName'          => 'somename',
            'email'             => 'testmail@gmail.com',
            'phoneNumber'       => '7184568970',
            'message'           => 'testtesttests'
        ];

        // Since we're redirecting back to the main page upon user submission
        // we'll need to use followingRedirects() along with setStatusCode(200) and setStatusCode(200)
        // which can be found in the ContactFormController.php file.
        $this->followingRedirects()->post(route('post_data'), $formData)->assertStatus(200);
    }
}
