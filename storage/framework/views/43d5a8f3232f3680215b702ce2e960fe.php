

<?php $__env->startSection('title'); ?>
    Ajouter un monstres
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>





    <div class="container mx-auto pb-12">
        <div class="flex flex-wrap justify-center">
            <div class="w-full">
                <div class="bg-gray-700 p-6 rounded-lg shadow-lg">
                    <h2 class="text-2xl font-bold mb-4 text-center creepster">
                        Modifier un Monstre
                    </h2>
                    <form action="<?php echo e(route('monsters.updateMonster', ['monster' => $monster->id])); ?>" method="POST" enctype="multipart/form-data" class="space-y-6">
                        <?php echo csrf_field(); ?>

                        <div>
                            <label for="name" class="block mb-1">Nom du monstre</label>
                            <input type="text" id="name" name="name"
                                class="w-full border rounded px-3 py-2 text-gray-700" value="<?php echo e($monster->name); ?>" />
                        </div>

                        <div>
                            <label for="type" class="block mb-1">Type</label>
                            <!-- Assumez que $types est une collection ou un tableau d'options de types -->
                            <select id="type" name="type" class="w-full border rounded px-3 py-2 text-gray-700">
                                <?php $__currentLoopData = $types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($type->id); ?>"><?php echo e($type->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>

                        <div>
                            <label for="rarety" class="block mb-1">Rareté</label>
                            <select id="rarety" name="rarety" class="w-full border rounded px-3 py-2 text-gray-700">
                                <?php $__currentLoopData = $rarities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rarityId => $rarityName): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($rarityId); ?>"><?php echo e($rarityName); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>

                        <div>
                            <label for="pv" class="block mb-1">PV</label>
                            <input type="text" id="pv" name="pv"
                                class="w-full border rounded px-3 py-2 text-gray-700" value="<?php echo e($monster->pv); ?>" />
                        </div>

                        <div>
                            <label for="attack" class="block mb-1">Attaque</label>
                            <input type="text" id="attack" name="attack"
                                class="w-full border rounded px-3 py-2 text-gray-700" value="<?php echo e($monster->attack); ?>" />
                        </div>

                        <div>
                            <label for="defense" class="block mb-1">Défense</label>
                            <input type="text" id="defense" name="defense"
                                class="w-full border rounded px-3 py-2 text-gray-700" value="<?php echo e($monster->defense); ?>" />
                        </div>

                        <div>
                            <label for="description" class="block mb-1">Description</label>
                            <textarea id="description" name="description" class="w-full border rounded px-3 py-2 text-gray-700"><?php echo e($monster->description); ?></textarea>
                        </div>

                        <div>
                            <label for="image" class="block mb-1">Image</label>
                            <input type="file" id="image" name="image" class="w-full border rounded px-3 py-2 text-gray-700" value="<?php echo e($monster->image_url); ?>" accept="*"  />
                        </div>

                        <div class="flex justify-center items-center">
                            <button type="submit"
                                class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                                Modifier le monstre
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('templates.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Makil\Dropbox\mamp\htdocs\framework_serveur\RetroMonsters\resources\views/monsters/editMonsters.blade.php ENDPATH**/ ?>