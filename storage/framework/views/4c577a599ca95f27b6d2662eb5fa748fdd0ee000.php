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
                <div class="card-header text-center font-weight-bold h3">Debito Fiscal IVA por Pagar</div>

                <div class="card-body">
                    <form method="POST" action="<?php echo e(route('taxes.store')); ?>" enctype="multipart/form-data" onsubmit="return validacion()">
                        <?php echo csrf_field(); ?>
                        <input id="id_account_iva" type="hidden" class="form-control <?php $__errorArgs = ['id_account'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="id_account_iva" value="<?php echo e($account_iva->id); ?>" required autocomplete="id_account_iva" autofocus>
                        <input id="user_id" type="hidden" class="form-control <?php $__errorArgs = ['user_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="user_id" value="<?php echo e(Auth::user()->id); ?>" required autocomplete="user_id">
                        
                        <input id="nro_mes" type="hidden" class="form-control <?php $__errorArgs = ['nro_mes'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="nro_mes" value="<?php echo e($nro_mes); ?>" required autocomplete="nro_mes">
                        
                        <div class="form-group row">
                            <div class="col-sm-2">
                                <label id="date_begin" for="type" >Fecha del Retiro Mes:</label>
                            </div>
                            <div class="col-sm-4">


                                <input name="month" type="text" class="form-control <?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e($mes_nombre); ?>"  readonly>
                            </div>
                            <div class="col-sm-2">
                                <label id="date_begin" for="type" >Fecha del Retiro Año:</label>
                            </div>
                            <div class="col-sm-4">
                                <input type="text" class="form-control <?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="Fecha_Year"  readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-2">
                                <label id="Tipo" for="type" >Tipo:</label>
                            </div>
                            <div class="col-sm-4">
                                <select class="form-control" required name="Tipo" id="type_contado">
                                    <option selected value="">Seleccione..</option>
                                    <option value="contado">Contado</option>
                                    <option value="credito">Credito</option>
                                </select>
                            </div>
                            <div class="col-sm-2" >
                                <label for="Filtro">Retirar / Pagar:</label>
                            </div>
                            <div class="col-sm-4 ">
                                <select  id="account" required name="Filtro" class="form-control">
                                    <option value="" >Seleccionar</option>
                                </select>

                                <?php if($errors->has('account_id')): ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($errors->first('account_id')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-2" >
                                <label for="Filtro">Descripción:</label>
                            </div>
                            <div class="col-sm-10 ">
                                <input id="description" type="text" class="form-control <?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="description" value="<?php echo e(old('Descripcion')); ?>" autocomplete="description">
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
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-2" >
                                <label for="money">Moneda:</label>
                            </div>
                            <div class="col-sm-4 ">
                                <select class="form-control" name="Moneda" id="coin">
                                    <option selected value="bolivares">Bolívares</option>
                                    <option value="dolares">Dolares</option>
                                </select>
                            </div>
                            <div class="col-sm-2">
                                <label for="rate">Tasa:</label>
                            </div>
                            <div class="col-sm-4">
                                <input id="rate" type="text" class="form-control <?php $__errorArgs = ['rate'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="rate" value="<?php echo e(number_format($bcv,2,",",".")); ?>" required autocomplete="rate">
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
                            <div class="col-sm-2">
                                <label for="beneficiario">Beneficiario:</label>
                            </div>
                            <div class="col-sm-4">
                                <input id="nro_ref" type="text" class="form-control <?php $__errorArgs = ['beneficiario'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"  name="Beneficiario" value="SENIAT" readonly autocomplete="beneficiario">
                                <?php $__errorArgs = ['beneficiario'];
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
                                <label for="debito_fiscal_total">Debito Fiscal:</label>
                            </div>
                            <div class="col-sm-4">
                                <input id="debito_fiscal_total" type="text" class="form-control <?php $__errorArgs = ['debito_fiscal_total'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"  name="debito_fiscal_total" value="<?php echo e(number_format($debito_fiscal_total,2,",",".")); ?>" required readonly autocomplete="debito_fiscal_total">
                                <?php $__errorArgs = ['debito_fiscal_total'];
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
                            <div class="col-sm-2">
                                <label for="iva_credito_fiscal_total">Crédito Fiscal:</label>
                            </div>
                            <div class="col-sm-4">
                                <input id="iva_credito_fiscal_total" type="text" readonly class="form-control <?php $__errorArgs = ['iva_credito_fiscal_total'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="0,00" name="iva_credito_fiscal_total" value="<?php echo e(number_format($iva_credito_fiscal_total,2,",",".")); ?>" required autocomplete="iva_credito_fiscal_total">
                                <?php $__errorArgs = ['iva_credito_fiscal_total'];
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
                                <label for="total_excedente">Excedente:</label>
                            </div>
                            <div class="col-sm-4">
                                <input id="total_excedente" readonly type="text" class="form-control <?php $__errorArgs = ['total_excedente'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="0,00" name="total_excedente" value="<?php echo e(number_format($total_excedente ?? 0,2,",",".")); ?>" required autocomplete="total_excedente">
                                <?php $__errorArgs = ['total_excedente'];
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
                            <div class="col-sm-2">
                                <label for="total_pay">Monto:</label>
                            </div>
                            <div class="col-sm-4">
                                <input id="total_pay" type="text" readonly class="form-control <?php $__errorArgs = ['total_pay'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="0,00" name="total_pay" value="<?php echo e(number_format($total_pay ?? 0,2,",",".")); ?>" required autocomplete="total_pay">
                                <?php $__errorArgs = ['total_pay'];
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
                                <label for="iva_retenido_terceros_total">Retenciónes del Perido:</label>
                            </div>
                            <div class="col-sm-4">
                                <input id="iva_retenido_terceros_total"  readonly type="text" class="form-control <?php $__errorArgs = ['iva_retenido_terceros_total'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="0,00" name="iva_retenido_terceros_total" value="<?php echo e(number_format($iva_retenido_terceros_total ?? 0,2,",",".")); ?>" required autocomplete="iva_retenido_terceros_total">
                                <?php $__errorArgs = ['iva_retenido_terceros_total'];
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
                            <div class="col-sm-2">
                                <label for="amount">Total a Pagar:</label>
                            </div>
                            <div class="col-sm-4">
                                <input id="amount" type="text" class="form-control <?php $__errorArgs = ['amount'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="0,00" name="amount" value="<?php echo e(old('amount')); ?>" required autocomplete="amount">
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
                            <div class="col-sm-2">
                                <label for="counterpart">Contrapartida:</label>
                            </div>
                            <div class="col-sm-4">
                                <select class="form-control" id="exampleFormControlSelect1">
                                    <option>Debito Fiscal IVA por Pagar</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-2">
                                <label for="id_branch">Centro de costo:</label>
                            </div>
                            <div class="col-sm-4">
                                    <select class="form-control" id="exampleFormControlSelect1">
                                        <option>Seleccione..</option>
                                        <?php $__currentLoopData = $branches; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($index); ?>" <?php echo e(old('Botones') == $index ? 'selected' : ''); ?>>
                                                <?php echo e($value); ?>

                                            </option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                            </div>
                            <div class="col-sm-2">
                                <label for="cheque">Emitir Cheque:</label>
                            </div>
                            <div class="col-sm-4">
                                <select class="form-control" id="exampleFormControlSelect1">
                                    <option>NO</option>
                                    <option>SI</option>
                                </select>
                            </div>
                        </div>
                       
                        <div id="div_nro" style="display: none">
                            <div class="form-group row">
                                <div class="col-sm-2">
                                    <label for="nro_ref">Nro Referencia:</label>
                                </div>
                                <div class="col-sm-4">
                                    <input id="nro_ref" type="text" class="form-control <?php $__errorArgs = ['nro_ref'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="0000" name="Nro_Ref" value="<?php echo e(old('Nro_Ref')); ?>" autocomplete="nro_ref">
                                    <?php $__errorArgs = ['nro_ref'];
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
                        <br>
                        <div class="form-group row mb-0">
                            <div class="col-sm-3 offset-sm-2">
                                <button type="submit" class="btn btn-primary">
                                   Pagar Impuesto
                                </button>
                            </div>
                            <div class="col-sm-2">
                                <a href="<?php echo e(route('taxes.iva_paymentindex')); ?>" id="btnvolver" name="btnvolver" class="btn btn-danger" title="volver">Volver</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('javascript_iva_payment'); ?>

    <script>

            var fecha = new Date();
            var ano = fecha.getFullYear();
            document.getElementsByName("Fecha_Year")[0].value = ano ;

            $("#filtro_mount").on('change',function(){
                var mes_id = $(this).val();
                var fecha   = new Date();
                var ano     = fecha.getFullYear();
                $fe

                if(metodo_id == 1){
                    document.getElementById("pp-button").style.display   = "none";
                    document.getElementById("div_pagar").style.display   = "block";
                }

                if(metodo_id == 2){
                    document.getElementById("pp-button").style.display   = "block";
                    document.getElementById("div_pagar").style.display   = "none";
                }

            });

            $("#type_contado").on('change',function(){
            var type_id = $(this).val();

            if(type_id == 'contado'){
                document.getElementById("div_nro").style.display   = "block";
            }

            if(type_id == 'credito'){
                document.getElementById("div_nro").style.display   = "none";
            }

        });

        $(document).ready(function () {
            $("#amount").mask('000.000.000.000.000,00', { reverse: true });

        });
        $(document).ready(function () {
            $("#reference").mask('0000000000000000', { reverse: true });

        });
        $(document).ready(function () {
            $("#rate").mask('000.000.000.000.000,00', { reverse: true });

        });

        $("#type_contado").on('change',function(){

            var type = $(this).val();

            getAccount(type);
        });

        function getAccount(type){

            $.ajax({
                url:"<?php echo e(route('taxes.list_account','')); ?>" + '/' + type,
                beforSend:()=>{
                    alert('consultando datos');
                },
                success:(response)=>{
                    let subbeneficiario = $("#account");
                    let htmlOptions = `<option value='' >Seleccione..</option>`;
                    // console.clear();
                    if(response.length > 0){
                        response.forEach((item, index, object)=>{
                            let {id,description} = item;
                            htmlOptions += `<option value='${id}' <?php echo e(old('Subbeneficiario') == '${id}' ? 'selected' : ''); ?>>${description}</option>`

                        });
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


        function validacion() 
        {
            
            let amount = document.getElementById("amount").value; 
            
            var montoFormat = inputamount.replace(/[$.]/g,'');

            var montoFormat_amount = montoFormat.replace(/[,]/g,'.');
            
            if (montoFormat_amount <= 0 ) {

                alert('El monto a pagar debe ser mayor a Cero');
                return false;
            }
            else {
                return true;
            }

        }
    </script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\aryasoftware\resources\views/admin/taxes/iva_payment.blade.php ENDPATH**/ ?>