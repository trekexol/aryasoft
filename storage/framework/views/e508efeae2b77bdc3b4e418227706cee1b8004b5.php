<?php $__env->startSection('content'); ?>

<?php
$suma_debe = 0;
$suma_haber = 0;
?>

    
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
                <div class="card-header text-center font-weight-bold h3">Registro Comprobante Detalle</div>

                <div class="card-body">
                    <form id="headerForm" method="POST" action="<?php echo e(route('headervouchers.store')); ?>" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>

                        <input type="hidden" name="coin" value="<?php echo e($coin ?? 'bolivares'); ?>" readonly>
                        <input type="hidden" name="id_header" value="<?php echo e($header->id ?? null); ?>" readonly>
                       
                        <div class="form-group row">
                            <label for="reference" class="col-sm-2 col-form-label text-md-right">Número</label>

                            <div class="col-sm-3">
                                <?php if(isset($header)): ?>
                                    <input id="reference" type="text" class="form-control <?php $__errorArgs = ['reference'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="reference" value="<?php echo e($header->id ?? ''); ?>" required autocomplete="reference">
                                <?php else: ?>
                                     <input id="reference" type="text" class="form-control <?php $__errorArgs = ['reference'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="reference" placeholder="Numero Disponible: <?php echo e($header_number ?? 0); ?>" required autocomplete="reference">
                                <?php endif; ?>
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
                            
                            <div class="col-sm-1">
                                <a id="btn_search_reference" class="btn btn-info " onclick="searchReference()" title="Buscar Referencia">Buscar</a>  
                            </div>
                            <div class="col-sm-3">
                                <button type="submit" class="btn btn-success" title="Agregarheader">Registrar Cabecera</button>  
                            </div>
                            <div class="col-sm-2">
                               <a class="btn btn-danger" href="<?php echo e(route('detailvouchers.delete',$header->id ?? null)); ?>" title="Deshabilitar">Deshabilitar</a>  
                            </div>
                            <div class="col-sm-1">
                                <a id="btn_clean" class="btn btn-light2" href="<?php echo e(route('detailvouchers.create','bolivares')); ?>" title="Limpiar Referencia">Limpiar</a>  
                            </div>
                        </div>
                        
                            <?php if(isset($header) && ($header->reference)): ?>
                                <div class="form-group row">
                                    <label for="reference_header" class="col-md-2 col-form-label text-md-right">Referencia</label>

                                    <div class="col-md-3">
                                            <input id="reference_header" type="text" class="form-control <?php $__errorArgs = ['reference_header'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="reference_header" value="<?php echo e($header->reference ?? ''); ?>" required autocomplete="reference_header">
                                        
                                        <?php $__errorArgs = ['reference_header'];
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
                            <?php endif; ?>

                            <div class="form-group row">
                                <label for="description" class="col-md-2 col-form-label text-md-right">Descripción</label>

                                <div class="col-md-4">
                                    <?php if(isset($header)): ?>
                                        <input id="description" type="text" class="form-control <?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="description" value="<?php echo e($header->description ?? old('description')); ?>"  required autocomplete="description" >
                                    <?php else: ?>
                                        <input id="description" type="text" class="form-control <?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="description"  required autocomplete="description" >
                                    <?php endif; ?>
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
                                <?php if(isset($header)): ?>
                                    <div class="col-sm-3">
                                        <button onclick="updateForm()" class="btn btn-light" title="Actualizar">Actualizar Cabecera</button>  
                                    </div>
                                <?php endif; ?>
                            </div>
                        
                            <div class="form-group row">
                                <label for="date" class="col-md-2 col-form-label text-md-right">Fecha del Comprobante</label>

                                <div class="col-md-4">
                                    <?php if(isset($header)): ?>
                                        <input id="date_begin" type="date" class="form-control <?php $__errorArgs = ['date'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="date" value="<?php echo e($header->date ?? ''); ?>"  required autocomplete="date">
                                    <?php else: ?>
                                        <input id="date_begin" type="date" class="form-control <?php $__errorArgs = ['date'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="date" value="<?php echo e($datenow ?? ''); ?>" required autocomplete="date">
                                    <?php endif; ?>
                                    <?php $__errorArgs = ['date'];
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
                        </form>
                            <!--<label for="date" class="col-md-2 col-form-label text-md-right"><h5>Total</h5></label>
                            <div class="col-md-2 col-form-label text-md-left">
                                <label for="description" ><h6><?php echo e($suma_debe - $suma_haber); ?></h6></label>
                            </div>-->
                        </div>
                       
                      
                <form method="POST" action="<?php echo e(route('detailvouchers.store')); ?>" id="fo" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <div class="form-group row" id="formcoin">
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
                        <label for="rate" class="col-md-1 col-form-label text-md-right">Tasa:</label>
                        <div class="col-md-2">
                            <input id="rate" type="text" class="form-control <?php $__errorArgs = ['rate'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="rate" value="<?php echo e($detailvouchers_last->tasa ?? $bcv); ?>" required autocomplete="rate">
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
                        <!--<a href="#" onclick="refreshrate()" title="tasaactual"><i class="fa fa-redo-alt"></i></a> --> 
                        <label  class="col-md-2 col-form-label text-md-right h6">Tasa actual:</label>
                        <div class="col-md-2 col-form-label text-md-left">
                            <label for="tasaactual" id="tasaacutal"><?php echo e(number_format($bcv, 2, ',', '.')); ?></label>
                        </div>
                    </div>

                        <input type="hidden" name="id_header_voucher" value="<?php echo e($header->id ?? ''); ?>" readonly>
                        <input type="hidden" name="period" value="<?php echo e($account->period ?? ''); ?>" readonly>
                        <input type="hidden" name="id_account" value="<?php echo e($account->id ?? ''); ?>" readonly>
                        <input id="id_user" type="hidden" class="form-control <?php $__errorArgs = ['id_user'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="id_user" value="<?php echo e(Auth::user()->id); ?>" readonly required autocomplete="id_user">
                       
                       
                                <div class="form-row">
                                    
                                    <div class="form-group col-md-1">
                                        <label for="description" >Cuenta</label>
                                        <input id="code_one" type="text" class="form-control <?php $__errorArgs = ['code_one'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="code_one" value="<?php echo e(session()->get('detail')->code_one ?? $account->code_one ?? old('code_one')); ?>" required readonly autocomplete="code_one"  autofocus>
                                    </div>
                                    <div class="form-group col-md-1">
                                        <label for="description" >.</label>
                                        <input id="code_two" type="text" class="form-control <?php $__errorArgs = ['code_two'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="code_two" value="<?php echo e(session()->get('detail')->code_two ?? $account->code_two ?? old('code_two')); ?>" required readonly autocomplete="code_two"  autofocus>
                                    </div> 
                                    <div class="form-group col-md-1">
                                        <label for="description" >.</label>
                                    <input id="code_three" type="text" class="form-control <?php $__errorArgs = ['code_three'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="code_three" value="<?php echo e(session()->get('detail')->code_three ?? $account->code_three ?? old('code_three')); ?>" required readonly autocomplete="code_three"  autofocus>
                                    </div>   
                                    <div class="form-group col-md-1">
                                        <label for="description" >.</label>
                                        <input id="code_four" type="text" class="form-control <?php $__errorArgs = ['code_four'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="code_four" value="<?php echo e(session()->get('detail')->code_four ?? $account->code_four ?? old('code_four')); ?>" required readonly autocomplete="code_four"  autofocus>
                                    </div>
                                    <div class="form-group col-md-1">
                                        <label for="description" >.</label>
                                        <input id="code_five" type="text" class="form-control <?php $__errorArgs = ['code_five'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="code_five" value="<?php echo e(session()->get('detail')->code_five ?? $account->code_five ?? old('code_five')); ?>" required readonly autocomplete="code_five"  autofocus>
                                    </div>
                                    <div class="form-group ">
                                        <a href="<?php echo e(route('detailvouchers.selectaccount',[$coin,$header->id ?? -1,'detail'])); ?>" title="Editar"><i class="fa fa-eye"></i></a>  
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label for="description" >Descripción</label>
                                        <input id="description" type="text" class="form-control <?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="description" value="<?php echo e(session()->get('accountdetail')->description ?? $account->description ?? ''); ?>" readonly required autocomplete="description">

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
                                   
                                    <div class="form-group col-md-2">
                                        <label for="debe" >Debe</label>
                                        <input id="debe" type="text" autocomplete="off" placeholder='0,00' value="0,00" class="form-control <?php $__errorArgs = ['debe'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="debe" value="<?php echo e(session()->get('detail')->haber ?? '0,00'); ?>"  required>

                               
                                        <?php $__errorArgs = ['debe'];
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
                                        <label for="haber" >Haber</label>
                                        <input id="haber" type="text" class="form-control <?php $__errorArgs = ['haber'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="haber" value="<?php echo e(session()->get('detail')->debe ?? '0,00'); ?>"  required autocomplete="haber">

                                        <?php $__errorArgs = ['haber'];
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
                                    <div class="form-group">
                                        <button type="submit" title="Agregar"><i class="fa fa-plus"></i></button>  
                                    </div>
                                </div>    
                        
                        </form>      
                       <div class="card-body">
                        <div class="table-responsive">
                        <table class="table table-light2 table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                <th>Cuenta</th>
                                <th>Descripción</th>
                                <th>Debe</th>
                                <th>Haber</th>
                               
                                <th>Opciones</th>
                              
                            </tr>
                            </thead>
                            
                            <tbody>
                                <?php if(empty($detailvouchers)): ?>
                                <?php else: ?>
                                   
                                    <?php $__currentLoopData = $detailvouchers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $var): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                   
                                        <?php if($var->status == 'N'): ?>
                                            <td><i class="fa fa-circle" style="color: rgb(252, 128, 128)"></i> <?php echo e($var->accounts['code_one']); ?>.<?php echo e($var->accounts['code_two']); ?>.<?php echo e($var->accounts['code_three']); ?>.<?php echo e($var->accounts['code_four']); ?>.<?php echo e(str_pad($var->accounts['code_five'], 3, "0", STR_PAD_LEFT)); ?></td>
                                        <?php else: ?>
                                            <td><i class="fa fa-circle" style="color: rgb(84, 196, 84)"></i> <?php echo e($var->accounts['code_one']); ?>.<?php echo e($var->accounts['code_two']); ?>.<?php echo e($var->accounts['code_three']); ?>.<?php echo e($var->accounts['code_four']); ?>.<?php echo e(str_pad($var->accounts['code_five'], 3, "0", STR_PAD_LEFT)); ?></td>
                                        <?php endif; ?>

                                        <td><?php echo e($var->accounts['description']); ?></td>
                    
                                        
                                        <?php if((isset($coin)) && ($coin == 'bolivares')): ?>
                                            <?php
                                                $suma_debe += $var->debe;
                                                $suma_haber += $var->haber;
                                            ?>
                                            <td><?php echo e(number_format($var->debe, 2, ',', '.')); ?></td>
                                            <td><?php echo e(number_format($var->haber, 2, ',', '.')); ?></td>
                                        <?php else: ?>
                                            <?php
                                                $suma_debe += $var->debe / $var->tasa;
                                                $suma_haber += $var->haber / $var->tasa;
                                            ?>
                                            <td><?php echo e(number_format($var->debe / $var->tasa, 2, ',', '.')); ?></td>
                                            <td><?php echo e(number_format($var->haber / $var->tasa, 2, ',', '.')); ?></td>
                                        <?php endif; ?>
                                       
                                    
                                        <td>
                                        <a href="<?php echo e(route('detailvouchers.edit',[$coin,$var->id])); ?>" title="Editar"><i class="fa fa-edit"></i></a>  
                                        </td>
                                   
                                    </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        
                                        <?php if($suma_debe == $suma_haber): ?>
                                            <td style="color: rgb(84, 196, 84)">El comprobante está cuadrado</td>
                                            <td>Total</td>
                                            <td><?php echo e(number_format($suma_debe, 2, ',', '.')); ?></td>
                                            <td><?php echo e(number_format($suma_haber, 2, ',', '.')); ?></td>
                                        <?php else: ?>
                                            <td style="color: red">El comprobante está descuadrado</td>
                                            <td>Total</td>
                                            <?php if($suma_debe > $suma_haber): ?>
                                                <td><?php echo e(number_format($suma_debe, 2, ',', '.')); ?>  <br><div style="color: red"> - <?php echo e(number_format($suma_debe - $suma_haber, 2, ',', '.')); ?></div></td>
                                                <td><?php echo e(number_format($suma_haber, 2, ',', '.')); ?></td>
                                            <?php else: ?>
                                                <td><?php echo e(number_format($suma_debe, 2, ',', '.')); ?></td>
                                                <td><?php echo e(number_format($suma_haber, 2, ',', '.')); ?> <br><div style="color: red"> - <?php echo e(number_format($suma_haber - $suma_debe, 2, ',', '.')); ?></div></td>
                                            <?php endif; ?>
                                            
                                        <?php endif; ?>
                                            <td>
                                          </td>
                                       
                                        </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="reference" class="col-md-2 col-form-label text-md-right"><i class="fa fa-circle" style="color: rgb(84, 196, 84)"><strong> Contabilizado</strong></i></label>
                        <label for="reference" class="col-md-3 col-form-label text-md-right"><i class="fa fa-circle" style="color: rgb(255, 94, 94)"><strong> No Contabilizado</strong></i></label>
                    </div>

                    <a href="<?php echo e(route('detailvouchers.contabilizar',[$coin ?? 'bolivares',$header->id ?? -1])); ?>" id="btncontabilizar" name="btncontabilizar" class="btn btn-success" title="Contabilizar">Contabilizar</a>  
                                            
                </div>
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('validacion'); ?>
 
