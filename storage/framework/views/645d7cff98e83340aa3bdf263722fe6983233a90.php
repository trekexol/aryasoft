<?php $__env->startSection('content'); ?>


  <!-- /.container-fluid -->
  
  <?php echo $__env->make('admin.layouts.success', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>   
  <?php echo $__env->make('admin.layouts.danger', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>    
  <?php echo $__env->make('admin.layouts.delete', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>    
  
  <!-- Page Heading -->
  <div class="row py-lg-2">
    
    <div class="col-md-4 h3 text-center">
     Seleccionar Cliente
    </div>
    
  </div>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-light2 table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                <tr> 
                    <th></th>
                   
                    <th>Nombre</th>
                    <th>Cedula o Rif</th>
                    <th>Dirección</th>
                    <th>Ciudad</th>
                    <th>Pais</th>
                    <th>Telefono</th>
                    <th>Telefono 2</th>
                    
                </tr>
                </thead>
                
                <tbody>
                    <?php if(empty($clients)): ?>
                    <?php else: ?>  
                        <?php $__currentLoopData = $clients; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $client): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td>
                                    <?php if(isset($id_anticipo)): ?>
                                        <a href="<?php echo e(route('anticipos.edit',[$id_anticipo,$client->id])); ?>"  title="Seleccionar"><i class="fa fa-check"></i></a>
                                    <?php else: ?>
                                        <a href="<?php echo e(route('anticipos.createclient',$client->id)); ?>"  title="Seleccionar"><i class="fa fa-check"></i></a>
                                    <?php endif; ?>
                               </td>
                                <td><?php echo e($client->name); ?></td>
                                <td><?php echo e($client->cedula_rif); ?></td>
                                <td><?php echo e($client->direction); ?></td>
                                <td><?php echo e($client->city); ?></td>
                                <td><?php echo e($client->country); ?></td>
                                <td><?php echo e($client->phone1); ?></td>
                                <td><?php echo e($client->phone2); ?></td>
                                
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
<?php echo $__env->make('admin.layouts.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\aryasoftware\resources\views/admin/anticipos/selectclient.blade.php ENDPATH**/ ?>