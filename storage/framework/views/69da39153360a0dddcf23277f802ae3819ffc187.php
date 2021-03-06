<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-12">
            <div class="card">
                <form method="POST" action="<?php echo e(route('reports.store_accounts_receivable')); ?>">
                    <?php echo csrf_field(); ?>

                <input type="hidden" name="id_client" value="<?php echo e($client->id ?? null); ?>" readonly>
                <input type="hidden" name="id_vendor" value="<?php echo e($vendor->id ?? null); ?>" readonly>

                <div class="card-header text-center h4">
                        Cuentas por Cobrar
                </div>

                <div class="card-body">
                        <div class="form-group row">
                            <label for="date_end" class="col-sm-1 col-form-label text-md-right">hasta:</label>

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
                            <?php if(isset($client)): ?>
                                <label id="client_label1" for="clients" class="col-sm-1 text-md-right">Cliente:</label>
                                <label id="client_label2" name="id_client" value="<?php echo e($client->id); ?>" for="clients" class="col-sm-3"><?php echo e($client->name); ?></label>
                            <?php endif; ?>
                            <?php if(isset($vendor)): ?>
                                <label id="vendor_label2" name="id_vendor" value="<?php echo e($vendor->id); ?>" for="vendors" class="col-sm-3"><?php echo e($vendor->name); ?></label>
                            <?php endif; ?>
                            
                            <div id="client_label3" class="form-group col-sm-1">
                                <a id="route_select" href="<?php echo e(route('reports.select_client')); ?>" title="Seleccionar Cliente"><i class="fa fa-eye"></i></a>  
                            </div>
                            <div class="col-sm-2">
                                <select class="form-control" name="coin" id="coin">
                                    <?php if(isset($coin)): ?>
                                        <option disabled selected value="<?php echo e($coin); ?>"><?php echo e($coin); ?></option>
                                        <option disabled  value="<?php echo e($coin); ?>">-----------</option>
                                    <?php else: ?>
                                        <option disabled selected value="bolivares">Moneda</option>
                                    <?php endif; ?>
                                    
                                    <option  value="bolivares">Bol??vares</option>
                                    <option value="dolares">D??lares</option>
                                </select>
                            </div>
                            <div class="col-sm-1">
                            <button type="submit" class="btn btn-primary ">
                                Buscar
                             </button>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-2 offset-sm-1">
                                <select class="form-control" name="type" id="type">
                                    <?php if(isset($client)): ?>
                                        <option value="todo">Todo</option>
                                        <option selected value="cliente">Por Cliente</option>
                                        <option value="vendor">Por Vendedor</option>
                                    <?php elseif(isset($vendor)): ?>
                                        <option value="todo">Todo</option>
                                        <option value="cliente">Por Cliente</option>
                                        <option selected value="vendor">Por Vendedor</option>
                                    <?php else: ?>
                                        <option selected value="todo">Todo</option>
                                        <option value="cliente">Por Cliente</option>
                                        <option value="vendor">Por Vendedor</option>
                                    <?php endif; ?>
                                </select>
                            </div>
                            <div class="col-sm-4">
                                <select class="form-control" name="typeinvoice" id="typeinvoice">
                                    <?php if(isset($typeinvoice)): ?>
                                        <?php if($typeinvoice == 'notas'): ?>
                                            <option selected value="notas">Notas de Entrega</option>
                                        <?php elseif($typeinvoice == 'facturas'): ?>
                                            <option selected value="facturas">Facturas</option>
                                        <?php else: ?>
                                            <option selected value="todo">Facturas y Notas de Entrega</option>
                                        <?php endif; ?>
                                        <option disabled value="todo">-----------------</option>
                                        <option value="todo">Facturas y Notas de Entrega</option>
                                        <option value="notas">Notas de Entrega</option>
                                        <option value="facturas">Facturas</option>
                                    <?php else: ?>
                                        <option selected value="todo">Facturas y Notas de Entrega</option>
                                        <option value="notas">Notas de Entrega</option>
                                        <option value="facturas">Facturas</option>
                                    <?php endif; ?>
                                </select>
                            </div>
                        </div>
                    </form>
                        <div class="embed-responsive embed-responsive-16by9">
                            <iframe class="embed-responsive-item" src="<?php echo e(route('reports.accounts_receivable_pdf',[$coin ?? 'bolivares',$date_end ?? $datenow,$typeinvoice ?? 'todo',$typeperson ?? 'ninguno',$client->id ?? $vendor->id ?? null])); ?>" allowfullscreen></iframe>
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
    let vendor  = "<?php echo $vendor->name ?? 0 ?>"; 

    if(client != 0){
        $("#client_label1").show();
        $("#client_label2").show();
        $("#client_label3").show();
    }else if(vendor != 0){
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
            }else if(type == 'vendor'){
                document.getElementById("route_select").href = "<?php echo e(route('reports.select_vendor')); ?>";
                $("#client_label1").show();
                $("#client_label2").show();
                $("#client_label3").show();
            }else{
                $("#client_label1").show();
                $("#client_label2").show();
                $("#client_label3").show();
            }
        });

    </script> 

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\aryasoftware\resources\views/admin/reports/index_accounts_receivable.blade.php ENDPATH**/ ?>