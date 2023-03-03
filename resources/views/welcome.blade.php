@extends('layouts.main')
@section('content')
<div class="container-fluid text-center" style="height:100%;">
    @guest
    <h1>Welcome, guest</h1>
    @endguest
    @auth
    <h1>Welcome back, {{ Auth::user()->name }}</h1>
    @endauth
</div>
@endsection