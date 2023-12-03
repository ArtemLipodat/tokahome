<?php

namespace App\Http\Controllers\Twill;

use A17\Twill\Models\Contracts\TwillModelContract;
use A17\Twill\Services\Forms\Fields\Medias;
use A17\Twill\Services\Listings\Columns\Text;
use A17\Twill\Services\Listings\TableColumns;
use A17\Twill\Services\Forms\Fields\Input;
use A17\Twill\Services\Forms\Form;
use A17\Twill\Http\Controllers\Admin\NestedModuleController as BaseModuleController;
use App\Repositories\CategoryGoodRepository;

class CategoryGoodController extends BaseModuleController
{
    protected $moduleName = 'categoryGoods';
    protected $showOnlyParentItemsInBrowsers = true;
    protected $nestedItemsDepth = 1;

    protected function indexData($request): array {
        return [
            'breadcrumb' => [
                [
                    'label' => 'Админ',
                    'url' => route('twill.dashboard'),
                ],
                [
                    'label' => ucfirst('Категории товаров'),
                    'url' => $this->getBackLink(),
                ],
            ],
        ];
    }

    protected function formData($request): array {
        $category = app(CategoryGoodRepository::class)->getById(request('categoryGood'));
        return[
            'breadcrumb' => [
                [
                    'label' => 'Админ',
                    'url' => route('twill.dashboard'),
                ],
                [
                    'label' => ucfirst('Категории товаров'),
                    'url' => $this->getBackLink(),
                ],
                [
                    'label' => $category->title,
                ],
            ]
        ];
    }


    protected function setUpController(): void
    {
        $this->enableReorder();
        $this->setPermalinkBase('');
        $this->setSearchColumns(['title']);
//        $this->enableEditInModal();
    }


    public function getForm(TwillModelContract $model): Form {
        $form = parent::getForm($model);
        $form->add(Medias::make()->name('category_image')->label('Изображение'));

        return $form;
    }

    protected function additionalIndexTableColumns(): TableColumns
    {
        return parent::additionalIndexTableColumns();
    }
}
