@extends('admin.content.layout')

@section('content')
  <h1>Edit Page</h1>

  <form method="POST" action="/admin/content/{{ $content->id }}">
    {{ csrf_field() }}

    @include('admin.partials.errors')

    <div class="form-group">
      <label for="pageTitle">Page title</label>
      <input type="text" name="title" class="form-control" id="pageTitle" placeholder="Enter title" value="{{ $content->title }}" required>
    </div>
    <div class="form-group">
      <label for="pageBody">Page body</label>
      <textarea name="body" class="form-control" id="pageBody" rows="10" required>{{ $content->body }}</textarea>
    </div>
    <div class="form-group">
      <button type="submit" class="btn btn-primary">Submit</button>
      <a class="btn btn-danger float-right" role="button" href="/admin/content/{{ $content->id }}/delete">Delete</a>
    </div>
  </form>
@endsection