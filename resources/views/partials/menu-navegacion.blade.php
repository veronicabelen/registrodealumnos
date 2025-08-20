<nav class="bg-gray-800 text-white p-4">
  <ul class="flex space-x-4">
    <li><a href="{{ route('dashboard') }}" class="hover:underline">Perfil</a></li>
    <li>
      <a href="{{ route('logout') }}"
        onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
        class="hover:underline">
        Cerrar sesión
      </a>
    </li>
  </ul>
  <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
    @csrf
  </form>
</nav>