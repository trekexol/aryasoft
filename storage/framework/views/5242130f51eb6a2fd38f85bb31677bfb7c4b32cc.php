<?php $__env->startSection('content'); ?>

<div class="container-fluid">
    <div class="row py-lg-2">
       
        <div class="col-md-6">
            <h2>Seleccione un Proveedor</h2>
        </div>
        
    
    </div>
</div>

  <!-- /.container-fluid -->
  
  <?php echo $__env->make('admin.layouts.success', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>   
  <?php echo $__env->make('admin.layouts.danger', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>    
  <?php echo $__env->make('admin.layouts.delete', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>    
  
<!-- DataTales Example -->
<div class="card shadow mb-4">
   
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-light2 table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                <tr> 
                    <th></th>
                   
                    <th>Nombre / Razón Social</th>
                    <th>Código Proveedor</th>
                    <th>Dirección</th>
                    <th>Ciudad</th>
                    <th>Pais</th>
                    <th>Telefono</th>
                    <th>Telefono 2</th>
                    
                </tr>
                </thead>
                
                <tbody>
                    <?php if(empty($providers)): ?>
                    <?php else: ?>  
                        <?php $__currentLoopData = $providers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $provider): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td >
                                    <a href="<?php echo e(route('expensesandpurchases.create',$provider->id)); ?>"  title="Seleccionar Proveedor"><i class="fa fa-check" style="color: orange"></i></a>
                               </td>
                                <td ><?php echo e($provider->razon_social); ?></td>
                                <td ><?php echo e($provider->code_provider); ?></td>
                                <td ><?php echo e($provider->direction); ?></td>
                                <td ><?php echo e($provider->city); ?></td>
                                <td ><?php echo e($provider->country); ?></td>
                                <td ><?php echo e($provider->phone1); ?></td>
                                <td ><?php echo e($provider->phone2); ?></td>
                                
                            </tr>     
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>   
                    <?php endif; ?>
                </tbody>
            </table>
            
        </div>
        <br>
        <div class="form-group row col-md-4">
                
            <div class="col-md-2">
                <a href="<?php echo e(route('expensesandpurchases.create')); ?>" id="btnfacturar" name="btnfacturar" class="btn btn-danger" title="facturar">Volver</a>  
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('javascript'); ?>

<script>
    $('#dataTable').dataTable( {
      "ordering": false,
      "order": [],
        'aLengthMenu': [[50, 100, 150, -1], [50, 100, 150, "All"]]
} );
</script>
    
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\aryasoftware\resources\views/admin/expensesandpurchases/selectprovider.blade.php ENDPATH**/ ?>