 <a href="{{ route('departs.index') }}">Departamentos</a>
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
