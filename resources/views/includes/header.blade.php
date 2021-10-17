<header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
          
          <div class="collapse navbar-collapse d-flex justify-content-between" id="navbarNav">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" aria-current="page" href="{{route('home')}}">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link {{ request()->is('comics') ? 'active' : '' }}" href="{{url('/comics')}}">Comics</a>
              </li>
              <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('comics.create') ? 'active' : '' }}" href="{{route('comics.create')}}">New Comic</a>
              </li>
            </ul>
           
           
          </div>
        </div>
      </nav>
</header>