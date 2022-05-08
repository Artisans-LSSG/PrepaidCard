<?php

namespace Tests\Unit\Auth;

use Tests\TestCase;

class ChildTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_child_ristriction_present()
    {
        $response = $this->get('/api/childs');
        $response->assertStatus(200);

    }




     public function test_Registring_new_child_whose_parent_are_present()     
     {
         $response = $this->postJson('/api/childs/', [
            "id" => 760064388776427521,
            "parent_id" => 760062897723277313,
            "first_name" => "kishore",
            "last_name" => "sai",
            "dob" => "1999-04-18",
            "email" => "kishore123@gmail.com",
            "phone_number" => "998765862123",
            "gender" => "M",
            "monthly_limit" => 5000,
            "is_approved" => "not-approved",
            "created_at" => "2022-05-08T15:27:23.000000Z",
            "updated_at" => "2022-05-08T15:27:23.000000Z",
         ]);

         $response
             ->assertStatus(200);
     }


        public function test_without_parent_child_registration()
        {
            $response = $this->postJson('/api/childs', [
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
                ->assertStatus(422);
        }

        public function test_card_deatils_adding()
        {
            $response = $this->postJson('api/card/save', [      //same card present it will fail
                'card_number' => 9876543210654321,
                'exp_date' => '2022-04-19',
                'cvv' => 856,
                'child_id' => 760064388776427521,
            ]);

            $response
                ->assertStatus(200);
        }

        public function test_restricting_same_card_deatils_adding()
        {
            $response = $this->postJson('api/card/save', [      
                'card_number' => 9876543210654321,
                'exp_date' => '2022-04-19',
                'cvv' => 856,
                'child_id' => 760100680399650817,
            ]);

            $response
                ->assertStatus(500);
        }
}
