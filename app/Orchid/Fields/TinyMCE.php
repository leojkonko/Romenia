<?php

declare(strict_types=1);

namespace App\Orchid\Fields;

use Orchid\Screen\Field;
use Orchid\Support\Facades\Dashboard;

/**
 * Class TinyMCE.
 *
 * @method TinyMCE accesskey($value = true)
 * @method TinyMCE autocomplete($value = true)
 * @method TinyMCE autofocus($value = true)
 * @method TinyMCE disabled($value = true)
 * @method TinyMCE form($value = true)
 * @method TinyMCE formaction($value = true)
 * @method TinyMCE formenctype($value = true)
 * @method TinyMCE formmethod($value = true)
 * @method TinyMCE formnovalidate($value = true)
 * @method TinyMCE formtarget($value = true)
 * @method TinyMCE name(string $value = null)
 * @method TinyMCE placeholder(string $value = null)
 * @method TinyMCE readonly($value = true)
 * @method TinyMCE required(bool $value = true)
 * @method TinyMCE tabindex($value = true)
 * @method TinyMCE value($value = true)
 * @method TinyMCE theme(string $theme = null)
 * @method TinyMCE help(string $value = null)
 * @method TinyMCE popover(string $value = null)
 * @method TinyMCE height($value = '300px')
 * @method TinyMCE title(string $value = null)
 * @method TinyMCE configExt($value = null)
 * @method TinyMCE language(string $language = null)
 */
class TinyMCE extends Field
{
    /**
     * @var string
     */
    protected $view = 'platform::fields.tinymce';

    /**
     * All attributes that are available to the field.
     *
     * @var array
     */
    protected $attributes = [
        'value'  => null,
        'height' => '350',
    ];

    /**
     * Attributes available for a particular tag.
     *
     * @var array
     */
    protected $inlineAttributes = [
        'accept',
        'accesskey',
        'autocomplete',
        'autofocus',
        'checked',
        'disabled',
        'form',
        'formaction',
        'formenctype',
        'formmethod',
        'formnovalidate',
        'formtarget',
        'list',
        'max',
        'maxlength',
        'min',
        'name',
        'pattern',
        'placeholder',
        'readonly',
        'required',
        'size',
        'src',
        'step',
        'tabindex',
        'type',
        'value',
        'height',
    ];
}
