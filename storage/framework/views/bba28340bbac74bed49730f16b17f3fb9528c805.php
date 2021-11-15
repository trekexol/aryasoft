<?php $__env->startSection('content'); ?>

<ul class="nav nav-tabs justify-content-center" id="myTab" role="tablist">
    <li class="nav-item" role="presentation">
        <a class="nav-link font-weight-bold" style="color: black;" id="home-tab"  href="<?php echo e(route('expensesandpurchases')); ?>" role="tab" aria-controls="home" aria-selected="true">Gastos y Compras</a>
    </li>
    <li class="nav-item" role="presentation">
        <a class="nav-link font-weight-bold" style="color: black;" id="home-tab"  href="<?php echo e(route('expensesandpurchases.indexdeliverynote')); ?>" role="tab" aria-controls="home" aria-selected="true">Ordenes de Compra</a>
    </li>
    <li class="nav-item" role="presentation">
        <a class="nav-link active font-weight-bold" style="color: black;" id="profile-tab"  href="<?php echo e(route('expensesandpurchases.index_historial')); ?>" role="tab" aria-controls="profile" aria-selected="false">Historial</a>
    </li>
    <li class="nav-item" role="presentation">
        <a class="nav-link font-weight-bold" style="color: black;" id="profile-tab"  href="<?php echo e(route('anticipos.index_provider')); ?>" role="tab" aria-controls="profile" aria-selected="false">Anticipo a Proveedores</a>
    </li>
</ul>
<form method="POST" action="<?php echo e(route('expensesandpurchases.multipayment')); ?>" enctype="multipart/form-data" >
    <?php echo csrf_field(); ?>
