<?php

namespace Ellite\Contact\Orchid\Screens\SiteEmails;

use Ellite\Contact\Models\SiteEmail;
use Orchid\Support\Facades\Layout;
use Orchid\Screen\TD;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Actions\DropDown;
use App\Ellite\ElliteScreen;
use Orchid\Screen\Fields\CheckBox;
use Orchid\Screen\Fields\Group;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Select;
use Orchid\Support\Color;
use Orchid\Support\Facades\Toast;

class SiteEmailsListScreen extends ElliteScreen
{
    protected $url_list = 'platform.siteemails.list';

    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */
    public function query(): iterable
    {
        return [
            'lista' => SiteEmail::orderByDesc('id')
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
        return 'Lista de mensagens do site';
    }

    /**
     * The screen's action buttons.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): iterable
    {
        return [
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
        $forms = SiteEmail::select([
            'form_name'
        ])->groupBy(['form_name'])->pluck('form_name', 'form_name');

        return [
            Layout::rows([
                Group::make([
                    Select::make('filter.form_name')
                        ->options($forms)
                        ->title('Formulário')
                        ->empty(mb_chr(160), '')
                        ->value(request()->input('filter.form_name')),

                    Input::make('filter.created_at.start')
                        ->type('date')
                        ->title("Data inicial")
                        ->value(request()->input('filter.created_at.start', '')),
                    
                    Input::make('filter.created_at.end')
                        ->type('date')
                        ->title("Data final")
                        ->value(request()->input('filter.created_at.end', '')),
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
                TD::make("form_name", "Formulário")/*->filter(
                    Select::make('form_name')
                        ->options($forms)
                        ->title('Formulário')
                )*/,
                TD::make("name", "Nome"),
                TD::make("email", "E-mail"),
                TD::make("phone", "Telefone"),
                TD::make("created_at", "Data")->render(fn($e) => $e->created_at?->format('d/m/Y H:i')), // ->filter(DateRange::make()),
                TD::make(__('Actions'))
                    ->align(TD::ALIGN_CENTER)
                    ->width('100px')
                    ->render(fn (SiteEmail $model) => DropDown::make()
                        ->icon('options-vertical')
                        ->list([
                            parent::getViewButton($model, 'platform.siteemails.view', true),
                            parent::getRemoveButton($model, true),
                        ])),
            ]),
        ];
    }
    
    public function remove(SiteEmail $model)
    {
        return parent::delete($model, 'platform.siteemails.list');
    }

    public function removeAll()
    {
        $ids = request()->input('select-all');
        $count = count($ids);

        foreach ($ids as $id) {
            $model = SiteEmail::where('id', $id);
            parent::delete($model->first(), '', true);
        }

        Toast::info(
            "$count mensagens apagadas"
        );

        return redirect()->route('platform.siteemails.list');
    }

    public static function routes()
    {
        parent::routeList('Mensagens do site', 'siteemails');
    }
    
    public static function permissions()
    {
        return parent::listViewDeletePermission('Mensagens do site', 'siteemails');
    }

    private static function metricsQueryCount(string $form_slug)
    {
        $query = SiteEmail::where('form_slug', $form_slug)
            // ->whereMonth('created_at', now()->format('m'))
            // ->whereYear('created_at', now()->format('y'))
            ->where('created_at', '>=', now()->subMonth(1))
            ;

        return $query->count();
    }
    
    public static function metricsQuery()
    {
        return [
            'contacts' => self::metricsQueryCount('contact'),
        ];
    }
    
    public static function metricsLayout()
    {
        return [
            'Contatos no último mês' => 'metrics.contacts',
        ];
    }
}
