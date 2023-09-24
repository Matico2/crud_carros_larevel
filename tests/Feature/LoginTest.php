<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LoginTest extends TestCase
{
    use RefreshDatabase; 

    public function test_valid_user_can_login()
    {
        $user = \App\Models\User::factory()->create(); 
        $response = $this->post('/login', [
            'email' => $user->email,
            'password' => 'password', 
        ]);

        $response->assertRedirect('/welcome'); 
    }

    public function test_invalid_user_cannot_login()
    {
        $user = \App\Models\User::factory()->create(); 
        $response = $this->post('/login', [
            'email' => $user->email,
            'password' => 'wrong_password', 
        ]);

        $response->assertSessionHasErrors(['email']); 
    }
}
