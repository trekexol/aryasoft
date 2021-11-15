<?php if(Session::has('success')): ?>
<div id="alerta" class="alert alert-success alert-dismissible fade show" role="alert">
    <?php echo e(Session::get('success')); ?>

    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<?php endif; ?>

<?php $__env->startSection('validacion_time'); ?>

<script>
  $(document).ready(function() {
    setTimeout(function() {
        $("#alerta").fadeOut(1500);
    },5000);
 
   
});
  
</script>
    
<?php $__env->stopSection(); ?>
<?php /**PATH C:\xampp\htdocs\aryasoftware\resources\views/admin/layouts/success.blade.php ENDPATH**/ ?>