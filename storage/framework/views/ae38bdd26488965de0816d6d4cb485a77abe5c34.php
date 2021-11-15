<?php $__env->startSection('content'); ?>
  
   

    
<?php echo $__env->make('admin.layouts.success', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>   
<?php echo $__env->make('admin.layouts.danger', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>    
<?php echo $__env->make('admin.layouts.delete', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>    



    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header"><h2>Editar Producto </h2></div>
    
                    <div class="card-body">
            <form  method="POST"   action="<?php echo e(route('expensesandpurchases.update_product',[$expense_detail->id,$coin])); ?>" enctype="multipart/form-data" onsubmit="return validacion()">
                <?php echo method_field('PATCH'); ?>
                <?php echo csrf_field(); ?>
                    <input id="rate_expense" type="hidden" class="form-control <?php $__errorArgs = ['rate_expense'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="rate_expense" value="<?php echo e($expense_detail->expenses['rate'] ?? -1); ?>" readonly required autocomplete="rate_expense"> 
                            
                    <div class="form-group row">
                        <?php if(isset($expense_detail->inventories['code'])): ?>
                            <label for="description" class="col-md-2 col-form-label text-md-right">Código</label>
                            <div class="col-md-3">
                                <input id="code" type="text" class="form-control <?php $__errorArgs = ['code'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="code" value="<?php echo e($expense_detail->inventories['code'] ?? old('code') ?? ''); ?>" readonly required autocomplete="code" autofocus>
                            </div>
                            <label for="description"  class="col-md-3 col-form-label text-md-right">Descripción</label>
                        <?php else: ?>
                            <label for="description"  class="col-md-2 col-form-label text-md-right">Descripción</label>
                        <?php endif; ?>
                        
                        <div class="col-md-3">
                            <input id="description" type="text" class="form-control <?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="description" value="<?php echo e($expense_detail->description ?? $inventory->products['description'] ?? old('description') ?? ''); ?>" readonly required autocomplete="description">
                        </div>
                    </div>
                   
                    <div class="form-group row">
                        <label id="coinlabel" for="coin" class="col-md-2 col-form-label text-md-right">Moneda:</label>

                        <div class="col-md-3">
                            <select class="form-control" name="coin" id="coin">
                                <option value="bolivares">Bolívares</option>
                                <?php if($coin == 'dolares'): ?>
                                    <option selected value="dolares">Dolares</option>
                                <?php else: ?> 
                                    <option value="dolares">Dolares</option>
                                <?php endif; ?>
                            </select>
                        </div>
                        <?php if(isset($inventory->amount)): ?>
                            <label for="amount_old" class="col-md-3 col-form-label text-md-right">Cantidad En Inventario</label>
                            <div class="col-md-3">
                                <input id="amount_old" type="text" class="form-control <?php $__errorArgs = ['amount_old'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="amount_old" value="<?php echo e($inventory->amount ?? 0); ?>" readonly required autocomplete="amount_old">
                            </div> 
                        <?php endif; ?>
                    </div>
                    <div class="form-group row">
                        <label for="price" class="col-md-2 col-form-label text-md-right">Precio</label>
                        <div class="col-md-3">
                            <input id="price" type="text" class="form-control <?php $__errorArgs = ['price'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="price" value="<?php echo e(number_format($expense_detail->price / ($rate ?? 1), 2, ',', '.')); ?>"  required autocomplete="price">
                        </div>  
                        <label for="rate" class="col-md-3 col-form-label text-md-right">Tasa</label>
                        <div class="col-md-3">
                            <input id="rate" type="text" readonly class="form-control <?php $__errorArgs = ['rate'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="rate" value="<?php echo e(number_format($expense_detail->rate, 2, ',', '.')); ?>"  required autocomplete="rate">
                        </div>  
                        
                    </div>
                    
                    
                        <div class="form-group row">
                            <label for="amount" class="col-md-2 col-form-label text-md-right">Cantidad</label>

                            <div class="col-md-3">
                                <input id="amount" type="text" class="form-control <?php $__errorArgs = ['amount'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="amount" value="<?php echo e(number_format($expense_detail->amount, 2, ',', '.')); ?>" required autocomplete="amount">

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
                            <label for="gridCheck" class="col-md-2 col-form-label text-md-right">Exento</label>
                            <div class="col-md-1">
                                <?php if(($expense_detail->exento == 1)): ?>
                                    <input class="form-check-input" type="checkbox" name="exento" checked id="gridCheck">
                                <?php else: ?>
                                    <input class="form-check-input" type="checkbox" name="exento" id="gridCheck">
                                <?php endif; ?>
                            </div>  
                            <label for="gridCheck2" class="col-md-1 col-form-label text-md-right">ISLR</label>
                            <div class="col-md-1">
                                <?php if(($expense_detail->islr == 1)): ?>
                                    <input class="form-check-input" type="checkbox" name="islr" checked id="gridCheck2">
                                <?php else: ?>
                                    <input class="form-check-input" type="checkbox" name="islr" id="gridCheck2">
                                <?php endif; ?>
                            </div>  
                        </div>
                            
                                <br>
                                <div class="form-group row mb-0">
                                    <div class="col-md-4 offset-md-4">
                                        <button type="submit" class="btn btn-info">
                                           Actualizar Producto Cotizado
                                        </button>
                                    </div>
                                </form>
                                    <div class="col-md-2">
                                        <a href="<?php echo e(route('expensesandpurchases.create_detail',[$expense_detail->id_expense,$coin])); ?>" id="btnfacturar" name="btnfacturar" class="btn btn-danger" title="facturar">Volver</a>  
                                    </div>
                                </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
 <?php $__env->stopSection(); ?>
 <?php $__env->startSection('validacion'); ?>
    <script>    
     
        $(document).ready(function () {
            $("#amount").mask('000.000.000.000.000.000.000.000,00', { reverse: true });
            
        });
        $(document).ready(function () {
            $("#price").mask('000.000.000.000.000.000.000.000,00', { reverse: true });
            
        });
        $(document).ready(function () {
            $("#rate").mask('000.000.000.000.000.000.000.000,00', { reverse: true });
            
        });
        $("#coin").on('change',function(){
            coin = $(this).val();
            var price = document.getElementById("price").value;
            var price_new_format = price.replace(/[$.]/g,'').replace(/[,]/g,'.');
            if(coin == 'bolivares'){
                var total = price_new_format * document.getElementById("rate_expense").value;
                document.getElementById("price").value = total.toLocaleString('de-DE', {minimumFractionDigits: 2,maximumFractionDigits: 2});;        
            }else{
                var total = price_new_format / document.getElementById("rate_expense").value;
                document.getElementById("price").value = total.toLocaleString('de-DE', {minimumFractionDigits: 2,maximumFractionDigits: 2});;        
            }
        });


        function validacion() {

            let amount = document.getElementById("amount").value; 

            if (amount < 1) {

                alert('La cantidad del Producto debe ser mayor a 1');
                return false;
            }

            var discount = document.getElementById("discount").value; 

            if ((discount < 0) || (discount > 100)) {

                alert('El descuento debe estar entre 0% y 100%');
                return false;
            }
            
                return true;
           



        }

    </script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('admin.layouts.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\aryasoftware\resources\views/admin/expensesandpurchases/edit_product.blade.php ENDPATH**/ ?>