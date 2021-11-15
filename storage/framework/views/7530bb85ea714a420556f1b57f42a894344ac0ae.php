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
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">Editar Proveedor</div>

                <div class="card-body">
                    <form  method="POST"   action="<?php echo e(route('providers.update',$var->id)); ?>" enctype="multipart/form-data" >
                        <?php echo method_field('PATCH'); ?>
                        <?php echo csrf_field(); ?>
                        
                        <div class="form-group row">
                            <label for="code_provider" class="col-sm-2 col-form-label text-md-right">Código de Proveedor</label>

                            <div class="col-sm-4">
                                <input id="code_provider" type="text" class="form-control <?php $__errorArgs = ['code_provider'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="code_provider" value="<?php echo e($var->code_provider); ?>" required autocomplete="code_provider" autofocus>

                                <?php $__errorArgs = ['code_provider'];
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
                            <label for="razon_social" class="col-sm-2 col-form-label text-md-right">Razón Social</label>

                            <div class="col-sm-4">
                                <input id="razon_social" type="text" class="form-control <?php $__errorArgs = ['razon_social'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="razon_social" value="<?php echo e($var->razon_social); ?>" required autocomplete="razon_social">

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
                            <label for="country" class="col-sm-2 col-form-label text-md-right">Pais</label>

                            <div class="col-sm-4">
                                <input id="country" type="text" class="form-control <?php $__errorArgs = ['country'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="country" value="<?php echo e($var->country); ?>" required autocomplete="country">

                                <?php $__errorArgs = ['country'];
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
                            <label for="city" class="col-sm-2 col-form-label text-md-right">Ciudad</label>

                            <div class="col-sm-4">
                                <input id="city" type="text" class="form-control <?php $__errorArgs = ['city'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="city" value="<?php echo e($var->city); ?>" required autocomplete="city">

                                <?php $__errorArgs = ['city'];
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
                            <label for="direction" class="col-sm-2 col-form-label text-md-right">Dirección</label>

                            <div class="col-sm-4">
                                <input id="direction" type="text" class="form-control <?php $__errorArgs = ['direction'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="direction" value="<?php echo e($var->direction); ?>" required autocomplete="direction">

                                <?php $__errorArgs = ['direction'];
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
                            <label for="phone1" class="col-sm-2 col-form-label text-md-right">Teléfono</label>

                            <div class="col-sm-4">
                                <input id="phone1" type="text" class="form-control <?php $__errorArgs = ['phone1'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="phone1" value="<?php echo e($var->phone1); ?>" required autocomplete="phone1">

                                <?php $__errorArgs = ['phone1'];
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
                            <label for="phone2" class="col-sm-2 col-form-label text-md-right">Teléfono 2</label>

                            <div class="col-sm-4">
                                <input id="phone2" type="text" class="form-control <?php $__errorArgs = ['phone2'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="phone2" value="<?php echo e($var->phone2); ?>" required autocomplete="phone2">

                                <?php $__errorArgs = ['phone2'];
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
                            <label for="amount_max_credit" class="col-sm-2 col-form-label text-md-right">Monto Máximo de Crédito</label>

                            <div class="col-sm-4">
                                <input id="amount_max_credit" type="text" class="form-control <?php $__errorArgs = ['amount_max_credit'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="amount_max_credit" value="<?php echo e(number_format($var->amount_max_credit, 2, ',', '.')); ?>" required autocomplete="amount_max_credit">

                                <?php $__errorArgs = ['amount_max_credit'];
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
                              
                              <label for="balance" class="col-sm-2 col-form-label text-md-right">Saldo</label>

                              <div class="col-sm-4">
                                  <input id="balance" type="text" class="form-control <?php $__errorArgs = ['balance'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="balance" value="<?php echo e(number_format($var->balance, 2, ',', '.')); ?>" required autocomplete="balance">
  
                                  <?php $__errorArgs = ['balance'];
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
                            <label for="email" class="col-sm-2 col-form-label text-md-right">Tiene Crédito</label>

                            <div class="form-check">
                                <?php if($var->has_credit == 1): ?>
                                    <input class="form-check-input position-static" type="checkbox" onclick="calc();" id="has_credit" name="has_credit" value="true" checked aria-label="...">
                                <?php else: ?>
                                    <input class="form-check-input position-static" type="checkbox" onclick="calc();" id="has_credit" name="has_credit"  aria-label="...">
                                <?php endif; ?>
                            </div>
                            <label id="days_credit_label" for="days_credit" class="col-sm-2 col-form-label text-md-right">Dias de Crédito</label>

                            <div class="col-sm-1">
                            <input id="days_credit" type="text" class="form-control <?php $__errorArgs = ['days_credit'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="days_credit" value="<?php echo e($var->days_credit); ?>" required autocomplete="days_credit">

                            <?php $__errorArgs = ['days_credit'];
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
                            <label for="porc_retencion_iva" class="col-sm-2 col-form-label text-md-right">Porcentaje Retención de IVA</label>

                            <div class="col-sm-4">
                                <input id="porc_retencion_iva" type="text" class="form-control <?php $__errorArgs = ['porc_retencion_iva'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="porc_retencion_iva" value="<?php echo e($var->porc_retencion_iva); ?>" required autocomplete="porc_retencion_iva">

                                <?php $__errorArgs = ['porc_retencion_iva'];
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
                            <label for="porc_retencion_islr" class="col-sm-2 col-form-label text-md-right">Porcentaje Retención de ISLR</label>

                            <div class="col-sm-4">
                                <input id="porc_retencion_islr" type="text" class="form-control <?php $__errorArgs = ['porc_retencion_islr'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="porc_retencion_islr" value="<?php echo e($var->porc_retencion_islr); ?>" required autocomplete="porc_retencion_islr">

                                <?php $__errorArgs = ['porc_retencion_islr'];
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
                            <label for="segmento" class="col-sm-2 col-form-label text-md-right">Status</label>
                            <div class="col-sm-2">
                                <select class="form-control" id="status" name="status" title="status">
                                    <?php if($var->status == 1): ?>
                                        <option value="1">Activo</option>
                                    <?php else: ?>
                                        <option value="0">Inactivo</option>
                                    <?php endif; ?>
                                    <option value="nulo">----------------</option>
                                    
                                    <div class="dropdown">
                                        <option value="1">Activo</option>
                                        <option value="0">Inactivo</option>
                                    </div>
                                    
                                    
                                </select>
                            </div>
                        </div>
                    
                        <br>
                        <div class="form-group row mb-0">
                            <div class="form-group col-sm-4 offset-sm-2">
                                <button type="submit" class="btn btn-success btn-block"><i class="fa fa-send-o"></i>Actualizar</button>
                            </div>
                            <div class="form-group col-sm-4">
                                <a href="<?php echo e(route('providers')); ?>" name="danger" type="button" class="btn btn-danger btn-block">Cancelar</a>
                            </div>
                        </div>
                    </form>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('validacion'); ?>
    <script>    
	$(function(){
        soloAlfaNumerico('code_provider');
        soloAlfaNumerico('razon_social');
        soloLetras('country');
        soloLetras('city');
        soloAlfaNumerico('direction');
      
       
    });
    $(document).ready(function () {
            $("#phone1").mask('0000 000-0000', { reverse: true });
            
        });
        $(document).ready(function () {
            $("#phone2").mask('0000 000-0000', { reverse: true });
            
        });
        $(document).ready(function () {
            $("#porc_retencion_iva").mask('000', { reverse: true });
            
        });
        $(document).ready(function () {
            $("#porc_retencion_islr").mask('000', { reverse: true });
            
        });
        $(document).ready(function () {
            $("#amount_max_credit").mask('000.000.000.000.000.000,00', { reverse: true });
            
        });
        $(document).ready(function () {
            $("#balance").mask('000.000.000.000.000.000,00', { reverse: true });
            
        });
        $(document).ready(function () {
            $("#days_credit").mask('000', { reverse: true });
            
        });

        var has_credit = document.getElementById('has_credit').value;
        
        if(has_credit == "true"){
            $("#days_credit_label").show();
            $("#days_credit").show();
        }else{
            $("#days_credit_label").hide();
            $("#days_credit").hide();
        }

        function calc()
        {
            if (document.getElementById('has_credit').checked) 
            {
                $("#days_credit_label").show();
                $("#days_credit").show();
                
                document.getElementById('days_credit').value = 0;
            } else {
                $("#days_credit_label").hide();
                $("#days_credit").hide();
                document.getElementById('days_credit').value = 0;
            }
        }
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\aryasoftware\resources\views/admin/providers/edit.blade.php ENDPATH**/ ?>