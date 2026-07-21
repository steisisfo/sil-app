<?php

namespace Tests\Feature;

use App\Livewire\Home;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Tests\TestCase;

class HomeLivewireTest extends TestCase
{
    /**
     * Test the component renders successfully.
     */
    public function test_renders_successfully()
    {
        Livewire::test(Home::class)
            ->assertStatus(200);
    }
    
    /**
     * Test the root route returns the component.
     */
    public function test_root_route_returns_home_component()
    {
        $this->get('/')
            ->assertStatus(200)
            ->assertSeeLivewire(Home::class);
    }
}
