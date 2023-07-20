@extends('layouts.main')
@section('content')

    <h1>Welcome to News Aggregator</h1>
    <p>This is a future news aggregator website.</p>
    <a href="{{route('news.index')}}" class="btn btn-primary btn-lg px-4 gap-3 mb-2">News</a>
    <br>
    <a href="{{route('categories.index')}}" class="btn btn-primary btn-lg px-4 gap-3">News Categories</a>

@endsection
