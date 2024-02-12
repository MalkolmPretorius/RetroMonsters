<!-- Header -->
<header class="bg-gray-900 shadow-lg relative top-8" x-data="{ open: false, loggedIn: true, userMenuOpen: false }">
    <nav class="container mx-auto px-4 py-4 mb-16 flex justify-between items-center">
        <div class="flex items-center">
            <a href="{{ route('pages.home') }}">
                <img src="{{asset('images/Logo_RetroMonsters.png')}}"alt="RetroMonsters Logo" class="h-32 mr-3 absolute"
                    style="top: -28px" />
            </a>
            <a href="{{ route('pages.home') }}" class="text-white font-bold text-xl hidden">RetroMonsters</a>
        </div>

        <button @click="open = !open" class="text-white md:hidden">
            <i class="fa fa-bars"></i>
        </button>

        <div class="hidden md:flex items-center">
            <a class="text-gray-300 hover:text-white px-3 py-2 hover:bg-gray-700"
                href="{{ route('monsters.index') }}">Monstres</a>
            <a class="text-gray-300 hover:text-white px-3 py-2 hover:bg-gray-700" href="{{ route('users.index') }}">Créateurs</a>
            @guest
                <a class="text-gray-300 hover:text-white px-3 py-2 hover:bg-gray-700" href="{{ route('dashboard') }}">Se
                    connecter</a>
            @endguest
            @auth
                <!-- Utilisation d'un bouton pour ouvrir le menu déroulant de l'utilisateur -->
                <div class="relative" x-data="{ userMenuOpen: false }">
                    <button @click="userMenuOpen = !userMenuOpen" class="text-white">
                        <img src="{{asset('images/user.webp')}}" alt="" class="w-16" />
                    </button>

                    <div x-show="userMenuOpen" @click.away="userMenuOpen = false"
                        class="absolute right-0 mt-2 w-48 bg-gray-100 rounded-md shadow-lg pb-1 z-50">
                        <div class="text-gray-200 px-4 py-2 bg-gray-400 text-center">
                            {{ Auth::user()->name }}
                        </div>
                        <a href="{{route('profile.edit')}}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-200">Mon Profil</a>
                        <a href="{{route('deck._index')}}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-200">Mon Deck</a>
                        <a href="{{ route('monsters.addMonsters') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-200">Ajouter un
                            Monstre</a>
                        <a href="{{ route('logout') }}"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                            class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-200">
                            Se Déconnecter
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>

                </div>
            </div>
        @endauth
    </nav>

    <!-- Menu pour mobile -->
    <div x-show="open" class="md:hidden p-8">
        <a class="block bg-gray-900 text-white px-4 py-2 hover:bg-gray-700"
            href="{{ route('monsters.index') }}">Monstres</a>
        <a class="block bg-gray-900 text-white px-4 py-2 hover:bg-gray-700" href="#">Créateurs</a>
        @guest
            <a class="block bg-gray-900 text-white px-4 py-2 hover:bg-gray-700" href="{{ route('dashboard') }}">Se connecter</a>
        @endguest
        @auth
            <a class="block bg-gray-900 text-white px-4 py-2 hover:bg-gray-700" href="{{route('profile.edit')}}">Mon Profil</a>
            <a class="block bg-gray-900 text-white px-4 py-2 hover:bg-gray-700" href="{{route('deck._index')}}">Mon Deck</a>
            <a class="block bg-gray-900 text-white px-4 py-2 hover:bg-gray-700" href="{{ route('monsters.addMonsters') }}">Ajouter un Monstre</a>
            <a class="block bg-gray-900 text-white px-4 py-2 hover:bg-gray-700" href="{{ route('logout') }}"
            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Se Déconnecter</a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        @endauth
    </div>
</header>
