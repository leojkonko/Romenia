<?php

namespace App\Http\Controllers;

use App\Services\SiteService;

class HomeController extends Controller
{
    public function index(SiteService $alternates)
    {
        $alternates->setAlternates('home')
            ->setMenuActive('home');
        
        return view('front.pages.home', [
            'header_home' => true,
        ]);
    }
}
