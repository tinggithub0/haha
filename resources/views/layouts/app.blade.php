<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Mom I'm Here!</title>
        <script src="https://cdn.tailwindcss.com"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css"/>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css" rel="stylesheet">
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>
    </head>
    <body class="bg-gray-200">
        <nav class="p-6 bg-white flex justify-between mb-6">
            <ul class="flex items-center">
                <li>
                    <a href="{{ route('home') }}" class="p-3">Home</a>
                </li>
                <li>
                    <a href="{{ route('todolist') }}" class="p-3">TodoList</a>
                </li>
                <li>
                    <a href="{{ route('message') }}" class="p-3">Message</a>
                </li>
            </ul>

            <ul class="flex items-center">
                @auth
                <li>
                    <a href="" class="p-3">{{ auth()->user()->username }}</a>
                </li>
                <li>
                    <form action="{{ route('logout') }}" method="post" class="p-3 inline">
                        @csrf
                        <button type="submit">Logout</button>
                    </form>
                </li>
                @endauth
                @guest
                <li>
                    <a href="{{ route('login') }}" class="p-3">Login</a>
                </li>
                <li>
                    <a href="{{ route('register') }}" class="p-3">Register</a>
                </li>
                @endguest
            </ul>
        </nav>
        @yield('content')
    </body>
</html>