@extends('layouts.admin')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Edit the orders</h1>
    </div>

    <div>
        @if($errors->any())
            @foreach($errors->all() as $error)
                <x-alert :message="$error" type="danger"></x-alert>
            @endforeach
        @endif
        <form method="post" action=" {{ route('admin.orders.update', ['order' => $order]) }} ">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" name="name" id="name" value="{{ $order->name }}">
            </div>
            <br>
            <label for="phone">Phone number:</label>
            <input type="tel" class="form-control" name="phone" id="phone" value="{{ $order->phone }}">
            <br>
            <label for="email">Email address:</label>
            <input type="email" class="form-control" name="email" id="email" value="{{ $order->email }}">
            <br>
            <label for="information">What do you want to get:</label>
            <textarea name="information" class="form-control" id="information">{{ $order->information }}</textarea>
            <br>
            <button type="submit" class="btn btn-success">Save</button>
        </form>
    </div>
@endsection
