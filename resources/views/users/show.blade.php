@extends('templates.index')

@section('title')
    {{ $user->name }}
@stop

@section('content')

    <section class="mb-20">
      <div
        class="bg-gray-700 rounded-lg shadow-lg monster-card"
      >
        <div class="md:flex">
          <!-- Image du monstre -->
          <div class="w-full md:w-1/2 relative">
            <img
              class="w-full h-full object-cover rounded-t-lg md:rounded-l-lg md:rounded-t-none"
              src="https://picsum.photos/200/50"
              alt="{{ $user->name }}"
            />
            
          </div>

          <div class="p-6 md:w-1/2 text-center">
            <h2 class="text-3xl  font-bold mb-2 ">
                {{ $user->name }}
            </h2>
            <p><span>{{ $user->email }}</span><br>
            <span>Utilisateur depuis : {{ $user->created_at->format('d-m-Y') }}</span></p>
          </div>
    </section>

    
@stop
