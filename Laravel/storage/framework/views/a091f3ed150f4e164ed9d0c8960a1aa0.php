<?php $__env->startSection('content'); ?>
<div class="card">
    <div class="card-body">
        <form action="" method="post" enctype="multipart/form-data">
            <h2>Upload Product</h2>
            <select name="category" class="form-control">
                <option value="">category 1</option>
                <option value="">category 2</option>
                <option value="">category 3</option>
            </select>
            <label for="name">Name:</label>
            <input type="text" name="name" id="name" class="form-control">
            <label for="price">Price:</label>
            <input type="text" name="price" id="price" class="form-control">
            <label for="img">Subir Documento (IMG):</label>
            <input type="file" name="img" id="img" class="form-control">
            <div class="col-auto mt-3">
                <button type="submit" class="btn btn-primary">Upload</button>
            </div>
        </form>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.products', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /var/www/html/resources/views/products/add.blade.php ENDPATH**/ ?>