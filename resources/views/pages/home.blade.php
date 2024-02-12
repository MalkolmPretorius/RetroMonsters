@extends('templates.index')

@section('title')
    Home page
@stop

@section('content')

@php
$user = auth()->user();
if($user){
$favorites = $user->favorites()->orderBy('monster_id', 'ASC')->get();
$favoriteMonsterId = $user->favorites()->pluck('monster_id')->toArray();
}
else{
    $favoriteMonsterId = [];
}
 

@endphp

    @include('monsters._randomMonster', [
        'monsters' => \App\Models\Monster::inRandomOrder()->limit(1)->get(),
        'favoriteMonsterId' => $favoriteMonsterId,
    ])
    @include('monsters._lastMonsters', [
        'monsters' => \App\Models\Monster::orderBy('created_at', 'DESC')->limit(3)->get(),
        'favoriteMonsterId' => $favoriteMonsterId,
    ])
    @auth
    @php
    $user = auth()->user(); 
    @endphp

    
    
    @include('monsters._lastMonstersFollowed', [
        'follows' => $user->following()->orderBy('following_id', 'ASC')->limit(6)->get(),
        'favoriteMonsterId' => $favoriteMonsterId,
    ])
    @endauth
    
@stop
