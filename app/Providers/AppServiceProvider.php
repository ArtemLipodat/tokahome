<?php

namespace App\Providers;

use A17\Twill\Facades\TwillAppSettings;
use A17\Twill\Services\Settings\SettingsGroup;
use Illuminate\Support\ServiceProvider;
use A17\Twill\Facades\TwillNavigation;
use A17\Twill\View\Components\Navigation\NavigationLink;

class AppServiceProvider extends ServiceProvider
{
    public function register()
    {
    }

    public function boot()
    {
        TwillNavigation::addLink(
            NavigationLink::make()->forModule('pages')->title('Страницы')
        );
        TwillNavigation::addLink(
            NavigationLink::make()->forModule('goods')->title('Товары')
        );
        TwillNavigation::addLink(
            NavigationLink::make()->forModule('categoryGoods')->title('Категории товаров')
        );
        TwillNavigation::addLink(
            NavigationLink::make()->forModule('manufacturers')->title('Производители')
        );
        TwillNavigation::addLink(
            NavigationLink::make()->forModule('menuLinks')->title('Меню')
        );
        TwillAppSettings::registerSettingsGroup(
            SettingsGroup::make()->name('homepage')->label('Домашняя страница')
        );
        TwillAppSettings::registerSettingsGroups(
            SettingsGroup::make()->name('main')->label('Основные'),
        );
        TwillAppSettings::registerSettingsGroups(
            SettingsGroup::make()->name('seo')->label(trans('twill-metadata::form.titles.fieldset')),
        );
    }
}
