<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
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
            'fullName'          => 'some name',
            'email'             => 'testmail@gmail.com',
            'phoneNumber'       => '7186186921',
            'message'           => 'test'
        ];

        $this->followingRedirects()->post(route('post_data'), $formData)->assertStatus(200);
    }
}
