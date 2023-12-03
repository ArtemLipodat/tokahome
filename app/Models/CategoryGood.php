<?php

namespace App\Models;

use A17\Twill\Models\Behaviors\HasSlug;
use A17\Twill\Models\Behaviors\HasMedias;
use A17\Twill\Models\Behaviors\HasRevisions;
use A17\Twill\Models\Behaviors\HasPosition;
use A17\Twill\Models\Behaviors\HasNesting;
use A17\Twill\Models\Behaviors\Sortable;
use A17\Twill\Models\Model;

class CategoryGood extends Model implements Sortable
{
    use HasSlug, HasMedias, HasRevisions, HasPosition, HasNesting;

    protected $fillable = [
        'published',
        'title',
        'position',
    ];

    public $slugAttributes = [
        'title',
    ];

    public array $mediasParams = [
        'category_image' => [
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
    ];
}
