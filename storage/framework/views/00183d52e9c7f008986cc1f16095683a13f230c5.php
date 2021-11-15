<?php $__env->startSection('content'); ?>

<!-- container-fluid -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row py-lg-2">
      <div class="col-md-6">
          <h2>Proveedores</h2>
      </div>
      <div class="col-md-6">
        <a href="<?php echo e(route('providers.create')); ?>" class="btn btn-primary float-md-right" role="button" aria-pressed="true">Registrar un Proveedor</a>
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
                    <th>Código Proveedor</th>
                    <th>Razón Social</th>
                    <th>Dirección</th>
                    <th>Ciudad</th>
                    <th>Pais</th>
                    <th>Telefono</th>
                    <th></th>
                </tr>
                </thead>
                
                <tbody>
                    <?php if(empty($providers)): ?>
                    <?php else: ?>  
                        <?php $__currentLoopData = $providers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $var): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($var->code_provider); ?></td>
                                <td><?php echo e($var->razon_social); ?></td>
                                <td><?php echo e($var->direction); ?></td>
                                <td><?php echo e($var->city); ?></td>
                                <td><?php echo e($var->country); ?></td>
                                <td><?php echo e($var->phone1); ?></td>
                                
                                <td>
                                    <a href="providers/<?php echo e($var->id); ?>/edit" title="Editar"><i class="fa fa-edit"></i></a>
                                </td>
                            </tr>     
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>   
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>


    
<?php $__env->stopSection(); ?>
<?php $__env->startSection('javascript'); ?>

    <script>
    $('#dataTable').DataTable({
        "ordering": false,
        "order": [],
        'aLengthMenu': [[50, 100, 150, -1], [50, 100, 150, "All"]]
    });

    </script> 

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\aryasoftware\resources\views/admin/providers/index.blade.php ENDPATH**/ ?>