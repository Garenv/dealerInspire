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
            'full_name'          => 'garenvartanian',
            'email'              => 'test@gmail.com',
            'phone_number'       => 'fjsjoifidjodfjiosfid',
            'message'            => 'test'
        ];

        $this->post(route('post_data'), $formData)->assertStatus(200);
    }
}
