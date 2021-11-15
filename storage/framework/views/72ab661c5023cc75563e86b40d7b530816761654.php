<?php $__env->startSection('content'); ?>

<div class="container-fluid">
    <div class="row py-lg-2">
       
        <div class="col-md-10">
            <?php if(isset($type) && ($type == "MERCANCIA")): ?>
                <h2>Seleccione un Producto del Inventario</h2>
            <?php else: ?>
                <h2>Seleccione un Servicio</h2>
            <?php endif; ?>
        </div>
        
        <div class="col-md-2">
            <a href="<?php echo e(route('expensesandpurchases.create_detail',[$id_expense,$coin])); ?>" id="btnfacturar" name="btnfacturar" class="btn btn-danger" title="facturar">Volver</a>  
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
        <table class="table table-light2 table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
            <tr> 
                <th></th>
                <th>SKU</th>
                <th>Descripción</th>
                <th>Cantidad</th>
                <th>Precio de Compra</th>
                <th>Moneda</th>
                <th>Foto del Producto</th>
              
            </tr>
            </thead>
            
            <tbody>
                <?php if(empty($inventories)): ?>
                <?php else: ?>  
                    <?php $__currentLoopData = $inventories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $var): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td>
                                <a href="<?php echo e(route('expensesandpurchases.create_detail',[$id_expense,$coin,$type ?? 'MERCANCIA',$var->id])); ?>" title="Seleccionar"><i class="fa fa-check"></i></a>
                            </td>
                            <td><?php echo e($var->code); ?></td>
                            <td><?php echo e($var->description); ?></td>
                            <td style="text-align: right"><?php echo e($var->amount); ?></td> 
                            <td style="text-align: right"><?php echo e(number_format($var->price_buy, 2, ',', '.')); ?></td>
                            
                            <?php if($var->money == "D"): ?>
                            <td>Dolar</td>
                            <?php else: ?>
                            <td>Bolívar</td>
                            <?php endif; ?>

                            <td><?php echo e($var->photo_product); ?></td> 
                           
                            
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
    $('#dataTable').dataTable( {
      "ordering": false,
      "order": [],
        'aLengthMenu': [[50, 100, 150, -1], [50, 100, 150, "All"]]
} );
</script>
    
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\aryasoftware\resources\views/admin/expensesandpurchases/selectinventary.blade.php ENDPATH**/ ?>