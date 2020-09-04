<?php

namespace Tests\Feature;

use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserTest extends TestCase
{
    public function testSanctum()
    {
        $user = User::where('email', 'OyzStt0bJc@gmail.com')->first();
//        $token = $user->createToken('token-name');
//        $plainTextToken = $token->plainTextToken;
        //var_dump($plainTextToken);
        
        $plainTextToken = '20|v5RcYtQBbICZV6mvQv9zhwT0Uy4HBsOxfO7A1bI8QinvivSmaIBGnK44tBsOMXrB5MRG6Vy6yyfFvGqt';

        $response = $this->withHeaders([
            'Authorization' 
                => 'Bearer ' . $plainTextToken,
        ])->json('GET', '/api/sanctum/user');

        $response
            ->assertStatus(200)
            ->assertJson([
                'id' => 2,
                'name' => 'PQzftnuQMH',
                'email' => 'OyzStt0bJc@gmail.com'
            ]);;
    }
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {
        $response = $this->withHeaders([
            'Authorization' 
                => 'Bearer fvges36RWVSiRawV3ScF6GSAp2ofDAllqPcRjynzrqAQK2xvHQEwXRZsLxSI',
        ])->json('GET', '/api/user');

        $response
            ->assertStatus(200)
            ->assertJson([
                'id' => 2,
                'name' => 'PQzftnuQMH',
                'email' => 'OyzStt0bJc@gmail.com'
            ]);;
    }

    public function testDatabase()
    {
        // Make call to application...

        $this->assertDatabaseHas('users', [
            'email' => 'OyzStt0bJc@gmail.com',
        ]);
    }
    

}
