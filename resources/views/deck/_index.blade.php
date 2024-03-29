@extends('templates.index')

@section('title')
    My Deck
@stop

@section('content')
@php
$user = auth()->user(); 
$favorites = $user->favorites()->orderBy('monster_id', 'ASC')->get();
$favoriteMonsterId = $user->favorites()->pluck('monster_id')->toArray();
@endphp

    <div class="container mx-auto pt-4 pb-12">
        <h1 class="text-4xl font-bold creepster text-center mb-8">
            Mon Deck
        </h1>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            <!-- Monster Item -->
            @foreach ($favorites as $favorite)
                <article
                    class="relative bg-gray-700 rounded-lg shadow-lg hover:shadow-2xl transition-shadow duration-300 monster-card"
                    data-monster-type="{{ $favorite->monster->type->name }}">
                    <img class="w-full h-48 object-cover rounded-t-lg" src="{{asset('images/'.$favorite->monster->image_url)}}" alt="{{ $favorite->monster->name }}" />
                    <div class="p-4">
                        <h3 class="text-xl font-bold">{{ $favorite->monster->name }}</h3>
                        <h4 class="mb-2">
                            <a href="#" class="text-red-400 hover:underline">{{ $favorite->monster->user->name }}</a>
                        </h4>
                        <p class="text-gray-300 text-sm mb-2">
                            {{ $favorite->monster->description }}
                        </p>
                        <div class="flex justify-between items-center mb-2">
                            <div class="mb-4">
                                @php
                                    $averageRating = $favorite->monster->notations->avg('notation');
                                    $fullStars = floor($averageRating);
                                    $halfStar = round($averageRating - $fullStars, 1) >= 0.5;
                                @endphp
                            
                                @for ($i = 0; $i < $fullStars; $i++)
                                    <i class="fa fa-star text-yellow-400"></i>
                                @endfor
                            
                                @if ($halfStar)
                                    <i class="fa fa-star-half text-yellow-400"></i>
                                    @php $fullStars++; @endphp
                                @endif
                            
                                @for ($i = $fullStars; $i < 5; $i++)
                                    <i class="fa fa-star text-gray-300"></i>
                                @endfor
                            
                                <span class="text-gray-300 text-sm">({{ number_format($averageRating, 1) }}/5.0)</span>
                            </div>
                            <span class="text-sm text-gray-300">Type: {{ $favorite->monster->type->name }}</span>
                        </div>
                        <div class="flex justify-between items-center mb-4">
                            <span class="text-sm text-gray-300">PV: {{ $favorite->monster->pv }}</span>
                            <span class="text-sm text-gray-300">Attaque: {{ $favorite->monster->attack }}</span>
                        </div>
                        <div class="text-center">
                            <a href="{{ route('monsters.show', [
                                'monster' => $favorite->monster->id,
                                'slug' => \Illuminate\Support\Str::slug($favorite->monster->name, '-'),
                            ]) }}"
                                class="inline-block text-white bg-red-500 hover:bg-red-700 rounded-full px-4 py-2 transition-colors duration-300">Plus
                                de détails</a>
                        </div>
                    </div>
                    <div class="absolute top-4 right-4">
                        <form action="{{ route('monsters.favorite', ['monsterId' => $favorite->monster->id]) }}" method="POST">
                            @csrf
                            <button type="submit" class="text-white rounded-full p-2 transition-colors duration-300
                                {{in_array($favorite->monster->id, $favoriteMonsterId) ? 'bg-red-700 hover:bg-red-900' : 'bg-gray-400 hover:bg-red-700' }}"
                                style="width: 40px; height: 40px; display: flex; justify-content: center; align-items: center;">
                                <i class="fa fa-bookmark"></i>
                            </button>
                        </form>
                    </div>
                    
                </article>
            @endforeach


            <!-- Répétez pour d'autres monstres -->
        </div>
    </div>



@stop
