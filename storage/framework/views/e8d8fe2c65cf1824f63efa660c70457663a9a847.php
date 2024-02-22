

<?php $__env->startSection('content'); ?>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">
                Form peminjaman buku
            </li>
        </ol>
    </nav>
    <div class="card card-body border-0">
        <form action="<?php echo e(route('peminjaman.store')); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <?php if(session('success')): ?>
                <div class="alert alert-success">
                    <?php echo e(session('success')); ?>

                </div>
            <?php endif; ?>
            <div class="form-group">
                <label for="name_book">
                    Buku
                </label>
             
                    <input type="text" class="form-control" value="<?php echo e($books->name); ?>" readonly>
                    <input type="hidden" id="" name="books" class="form-control" value="<?php echo e($books->id); ?>">
              
            </div>
            <div class="form-group">
                <label for="tgl_pinjam">Tanggal Peminjaman</label>
                <input type="date" name="tgl_pinjam" id="tgl_pinjam" class="form-control">
            </div>
            <div class="form-group">
                <label for="tgl_pengembalian">Tanggal Pengembalian</label>
                <input type="date" name="tgl_kembali" id="tgl_pengembalian" class="form-control">
            </div>
            <div class="form-group">
                <label for="jumlah_pinjam">Jumlah buku</label>
                <input type="number" name="jumlah_pinjam" id="jumlah_pinjam" value="<?php echo e($books->stock); ?>" class="form-control">
            </div>
            <div class="mt-3 mb-3">
                <button class="btn btn-primary" type="submit">
                    Simpan Pinjaman
                </button>
                <a href="<?php echo e(route('books')); ?>" class="btn btn-light btn"> Cancel</a>
            </div>
        </form>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\dimas\resources\views/peminjaman/create.blade.php ENDPATH**/ ?>