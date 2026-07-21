<?php

namespace App\Livewire;

use App\Models\News;
use Livewire\Component;
use Illuminate\Support\Str;

class NewsShow extends Component
{
    public News $news;
    public $relatedNews;

    public function mount(string $slug)
    {
        $this->news = News::with('author')
            ->where('slug', $slug)
            ->where('status', 'published')
            ->firstOrFail();

        // Increment views count safely
        $this->news->increment('views_count');

        // Fetch related news (same category or latest, excluding current news)
        $this->relatedNews = News::with('author')
            ->where('status', 'published')
            ->where('id', '!=', $this->news->id)
            ->when($this->news->category, function ($query) {
                $query->where('category', $this->news->category);
            })
            ->latest('published_at')
            ->take(3)
            ->get();

        // Fallback to general latest if related by category is empty
        if ($this->relatedNews->isEmpty()) {
            $this->relatedNews = News::with('author')
                ->where('status', 'published')
                ->where('id', '!=', $this->news->id)
                ->latest('published_at')
                ->take(3)
                ->get();
        }
    }

    public function render()
    {
        $title = $this->news->getTranslation('title', app()->getLocale(), true) . ' - STEI ITB';
        $description = Str::limit(strip_tags($this->news->getTranslation('content', app()->getLocale(), true) ?? ''), 160);

        return view('livewire.news-show')
            ->title($title)
            ->with([
                'metaDescription' => $description,
            ]);
    }
}
