<?php $__env->startSection('content'); ?>



<ul class="nav nav-tabs justify-content-center" id="myTab" role="tablist">
    <li class="nav-item" role="presentation">
      <a class="nav-link  font-weight-bold" style="color: black;" id="home-tab"  href="<?php echo e(route('quotations')); ?>" role="tab" aria-controls="home" aria-selected="true">Cotizaciones</a>
    </li>
    <li class="nav-item" role="presentation">
      <a class="nav-link  font-weight-bold" style="color: black;" id="profile-tab"  href="<?php echo e(route('invoices')); ?>" role="tab" aria-controls="profile" aria-selected="false">Facturas</a>
    </li>
    <li class="nav-item" role="presentation">
      <a class="nav-link font-weight-bold" style="color: black;" id="contact-tab"  href="<?php echo e(route('quotations.indexdeliverynote')); ?>" role="tab" aria-controls="contact" aria-selected="false">Notas De Entrega</a>
    </li>
    <li class="nav-item" role="presentation">
        <a class="nav-link font-weight-bold" style="color: black;" id="contact-tab"  href="<?php echo e(route('orders.index')); ?>" role="tab" aria-controls="contact" aria-selected="false">Pedidos</a>
    </li>
    <li class="nav-item" role="presentation">
        <a class="nav-link font-weight-bold" style="color: black;" id="profile-tab"  href="<?php echo e(route('sales')); ?>" role="tab" aria-controls="profile" aria-selected="false">Ventas</a>
      </li>
    <li class="nav-item" role="presentation">
        <a class="nav-link font-weight-bold" style="color: black;" id="contact-tab"  href="<?php echo e(route('anticipos')); ?>" role="tab" aria-controls="contact" aria-selected="false">Anticipos Clientes</a>
    </li>
    <li class="nav-item" role="presentation">
        <a class="nav-link active font-weight-bold" style="color: black;" id="profile-tab"  href="<?php echo e(route('clients')); ?>" role="tab" aria-controls="profile" aria-selected="false">Clientes</a>
    </li>
    <li class="nav-item" role="presentation">
        <a class="nav-link font-weight-bold" style="color: black;" id="contact-tab"  href="<?php echo e(route('vendors')); ?>" role="tab" aria-controls="contact" aria-selected="false">Vendedores</a>
    </li>
  </ul>

<!-- container-fluid -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row py-lg-2">
      <div class="col-md-6">
          <h2>Clientes</h2>
      </div>
      <div class="col-md-6">
        <a href="<?php echo e(route('clients.create')); ?>" class="btn btn-primary btn-lg float-md-right" role="button" aria-pressed="true">Registrar Cliente</a>
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
                   
                    <th>Nombre</th>
                    <th>Cedula o Rif</th>
                    <th>Dirección</th>
                    <th>Telefono</th>
                  
                    <th>Dias de Crédito</th>
                   
                    <th>Vendedor</th>
                    
                    <th></th>
                </tr>
                </thead>
                
                <tbody>
                    <?php if(empty($clients)): ?>
                    <?php else: ?>  
                        <?php $__currentLoopData = $clients; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $client): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                               
                                <td><?php echo e($client->name); ?></td>
                                <td><?php echo e($client->type_code); ?> <?php echo e($client->cedula_rif); ?></td>
                                <td><?php echo e($client->direction); ?></td>
                                <td><?php echo e($client->phone1); ?></td>
                                <td><?php echo e($client->days_credit); ?></td>
                               

                                <?php if(isset($client->vendors['name'])): ?>
                                    <td><?php echo e($client->vendors['name']); ?></td>
                                <?php else: ?>
                                    <td></td>
                                <?php endif; ?>
                                

                                
                                <td>
                                    <a href="clients/<?php echo e($client->id); ?>/edit" title="Editar"><i class="fa fa-edit"></i></a>
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
<?php echo $__env->make('admin.layouts.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\aryasoftware\resources\views/admin/clients/index.blade.php ENDPATH**/ ?>