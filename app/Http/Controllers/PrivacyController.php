<?php

namespace App\Http\Controllers;

use App\Services\SiteService;
use Ellite\PagePrivacy\Services\PagePrivacyService;

class PrivacyController extends Controller
{
    public function index(SiteService $site, PagePrivacyService $page)
    {
        $site
            ->setAlternates('privacy')
            ->pushBreadCrumb(__('Política de privacidade'))
            ->setBreadTitle(__('Política de privacidade'))
            ->setTitle(__('Política de privacidade'))
            ->setDescriptionIfNotEmpty($page->getPage()->description)
            ->setKeywordsIfNotEmpty($page->getPage()->keywords);

        return view('front.pages.privacy', [
            'page' => $page->getPage(),
        ]);
    }
}
