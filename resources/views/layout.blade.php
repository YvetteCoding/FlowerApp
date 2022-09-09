<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    @yield('css')
</head>

<body>
    <nav>
        <ul>
            <li>
                Home
            </li>
            <li>
                <a href="{{ url('/flowers') }}">Inventory</a>
            </li>
            <li>
                <a href="{{ url('/flowers/insert') }}">Insert new Flower</a>
            </li>
            <li>
                <a href="{{ url('/comments') }}">Comments</a>
            </li>
            <li>
                <a href="{{ url('/contact') }}">Contact</a>
            </li>

            @if (!Auth::check())
                <li>
                    <a href="{{ url('/login') }}">Login</a>
                </li>
                <li>
                    <a href="{{ url('/register') }}">Register</a>
                </li>
            @else
                <li>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <input type="submit" value="Logout">
                    </form>
                </li>
            @endif
        </ul>
    </nav>
    <div class="content">
        @yield('content')
    </div>

    @yield('js')
</body>

</html>
