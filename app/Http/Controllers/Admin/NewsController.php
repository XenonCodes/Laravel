<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\News;
use App\Models\Source;
use Illuminate\Http\Request;
use Illuminate\View\View;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('admin.news.index', [
            'newsList' => News::query()->status()->with('category')->paginate(10),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $categories = Category::all();
        $sources = Source::all();

        return view( 'admin.news.create', [
            'categories' => $categories,
            'sources' => $sources,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
        ]);

        $data = $request->only(['category_id', 'source_id', 'title', 'author', 'status', 'description',]);

        $news = new News($data);

        if($news->save()) {
            return redirect()->route('admin.news.index')->with('success', 'The record was saved successfully');
        }

        return back()->with('error', 'Failed to add entry');
    }

    /**
     * Display the specified resource.
     */
    public function show(News $news)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(News $news)
    {
        $categories = Category::all();
        $sources = Source::all();

        return view( 'admin.news.edit', [
            'categories' => $categories,
            'sources' => $sources,
            'news' => $news,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, News $news)
    {
        $data = $request->only(['category_id', 'source_id', 'title', 'author', 'status', 'description',]);

        $news->fill($data);

        if($news->save()) {
            return redirect()->route('admin.news.index')->with('success', 'The record was saved successfully');
        }

        return back()->with('error', 'Failed to add entry');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(News $news)
    {
        if ($news->delete()) {
            return redirect()->route('admin.news.index')->with('success', 'The record was deleted successfully');
        }

        return back()->with('error', 'Record not found');
    }
}