<!-- container-fluid -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row py-lg-2">
        <div class="col-md-6">
            <h2>Historial de Gastos y Compras</h2>
        </div>
        <div class="col-md-2">
            <a href="<?php echo e(route('payment_expenses')); ?>" class="btn btn-info btn-icon-split">
                <span class="icon text-white-50">
                    <i class="fas fa-hand-holding-usd"></i>
                </span>
                <span class="text">Pagos</span>
            </a>
        </div>
        <div class="col-sm-3  dropdown mb-4">
            <button class="btn btn-success" type="button"
                id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="false"
                aria-expanded="false">
                <i class="fas fa-bars"></i>
                Exportaciones
            </button>
            <div class="dropdown-menu animated--fade-in"
                aria-labelledby="dropdownMenuButton">
                <a href="#" data-toggle="modal" data-target="#reportIvaTxtModal" class="dropdown-item bg-light">Retención de Iva a .txt</a> 
                <a href="#" data-toggle="modal" data-target="#reportIslrModal" class="dropdown-item bg-light">Retención de ISLR a XML</a> 
                <a href="#" data-toggle="modal" data-target="#reportIvaExcelModal" class="dropdown-item bg-light">Retención de Iva a Excel</a> 
            </div>
        </div> 
      <div class="col-md-4">
        <button type="submit" title="Agregar" id="btncobrar" class="btn btn-primary  float-md-right" >Cobrar Gastos o Compras</a>
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
                
                <th class="text-center">Factura de Compra</th>
                <th class="text-center">N° de Control/Serie</th>
                <th class="text-center">Proveedor</th>
                <th class="text-center">Fecha</th>
                <th class="text-center">Monto</th>
                <th class="text-center">Iva</th>
                <th class="text-center">Total</th>
                <th ></th>
                <th ></th>
               
            </tr>
            </thead>
            
            <tbody>
                <?php if(empty($expensesandpurchases)): ?>
                <?php else: ?>  
                    <?php $__currentLoopData = $expensesandpurchases; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $expensesandpurchase): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                           
                            <td class="text-center">
                                <a href="<?php echo e(route('expensesandpurchases.create_expense_voucher',[$expensesandpurchase->id,$expensesandpurchase->coin ?? 'bolivares'])); ?>" title="Ver Detalle" class="text-center text-dark font-weight-bold">
                                    <?php echo e($expensesandpurchase->invoice ?? ''); ?>

                                </a>
                            </td>
                            <td class="text-center"><?php echo e($expensesandpurchase->serie ?? ''); ?></td>
                            <td class="text-center"><?php echo e($expensesandpurchase->providers['razon_social'] ?? ''); ?></td>
                            <td class="text-center"><?php echo e($expensesandpurchase->date); ?></td>
                            <td class="text-right"><?php echo e(number_format($expensesandpurchase->amount, 2, ',', '.')); ?></td>
                            <td class="text-right"><?php echo e(number_format($expensesandpurchase->amount_iva, 2, ',', '.')); ?></td>
                            <td class="text-right"><?php echo e(number_format($expensesandpurchase->amount_with_iva, 2, ',', '.')); ?></td>
                            <?php if($expensesandpurchase->status == "C"): ?>
                            <td class="text-center font-weight-bold">
                                <a href="<?php echo e(route('expensesandpurchases.create_expense_voucher',[$expensesandpurchase->id,$expensesandpurchase->coin ?? 'bolivares'])); ?>" title="Ver Detalle" class="text-center text-success font-weight-bold">Pagado</a>
                            </td>
                            <td>
                            </td>
                            <?php elseif($expensesandpurchase->status == "X"): ?>
                            <td class="text-center font-weight-bold">
                                Reversado
                            </td>
                            <td>
                            </td>
                            <?php else: ?>
                            <td class="text-center font-weight-bold">
                                <a href="<?php echo e(route('expensesandpurchases.create_payment_after',[$expensesandpurchase->id,$expensesandpurchase->coin])); ?>" title="Cobrar Factura" class="font-weight-bold text-dark">Click para Pagar</a>
                            </td>
                            <td>
                                <input type="checkbox" name="check<?php echo e($expensesandpurchase->id); ?>" value="<?php echo e($expensesandpurchase->id); ?>" onclick="buttom();" id="flexCheckChecked">    
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
<div class="modal fade" id="reportIvaTxtModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Seleccione el periodo</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form method="POST" action="<?php echo e(route('exportexpense.ivaTxt')); ?>"  >
                <?php echo csrf_field(); ?>
            <div class="modal-body">
                <div class="form-group row">
                    <label for="date_end" class="col-sm-2 col-form-label text-md-right">Desde</label>
    
                    <div class="col-sm-6">
                        <input id="date_begin" type="date" class="form-control <?php $__errorArgs = ['date_begin'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="date_begin" value="<?php echo e($date_begin ?? $datenow ?? ''); ?>" required autocomplete="date_begin">
    
                        <?php $__errorArgs = ['date_begin'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <span class="invalid-feedback" role="alert">
                                <strong><?php echo e($message); ?></strong>
                            </span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="date_end" class="col-sm-2 col-form-label text-md-right">hasta </label>
    
                    <div class="col-sm-6">
                        <input id="date_begin" type="date" class="form-control <?php $__errorArgs = ['date_end'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="date_end" value="<?php echo e($date_end ?? $datenow ?? ''); ?>" required autocomplete="date_end">
    
                        <?php $__errorArgs = ['date_end'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <span class="invalid-feedback" role="alert">
                                <strong><?php echo e($message); ?></strong>
                            </span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                </div>
               
                <div class="modal-footer">
                    <div class="form-group col-sm-2">
                        <button type="submit" class="btn btn-info" title="Buscar">Enviar</button>  
                    </div>
            </form>
                    <div class="offset-sm-2 col-sm-3">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="reportIslrModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Seleccione el periodo</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form method="POST" action="<?php echo e(route('exportexpense.islrXml')); ?>"  >
                <?php echo csrf_field(); ?>
            <div class="modal-body">
                <div class="form-group row">
                    <label for="date_end" class="col-sm-3 col-form-label text-md-right">Seleccionar</label>
    
                    <div class="col-sm-6">
                        <input id="date_begin" type="month" class="form-control <?php $__errorArgs = ['date_begin'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="date_begin" value="<?php echo e(date_format(date_create( $date_begin ?? $datenow  ?? "01-2021"),"Y-m")); ?>" required autocomplete="date_begin">
    
                        <?php $__errorArgs = ['date_begin'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <span class="invalid-feedback" role="alert">
                                <strong><?php echo e($message); ?></strong>
                            </span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                </div>
               
                <div class="modal-footer">
                    <div class="form-group col-sm-2">
                        <button type="submit" class="btn btn-info" title="Buscar">Enviar</button>  
                    </div>
            </form>
                    <div class="offset-sm-2 col-sm-3">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="reportIvaExcelModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Seleccione el periodo</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form method="POST" action="<?php echo e(route('exportexpense.ivaExcel')); ?>"  >
                <?php echo csrf_field(); ?>
            <div class="modal-body">
                <div class="form-group row">
                    <label for="date_end" class="col-sm-2 col-form-label text-md-right">Desde</label>
    
                    <div class="col-sm-6">
                        <input id="date_begin" type="date" class="form-control <?php $__errorArgs = ['date_begin'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="date_begin" value="<?php echo e($date_begin ?? $datenow ?? ''); ?>" required autocomplete="date_begin">
    
                        <?php $__errorArgs = ['date_begin'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <span class="invalid-feedback" role="alert">
                                <strong><?php echo e($message); ?></strong>
                            </span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="date_end" class="col-sm-2 col-form-label text-md-right">hasta </label>
    
                    <div class="col-sm-6">
                        <input id="date_begin" type="date" class="form-control <?php $__errorArgs = ['date_end'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="date_end" value="<?php echo e($date_end ?? $datenow ?? ''); ?>" required autocomplete="date_end">
    
                        <?php $__errorArgs = ['date_end'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <span class="invalid-feedback" role="alert">
                                <strong><?php echo e($message); ?></strong>
                            </span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                </div>
               
                <div class="modal-footer">
                    <div class="form-group col-sm-2">
                        <button type="submit" class="btn btn-info" title="Buscar">Enviar</button>  
                    </div>
            </form>
                    <div class="offset-sm-2 col-sm-3">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                    </div>
                </div>
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

<?php echo $__env->make('admin.layouts.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\aryasoftware\resources\views/admin/expensesandpurchases/index_historial.blade.php ENDPATH**/ ?>