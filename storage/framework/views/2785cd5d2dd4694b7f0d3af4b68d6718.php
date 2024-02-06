<?php $__env->startSection('title'); ?>
    Profile
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

            

            <!-- Page Content -->
            <main>
                <?php echo e($slot); ?>

            </main>
     
<?php $__env->stopSection(); ?>
<?php echo $__env->make('templates.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Makil\Dropbox\mamp\htdocs\framework_serveur\RetroMonsters\resources\views/layouts/app.blade.php ENDPATH**/ ?>