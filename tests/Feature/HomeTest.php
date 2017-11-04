<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class HomeTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    function it_can_see_monitors()
    {
        $this->signIn();
        $this->get('/home')->assertSee('Monitors');
    }
}
