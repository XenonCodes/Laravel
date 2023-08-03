<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\View\View;

class NewsController extends Controller
{
    public function index(): View
    {
        $categories = app(Category::class);
        $news = app(News::class);

        //dd($news->getAll());

        return  view('news.index', [
            'newsCategories' => $categories->getAll(),
            'newsList' => $news->getAll(),
        ]);
    }

    public function show(int $id, int $categoriesID): View
    {
        $categories = app(Category::class);
        $news = app(News::class);

        return view('news.show', [
            'news' => $news->getItemById($id),
            'categories' => $categories->getItemById($categoriesID),
        ]);
    }
}
