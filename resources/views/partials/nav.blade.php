<nav>
    <ul>
        <li class="{{ setActive('home') }}"><a href="{{ route('home') }}">@lang('Home')</a></li>
        <li class="{{ setActive('about') }}"><a href="{{ route('about') }}">@lang('About')</a></li>
        <li class="{{ setActive('project.*') }}"><a href="{{ route('project.index') }}">@lang('Projects')</a></li>
        <li class="{{ setActive('contact') }}"><a href="{{ route('contact') }}">{{ __('Contact') }}</a></li>
        {{--Solo mostrá la opcion Login si no está autenticado(invitado)--}}
        @guest
         <li class="{{ setActive('login') }}"><a href="{{ route('login') }}">Login</a></li>
        @else
         <li>
            <a href="#" onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">Cerrar sesión</a>
         </li>
        @endguest

    </ul>
</nav>
<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
    @csrf
</form>
