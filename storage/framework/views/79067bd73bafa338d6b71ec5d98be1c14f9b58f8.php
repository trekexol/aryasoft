<?php $__env->startSection('content'); ?>


<!-- container-fluid -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row py-lg-2">
        <div class="col-sm-7 h4">
            Listado de Comprobantes Contables detallados <br>de <?php echo e($type); ?> <?php echo e($var->id ?? ''); ?>

        </div>
        <div class="col-sm-3">
            <a href="<?php echo e(route('accounts')); ?>" class="btn btn-light2"><i class="fas fa-eye" ></i>
                Plan de Cuentas
            </a>
        </div>
        <div class="col-sm-2">
            <a href="<?php echo e(route('accounts.movements',$id_account)); ?>" class="btn btn-light2"><i class="fas fa-undo" ></i>
                Volver
            </a>
        </div>
       
    </div>
    <!-- Page Heading -->
   
  </div>

  
<?php echo $__env->make('admin.layouts.success', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>   
<?php echo $__env->make('admin.layouts.danger', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>    
<?php echo $__env->make('admin.layouts.delete', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>    

<div class="card shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">
        <table class="table table-light2 table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
            <tr>
                <th>Fecha</th>
                <th>Nº</th>
                <th>Cuenta</th>
                <th>Tipo de Movimiento</th>
                
                <th>Referencia</th>
              
                <th>Descripción</th>
                <th>Debe</th>
                <th>Haber</th>
               
               
              
            </tr>
            </thead>
            
            <tbody>
                <?php if(empty($detailvouchers)): ?>
                <?php else: ?>
                    <?php $__currentLoopData = $detailvouchers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $var): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                    <td><?php echo e($var->headers['date'] ?? ''); ?></td>
                    
                    <td><?php echo e($var->accounts['code_one'] ?? ''); ?>.<?php echo e($var->accounts['code_two'] ?? ''); ?>.<?php echo e($var->accounts['code_three'] ?? ''); ?>.<?php echo e($var->accounts['code_four'] ?? ''); ?>.<?php echo e($var->accounts['code_five'] ?? ''); ?></td>
                    <td><?php echo e($var->accounts['description'] ?? ''); ?></td>
                    
                    <?php if(isset($var->id_invoice)): ?>
                        <td>Factura</td>
                        <td>
                        <?php echo e($var->id_invoice); ?>

                        </td>
                    <?php elseif(isset($var->id_expense)): ?>
                        <td>Gasto o Compra</td>
                        <td>
                        <?php echo e($var->id_expense); ?>

                        </td>
                    <?php elseif(isset($var->id_header_voucher)): ?> 
                        <td>Otro</td>
                        <td>
                        <?php echo e($var->id_header_voucher); ?>

                        </td>
                    <?php endif; ?>
                    
                                   
                   
                    <?php if(isset($var->id_invoice)): ?>
                        
                        <td><?php echo e($var->headers['description'] ?? ''); ?> fact(<?php echo e($var->id_invoice); ?>) / <?php echo e($var->accounts['description'] ?? ''); ?></td>
                    
                    <?php elseif(isset($var->id_expense)): ?>
                        
                        <td><?php echo e($var->headers['description'] ?? ''); ?> Compra(<?php echo e($var->id_expense); ?>) / <?php echo e($var->accounts['description'] ?? ''); ?></td>
                    <?php else: ?>
                        
                        <td><?php echo e($var->headers['description'] ?? ''); ?></td>
                    <?php endif; ?>
                   
                    <?php if(isset($var->accounts['coin'])): ?>
                        <?php if(($var->debe != 0) && ($var->tasa)): ?>
                            <td class="text-right font-weight-bold"><?php echo e(number_format($var->debe, 2, ',', '.')); ?><br><?php echo e(number_format($var->debe/$var->tasa, 2, ',', '.')); ?><?php echo e($var->accounts['coin']); ?></td>
                        <?php else: ?>
                            <td class="text-right font-weight-bold"><?php echo e(number_format($var->debe, 2, ',', '.')); ?></td>
                        <?php endif; ?>
                        <?php if($var->haber != 0 && ($var->tasa)): ?>
                            <td class="text-right font-weight-bold"><?php echo e(number_format($var->haber, 2, ',', '.')); ?><br><?php echo e(number_format($var->haber/$var->tasa, 2, ',', '.')); ?><?php echo e($var->accounts['coin']); ?></td>
                        <?php else: ?>
                            <td class="text-right font-weight-bold"><?php echo e(number_format($var->haber, 2, ',', '.')); ?></td>
                        <?php endif; ?>
                    <?php else: ?>
                        <td class="text-right font-weight-bold"><?php echo e(number_format($var->debe, 2, ',', '.')); ?></td>
                        <td class="text-right font-weight-bold"><?php echo e(number_format($var->haber, 2, ',', '.')); ?></td>
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
<?php echo $__env->make('admin.layouts.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\aryasoftware\resources\views/admin/accounts/index_header_movement.blade.php ENDPATH**/ ?>