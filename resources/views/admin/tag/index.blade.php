@extends('admin.tag.layout')

@section('content')
    <h1>Tags</h1>

    <table class="table table-striped">
      <thead>
        <tr>
          <th>#</th>
          <th>Tag</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        @foreach ($tags as $tag)
        <tr>
          <td>{{ $tag->id }}</td>
          <td>{{ $tag->name }}</td>
          <td><a href="/admin/tags/{{ $tag->slug }}/delete" class="btn btn-outline-danger btn-sm" role="button">Delete</a></td>
        </tr>
        @endforeach
      </tbody>
    </table>
@endsection