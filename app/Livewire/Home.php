<?php

namespace App\Livewire;

use App\Models\News;
use App\Models\Event;
use App\Models\StudyProgram;
use App\Models\ResearchGroup;
use App\Models\Lecturer;
use App\Models\Research;
use Livewire\Component;
use Livewire\Attributes\Title;

#[Title('Beranda - STEI ITB')]
class Home extends Component
{
    public function render()
    {
        // Berita Published Terbaru
        $latestNews = News::where('status', 'published')
            ->latest('published_at')
            ->take(3)
            ->get();

        // Agenda Mendatang
        $upcomingEvents = Event::whereIn('status', ['upcoming', 'published'])
            ->where('start_datetime', '>=', now())
            ->orderBy('start_datetime', 'asc')
            ->take(3)
            ->get();

        // Program Studi
        $studyPrograms = StudyProgram::all();
        
        // Kelompok Keahlian
        $researchGroups = ResearchGroup::all();
        
        // Statistik
        $stats = [
            'study_programs' => $studyPrograms->count(),
            'research_groups' => $researchGroups->count(),
            'lecturers' => Lecturer::count(),
            'researches' => Research::count(),
        ];

        return view('livewire.home', [
            'latestNews' => $latestNews,
            'upcomingEvents' => $upcomingEvents,
            'studyPrograms' => $studyPrograms,
            'researchGroups' => $researchGroups,
            'stats' => $stats,
        ]);
    }
}
