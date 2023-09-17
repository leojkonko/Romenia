<?php

namespace App\Http\Controllers;

use App\Services\SiteService;
use Ellite\Contact\Services\ContactService;

class ContactController extends Controller
{
    public function index(SiteService $site, ContactService $page)
    {
        $site->setAlternates('contact')
            ->setMenuActive('contact')
            ->pushBreadCrumb(__('Contato'))
            ->setBreadTitle(__('Contato'))
            ->setTitle(__('Contato'))
            ->setDescriptionIfNotEmpty($page->getPage()->description)
            ->setKeywordsIfNotEmpty($page->getPage()->keywords);
        
        return view('front.pages.contact', [
            
        ]);
    }
}
