<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="navbar-collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link text-white" aria-current="page" href="{{route('home')}}">Home</a>
        </li>
        @auth
        @endauth

        @guest
        @endguest
        
        @guest
        <li class="nav-item">
          <a class="nav-link text-white" aria-disabled="false" href="{{route('register')}}">Registrati</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" aria-disabled="false" href="{{route('login')}}">Accedi</a>
        </li>
         @endguest
         @auth
         <li class="nav-item">
          <a class="nav-link text-white" aria-disabled="false" href="#">Benvenuto {{Auth::user()->name}}</a>
        </li>
        <li class="nav-item">
          <form action="{{route('logout')}}" method="POST">
            @csrf
            <button type="submit" class="nav-link text-white">Logout</button>
          </form>
        </li>
        @endauth
      </ul>
    </div>
  </div>
</nav>