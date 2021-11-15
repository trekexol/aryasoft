<?php if(Session::has('danger')): ?>
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <?php echo e(Session::get('danger')); ?>

    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<?php endif; ?><?php /**PATH C:\xampp\htdocs\aryasoftware\resources\views/admin/layouts/danger.blade.php ENDPATH**/ ?>