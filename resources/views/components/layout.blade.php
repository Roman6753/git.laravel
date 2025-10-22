<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }}</title>
    <script src="{{ asset('tailwindcss.js') }}"></script>
</head>
<body class="bg-gray-50 text-gray-800 font-sans">
    <header class="bg-white shadow-sm sticky top-0 z-10">
        <div class="container mx-auto px-4 py-3 flex justify-between items-center">
            <a href="{{ route('home') }}" class="text-xl font-bold text-blue-600">Logo</a>
            <nav class="hidden md:flex space-x-6">
                <a href="">dashboard</a>
            </nav>
            <ul class="flex space-x-4">

                @guest
                    <li>
                        <a href="{{ route('register') }}" class="px-4 py-2 rounded">
                            Register
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('login') }}" class="px-4 py-2 rounded">
                            Login
                        </a>
                    </li>
                @endguest
                @auth
                    <li>
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="px-4 py-2 rounded">
                            Exit
                            </button>
                        </form>
                    </li>
                @endauth
            </ul>
        </div>
    </header>

    <main class="container mx-auto px-4 py-8">
        {{ $slot }}
    </main>

    <footer class="bg-gray-100 mt-12 py-6 text-center text-sm text-gray-500">
       footer
    </footer>
</body>
</html>
