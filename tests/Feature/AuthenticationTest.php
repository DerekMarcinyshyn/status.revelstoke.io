<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AuthenticationTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_does_not_allow_registration_page_and_redirects_to_login()
    {
        $this->get('/register')->assertStatus(302);
    }

    /** @test */
    public function it_redirects_on_register_post()
    {
        $this->post('/register')->assertStatus(302);
    }
}
