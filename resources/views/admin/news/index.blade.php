@extends('layouts.admin')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">News list</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2">
                <a href="{{route('admin.news.create')}}" class="btn btn-sm btn-outline-secondary">Add news</a>
            </div>
        </div>
    </div>

    <div class="table-responsive">
        @include('inc.message')
        <span>Status Filter:</span>&nbsp;
        <select  id="filter">
            <option> {{ \App\Enums\News\Status::DRAFT->value }} </option>
            <option> {{ \App\Enums\News\Status::ACTIVE->value }} </option>
            <option> {{ \App\Enums\News\Status::BLOCKED->value }} </option>
        </select>&nbsp; <button class="btn small filter_btn">Ok</button>
        <table class="table table-striped table-sm">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Title</th>
                <th scope="col">Category</th>
                <th scope="col">Author</th>
                <th scope="col">Status</th>
                <th scope="col">Created at</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
                @forelse($newsList as $news)
                    <tr>
                        <td> {{ $news->id }}</td>
                        <td> {{ $news->title }}</td>
                        <td> {{ $news->category->name }}</td>
                        <td> {{ $news->author }}</td>
                        <td> {{ $news->status }}</td>
                        <td> {{ $news->created_at }}</td>
                        <td> <a href="{{ route('admin.news.edit', ['news' => $news]) }}">Edit</a> &nbsp;
                            <form action="{{ route('admin.news.destroy', ['news' => $news]) }}" method="post" class="d-inline">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-link">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6">No records found</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        {{ $newsList->links() }}
    </div>
@endsection
@push('js')
    <script>
        document.addEventListener("DOMContentLoaded", function (){
            document.querySelector(".filter_btn").addEventListener("click", function (){
                let filter = document.getElementById("filter").value;
                console.dir(filter);
                location.href = "?f=" + filter;
            });
        });
    </script>
@endpush
