@extends('admin.layout')

@section('sidebar')
<nav class="col-sm-3 col-md-2 d-none d-sm-block bg-light sidebar">
  <ul class="nav nav-pills flex-column">
    <li class="nav-item">
      <a class="nav-link active" href="\admin\content">List <span class="sr-only">(current)</span></a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="\admin\content\Create">Create page</a>
    </li>
  </ul>
</nav>
@endsection