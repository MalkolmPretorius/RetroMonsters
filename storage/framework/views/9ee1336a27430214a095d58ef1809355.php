<?php $__env->startSection('title'); ?>
    Home page
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<?php
$user = auth()->user();
if($user){
$favorites = $user->favorites()->orderBy('monster_id', 'ASC')->get();
$favoriteMonsterId = $user->favorites()->pluck('monster_id')->toArray();
}
else{
    $favoriteMonsterId = [];
}
 

?>

    <?php echo $__env->make('monsters._randomMonster', [
        'monsters' => \App\Models\Monster::inRandomOrder()->limit(1)->get(),
        'favoriteMonsterId' => $favoriteMonsterId,
    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('monsters._lastMonsters', [
        'monsters' => \App\Models\Monster::orderBy('created_at', 'DESC')->limit(3)->get(),
        'favoriteMonsterId' => $favoriteMonsterId,
    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php if(auth()->guard()->check()): ?>
    <?php
    $user = auth()->user(); 
    ?>

    
    
    <?php echo $__env->make('monsters._lastMonstersFollowed', [
        'follows' => $user->following()->orderBy('following_id', 'ASC')->limit(6)->get(),
        'favoriteMonsterId' => $favoriteMonsterId,
    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>
    
<?php $__env->stopSection(); ?>

<?php echo $__env->make('templates.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Makil\Dropbox\mamp\htdocs\framework_serveur\RetroMonsters\resources\views/pages/home.blade.php ENDPATH**/ ?>