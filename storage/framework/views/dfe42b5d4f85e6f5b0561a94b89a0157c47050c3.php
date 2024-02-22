

<?php $__env->startSection('content'); ?>
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item active" aria-current="page">
            Data Peminjaman Buku
        </li>
    </ol>
</nav>

<div class="card card-body border-0">
    <form action="<?php echo e(route('peminjaman.periode')); ?>" class="mb-3" method="GET">
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
                        <a href="<?php echo e(route('peminjaman.all')); ?>" class="btn btn-secondary">Rekap Seluruh Laporan</a>
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
                        $tgl_pinjam = strtotime($borrowing->tgl_pinjam);
                        $tgl_kembali = strtotime($borrowing->tgl_kembali);
                        $durasi = ($tgl_kembali - $tgl_pinjam) / 86400;
                    ?>
                    <?php if($durasi < 0): ?>
                        Terlambat <?php echo e(abs($durasi)); ?> Hari
                    <?php else: ?>
                        <?php echo e($durasi); ?> Hari
                    <?php endif; ?>
                </td>
                <td>
                    <td>
                        <?php if($durasi < 3 && $durasi > 0 ): ?>
                            <form action="<?php echo e(route('notifikasi.rimainder', $borrowing->id)); ?>" method="POST" type="hidden">
                                <?php echo csrf_field(); ?>
                                <button type="submit" class="btn btn-warning btn-sm">Kirim Peringatan Peminjaman</button>
                            </form>
                        <?php elseif($durasi < 0): ?>
                            <?php $denda = abs($durasi) * 1000 ; ?>
                            <form action="<?php echo e(route('notifikasi.denda', $borrowing->id)); ?>" method="POST" type="hidden">
                                <?php echo csrf_field(); ?>
                                <input type="hidden" name="denda" value=<?php echo e($denda); ?>>
                                <input type="hidden" name="durasi" value=<?php echo e($durasi); ?>>
                                <button type="submit"class="btn btn-danger btn-sm">Kirim Denda</button>
                            </form>
                        <?php else: ?>
                       
                    <?php endif; ?>
                
                            </form>
                        </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <tr>
                    <td colspan="8" class="text-center">Maaf data peminjaman belum tersedia</td>
                </tr>
            <?php endif; ?>
        </tbody>

    </table>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\dimas\resources\views/peminjaman/index.blade.php ENDPATH**/ ?>