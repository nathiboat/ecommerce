<?php

namespace Tests\Feature\Auth;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RegistrationTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_it_requires_a_name()
    {
        $this->json('POST','api/auth/register')->assertJsonValidationErrors(['name']);
    }

    public function test_it_requires_a_email()
    {
        $this->json('POST','api/auth/register')->assertJsonValidationErrors(['email']);
    }

    public function test_it_requires_a_valid_email()
    {
        $this->json('POST','api/auth/register', [
            'email' => 'nope'
        ])->assertJsonValidationErrors(['email']);
    }

    public function test_it_requires_a_unique_email()
    {
        $user = User::factory()->create();

        $this->json('POST','api/auth/register', [
            'email' => $user->email,
        ])->assertJsonValidationErrors(['email']);
    }

    public function test_it_requires_a_password()
    {
        $this->json('POST','api/auth/register')->assertJsonValidationErrors(['password']);
    }


    public function test_it_registers_a_user()
    {
        $this->json('POST','api/auth/register', [
            'name' => $name = 'Nathi',
            'email' => $email =  'nathi.t@outlook.com',
            'password' => 'password'
        ]);

        $this->assertDatabaseHas('users', [
            'email' => $email,
            'name' => $name
        ]);

    }

    public function test_it_return_a_user_on_registration()
    {
        $this->json('POST','api/auth/register', [
            'name' => 'Nathi',
            'email' => $email =  'nathi.t@outlook.com',
            'password' => 'password'
        ])->assertJsonFragment([
            'email' => $email
        ]);

       

    }
}
