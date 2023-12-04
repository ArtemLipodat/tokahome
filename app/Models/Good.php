<?php

namespace App\Models;

use A17\Twill\Models\Behaviors\HasRelated;
use A17\Twill\Models\Behaviors\HasMedias;
use A17\Twill\Models\Behaviors\HasRevisions;
use A17\Twill\Models\Behaviors\HasPosition;
use A17\Twill\Models\Behaviors\Sortable;
use A17\Twill\Models\Model;
use App\Models\Behaviors\HasSlug;

class Good extends Model implements Sortable
{
    use HasSlug, HasMedias, HasRevisions, HasPosition, HasRelated;

    protected $fillable = [
        'published',
        'title',
        'description',
        'price',
        'sale',
        'category_id',
        'manufacturer_id',
        'position',
    ];

    public array $slugAttributes = [
        'title',
    ];

    public array $mediasParams = [
        'good_image' => [
            'default' => [
                [
                    'name' => 'default',
                    'ratio' => 0,
                ],
            ],
            'desktop' => [
                [
                    'name' => 'desktop',
                    'ratio' => 4 / 3,
                ],
            ],
            'category' => [
                [
                    'name' => 'category',
                    'ratio' => 16 / 9,
                ],
            ],
        ],
    ];

    public function category(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(CategoryGood::class, 'category_id');
    }

    public function manufacturer(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Manufacturer::class, 'manufacturer_id');
    }

}
