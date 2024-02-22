

<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-md-12">
        <div class="text-center">
            <P>
                <b>
                    <h3>SMK AB
                        <br>
                        LURUS TERUS BELOK KANAN
                    </h3>
                    <hr>
                </P>
        </div>
        <div class="">
            <h4>Rekap peminjaman buku</h4>
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
                    <th>Penerbit</th>
                    <th>Tanggal Terbit</th>
                </tr>
            </thead>
            <tbody>
                <?php $__empty_1 = true; $__currentLoopData = $borrowings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $borrowing): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr>
                        <td><?php echo e($borrowing->first()->user->name); ?></td>
                        <td><?php echo e($borrowing->first()->book->name); ?></td>
                        <td><?php echo e($borrowing->first()->book->penerbit); ?></td>
                        <td><?php echo e($borrowing->tgl_pinjam); ?></td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.cetak', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\dimas\resources\views/peminjaman/periode.blade.php ENDPATH**/ ?>