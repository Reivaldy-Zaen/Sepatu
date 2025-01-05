<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PT WIKRAMA JAYA</title>
    <link href="https://cdn.jsdelivr.net/npm/flowbite@1.6.6/dist/flowbite.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/flowbite@1.6.6/dist/flowbite.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-white-800">
    <!-- Navbar -->
    <nav class="bg-gray-700 text-white shadow">
        <div class="container mx-auto flex items-center justify-between p-4">
            <div class="text-xl font-semibold">
                PT WIKRAMA JAYA
            </div>
            <div class="flex space-x-4">
                @if (Auth::Check())
                    @if (Auth::user()->role == 'Admin')
                        <a href="{{ route('gudang.index') }}" class="text-gray-300 hover:text-gray-200">Kelola
                            Gudang</a>
                        <a href="{{ route('barang.index') }}" class="text-gray-300 hover:text-gray-200">Kelola
                            Barang</a>
                        <a href="{{ route('kelola_akun.data') }}" class="text-gray-300 hover:text-gray-200">Kelola
                            Akun</a>
                    @endif
                    <a href="{{ route('landing_page') }}" class="text-gray-300 hover:text-gray-200">Home</a>
                    <a href="{{ route('logout') }}" class="text-gray-300 hover:text-gray-200">Logout</a>
                @endif
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="container mx-auto p-6">
        @yield('content')
    </main>


</body>

</html>
