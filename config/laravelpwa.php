<?php

return [
    'name' => 'Presensi.SMKN1CIBADAK',
    'manifest' => [
        'name' => env('APP_NAME', 'Presensi SMKN 1 Cibadak'),
        'short_name' => 'presensi.smkn1cbd',
        'start_url' => '/',
        'background_color' => '#ffffff',
        'theme_color' => '#ffffff',
        'display' => 'standalone',
        'orientation'=> 'portrait',
        'status_bar'=> '#ffffff',
        'icons' => [
            '72x72' => [
                'path' => 'public/icons/icon-72x72.png',
                'purpose' => 'any'
            ],
            '96x96' => [
                'path' => 'public/icons/icon-96x96.png',
                'purpose' => 'any'
            ],
            '128x128' => [
                'path' => 'public/icons/icon-128x128.png',
                'purpose' => 'any'
            ],
            '144x144' => [
                'path' => 'public/icons/icon-144x144.png',
                'purpose' => 'any'
            ],
            '152x152' => [
                'path' => 'public/icons/icon-152x152.png',
                'purpose' => 'any'
            ],
            '192x192' => [
                'path' => 'public/icons/icon-192x192.png',
                'purpose' => 'any'
            ],
            '384x384' => [
                'path' => 'public/icons/icon-384x384.png',
                'purpose' => 'any'
            ],
            '512x512' => [
                'path' => 'public/icons/icon-512x512.png',
                'purpose' => 'any'
            ],
        ],
        'shortcuts' => [
            [
                'name' => 'Shortcut Link 1',
                'description' => 'Shortcut Link 1 Description',
                'url' => '/shortcutlink1',
                'icons' => [
                    "src" => "/public/icons/icon-72x72.png",
                    "purpose" => "any"
                ]
            ],
            [
                'name' => 'Shortcut Link 2',
                'description' => 'Shortcut Link 2 Description',
                'url' => '/shortcutlink2'
            ]
        ],
        'custom' => []
    ]
];
