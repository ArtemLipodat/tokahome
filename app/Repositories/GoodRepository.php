<?php

namespace App\Repositories;

use A17\Twill\Models\Contracts\TwillModelContract;
use A17\Twill\Repositories\Behaviors\HandleSlugs;
use A17\Twill\Repositories\Behaviors\HandleMedias;
use A17\Twill\Repositories\Behaviors\HandleRevisions;
use A17\Twill\Repositories\ModuleRepository;
use App\Models\CategoryGood;
use App\Models\Good;

class GoodRepository extends ModuleRepository
{
    use HandleSlugs, HandleMedias, HandleRevisions;

    protected $relatedBrowsers = ['category', 'manufacturer'];

    public function __construct(Good $model)
    {
        $this->model = $model;
    }

    public function beforeSave(TwillModelContract $object, array $fields): void {

        if (isset($fields['browsers']['category'])) {
            $categorySlug = CategoryGood::where('id', $fields['browsers']['category'][0]['id'])->first();
            $fields['slug']['en'] = $categorySlug->slug . '/' .$fields['slug']['en'];
        }

        $this->updateBrowser($object, $fields, 'category');
        $this->updateBrowser($object, $fields, 'manufacturer');
        parent::beforeSave($object, $fields);
    }
}
