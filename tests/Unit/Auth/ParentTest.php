<?php

namespace Tests\Unit\Auth;

use Tests\TestCase;

class ParentTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_parent_fetch_their_child_details()
    {
        $name="kishore";
        $response = $this->get('/api/parents/child/'.$name);
        $response->assertStatus(200);

    }

    public function test_parent_fetch_their_child_transaction_card_details()
    {
        $transaction_id="9876543210654321";
        $response = $this->get('/api/transaction/card/'.$transaction_id);
        $response->assertStatus(200);

    }

    public function test_parent_user_pending_request_status()
    {
        $response = $this->postJson('/api/admin/request-status', []);

        $response
            ->assertStatus(405);

  


    }




     public function test_Registring_new_parent()      //if registered parent presnt it will not success
     {
         $response = $this->postJson('/api/parent/save', [
            "name" => "sushmitha",
            "email" => "sushmitha123@mpokket.com",
            "phone_number" => "917997201181",
            "address" => "91springboard,mgroad,bangalore",
            "pan_card" => "ATPJL3681A",
            "gender" => "M",
            "password" => "sushmitha"
         ]);

         $response
             ->assertStatus(200);
     }


    public function test_Repeated_parent_error()
    {
        $response = $this->postJson('/api/parent/save', [
            "name" => "madhu",
            "email" => "madhu123@mpokket.com",
            "phone_number" => "9179972011841",
            "address" => "91springboard,mgroad,bangalore",
            "pan_card" => "ATPJL3681K",
            "gender" => "M",
            "password" => "chinu7"
        ]);

        $response
            ->assertStatus(422);
    }
}
