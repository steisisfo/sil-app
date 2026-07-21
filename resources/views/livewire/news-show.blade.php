<div class="py-12 bg-slate-50 min-h-screen">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Breadcrumb -->
        <nav class="flex text-sm text-slate-500 mb-8" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-3">
                <li class="inline-flex items-center">
                    <a href="{{ route('home') }}" class="hover:text-blue-700 transition-colors">{{ __('Beranda') }}</a>
                </li>
                <li>
                    <div class="flex items-center">
                        <svg class="w-4 h-4 text-slate-400 mx-1" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                        <a href="{{ route('news.index') }}" class="hover:text-blue-700 transition-colors">{{ __('Berita') }}</a>
                    </div>
                </li>
                <li aria-current="page">
                    <div class="flex items-center">
                        <svg class="w-4 h-4 text-slate-400 mx-1" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                        <span class="text-slate-700 truncate max-w-xs sm:max-w-md">{{ $news->getTranslation('title', app()->getLocale(), true) }}</span>
                    </div>
                </li>
            </ol>
        </nav>

        <!-- Article Content -->
        <article class="bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden p-6 sm:p-10 mb-12">
            
            <!-- Category Badge & Date -->
            <div class="flex flex-wrap items-center gap-4 text-sm text-slate-500 mb-4">
                @if($news->category)
                    <span class="bg-blue-100 text-blue-800 text-xs font-bold px-3 py-1 rounded-full">
                        {{ strtoupper(str_replace('_', ' ', $news->category)) }}
                    </span>
                @endif
                <span class="flex items-center gap-1">
                    <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                    {{ $news->published_at ? $news->published_at->format('d F Y') : $news->created_at->format('d F Y') }}
                </span>
                @if($news->author)
                    <span class="flex items-center gap-1">
                        <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                        {{ $news->author->name }}
                    </span>
                @endif
            </div>

            <!-- Title -->
            <h1 class="text-3xl sm:text-4xl font-extrabold text-slate-900 mb-6 leading-tight">
                {{ $news->getTranslation('title', app()->getLocale(), true) }}
            </h1>

            <!-- Image with fallback -->
            <div class="mb-8 rounded-xl overflow-hidden bg-slate-100 max-h-[450px]">
                <img src="{{ \App\Support\MediaUrl::resolve($news->image, 'default') }}" 
                     alt="{{ $news->getTranslation('title', app()->getLocale(), true) }}" 
                     class="w-full h-full object-cover">
            </div>

            <!-- Body Content -->
            <div class="prose prose-slate max-w-none text-slate-700 leading-relaxed space-y-4">
                {!! nl2br(e($news->getTranslation('content', app()->getLocale(), true))) !!}
            </div>

            <!-- Tags -->
            @if($news->tags)
                <div class="mt-10 pt-6 border-t border-slate-100 flex flex-wrap gap-2 items-center">
                    <span class="text-xs font-semibold text-slate-400 uppercase tracking-wider">{{ __('Tag:') }}</span>
                    @foreach(explode(',', $news->tags) as $tag)
                        <span class="text-xs bg-slate-100 text-slate-600 px-3 py-1 rounded-full font-medium">
                            #{{ trim($tag) }}
                        </span>
                    @endforeach
                </div>
            @endif
        </article>

        <!-- Related News -->
        @if($relatedNews->isNotEmpty())
            <div class="mt-12">
                <h2 class="text-2xl font-bold text-slate-900 mb-6">{{ __('Berita Terkait') }}</h2>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    @foreach($relatedNews as $item)
                        <x-news-card :news="$item" wire:key="related-{{ $item->id }}" />
                    @endforeach
                </div>
            </div>
        @endif

    </div>
</div>
