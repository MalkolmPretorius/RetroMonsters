@extends('templates.index')

@section('title')
    Creators
@stop

@section('content')
    @php
        $users = \App\Models\User::orderBy('name', 'ASC')->paginate(9);
    @endphp
    @include('users._index', [
        'users' => $users,
    ])

    <div>{{ $users->links() }}</div>
@stop
