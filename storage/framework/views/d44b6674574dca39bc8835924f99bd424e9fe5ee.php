<?php if(Session::has('delete')): ?>
<div class="alert alert-warning alert-dismissible fade show" role="alert">
    <?php echo e(Session::get('delete')); ?>

    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<?php endif; ?><?php /**PATH C:\xampp\htdocs\aryasoftware\resources\views/admin/layouts/delete.blade.php ENDPATH**/ ?>