<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-12">
            <div class="card">
                <form method="POST" action="<?php echo e(route('balancegenerals.store')); ?>">
                    <?php echo csrf_field(); ?>

                <div class="card-header text-center h4">
                        Balance General
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
                            <label for="date_end" class="col-sm-1 col-form-label text-md-right">hasta </label>

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
                                <select class="form-control" name="level" id="level">
                                <?php if(isset($level)): ?>
                                    <option selected value="<?php echo e($level); ?>">Nivel <?php echo e($level); ?></option>
                                    <option disabled value="">---------</option>
                                    <option value="1">Nivel 1</option>
                                    <option value="2">Nivel 2</option>
                                    <option value="3">Nivel 3</option>
                                    <option  value="4">Nivel 4</option>
                                    <option  value="4">Nivel 5</option>
                                <?php else: ?>
                                    <option value="1">Nivel 1</option>
                                    <option value="2">Nivel 2</option>
                                    <option value="3">Nivel 3</option>
                                    <option value="4">Nivel 4</option>
                                    <option selected value="5">Nivel 5</option>
                                <?php endif; ?>
                                    
                               
                                </select>
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
                            <div class="col-sm-1">
                            <button type="submit" class="btn btn-primary ">
                                Buscar
                             </button>
                            </div>
                        </div>
                    </form>
                        <div class="embed-responsive embed-responsive-16by9">
                            <iframe class="embed-responsive-item" src="<?php echo e(route('balancegenerals.balance_pdf',[$coin ?? 'bolivares',$datebeginyear ?? $date_begin ?? $datenow,$date_end ?? $datenow,$level ?? 5])); ?>" allowfullscreen></iframe>
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
   
        $("body").toggleClass("sidebar-toggled");
        $(".sidebar").toggleClass("toggled");
        if ($(".sidebar").hasClass("toggled")) {
            $('.sidebar .collapse').collapse('hide');
        };
    



    </script> 

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\aryasoftware\resources\views/admin/reports/index_balance_general.blade.php ENDPATH**/ ?>