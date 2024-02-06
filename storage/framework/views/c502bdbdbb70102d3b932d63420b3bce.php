<!-- Section Monstre Aléatoire -->
<section class="mb-20">
  <h2 class="text-2xl font-bold mb-4 creepster">
   Un monstre aléatoire
  </h2>
    <?php $__currentLoopData = $monsters; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $monster): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div
      class="bg-gray-700 rounded-lg shadow-lg monster-card"
      data-monster-type="<?php echo e($monster->type->name); ?>"
    >
      <div class="md:flex">
        <!-- Image du monstre -->
        <div class="w-full md:w-1/2 relative">
          <img
            class="w-full h-full object-cover rounded-t-lg md:rounded-l-lg md:rounded-t-none"
            src="<?php echo e(asset('images/'.$monster->image_url)); ?>"
            alt="<?php echo e($monster->name); ?>"
          />
          <div class="absolute top-4 right-4">
            <form action="<?php echo e(route('monsters.favorite', ['monsterId' => $monster->id])); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <button type="submit" class="text-white rounded-full p-2 transition-colors duration-300
                    <?php echo e(in_array($monster->id, $favoriteMonsterId) ? 'bg-red-700 hover:bg-red-900' : 'bg-gray-400 hover:bg-red-700'); ?>"
                    style="width: 40px; height: 40px; display: flex; justify-content: center; align-items: center;">
                    <i class="fa fa-bookmark"></i>
                </button>
            </form>
        </div>
        </div>

        <!-- Détails du monstre -->
        <div class="p-6 md:w-1/2">
          <h2 class="text-3xl font-bold mb-2 creepster">
            <?php echo e($monster->name); ?>

          </h2>
          <p class="text-gray-300 text-sm mb-4">
            <?php echo e($monster->description); ?>

          </p>
          <div class="mb-4">
            <strong class="text-white">Créateur:</strong>
            <span class="text-red-400"><?php echo e($monster->user->name); ?></span>
          </div>
          <div class="mb-4">
            <div>
              <strong class="text-white">Type:</strong>
              <span class="text-gray-300"><?php echo e($monster->type->name); ?></span>
            </div>
            <div>
              <strong class="text-white">PV:</strong>
              <span class="text-gray-300"><?php echo e($monster->pv); ?></span>
            </div>
            <div>
              <strong class="text-white">Attaque:</strong>
              <span class="text-gray-300"><?php echo e($monster->attack); ?></span>
            </div>
            <div>
              <strong class="text-white">Défense:</strong>
              <span class="text-gray-300"><?php echo e($monster->defense); ?></span>
            </div>
          </div>
          <div class="mb-4">
            <?php
                $averageRating = $monster->notations->avg('notation');
                $fullStars = floor($averageRating);
                $halfStar = round($averageRating - $fullStars, 1) >= 0.5;
            ?>
        
            <?php for($i = 0; $i < $fullStars; $i++): ?>
                <i class="fa fa-star text-yellow-400"></i>
            <?php endfor; ?>
        
            <?php if($halfStar): ?>
                <i class="fa fa-star-half text-yellow-400"></i>
                <?php $fullStars++; ?>
            <?php endif; ?>
        
            <?php for($i = $fullStars; $i < 5; $i++): ?>
                <i class="fa fa-star text-gray-300"></i>
            <?php endfor; ?>
        
            <span class="text-gray-300 text-sm">(<?php echo e(number_format($averageRating, 1)); ?>/5.0)</span>
        </div>
        
          <div class="">
            <a
              href="<?php echo e(route('monsters.show', [
                'monster' => $monster->id,
                'slug' => \Illuminate\Support\Str::slug($monster->name, '-'),
            ])); ?>"
              class="inline-block text-white bg-red-500 hover:bg-red-700 rounded-full px-4 py-2 transition-colors duration-300"
              >Plus de détails</a
            >
          </div>
        </div>
      </div>
    </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  </section><?php /**PATH C:\Users\Makil\Dropbox\mamp\htdocs\framework_serveur\RetroMonsters\resources\views/monsters/_randomMonster.blade.php ENDPATH**/ ?>