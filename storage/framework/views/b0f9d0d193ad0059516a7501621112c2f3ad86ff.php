


<?php $__env->startSection('content'); ?>

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item active" aria-current="page">Cetak Kartu Anggota</li>
    </ol>
</nav>

<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card border-0">
            <div class="card-body">
                <div class="d-flex mb-3">
                    <div>
                        <img src="<?php echo e(asset('images/logo.png')); ?>" width="50" height="50" alt="">
                    </div>
                    <div class="mx-auto text-center">
                        <h6>KARTU PERPUSTAKAAN</h6>
                        <h4>SMK AB</h4>
                        <h6>Alamat Nanti sebelah sini</h6>
                    </div>
                </div>
                <div class="d-flex pt-3">
                    <div class="mr-3">
                        <h5 class="text-muted">Nama</h5>
                        <h5 class="text-muted">Nis</h5>
                        <h5 class="text-muted">Alamat</h5>
                        <h5 class="text-muted">E-mail</h5>
                        <h5 class="text-muted">No. Hp</h5>
                    </div>
                    <div>
                        <h5 class="text-muted">: <?php echo e($user->users->first()->name); ?></h5>
                        <h5 class="text-muted">: <?php echo e($user->users->first()->nis); ?></h5>
                        <h5 class="text-muted">: <?php echo e($user->users->first()->alamat); ?></h5>
                        <h5 class="text-muted">: <?php echo e($user->users->first()->email); ?></h5>
                        <h5 class="text-muted">: <?php echo e($user->users->first()->no_handphone); ?></h5>
                    </div>
                    <div>
                        <a href="<?php echo e(route('cetak.kartu',$user->id)); ?>" class="btn btn-danger">Cetak</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\dimas\resources\views/cetak/kartu/show.blade.php ENDPATH**/ ?>