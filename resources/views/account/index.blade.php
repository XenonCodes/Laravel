@extends('layouts.main')
@section('content')
<div class="container">
    <div class="jumbotron">
        <h2>Welcome, {{ Auth::user()->name }}</h2>
        <p>Welcome to your account! Here you can manage your profile.</p>
        @if(Auth::user()->avatar !== null)
        <img src="{{ Auth::user()->avatar }}" style="width:250px; border-radius: 89px;">
        @endif
        @if(Auth::user()->is_admin === true)
        <a href="{{ route('admin.index') }}" class="btn btn-primary">Go to the admin panel</a>
        @endif
    </div>
</div>
@endsection