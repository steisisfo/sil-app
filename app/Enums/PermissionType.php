<?php

namespace App\Enums;

use Filament\Support\Contracts\HasLabel;

enum PermissionType: string implements HasLabel
{
    case MANAGE_USERS = 'manage_users';
    case MANAGE_ROLES = 'manage_roles';
    case MANAGE_PAGES = 'manage_pages';
    case MANAGE_STUDY_PROGRAMS = 'manage_study_programs';
    case MANAGE_ADMISSIONS = 'manage_admissions';
    case MANAGE_LECTURERS = 'manage_lecturers';
    case MANAGE_RESEARCH_GROUPS = 'manage_research_groups';
    case MANAGE_RESEARCH = 'manage_research';
    case MANAGE_PARTNERSHIPS = 'manage_partnerships';
    case MANAGE_NEWS = 'manage_news';
    case MANAGE_EVENTS = 'manage_events';
    case MANAGE_ANNOUNCEMENTS = 'manage_announcements';
    case MANAGE_SERVICES = 'manage_services';
    case VIEW_ANALYTICS = 'view_analytics';

    public function getLabel(): ?string
    {
        return match ($this) {
            self::MANAGE_USERS => __('Kelola Pengguna'),
            self::MANAGE_ROLES => __('Kelola Role'),
            self::MANAGE_PAGES => __('Kelola Halaman'),
            self::MANAGE_STUDY_PROGRAMS => __('Kelola Program Studi'),
            self::MANAGE_ADMISSIONS => __('Kelola Penerimaan'),
            self::MANAGE_LECTURERS => __('Kelola Dosen'),
            self::MANAGE_RESEARCH_GROUPS => __('Kelola Kelompok Keahlian'),
            self::MANAGE_RESEARCH => __('Kelola Penelitian'),
            self::MANAGE_PARTNERSHIPS => __('Kelola Kerja Sama'),
            self::MANAGE_NEWS => __('Kelola Berita'),
            self::MANAGE_EVENTS => __('Kelola Agenda'),
            self::MANAGE_ANNOUNCEMENTS => __('Kelola Pengumuman'),
            self::MANAGE_SERVICES => __('Kelola Layanan'),
            self::VIEW_ANALYTICS => __('Lihat Analitik'),
        };
    }
}
