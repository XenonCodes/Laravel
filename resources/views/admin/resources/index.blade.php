@extends('layouts.admin')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Resources list</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2">
                <a href="{{route('admin.resources.create')}}" class="btn btn-sm btn-outline-secondary">Add resources</a>
            </div>
        </div>
    </div>

    <div class="table-responsive">
        @include('inc.message')
        <table class="table table-striped table-sm">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">URL</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
                @forelse($resources as $resource)
                    <tr>
                        <td> {{ $resource->id }}</td>
                        <td> {{ $resource->name }}</td>
                        <td> {{ $resource->url }}</td>
                        <td> <a href="{{ route('admin.resources.edit', ['resource' => $resource]) }}">Edit</a>
                            <form action="{{ route('admin.resources.destroy', ['resource' => $resource]) }}" method="post" class="d-inline">
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
    </div>
@endsection
