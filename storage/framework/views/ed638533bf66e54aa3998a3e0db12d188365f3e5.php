<?php $__env->startSection('content'); ?>


<!-- container-fluid -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row py-lg-2">
        <div class="col-sm-8 offset-sm-3 h4">
            Listado de Comprobantes Contables detallados 
        </div>
       
    </div>
    <div class="row py-lg-2">
        <div class="col-sm-4">
            <a class="btn btn-light2" href="#" data-toggle="modal" data-target="#libroModalAccount"><i class="fas fa-eye" ></i>
                &nbsp Imprimir Libro Diario por Cuentas
            </a>
            
        </div>
        <div class="col-sm-3">
            <a href="#" data-toggle="modal" data-target="#libroModal" class="btn btn-light2"><i class="fas fa-eye" ></i>
                &nbsp Imprimir Libro Diario
            </a>
        </div>
        <div class="col-sm-2">
            <a href="<?php echo e(route('reports.ledger')); ?>" class="btn btn-light2"><i class="fas fa-eye" ></i>
                &nbsp Libro Mayor
            </a>
        </div>
        <div class="col-sm-3">
            <a class="btn btn-light2" href="#" data-toggle="modal" data-target="#libroMayorCuentasModal"><i class="fas fa-eye" ></i>
                &nbsp Libro Mayor por Cuentas
            </a>
        </div>
        
    
    </div>
    <div class="row py-lg-2">
        <form method="POST" action="<?php echo e(route('daily_listing.store')); ?>">
            <?php echo csrf_field(); ?>
            <div class="card-body">
                <div class="form-group row">
                    <label for="date_end" class="col-sm-1 col-form-label text-md-right">Desde</label>

                    <div class="col-sm-4">
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
                    <label for="date_end" class="col-sm-1 col-form-label text-md-right">hasta </label>

                    <div class="col-sm-4">
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
                    <div class="form-group col-md-2">
                        <button type="submit" class="btn btn-info" title="Buscar">Buscar</button>  
                    </div>
                </div>
            </div>
        </form>
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
                    <th class="text-center">Fecha</th>
                   
                    <th class="text-center">Cuenta</th>
                    <th class="text-center">Tipo de Movimiento</th>
                    
                    <th class="text-center">Ref</th>
                  
                    <th class="text-center">Descripción</th>
                    <th class="text-center">Debe</th>
                    <th class="text-center">Haber</th>
                   
                   
                  
                </tr>
                </thead>
                
                <tbody>
                    <?php if(empty($detailvouchers)): ?>
                    <?php else: ?>
                        <?php $__currentLoopData = $detailvouchers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $var): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                        <td class="text-center"><?php echo e($var->date ?? ''); ?></td>
                        
                        <td><?php echo e($var->account_description ?? ''); ?></td>
                        
                        <?php if(isset($var->id_invoice)): ?>
                            <td class="text-center">Factura</td>
                            <td class="text-center">
                            <?php echo e($var->id_invoice); ?>

                            </td>
                        <?php elseif(isset($var->id_expense)): ?>
                            <td class="text-center">Gasto o Compra</td>
                            <td class="text-center">
                            <?php echo e($var->id_expense); ?>

                            </td>
                        <?php elseif(isset($var->id_header_voucher)): ?> 
                            <td class="text-center">Otro</td>
                            <td class="text-center">
                            <?php echo e($var->id_header_voucher); ?>

                            </td>
                        <?php endif; ?>
                        
                                       
                       
                        <?php if(isset($var->id_invoice)): ?>
                            
                            <td><?php echo e($var->description ?? ''); ?></td>
                        
                        <?php elseif(isset($var->id_expense)): ?>
                            
                            <td><?php echo e($var->description ?? ''); ?></td>
                        <?php else: ?>
                            
                            <td><?php echo e($var->description ?? ''); ?></td>
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



<div class="modal fade" id="libroMayorCuentasModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Seleccione el periodo</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form method="POST" action="<?php echo e(route('daily_listing.print_diary_book_detail')); ?>"   target="print_popup" onsubmit="window.open('about:blank','print_popup','width=1000,height=800');">
                <?php echo csrf_field(); ?>
            <div class="modal-body">
                <div class="form-group row">
                    <label for="account" class="col-md-2 col-form-label text-md-right">Cuenta:</label>
                        <div class="col-md-8">
                            <select class="form-control" id="id_account" name="id_account" required>
                                <option value="">Selecciona una Cuenta</option>
                                <?php $__currentLoopData = $accounts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $var): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($var->id); ?>"><?php echo e($var->description); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                              
                            </select>
                        </div>
                </div>
                <div class="form-group row">
                    <label id="coinlabel" for="coin" class="col-md-2 col-form-label text-md-right">Moneda:</label>
                    <div class="col-md-6">
                        <select class="form-control" name="coin" id="coin">
                            <option selected value="bolivares">Bolívares</option>
                            <option value="dolares">Dolares</option>
                        </select>
                    </div>
                </div>
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
            </div>
                <div class="modal-footer">
                    <div class="form-group col-md-2">
                        <button type="submit" class="btn btn-info" title="Buscar">Enviar</button>  
                    </div>
            </form>
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                </div>
            </div>
        </div>
    </div>
<div class="modal fade" id="libroModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Seleccione el periodo</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>
        <form method="POST" action="<?php echo e(route('daily_listing.print_journalbook')); ?>"   target="print_popup" onsubmit="window.open('about:blank','print_popup','width=1000,height=800');">
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
        </div>
            <div class="modal-footer">
                <div class="form-group col-md-2">
                    <button type="submit" class="btn btn-info" title="Buscar">Enviar</button>  
                </div>
        </form>
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="libroModalAccount" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Seleccione el periodo</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form method="POST" action="<?php echo e(route('daily_listing.print_journalbook')); ?>"   target="print_popup" onsubmit="window.open('about:blank','print_popup','width=1000,height=800');">
                <?php echo csrf_field(); ?>
            <div class="modal-body">
                <div class="form-group row">
                    <label for="account" class="col-md-2 col-form-label text-md-right">Cuenta:</label>
                        <div class="col-md-8">
                            <select class="form-control" id="id_account" name="id_account" required>
                                <option value="">Selecciona una Cuenta</option>
                                <?php $__currentLoopData = $accounts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $var): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($var->id); ?>"><?php echo e($var->description); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                              
                            </select>
                        </div>
                </div>
                <div class="form-group row">
                    <label id="coinlabel" for="coin" class="col-md-2 col-form-label text-md-right">Moneda:</label>
                    <div class="col-md-6">
                        <select class="form-control" name="coin" id="coin">
                            <option selected value="bolivares">Bolívares</option>
                            <option value="dolares">Dolares</option>
                        </select>
                    </div>
                </div>
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
            </div>
                <div class="modal-footer">
                    <div class="form-group col-md-2">
                        <button type="submit" class="btn btn-info" title="Buscar">Enviar</button>  
                    </div>
            </form>
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                </div>
            </div>
        </div>
    </div>
    
<?php $__env->stopSection(); ?>

<?php $__env->startSection('javascript'); ?>
    <script>
        $('#dataTable').DataTable({
            "ordering": false,
            "order": [],
            'aLengthMenu': [[50, 100, 150, -1], [50, 100, 150, "Todo"]]
        });

        $("body").toggleClass("sidebar-toggled");
        $(".sidebar").toggleClass("toggled");
        if ($(".sidebar").hasClass("toggled")) {
            $('.sidebar .collapse').collapse('hide');
        };
    </script> 
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\aryasoftware\resources\views/admin/daily_listing/index.blade.php ENDPATH**/ ?>