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
        <div class="col-12">
            <div class="card">
                <div class="card-header text-center font-weight-bold h3">Registro de Compañía</div>

                <div class="card-body">
                    <form method="POST" action="<?php echo e(route('companies.store')); ?>">
                        <?php echo csrf_field(); ?>
                        <input type="hidden" id="dolar" name="dolar"   value="<?php echo e($bcv); ?>">
                        <div class="form-group row">
                            <label for="login" class="col-sm-2 col-form-label">Login(*)</label>

                            <div class="col-sm-4">
                                <input id="login" type="text" class="form-control <?php $__errorArgs = ['login'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="Login" value="<?php echo e($company->login ?? ''); ?>" required autocomplete="login" autofocus>

                                <?php $__errorArgs = ['login'];
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
                            <label for="email" class="col-sm-2 col-form-label ">Correo Electronico(*)</label>

                            <div class="col-sm-4">
                                <input id="email" type="email" class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="Email" value="<?php echo e($company->email ?? ''); ?>" required autocomplete="email" autofocus>

                                <?php $__errorArgs = ['email'];
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
                            <label for="code_rif" class="col-sm-2 col-form-label ">RIF(*)</label>
                            <div class="col-sm-4">
                                <input id="code_rif" type="text" class="form-control <?php $__errorArgs = ['code_rif'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="Codigo" value="<?php echo e($company->code_rif ?? ''); ?>" required autocomplete="code_rif" autofocus>
                                <?php $__errorArgs = ['code_rif'];
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
                            <label for="razon_social" class="col-sm-2 col-form-label ">Razon Social(*)</label>
                            <div class="col-sm-4">
                                <input id="razon_social" type="text" class="form-control <?php $__errorArgs = ['razon_social'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="Razon_Social" value="<?php echo e($company->razon_social ?? ''); ?>" required autocomplete="razon_social" autofocus>
                                <?php $__errorArgs = ['razon_social'];
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
                            <label for="phone" class="col-sm-2 col-form-label ">Telefono(*)</label>
                            <div class="col-sm-4">
                                <input id="phone" type="text" class="form-control <?php $__errorArgs = ['phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="phone" value="<?php echo e($company->phone ?? ''); ?>" required autocomplete="phone" autofocus >

                                <?php $__errorArgs = ['phone'];
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
                            <label for="franqueo_postal" class="col-sm-2 col-form-label">Franqueo Postal(*)</label>

                            <div class="col-sm-4">
                                <input id="franqueo_postal" type="text" class="form-control <?php $__errorArgs = ['franqueo_postal'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="Franqueo_Postal" value="<?php echo e($company->franqueo_postal ?? ''); ?>" autocomplete="franqueo_postal" >

                                <?php $__errorArgs = ['franqueo_postal'];
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
                            <label for="andress" class="col-sm-2 col-form-label ">Direccion(*)</label>
                            <div class="col-sm-10">
                                <input id="andress" type="text" class="form-control <?php $__errorArgs = ['andress'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="Direccion" value="<?php echo e($company->address ?? ''); ?>" required autocomplete="andress" autofocus>

                                <?php $__errorArgs = ['andress'];
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
                            <label for="tax_1" class="col-sm-2 col-form-label ">Impuesto(*)</label>
                            <div class="col-sm-4">
                                <input id="tax_1" type="text" class="form-control <?php $__errorArgs = ['tax_1'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="Impuesto" value="<?php echo e($company->tax_1 ?? 0); ?>" required autocomplete="tax_1" autofocus >

                                <?php $__errorArgs = ['tax_1'];
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
                            <label for="tax_2" class="col-sm-2 col-form-label">Impuesto-2</label>
                            <div class="col-sm-4">
                                <input id="tax_2" type="text" class="form-control <?php $__errorArgs = ['tax_2'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="Impuesto_2" value="<?php echo e($company->tax_2 ?? 0); ?>"  autocomplete="tax_2">

                                <?php $__errorArgs = ['tax_2'];
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
                            <label for="tax_3" class="col-sm-2 col-form-label ">Impuesto-3</label>
                            <div class="col-sm-4">
                                <input id="tax_3" type="text" class="form-control <?php $__errorArgs = ['tax_3'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="Impuesto_3" value="<?php echo e($company->tax_3 ?? 0); ?>"  autocomplete="tax_3" autofocus>

                                <?php $__errorArgs = ['tax_3'];
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
                            <label for="retencion" class="col-sm-2 col-form-label">Retencion-ISRL:</label>
                            <div class="col-sm-4">
                                <input id="retencion" type="text" class="form-control <?php $__errorArgs = ['retencion'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="Retencion_ISRL" value="<?php echo e($company->retention_islr ?? 0); ?>"  autocomplete="retencion">

                                <?php $__errorArgs = ['retencion'];
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
                                <label for="tipo_inv">Tipo de Inventario:</label>
                            </div>
                            <div class="col-sm-4">
                                <?php if(isset($company->tipoinv_id)): ?>
                                <select class="form-control" id="tipo_inv" name="Tipo_Inventario">
                                    <option value="<?php echo e($company->tipoinv_id); ?>" required><?php echo e($company->tipoinv['description']); ?></option>
                                    <option value="" disabled>-----------</option>
                                    <?php $__currentLoopData = $tipoinvs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($index); ?>" <?php echo e(old('Tipo_Inventario') == $index ? 'selected' : ''); ?>>
                                            <?php echo e($value); ?>

                                        </option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>

                                <?php if($errors->has('tipo_inv')): ?>
                                    <span class="invalid-feedback" role="alert">
                                                <strong><?php echo e($errors->first('tipo_inv')); ?></strong>
                                            </span>
                                <?php endif; ?>
                                <?php endif; ?>
                            </div>
                            <div class="col-sm-2">
                                <label for="tipo_rate">Tipo Tasa:</label>
                            </div>
                            <div class="col-sm-4">
                                <?php if(isset($company->tiporate_id)): ?>
                                <select class="form-control" id="rate_type" name="rate_type">
                                    <option value="<?php echo e($company->tiporate_id); ?>" required><?php echo e($company->tiporate['description']); ?></option>
                                    <option value="" disabled>-----------</option>
                                    <?php $__currentLoopData = $tiporates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($index); ?>" <?php echo e(old('rate_type') == $index ? 'selected' : ''); ?>>
                                            <?php echo e($value); ?>

                                        </option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>

                                <?php if($errors->has('rate_type')): ?>
                                    <span class="invalid-feedback" role="alert">
                                                <strong><?php echo e($errors->first('rate_type')); ?></strong>
                                            </span>
                                <?php endif; ?>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="tax_3" class="col-sm-2 col-form-label ">Tasa</label>
                            <div class="col-sm-4">
                                    <input id="rate" type="text" class="form-control <?php $__errorArgs = ['rate'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="Tasa" value="<?php echo e($company->rate ?? 0); ?>" required autocomplete="rate" autofocus>

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
                            <label for="rate_petro" class="col-sm-2 col-form-label">Tasa Petro:</label>
                            <div class="col-sm-4">
                                <input id="rate_petro" type="text" class="form-control <?php $__errorArgs = ['rate_petro'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="Tasa_Petro" value="<?php echo e($company->rate_petro ?? 0); ?>" required autocomplete="rate_petro" >

                                <?php $__errorArgs = ['rate_petro'];
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
                            <label for="periodo" class="col-sm-2 col-form-label">Periodo Actual:</label>
                            <div class="col-sm-4">
                                <input id="periodo" type="text" class="form-control <?php $__errorArgs = ['periodo'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="Periodo" value="<?php echo e($periodo); ?>" required autocomplete="periodo" readonly>

                                <?php $__errorArgs = ['periodo'];
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
                            <label for="pie_factura" class="col-sm-2 col-form-label">Pie de Factura:</label>
                            <div class="col-sm-4">
                                <input id="pie_factura" type="text" class="form-control <?php $__errorArgs = ['pie_factura'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="pie_factura" value="<?php echo e($company->pie_factura ?? null); ?>" autocomplete="pie_factura" >

                                <?php $__errorArgs = ['pie_factura'];
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
                            <div class="form-group  col-sm-2 offset-sm-4">
                                <button type="submit" class="btn btn-info btn-block"><i class="fa fa-send-o"></i>Guardar</button>
                            </div>
                           
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('validacion'); ?>
    <script>
	
    $(document).ready(function () {
        $("#phone").mask('0000 000-0000', { reverse: true });
            
    });
    $(document).ready(function () {
        $("#rate").mask('000.000.000.000.000.000.000.000,00', { reverse: true });
            
    });
    $(document).ready(function () {
        $("#rate_petro").mask('000.000.000.000.000.000.000.000,00', { reverse: true });
            
    });
    $(document).ready(function () {
        $("#retencion").mask('000.000.000.000.000.000.000.000,00', { reverse: true });
            
    });
    $(document).ready(function () {
        $("#tax_1").mask('000,00', { reverse: true });
            
    });
    $(document).ready(function () {
        $("#tax_2").mask('000,00', { reverse: true });
            
    });
    $(document).ready(function () {
        $("#tax_3").mask('000,00', { reverse: true });
            
    });

    /*$("#tipo_rate").change(function(){
        var opc     = $("#tipo_rate").val();
        var dolar   =document.getElementById("dolar").value;

        if(opc == '1'){
            $("#tasa").attr("readonly", true);
            document.getElementById("tasa").value = "";
            document.getElementsByName("Tasa")[0].value = dolar;
        }else if(opc == '2'){
            $("#tasa").attr("readonly", false);
            document.getElementById("tasa").value = "";
        }else{
            document.getElementById("tasa").value = "";
            $("#tasa").attr("readonly", true);
            document.getElementsByName("Tasa")[0].value = '1';
        }

    });*/

        $("#rate_type").on('change',function(){
            var rate_type = $(this).val();
            
            getSearch(rate_type);
        });

        function getSearch(rate_type){
            
            if(rate_type == 1){

            $.ajax({
                url:"<?php echo e(route('companies.bcvlist')); ?>",
                beforSend:()=>{
                    alert('consultando datos');
                },
                success:(response)=>{
                   
                    if(response.length > 0){

                        document.getElementById("rate").value = response;
                    }
                   
                   
                },
                error:(xhr)=>{
                    
                }
            })
            }
        }

    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\aryasoftware\resources\views/admin/companies/create.blade.php ENDPATH**/ ?>