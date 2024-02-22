

<?php $__env->startSection('content'); ?>
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item active" aria-current="page">
            Form Edit Data Anggota
        </li>
    </ol>
</nav>
<div class="card card-body border-0">
    <form action="<?php echo e(route('user.update', $user->id)); ?>" method="post">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PATCH'); ?>
        <div class="form-group">
            <label for="nis">
                Nis
            </label>
            <input type="text" name="nis" class="form-control" value="<?php echo e($user->nis); ?>" placeholder="Nis.." required>
        </div>
        <div class="form-group">
            <label for="name">
                Nama Anggota
            </label>
            <input type="text" name="name" class="form-control" value="<?php echo e($user->name); ?>" placeholder="Nama Anggota...." required>
        </div>
        <div class="form-group">
            <label for="description">
                Email
            </label>
            <input type="email" name="email" class="form-control" value="<?php echo e($user->email); ?>" placeholder="Email..." required>
        </div>
        <div class="form-group">
            <label for="no_handphone">
                No Handphone
            </label>
            <input type="text" name="no_handphone" class="form-control" value="<?php echo e($user->no_handphone); ?>" required>
        </div>
        <div class="form-group">
            <label for="alamat">
                Alamat
            </label>
            <input type="text" name="alamat" class="form-control" value="<?php echo e($user->alamat); ?>" required>
        </div>

        <div class="mt-3 mb-3">
            <button type="submit" class="btn btn-info">
                Tambah Anggota
            </button>
            <a href="<?php echo e(route('user')); ?>" class="btn btn-light">
                Cancel
            </a>
        </div>
    </form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\dimas\resources\views/user/edit.blade.php ENDPATH**/ ?>