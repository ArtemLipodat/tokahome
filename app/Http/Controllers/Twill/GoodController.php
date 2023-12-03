<?php

namespace App\Http\Controllers\Twill;

use A17\Twill\Models\Contracts\TwillModelContract;
use A17\Twill\Services\Forms\Fields\Browser;
use A17\Twill\Services\Forms\Fields\Medias;
use A17\Twill\Services\Forms\Fields\Wysiwyg;
use A17\Twill\Services\Listings\Columns\Text;
use A17\Twill\Services\Listings\TableColumns;
use A17\Twill\Services\Forms\Fields\Input;
use A17\Twill\Services\Forms\Form;
use A17\Twill\Http\Controllers\Admin\ModuleController as BaseModuleController;
use App\Repositories\GoodRepository;

class GoodController extends BaseModuleController
{
    protected $moduleName = 'goods';


    protected function indexData($request): array {
        return [
            'breadcrumb' => [
                [
                    'label' => 'Админ',
                    'url' => route('twill.dashboard'),
                ],
                [
                    'label' => ucfirst('Товары'),
                    'url' => $this->getBackLink(),
                ],
            ],
        ];
    }

    protected function formData($request): array {
        $good = app(GoodRepository::class)->getById(request('good'));
        return[
            'breadcrumb' => [
                [
                    'label' => 'Админ',
                    'url' => route('twill.dashboard'),
                ],
                [
                    'label' => ucfirst('Товары'),
                    'url' => $this->getBackLink(),
                ],
                [
                    'label' => $good->title,
                ],
            ]
        ];
    }

    protected function setUpController(): void
    {
        $this->setPermalinkBase('');
        $this->setSearchColumns(['title']);
    }

    public function getForm(TwillModelContract $model): Form
    {
        $form = parent::getForm($model);

        $form->add(
            Wysiwyg::make()->name('description')->label('Описание')
        );

        $form->add(
          Medias::make()->name('good_image')->max(10)->label('Изображение товара')->note('Выбирать можно несколько')
        );

        $form->add(
          Input::make()->name('price')->label('Цена')->note('Вводить только цифры')
        );

        $form->add(
            Input::make()->name('sale')->label('Скидка в процентах')->note('Вводить только цифры')
        );

        $form->add(
            Browser::make()->name('category_id')->label('Категория товара')->modules(['categoryGood'])
        );

        $form->add(
            Browser::make()->name('manufacturer_id')->label('Производитель')->modules(['manufacturer'])
        );


        return $form;
    }

    protected function additionalIndexTableColumns(): TableColumns
    {
        $table = parent::additionalIndexTableColumns();
        $table->add(Text::make()->field('price')->title('Цена'));
        $table->add(Text::make()->field('sale')->title('Скидка в процентах'));
        return $table;
    }
}
