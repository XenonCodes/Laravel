<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class NewsController extends Controller
{
    public function index(): View
    {
        return  view('news.index', [
            'newsCategories' => $this->getNewsCategories(),
            'newsList' => $this->getNews(),
        ]);
    }

    public function show(int $id, int $categoriesID): View
    {
        return view('news.show', [
            'news' => $this->getNews($id),
            'categories' => $this->getNewsCategories($categoriesID)
        ]);
    }
}
