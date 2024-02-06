<!DOCTYPE html>
<html lang="fr">

<head>
    <?php echo $__env->make('templates.partials._head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</head>

<body class="bg-gray-800 text-white font-sans">

    <?php echo $__env->make('templates.partials._header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php echo $__env->make('templates.partials._main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php echo $__env->make('templates.partials._footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</body>

</html>

<?php /**PATH C:\Users\Makil\Dropbox\mamp\htdocs\framework_serveur\RetroMonsters\resources\views/templates/index.blade.php ENDPATH**/ ?>