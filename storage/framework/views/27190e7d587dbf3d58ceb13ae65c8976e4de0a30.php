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
        <a class="nav-link active font-weight-bold" style="color: black;" id="profile-tab"  href="<?php echo e(route('sales')); ?>" role="tab" aria-controls="profile" aria-selected="false">Ventas</a>
      </li>
    <li class="nav-item" role="presentation">
        <a class="nav-link font-weight-bold" style="color: black;" id="contact-tab"  href="<?php echo e(route('anticipos')); ?>" role="tab" aria-controls="contact" aria-selected="false">Anticipos Clientes</a>
    </li>
    <li class="nav-item" role="presentation">
        <a class="nav-link font-weight-bold" style="color: black;" id="profile-tab"  href="<?php echo e(route('clients')); ?>" role="tab" aria-controls="profile" aria-selected="false">Clientes</a>
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
          <h2>Ventas</h2>
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
        <div class="container">
            <?php if(session('flash')): ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <?php echo e(session('flash')); ?>

                <button type="button" class="close" data-dismiss="alert" aria-label="close">
                    <span aria-hidden="true">&times; </span>
                </button>
            </div>   
        <?php endif; ?>
        </div>
        <div class="table-responsive">
        <table class="table table-light2 table-bordered" id="dataTable" width="100%" cellspacing="0" >
            <thead>
            <tr> 
                <th class="text-center">Código</th>
                <th class="text-center">Descripción</th>
                <th class="text-center">Tipo</th>
                <th class="text-center">Cantidad</th>
                <th class="text-center">Moneda</th>
                
               
            </tr>
            </thead>
            
            <tbody>

                


                <?php if(empty($inventories_quotations)): ?>
                <?php else: ?>  
                    <?php $__currentLoopData = $inventories_quotations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $var): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php 
                            $total = $var->amount_sales * $var->price * ($bcv ?? 1);
                        ?>
                        <tr>
                            <td class="text-center font-weight-bold"><?php echo e($var->code); ?></td>
                            <td class="text-center font-weight-bold"><?php echo e($var->description); ?></td>
                            <td class="text-center font-weight-bold"><?php echo e($var->type); ?></td>
                            <td class="text-right font-weight-bold"><?php echo e(number_format($var->amount_sales, 0, '', '.')); ?></td>
                            <?php if($var->money == 'Bs'): ?>
                                <td class="text-center">Bolivares</td>
                            <?php else: ?>
                                <td class="text-center">Dolares</td>
                            <?php endif; ?>
                            
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

<?php echo $__env->make('admin.layouts.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\aryasoftware\resources\views/admin/sales/index.blade.php ENDPATH**/ ?>