

<?php $__env->startSection('content'); ?>
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item active" aria-current="page">
            Data Pengembalian Buku
        </li>
    </ol>
</nav>

<div class="card card-body border-0">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Buku</th>
                <th>Nama Siswa</th>
                <th>Tanggal Pinjam</th>
                <th>Tanggal Kembali</th>
                <th>Durasi Peminjaman</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $__empty_1 = true; $__currentLoopData = $borrowings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $borrowing): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <tr>
                    <td><?php echo e($borrowing->book->name); ?></td>
                    <td><?php echo e($borrowing->user->name); ?></td>
                    <td><?php echo e($borrowing->tgl_pinjam); ?></td>
                    <td><?php echo e($borrowing->tgl_kembali); ?></td>
                    <td>
                        <?php
                            $datetime1 = strtotime($borrowing->tgl_pinjam);
                            $datetime2 = strtotime($borrowing->tgl_kembali);
                            $durasi = ($datetime2 - $datetime1) / 86400 ;
                          
                        ?>
                        <?php if($durasi < 0): ?>
                            Terlambat <?php echo e(abs($durasi)); ?> Hari
                        <?php else: ?>
                            <?php echo e($durasi); ?> Hari
                        <?php endif; ?>
                    </td>
                    <td>
                        <a href="<?php echo e(route('pengembalian.create', $borrowing->id)); ?>" class="btn btn-outline-info btn-sm">Kembalikan Buku</a>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <tr>
                    <td colspan="8" class="text-center">Maaf data Pengembalian belum tersedia</td>
                </tr>
            <?php endif; ?>
        </tbody>

    </table>
    <td>
                        <a href="<?php echo e(route('pengembalian.show')); ?>" class="btn btn-outline-info btn-sm" methode="post">history pengembalian Buku</a>
                    </td>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\dimas\resources\views/pengembalian/index.blade.php ENDPATH**/ ?>