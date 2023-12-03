<?php

namespace App\Repositories;

use A17\Twill\Repositories\Behaviors\HandleSlugs;
use A17\Twill\Repositories\Behaviors\HandleMedias;
use A17\Twill\Repositories\Behaviors\HandleRevisions;
use A17\Twill\Repositories\Behaviors\HandleNesting;
use A17\Twill\Repositories\ModuleRepository;
use App\Models\CategoryGood;

class CategoryGoodRepository extends ModuleRepository
{
    use HandleSlugs, HandleMedias, HandleRevisions, HandleNesting;

    public function __construct(CategoryGood $model)
    {
        $this->model = $model;
    }
}
