

<?php $__env->startSection('content'); ?>
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item active" aria-current="page">
            Form pengembalian buku
        </li>
    </ol>
</nav>
<div class="card card-body border-0">
    <form action="<?php echo e(route('pengembalian.store', $pengembalian->id)); ?>" method="post">
        <?php echo csrf_field(); ?>
        <?php if(session('success')): ?>
            <div class="alert alert-success">
                <?php echo e(session('success')); ?>

            </div>
        <?php endif; ?>

        <div class="form-group">
            <label for="">Judul Buku</label>
            <input type="text" name="judul" class="form-control" value="<?php echo e($pengembalian->first()->book->name); ?>" disabled id="">
        </div>
        <div class="form-group">
            <label for="">Nama Siswa</label>
            <input type="text" name="name" class="form-control" value="<?php echo e($pengembalian->first()->user->name); ?>" disabled id="">
        </div>
        <div class="form-group">
            <label for="">Tangga Pinjam</label>
            <input type="text" name="tgl_pinjam" class="form-control" value="<?php echo e($pengembalian->tgl_pinjam); ?>"  id="tgl_pinjam" readonly>
        </div>
        <div class="form-group">
            <label for="">Tanggal Kembali</label>
            <input type="text" name="tgl_kembali" class="form-control" value="<?php echo e($pengembalian->tgl_kembali); ?>"  id="tgl_kembali" readonly>
        </div>
        <div class="form-group">
            <label for="">Durasi Peminjaman</label>
            <input type="text" name="durasi" id="durasi" class="form-control" readonly>
        </div>
        <div class="form-group">
            <label for="">Denda</label>
            <input type="text" name="denda" id="denda" class="form-control"  disabled >
        </div>
        
        
        <div class="form-group">
            <label for="">Jumlah pinjam</label>
            <input type="text" name="jumlah_pinjam" value="<?php echo e($pengembalian->jumlah_pinjam); ?>" id="" class="form-control" readonly>
        </div>
<br>
        <button type="submit" class="btn btn-info" id="returnBookButton">Kembalikan Buku</button>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

        <script>
$(document).ready(function() {
    var tglPinjam = new Date($('input[name="tgl_pinjam"]').val());
    var tglKembali = new Date($('input[name="tgl_kembali"]').val());

    var durasi = Math.floor((tglKembali - tglPinjam) / (1000 * 60 * 60 * 24));
    var denda = durasi < 0 ? -durasi * 1000 : 0;

    $('#durasi').val(durasi);
    $('#denda').val(denda);
});

        </script>
        
    </form>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\dimas\resources\views/pengembalian/create.blade.php ENDPATH**/ ?>