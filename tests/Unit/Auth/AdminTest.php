<?php

namespace Tests\Unit\Auth;

use Tests\TestCase;

class AdminTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_all_parent_user_featch()
    {
        $response = $this->get('/api/parents');
        $response->assertStatus(200);

    }

    public function test_all_child_user_featch()
    {
        $response = $this->get('/api/childs');
        $response->assertStatus(200);

    }
    
    public function test_all_card_details_featch()
    {
        $response = $this->get('/api/cards');
        $response->assertStatus(200);

    }

    public function test_all_admins_details_featch()
    {
        $response = $this->get('/api/admin');
        $response->assertStatus(200);

    }

    public function test_admin_fetch_by_admin_id()
    {
        $admin_id="760083771758575617";
        $response = $this->get('/api/admin/'.$admin_id);
        $response->assertStatus(200);

    }

    public function test_parent_user_fetch_by_parent_id()
    {
        $parent_id="760062897723277313";
        $response = $this->get('/api/admin/parent/'.$parent_id);
        $response->assertStatus(200);

    }

    public function test_child_user_fetch_by_child_id()
    {
        $child_id="760100680399650817";
        $response = $this->get('/api/admin/child/'.$child_id);
        $response->assertStatus(200);

    }
    
    public function test_vendor_details_fetch_by_vendor_id()
    {
        $vendor_id="760094476956008449";
        $response = $this->get('/api/admin/vendor/'.$vendor_id);
        $response->assertStatus(200);

    }


     public function test_Registring_new_admin()      //if registered admin presnt it will not success
     {
         $response = $this->postJson('/api/admin/save/', [
            "name" => "chinnuduplicate",
            "phone_number" => "987654321011",
            "address" => "bangalore",
            "email" => "chinnu1234@gmail.com",
            "password" => "123456",
            "dob" => "1999-08-06",
            "joined_date" => "2021-12-11",
            "updated_at" => "2022-05-08T15:29:18.000000Z",
            "created_at" => "2022-05-08T15:29:18.000000Z",
            "id" => 760064766765400065
         ]);

         $response
             ->assertStatus(200);
     }


    public function test_Repeated_admin_error()
    {
        $response = $this->postJson('/api/admin/save/', [
            "name" => "chinnu",
            "phone_number" => "987654321012",
            "address" => "bangalore",
            "email" => "chinnu12234@gmail.com",
            "password" => "123456",
            "dob" => "1999-08-06",
            "joined_date" => "2021-12-11",
            "updated_at" => "2022-05-08T15:29:18.000000Z",
            "created_at" => "2022-05-08T15:29:18.000000Z",
            "id" => 760064766765400065
        ]);

        $response
            ->assertStatus(500);
    }

    public function test_parent_user_approval_by_admin()
    {
        $response = $this->postJson('/api/admin/approve', [    //if alrdy approved it will not work
            'user_id' => 760091841049755649,
            'approved' => 'approved'
        ]);

        $response
            ->assertStatus(200);
    }

    public function test_parent_user_approval_by_admin_to_alardy_approved_user()
    {
        $response = $this->postJson('/api/admin/approve', [    
            'user_id' => 760062897723277313,
            'approved' => 'approved'
        ]);

        $response
            ->assertStatus(400);

    }

    public function test_parent_user_pending_request_status()
    {
        $response = $this->postJson('/api/admin/request-status', []);

        $response
            ->assertStatus(405);

  


    }



}
