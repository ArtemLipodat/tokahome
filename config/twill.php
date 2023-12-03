<?php

return [
    'locale' => 'ru',
    'block_editor' => [
        'use_twill_blocks' => [],
        'image' => [
            'default' => [
                [
                    'name' => 'default',
                    'ratio' => 0,
                ],
            ],
            'desktop' => [
                [
                    'name' => 'desktop',
                    'ratio' => 16 / 9,
                ],
            ],
            'mobile' => [
                [
                    'name' => 'mobile',
                    'ratio' => 3 / 4,
                ],
            ],
        ],
    ],
    'glide' => [
        'driver' => 'imagick',
        'default_params' => [
            'fm' => 'webp',
        ]
    ]
];
