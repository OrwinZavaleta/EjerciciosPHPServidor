 {{-- <a href="{{ route('departs.index') }}">Departamentos</a>
 @auth
     <a href="{{ route('emples.index') }}">Empleados</a>
     <form method="POST" action="http://127.0.0.1:8000/logout" style="display: inline-block">
         @csrf
         <a href="http://127.0.0.1:8000/logout" onclick="event.preventDefault();this.closest('form').submit();">LogOut</a>
     </form>

     ({{ auth()->user()->name }})
     </a>
     <p>Autenticado</p>
 @else
     <a href="{{ route('login') }}">
         Log in
     </a>
     <a href="{{ route('register') }}">
         Register
     </a>
 @endauth
 --}}

 <nav class="navbar navbar-expand-lg bg-body-tertiary">
     <div class="container-fluid">
         <a class="navbar-brand" href="{{route("home")}}">Home</a>
         <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
             aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
             <span class="navbar-toggler-icon"></span>
         </button>
         <div class="collapse navbar-collapse" id="navbarNav">
             <ul class="navbar-nav">
                 <li class="nav-item">
                     <a href="{{ route('departs.index') }}" class="nav-link">Departamentos</a>
                 </li>
                 @auth

                     <li class="nav-item">
                         <a href="{{ route('emples.index') }}" class="nav-link">Empleados</a>
                     </li>
                     <li class="nav-item">
                         <form method="POST" action="http://127.0.0.1:8000/logout" style="display: inline-block">
                             @csrf
                             <a href="http://127.0.0.1:8000/logout"
                                 onclick="event.preventDefault();this.closest('form').submit();" class="nav-link">LogOut</a>
                         </form>
                     </li>
                     <li class="nav-item">
                         <span class="nav-link">({{ auth()->user()->name }})</span>
                     </li>
                 @else
                     <li class="nav-item">
                         <a href="{{ route('login') }}" class="nav-link">
                             Log in
                         </a>
                     </li>
                     <li class="nav-item">
                         <a href="{{ route('register') }}" class="nav-link">
                             Register
                         </a>
                     </li>
                 @endauth

             </ul>
         </div>
     </div>
 </nav>
