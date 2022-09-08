<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
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

            @if (!session()->exists('email'))
                <li>
                    <a href="{{ url('/login') }}">Login</a>
                </li>
            @else
                <li>
                    <a href="{{ url('/logout') }}">Logout</a>
                </li>
            @endif
        </ul>
    </nav>
    <div class="content">
        @yield('content')
    </div>
</body>

</html>
