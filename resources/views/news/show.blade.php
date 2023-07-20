@extends('layouts.main')
@section('content')
<h2>{{$news['title']}}</h2>
<p>Categories: {{$categories['name']}}</p>
<div>
    <img src="{{$news['img']}}">
    <p><em>{{$news['author']}}</em> &nbsp; ({{$news['created_at']}})</p>
    <p>{{$news['description']}}</p>
</div>
<hr>
@endsection
