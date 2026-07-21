@props(['news'])

<article class="bg-white rounded-xl shadow-sm border border-slate-200 overflow-hidden hover:shadow-md transition-shadow flex flex-col h-full">
    <a href="{{ route('news.show', $news->slug) }}" class="block h-48 bg-slate-200 overflow-hidden relative">
        <img src="{{ \App\Support\MediaUrl::resolve($news->image, 'default') }}" alt="{{ $news->getTranslation('title', app()->getLocale(), true) }}" class="w-full h-full object-cover transition-transform duration-300 hover:scale-105">
        @if($news->category)
            <div class="absolute top-4 left-4 bg-white/90 backdrop-blur text-blue-800 text-xs font-bold px-3 py-1 rounded shadow-sm">
                {{ strtoupper(str_replace('_', ' ', $news->category)) }}
            </div>
        @endif
    </a>
    <div class="p-6 flex flex-col flex-grow">
        <div class="text-sm text-slate-500 mb-2 flex flex-wrap items-center gap-x-4 gap-y-2">
            <span class="flex items-center gap-1">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                {{ $news->published_at ? $news->published_at->format('d M Y') : $news->created_at->format('d M Y') }}
            </span>
            @if($news->author)
            <span class="flex items-center gap-1">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                {{ $news->author->name }}
            </span>
            @endif
        </div>
        <h3 class="text-xl font-bold text-slate-900 mb-3 line-clamp-2">
            <a href="{{ route('news.show', $news->slug) }}" class="hover:text-blue-700 transition-colors">
                {{ $news->getTranslation('title', app()->getLocale(), true) }}
            </a>
        </h3>
        <p class="text-slate-600 text-sm line-clamp-3 mb-4 flex-grow">
            {{ Str::limit(strip_tags($news->getTranslation('content', app()->getLocale(), true) ?? ''), 150) }}
        </p>
    </div>
</article>
