## Fetch Authorized User

### Check if there is a current authorized session
```html
@if (Auth::check())

<!-- Show if authorized -->
...

@else

<!-- Show if not authorized -->
...

@endif
```

### Get current User model
```html
<p> {{ auth()->getUser() }} </p>
```

> Note: This will return the whole Model. The actual value you want needs to be specified.

### General example for a Login/Register/Logout
```html
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
```

## References used for this

1. How to use Blade: [https://laravel.com/docs/11.x/blade](https://laravel.com/docs/11.x/blade)
2. Sanctum/Auth: [https://laravel.com/docs/11.x/authentication](https://laravel.com/docs/11.x/authentication)
 