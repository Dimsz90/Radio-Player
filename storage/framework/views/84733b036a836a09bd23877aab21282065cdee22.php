

<?php $__env->startSection('content'); ?>
    <div class="card border-0">
        <div class="card-body">
            <h3>Form tambah category</h3>

            <form action="<?php echo e(route('category.store')); ?>" method="post">
                <?php echo csrf_field(); ?>
                <div class="form-group">
                    <label for="">Nama Category</label>
                    <input type="text" name="name" id="" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Nomor Rak</label>
                    <input type="number" name="no_rak" id="" class="form-control">
                </div>
                <button  class="btn btn-outline-info">
                    Tambah Category
                </button>
            </form>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\dimas\resources\views/category/create.blade.php ENDPATH**/ ?>