<?php
// Ikon SVG sederhana (garis). Kelas "icon-grad" memakai gradasi aksen GAINFIT.
function icon(string $name, int $size = 24, string $class = ''): string
{
    static $paths = [
        'home'       => '<path d="M3 11l9-8 9 8"/><path d="M5 10v10h5v-6h4v6h5V10"/>',
        'search'     => '<circle cx="10.5" cy="10.5" r="7"/><path d="M21 21l-5.2-5.2"/>',
        'chart'      => '<path d="M5 20V11M12 20V4M19 20v-6M3 20h18"/>',
        'user'       => '<circle cx="12" cy="8" r="4"/><path d="M4 21c0-4 4-6 8-6s8 2 8 6"/>',
        'barbell'    => '<path d="M2 10v4M5 7v10M19 7v10M22 10v4M5 12h14"/>',
        'yoga'       => '<circle cx="12" cy="5" r="2"/><path d="M12 8v5M12 13l-6 4M12 13l6 4M4 18h16"/>',
        'stretching' => '<circle cx="8" cy="4" r="2"/><path d="M8 7l4 5-3 3M12 12l7-2M9 15l-3 5M9 15l6 5"/>',
        'karate'     => '<circle cx="12" cy="4" r="2"/><path d="M12 7v6M4 9h16M12 13l-4 8M12 13l4 8"/>',
        'scale'      => '<rect x="3" y="4" width="18" height="16" rx="3"/><path d="M8 10a5 4 0 0 1 8 0M12 10l2-2"/>',
        'flame'      => '<path d="M12 3c1 4 5 5 5 10a5 5 0 0 1-10 0c0-2 1-3 2-4 0 2 1 3 2 3 0-3-1-5 1-9z"/>',
        'trophy'     => '<path d="M8 21h8M12 17v4M7 4h10v5a5 5 0 0 1-10 0V4zM7 6H4v2a3 3 0 0 0 3 3M17 6h3v2a3 3 0 0 1-3 3"/>',
        'clock'      => '<circle cx="12" cy="12" r="9"/><path d="M12 7v5l3 2"/>',
        'notes'      => '<rect x="5" y="3" width="14" height="18" rx="2"/><path d="M9 8h6M9 12h6M9 16h4"/>',
        'activity'   => '<path d="M3 12h4l3-8 4 16 3-8h4"/>',
        'message'    => '<path d="M4 5h16v11H9l-5 4z"/>',
    ];
    $p = $paths[$name] ?? '';
    return '<svg class="icon ' . e($class) . '" width="' . $size . '" height="' . $size
        . '" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" '
        . 'stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">' . $p . '</svg>';
}
