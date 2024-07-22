<header>
    <nav class="navbar bg-success border-bottom border-body" data-bs-theme="dark">
        <ul>
            @if (Session()->has('id'))
                
                <li><a href="{{route('incendios')}}">Inicio</a></li>
                <li><a href="{{route('newFire')}}">Añadir</a></li>
                <li><a href="{{route('endSession')}}">Cerrar Sesión</a></li>
        </ul>
        <h4 class="navbar-text">Bienvenido {{ App\Models\User::find(Session('id'))->user}}</h2>
            @else
            <li><a href="{{route('newUser')}}">Crear Usuario</a></li>
            <li><a href="{{route('login')}}">Iniciar Sesión</a></li>
        </ul>
            @endif
    </nav>
</header>