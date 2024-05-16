<!-- TODO: Make a Proper Hompage -->
<!DOCTYPE html>
<html>
    <head>
        <title>Home</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body>
        <div>
            <!-- Temporary "Nav-Bar" -->
            <ul>
                <li>Home</li>
                <li><a href="{{ route('destinations.index') }}">Destinations</a></li>
                
                @if (Auth::check())
                    <li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <a href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();">Logout</a>
                        </form>
                    </li>
                    <li>{{ Auth::getUser()->name }}</li>
                @else
                    <li><a href="{{ route('login') }}">Login</a></li>
                    <li><a href="{{ route('register') }}">Register</a></li>
                @endif
            

            </ul>
        </div>
        <div>
            <h1>Home</h1>
        </div>
    </body>

</html>