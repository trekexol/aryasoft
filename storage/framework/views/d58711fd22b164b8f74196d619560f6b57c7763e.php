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



<div class="container" >
    <div class="row justify-content-center" >
        <div class="col-md-12" >
            <div class="card">
                <div class="card-header" ><h3>Registro de Cotización</h3></div>

                <div class="card-body" >
                   
                       
                       
                        <div class="form-group row">
                            <label for="date_quotation" class="col-md-2 col-form-label text-md-right">Fecha de Cotización:</label>
                            <div class="col-md-4">
                                <input id="date_quotation" type="date" class="form-control <?php $__errorArgs = ['date_quotation'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="date_quotation" value="<?php echo e($quotation->date_quotation ?? $datenow); ?>" readonly required autocomplete="date_quotation">
    
                                <?php $__errorArgs = ['date_quotation'];
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
                            <label for="client" class="col-md-2 col-form-label text-md-right">Cliente:</label>
                            <div class="col-md-4">
                                <input id="client" type="text" class="form-control <?php $__errorArgs = ['client'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="client" value="<?php echo e($quotation->clients['name'] ?? $datenow); ?>" readonly required autocomplete="client">
                                <?php $__errorArgs = ['client'];
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
                            <label for="serie" class="col-md-2 col-form-label text-md-right">N° de Control/Serie:</label>

                            <div class="col-md-3">
                                <input id="serie" type="text" class="form-control <?php $__errorArgs = ['serie'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="serie" value="<?php echo e($quotation->serie ?? ''); ?>" readonly required autocomplete="serie">

                                <?php $__errorArgs = ['serie'];
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
                            <label for="vendor" class="col-md-3 col-form-label text-md-right">Vendedor:</label>
                            <div class="col-md-4">
                                <input id="vendor" type="text" class="form-control <?php $__errorArgs = ['vendor'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="vendor" value="<?php echo e($quotation->vendors['name'] ?? old('vendor')); ?>" readonly required autocomplete="vendor">
                                <?php $__errorArgs = ['vendor'];
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
                            <label for="transports" class="col-md-2 col-form-label text-md-right">Transporte/ Tipo de Entrega:</label>
                            <div class="col-md-4">
                                <input id="transport" type="text" class="form-control <?php $__errorArgs = ['transport'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="transport" value="<?php echo e($quotation->transports['placa'] ?? old('transport')); ?>" readonly required autocomplete="transport"> 
                           
                                <?php $__errorArgs = ['transport'];
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
                            <label for="observation" class="col-md-2 col-form-label text-md-right">Observaciones:</label>

                            <div class="col-md-4">
                                <input id="observation" type="text" class="form-control <?php $__errorArgs = ['observation'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="observation" value="<?php echo e($quotation->observation ?? old('observation')); ?>" readonly required autocomplete="observation">

                                <?php $__errorArgs = ['observation'];
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
                            <label for="note" class="col-md-2 col-form-label text-md-right">Nota Pie de Factura:</label>

                            <div class="col-md-4">
                                <input id="note" type="text" class="form-control <?php $__errorArgs = ['note'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="note" value="<?php echo e($quotation->note ?? old('note')); ?>" readonly required autocomplete="note">

                                <?php $__errorArgs = ['note'];
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
                            <label  class="col-md-2 col-form-label text-md-right"><h6>Total de la<br> Cotización:</h6></label>
                            <div class="col-md-2 col-form-label text-md-left">
                                <label for="totallabel" id="total"><h3></h3></label>
                            </div>

                        </div>
                        <form id="formSendProduct" method="POST" action="<?php echo e(route('quotations.storeproduct')); ?>" enctype="multipart/form-data" onsubmit="return validacion()">
                            <?php echo csrf_field(); ?>
                            <input id="id_quotation" type="hidden" class="form-control <?php $__errorArgs = ['id_quotation'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="id_quotation" value="<?php echo e($quotation->id ?? -1); ?>" readonly required autocomplete="id_quotation">
                            <input id="id_inventory" type="hidden" class="form-control <?php $__errorArgs = ['id_inventory'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="id_inventory" value="<?php echo e($inventory->id ?? -1); ?>" readonly required autocomplete="id_inventory">
                            <input id="coinhidden" type="hidden" class="form-control <?php $__errorArgs = ['coin'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="coin" value="<?php echo e($coin ?? 'bolivares'); ?>" readonly required autocomplete="coin">
                            <input id="bcv" type="hidden" class="form-control <?php $__errorArgs = ['bcv'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="bcv" value="<?php echo e($bcv ?? $bcv_quotation_product); ?>" readonly required autocomplete="bcv">
                            <input id="id_user" type="hidden" class="form-control <?php $__errorArgs = ['id_user'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="id_user" value="<?php echo e(Auth::user()->id); ?>" readonly required autocomplete="id_user">
                       
                        
                        <div class="form-group row" id="formcoin">

                            

                            <label id="coinlabel" for="coin" class="col-md-1 col-form-label text-md-right">Moneda:</label>

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
unset($__errorArgs, $__bag); ?>" name="rate" value="<?php echo e($quotation->bcv ?? $bcv); ?>" required autocomplete="rate">
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
                            <a href="#" onclick="refreshrate()" title="actualizar tasa"><i class="fa fa-redo-alt"></i></a>  
                            <label  class="col-md-2 col-form-label text-md-right h6">Tasa actual:</label>
                            <div class="col-md-2 col-form-label text-md-left">
                                <label for="tasaactual" id="tasaacutal"><?php echo e(number_format($bcv, 2, ',', '.')); ?></label>
                            </div>
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input" id="customSwitches">
                                <label class="custom-control-label" for="customSwitches">Auto</label>
                                
                            </div>
                        </div>
                        <br>
                       
                            
                                <div class="form-row col-md-12">
                                    <div class="form-group col-md-2">
                                        <label for="description" >Código</label>
                                        <input id="code" type="text" class="form-control <?php $__errorArgs = ['code'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="code" value="<?php echo e($inventory->code ?? old('code') ?? ''); ?>" required autocomplete="code" onblur="searchCode()">
                                    </div>
                                   
                                    <div class="form-group col-md-1">
                                        
                                        <a href="" title="Buscar Producto Por Codigo" onclick="searchCode()"><i class="fa fa-search"></i></a>  
                                    
                                            <a href="<?php echo e(route('quotations.selectproduct',[$quotation->id,$coin,'productos'])); ?>" title="Productos"><i class="fa fa-eye"></i></a>  
                                        
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
unset($__errorArgs, $__bag); ?>" name="description" value="<?php echo e($inventory->products['description'] ?? old('description') ?? ''); ?>" required autocomplete="description">
        
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
                                    <div class="form-group col-md-1">
                                        <label for="amount" >Cantidad</label>
                                        <input id="amount_product"  type="text" class="form-control <?php $__errorArgs = ['amount'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="amount" value="1" required autocomplete="amount">
        
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
                                    <div class="form-group col-md-1">
                                        <?php if(empty($inventory)): ?>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="exento" id="gridCheck">
                                            <label class="form-check-label" for="gridCheck">
                                                Exento
                                            </label>
                                        </div>
                                        <?php else: ?>
                                        <div class="form-check">
                                            <?php if($inventory->products['exento'] == 1): ?>
                                                <input class="form-check-input" type="checkbox" name="exento" checked id="gridCheck">
                                            <?php else: ?>
                                                <input class="form-check-input" type="checkbox" name="exento" id="gridCheck">
                                            <?php endif; ?>
                                            <label class="form-check-label" for="gridCheck">
                                                Exento
                                            </label>
                                        </div>
                                        <?php endif; ?>
                                            
                                    </div>
                                    <div class="form-group col-md-1">
                                        <?php if(empty($inventory)): ?>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="exento" id="gridCheck">
                                            <label class="form-check-label" for="gridCheck">
                                                Retiene ISLR
                                            </label>
                                        </div>
                                        <?php else: ?>
                                            <div class="form-check">
                                                <?php if($inventory->products['exento'] == 1): ?>
                                                    <input class="form-check-input" type="checkbox" name="islr" checked id="gridCheck2">
                                                <?php else: ?>
                                                    <input class="form-check-input" type="checkbox" name="islr" id="gridCheck2">
                                                <?php endif; ?>
                                                <label class="form-check-label" for="gridCheck2">
                                                    Retiene ISLR
                                                </label>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                    <div class="form-group col-md-2">
                                        <?php if(isset($inventory->products['price']) && (isset($quotation->bcv)) && ($inventory->products['money'] != 'Bs') && ($coin == 'bolivares')): ?> 
                                            <?php 
                                                
                                                $product_Bs = $inventory->products['price'] * $quotation->bcv;
                                               
                                            ?>
                                            <label for="cost" >Precio</label>
                                            <input id="cost" type="text" class="form-control <?php $__errorArgs = ['cost'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="cost" value="<?php echo e(number_format($product_Bs, 2, ',', '.') ?? ''); ?>"  required autocomplete="cost">
                                        <?php else: ?>
                                            <label for="cost" >Precio</label>
                                            <input id="cost" type="text" class="form-control <?php $__errorArgs = ['cost'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="cost" value="<?php echo e(number_format($inventory->products['price'] ?? 0, 2, ',', '.') ?? ''); ?>"  required autocomplete="cost">
                                        <?php endif; ?>

                                        
                                        <?php $__errorArgs = ['cost'];
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
                                        <label for="discount" >Descuento</label>
                                        <input id="discount_product" type="text" class="form-control  <?php $__errorArgs = ['discount'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="discount" value="0" required autocomplete="discount">
        
                                        <?php $__errorArgs = ['discount'];
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
                                        <?php if(isset($inventory)): ?>
                                            <input type="button" title="Agregar" value=" + "  onclick="sendProduct()" >
                                        <?php endif; ?>
                                        
                                    </div>
                                </div>    
                        </form>      





                               <div class="card-body">
                                <div class="table-responsive">
                                <table class="table table-light2 table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                    <tr>
                                        <th class="text-center">Código</th>
                                        <th class="text-center">Descripción</th>
                                        <th class="text-center">Cantidad</th>
                                        <th class="text-center">Precio</th>
                                        <th class="text-center">Descuento</th>
                                        <th class="text-center">Sub Total</th>
                                        <th class="text-center"><i class="fas fa-cog"></i></th>
                                      
                                    </tr>
                                    </thead>
                                    
                                    <tbody>
                                        <?php if(empty($inventories_quotations)): ?>
                                        <?php else: ?>
                                        <?php
                                            $suma = 0.00;
                                        ?>
                                       
                                            <?php $__currentLoopData = $inventories_quotations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $var): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                            <?php
                                            $percentage = (($var->price * $var->amount_quotation) * $var->discount)/100;

                                            $total_less_percentage = ($var->price * $var->amount_quotation) - $percentage;

                                                if($coin == 'bolivares'){
                                                    $var->rate = null;
                                                }

                                                if(isset($var->rate)){
                                                    $product_Bs = $total_less_percentage / $var->rate;
                                                }
                                            
                                            ?>
                                                <tr>
                                                <td style="text-align: right"><?php echo e($var->code); ?></td>
                                                <?php if($var->exento == 1): ?>
                                                    <td style="text-align: right"><?php echo e($var->description); ?> (E)</td>
                                                <?php else: ?>
                                                    <td style="text-align: right"><?php echo e($var->description); ?></td>
                                                <?php endif; ?>
                                                
                                                <td style="text-align: right"><?php echo e($var->amount_quotation); ?></td>
                                                <td style="text-align: right"><?php echo e(number_format($var->price / ($var->rate ?? 1), 2, ',', '.')); ?></td>
                                                <td style="text-align: right"><?php echo e(number_format($var->discount, 0, '', '.')); ?>%</td>
                                                <?php if(isset($var->rate)): ?>
                                                    <td style="text-align: right"><?php echo e(number_format($product_Bs, 2, ',', '.')); ?></td>
                                                <?php else: ?>
                                                    <td style="text-align: right"><?php echo e(number_format($total_less_percentage, 2, ',', '.')); ?></td>
                                                <?php endif; ?>

                                                <?php
                                                    $suma += $total_less_percentage;
                                                    
                                                ?>
                                                    <td style="text-align: right">
                                                        <a href="<?php echo e(route('quotations.productedit',[$var->quotation_products_id,$coin])); ?>" title="Editar"><i class="fa fa-edit"></i></a>  
                                                        <a href="#" class="delete" data-id=<?php echo e($var->quotation_products_id); ?> data-description=<?php echo e($var->description); ?> data-id-quotation=<?php echo e($quotation->id); ?> data-coin=<?php echo e($coin); ?> data-toggle="modal" data-target="#deleteModal" title="Eliminar"><i class="fa fa-trash text-danger"></i></a>  
                                                    </td>
                                            
                                                </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                            <?php
                                                if(isset($var->rate)){
                                                    $suma = $suma / $var->rate;
                                                }
                                            ?>
                                            <tr>
                                                <td style="text-align: right">-------------</td>
                                                <td style="text-align: right">-------------</td>
                                                <td style="text-align: right">-------------</td>
                                                <td style="text-align: right">-------------</td>
                                                <td style="text-align: right">Total</td>
                                                <td style="text-align: right"><?php echo e(number_format($suma, 2, ',', '.')); ?></td>
                                                
                                                <td style="text-align: right"></td>
                                            
                                                </tr>
                                        <?php endif; ?>
                                    </tbody>
                                </table>
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <?php if(!isset($quotation->date_delivery_note)): ?>
                                    <div class="col-md-4">
                                        <?php if($suma == 0): ?>
                                            <a onclick="validate()" id="btnSendNote" name="btnfacturar" class="btn btn-info" title="facturar">Nota de Entrega</a>  
                                        <?php else: ?>
                                            <a onclick="deliveryNoteSend()" id="btnSendNote" name="btnfacturar" class="btn btn-info" title="facturar">Nota de Entrega</a>  
                                        <?php endif; ?>
                                    </div>
                                <?php else: ?>
                                    <div class="col-md-1">
                                    </div>
                                <?php endif; ?>
                                <div class="col-md-4">
                                    <?php if($suma == 0): ?>
                                        <a onclick="validate()" id="btnfacturar" name="btnfacturar" class="btn btn-success" title="facturar">Facturar</a>
                                        <?php if(empty($quotation->date_order)): ?>
                                            <a onclick="validate()" id="btnorder" name="btnorder" class="btn btn-danger" title="order">Pedido</a>  
                                        <?php endif; ?>  
                                        
                                    <?php else: ?>
                                        <a href="<?php echo e(route('quotations.createfacturar',[$quotation->id,$coin])); ?>" id="btnfacturar" name="btnfacturar" class="btn btn-success" title="facturar">Facturar</a>  
                                        <?php if(empty($quotation->date_order)): ?>
                                            <a href="<?php echo e(route('orders.create_order',[$quotation->id,$coin])); ?>" id="btnorder" name="btnorder" class="btn btn-danger" title="order">Pedido</a>  
                                        <?php endif; ?>
                                    <?php endif; ?>
                                </div>
                               
                            </div>
                            
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Delete Warning Modal -->
<div class="modal modal-danger fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="Delete" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Eliminar</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <form action="<?php echo e(route('quotations.deleteProduct')); ?>" method="post">
                <?php echo csrf_field(); ?>
                <?php echo method_field('DELETE'); ?>
                <input id="id_quotation_product_modal" type="hidden" class="form-control <?php $__errorArgs = ['id_quotation_product_modal'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="id_quotation_product_modal" readonly required autocomplete="id_quotation_product_modal">
                <input id="id_quotation_modal" type="hidden" class="form-control <?php $__errorArgs = ['id_quotation_modal'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="id_quotation_modal" readonly required autocomplete="id_quotation_modal">
                <input id="coin_modal" type="hidden" class="form-control <?php $__errorArgs = ['coin_modal'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="coin_modal" readonly required autocomplete="coin_modal">
                       
                <h5 class="text-center">Seguro que desea eliminar?</h5>
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-danger">Eliminar</button>
            </div>
            </form>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('quotation_create'); ?>
    
    <script>
     
        $(document).ready(function () {
            $("#discount_product").mask('000', { reverse: true });
            
        });
        
        $(document).ready(function () {
            $("#amount_product").mask('00000', { reverse: true });
            
        });
        
        let sum = "<?php echo number_format($suma, 2, ',', '.') ?>";
      
        document.querySelector('#total').innerText = sum.toLocaleString('de-DE', {minimumFractionDigits: 2,maximumFractionDigits: 2});;

        $(document).ready(function () {
            $("#total").mask('000.000.000.000.000,00', { reverse: true });
            
        });
        $(document).ready(function () {
            $("#rate").mask('000.000.000.000.000,00', { reverse: true });
            
        });
        $(document).ready(function () {
            $("#cost").mask('000.000.000.000.000,00', { reverse: true });
            
        });
        $("#code").keydown(function(event){ 
            if(event.which == 13){   // teclear enter
                /*sendProduct(callback);
                //Una funcion anonima para retornar el resultado despues de 1 segundo
                searchCode();*/
                    //alert(12); 
                 searchCode(); 
                //alert(13);             
            }
       });
      
        /*$("#description").on('change',function(){
          alert('change');
        });*/

        checkbox = document.getElementById('customSwitches'); // retoma el valor anterior
        checkbox.checked = eval(window.localStorage.getItem(checkbox.id));
        checkbox.addEventListener('change', function(){
            window.localStorage.setItem(checkbox.id, checkbox.checked);
        })

        if( $('#customSwitches').prop('checked')) { // validar seleccionado
            var value=$.trim($("#description").val()); // valida el campo si esta lleno
            if(value.length>0 ){
                //alert('enviando');
                sendProduct();
                $("#description").val('');
            }

          document.getElementById("code").focus();   
        }

        $(document).on('click','.delete',function(){
         let id = $(this).attr('data-id');
         let id_quotation = $(this).attr('data-id-quotation');
         let coin = $(this).attr('data-coin');
         let description = $(this).attr('data-description');

         $('#id_quotation_product_modal').val(id);
         $('#id_quotation_modal').val(id_quotation);
         $('#coin_modal').val(coin);
         $('#description_modal').val(description);
        });
    </script> 

