@extends('layouts.main')

@section('content')

<main class="form-signin w-50 m-auto">
    @if(session('success'))
    <p class="alert alert-success">{{ session('success') }}</p>
    @endif
    @if($errors->any())
    @foreach($errors->all() as $error)
    <p class="alert alert-danger">{{ $error }}</p>
    @endforeach
    @endif
  <form method="post" action="{{ route('login') }}">
    @csrf
    <h1 class="h3 mb-3 fw-normal">Please Log In</h1>
    <div class="form-floating">
      <label>Email address<span class="text-danger">*</span></label>
      <input type="email" class="form-control mb-3" id="email" name="email" placeholder="name@example.com">
    </div>
    <div class="form-floating">
      <label>Password<span class="text-danger">*</span></label>
      <input type="password" class="form-control mb-3" id="password" name="password" placeholder="Password">
    </div>
    <button class="w-100 btn btn-lg btn-primary" type="submit">Log In</button>
    <a href="/register">No account? Make one!</a>
  </form>
</main>
@endsection