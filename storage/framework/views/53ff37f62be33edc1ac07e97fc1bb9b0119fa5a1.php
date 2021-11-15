<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-12">
            <div class="card">
                <form method="POST" action="<?php echo e(route('reports.store_bankmovements')); ?>">
                    <?php echo csrf_field(); ?>

                <input type="hidden" name="id_bank" value="<?php echo e($bank->id ?? null); ?>" readonly>

                <div class="card-header text-center h4">
                        Movimientos Bancarios
                </div>

                <div class="card-body">
                        <div class="form-group row">
                            <div class="col-sm-3">
                                <input id="date_begin" type="date" class="form-control <?php $__errorArgs = ['date_begin'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="date_begin" value="<?php echo e(date('Y-m-d', strtotime($datebeginyear ?? $date_begin ?? $datenow))); ?>" required autocomplete="date_begin">

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
                           
                            <div class="col-sm-3">
                                <input id="date_end" type="date" class="form-control <?php $__errorArgs = ['date_end'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="date_end" value="<?php echo e(date('Y-m-d', strtotime($date_end ?? $datenow))); ?>" required autocomplete="date_end">

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
                            <div class="col-sm-2">
                                <select class="form-control" name="coin" id="coin">
                                    <?php if(isset($coin)): ?>
                                        <option disabled selected value="<?php echo e($coin); ?>"><?php echo e($coin); ?></option>
                                        <option disabled  value="<?php echo e($coin); ?>">-----------</option>
                                    <?php else: ?>
                                        <option disabled selected value="bolivares">Moneda</option>
                                    <?php endif; ?>
                                    
                                    <option  value="bolivares">Bolívares</option>
                                    <option value="dolares">Dólares</option>
                                </select>
                            </div>
                            <div class="col-sm-2">
                                <button type="submit" class="btn btn-primary ">
                                    Buscar 
                                 </button>
                                </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-3">
                                <select class="form-control" name="account_bank" id="account_bank">
                                <?php if(isset($account_bank)): ?>
                                    <option selected value="<?php echo e($account_bank->id); ?>"><?php echo e($account_bank->description); ?></option>
                                    <option disabled value="">---------</option>
                                <?php else: ?>
                                    <option selected >Seleccione un Banco</option>
                                <?php endif; ?>
                                
                                <?php $__currentLoopData = $accounts_banks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $accounts_bank): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($accounts_bank->id); ?>"><?php echo e($accounts_bank->description); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                            <div class="col-sm-2">
                                <select class="form-control" name="type" id="type">
                                    <?php if(isset($type)): ?>
                                        <option disabled selected value="<?php echo e($type); ?>"><?php echo e($type); ?></option>
                                        <option disabled  value="<?php echo e($type); ?>">-----------</option>
                                    <?php endif; ?>
                                    <option value="Todo">Todo</option>
                                    <option value="Deposito">Deposito</option>
                                    <option value="Retiro">Retiro</option>
                                    <option value="Transferencia">Transferencia</option>
                                </select>
                            </div>
                            
                        </div>
                    </div>
                    </form>
                        <div class="embed-responsive embed-responsive-16by9">
                            <iframe class="embed-responsive-item" src="<?php echo e(route('reports.bankmovements_pdf',[$type ?? 'Todo',$coin ?? 'bolivares',$datebeginyear ?? $date_begin ?? $datenow,$date_end ?? $datenow,$account_bank ?? null])); ?>" allowfullscreen></iframe>
                          </div>
                        
                        </div>
                </div>
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
        'aLengthMenu': [[-1, 50, 100, 150, 200], ["Todo",50, 100, 150, 200]]
    });

    $("body").toggleClass("sidebar-toggled");
    $(".sidebar").toggleClass("toggled");
    if ($(".sidebar").hasClass("toggled")) {
        $('.sidebar .collapse').collapse('hide');
    };

    let client  = "<?php echo $client->name ?? 0 ?>";  

    if(client != 0){
        $("#client_label1").show();
        $("#client_label2").show();
        $("#client_label3").show();
    }else{
        $("#client_label1").hide();
        $("#client_label2").hide();
        $("#client_label3").hide();
    }
    

    $("#type").on('change',function(){
            type = $(this).val();
            
            if(type == 'todo'){
                $("#client_label1").hide();
                $("#client_label2").hide();
                $("#client_label3").hide();
            }else{
                $("#client_label1").show();
                $("#client_label2").show();
                $("#client_label3").show();
            }
        });

    </script> 

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\aryasoftware\resources\views/admin/reports/index_bankmovements.blade.php ENDPATH**/ ?>