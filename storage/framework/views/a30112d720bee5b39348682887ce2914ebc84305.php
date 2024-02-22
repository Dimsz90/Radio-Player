

<?php $__env->startSection('content'); ?>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item active" aria-current="page">
    	List Buku
    </li>
  </ol>
</nav>

<?php if(\Spatie\Permission\PermissionServiceProvider::bladeMethodWrapper('hasRole', 'Admin')): ?>
	<div class="row">
	<?php if(session('error')): ?>
<div class="alert alert-danger">
	<?php echo e(session('error')); ?>

</div>
<?php endif; ?>
		<div class="col-md-12">
			<div class="card border-0">
				<div class="card-body">
					<div class="alert alert-warning" role="alert">
						<h4>Data Buku</h4>
					</div>

					<div class="mt-3 mb-3">
						<a class="btn btn-info" href="<?php echo e(route('books.create')); ?>">
							Tambah Stock Buku
						</a>
						<a class="btn btn-outline-secondary" href="<?php echo e(route('books.rekap')); ?>">
							Rekap Semua Data Buku
						</a>
					</div>
					<table class="table table-striped">
						<tr>
							<th>Nama Buku</th>
							<th>Penerbit</th>
							<th>Tanggal Terbit</th>
							<th>Stock</th>
							<th>Action</th>
						</tr>
						<?php $__empty_1 = true; $__currentLoopData = $books; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $book): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
							<tr>
								<td><?php echo e($book->name); ?></td>
								<td><?php echo e($book->penerbit); ?></td>
								<td><?php echo e($book->tanggal_terbit); ?></td>
								<td>
									<?php if($book->stock <= 0): ?>
										Stock buku habis
									<?php else: ?>
										<?php echo e($book->stock); ?>

									<?php endif; ?>
								</td>
								<td>
									<form type="hidden" method="post" action="<?php echo e(route('books.destroy', $book->id)); ?>">
										<?php echo csrf_field(); ?>
										<?php echo method_field('DELETE'); ?>
										<a href="<?php echo e(route('books.edit', $book)); ?>" class="btn btn-warning btn-sm">Edit
										</a>
										<button type="submit" class="btn btn-danger btn-sm">
											Delete Buku
										</button>
									</form>
								</td>
							</tr>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
							<tr>
								<td colspan="6" class="text-center">
									Maaf stock buku belum tersedia
									Silahkan input stock buku
								</td>
							</tr>
						<?php endif; ?>
					</table>
				</div>
			</div>
		</div>
	</div>

<?php endif; ?>
<?php if(\Spatie\Permission\PermissionServiceProvider::bladeMethodWrapper('hasRole', 'Siswa')): ?>

	<div class="row">

		<div class="col-md-3">
			<ul class="list-group shadow-sm">
				<li class="list-group-item border-0 active">Rak Buku</li>
				<?php $__currentLoopData = $raks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rak): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<li class="list-group-item border-0 "><?php echo e($rak->name); ?></li>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			</ul>
		</div>
		<div class="col-md-9">
			<div class="row">
			<?php $__empty_1 = true; $__currentLoopData = $books; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $book): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
    <div class="col-md-4 col-sm-6 col-xs-12">
        <div class="card border-0 mb-3">
            <div class="card-body">
			<img src="<?php echo e(asset('uploads/' . $book->images)); ?>" class="card-img-top" alt="...">

                <h3 class="font-weight-bold pt-3"><?php echo e($book->name); ?></h3>
                <p class="text-muted">
                    <?php echo e($book->description); ?>

                </p>

                <p> Total stock : <?php echo e($book->stock); ?></p>

                <div class="mt-3 mb-3">
                    <a href="<?php echo e(route('peminjaman.create', $book->id)); ?>" class="btn btn-outline-info btn-block">
                        Pinjam buku
                    </a>
                </div>
            </div>
        </div>
    </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
    <h1 class="text-center">Maaf List Buku belum tersedia</h1>
<?php endif; ?>
			</div>
			<?php echo e($books->links()); ?>

		</div>
	</div>
<?php endif; ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\dimas\resources\views/books/index.blade.php ENDPATH**/ ?>