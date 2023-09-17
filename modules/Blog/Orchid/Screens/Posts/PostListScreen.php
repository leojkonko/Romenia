<?php

namespace Ellite\Blog\Orchid\Screens\Posts;

use App\Ellite\ElliteModel;
use Ellite\Blog\Models\Post;
use Ellite\Blog\Models\PostCategory;
use Orchid\Support\Facades\Layout;
use Orchid\Screen\TD;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Actions\DropDown;
use App\Ellite\ElliteScreen;
use Orchid\Screen\Fields\CheckBox;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Group;
use Orchid\Screen\Fields\Select;
use Orchid\Support\Color;
use Orchid\Support\Facades\Toast;

class PostListScreen extends ElliteScreen
{
    protected $url_list = 'platform.posts.list';

    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */
    public function query(): iterable
    {
        return [
            'lista' => Post::orderByDesc('post_date')
                ->filters()
                ->paginate(),
        ];
    }

    /**
     * The name of the screen displayed in the header.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'Lista de artigos';
    }

    /**
     * The screen's action buttons.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): iterable
    {
        return [
            parent::getCreateLink('platform.posts.create'),
            parent::getRemoveSelectedButton(),
        ];
    }

    /**
     * The screen's layout elements.
     *
     * @return \Orchid\Screen\Layout[]|string[]
     */
    public function layout(): iterable
    {
        return [
            Layout::rows([
                Group::make([
                    Input::make('filter.name')
                        ->type('text')
                        ->title("Nome")
                        ->value(request()->input('filter.name', '')),

                    Select::make('filter.categories')
                        ->title("Categoria do artigo")
                        ->fromModel(PostCategory::class, 'name', 'id')
                        ->empty(mb_chr(160), '')
                        ->value(request()->input('filter.categories')),

                    Input::make('filter.post_date.start')
                        ->type('date')
                        ->title("Data inicial")
                        ->value(request()->input('filter.post_date.start', '')),

                    Input::make('filter.post_date.end')
                        ->type('date')
                        ->title("Data final")
                        ->value(request()->input('filter.post_date.end', '')),
                ]),

                Group::make([
                    Button::make('Buscar')
                        ->method('searchRedirect')
                        ->icon('magnifier')
                        ->class('btn btn-default btn-primary'),

                    Button::make('Limpar filtros')
                        ->type(Color::LINK())
                        ->method('removeFilters')
                        ->icon('cross')
                        ->canSee($this->hasFilters()),
                ])->autoWidth(),

            ])->title('Filtrar artigos'),

            Layout::table('lista', [
                TD::make('checkbox', CheckBox::make('select-all')->class("form-check-input select-all-report-checks"))->checkbox(),
                TD::make("name", "Nome"), //->filter(Input::make()),
                TD::make("post_date", "Data")->render(fn ($e) => $e->post_date?->format('d/m/Y')), // ->filter(DateRange::make()),
                TD::make("categories", "Categoria")->relationsBadge("primary"),
                TD::make("active", "Ativo")->toggleActive('posts'),
                TD::make(__('Actions'))
                    ->align(TD::ALIGN_CENTER)
                    ->width('100px')
                    ->render(fn (Post $model) => DropDown::make()
                        ->icon('options-vertical')
                        ->list([
                            parent::getEditButton($model, 'platform.posts.edit', true),
                            parent::getDuplicateteButton($model, 'platform.posts.edit', true),
                            parent::getRemoveButton($model, true),
                        ])),
            ])->title('Lista de artigos'),
        ];
    }

    public function remove(Post $model)
    {
        return parent::delete($model, 'platform.posts.list');
    }

    public function removeAll()
    {
        $ids = request()->input('select-all');
        $count = count($ids);

        foreach ($ids as $id) {
            $model = Post::where('id', $id);
            parent::delete($model->first(), '', true);
        }

        Toast::info(
            "$count artigos apagados"
        );

        return redirect()->route('platform.posts.list');
    }

    public static function routes()
    {
        parent::routeList('artigos', 'posts');
    }

    public static function permissions()
    {
        return parent::crudPermissions('artigos', 'posts');
    }

    public static function metricsQuery()
    {
        return [
            'posts' => Post::count(),
        ];
    }

    public static function metricsLayout()
    {
        return [
            'Total de artigos' => 'metrics.posts',
        ];
    }
}
