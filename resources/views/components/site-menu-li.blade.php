@props([
    'active' => false,
    'menuActive' => null, // string ou array
    'routeLang' => false,
    'route' => false,
    'text' => '',
    'translateText' => true,
])

@inject('site', 'App\Services\SiteService')

@php
    if ($translateText) {
        $text = __($text);
    }

    $url = '#';
    if ($route) {
        $url = $route;
    }
    else if ($routeLang) {
        $url = route_lang($routeLang);
    }

    $isActive = false;
    if ($active) {
        $isActive = true;
    }
    else if ($menuActive) {
        $isActive = $site->isMenuActive($menuActive);
    }
@endphp

<li>
    <a href="{{ $url }}" title="{{ $text }}" class="{{ $isActive ? 'active' : '' }}">
        {{ $text }}
    </a>
</li>