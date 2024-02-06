<?php $__env->startSection('title'); ?>
    Creators
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php
        $users = \App\Models\User::orderBy('name', 'ASC')->paginate(9);
    ?>
    <?php echo $__env->make('users._index', [
        'users' => $users,
    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <div><?php echo e($users->links()); ?></div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('templates.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Makil\Dropbox\mamp\htdocs\framework_serveur\RetroMonsters\resources\views/users/index.blade.php ENDPATH**/ ?>