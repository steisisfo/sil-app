<?php

namespace App\Livewire;

use App\Models\News;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Url;
use Livewire\Attributes\Title;
use Illuminate\Support\Str;

#[Title('Berita - STEI ITB')]
class NewsIndex extends Component
{
    use WithPagination;

    #[Url(history: true, keep: false)]
    public $search = '';

    #[Url(history: true, keep: false)]
    public $category = '';

    public function updatedSearch()
    {
        $this->resetPage();
    }

    public function updatedCategory()
    {
        $this->resetPage();
    }

    public function render()
    {
        $query = News::with('author')
            ->where('status', 'published');

        if (!empty($this->search)) {
            $query->where(function($q) {
                $q->where('title', 'like', '%' . $this->search . '%')
                  ->orWhere('content', 'like', '%' . $this->search . '%');
            });
        }

        if (!empty($this->category)) {
            $query->where('category', $this->category);
        }

        $news = $query->latest('published_at')->paginate(9);

        // Ambil daftar kategori unik dari berita yang sudah dipublikasikan
        $categories = News::where('status', 'published')
            ->select('category')
            ->distinct()
            ->whereNotNull('category')
            ->pluck('category');

        return view('livewire.news-index', [
            'news' => $news,
            'categories' => $categories,
        ]);
    }
}
