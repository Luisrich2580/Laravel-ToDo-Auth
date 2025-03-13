@extends('auth.layout.layouts')

@section('AuthContents')
    Hi there {{Auth::user()->name}}
    <form action="{{route('logout')}}" method="post">
        @csrf
        <button class="form-submit">LogOut</button>
    </form>
@endsection
