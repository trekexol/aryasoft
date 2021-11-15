<?php $__env->startSection('content'); ?>


<ul class="nav nav-tabs justify-content-center" id="myTab" role="tablist">
    <li class="nav-item" role="presentation">
      <a class="nav-link  font-weight-bold" style="color: black;" id="home-tab"  href="<?php echo e(route('quotations')); ?>" role="tab" aria-controls="home" aria-selected="true">Cotizaciones</a>
    </li>
    <li class="nav-item" role="presentation">
      <a class="nav-link active font-weight-bold" style="color: black;" id="profile-tab"  href="<?php echo e(route('invoices')); ?>" role="tab" aria-controls="profile" aria-selected="false">Facturas</a>
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
        <a class="nav-link font-weight-bold" style="color: black;" id="profile-tab"  href="<?php echo e(route('clients')); ?>" role="tab" aria-controls="profile" aria-selected="false">Clientes</a>
    </li>
    <li class="nav-item" role="presentation">
        <a class="nav-link font-weight-bold" style="color: black;" id="contact-tab"  href="<?php echo e(route('vendors')); ?>" role="tab" aria-controls="contact" aria-selected="false">Vendedores</a>
    </li>
  </ul>



<form method="POST" action="<?php echo e(route('invoices.multipayment')); ?>" enctype="multipart/form-data" >
<?php echo csrf_field(); ?>
<!-- container-fluid -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row py-lg-2">
      <div class="col-md-2">
          <h2>Facturas</h2>
      </div>
      <div class="col-md-2">
        <a href="<?php echo e(route('payments')); ?>" class="btn btn-info btn-icon-split">
            <span class="icon text-white-50">
                <i class="fas fa-hand-holding-usd"></i>
            </span>
            <span class="text">Cobros</span>
        </a>
    </div>
      <div class="col-md-6">
        <button type="submit" title="Agregar" id="btncobrar" class="btn btn-primary  float-md-right" >Cobrar Facturas</a>
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
                <th class="text-center">Fecha</th>
                <th class="text-center">Nº</th>
                <th class="text-center">Nota de Entrega</th>
                <th class="text-center">Cliente</th>
                <th class="text-center">Vendedor</th>
                <th class="text-center">REF</th>
                <th class="text-center">Monto</th>
                <th class="text-center">Moneda</th>
                <th class="text-center"></th>
                <th class="text-center"></th>
            </tr>
            </thead>
            
            <tbody>
                <?php if(empty($quotations)): ?>
                <?php else: ?>  
                    <?php $__currentLoopData = $quotations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $quotation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php 
                        $amount_bcv = 0;
                        $amount_bcv = $quotation->amount_with_iva / $quotation->bcv;
                    ?>

                        <tr>
                            <td class="text-center font-weight-bold"><?php echo e($quotation->date_billing); ?></td>
                            <?php if($quotation->status == "X"): ?>
                                <td class="text-center font-weight-bold"><?php echo e($quotation->number_invoice); ?>

                                </td>
                            <?php else: ?>
                                <td class="text-center font-weight-bold">
                                    <a href="<?php echo e(route('quotations.createfacturado',[$quotation->id,$quotation->coin ?? 'bolivares'])); ?>" title="Ver Factura" class="font-weight-bold text-dark"><?php echo e($quotation->number_invoice); ?></a>
                                </td>
                            <?php endif; ?>
                            <td class="text-center font-weight-bold"><?php echo e($quotation->number_delivery_note ?? ''); ?></td>
                            <td class="text-center font-weight-bold"><?php echo e($quotation->clients['name'] ?? ''); ?></td>
                            <td class="text-center font-weight-bold"><?php echo e($quotation->vendors['name'] ?? ''); ?> <?php echo e($quotation->vendors['surname'] ?? ''); ?></td>
                            <td class="text-right font-weight-bold">$<?php echo e(number_format($amount_bcv, 2, ',', '.')); ?></td>
                            <td class="text-right font-weight-bold"><?php echo e(number_format($quotation->amount_with_iva, 2, ',', '.')); ?></td>
                            <td class="text-right font-weight-bold"><?php echo e($quotation->coin); ?></td>
                            <?php if($quotation->status == "C"): ?>
                                <td class="text-center font-weight-bold">
                                    <a href="<?php echo e(route('quotations.createfacturado',[$quotation->id,$quotation->coin ?? 'bolivares'])); ?>" title="Ver Factura" class="text-center text-success font-weight-bold">Cobrado</a>
                                </td>
                                <td class="text-center font-weight-bold">
                                </td>
                            <?php elseif($quotation->status == "X"): ?>
                                <td class="text-center font-weight-bold text-danger">Reversado
                                </td>
                                <td>
                                </td>
                            <?php else: ?>
                                <td class="text-center font-weight-bold">
                                    <a href="<?php echo e(route('quotations.createfacturar_after',[$quotation->id,$quotation->coin ?? 'bolivares'])); ?>" title="Cobrar Factura" class="font-weight-bold text-dark">Click para Cobrar</a>
                                </td>
                                <td>
                                    <input type="checkbox" name="check<?php echo e($quotation->id); ?>" value="<?php echo e($quotation->id); ?>" onclick="buttom();" id="flexCheckChecked">    
                                </td>
                            <?php endif; ?>
                            
                        </tr>     
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>   
                <?php endif; ?>
            </tbody>
        </table>

      
        </div>
    </div>
</div>
</form>
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


        $("#btncobrar").hide();

        function buttom(){
            
            $("#btncobrar").show();
        }
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\aryasoftware\resources\views/admin/invoices/index.blade.php ENDPATH**/ ?>