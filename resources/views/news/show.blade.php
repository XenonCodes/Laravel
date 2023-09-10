@extends('layouts.main')
@section('content')
<h2>{{$news->title}}</h2>
<p>Categories: {{$categories->name}}</p>
<div>
    @if(filter_var($news->image, FILTER_VALIDATE_URL))
        <img src="{{ $news->image }}" style="width:600px;">
    @else
        <img src="{{ Storage::disk('public')->url($news->image) }}" style="width:600px; height: 300px;">
    @endif
    <p><em>{{$news->author}}</em> &nbsp; ({{$news->created_at}})</p>
    <p>{{$news->description}}</p>
</div>
<hr>
@endsection
