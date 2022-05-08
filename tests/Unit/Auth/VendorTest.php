<?php

namespace Tests\Unit\Auth;

use Tests\TestCase;

class VendorTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_vendor_ristriction_present()
    {
        $response = $this->get('/api/vendor/save');
        $response->assertStatus(500);

    }




     public function test_Registring_new_vendor()      //if registered vendor presnt it will not success
     {
         $response = $this->postJson('/api/vendor/save', [
            "name" => "parakh",
            "email" => "nikhil123@gmail.com",
            "password" => "nikhil77",
            "phone_number" => "799733221124",
            "address" => "bangalore",
            "updated_at" => "2022-05-08T17:56:59.000000Z",
            "created_at" => "2022-05-08T17:56:59.000000Z",
            "id" => 760093800270954497
         ]);

         $response
             ->assertStatus(200);
     }


    public function test_Repeated_vendor_error()
    {
        $response = $this->postJson('/api/vendor/save', [
            "name" => "parakh",
            "email" => "nikhil123@gmail.com",
            "password" => "nikhil77",
            "phone_number" => "799733221124",
            "address" => "bangalore",
            "updated_at" => "2022-05-08T17:56:59.000000Z",
            "created_at" => "2022-05-08T17:56:59.000000Z",
            "id" => 760093800270954497
        ]);

        $response
            ->assertStatus(500);
    }
}


