@extends('admin.content.layout')

@section('content')
    <h1>Content pages</h1>

    <table class="table table-striped">
      <thead>
        <tr>
          <th>#</th>
          <th>Title</th>
          <th>Author</th>
          <th>Published</th>
          <th>Updated</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        @foreach ($contents as $content)
        <tr>
          <td>{{ $content->id }}</td>
          <td>{{ $content->title }}</td>
          <td>{{ $content->user->name }}</td>
          <td>{{ $content->created_at->diffForHumans() }}</td>
          <td>{{ $content->updated_at->diffForHumans() }}</td>
          <td><a href="/admin/content/{{ $content->id }}" class="btn btn-outline-secondary btn-sm" role="button">Edit</a></td>
        </tr>
        @endforeach
      </tbody>
    </table>
@endsection