<script>
    $(document).ready(function () {
        $("#code_one").mask('0000', { reverse: true });
                
    });
    $(document).ready(function () {
                $("#code_two").mask('0000', { reverse: true });
                
    });
    $(document).ready(function () {
                $("#code_three").mask('0000', { reverse: true });
                
            });
    $(document).ready(function () {
                $("#code_four").mask('0000', { reverse: true });
                
    });

    $(document).ready(function () {
        $("#debe").mask('000.000.000.000.000,00', { reverse: true });
        
    });
    $(document).ready(function () {
        $("#haber").mask('000.000.000.000.000,00', { reverse: true });
        
    });

    $(document).ready(function () {
        $("#reference").mask('000000000000000', { reverse: true });
        
    });
    $(document).ready(function () {
        $("#rate").mask('000.000.000.000.000,00', { reverse: true });
        
    });

    function updateForm(){
        document.getElementById("headerForm").action =  "<?php echo e(route('headervouchers.update')); ?>";
        document.getElementById("headerForm").submit();
    }


</script>
    <?php if(isset($header)): ?>
        <script>
            $("#coin").on('change',function(){
                coin = $(this).val();
                window.location = "<?php echo e(route('detailvouchers.create', ['',''])); ?>"+"/"+coin+"/<?php echo e($header->id); ?>";
            });
        </script>
    <?php else: ?>
        <script>
            $("#coin").on('change',function(){
                coin = $(this).val();
                window.location = "<?php echo e(route('detailvouchers.create', [''])); ?>"+"/"+coin;
            });
        </script>
    <?php endif; ?>
    
