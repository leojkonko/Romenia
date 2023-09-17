@inject('contact', 'Ellite\\Contact\\Services\\ContactService')
@inject('site', 'App\\Services\\SiteService')

@if (count($contact->getIframeLinks()))
    <section class="py-2 pb-lg-4 mapa-wrapper">
        <div class="container">
            @foreach ($contact->getIframeLinks() as $link)
                <iframe @if ($site->useLgpd()) data-ellite-lgpd-categoria="funcionais" data-src="{{ $link }}"
            @else
                src="{{ $link }}" @endif class="rounded-3 shadow-lg" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
                </iframe>
            @endforeach

            @if ($site->useLgpd())
                <div data-type="placeholder" data-ellite-lgpd-categoria="funcionais" data-nosnippet>
                    <div class="alert alert-info text-center mt-4">
                        {{ __('site.iframe-no-functional-cookies') }}
                        <br>
                        <a onClick="ElliteLgpdApi.showModal(); return false;" href="#" style="cursor: pointer">
                            {{ __('site.click-manage-cookies') }}
                        </a>
                    </div>
                </div>
            @endif

        </div>
    </section>
@endif
