<div class="py-12 bg-slate-50 min-h-screen">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Header & Breadcrumb -->
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-slate-900 mb-2">{{ __('Berita & Artikel') }}</h1>
            <p class="text-slate-600">{{ __('Dapatkan informasi terbaru seputar kegiatan, prestasi, dan riset di lingkungan STEI ITB.') }}</p>
        </div>

        <!-- Filters & Search -->
        <div class="bg-white p-4 rounded-lg shadow-sm border border-slate-200 mb-8 flex flex-col md:flex-row gap-4 items-center justify-between">
            <div class="w-full md:w-1/3 relative">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <svg class="h-5 w-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                </div>
                <input 
                    wire:model.live.debounce.300ms="search"
                    type="search" 
                    placeholder="{{ __('Cari berita...') }}"
                    class="block w-full pl-10 pr-3 py-2 border border-slate-300 rounded-md leading-5 bg-white placeholder-slate-500 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 sm:text-sm transition-colors"
                >
            </div>
            
            <div class="w-full md:w-1/4">
                <select 
                    wire:model.live="category"
                    class="block w-full pl-3 pr-10 py-2 text-base border border-slate-300 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 sm:text-sm rounded-md transition-colors"
                    aria-label="{{ __('Filter Kategori') }}"
                >
                    <option value="">{{ __('Semua Kategori') }}</option>
                    @foreach($categories as $cat)
                        <option value="{{ $cat }}">{{ strtoupper(str_replace('_', ' ', $cat)) }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <!-- Loading State -->
        <div wire:loading class="w-full flex justify-center py-12">
            <svg class="animate-spin h-8 w-8 text-blue-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
            </svg>
            <span class="sr-only">{{ __('Memuat data...') }}</span>
        </div>

        <!-- News Grid -->
        <div wire:loading.remove>
            @if($news->isEmpty())
                <div class="bg-white rounded-lg border border-slate-200 text-center py-20 px-4 shadow-sm">
                    <svg class="mx-auto h-12 w-12 text-slate-400 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9.5L16.5 5.5M9 11l3 3L22 4"></path></svg>
                    <h3 class="text-lg font-medium text-slate-900 mb-1">{{ __('Tidak ada berita ditemukan') }}</h3>
                    <p class="text-slate-500">{{ __('Coba gunakan kata kunci lain atau ubah filter kategori pencarian Anda.') }}</p>
                    @if($search || $category)
                        <button wire:click="$set('search', ''); $set('category', '')" class="mt-4 inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-blue-700 bg-blue-100 hover:bg-blue-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors">
                            {{ __('Reset Pencarian') }}
                        </button>
                    @endif
                </div>
            @else
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach($news as $item)
                        <x-news-card :news="$item" wire:key="news-{{ $item->id }}" />
                    @endforeach
                </div>
                
                <!-- Pagination -->
                <div class="mt-12">
                    {{ $news->links() }}
                </div>
            @endif
        </div>

    </div>
</div>
