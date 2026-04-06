<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Wedding Theme Configuration
    |--------------------------------------------------------------------------
    */
    'name' => env('WEDDING_TITLE', 'Our Wedding'),
    'id'   => env('THEME_ID', 'classic'), // classic, modern, vintage
    
    'colors' => [
        'primary'   => env('THEME_PRIMARY', '#6366f1'),   // Main Motif
        'secondary' => env('THEME_SECONDARY', '#ec4899'), // Accents
    ],

    'fonts' => [
        'display' => env('THEME_FONT_DISPLAY', 'Playfair Display'),
        'body'    => env('THEME_FONT_BODY', 'Inter'),
    ],
];