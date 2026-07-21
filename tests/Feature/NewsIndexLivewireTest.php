<?php

namespace Tests\Feature;

use App\Livewire\NewsIndex;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Tests\TestCase;

class NewsIndexLivewireTest extends TestCase
{
    public function test_news_index_renders_successfully()
    {
        Livewire::test(NewsIndex::class)
            ->assertStatus(200);
    }

    public function test_news_route_returns_component()
    {
        $this->get('/berita')
            ->assertStatus(200)
            ->assertSeeLivewire(NewsIndex::class);
    }
}
