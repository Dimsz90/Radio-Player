

<?php $__env->startSection('content'); ?>
	<nav aria-label="breadcrumb">
	  <ol class="breadcrumb">
	    <li class="breadcrumb-item active" aria-current="page">
	    	Form edit Buku
	    </li>
	  </ol>
	</nav>
	<div class="card card-body border-0">
	<form action="<?php echo e(route('books.update', $book)); ?>" method="POST" enctype="multipart/form-data">
    <?php echo csrf_field(); ?>
    <?php echo method_field('PATCH'); ?>

    <div class="form-group">
        <label for="name">Nama Buku:</label>
        <input type="text" id="name" name="name" value="<?php echo e($book->name); ?>" required class="form-control">
    </div>

    <div class="form-group">
        <label for="description">Deskripsi:</label>
        <textarea id="description" name="description" required class="form-control"><?php echo e($book->description); ?></textarea>
    </div>

    <div class="form-group">
        <label for="penerbit">Penerbit:</label>
        <input type="text" id="penerbit" name="penerbit" value="<?php echo e($book->penerbit); ?>" required class="form-control">
    </div>

    <div class="form-group">
        <label for="tanggal_terbit">Tanggal Terbit:</label>
        <input type="date" id="tanggal_terbit" name="tanggal_terbit" value="<?php echo e($book->tanggal_terbit); ?>" required class="form-control">
    </div>

    <div class="form-group">
        <label for="stock">Stock:</label>
        <input type="number" id="stock" name="stock" value="<?php echo e($book->stock); ?>" required class="form-control">
    </div>
    <div class="form-group">
				<label for="">Cover Buku</label>
				<input type="file" name="images" id="" class="form-control">
			</div>

    <button type="submit" class="btn btn-primary">Update Buku</button>
</form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\dimas\resources\views/books/edit.blade.php ENDPATH**/ ?>