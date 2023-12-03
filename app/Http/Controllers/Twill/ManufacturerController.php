<?php

namespace App\Http\Controllers\Twill;

use A17\Twill\Models\Contracts\TwillModelContract;
use A17\Twill\Services\Listings\Columns\Text;
use A17\Twill\Services\Listings\TableColumns;
use A17\Twill\Services\Forms\Fields\Input;
use A17\Twill\Services\Forms\Form;
use A17\Twill\Http\Controllers\Admin\ModuleController as BaseModuleController;
use App\Repositories\ManufacturerRepository;

class ManufacturerController extends BaseModuleController
{
    protected $moduleName = 'manufacturers';


    protected function indexData($request): array {
        return [
            'breadcrumb' => [
                [
                    'label' => 'Админ',
                    'url' => route('twill.dashboard'),
                ],
                [
                    'label' => ucfirst('Производители'),
                    'url' => $this->getBackLink(),
                ],
            ],
        ];
    }

    protected function formData($request): array {
        $manufacturer = app(ManufacturerRepository::class)->getById(request('manufacturer'));
        return[
            'breadcrumb' => [
                [
                    'label' => 'Админ',
                    'url' => route('twill.dashboard'),
                ],
                [
                    'label' => ucfirst('Производители'),
                    'url' => $this->getBackLink(),
                ],
                [
                    'label' => $manufacturer->title,
                ],
            ]
        ];
    }

    protected function setUpController(): void
    {
        $this->enableReorder();
        $this->setPermalinkBase('');
        $this->setSearchColumns(['title']);
        $this->enableEditInModal();
    }

    protected function additionalIndexTableColumns(): TableColumns
    {
        return parent::additionalIndexTableColumns();
    }
}
