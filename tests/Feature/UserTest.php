<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserTest extends TestCase
{
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
}
