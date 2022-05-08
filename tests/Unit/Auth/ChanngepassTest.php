<?php

use App\Models\User;
use Tests\TestCase;

use Illuminate\Support\Facades\Config;
use Tymon\JWTAuth\Facades\JWTAuth;
use App\Http\Controllers\PasswordResetRequestController;
use Illuminate\Support\Facades\Auth;
use App\Models\password_resets;

class ChanngepassTest extends TestCase
{
    /**
     * A basic unit test example.
     *resetPassword
     * @return void
     */
    public function test_Changepass_ristriction_present()
    {
            $response = $this->get('/api/auth/resetPassword');
            $response->assertStatus(405);
    }

    public function test_mail_present()
    {
        $response = $this->postJson('/api/auth/sendPasswordResetLink', [
            
            'email' => "gurukiran8861110488@gmail.com ",
           
            
        ]);

        $response
            ->assertStatus(200);
    }


    public function test_change_password_valid_user()
    {
        $token_pass=password_resets::where('email','gurukiran8861110488@gmail.com')->first();
        $token = json_decode($token_pass);
         $final_token=$token->token;
        
        $response = $this->json('POST', '/api/auth/resetPassword', [], [
            'resetToken' => $final_token,
            'email' =>  "gurukiran8861110488@gmail.com",
            'password' => '1234guru',
            'password_confirmation' => '1234guru',
        ]);

        
        
        $response
            ->assertStatus(422);
    }
}