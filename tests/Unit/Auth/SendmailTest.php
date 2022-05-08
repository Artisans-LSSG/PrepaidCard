<?php

namespace Tests\Unit\Auth;

use Tests\TestCase;

class SendmailTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_Sendmail_ristriction_present()
    {
            $response = $this->get('/api/auth/sendPasswordResetLink');
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
    
    public function test_mail_not_found()
    {
        $response = $this->postJson('/api/auth/sendPasswordResetLink', [
            
            'email' => "gurukiran@gmail.com ",
         
        ]);

        $response
            ->assertStatus(404);
    }
}
