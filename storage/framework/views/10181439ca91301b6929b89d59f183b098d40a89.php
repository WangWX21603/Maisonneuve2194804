
<?php $__env->startSection('title', 'Mettre a jour'); ?>
<?php $__env->startSection('content'); ?>

<div class="container">
    <div class="row justify-content-center my-3">
        <div class="col-8">
            <div class ="nav justify-content-end mb-3">
                <a href="<?php echo e(route('file.index')); ?>" class="btn btn-outline-primary btn-md mt-5"><?php echo app('translator')->get('lang.return'); ?></a>
            </div>
            <div class="card border-dark">
            
                <?php if(!$errors->isEmpty()): ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <ul>
                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo e($error); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <?php endif; ?>
                
                <?php if(session('success')): ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong> <?php echo e(session('success')); ?></strong> 
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <?php endif; ?>

                <form enctype='multipart/form-data' method="post">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('put'); ?>
                    <div class="card-header text-uppercase text-center bg-secondary text-white py-3">
                        <h4><?php echo app('translator')->get('lang.update_file'); ?></h4>
                    </div>
                    <div class="card-body">
                        <div class="form-group col-12">
                            <label for="titre" class="fw-semibold"><?php echo app('translator')->get('lang.title_article_en'); ?></label>
                            <input type="text" id="titre" name="titre" class="form-control text-secondary" value="<?php echo e($file->titre); ?>">
                        </div>
                        <div class="form-group col-12 mt-2">
                            <label for="titre_fr" class="fw-semibold"><?php echo app('translator')->get('lang.title_article_fr'); ?></label>
                            <input type="text" name="titre_fr" id="titre_fr" class="form-control text-secondary" value="<?php echo e($file->titre_fr); ?>">
                        </div>
                        <div class="form-group col-12 mt-2">
                            <label for="file" class="fw-semibold"><?php echo app('translator')->get('lang.upload_file'); ?></label>
                            <input type="file" name="file" id="file" class="form-control text-secondary" value="<?php echo e($file->titre_fr); ?>">
                        </div>                        
                    </div>

                    <input type="hidden" name="original_path" value="<?php echo e($file->path); ?>">
                    
                    <div class="text-center mb-4">
                        <input type="submit" value="<?php echo app('translator')->get('lang.update'); ?>" class="btn btn-primary">
                    </div>

                </form>


            </div>

        </div>

    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\College_Maisonneuve\session_4_cadriciel\TP1\Maisonneuve2194804\resources\views/file/edit.blade.php ENDPATH**/ ?>