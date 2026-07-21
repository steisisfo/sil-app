<div>
    <!-- Hero Section -->
    <section class="relative bg-blue-900 text-white overflow-hidden">
        <div class="absolute inset-0 z-0">
            <!-- Background Image Placeholder (Can use primary color gradient as fallback) -->
            <div class="absolute inset-0 bg-gradient-to-r from-blue-900 to-blue-800 opacity-90"></div>
            <!-- Optional: Add real background image -->
        </div>
        <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-24 md:py-32">
            <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold leading-tight mb-6 tracking-tight">
                {{ __('Menjadi Institusi Terkemuka') }}<br>
                <span class="text-blue-300">{{ __('di Bidang Teknik Elektro & Informatika') }}</span>
            </h1>
            <p class="text-lg md:text-xl text-blue-100 max-w-2xl mb-10 leading-relaxed">
                {{ __('Mendidik talenta terbaik bangsa, menghasilkan riset berdampak, dan membangun inovasi teknologi untuk masa depan yang lebih baik.') }}
            </p>
            <div class="flex flex-wrap gap-4">
                <a href="#" class="px-8 py-3 bg-white text-blue-900 font-semibold rounded-md hover:bg-slate-100 transition-colors shadow-lg">
                    {{ __('Program Studi') }}
                </a>
                <a href="#" class="px-8 py-3 bg-transparent border-2 border-white text-white font-semibold rounded-md hover:bg-white hover:text-blue-900 transition-colors">
                    {{ __('Penerimaan Mahasiswa') }}
                </a>
            </div>
        </div>
    </section>

    <!-- Ringkasan Profil & Statistik -->
    <section class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                <div>
                    <h2 class="text-3xl font-bold text-slate-900 mb-6">{{ __('Sekilas STEI ITB') }}</h2>
                    <p class="text-slate-600 mb-6 leading-relaxed">
                        {{ __('Sekolah Teknik Elektro dan Informatika (STEI) Institut Teknologi Bandung adalah salah satu fakultas terbesar di ITB. Kami memiliki komitmen kuat dalam menyelenggarakan pendidikan berkualitas tinggi, penelitian inovatif, dan pengabdian masyarakat di berbagai bidang kelistrikan, elektronika, telekomunikasi, sistem kontrol, sistem komputer, serta informatika.') }}
                    </p>
                    <a href="#" class="text-blue-700 font-semibold hover:text-blue-800 flex items-center gap-2 group">
                        {{ __('Baca Profil Lengkap') }}
                        <svg class="w-5 h-5 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                    </a>
                </div>
                
                <!-- Statistik -->
                <div class="grid grid-cols-2 gap-4 sm:gap-6">
                    <div class="bg-slate-50 p-6 rounded-lg border border-slate-100 text-center shadow-sm">
                        <div class="text-4xl font-black text-blue-800 mb-2">{{ $stats['study_programs'] }}</div>
                        <div class="text-sm font-medium text-slate-500 uppercase tracking-wide">{{ __('Program Studi') }}</div>
                    </div>
                    <div class="bg-slate-50 p-6 rounded-lg border border-slate-100 text-center shadow-sm">
                        <div class="text-4xl font-black text-blue-800 mb-2">{{ $stats['research_groups'] }}</div>
                        <div class="text-sm font-medium text-slate-500 uppercase tracking-wide">{{ __('Kelompok Keahlian') }}</div>
                    </div>
                    <div class="bg-slate-50 p-6 rounded-lg border border-slate-100 text-center shadow-sm">
                        <div class="text-4xl font-black text-blue-800 mb-2">{{ $stats['lecturers'] }}</div>
                        <div class="text-sm font-medium text-slate-500 uppercase tracking-wide">{{ __('Dosen Aktif') }}</div>
                    </div>
                    <div class="bg-slate-50 p-6 rounded-lg border border-slate-100 text-center shadow-sm">
                        <div class="text-4xl font-black text-blue-800 mb-2">{{ $stats['researches'] }}</div>
                        <div class="text-sm font-medium text-slate-500 uppercase tracking-wide">{{ __('Publikasi & Riset') }}</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Program Studi -->
    <section class="py-16 bg-slate-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-slate-900 mb-4">{{ __('Program Pendidikan') }}</h2>
                <p class="text-slate-600 max-w-2xl mx-auto">{{ __('Kami menawarkan berbagai jenjang pendidikan dari Sarjana (S1) hingga Doktoral (S3) yang dirancang untuk menghasilkan lulusan kompeten di bidangnya.') }}</p>
            </div>
            
            @if($studyPrograms->isEmpty())
                <div class="text-center py-10 bg-white rounded-lg border border-slate-200">
                    <p class="text-slate-500">{{ __('Belum ada data program studi.') }}</p>
                </div>
            @else
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach($studyPrograms as $program)
                        <div class="bg-white rounded-lg border border-slate-200 shadow-sm hover:shadow-md transition-shadow p-6 flex flex-col">
                            <div class="text-xs font-bold text-blue-700 uppercase tracking-wider mb-2 bg-blue-50 inline-block self-start px-2 py-1 rounded">
                                {{ strtoupper($program->degree_level) }}
                            </div>
                            <h3 class="text-xl font-bold text-slate-900 mb-3">{{ $program->getTranslation('name', app()->getLocale(), true) }}</h3>
                            <p class="text-slate-600 text-sm line-clamp-3 mb-6 flex-grow">
                                {{ $program->getTranslation('description', app()->getLocale(), true) ?? __('Tidak ada deskripsi.') }}
                            </p>
                            <a href="#" class="text-blue-700 text-sm font-semibold hover:text-blue-800 inline-flex items-center gap-1">
                                {{ __('Lihat Detail') }} &rarr;
                            </a>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </section>

    <!-- Kelompok Keahlian -->
    <section class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="mb-12 flex justify-between items-end">
                <div class="max-w-2xl">
                    <h2 class="text-3xl font-bold text-slate-900 mb-4">{{ __('Kelompok Keahlian') }}</h2>
                    <p class="text-slate-600">{{ __('Pusat kegiatan akademik dan penelitian yang dikelola oleh staf pengajar berdasarkan spesialisasi bidang ilmu.') }}</p>
                </div>
            </div>

            @if($researchGroups->isEmpty())
                <div class="text-center py-10 bg-slate-50 rounded-lg border border-slate-200">
                    <p class="text-slate-500">{{ __('Belum ada data kelompok keahlian.') }}</p>
                </div>
            @else
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                    @foreach($researchGroups as $rg)
                        <a href="#" class="group block p-6 bg-slate-50 rounded-lg border border-slate-100 hover:bg-blue-50 hover:border-blue-200 transition-colors">
                            <h3 class="font-bold text-slate-800 group-hover:text-blue-800 mb-2 transition-colors">{{ $rg->getTranslation('name', app()->getLocale(), true) }}</h3>
                        </a>
                    @endforeach
                </div>
            @endif
        </div>
    </section>

    <!-- Berita Terbaru -->
    <section class="py-16 bg-slate-50 border-t border-slate-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-end mb-10">
                <h2 class="text-3xl font-bold text-slate-900">{{ __('Berita Terkini') }}</h2>
                <a href="{{ route('news.index') }}" class="hidden sm:flex text-blue-700 font-medium hover:text-blue-800 items-center gap-1">
                    {{ __('Lihat Semua Berita') }} &rarr;
                </a>
            </div>

            @if($latestNews->isEmpty())
                <div class="text-center py-10 bg-white rounded-lg border border-slate-200 shadow-sm">
                    <p class="text-slate-500">{{ __('Belum ada berita yang diterbitkan.') }}</p>
                </div>
            @else
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    @foreach($latestNews as $news)
                        <x-news-card :news="$news" />
                    @endforeach
                </div>
                <div class="mt-8 text-center sm:hidden">
                    <a href="{{ route('news.index') }}" class="text-blue-700 font-medium hover:text-blue-800 inline-block px-4 py-2 border border-blue-200 rounded-md w-full">
                        {{ __('Lihat Semua Berita') }}
                    </a>
                </div>
            @endif
        </div>
    </section>

    <!-- Agenda Mendatang -->
    <section class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-end mb-10">
                <h2 class="text-3xl font-bold text-slate-900">{{ __('Agenda Mendatang') }}</h2>
                <a href="#" class="hidden sm:flex text-blue-700 font-medium hover:text-blue-800 items-center gap-1">
                    {{ __('Semua Agenda') }} &rarr;
                </a>
            </div>

            @if($upcomingEvents->isEmpty())
                <div class="text-center py-10 bg-slate-50 rounded-lg border border-slate-200">
                    <p class="text-slate-500">{{ __('Belum ada agenda dalam waktu dekat.') }}</p>
                </div>
            @else
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                    @foreach($upcomingEvents as $event)
                        <a href="#" class="group flex bg-white border border-slate-200 rounded-lg overflow-hidden shadow-sm hover:shadow-md transition-shadow">
                            <div class="w-24 bg-blue-50 text-center flex flex-col justify-center border-r border-slate-100 p-2">
                                <span class="text-sm font-bold text-blue-600 uppercase">{{ $event->start_datetime->format('M') }}</span>
                                <span class="text-3xl font-black text-blue-900">{{ $event->start_datetime->format('d') }}</span>
                            </div>
                            <div class="p-5 flex-1">
                                <h3 class="font-bold text-slate-900 group-hover:text-blue-700 transition-colors line-clamp-2 mb-2">
                                    {{ $event->getTranslation('name', app()->getLocale(), true) }}
                                </h3>
                                <div class="text-sm text-slate-500 flex items-start gap-2 mt-auto">
                                    <svg class="w-4 h-4 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                                    <span class="line-clamp-1">{{ $event->getTranslation('location', app()->getLocale(), true) ?? __('TBA') }}</span>
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>
                <div class="mt-6 text-center sm:hidden">
                    <a href="#" class="text-blue-700 font-medium hover:text-blue-800 inline-block px-4 py-2 border border-blue-200 rounded-md w-full bg-slate-50">
                        {{ __('Semua Agenda') }}
                    </a>
                </div>
            @endif
        </div>
    </section>

    <!-- CTA -->
    <section class="bg-blue-800 text-white py-16">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-3xl font-bold mb-4">{{ __('Mari Berkolaborasi Bersama') }}</h2>
            <p class="text-blue-100 mb-8 text-lg">{{ __('Jelajahi potensi inovasi teknologi bersama pakar kami melalui kemitraan industri, proyek riset, atau pengembangan sumber daya manusia.') }}</p>
            <a href="#" class="inline-flex justify-center items-center px-8 py-3 bg-white text-blue-900 font-bold rounded-md hover:bg-slate-100 transition-colors shadow-lg">
                {{ __('Hubungi Kami') }}
            </a>
        </div>
    </section>
</div>
