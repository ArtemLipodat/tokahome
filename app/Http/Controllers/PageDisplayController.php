<?php

namespace App\Http\Controllers;

use A17\Twill\Facades\TwillAppSettings;
use App\Repositories\PageRepository;
use CwsDigital\TwillMetadata\Traits\SetsMetadata;
use Illuminate\Contracts\View\View;

class PageDisplayController extends Controller
{

    use SetsMetadata;
    public function show(string $slug, PageRepository $pageRepository): View
    {
        $page = $pageRepository->forSlug($slug);

        if (!$page) {
            abort(404);
        }

        return view('site.layouts.main', ['page' => $page]);
    }

    public function home(): View
    {
        if (TwillAppSettings::get('homepage.homepage.page')->isNotEmpty()) {
            /** @var \App\Models\Page $frontPage */
            $frontPage = TwillAppSettings::get('homepage.homepage.page')->first();

            $this->setMetadata($frontPage);

            if ($frontPage->published) {
                return view('site.layouts.main', ['page' => $frontPage]);
            }
        }

        abort(404);
    }
}
