<!-- resources/views/layouts/app.blade.php -->
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>HMIT UTS Landing Page</title>

    <!-- Google Fonts (opsional, Figtree adalah font default Laravel) -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Menggunakan Tailwind CSS dari CDN -->
    <script src="https://cdn.tailwindcss.com"></script> {{-- Perubahan di sini! --}}
</head>
<body class="font-sans antialiased text-gray-800 bg-gray-50">
    <div id="app">
        @yield('content')
    </div>
    @stack('scripts')
</body>
</html>
