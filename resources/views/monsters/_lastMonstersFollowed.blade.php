<section class="mb-20">
        
    
    <!-- Section Derniers monstres -->
 <section class="mb-20">
  
  @if($follows->count() > 0)
  <h2 class="text-2xl font-bold mb-4 creepster">
      Derniers Monstres des créateurs suivis
  </h2>
@endif
   <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
     <!-- Monster Item -->
     @foreach ($follows as $follow )
     <article
       class="relative bg-gray-700 rounded-lg shadow-lg hover:shadow-2xl transition-shadow duration-300 monster-card"
       data-monster-type="{{$follow->name}}"
     >
       <img
         class="w-full h-48 object-cover rounded-t-lg"
         src="{{asset('images/'.$follow->image_url)}}"
         alt=""
       />
       <div class="p-4">
         <h3 class="text-xl font-bold">{{$follow->name}}</h3>
         <h4 class="mb-2">
           <a href="{{ route('users.show', [
            'user' => $follow->user->id,
            'slug' => \Illuminate\Support\Str::slug($follow->user->name, '-'),
        ]) }}" class="text-red-400 hover:underline"
             >{{$follow->user->name}}</a
           >
         </h4>
         <p class="text-gray-300 text-sm mb-2">
           {{$follow->description}}
         </p>
         <div class="flex justify-between items-center mb-2">
            <div class="mb-4">
                @php
                    $averageRating = $follow->notations->avg('notation');
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
            
           <span class="text-sm text-gray-300">Type: {{$follow->type->name}} </span>
         </div>
         <div class="flex justify-between items-center mb-4">
           <span class="text-sm text-gray-300">PV: {{$follow->pv}}</span>
           <span class="text-sm text-gray-300">Attaque: {{$follow->attack}}</span>
         </div>
         <div class="text-center">
           <a
             href="{{ route('monsters.show', [
                'monster' => $follow->id,
                'slug' => \Illuminate\Support\Str::slug($follow->name, '-'),
            ]) }}"
             class="inline-block text-white bg-red-500 hover:bg-red-700 rounded-full px-4 py-2 transition-colors duration-300"
             >Plus de détails</a
           >
         </div>
       </div>
       <div class="absolute top-4 right-4">
        <form action="{{ route('monsters.favorite', ['monsterId' => $follow->id]) }}" method="POST">
            @csrf
            <button type="submit" class="text-white rounded-full p-2 transition-colors duration-300
                {{in_array($follow->id, $favoriteMonsterId) ? 'bg-red-700 hover:bg-red-900' : 'bg-gray-400 hover:bg-red-700' }}"
                style="width: 40px; height: 40px; display: flex; justify-content: center; align-items: center;">
                <i class="fa fa-bookmark"></i>
            </button>
        </form>
    </div>
     </article>
     @endforeach
   </div>
 </section>
   

 </section>