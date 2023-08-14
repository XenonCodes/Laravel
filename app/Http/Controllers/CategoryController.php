<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CategoryController extends Controller
{
    public function index(): View
    {
        $categories = app(Category::class);

        return view('categories.index', [
            'categories' => $categories->getAll(),
        ]);
    }

    public function show(int $id): View
    {
        $categories = app(Category::class);
        $news = News::where('category_id', $id)->get();

        return view('categories.show', [
            'categories' => $categories->getItemById($id),
            'newsList' => $news,
        ]);
    }
}
