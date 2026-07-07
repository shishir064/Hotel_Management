<nav class="w-full mx-auto px-6 lg:px-20 py-4 flex items-center justify-between border-b  bg-white">

    <div class="flex items-center gap-12">
        <a href="{{ route('home') }}" class="text-2xl font-bold tracking-tight text-black">
            QuickStay
        </a>

        <div class="hidden md:flex items-center gap-8 text-sm font-semibold uppercase tracking-wide">
            <a href="{{ route('home') }}" class="text-gray-600 hover:text-black">Home</a>
            <a href="{{ route('search.hotel') }}" class="text-gray-600 hover:text-black">Hotels</a>
            <a href="#" class="text-gray-600 hover:text-black">Experiences</a>
            <a href="{{ route('about.us') }}" class="text-gray-600 hover:text-black">About</a>
            {{-- @role('super admin')
                <a href="{{ route('dashboard') }}" class="text-gray-600 hover:text-black">Dashboard</a>
            @endrole --}}
        </div>
    </div>

    @auth

        <div class="flex items-center gap-6 border-amber-200 rounded">
            {{-- <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="px-5 py-2 bg-red-600 text-white rounded">
                    Logout
                </button>
            </form> --}}
            <div x-data="{ open: false }" class="relative" @mouseenter="if (window.innerWidth >= 768) open = true"
                @mouseleave="if (window.innerWidth >= 768) open = false">

                <!-- Profile Image -->
                <div class="flex items-center gap-2">
                    <img @click="if (window.innerWidth < 768) open = !open" 
                        src="{{ asset('storage/profilePic/profilePic.png') }}" alt="Profile"
                        class="w-10 h-10 rounded-full border-2 border-amber-200 cursor-pointer"
                        >
                        <span class="font-bold">Your Account</span>
                </div>
                <!-- Dropdown -->
                <div x-show="open" @click.away="open = false" x-transition
                    class="absolute right-0 mt-2 w-56 bg-white rounded-xl shadow-lg border z-50">

                    <div class="px-4 py-3 border-b">
                        <p class="font-semibold">{{ Auth::user()->name }}</p>
                        <p class="text-sm text-gray-500">{{ Auth::user()->email }}</p>
                    </div>

                    <a href="{{ route('user.profile') }}" class="block px-4 py-3 hover:bg-gray-100">
                        My Profile
                    </a>

                    <a href="{{ route('booking.my') }}" class="block px-4 py-3 hover:bg-gray-100">
                        My Bookings
                    </a>

                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="w-full text-left px-4 py-3 text-red-600 hover:bg-red-50">
                            Logout
                        </button>
                    </form>

                </div>
            </div>
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
