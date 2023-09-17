<?php

namespace Ellite\Blog\Models;

use App\Ellite\ElliteModel;

class PostCategoryTranslation extends ElliteModel
{
    /**
    * The table associated with the model.
    *
    * @var string
    */
   protected $table = 'posts_categories_translations';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public $fillable = [
        'title',
        'slug',
        'description',
        'keywords',
    ];

    public $hasSlug = true;
}
