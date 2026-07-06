<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title')</title>

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css2?family=Libre+Caslon+Text:wght@400;700&family=Hanken+Grotesk:wght@400;500;600&display=swap"
        rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/daisyui@5" rel="stylesheet" type="text/css" />
    
    <!-- Material Icons -->
    <link
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap"
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
    @if(session('success'))
<script>
document.addEventListener('DOMContentLoaded', function () {
    Swal.fire({
        toast: true,
        position: 'top-end',
        icon: 'success',
        title: "{{ session('success') }}",
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true
    });
});
</script>
@endif

    <!-- Navbar -->
    <header class="sticky top-0 z-50 left-0 w-full  bg-white/80 glass-nav">
        @include('partials.nav')
    </header>

    @yield('content')

    <!-- Footer -->
    @include('partials.footer')

</body>

</html>