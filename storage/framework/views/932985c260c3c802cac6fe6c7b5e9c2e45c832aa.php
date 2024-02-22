<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo e(config('app.name', 'Bumida')); ?></title>

    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" />

    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css" rel="stylesheet">
    <style>
        .d-flex {
            display: flex !important;
        }
        .mr-3{
            margin-inline-end: 10rem !important;
        }
        .col-md-4 {
            flex: 0 0 33%;
            max-inline-size: 33%;
        }
        .col-md-6 {
            flex: 0 0 50%;
            max-inline-size: 50%;
        }
    </style>
</head>

<body>
    <div id="app">
        <div class="content">
            <?php echo $__env->yieldContent('content'); ?>
        </div>
    </div>

</body>

</html><?php /**PATH C:\xampp\htdocs\dimas\resources\views/layouts/cetak.blade.php ENDPATH**/ ?>