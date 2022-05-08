<?php

namespace Tests\Unit\Auth;



use Tests\TestCase;


class RegistrationTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */



    public function test_Registration_ristriction_present()
    {
        $response = $this->get('/api/auth/register');
        $response->assertStatus(405);

    }




     public function test_Registring_new_user()
     {
         $response = $this->postJson('/api/auth/register', [
             'name' => 'gurukiran',
             'email' => "gurukiran8861110488@gmail.com ",
             'password' => "guru1234",
             'password_confirmation' => "guru1234"
         ]);

         $response
             ->assertStatus(201);
     }


    public function test_Repeated_email_error()
    {
        $response = $this->postJson('/api/auth/register', [
            'name' => 'siva',
            'email' => "siva.lomada@mpokket.com ",
            'password' => "siva1234",
            'password_confirmation' => "siva1234"
        ]);

        $response
            ->assertStatus(400);
    }











}
