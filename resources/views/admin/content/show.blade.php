@extends('admin.content.layout')

@section('content')
    <h1>Edit {{ $content->title }}</h1>

    <textarea class="form-control" name="body" rows="3">{{ $content->body }}</textarea>
@endsection
