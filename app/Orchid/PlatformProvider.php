<?php

declare(strict_types=1);

namespace App\Orchid;

use Orchid\Platform\Dashboard;
use Orchid\Platform\ItemPermission;
use Orchid\Platform\OrchidServiceProvider;
use Orchid\Screen\Actions\Menu;

class PlatformProvider extends OrchidServiceProvider
{
    /**
     * @param Dashboard $dashboard
     */
    public function boot(Dashboard $dashboard): void
    {
        parent::boot($dashboard);

        // ...
    }

    /**
     * @return Menu[]
     */
    public function registerMainMenu(): array
    {
        return [
            Menu::make('DashBoard')
                ->icon('bar-chart')
                ->route('platform.main'),

            Menu::make('Página Home')
                ->icon('menu')
                ->permission([
                    'platform.banners.list',
                    'platform.differentials.list',
                    'platform.brands.list',
                    'platform.pageshome.list',
                    'platform.pageshome.edit',
                ])
                ->list([
                    Menu::make('Banners')
                        ->route('platform.banners.list')
                        ->permission('platform.banners.list'),

                    Menu::make('Conteúdo e SEO')
                        ->route('platform.pageshome.edit')
                        ->permission('platform.pageshome.edit'),
                ]),

            Menu::make('Empresa')
                ->icon('building')
                ->route('platform.pagescompanies.edit')
                ->permission('platform.pagescompanies.edit'),

            Menu::make('Blog')
                ->icon('note')
                ->permission([
                    'platform.posts.list', 'platform.postscategories.list',
                    'platform.pagesblog.edit',
                ])
                ->list([
                    Menu::make('Artigos')
                        ->route('platform.posts.list')
                        ->permission('platform.posts.list'),
                    Menu::make('Categorias')
                        ->route('platform.postscategories.list')
                        ->permission('platform.postscategories.list'),
                    Menu::make('Conteúdo e SEO')
                        ->route('platform.pagesblog.edit')
                        ->permission('platform.pagesblog.edit'),

                ]),

            Menu::make('Contato')
                ->icon('bubbles')
                ->permission([
                    'platform.siteemails.list', 'platform.pagescontact.edit',
                ])
                ->list([
                    Menu::make('Mensagens Recebidas')
                        ->route('platform.siteemails.list')
                        ->permission('platform.siteemails.list'),

                    Menu::make('Conteúdo')
                        ->route('platform.pagescontact.edit')
                        ->permission('platform.pagescontact.edit'),
                ]),

            Menu::make('Política de privacidade')
                ->icon('shield')
                ->route('platform.pagesprivacy.edit')
                ->permission('platform.pagesprivacy.edit'),

            Menu::make('Administração')
                ->icon('settings')
                ->permission([
                    'platform.configurations.edit', 'platform.systems.users',
                    'platform.systems.roles', 'platform.systems.logs',
                ])
                ->list([
                    Menu::make("Configurações")
                        ->route('platform.configurations.edit')
                        ->permission('platform.configurations.edit'),

                    Menu::make(__('Users'))
                        ->route('platform.systems.users')
                        ->permission('platform.systems.users'),

                    Menu::make(__('Níveis'))
                        ->route('platform.systems.roles')
                        ->permission('platform.systems.roles'),

                    Menu::make("Logs")
                        ->route('platform.systems.logs')
                        ->permission('platform.systems.logs'),
                ]),

        ];
    }

    /**
     * @return Menu[]
     */
    public function registerProfileMenu(): array
    {
        return [
            Menu::make(__('Profile'))
                ->route('platform.profile')
                ->icon('user'),
        ];
    }

    /**
     * @return ItemPermission[]
     */
    public function registerPermissions(): array
    {
        $permissions = [
            ItemPermission::group(__('System'))
                ->addPermission('platform.systems.roles', __('Roles'))
                ->addPermission('platform.systems.users', __('Users'))
                ->addPermission('platform.systems.logs', __('Logs')),
        ];

        foreach (screens()->permissions() as $permission) {
            $permissions[] = $permission;
        }

        return $permissions;
    }
}
