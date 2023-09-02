@extends('layouts.admin')
@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Edit the User</h1>
</div>

<div>
    @if($errors->any())
    @foreach($errors->all() as $error)
    <x-alert :message="$error" type="danger"></x-alert>
    @endforeach
    @endif
    <form method="post" action=" {{route('admin.users.update', ['user' => $user])}} ">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" name="name" id="name" value=" {{ $user->name }} ">
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" name="email" id="email" value=" {{ $user->email }} ">
        </div>
        <div class="form-group">
            <label for="is_admin">Is admin</label><br>
            <label>
                <input type="radio" name="is_admin" value="1" {{ $user->is_admin == 1 ? 'checked' : '' }}>
                Yes
            </label>
            <label>
                <input type="radio" name="is_admin" value="0" {{ $user->is_admin == 0 ? 'checked' : '' }}>
                No
            </label>
        </div>
        <br>
        <button type="submit" class="btn btn-success">Save</button>
    </form>
</div>
@endsection