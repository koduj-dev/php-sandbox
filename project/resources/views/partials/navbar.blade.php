<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="{{ route('app.entry') }}">LarApka</a>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">

        @auth
          <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('app.dashboard') ? 'active text-danger' : '' }}" href="{{ route('app.dashboard') }}">Home</a>
          </li>
          @role('TODO')
          <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('todos.*') ? 'active text-danger' : '' }}" href="{{ route('todos.index') }}">Todo list</a>
          </li>
          @endrole
        @endauth

        <li class="nav-item">
          <a class="nav-link {{ request()->routeIs('authors.*') ? 'active text-danger' : '' }}" href="{{ route('authors.index') }}">Authoři</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ request()->routeIs('books.*') ? 'active text-danger' : '' }}" href="{{ route('books.index') }}">Knihy</a>
        </li>
      </ul>

      @auth
        <form class="d-flex gap-2" role="search" action="{{ route('logout') }}" method="POST">
          @csrf

          <a href="{{ route('profile.edit') }}" class="btn btn-primary border border-dark btn-sm">Profile</a>
          <button class="btn border border-dark btn-danger btn-sm" type="submit">Odhlásit</button>
        </form>
      @else
        <div class="d-flex gap-2" role="search">
          <a href="{{ route('login') }}" class="btn border border-dark btn-success btn-sm">Přihlášení</a>
          <a href="{{ route('register') }}" class="btn border border-dark btn-warning btn-sm">Registrace</a>
        </div>
      @endauth
    </div>

  </div>
</nav>
