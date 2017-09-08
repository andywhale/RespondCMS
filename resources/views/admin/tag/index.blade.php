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
          <td><a href="/admin/tag/{{ $tag->id }}" class="btn btn-outline-secondary btn-sm" role="button">Edit</a></td>
        </tr>
        @endforeach
      </tbody>
    </table>
@endsection