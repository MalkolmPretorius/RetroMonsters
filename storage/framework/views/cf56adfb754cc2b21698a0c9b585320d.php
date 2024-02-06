<?php $__env->startSection('title'); ?>
    Monsters
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<?php
$monsters = \App\Models\Monster::orderBy('name', 'ASC')->paginate(9);
$user = auth()->user();
if($user){
$favorites = $user->favorites()->orderBy('monster_id', 'ASC')->get();
$favoriteMonsterId = $user->favorites()->pluck('monster_id')->toArray();
}
else{
    $favoriteMonsterId = [];
}
 

?>

    <?php echo $__env->make('monsters._index', ['monsters' => $monsters, 'favoriteMonsterId' => $favoriteMonsterId], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <div><?php echo e($monsters->links()); ?></div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('templates.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Makil\Dropbox\mamp\htdocs\framework_serveur\RetroMonsters\resources\views/monsters/index.blade.php ENDPATH**/ ?>