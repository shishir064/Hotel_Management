

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Personal Details</title>
    <link
        href="https://fonts.googleapis.com/css2?family=Libre+Caslon+Text:wght@400;700&family=Hanken+Grotesk:wght@400;500;600&display=swap"
        rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/daisyui@5" rel="stylesheet" type="text/css" />

    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap"
        rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        body {
            font-family: 'Hanken Grotesk', sans-serif;
            background: #f7f9fb;
            color: #191c1e;
            overflow-x: hidden;
        }

        h1,
        h2,
        h3,
        h4 {
            font-family: 'Libre Caslon Text', serif;
        }

        .glass-nav {
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
        }

        .editorial-shadow {
            box-shadow: 0 10px 30px -15px rgba(0, 0, 0, 0.1);
        }



        .material-symbols-outlined {
            font-variation-settings:
                'FILL' 0,
                'wght' 400,
                'GRAD' 0,
                'opsz' 24;
        }
    </style>
</head>

<body>

    <!-- Navbar -->
    <header class="sticky top-0 z-50 left-0 w-full  bg-white/80 glass-nav">
        @include('partials.nav')
    </header>
    <div class="bg-gray-100 min-h-screen">
        <div class="max-w-7xl mx-auto px-6 py-10 flex gap-6">

            <!-- Sidebar -->
            <aside
                class=" w-65 shrink-0 bg-white  rounded-lg border pt-2 border-gray-200 overflow-hidden h-fit align-self-start">
                <a class="flex items-center gap-3 px-3 py-5 text-sm cursor-pointer hover:bg-gray-100 {{ request()->routeIs('user.profile') ? 'bg-blue-50 text-blue-600 border-l-4 border-blue-600' : '' }}" href="{{ route('user.profile') }}">
                    <svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="1.8"
                        viewBox="0 0 24 24">
                        <circle cx="12" cy="8" r="4" />
                        <path d="M4 20c0-4 3.6-7 8-7s8 3 8 7" />
                    </svg>
                    Personal details
                </a>
                <a class="flex items-center gap-3 px-3 py-5 text-sm cursor-pointer hover:bg-gray-100 {{ request()->routeIs('user.security') ? 'bg-blue-50 text-blue-600 border-l-4 border-blue-600' : '' }}" href="{{ route('user.security') }}">
                    <svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="1.8"
                        viewBox="0 0 24 24">
                        <rect x="5" y="11" width="14" height="10" rx="2" />
                        <path d="M8 11V7a4 4 0 0 1 8 0v4" />
                    </svg>
                    Security settings
                </a>

            </aside>

            @yield('content')
        </div>
    </div>

    <!-- Footer -->
    @include('partials.footer')

</body>

</html>
