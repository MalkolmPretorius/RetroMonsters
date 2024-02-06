<section class="mb-20">


    <!-- Section Derniers monstres -->
    <section class="mb-20">
        <h2 class="text-2xl font-bold mb-4 creepster">
            Nos créateurs </h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <article
                    class="relative bg-gray-700 rounded-lg shadow-lg hover:shadow-2xl transition-shadow duration-300 monster-card">
                    <img class="w-full  h-48 object-cover rounded-t-lg" src="https://picsum.photos/200/300"
                        alt="<?php echo e($user->name); ?>" />
                    <div class="p-4">
                        <h3 class="text-xl text-center  font-bold"><?php echo e($user->name); ?></h3>
                        <div class="mt-8 text-center">
                            <a href="<?php echo e(route('users.show', [
                                'user' => $user->id,
                                'slug' => \Illuminate\Support\Str::slug($user->name, '-'),
                            ])); ?>"
                                class="inline-block text-white bg-red-500 hover:bg-red-700 rounded-full px-4 py-2 transition-colors duration-300">Plus
                                de détails</a>
                        </div>
                    </div>
                </article>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </section>


</section>
<?php /**PATH C:\Users\Makil\Dropbox\mamp\htdocs\framework_serveur\RetroMonsters\resources\views/users/_index.blade.php ENDPATH**/ ?>