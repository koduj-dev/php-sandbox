<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Navbar</a>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ request()->routeIs('todos.*') ? 'active text-danger' : '' }}" href="{{ route('todos.index') }}">Todo list</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ request()->routeIs('authors.*') ? 'active' : '' }}" href="{{ route('authors.index') }}">Authoři</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ request()->routeIs('books.*') ? 'active' : '' }}" href="{{ route('books.index') }}">Knihy</a>
        </li>
      </ul>
    </div>

  </div>
</nav>