<?php $__env->stopSection(); ?>         

<?php $__env->startSection('validacion'); ?>
    <script>
     $('#dataTable').dataTable( {
        "ordering": false,
        "order": [],
            'aLengthMenu': [[50, 100, 150, -1], [50, 100, 150, "All"]]
    } );

        $("#coin").on('change',function(){
            coin = $(this).val();
            window.location = "<?php echo e(route('quotations.create', [$quotation->id,''])); ?>"+"/"+coin;
        });


    function sendProduct(){
        if(validacion()){
            document.getElementById("formSendProduct").submit();
        }
        
    }
    function deliveryNoteSend() {
       
            window.location = "<?php echo e(route('quotations.createdeliverynote', [$quotation->id,$coin])); ?>";
            
    }

    function refreshrate() {
       
        let rate = document.getElementById("rate").value; 
        window.location = "<?php echo e(route('quotations.refreshrate',[$quotation->id,$coin,''])); ?>"+"/"+rate;
       
    }

    function validate() {
       
        alert('Debe ingresar al menos un producto para poder continuar');           
    }


    function validacion() {

        let amount = document.getElementById("amount_product").value; 

        if (amount < 1) {
        
        alert('La cantidad del Producto debe ser mayor a 1');
        return false;
        }
        else {
            return true;
        }  
    }


    function alertad() {
       
       alert('envia');
        //console.log("enviar");          
   }



    function searchCode2(callback){
            
            let reference_id = document.getElementById("code").value; 
            
            if(reference_id != ""){
                $.ajax({
                
                url:"<?php echo e(route('quotations.listinventory')); ?>" + '/' + reference_id,
                beforSend:()=>{
                    alert('consultando datos');
                },
                success:(response)=>{
                 
                    
                    if(response.length > 0){
                        response.forEach((item, index, object)=>{
                            let {id,description,date} = item;
                          
                           window.location = "<?php echo e(route('quotations.createproduct', [$quotation->id,$coin,''])); ?>"+"/"+id;
                           
                        });
                    }else{
                        window.location = "<?php echo e(route('quotations.create', [$quotation->id,$coin,''])); ?>";
                       //alert('No se Encontro este numero de Referencia');
                    }
                   
                },
                error:(xhr)=>{
                   //alert('Presentamos Inconvenientes');
                }
            })
            }
           //alert('busca');
            //console.log("buscar");

           callback();
        }  
    
    </script> 

