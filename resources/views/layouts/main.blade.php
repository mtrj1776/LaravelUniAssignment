<!DOCTYPE html>
<html lang='en'>
    <head>
            <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
    </head>
    <body>
        @if (session('message'))
            <p><b>{{ session('message') }}</b></p>
        @endif


        @if ($errors->any())
            <div>
                Errors:
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div>
            <h3><a href="{{ route('threads.index')}}">Threads</a></h3>
            <h3><a href="{{ route('users.index')}}">Users</a></h3>
            <h3><a href="{{ route('tags.index')}}">Tags</a></h3>
            {{-- <h3>Likes</h3> --}}
            {{-- <h3>Last Updated</h3> --}}
        </div>
        @yield('content')
    </body>
    <footer>
    </footer>
</html>