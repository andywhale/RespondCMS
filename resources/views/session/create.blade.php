@extends('layout')

@section('content')
  <h1>Login</h1>

  <form method="POST" action="/login">
    {{ csrf_field() }}

    @include('admin.partials.errors')

    <div class="form-group">
      <label for="email">Login</label>
      <input type="text" name="email" class="form-control" id="email" placeholder="Email" required>
    </div>
    <div class="form-group">
      <label for="password">Password</label>
      <input name="password" type="password" class="form-control" id="password" required>
    </div>
    <div class="form-group">
      <button type="submit" class="btn btn-primary">Submit</button>
    </div>
  </form>
@endsection