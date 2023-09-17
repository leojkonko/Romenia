<?php

namespace App\Http\Controllers;

use App\Services\SiteService;
use Ellite\Blog\Services\BlogService;

class BlogController extends Controller
{
    public function index(SiteService $site, BlogService $blog, $category = null)
    {
        $site
            ->setAlternates('blog')
            ->setMenuActive('blog')
            ->pushBreadCrumb('Blog')
            ->setBreadTitle('Blog')
            ->setTitle('Blog')
            ->setDescriptionIfNotEmpty($blog->getPage()->description)
            ->setKeywordsIfNotEmpty($blog->getPage()->keywords);

        if ($category) {
            $category = $blog->getPostCategory($category);

            $site
                ->setAlternates('blog',
                    fn($language) => ['category' => $category->translateOrDefault($language->locale)->slug]
                )
                ->pushBreadCrumb($category->title)
                ->setBreadTitle($category->title)
                ->setTitle($category->title)
                ->setDescriptionIfNotEmpty($category->description)
                ->setKeywordsIfNotEmpty($category->keywords);
        }

        $posts = $blog->getPosts(
            quantity: 12,
            category: $category,
        );

        // necessário para a paginação manter os parâmetros GET
        $posts->appends(request()->input());

        $categories = $blog->getCategories();

        return view('front.pages.blog', [
            'posts' => $posts,
            'categories' => $categories,
            'current_category' => $category,
        ]);
    }

    public function details(SiteService $site, BlogService $blog, string $slug)
    {
        $site
            ->pushBreadCrumb('Blog', route_lang('blog'))
            ->setMenuActive('blog')
            ->setDescriptionIfNotEmpty($blog->getPage()->description)
            ->setKeywordsIfNotEmpty($blog->getPage()->keywords);

        $post = $blog->getPost($slug);

        $site
            ->setAlternates('blog.details', $post)
            ->setTitle($post->title)
            ->pushBreadCrumb($post->short_title ?: $post->title)
            ->setBreadTitle($post->short_title ?: $post->title)
            ->setDescriptionIfNotEmpty($post->description)
            ->setKeywordsIfNotEmpty($post->keywords)
            ->setMetasSocials($post, $post->image, 'article');

        return view('front.pages.blog-details', [
            'post' => $post,
        ]);
    }
}
