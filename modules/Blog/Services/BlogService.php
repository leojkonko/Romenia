<?php

namespace Ellite\Blog\Services;

use Ellite\Blog\Models\Post;
use Ellite\Blog\Models\PageBlog;
use Ellite\Blog\Models\PostCategory;

class BlogService
{
    private $page;

    public function __construct()
    {
        $this->page = PageBlog::withTranslation()->firstOrCreate();
    }

    public function getPage()
    {
        return $this->page;
    }

    private function postQuery($with_translation = true)
    {
        $posts = Post::where('active', 1)
            ->where('post_date', '<=', now())
            ->with('categories', fn($q) => $q->where('posts_categories.active', 1));

        if ($with_translation) {
            $posts = $posts->withTranslation();
        }

        return $posts;
    }

    public function getPosts(
        int $quantity = 12,
        ?PostCategory $category = null,
    ) {
        $posts = $this->postQuery()->when($category, function ($q) use ($category) {
            $q->whereRelation('categories', 'posts_categories.id', $category->id);
        })->orderByDesc('post_date');

        $posts = $posts->paginate($quantity);

        return $posts;
    }

    public function getPost(string $slug)
    {
        // DB::enableQueryLog();

        $post = $this->postQuery()
            ->whereTranslation('slug', $slug);

        // dd(DB::getQueryLog());
        // DB::disableQueryLog();

        return $post->firstOrFail();
    }

    public function hasPosts()
    {
        return $this->postQuery(false)->count() > 0;
    }

    private function postCategoryQuery($with_translation = true)
    {
        $categories = PostCategory::where('active', 1);

        if ($with_translation) {
            $categories = $categories->withTranslation();
        }

        $categories->whereRelation('posts', 
            fn($q) => $q->where('posts.active', 1)->where('posts.post_date', '<=', now()),
        );

        // dd($categories->toSql());

        return $categories;
    }

    public function getCategories()
    {
        $categories = $this->postCategoryQuery(true);

        $categories->orderBy('order');

        return $categories;
    }
    
    public function getPostCategory(string $slug)
    {
        // DB::enableQueryLog();

        $category = $this->postCategoryQuery()
            ->whereTranslation('slug', $slug);

        // dd(DB::getQueryLog());
        // DB::disableQueryLog();

        return $category->firstOrFail();
    }
}
