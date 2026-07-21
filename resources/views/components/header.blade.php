<header x-data="{ mobileMenuOpen: false }" class="bg-white shadow-sm sticky top-0 z-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-20 items-center">
            <!-- Logo -->
            <div class="flex-shrink-0 flex items-center">
                <a href="{{ url('/') }}" class="flex items-center gap-3 hover:opacity-80 transition-opacity focus:outline-none focus:ring-2 focus:ring-blue-700 rounded" aria-label="Beranda STEI ITB">
                    <img class="h-12 w-auto" src="{{ \App\Support\MediaUrl::resolve('logo-stei.png', 'logo') }}" alt="STEI ITB Logo">
                    <div class="flex flex-col">
                        <span class="font-bold text-lg leading-tight text-blue-900 tracking-tight">STEI ITB</span>
                        <span class="text-xs text-slate-500 font-medium tracking-wide uppercase hidden sm:block">{{ __('Sekolah Teknik Elektro dan Informatika') }}</span>
                    </div>
                </a>
            </div>

            <!-- Navigation (Desktop) -->
            <nav class="hidden lg:flex space-x-1 xl:space-x-4 items-center" aria-label="Main Navigation">
                @php
                    $navItems = [
                        ['url' => url('/'), 'label' => __('Beranda'), 'active' => request()->is('/')],
                        ['url' => '#', 'label' => __('Profil'), 'active' => request()->is('profil*')],
                        ['url' => '#', 'label' => __('Program Studi'), 'active' => request()->is('program-studi*')],
                        ['url' => '#', 'label' => __('Dosen'), 'active' => request()->is('dosen*')],
                        ['url' => '#', 'label' => __('Riset'), 'active' => request()->is('riset*')],
                        ['url' => route('news.index'), 'label' => __('Berita'), 'active' => request()->routeIs('news.index')],
                        ['url' => '#', 'label' => __('Agenda'), 'active' => request()->is('agenda*')],
                        ['url' => '#', 'label' => __('Layanan'), 'active' => request()->is('layanan*')],
                        ['url' => '#', 'label' => __('Kontak'), 'active' => request()->is('kontak*')],
                    ];
                @endphp

                @foreach($navItems as $item)
                    <a href="{{ $item['url'] }}" 
                       class="px-2 xl:px-3 py-2 rounded-md text-sm font-medium transition-colors focus:outline-none focus:ring-2 focus:ring-blue-700
                              {{ $item['active'] ? 'text-blue-700 bg-blue-50' : 'text-slate-600 hover:text-blue-700 hover:bg-slate-50' }}"
                       aria-current="{{ $item['active'] ? 'page' : 'false' }}">
                        {{ $item['label'] }}
                    </a>
                @endforeach

                <!-- Language Switcher -->
                <div class="ml-2 pl-4 border-l border-slate-200 flex items-center gap-2" aria-label="Language Switcher">
                    <a href="{{ route('lang.switch', 'id') }}" 
                       class="text-sm transition-colors focus:outline-none focus:ring-2 focus:ring-blue-700 rounded px-1
                              {{ app()->getLocale() === 'id' ? 'font-bold text-blue-700' : 'text-slate-500 hover:text-blue-600' }}"
                       aria-label="Bahasa Indonesia"
                       title="Bahasa Indonesia">ID</a>
                    <span class="text-slate-300" aria-hidden="true">|</span>
                    <a href="{{ route('lang.switch', 'en') }}" 
                       class="text-sm transition-colors focus:outline-none focus:ring-2 focus:ring-blue-700 rounded px-1
                              {{ app()->getLocale() === 'en' ? 'font-bold text-blue-700' : 'text-slate-500 hover:text-blue-600' }}"
                       aria-label="English"
                       title="English">EN</a>
                </div>
            </nav>

            <!-- Mobile menu button -->
            <div class="lg:hidden flex items-center gap-4">
                <!-- Mobile Language Switcher -->
                <div class="flex items-center gap-2" aria-label="Language Switcher">
                    <a href="{{ route('lang.switch', 'id') }}" class="text-sm {{ app()->getLocale() === 'id' ? 'font-bold text-blue-700' : 'text-slate-500' }}">ID</a>
                    <span class="text-slate-300">|</span>
                    <a href="{{ route('lang.switch', 'en') }}" class="text-sm {{ app()->getLocale() === 'en' ? 'font-bold text-blue-700' : 'text-slate-500' }}">EN</a>
                </div>

                <button @click="mobileMenuOpen = !mobileMenuOpen" type="button" 
                        class="inline-flex items-center justify-center p-2 rounded-md text-slate-500 hover:text-slate-700 hover:bg-slate-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-blue-700" 
                        aria-controls="mobile-menu" 
                        :aria-expanded="mobileMenuOpen.toString()">
                    <span class="sr-only">Buka menu utama</span>
                    <!-- Icon closed -->
                    <svg x-show="!mobileMenuOpen" class="block h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                    <!-- Icon open -->
                    <svg x-show="mobileMenuOpen" style="display: none;" class="block h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile Menu -->
    <div x-show="mobileMenuOpen" 
         style="display: none;"
         x-transition:enter="transition ease-out duration-200"
         x-transition:enter-start="opacity-0 -translate-y-1"
         x-transition:enter-end="opacity-100 translate-y-0"
         x-transition:leave="transition ease-in duration-150"
         x-transition:leave-start="opacity-100 translate-y-0"
         x-transition:leave-end="opacity-0 -translate-y-1"
         class="lg:hidden bg-white border-t border-slate-100 shadow-lg absolute w-full" 
         id="mobile-menu">
        <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3">
            @foreach($navItems as $item)
                <a href="{{ $item['url'] }}" 
                   class="block px-3 py-2 rounded-md text-base font-medium focus:outline-none focus:ring-2 focus:ring-blue-700
                          {{ $item['active'] ? 'text-blue-700 bg-blue-50' : 'text-slate-600 hover:text-blue-700 hover:bg-slate-50' }}"
                   aria-current="{{ $item['active'] ? 'page' : 'false' }}">
                    {{ $item['label'] }}
                </a>
            @endforeach
        </div>
    </div>
</header>
