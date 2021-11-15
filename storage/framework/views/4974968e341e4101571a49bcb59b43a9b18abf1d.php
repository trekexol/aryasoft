<?php $__env->startSection('content'); ?>



    
    <?php echo $__env->make('admin.layouts.success', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>   
    <?php echo $__env->make('admin.layouts.danger', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>    
    <?php echo $__env->make('admin.layouts.delete', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>    
    
    
<?php if($errors->any()): ?>
        <div class="alert alert-danger">
            <ul>
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    <?php endif; ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Ordenes de Pago Directas</div>

                <div class="card-body">
                    <form method="POST" action="<?php echo e(route('directpaymentorders.store')); ?>" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                       <input id="user_id" type="hidden" class="form-control <?php $__errorArgs = ['user_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="user_id" value="<?php echo e(Auth::user()->id); ?>" required autocomplete="user_id">
                        
                        <div class="form-group row">
                            <?php if(isset($accounts)): ?>
                            <label for="account" class="col-md-2 col-form-label text-md-right">Retirar desde:</label>
                        
                            <div class="col-md-4">
                            <select id="account"  name="account" class="form-control" required>
                                <option value="">Seleccione una Cuenta</option>
                                <?php $__currentLoopData = $accounts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($index); ?>" <?php echo e(old('account') == $index ? 'selected' : ''); ?>>
                                        <?php echo e($value); ?>

                                    </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>

                                <?php if($errors->has('account_id')): ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($errors->first('account_id')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                            <?php endif; ?>
                            
                       
                            <label for="date_begin" class="col-md-3 col-form-label text-md-right">Fecha del Retiro:</label>

                            <div class="col-md-3">
                                <input id="date_begin" type="date" class="form-control <?php $__errorArgs = ['date_begin'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="date" value="<?php echo e($datenow ?? old('date_begin')); ?>" required autocomplete="date_begin">

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
                            
                            <label for="description" class="col-md-2 col-form-label text-md-right">Descripción</label>

                            <div class="col-md-4">
                                <input id="description" type="text" class="form-control <?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="description" value="<?php echo e(old('description')); ?>"  autocomplete="description">

                                <?php $__errorArgs = ['description'];
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
                            <label for="reference" class="col-md-3 col-form-label text-md-right">Número de Referencia:</label>

                            <div class="col-md-3">
                                <input id="reference" type="text" class="form-control <?php $__errorArgs = ['reference'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="reference" value="<?php echo e(old('reference')); ?>"  autocomplete="reference">

                                <?php $__errorArgs = ['reference'];
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
                        <br>
                        <div class="form-group row">
                            <label for="beneficiario" class="col-md-2 col-form-label text-md-right">Beneficiario:</label>
                        
                            <div class="col-md-4">
                            <select id="beneficiario"  name="beneficiario" class="form-control" required>
                                <option value="">Seleccione un Beneficiario</option>
                               
                                    <option value="1" <?php echo e(old('Beneficiario') == 'Cliente' ? 'selected' : ''); ?>>
                                        Clientes
                                    </option>
                                    <option value="2" <?php echo e(old('Beneficiario') == 'Proveedor' ? 'selected' : ''); ?>>
                                        Proveedores
                                    </option>
                                </select>

                                <?php if($errors->has('beneficiario_id')): ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($errors->first('beneficiario_id')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                       
                          <div class="col-md-4">
                                <select  id="subbeneficiario"  name="Subbeneficiario" class="form-control" required>
                                    <option value="">Seleccionar</option>
                                </select>

                                <?php if($errors->has('subbeneficiario_id')): ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($errors->first('subbeneficiario_id')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>  
                        <div class="form-group row">
                           
                            <label for="contrapartida" class="col-md-2 col-form-label text-md-right">Contrapartida:</label>
                            <div class="col-md-4">
                                <select id="type_form"  name="type_form" class="form-control" required>
                                    <option value="-1">Seleccionar</option>
                                    <option value="1">Inventario de Mercancia</option>
                                    <option value="2">Propiedad, Planta y Equipo</option>
                                    <option value="3">Costos de Ventas</option>
                                    <option value="4">Gastos - Personal</option>
                                    <option value="5">Gastos - Tributos</option>
                                    <option value="6">Gastos - Municipales</option>
                                    <option value="7">Gastos - Administración</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <select  id="account_counterpart"  name="Account_counterpart" class="form-control" required>
                                    <option value="">Seleccionar</option>
                                    <?php if(isset($accounts_inventory)): ?>
                                        <?php $__currentLoopData = $accounts_inventory; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $var): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($var->id); ?>"><?php echo e($var->description); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                                </select>

                                <?php if($errors->has('account')): ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($errors->first('account')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>  
                        <div class="form-group row">
                            
                            <label for="amount" class="col-md-2 col-form-label text-md-right">Monto del Retiro:</label>

                            <div class="col-md-4">
                                <input id="amount" type="text" class="form-control <?php $__errorArgs = ['amount'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="amount" value="<?php echo e(old('amount')); ?>" required autocomplete="amount">

                                <?php $__errorArgs = ['amount'];
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
                            <label for="rate" class="col-md-2 col-form-label text-md-right">Tasa:</label>

                            <div class="col-md-4">
                                <input id="rate" type="text" class="form-control <?php $__errorArgs = ['rate'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="rate" value="<?php echo e(number_format($bcv, 2, ',', '.')); ?>"  autocomplete="rate">

                                <?php $__errorArgs = ['rate'];
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
                            <label id="coinlabel" for="coin" class="col-md-2 col-form-label text-md-right">Moneda:</label>

                            <div class="col-md-2">
                                <select class="form-control" name="coin" id="coin">
                                    <option value="bolivares">Bolívares</option>
                                    <?php if($coin == 'dolares'): ?>
                                        <option selected value="dolares">Dolares</option>
                                    <?php else: ?> 
                                        <option value="dolares">Dolares</option>
                                    <?php endif; ?>
                                </select>
                            </div>
                            <?php if(isset($branches)): ?>
                            <label for="branch" class="col-md-2 offset-md-2 col-form-label text-md-right">Centro de Costo:</label>
                            <div class="col-md-2">
                                <select id="branch"  name="branch" class="form-control" >
                                    <option value="ninguno">Ninguno</option>
                                    <?php $__currentLoopData = $branches; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $var): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($var->id); ?>"><?php echo e($var->description); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                            <?php endif; ?>
                        </div>
                       
                        <br>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                   Guardar
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('javascript'); ?>
    
    <script>
        $(document).ready(function () {
            $("#amount").mask('000.000.000.000.000.000.000,00', { reverse: true });
            
        });
        $(document).ready(function () {
            $("#rate").mask('000.000.000.000.000.000.000,00', { reverse: true });
            
        });

        $("#coin").on('change',function(){
            var coin = $(this).val();

            var amount = document.getElementById("amount").value;
            var montoFormat = amount.replace(/[$.]/g,'');
            var amountFormat = montoFormat.replace(/[,]/g,'.');

            var rate = document.getElementById("rate").value;
            var rateFormat = rate.replace(/[$.]/g,'');
            var rateFormat = rateFormat.replace(/[,]/g,'.');

            if(coin != 'bolivares'){

                var total = amountFormat / rateFormat;

                document.getElementById("amount").value = total.toLocaleString('de-DE', {minimumFractionDigits: 2,maximumFractionDigits: 2});;
            }else{
                var total = amountFormat * rateFormat;

                document.getElementById("amount").value = total.toLocaleString('de-DE', {minimumFractionDigits: 2,maximumFractionDigits: 2});;
           
            }
        });
    </script> 

<?php $__env->stopSection(); ?>     

<?php $__env->startSection('javascript2'); ?>
<script>
        
        $("#beneficiario").on('change',function(){
           
            var beneficiario_id = $(this).val();
            $("#subbeneficiario").val("");
           
            // alert(beneficiario_id);
            getSubbeneficiario(beneficiario_id);
        });

    function getSubbeneficiario(beneficiario_id){
       
       
        $.ajax({
            url:"<?php echo e(route('directpaymentorders.listbeneficiary')); ?>" + '/' + beneficiario_id,
           
            beforSend:()=>{
                alert('consultando datos');
            },
            success:(response)=>{
                let subbeneficiario = $("#subbeneficiario");
                let htmlOptions = `<option value='' >Seleccione..</option>`;
                // console.clear();

                if(response.length > 0){
                    if(beneficiario_id == "1"){
                        response.forEach((item, index, object)=>{
                            let {id,name} = item;
                            htmlOptions += `<option value='${id}' <?php echo e(old('Subbeneficiario') == '${id}' ? 'selected' : ''); ?>>${name}</option>`

                        });
                    }else{
                        response.forEach((item, index, object)=>{
                            let {id,razon_social} = item;
                            htmlOptions += `<option value='${id}' <?php echo e(old('Subbeneficiario') == '${id}' ? 'selected' : ''); ?>>${razon_social}</option>`

                        });
                    }
                }
                //console.clear();
                // console.log(htmlOptions);
                subbeneficiario.html('');
                subbeneficiario.html(htmlOptions);
            
                
            
            },
            error:(xhr)=>{
                alert('Presentamos inconvenientes al consultar los datos');
            }
        })
    }

    $("#subbeneficiario").on('change',function(){
            var subbeneficiario_id = $(this).val();
            var beneficiario_id    = document.getElementById("beneficiario").value;
            
        });


</script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('consultadeposito'); ?>
    <script>
         $("#type_form").on('change',function(){
            type_var = $(this).val();
           
            searchCode(type_var);
        });
        function searchCode(type_var){

            $.ajax({
                
                url:"<?php echo e(route('expensesandpurchases.listaccount')); ?>" + '/' + type_var,
                beforSend:()=>{
                    alert('consultando datos');
                },
                success:(response)=>{
                
                    let account = $("#account_counterpart");
                    let htmlOptions = `<option value='' >Seleccione..</option>`;
                    // console.clear();
                    if(response.length > 0){
                        
                        response.forEach((item, index, object)=>{
                            let {id,description} = item;
                            htmlOptions += `<option value='${id}' <?php echo e(old('Account') == '${id}' ? 'selected' : ''); ?>>${description}</option>`

                        });
                    }
                    account.html('');
                    account.html(htmlOptions);
                
                    
                
                },
                error:(xhr)=>{
                }
            })
        }

        $("#contrapartida").on('change',function(){
            var contrapartida_id = $(this).val();
            $("#subcontrapartida").val("");
            
            getSubcontrapartida(contrapartida_id);
        });

        function getSubcontrapartida(contrapartida_id){
            
            $.ajax({
                url:"<?php echo e(route('directpaymentorders.listcontrapartida')); ?>" + '/' + contrapartida_id,
                beforSend:()=>{
                    alert('consultando datos');
                },
                success:(response)=>{
                    let subcontrapartida = $("#subcontrapartida");
                    let htmlOptions = `<option value='' >Seleccione..</option>`;
                    // console.clear();
                    if(response.length > 0){
                        response.forEach((item, index, object)=>{
                            let {id,description} = item;
                            htmlOptions += `<option value='${id}' <?php echo e(old('Subcontrapartida') == '${id}' ? 'selected' : ''); ?>>${description}</option>`

                        });
                    }
                    //console.clear();
                    // console.log(htmlOptions);
                    subcontrapartida.html('');
                    subcontrapartida.html(htmlOptions);
                
                    
                
                },
                error:(xhr)=>{
                    alert('Presentamos inconvenientes al consultar los datos');
                }
            })
        }

        $("#subcontrapartida").on('change',function(){
                var subcontrapartida_id = $(this).val();
                var contrapartida_id    = document.getElementById("contrapartida").value;
                
            });

        
	$(function(){
        soloNumeros('xtelf_local');
        soloNumeros('xtelf_cel');
    });
    
 



    </script>
<?php $__env->stopSection(); ?>



<?php echo $__env->make('admin.layouts.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\aryasoftware\resources\views/admin/directpaymentorder/createretirement.blade.php ENDPATH**/ ?>