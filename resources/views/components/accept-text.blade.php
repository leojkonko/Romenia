@inject('site', 'App\\Services\\SiteService')

@if ($site->hasPrivacy())
    {!! __('site.accept-text-privacy', [
        'Link' => route_lang('privacy'),
        'Name' => env('APP_NAME'),
    ]) !!}
@else
    {{ __('site.accept-text', ['Name' => env('APP_NAME')]) }}
@endif