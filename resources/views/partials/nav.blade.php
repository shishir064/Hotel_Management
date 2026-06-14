<nav class="w-full mx-auto px-6 lg:px-20 py-4 flex items-center justify-between border-b  bg-white">

    <div class="flex items-center gap-12">
        <a href="{{ route('home') }}" class="text-2xl font-bold tracking-tight text-black">
            QuickStay
        </a>

        <div class="hidden md:flex items-center gap-8 text-sm font-semibold uppercase tracking-wide">
            <a href="{{ route('home') }}" class="text-gray-600 hover:text-black">Home</a>
            {{-- <a href="{{ route('show.hotel') }}" class="text-gray-600 hover:text-black">Hotels</a> --}}
            <a href="#" class="text-gray-600 hover:text-black">Experiences</a>
            <a href="#" class="text-gray-600 hover:text-black">About</a>
            @auth
                <a href="{{ route('dashboard') }}" class="text-gray-600 hover:text-black">Dashboard</a>
            @endauth
        </div>
    </div>

    @auth

        <div class="flex items-center gap-6">
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="px-5 py-2 bg-red-600 text-white rounded">
                    Logout
                </button>
            </form>
        </div>
    @endauth

    @guest
        <div class="flex items-center gap-6">
            <a href="{{ route('login.form') }}"
                class="px-6 py-2 rounded bg-black text-white text-sm font-semibold hover:text-gray-200">
                Login
            </a>
        </div>

    @endguest
</nav>
