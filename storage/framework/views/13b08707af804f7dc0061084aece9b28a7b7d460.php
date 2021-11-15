<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-12">
            <div class="card">
                <form method="POST" action="<?php echo e(route('reports.store_debtstopay')); ?>">
                    <?php echo csrf_field(); ?>

                <input type="hidden" name="id_provider" value="<?php echo e($provider->id ?? null); ?>" readonly>

                <div class="card-header text-center h4">
                        Cuentas por Pagar
                </div>

                <div class="card-body">
                        <div class="form-group row">
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
                                <select class="form-control" name="type" id="type">
                                    <?php if(isset($provider)): ?>
                                        <option value="todo">Todo</option>
                                        <option selected value="proveedor">Por Proveedor</option>
                                    <?php else: ?>
                                        <option selected value="todo">Todo</option>
                                        <option value="proveedor">Por Proveedor</option>
                                    <?php endif; ?>
                                    
                                    
                                </select>
                            </div>
                            
                            <label id="provider_label1" for="providers" class="col-sm-2 text-md-right">Proveedor:</label>
                            <?php if(isset($provider)): ?>
                                <label id="provider_label2"  for="providers" class="col-sm-2 "><?php echo e($provider->razon_social); ?></label>
                            <?php endif; ?>
                            
                            <div id="provider_label3" class="form-group col-sm-1">
                                <a href="<?php echo e(route('reports.select_provider')); ?>" title="Seleccionar Proveedor"><i class="fa fa-eye"></i></a>  
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
                            <iframe class="embed-responsive-item" src="<?php echo e(route('reports.debtstopay_pdf',[$coin ?? "bolivares",$date_end ?? $datenow,$provider->id ?? null])); ?>" allowfullscreen></iframe>
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

    let provider  = "<?php echo $provider->razon_social ?? 0 ?>";  

    if(provider != 0){
        $("#provider_label1").show();
        $("#provider_label2").show();
        $("#provider_label3").show();
    }else{
        $("#provider_label1").hide();
        $("#provider_label2").hide();
        $("#provider_label3").hide();
    }
    

    $("#type").on('change',function(){
            type = $(this).val();
            
            if(type == 'todo'){
                $("#provider_label1").hide();
                $("#provider_label2").hide();
                $("#provider_label3").hide();
            }else{
                $("#provider_label1").show();
                $("#provider_label2").show();
                $("#provider_label3").show();
            }
        });

    </script> 

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\aryasoftware\resources\views/admin/reports/index_debtstopay.blade.php ENDPATH**/ ?>