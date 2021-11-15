<?php $__env->startSection('content'); ?>
<ul class="nav nav-tabs justify-content-center" id="myTab" role="tablist">
    <li class="nav-item" role="presentation">
        <a class="nav-link font-weight-bold" style="color: black;" id="home-tab"  href="<?php echo e(route('expensesandpurchases')); ?>" role="tab" aria-controls="home" aria-selected="true">Gastos y Compras</a>
    </li>
    <li class="nav-item" role="presentation">
        <a class="nav-link active font-weight-bold" style="color: black;" id="home-tab"  href="<?php echo e(route('expensesandpurchases.indexdeliverynote')); ?>" role="tab" aria-controls="home" aria-selected="true">Ordenes de Compra</a>
    </li>
    <li class="nav-item" role="presentation">
        <a class="nav-link font-weight-bold" style="color: black;" id="profile-tab"  href="<?php echo e(route('expensesandpurchases.index_historial')); ?>" role="tab" aria-controls="profile" aria-selected="false">Historial</a>
    </li>
    <li class="nav-item" role="presentation">
        <a class="nav-link font-weight-bold" style="color: black;" id="profile-tab"  href="<?php echo e(route('anticipos.index_provider')); ?>" role="tab" aria-controls="profile" aria-selected="false">Anticipo a Proveedores</a>
    </li>
</ul>



<!-- container-fluid -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row py-lg-2">
      <div class="col-md-6">
          <h2>Notas de Entrega</h2>
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
                <th class="text-center"></th>
                <th class="text-center">N° de Control/Serie</th>
                <th class="text-center">Proveedor</th>
                <th class="text-center">Fecha del Gasto o Compra</th>
                <th class="text-center">Fecha de la Nota de Entrega</th>
                <th class="text-center">Total</th>
               
            </tr>
            </thead>
            
            <tbody>
                <?php if(empty($expenses)): ?>
                <?php else: ?>  
                    <?php $__currentLoopData = $expenses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $expense): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td class="text-center">
                            <a href="<?php echo e(route('expensesandpurchases.create_payment',[$expense->id,$expense->coin])); ?>" title="Seleccionar"><i class="fa fa-check"></i></a>
                            <a href="<?php echo e(route('expensesandpurchases.createdeliverynote',[$expense->id,$expense->coin])); ?>" title="Mostrar"><i class="fa fa-file-alt"></i></a>
                           </td>
                            <td class="text-center"><?php echo e($expense->serie); ?></td>
                            <td class="text-center"><?php echo e($expense->providers['razon_social']); ?></td>
                            <td class="text-center"><?php echo e($expense->date); ?></td>
                            <td class="text-center"><?php echo e($expense->date_delivery_note); ?></td>
                            <?php if($expense->coin == 'bolivares'): ?>
                                <td class="text-right"><?php echo e(number_format($expense->amount_with_iva ?? 0, 2, ',', '.')); ?></td>
                            <?php else: ?>
                                <td class="text-right"><?php echo e(number_format(($expense->amount_with_iva ?? 0)/$expense->rate, 2, ',', '.')); ?></td>
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
<?php echo $__env->make('admin.layouts.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\aryasoftware\resources\views/admin/expensesandpurchases/indexdeliverynote.blade.php ENDPATH**/ ?>