@extends('layout')

@section('content')
  <h1>Register</h1>

  <form method="POST" action="/register">
    {{ csrf_field() }}

    @include('admin.partials.errors')

    <div class="form-group">
      <label for="email">E-mail</label>
      <input type="text" name="email" class="form-control" id="email" placeholder="E-mail address" required>
    </div>
    <div class="form-group">
      <label for="name">Name</label>
      <input type="text" name="name" class="form-control" id="name" placeholder="Full name" required>
    </div>
    <div class="form-group">
      <label for="password">Password</label>
      <input name="password" type="password" class="form-control" id="password" required>
    </div>
    <div class="form-group">
      <label for="password_confirmation">Password confirmation</label>
      <input name="password_confirmation" type="password" class="form-control" id="password_confirmation" required>
    </div>
    <div class="form-group">
      <button type="submit" class="btn btn-primary">Submit</button>
    </div>
  </form>
@endsection