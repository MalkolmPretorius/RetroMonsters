<?php $__env->startSection('title'); ?>
    <?php echo e($user->name); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

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
              alt="<?php echo e($user->name); ?>"
            />
            
          </div>

          <div class="p-6 md:w-1/2 text-center">
            <h2 class="text-3xl  font-bold mb-2 ">
                <?php echo e($user->name); ?>

            </h2>
            <p><span><?php echo e($user->email); ?></span><br>
            <span>Utilisateur depuis : <?php echo e($user->created_at->format('d-m-Y')); ?></span></p>
          </div>
    </section>

    
<?php $__env->stopSection(); ?>

<?php echo $__env->make('templates.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Makil\Dropbox\mamp\htdocs\framework_serveur\RetroMonsters\resources\views/users/show.blade.php ENDPATH**/ ?>