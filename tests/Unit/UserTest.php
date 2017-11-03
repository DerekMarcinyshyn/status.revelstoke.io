<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    function it_can_create_a_user()
    {
        factory('App\User')->create([
            'name' => 'sudo',
            'email' => 'your@email.com',
            'password' => '123456'
        ]);

        $this->assertDatabaseHas('users', ['name' => 'sudo']);
    }
}
