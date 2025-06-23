<link rel="stylesheet" href="css/app.css">
<div class="dasboard">
    <nav class="dasboard-nav-bar">
        <ul class="dasboard-nav-bar-ul">
            <li class="dasboard-nav-bar-ul-li">
                <a href="{{ route('task') }}" class="dasboard-nav-bar-ul-a">Tareas</a>
            </li>
            <li class="dasboard-nav-bar-ul-li">
                <a href="{{ route('task.completed') }}" class="dasboard-nav-bar-ul-a">Tareas Completadas</a>
            </li>

            @auth
                <!-- Menú desplegable para usuario autenticado -->
                <li class="dasboard-nav-bar-ul-li relative">
                    <button class="dasboard-nav-bar-ul-a focus:outline-none">
                        {{ Auth::user()->name }}
                    </button>
                    <ul class="absolute hidden bg-white shadow-md rounded mt-1 py-1 w-48">
                        <li>
                            <a href="{{ route('profile.edit') }}" class="block px-4 py-2 hover:bg-gray-100">
                                Perfil
                            </a>
                        </li>
                        <li>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="block w-full text-left px-4 py-2 hover:bg-gray-100">
                                    Cerrar Sesión
                                </button>
                            </form>
                        </li>
                    </ul>
                </li>
            @else
                <!-- Opciones para invitados -->
                <li class="dasboard-nav-bar-ul-li">
                    <a href="{{ route('register') }}" class="dasboard-nav-bar-ul-a">Registrarse</a>
                </li>
                <li class="dasboard-nav-bar-ul-li">
                    <a href="{{ route('login') }}" class="dasboard-nav-bar-ul-a">Acceder</a>
                </li>
            @endauth
        </ul>
    </nav>
</div>

<style>
    .relative:hover ul {
        display: block !important;
    }
</style>
