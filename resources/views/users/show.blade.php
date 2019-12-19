@extends('layouts.app')

@section('title', 'User')

@section('content')

<div class="row justify-content-center pt-3">
    <div class="col-auto">
        <table class="table table-borderless">
            <thead class="thead-light">
                <tr>
                    <th>Username</th>
                    <th>Display Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Signature</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    @if($user)
                    <td>{{$user->name}}</td>
                    <td>{{$user->display_name}}</td>
                    <td><a href="mailto:someone@example.com">{{$user->email}}</a></td>
                    <td>{{$user->permission_level}}</td>
                    @if($user->signature)
                        <td>{{$user->signature->signature}}</td>
                    @endif
                </tr>
            </tbody>
        </table>
        <form method="POST" action="{{ route('users.destroy', ['id' => $user->id]) }}">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger btn-lg" type="submit">Delete</button>
            </form>
            @else {{-- if user does not exist in database --}}
            <div class="row justify-content-center pt-3">
                    <p>{{__('User does not exist')}}</p>
                </div>
            @endif
            <p><a href="{{ route('users.index') }}" button class="btn btn-secondary" type="submit">Back</a></p>
    </div>
</div>                      

            {{-- <td><tr>
             <select name="thread">
                 @foreach ($user->threads as $thread)
                    <option value="{{ $thread }}"
                    @if($thread == old('thread', $thread->option))
                      selected = "selected"
                    @endif
                    >{{ $thread->name }}</option>

                 @endforeach
             </select>

            
            </td></tr> --}}
@endsection