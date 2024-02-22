

<?php $__env->startSection('content'); ?>
	<nav aria-label="breadcrumb">
	  <ol class="breadcrumb">
	    <li class="breadcrumb-item active" aria-current="page">
	    	Form Tambah Buku
	    </li>
	  </ol>
	</nav>
	<div class="card card-body border-0">
		<form action="<?php echo e(route('books.store')); ?>" method="post" enctype="multipart/form-data">
			<?php echo csrf_field(); ?>
			<div class="form-group">
				<label for="name">
					Judul Buku
				</label>
				<input type="text" name="name" class="form-control" placeholder="Judul Buku.." required>
			</div>
			<div class="form-group">
				<label for="">Category Buku</label>
				<select name="category_id" id="" class="form-control">
					<option value="">Pilih Kategori</option>
					<?php $__currentLoopData = $categorys; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<option value="<?php echo e($category->id); ?>"><?php echo e($category->name); ?></option>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				</select>
			</div>
			<div class="form-group">
				<label for="description">
					Deskripsi
				</label>
				<input type="text" name="description" class="form-control" placeholder="Deskripsi...." required>
			</div>
			<div class="form-group">
				<label for="description">
					Penerbit
				</label>
				<input type="text" name="penerbit" class="form-control" placeholder="Penerbit..." required>
			</div>
			<div class="form-group">
				<label for="tanggal_terbit">
					Tanggal Terbit
				</label>
				<input type="date" name="tanggal_terbit" class="form-control" required>
			</div>
			<div class="form-group">
				<label for="stock">
					Jumlah Buku
				</label>
				<input type="number" name="stock" class="form-control" required>
			</div>
			<div class="form-group">
				<label for="">Cover Buku</label>
				<input type="file" name="images" id="" class="form-control">
			</div>
			<div class="mt-3 mb-3">
				<button type="submit" class="btn btn-info">
					Tambah Buku
				</button>
				<a href="<?php echo e(route('books')); ?>" class="btn btn-light">
					Cancel
				</a>
			</div>
		</form>
	</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\dimas\resources\views/books/create.blade.php ENDPATH**/ ?>