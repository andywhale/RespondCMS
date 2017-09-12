@extends('admin.layout')

@section('sidebar')
<nav class="col-sm-3 col-md-2 d-none d-sm-block bg-light sidebar">
  <ul class="nav nav-pills flex-column">
    <li class="nav-item">
      <a class="nav-link {{{ (Request::is('admin/content')) ? 'active' : '' }}}" href="\admin\content">List</a>
    </li>
    <li class="nav-item">
      <a class="nav-link {{{ (Request::is('admin/content/create')) ? 'active' : '' }}}" href="\admin\content\create">Create page</a>
    </li>
  </ul>
</nav>
@endsection