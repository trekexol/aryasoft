<?php $__env->startSection('content'); ?>


<?php echo $__env->make('admin.layouts.success', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>   
<?php echo $__env->make('admin.layouts.danger', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>    
<?php echo $__env->make('admin.layouts.delete', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>    


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center font-weight-bold h3">Registro de Anticipo</div>

                <div class="card-body">
                    <form method="POST" action="<?php echo e(route('anticipos.store_provider')); ?>">
                        <?php echo csrf_field(); ?>
                        
                        <input id="id_user" type="hidden" class="form-control <?php $__errorArgs = ['id_user'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="id_user" value="<?php echo e(Auth::user()->id); ?>" required autocomplete="id_user">
                        <input id="id_provider" type="hidden" class="form-control <?php $__errorArgs = ['id_provider'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="id_provider" value="<?php echo e($provider->id ?? null); ?>" required autocomplete="id_provider">
                       
                        <div class="form-group row">
                            <label for="providers" class="col-md-3 col-form-label text-md-right">Proveedor</label>
                            <div class="col-md-6">
                                <input id="provider" type="text" class="form-control <?php $__errorArgs = ['provider'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="provider" value="<?php echo e($provider->razon_social ?? ''); ?>" readonly required >
    
                                <?php $__errorArgs = ['provider'];
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
                            <div class="form-group col-md-1">
                                <a href="<?php echo e(route('anticipos.selectprovider')); ?>" title="Seleccionar Proveedor"><i class="fa fa-eye"></i></a>  
                            </div>
                        </div>
                        <?php if(isset($expenses) && (count($expenses)>0)): ?>
                        <div class="form-group row">
                            <label for="clients" class="col-md-3 col-form-label text-md-right">Gasto o Compra</label>
                            <div class="col-md-6">
                                <select  id="id_expense"  name="id_expense" class="form-control">
                                    <option selected value="-1">Seleccione una Gasto o Compra</option>
                                    <?php $__currentLoopData = $expenses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $expense): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option  value="<?php echo e($expense->id); ?>"><?php echo e($expense->providers['razon_social'] ?? ''); ?> - <?php echo e($expense->serie ?? ''); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>
                        <?php endif; ?>
                        <div class="form-group row">
                            <label for="clients" class="col-md-3 col-form-label text-md-right">Cuentas</label>
                            <div class="col-md-6">
                                <select  id="id_account"  name="id_account" class="form-control" required>
                                    <option selected value="">Seleccione una Opcion</option>
                                    <?php $__currentLoopData = $accounts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $account): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option  value="<?php echo e($account->id); ?>"><?php echo e($account->description); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="date_begin" class="col-md-3 col-form-label text-md-right">Fecha de Inicio</label>

                            <div class="col-md-6">
                                <input id="date_begin" type="date" class="form-control <?php $__errorArgs = ['date_begin'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="date_begin" value="<?php echo e($datenow); ?>" required autocomplete="date_begin">

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
                            <label for="coin" class="col-md-3 col-form-label text-md-right">Moneda</label>
                            <div class="col-md-6">
                                <select  id="coin" name="coin" class="form-control" required>
                                    <option value="">Seleccione una Moneda</option>
                                    <option  value="bolivares">Bolivares</option>
                                    <option  value="dolares">Dolares</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="amount" class="col-md-3 col-form-label text-md-right">Monto</label>

                            <div class="col-md-6">
                                <input id="amount" type="text" class="form-control <?php $__errorArgs = ['amount'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="amount" placeholder="0,00" required autocomplete="amount">

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
                        </div>
                        <div class="form-group row">
                            <label for="rate" class="col-md-3 col-form-label text-md-right">Tasa del Dia</label>

                            <div class="col-md-6">
                                <input id="rate" type="text" class="form-control <?php $__errorArgs = ['rate'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="rate" value="<?php echo e(number_format($bcv, 2, ',', '.')); ?>" required autocomplete="rate">

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
                            <label for="reference" class="col-md-3 col-form-label text-md-right">Referencia</label>

                            <div class="col-md-6">
                                <input id="reference" type="text" class="form-control <?php $__errorArgs = ['reference'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="reference" value="<?php echo e(old('reference')); ?>" autocomplete="reference">

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
                        <div class="form-group row mb-0">

                            <div class="col-md-4 offset-md-4">
                                <?php if(isset($provider->id)): ?>
                                    <button type="submit" class="btn btn-info">
                                        Registrar Anticipo
                                    </button>
                                <?php else: ?>
                                    <button type="submit" class="btn btn-info" disabled title="Debe Seleccionar un Proveedor para poder Continuar">
                                        Registrar Anticipo
                                    </button>
                                <?php endif; ?>
                                
                            </div>
                            <div class="col-md-2">
                                <a href="<?php echo e(route('anticipos')); ?>" id="btnfacturar" name="btnfacturar" class="btn btn-danger" title="facturar">Volver</a>                                 
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
            $("#amount").mask('000.000.000.000.000.000.000,00', { reverse: true });
            
        });
        $(document).ready(function () {
            $("#rate").mask('000.000.000.000.000.000.000,00', { reverse: true });
            
        });




	$(function(){
        soloAlfaNumerico('description');
       
    });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\aryasoftware\resources\views/admin/anticipos/create_provider.blade.php ENDPATH**/ ?>