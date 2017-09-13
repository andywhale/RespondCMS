@extends('admin.content.layout')

@section('content')
  <h1>Edit Page</h1>

  <form method="POST" action="/admin/content/{{ $content->slug }}">
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
      <label>Page tags</label>
      @foreach ($tags as $tag_id => $tag)
      <div class="form-check">
        <label class="form-check-label">
          <input class="form-check-input" type="checkbox" name="tags[]" 
          @if ($content->tags()->where('id', $tag_id)->exists())
            checked="checked"
          @endif
          value="{{ $tag_id }}">
          {{ $tag }}
        </label>
      </div>
      @endforeach
    </div>
    <div class="form-group">
      <button type="submit" class="btn btn-primary">Submit</button>
      <a class="btn btn-danger float-right" role="button" href="/admin/content/{{ $content->slug }}/delete">Delete</a>
    </div>
  </form>
@endsection