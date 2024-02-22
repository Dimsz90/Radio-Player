

<?php $__env->startSection('content'); ?>
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item active" aria-current="page">
            Laporan Pengembalian
        </li>
    </ol>
</nav>

<div class="card card-body border-0">
    <form action="<?php echo e(route('pengembalian.periode')); ?>" class="mb-3" method="get">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="">Dari Tanggal</label>
                    <input type="date" name="tgl_awal" id="" class="form-control">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="">Dari Tanggal</label>
                    <input type="date" name="tgl_akhir" id="" class="form-control">
                </div>
            </div>
            <div class="col-md-12">
                <div class="d-flex">
                    <div class="mr-auto">
                        <a href="<?php echo e(route('pengembalian.all')); ?>" class="btn btn-secondary">Rekap Seluruh Laporan</a>
                    </div>
                    <div>
                        <button type="submit" class="btn btn-info">Cari laporan</button>
                    </div>
                </div>

            </div>
        </div>
    </form>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Buku</th>
                <th>Nama Siswa</th>
                <th>Tanggal Pinjam</th>
                <th>Tanggal Kembali</th>
                <th>Durasi Peminjaman</th>
                <th>Denda</th>
            </tr>
        </thead>
        <tbody>
            <?php $__empty_1 = true; $__currentLoopData = $pengembalians; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pengembalian): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <tr>
                    <td><?php echo e($pengembalian->book->name); ?></td>
                    <td><?php echo e($pengembalian->user->name); ?></td>
                    <td><?php echo e($pengembalian->tgl_pinjam); ?></td>
                    <td><?php echo e($pengembalian->tgl_kembali); ?></td>
                    <td><?php echo e($pengembalian->durasi); ?> Hari</td>
                    <td><?php echo e($pengembalian->denda); ?></td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <tr>
                    <td colspan="8" class="text-center">Maaf data Pengembalian belum tersedia</td>
                </tr>
            <?php endif; ?>
        </tbody>

    </table>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\dimas\resources\views/pengembalian/show.blade.php ENDPATH**/ ?>