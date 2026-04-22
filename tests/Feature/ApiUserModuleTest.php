<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ApiUserModuleTest extends TestCase
{
    use RefreshDatabase;

    /*
    |--------------------------------------------------------------------------
    | USER LIST TEST
    |--------------------------------------------------------------------------
    */

    /** @test */
    public function user_list_api_returns_success()
    {
        User::factory()->count(3)->create();

        $response = $this->getJson('/api/users');

        $response->assertStatus(200)
                 ->assertJsonStructure([
                     'data'
                 ]);
    }

    /*
    |--------------------------------------------------------------------------
    | USER CREATE TEST
    |--------------------------------------------------------------------------
    */

    /** @test */
    public function user_can_be_created_via_api()
    {
        $response = $this->postJson('/api/users', [
            'name' => 'Partho',
            'email' => 'partho@example.com',
            'password' => 'password'
        ]);

        $response->assertStatus(201);

        $this->assertDatabaseHas('users', [
            'email' => 'partho@example.com'
        ]);
    }

    /*
    |--------------------------------------------------------------------------
    | USER UPDATE TEST
    |--------------------------------------------------------------------------
    */

    /** @test */
    public function user_can_be_updated_via_api()
    {
        $user = User::factory()->create();

        $response = $this->putJson("/api/users/{$user->id}", [
            'name' => 'Updated Name'
        ]);

        $response->assertStatus(200);

        $this->assertDatabaseHas('users', [
            'name' => 'Updated Name'
        ]);
    }

    /*
    |--------------------------------------------------------------------------
    | USER DELETE TEST
    |--------------------------------------------------------------------------
    */

    /** @test */
    public function user_can_be_deleted_via_api()
    {
        $user = User::factory()->create();

        $response = $this->deleteJson("/api/users/{$user->id}");

        $response->assertStatus(200);

        $this->assertDatabaseMissing('users', [
            'id' => $user->id
        ]);
    }

    /*
    |--------------------------------------------------------------------------
    | API RESPONSE STRUCTURE TEST
    |--------------------------------------------------------------------------
    */

    /** @test */
    public function api_returns_standard_json_structure()
    {
        User::factory()->create();

        $response = $this->getJson('/api/users');

        $response->assertStatus(200)
                 ->assertJsonStructure([
                     'data',
                 ]);
    }
}