@extends('admin.content.layout')

@section('content')
  <h1>Create a Page</h1>

  <form method="POST" action="/admin/content">
    {{ csrf_field() }}

    @include('admin.partials.errors')

    <div class="form-group">
      <label for="pageTitle">Page title</label>
      <input type="text" name="title" class="form-control" id="pageTitle" placeholder="Enter title" required>
    </div>
    <div class="form-group">
      <label for="pageBody">Page body</label>
      <textarea name="body" class="form-control" id="pageBody" rows="3" required></textarea>
    </div>
    <div class="form-group">
      <button type="submit" class="btn btn-primary">Submit</button>
    </div>
  </form>
@endsection