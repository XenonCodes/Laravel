@extends('layouts.admin')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Order list</h1>
    </div>

    <div class="table-responsive">
        @include('inc.message')
        <table class="table table-striped table-sm">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">name</th>
                <th scope="col">phone</th>
                <th scope="col">email</th>
                <th scope="col">information</th>
                <th scope="col">Created at</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
                @forelse($orders as $order)
                    <tr>
                        <td> {{ $order->id }}</td>
                        <td> {{ $order->name }}</td>
                        <td> {{ $order->phone }}</td>
                        <td> {{ $order->email }}</td>
                        <td> {{ $order->information }}</td>
                        <td> {{ $order->created_at }}</td>
                        <td> <a href="{{ route('admin.orders.edit', ['order' => $order]) }}">Edit</a> &nbsp;
                            <form action="{{ route('admin.orders.destroy', ['order' => $order]) }}" method="post" class="d-inline">
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
