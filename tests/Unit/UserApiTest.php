<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

class UserApiTest extends TestCase
{
    public function test_user_index()
    {
        $user = User::factory()->create();
        
        $response = $this->actingAs($user, 'sanctum')->getJson('/api/v1/users');

        $response->assertStatus(200)
                ->assertJsonStructure([
                    'data' => [
                        '*' => ['id','name','email','created_at']
                    ]
                ]);
    }

}
