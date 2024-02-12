@extends('templates.index')

@section('title')
    Monsters
@stop

@section('content')
@php
$monsters = \App\Models\Monster::orderBy('name', 'ASC')->paginate(9);
$user = auth()->user();
if($user){
$favorites = $user->favorites()->orderBy('monster_id', 'ASC')->get();
$favoriteMonsterId = $user->favorites()->pluck('monster_id')->toArray();
}
else{
    $favoriteMonsterId = [];
}
 

@endphp

    @include('monsters._index', ['monsters' => $monsters, 'favoriteMonsterId' => $favoriteMonsterId])

    <div>{{ $monsters->links() }}</div>
@stop
