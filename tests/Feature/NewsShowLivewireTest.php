<?php

namespace Tests\Feature;

use App\Livewire\NewsShow;
use Livewire\Livewire;
use Tests\TestCase;

class NewsShowLivewireTest extends TestCase
{
    /**
     * Test invalid slug returns 404.
     */
    public function test_invalid_slug_returns_404()
    {
        $this->get('/berita/invalid-slug-non-existent')
            ->assertStatus(404);
    }
}
