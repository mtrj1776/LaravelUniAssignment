<!DOCTYPE html>
<html lang='en'>
    <head>
            <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
    </head>
    <body>
        <h3><a href="{{ route('threads.index')}}">Threads</a></h3>
        <h3><a href="{{ route('users.index')}}">Users</a></h3>
        {{-- <h3>Likes</h3> --}}
        {{-- <h3>Last Updated</h3> --}}

        @yield('content')
    </body>
    <footer>
    </footer>
</html>