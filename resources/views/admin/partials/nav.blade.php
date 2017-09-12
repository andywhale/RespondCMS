<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
  <a class="navbar-brand" href="\admin">Dashboard</a>
  <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarsExampleDefault">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item {{{ (Request::is('admin/content*')) ? 'active' : '' }}}">
        <a class="nav-link" href="\admin\content">Content</a>
      </li>
      <li class="nav-item {{{ (Request::is('admin/tags*')) ? 'active' : '' }}}">
        <a class="nav-link" href="\admin\tags">Tags</a>
      </li>
    </ul>

    @if (auth()->check())
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" href="\user">{{ auth()->user()->name }}</a>
      </li>
    </ul>
    @endif
  </div>
</nav>