<?php

declare(strict_types=1);

namespace Ellite\PageCompany\Orchid\Screens;

use Ellite\PageCompany\Models\PageCompany;
use Orchid\Support\Facades\Layout;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Quill;
use Orchid\Screen\Fields\TextArea;
use Illuminate\Http\Request;
use Orchid\Screen\Fields\Upload;
use App\Ellite\ElliteScreen;
use App\Orchid\Fields\TinyMCE;

class PageCompanyEditScreen extends ElliteScreen
{
    protected $model;

    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */
    public function query(PageCompany $model): iterable
    {
        $this->model = $model->firstOrNew();

        return [
            'model' => $this->model,
        ];
    }

    /**
     * The name of the screen displayed in the header.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return $this->model->exists ? "Editando página de empresa" : "Criando página de empresa";
    }

    /**
     * The screen's action buttons.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): iterable
    {
        return [
            parent::getSaveButton($this->model, true),
        ];
    }

    /**
     * The screen's layout elements.
     *
     * @return \Orchid\Screen\Layout[]|string[]
     */
    public function layout(): iterable
    {
        $language_fields = [];

        foreach (languages()->languages() as $language) {
            $locale = $language->locale;

            $fields = [
                Layout::rows([
                    Input::make("model.$locale.video")
                        ->title("URL do vídeo")
                        ->type('url')

                        ->value($this->model->translate($locale)?->video),
                    TinyMCE::make("model.$locale.text")
                        ->title("Descrição")
                        ->value($this->model->translate($locale)?->text)
                        ->height('230px'),

                    TinyMCE::make("model.$locale.text_mission")
                        ->title('Missão')
                        ->placeholder('Missão')
                        ->value($this->model->translate($locale)?->text_mission)
                        ->height('230px'),

                    TinyMCE::make("model.$locale.text_vision")
                        ->title('Visão')
                        ->placeholder('Visão')
                        ->value($this->model->translate($locale)?->text_vision)
                        ->height('230px'),

                    TinyMCE::make("model.$locale.text_values")
                        ->title('Valores')
                        ->placeholder('Valores')
                        ->value($this->model->translate($locale)?->text_values)
                        ->height('230px'),
                    
                    TextArea::make("model.$locale.keywords")
                        ->title('Palavras-chave (Google)')
                        ->placeholder('Palavras-chave (Google)')
                        ->value($this->model->translate($locale)?->keywords)
                        ->help(" Separe os valores usando vírgulas. Exemplo: nome do seu produto, nome do seu serviço")
                        ->popover('Palavras ou frases que descrevem seu produto ou serviço selecionadas para determinar quando e onde seu anúncio pode ser exibido. As palavras-chave que você escolhe são usadas para exibir seus anúncios para as pessoas.'),

                    TextArea::make("model.$locale.description")
                        ->title('Description (Google)')
                        ->placeholder('Description (Google)')
                        ->value($this->model->translate($locale)?->description)
                        ->help("Esse texto é exibido pelos resultados da pesquisa feita")
                        ->maxlength(160)
                        ->popover('Meta Description é o pequeno texto que aparece logo abaixo do título e do link de uma página quando se faz uma pesquisa no Google.'),
                    
                    Upload::make('model.attachment')
                        ->groups('image_page_company')
                        ->acceptedFiles("image/*")
                        ->maxFiles(10)
                        ->multiple(true)
                        ->resizeWidth(1280)
                        ->resizeHeight(1280)
                        ->set('data-upload-compress', "1")
                        ->maxFileSize(2)
                        ->title("Imagens")
                        ->help(screens()->getImageHelp('company'))
                        ->canSee($locale === 'pt-BR')
                        ->targetId(),
        
                    // Upload::make('model.attachment')
                    //     ->groups('image_page_company_gallery2')
                    //     ->acceptedFiles("image/*")
                    //     ->maxFiles(10)
                    //     ->multiple(true)
                    //     ->resizeWidth(1280)
                    //     ->resizeHeight(1280)
                    //     ->set('data-upload-compress', "1")
                    //     ->maxFileSize(2)
                    //     ->title("Imagens (Segunda galeria)")
                    //     ->help(screens()->getImageHelp('company'))
                    //     ->canSee($locale === 'pt-BR')
                    //     ->targetId(),
        
                    Upload::make('model.attachment')
                        ->groups('image_page_company_thumbnail')
                        ->acceptedFiles("image/*")
                        ->maxFiles(10)
                        ->multiple(true)
                        ->resizeWidth(1280)
                        ->resizeHeight(1280)
                        ->set('data-upload-compress', "1")
                        ->maxFileSize(2)
                        ->title("Thumbnail do vídeo")
                        ->help(screens()->getImageHelp('company'))
                        ->canSee($locale === 'pt-BR')
                        ->targetId(),
                ]),
            ];

            $language_fields[$language->name] = $fields;
        }

        $languages_panel = count($language_fields) > 1 ? Layout::tabs($language_fields) : array_values($language_fields)[0];

        return [
            $languages_panel,
        ];
    }

    public function save(PageCompany $model, Request $request)
    {
        $model = $model->firstOrNew();
        return parent::createOrUpdate($model, 'platform.pagescompanies.edit', []);
    }

    public static function routes()
    {
        parent::routeSingle('página de empresa', 'pagescompanies');
    }

    public static function permissions()
    {
        return parent::editPermission('página de empresa', 'pagescompanies');
    }
}
