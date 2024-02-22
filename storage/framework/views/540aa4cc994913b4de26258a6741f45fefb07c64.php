

<?php $__env->startSection('content'); ?>
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item active" aria-current="page">
            Data User
        </li>
    </ol>
</nav>

<div class="card card-body border-0">
    <div class="mt-3 mb-3">
        <a class="btn btn-info" href="<?php echo e(route('user.create')); ?>">
            Tambah user Baru
        </a>
    </div>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Nis</th>
                <th>Name</th>
                <th>Email</th>
                <th>No Handphone</th>
                <th>Alamat</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $__empty_1 = true; $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <tr>
                    <td><?php echo e($user->nis); ?></td>
                    <td><?php echo e($user->name); ?></td>
                    <td><?php echo e($user->email); ?></td>
                    <td><?php echo e($user->no_handphone); ?></td>
                    <td><?php echo e($user->alamat); ?></td>
                    <td>
                        <form action="<?php echo e(route('user.destroy', $user->id)); ?>" method="post" type="hidden">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>

                            <a href="<?php echo e(route('user.edit', $user->id)); ?>" class="btn btn-warning btn-sm">
                                Edit
                            </a>

                            <button type="submit" class="btn btn-danger btn-sm">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

            <?php endif; ?>
        </tbody>
    </table>
    <?php echo e($users->links()); ?>

</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\dimas\resources\views/user/index.blade.php ENDPATH**/ ?>