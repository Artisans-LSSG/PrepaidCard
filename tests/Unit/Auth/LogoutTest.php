<?php

use App\Models\User;
use Tests\TestCase;

use Illuminate\Support\Facades\Config;
use Tymon\JWTAuth\Facades\JWTAuth;

class LogoutTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_Logout_ristriction_present()
       {
            $response = $this->get('/api/auth/logout');
            $response->assertStatus(405);
        }

        protected function tokenvalid(): string
        {
            $response       = $this->json('post', '/api/auth/login', [
                'email' => "gurukiran8861110488@gmail.com ",
                'password' => "guru1234",
            ]);
            $content= json_decode($response->getContent());
            
    
            if (!isset($content->access_token)) {
                throw new RuntimeException('Token missing in response');
            }
            
            return $content->access_token;
        }
    
        public function test_valid_user_logout()
        {
            $response = $this->json('POST', '/api/auth/logout', [], ['Authorization' => $this->tokenvalid()]);
            
            $response
                ->assertStatus(200);
        }
        
        protected function tokeninvalid(): string
        {
            $response       = $this->json('post', '/api/auth/login', [
                'email' => "gurukiran@gmail.com ",
                'password' => "guru1234",
            ]);
            $content= json_decode($response->getContent());
    
            return $content->error;
        }
    
        public function test_non_logedin_user_logout()
        {
            $response = $this->json('POST', '/api/auth/refresh', [], ['Authorization' => $this->tokeninvalid()]);
    
            $response
                ->assertStatus(401);
        }
    
}