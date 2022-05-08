<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Support\Facades\Config;

class LoginTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_Login_ristriction_present()
    {
        $response = $this->get('/api/auth/login');
        $response->assertStatus(405);
    }

    public function test_right_Login()
    {
        $response = $this->postJson('/api/auth/login', [
            
            'email' => "gurukiran8861110488@gmail.com ",
            'password' => "guru1234",
            
        ]);

        $response
            ->assertStatus(200);
    }
    
    public function test_wronge_Login()
    {
        $response = $this->postJson('/api/auth/login', [
            
            'email' => "gurukiran@gmail.com ",
            'password' => "guru1234",
            
        ]);

        $response
            ->assertStatus(401);
    }
}
