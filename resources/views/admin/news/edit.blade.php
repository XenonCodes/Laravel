@extends('layouts.admin')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Edit the news</h1>
    </div>

    <div>
        @if($errors->any())
            @foreach($errors->all() as $error)
                <x-alert :message="$error" type="danger"></x-alert>
            @endforeach
        @endif
        <form method="post" action=" {{ route('admin.news.update', ['news' => $news]) }} ">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="category_id">Category</label>
                <select class="form-control" name="category_id" id="category_id">
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" @if($category->id === $news->category_id) selected @endif>{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="source_id">Source</label>
                <select class="form-control" name="source_id" id="source_id">
                    @foreach($sources as $source)
                        <option value="{{ $source->id }}" @if($source->id === $news->source_id) selected @endif>{{ $source->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" name="title" id="title" value=" {{ $news->title }} ">
                @error('title') <strong style="color:red; font-weight: bold">{{ $message }}</strong> @enderror
            </div>
            <div class="form-group">
                <label for="author">Author</label>
                <input type="text" class="form-control" name="author" id="author" value=" {{ $news->author }} ">
                @error('author') <strong style="color:red; font-weight: bold">{{ $message }}</strong> @enderror
            </div>
            <div class="form-group">
                <label for="image">Author</label>
                <input type="file" class="form-control" name="image" id="image">
            </div>
            <div class="form-group">
                <label for="status">Status</label>
                <select class="form-control" name="status" id="status">
                    <option @if($news->status === \App\Enums\News\Status::DRAFT->value) selected @endif>{{ \App\Enums\News\Status::DRAFT->value }}</option>
                    <option @if($news->status === \App\Enums\News\Status::ACTIVE->value) selected @endif>{{ \App\Enums\News\Status::ACTIVE->value }}</option>
                    <option @if($news->status === \App\Enums\News\Status::BLOCKED->value) selected @endif>{{ \App\Enums\News\Status::BLOCKED->value }}</option>
                </select>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" name="description" id="description"> {{ $news->description }} </textarea>
            </div>
            <br>
            <button type="submit" class="btn btn-success">Save</button>
        </form>
    </div>
@endsection
