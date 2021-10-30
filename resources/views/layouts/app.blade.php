<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>Posto</title>
</head>
<body class="bg-gray-100">
    <nav class="p-6 bg-white flex justify-between mb-6">
        <ul class="flex items-center">
            <li>
                <a href="/" class="p-3">Home</a>
            </li>
            <li>
                <a href="{{ route('dashboard') }}" class="p-3">Dashboard</a>
            </li>
            <li>
                <a href="{{ route('posts') }}" class="p-3">Post</a>
            </li>
        </ul>
        <ul class="flex items-center">
            
            {{-- check sign in status --}}
            {{-- 1. using blade if else statement with (auth()->user()) --}}
            {{-- 2. using @auth @guest --}}

            @auth
                <li>
                    <a href="" class="p-3">Zahinzul</a>
                </li>
                <li>
                    {{-- <a href="{{ route('logout') }}" class="p-3">Logout</a> --}}
                    <form action="{{ route('logout') }}" method="post" class="p-3 inline">
                        @csrf
                        <button type="submit">Logout</button>
                    </form>
                </li>
            @endauth
            
            @guest
                <li>
                    <a href="{{ route('register') }}" class="p-3">Register</a>
                </li>
                <li>
                    <a href="{{ route('login') }}" class="p-3">Login</a>
                </li>
            @endguest
            
        </ul>
    </nav>
    @yield('content')
</body>
</html>