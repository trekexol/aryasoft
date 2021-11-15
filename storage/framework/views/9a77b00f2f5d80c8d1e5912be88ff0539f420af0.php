<?php $__env->startSection('content'); ?>


<!-- container-fluid -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row py-lg-2">
        <div class="col-sm-6 h5">
            Listado de Comprobantes Contables detallado
        </div>
        <div class="col-sm-3">
            <a href="<?php echo e(route('accounts')); ?>" class="btn btn-light"><i class="fas fa-eye" ></i>
                &nbsp Plan de Cuentas
            </a>
        </div>
        <div class="col-sm-3">
        <?php if((isset($return)) && ($return == 'payments')): ?>
            <a href="<?php echo e(route('payments')); ?>" class="btn btn-light"><i class="fas fa-undo" ></i>
                &nbsp Volver
            </a>
        <?php else: ?>
            <a href="<?php echo e(route('quotations.createfacturado',[$quotation->id,$coin])); ?>" class="btn btn-light"><i class="fas fa-undo" ></i>
                &nbsp Volver a la Factura
            </a>
        <?php endif; ?>
        
            
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
                <th class="text-center font-weight-bold" width="12%">Fecha</th>
                <th class="text-center font-weight-bold">Cuenta</th>
                <th class="text-center font-weight-bold">Referencia</th>
                <th class="text-center font-weight-bold">Factura</th>
                <th class="text-center font-weight-bold">Descripción</th>
                <th class="text-center font-weight-bold">Debe</th>
                <th class="text-center font-weight-bold">Haber</th>
               
               
              
            </tr>
            </thead>
            
            <tbody>
                <?php if(isset($multipayments_detail)): ?>
                    <?php $__currentLoopData = $multipayments_detail; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $var): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                    <td class="text-center font-weight-bold"><?php echo e($var->headers['date']); ?></td>
                    <td class="text-center font-weight-bold"><?php echo e($var->accounts['code_one']); ?>.<?php echo e($var->accounts['code_two']); ?>.<?php echo e($var->accounts['code_three']); ?>.<?php echo e($var->accounts['code_four']); ?>.<?php echo e($var->accounts['code_five']); ?></td>
                    <td class="text-center font-weight-bold"><?php echo e($var->id_header_voucher); ?></td>
                    <td class="text-center font-weight-bold"><?php echo e($var->id_invoice); ?></td>
                    <td class="font-weight-bold"><?php echo e($var->headers['description']); ?> fact(<?php $__currentLoopData = $invoices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $invoice): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <?php echo e($invoice->id_quotation); ?>, <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>) / <?php echo e($var->accounts['description']); ?></td>

                    <?php if($coin == 'bolivares'): ?>
                        <td class="text-right font-weight-bold"><?php echo e(number_format($var->debe, 2, ',', '.')); ?></td>
                        <td class="text-right font-weight-bold"><?php echo e(number_format($var->haber, 2, ',', '.')); ?></td>
                    <?php else: ?>
                        <?php if(($var->debe != 0) && ($var->tasa)): ?>
                            <td class="text-right font-weight-bold"><?php echo e(number_format($var->debe  / $var->tasa, 2, ',', '.')); ?></td>
                        <?php else: ?>
                            <td class="text-right font-weight-bold"><?php echo e(number_format($var->debe, 2, ',', '.')); ?></td>
                        <?php endif; ?>
                        <?php if($var->haber != 0 && ($var->tasa)): ?>
                            <td class="text-right font-weight-bold"><?php echo e(number_format($var->haber / $var->tasa, 2, ',', '.')); ?></td>
                        <?php else: ?>
                            <td class="text-right font-weight-bold"><?php echo e(number_format($var->haber, 2, ',', '.')); ?></td>
                        <?php endif; ?>
                    <?php endif; ?>
                   
                 
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
                <?php if(empty($detailvouchers)): ?>
                <?php else: ?>
                    <?php $__currentLoopData = $detailvouchers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $var): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                    <td class="text-center font-weight-bold"><?php echo e($var->headers['date']); ?></td>
                    <td class="text-center font-weight-bold"><?php echo e($var->accounts['code_one']); ?>.<?php echo e($var->accounts['code_two']); ?>.<?php echo e($var->accounts['code_three']); ?>.<?php echo e($var->accounts['code_four']); ?>.<?php echo e($var->accounts['code_five']); ?></td>
                    <td class="text-center font-weight-bold"><?php echo e($var->id_header_voucher); ?></td>
                    <td class="text-center font-weight-bold"><?php echo e($var->quotations['number_invoice'] ?? $var->id_invoice); ?></td>
                    <td class="font-weight-bold"><?php echo e($var->headers['description']); ?> fact(<?php echo e($var->id_invoice); ?>) / <?php echo e($var->accounts['description']); ?></td>

                    <?php if($coin == 'bolivares'): ?>
                        <td class="text-right font-weight-bold"><?php echo e(number_format($var->debe, 2, ',', '.')); ?></td>
                        <td class="text-right font-weight-bold"><?php echo e(number_format($var->haber, 2, ',', '.')); ?></td>
                    <?php else: ?>
                        <?php if(($var->debe != 0) && ($var->tasa)): ?>
                            <td class="text-right font-weight-bold"><?php echo e(number_format($var->debe  / $var->tasa, 2, ',', '.')); ?></td>
                        <?php else: ?>
                            <td class="text-right font-weight-bold"><?php echo e(number_format($var->debe, 2, ',', '.')); ?></td>
                        <?php endif; ?>
                        <?php if($var->haber != 0 && ($var->tasa)): ?>
                            <td class="text-right font-weight-bold"><?php echo e(number_format($var->haber / $var->tasa, 2, ',', '.')); ?></td>
                        <?php else: ?>
                            <td class="text-right font-weight-bold"><?php echo e(number_format($var->haber, 2, ',', '.')); ?></td>
                        <?php endif; ?>
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
        $('#dataTable').dataTable( {
        "ordering": false,
        "order": [],
            'aLengthMenu': [[50, 100, 150, -1], [50, 100, 150, "All"]]
        } );
        
        $("body").toggleClass("sidebar-toggled");
        $(".sidebar").toggleClass("toggled");
        if ($(".sidebar").hasClass("toggled")) {
            $('.sidebar .collapse').collapse('hide');
        };
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\aryasoftware\resources\views/admin/invoices/index_detail_movement.blade.php ENDPATH**/ ?>