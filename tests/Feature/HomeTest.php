<?php

namespace Tests\Feature;

use Carbon\Carbon;
use Spatie\UptimeMonitor\Models\Monitor;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class HomeTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    function it_can_see_monitors_page()
    {
        $this->signIn();
        $this->get('/home')->assertSee('Monitors');
    }

    /** @test */
    function it_can_see_a_monitor()
    {
        $this->disableExceptionHandling();
        $url = 'https://www.monasheemountainmultimedia.com';
        $lookForString = '';

        Monitor::create([
            'url' => trim($url, '/'),
            'look_for_string' => $lookForString ?? '',
            'uptime_check_method' => isset($lookForString) ? 'get' : 'head',
            'certificate_check_enabled' => true,
            'uptime_last_check_date' => Carbon::now(),
            'uptime_check_interval_in_minutes' => 5,
        ]);

        $this->signIn();
        $this->get('/home')
            ->assertSee('https://www.monasheemountainmultimedia.com')
            ->assertStatus(200);
    }
}
