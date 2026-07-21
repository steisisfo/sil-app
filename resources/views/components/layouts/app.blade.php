<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>{{ $title ?? 'STEI ITB' }} - Sekolah Teknik Elektro dan Informatika</title>
        @if(isset($metaDescription))
            <meta name="description" content="{{ $metaDescription }}">
        @endif
        @stack('meta')
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        @livewireStyles
    </head>
    <body class="bg-slate-50 text-slate-900 font-sans antialiased min-h-screen flex flex-col">
        <a href="#main-content" class="sr-only focus:not-sr-only focus:absolute focus:z-50 focus:p-4 focus:bg-white focus:text-blue-700 shadow-md">
            {{ __('Skip to main content') }}
        </a>

        <x-header />

        <main id="main-content" class="flex-grow w-full">
            {{ $slot }}
        </main>

        <x-footer />

        @livewireScripts
    </body>
</html>
