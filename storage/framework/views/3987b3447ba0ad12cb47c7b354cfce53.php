<!-- Main -->
<div class="container mx-auto flex flex-wrap pt-4 pb-12">
    <!-- Main content -->
    <main class="w-full  p-4 <?php if(request()->is('/') || request()->is('monsters')||request()->is('dashboard')): ?> md:w-3/4 <?php endif; ?>">
        <?php echo $__env->yieldContent('content'); ?>
    </main>
    
    <?php if(request()->is('dashboard')|| request()->is('/')|| request()->is('monsters')): ?>
        <!-- Vérifie si la route est 'home' -->
        <?php echo $__env->make('templates.partials._aside', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>
</div>
<?php /**PATH C:\Users\Makil\Dropbox\mamp\htdocs\framework_serveur\RetroMonsters\resources\views/templates/partials/_main.blade.php ENDPATH**/ ?>