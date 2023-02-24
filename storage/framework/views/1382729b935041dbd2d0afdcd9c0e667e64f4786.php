<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> <?php echo e(config('app.name')); ?> :  <?php echo $__env->yieldContent('title'); ?> </title>
    <link  href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.0.0/mdb.min.css" rel="stylesheet">
    <link rel="stylesheet" href=" <?php echo e(asset('css/bootstrap.css')); ?>">
</head>
<body id="page-top">

    <!-- Responsive navbar-->
    <?php $locale = session()->get('locale'); ?>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark py-3">
        <div class="container">
            <a class="navbar-brand" href="<?php echo e(route('etudiant.index')); ?>">Maisonneuve2194804</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li><a class="navbar-brand" href="/dashboard"><?php echo app('translator')->get('lang.hello'); ?> <?php if(Auth::check()): ?> <?php echo e(Auth::user()->name); ?> <?php else: ?> Guest <?php endif; ?></a></li>
                    <?php if(auth()->guard()->guest()): ?>
                    <li class="nav-item"><a class="nav-link" href="<?php echo e(route('user.create')); ?>"><?php echo app('translator')->get('lang.signup'); ?></a></li>
                    <li class="nav-item"><a class="nav-link" href="<?php echo e(route('login')); ?>"><?php echo app('translator')->get('lang.login'); ?></a></li>
                    <?php else: ?>
                    <li class="nav-item"><a class="nav-link" href="<?php echo e(route('article.index')); ?>"><?php echo app('translator')->get('lang.forum'); ?></a></li>
                    <li class="nav-item"><a class="nav-link" href="<?php echo e(route('file.index')); ?>"><?php echo app('translator')->get('lang.document_directory'); ?></a></li>
                    <li class="nav-item"><a class="nav-link" href="<?php echo e(route('logout')); ?>"><?php echo app('translator')->get('lang.logout'); ?></a></li>
                    <?php endif; ?>
                    <a class="nav-link <?php if($locale=='en'): ?> bg-light <?php endif; ?>" href="<?php echo e(route('lang', 'en')); ?>"><i class="flag flag-united-states"></i></a>
                    <a class="nav-link <?php echo e($locale =='fr' ? 'bg-light' : ''); ?>" href="<?php echo e(route('lang', 'fr')); ?>"><i class="flag flag-france"></i></a>
                </ul>
            </div>
        </div>
    </nav>

    <div class="py-5 bg-image-full" style="background-image: linear-gradient(#3e5151, #decba4)">
        <h1 class="display-one my-5 text-center text-white display-3">
            <?php echo app('translator')->get('lang.hero'); ?> <?php echo e(config('app.name')); ?>

        </h1>
    </div>

    <?php echo $__env->yieldContent('content'); ?> 


    <footer class="py-3 bg-dark mt-4">
            <div class="container">
                <div class="row align-items-center text-white">
                    <div class="col-lg-4 text-lg-start "><?php echo app('translator')->get('lang.copyright'); ?> &copy; Maisonneuve2194804 2023</div>

                    <div class="col-lg-8 text-lg-end">
                        <a class="text-decoration-none me-3 text-white" href="#!"><?php echo app('translator')->get('lang.policy'); ?></a>
                        <a class="text-decoration-none text-white" href="#!"><?php echo app('translator')->get('lang.terms'); ?></a>
                    </div>
                </div>
            </div>
    </footer>

</body>

<script src="<?php echo e(asset('js/bootstrap.min.js')); ?>"></script>

</html><?php /**PATH C:\College_Maisonneuve\session_4_cadriciel\TP1\Maisonneuve2194804\resources\views/layouts/app.blade.php ENDPATH**/ ?>