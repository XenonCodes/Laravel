@extends('layouts.main')
@section('content')

    <h1>News List</h1>
    @foreach($newsCategories as $category)
        <h2 style="margin-top: 50px;">{{$category->name}}</h2>
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">

        @forelse($newsList as $news)
            @if ($news->category_id === $category->id)
                <div class="col">
                    <div class="card shadow-sm">
                        <h4><a href="{{route('news.show', ['id' => $news->id,'categories_id' => $category->id])}}" class="btn btn-secondary my-2">{{$news->title}}</a></h4>
                        <img src="{{ Storage::disk('public')->url($news->image) }}" style="width:300px;">

                        <div class="card-body">
                            <p class="card-text">{{$news->description}}</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <a href="{{route('news.show', ['id' => $news->id,'categories_id' => $category->id])}}" class="btn btn-sm btn-outline-secondary">View</a>
                                </div>
                                <small class="text-muted"><em>{{$news->author}}</em> &nbsp; ({{$news->created_at}})</small>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
    @empty
        <h2>Новостей нет</h2>
    @endforelse
    </div>
    @endforeach

@endsection
