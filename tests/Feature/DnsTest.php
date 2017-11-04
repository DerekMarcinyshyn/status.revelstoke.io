<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class DnsTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    function it_fails_authentication()
    {
        $this->withExceptionHandling();
        $this->post('/dns')->assertRedirect('login');
    }

    /** @test */
    function it_fails_validation()
    {
        $this->withExceptionHandling();
        $this->signIn();
        $this->post('/dns')->assertSessionHasErrors('url');
    }

    /** @test */
    function it_can_get_dns_records_for_a_domain()
    {
        $this->withExceptionHandling();
        $this->signIn();
        $this->post('/dns', ['url' => 'https://www.google.com'])
            ->assertSee('google.com');
    }
}