<?php $__env->stopSection(); ?> 

<?php $__env->startSection('javascript'); ?>

    <?php if($suma_debe != $suma_haber): ?>
    <script>

        btncontabilizar.style.pointerEvents = 'none';
        btncontabilizar.style.color = '#bbb';

       
    

    </script> 

    <?php else: ?>
    <script>

            btncontabilizar.style.pointerEvents = null;
        
    </script> 
        
    <?php endif; ?>

<?php $__env->stopSection(); ?>                      

<?php $__env->startSection('consulta'); ?>
    <script>
        $('#dataTable').DataTable({
            "ordering": false,
            "order": [],
            'aLengthMenu': [[50, 100, 150, -1], [50, 100, 150, "All"]]
        });
        $("body").toggleClass("sidebar-toggled");
        $(".sidebar").toggleClass("toggled");
        if ($(".sidebar").hasClass("toggled")) {
            $('.sidebar .collapse').collapse('hide');
        };
    
    
        function searchReference(){
            
            let reference_id = document.getElementById("reference").value; 
            //var reference_id = $(this).val();
                $("#description").val("");
                $("#date_begin").val("");
               
               
               // getSubsegment(reference_id);
           
            $.ajax({
               // url:`../detailvouchers/listheader/${reference_id}`,
                url:"<?php echo e(route('detailvouchers.listheader')); ?>" + '/' + reference_id,
                beforSend:()=>{
                    alert('consultando datos');
                },
                success:(response)=>{
                 /*   let subsegment = $("#subsegment");
                    let htmlOptions = `<option value='' >Seleccione..</option>`;*/
                    var inputDescription = document.getElementById("description");
                    var inputDate = document.getElementById("date_begin");
                   
                    // console.clear();
                    if(response.length > 0){
                        response.forEach((item, index, object)=>{
                            let {id,description,date} = item;
                          
                           window.location = "<?php echo e(route('detailvouchers.create', [$coin,''])); ?>"+"/"+id;
                           //inputDescription.value = description;
                           //inputDate.value = date;
                        });
                    }else{
                        alert('No se Encontro este numero de Referencia');
                    }
                    //console.clear();
                    // console.log(htmlOptions);
                    subsegment.html('');
                    subsegment.html(htmlOptions);
                
                   
                
                },
                error:(xhr)=>{
                    alert('No se encuentra el numero de cabecera');
                }
            })
        }

    </script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('admin.layouts.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\aryasoftware\resources\views/admin/detailvouchers/create.blade.php ENDPATH**/ ?>