<?php $__env->stopSection(); ?>    

<?php $__env->startSection('consulta'); ?>
    <script>

        function searchCode(){ 
            let reference_id = document.getElementById("code").value; 
            if(reference_id != ""){
                $.ajax({
                url:"<?php echo e(route('quotations.listinventory')); ?>" + '/' + reference_id,
                beforSend:()=>{
                    alert('consultando datos');
                },
                success:(response)=>{
                
                    if(response.length > 0){
                        response.forEach((item, index, object)=>{
                            let {id,description,date} = item;
                          
                           window.location = "<?php echo e(route('quotations.createproduct', [$quotation->id,$coin,''])); ?>"+"/"+id;
                           
                        });
                    }else{

                          window.location = "<?php echo e(route('quotations.create', [$quotation->id,$coin,''])); ?>";
                       //alert('No se Encontro este numero de Referencia');
                    }
                   
                },
                error:(xhr)=>{
                   //alert('Presentamos Inconvenientes');
                }
            })
            }
           
        }
        $("body").toggleClass("sidebar-toggled");
        $(".sidebar").toggleClass("toggled");
        if ($(".sidebar").hasClass("toggled")) {
            $('.sidebar .collapse').collapse('hide');
        };

    </script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('admin.layouts.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\aryasoftware\resources\views/admin/quotations/create.blade.php ENDPATH**/ ?>