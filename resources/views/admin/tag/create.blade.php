@extends('admin.tag.layout')

@section('content')
  <h1>Create a Tag</h1>

  <form method="POST" action="/admin/tag">
    {{ csrf_field() }}

    @include('admin.partials.errors')

    <div class="form-group">
      <label for="name">Tag name</label>
      <input type="text" name="name" class="form-control" id="name" placeholder="Tag name" required>
    </div>
    <div class="form-group">
      <button type="submit" class="btn btn-primary">Submit</button>
    </div>
  </form>
@endsection