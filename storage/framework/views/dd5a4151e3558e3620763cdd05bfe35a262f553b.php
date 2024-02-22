

<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-md-12">
        <div class="text-center">
            <P>
                <b>
                    <h3>SDN JATIMULYA 08
                        <br>
                        Jl.K.H.NOER ALI KALIMALANG, JATIMULYA, Kec. Tambun Selatan,
                    </h3>
                    <hr>
                </P>
        </div>
        <div class="">
            <h4>Rekap pengembalian buku</h4>
            <?php if(request('tgl_awal')): ?>
            <small>Dari tanggal <?php echo e(request('tgl_awal')); ?> sampai tanggal <?php echo e(request('tgl_akhir')); ?></small>
            <?php endif; ?>
        </div>
        <br>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Nama peminjam</th>
                    <th>Judul</th>
                    <th>Tanggal Pinjam</th>
                    <th>Tanggal Kembali</th>
                    <th>Durasi</th>
                    <th>Denda</th>
                </tr>
            </thead>
            <tbody>
                <?php $__empty_1 = true; $__currentLoopData = $pengembalians; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $get): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr>
                        <td><?php echo e($get->user->name); ?></td>
                        <td><?php echo e($get->book->name); ?></td>
                        <td><?php echo e($get->tgl_pinjam); ?></td>
                        <td><?php echo e($get->tgl_kembali); ?></td>
                        <td><?php echo e($get->durasi); ?></td>
                        <td><?php echo e($get->denda); ?></td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.cetak', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\dimas\resources\views/pengembalian/periode.blade.php ENDPATH**/ ?>