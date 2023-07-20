<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class CategoryController extends Controller
{
    public function index(): View
    {
        $categories = $this->getNewsCategories(); // Получить категории новостей

        return view('categories.index', [
            'categories' => $categories,
        ]);
    }

    public function show(int $id): View
    {
        return view('categories.show', [
            'categories' => $this->getNewsCategories($id),
            'newsList' => $this->getNews(),
        ]);
    }
}
