


<?php $__env->startSection('content'); ?>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">Cetak Kartu Anggota</li>
        </ol>
    </nav>
    <div class="card border-0 shadow-sm">

        <div class="card-body">
            <div class="alert alert-warning" role="alert">
                Silahkan Pilih data anggota yang ingin dicetak kartunya terimakasih
            </div>

            <div>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Nis</th>
                            <th>Nama Siswa</th>
                            <th>Alamat</th>
                            <th>Telp</th>
                            <th>Options</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($user->nis); ?></td>
                                <td><?php echo e($user->name); ?></td>
                                <td><?php echo e($user->alamat); ?></td>
                                <td><?php echo e($user->no_handphone); ?></td>
                                <td>
                                    <a href="<?php echo e(route('cetak.detail', $user->id)); ?>" class="btn btn-info btn-sm">Detail</a>
                                    <a href="<?php echo e(route('cetak.kartu',$user->id)); ?>" class="btn btn-warning btn-sm">Cetak Kartu</a>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
                <?php echo e($users->links()); ?>

            </div>
        </div>
        
    </div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\dimas\resources\views/cetak/kartu/index.blade.php ENDPATH**/ ?>