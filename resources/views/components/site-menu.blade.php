@inject('site', 'App\Services\SiteService')
<nav class="menu">
    <ul class="mb-0 list-unstyled d-flex flex-column flex-lg-row align-items-lg-center gap-1 gap-lg-2">
        <x-site-menu-li routeLang="home" text="Home" menuActive="home" />
        <x-site-menu-li routeLang="company" text="Empresa" menuActive="company" />
        @if (app(Ellite\Blog\Services\BlogService::class)->hasPosts())
            <x-site-menu-li routeLang="blog" text="Blog" menuActive="blog" />
        @endif
        <x-site-menu-li routeLang="contact" text="Contato" menuActive="contact" />
        <li>
            <x-languages-flags />
        </li>
    </ul>
</nav>
