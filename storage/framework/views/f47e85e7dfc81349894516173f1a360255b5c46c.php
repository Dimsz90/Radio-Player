

<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-md-12">
        <div class="text-center">
            <h3>SDN JATIMULYA 08</h3>
            <p>Jl.K.H.NOER ALI KALIMALANG, JATIMULYA, Kec. Tambun Selatan</p>
            <hr>
        </div>
        <h4>Rekap laporan buku</h4>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Kategori</th>
                    <th>Nama Buku</th>
                    <th>Penerbit</th>
                    <th>Tanggal Terbit</th>
                    <th>Stock</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $books; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $buku): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($buku->category->first()->name); ?></td>
                        <td><?php echo e($buku->name); ?></td>
                        <td><?php echo e($buku->penerbit); ?></td>
                        <td><?php echo e($buku->tanggal_terbit); ?></td>
                        <td><?php echo e($buku->stock); ?></td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="5">Jumlah buku: <?php echo e(count($books)); ?></td>
                </tr>
            </tfoot>
        </table>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.cetak', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\dimas\resources\views/books/rekap.blade.php ENDPATH**/ ?>