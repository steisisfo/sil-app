<?php

namespace App\Support;

use Illuminate\Support\Facades\Storage;

class MediaUrl
{
    /**
     * Resolve image/file URL safely with local SVG fallback.
     */
    public static function resolve(?string $path, string $fallbackType = 'default'): string
    {
        if (blank($path)) {
            return static::fallback($fallbackType);
        }

        // Direct external URL
        if (str_starts_with($path, 'http://') || str_starts_with($path, 'https://')) {
            return $path;
        }

        // Internal storage path check
        if (Storage::disk('public')->exists($path)) {
            return Storage::disk('public')->url($path);
        }

        // Return local SVG fallback if missing physically in storage
        return static::fallback($fallbackType);
    }

    /**
     * Check if asset exists in storage or is an external URL.
     */
    public static function exists(?string $path): bool
    {
        if (blank($path)) {
            return false;
        }

        if (str_starts_with($path, 'http://') || str_starts_with($path, 'https://')) {
            return true;
        }

        return Storage::disk('public')->exists($path);
    }

    /**
     * Local clean SVG Data URI fallbacks (no external network, no binary files needed).
     */
    public static function fallback(string $type = 'default'): string
    {
        return match ($type) {
            'logo' => 'data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" width="150" height="50" viewBox="0 0 150 50" fill="none"><rect width="150" height="50" rx="6" fill="%231e3a8a"/><text x="50%" y="50%" dominant-baseline="middle" text-anchor="middle" fill="white" font-family="sans-serif" font-weight="bold" font-size="14">STEI ITB</text></svg>',
            
            'avatar', 'lecturer' => 'data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" viewBox="0 0 24 24" fill="none" stroke="%2394a3b8" stroke-width="1.5"><rect width="24" height="24" fill="%23f1f5f9"/><path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>',
            
            'partner' => 'data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" width="120" height="60" viewBox="0 0 120 60" fill="none"><rect width="120" height="60" rx="4" fill="%23f8fafc" stroke="%23e2e8f0"/><text x="50%" y="50%" dominant-baseline="middle" text-anchor="middle" fill="%2364748b" font-family="sans-serif" font-size="12">Mitra</text></svg>',
            
            default => 'data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" width="600" height="400" viewBox="0 0 600 400" fill="none"><rect width="600" height="400" fill="%23f1f5f9"/><path stroke="%2394a3b8" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>',
        };
    }
}
