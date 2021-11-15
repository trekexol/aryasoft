<?php $__env->startSection('content'); ?>

<!-- container-fluid -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row py-lg-2">
        <div class="col-sm-7">
            <h2>Seleccione los Productos para el Combo</h2>
        </div>
        <div class="col-sm-3">
           <input type="button" title="Agregar" value="Guardar Cambios" class="btn btn-primary float-md-right" role="button" aria-pressed="true"  onclick="formSend();" >
        </div>
        <div class="col-sm-2">
            <a href="<?php echo e(route('combos')); ?>" class="btn btn-danger">
                Volver
            </a>
        </div>
    </div>
  </div>
  <!-- /.container-fluid -->
  
  <?php echo $__env->make('admin.layouts.success', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>   
  <?php echo $__env->make('admin.layouts.danger', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>    
  <?php echo $__env->make('admin.layouts.delete', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>    
  
<!-- DataTales Example -->
<form id="formSend" method="POST" action="<?php echo e(route('combos.store_assign')); ?>" enctype="multipart/form-data">
    <?php echo csrf_field(); ?>
    <input id="id_products" type="hidden" class="form-control <?php $__errorArgs = ['id_products'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="id_products"  readonly required autocomplete="id_products">
    <input id="id_combo" type="hidden" class="form-control <?php $__errorArgs = ['id_combo'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="id_combo" value="<?php echo e($id_combo); ?>" readonly required autocomplete="id_combo">
    
    <input id="combo_products" type="hidden" class="form-control <?php $__errorArgs = ['combo_products'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="combo_products" readonly required autocomplete="combo_products">
              
    
    
<div class="card shadow mb-4">
    
    <div class="card-body">
        <div class="container">
            <?php if(session('flash')): ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <?php echo e(session('flash')); ?>

                    <button type="button" class="close" data-dismiss="alert" aria-label="close">
                        <span aria-hidden="true">&times; </span>
                    </button>
                </div>   
            <?php endif; ?>
            <div class="form-group row">
                <label for="price" class="col-md-2 col-form-label text-md-right">Precio de Venta:</label>

                <div class="col-md-2">
                    <input id="price" type="text" class="form-control <?php $__errorArgs = ['price'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="price" value="<?php echo e(old('price')); ?>" required autocomplete="price">

                    <?php $__errorArgs = ['price'];
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
                <label for="price_buy" class="col-md-2 col-form-label text-md-right">Precio de Compra:</label>

                <div class="col-md-2">
                    <input id="price_buy" type="text" class="form-control <?php $__errorArgs = ['price_buy'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="price_buy" value="<?php echo e(old('price_buy')); ?>" required autocomplete="price_buy">

                    <?php $__errorArgs = ['price_buy'];
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
                <div class="custom-control custom-switch">
                    <input type="checkbox" class="custom-control-input" checked id="customSwitches" name="updatePrices">
                    <label class="custom-control-label" for="customSwitches">Actualizar Precios</label>
                    
                </div>
            </div>
        </div>
        <div class="table-responsive">
        <table class="table table-light2 table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
            <tr> 
                <th></th>
                <th>Cantidad</th>
                <th>Código Comercial</th>
                <th>Descripción</th>
                <th>Precio</th>
                <th>Moneda</th>
                <th>Segmento</th>
                <th>Sub Segmento</th>
                
                
            </tr>
            </thead>
            
            <tbody>
                <?php if(empty($products)): ?>
                <?php else: ?>  
                    <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td>
                                <input onclick="selectProduct(<?php echo e($product); ?>);" type="checkbox" id="flexCheckChecked<?php echo e($product->id); ?>">                        
                            </td>
                            <td>
                                <input id="amount<?php echo e($product->id); ?>" onblur="updateAmount(<?php echo e($product); ?>)" onclick="valueOld(<?php echo e($product); ?>)" type="text" class="form-control <?php $__errorArgs = ['amount<?php echo e($product->id); ?>'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="amount<?php echo e($product->id); ?>" placeholder="0,00" autocomplete="amount<?php echo e($product->id); ?>">
                            </td>
                            <td><?php echo e($product->code_comercial ?? ''); ?></td>
                            <td><?php echo e($product->description ?? ''); ?></td>
                            <td><?php echo e(number_format($product->price ?? 0, 2, ',', '.')); ?></td>
                            <?php if($product->money == "D"): ?>
                                <td>Dolar</td>
                            <?php else: ?>
                                <td>Bolívar</td>
                            <?php endif; ?>
                            <td><?php echo e($product->segments['description'] ?? ''); ?></td>
                            <td><?php echo e($product->subsegments['description'] ?? ''); ?></td> 
                        </tr>     
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>   
                <?php endif; ?>
            </tbody>
        </table>
        
        </div>
    </div>
</div>

</form>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('javascript'); ?>
    <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <script>
        $(document).ready(function () {
            $("#amount<?php echo e($product->id); ?>").mask('000.000.000.000.000.000.000,00', { reverse: true });
        });
        
    </script>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    
    <script>
        $(document).ready(function () {
            $("#price").mask('000.000.000.000.000.000.000,00', { reverse: true });
        });
        $(document).ready(function () {
            $("#price_buy").mask('000.000.000.000.000.000.000,00', { reverse: true });
        });
        
        $('#dataTable').DataTable({
            "ordering": false,
            "order": [],
            'aLengthMenu': [[50, 100, 150, -1], [50, 100, 150, "All"]]
        });

        function formSend(){
            document.getElementById("formSend").submit();       
        }

        
        let products = [];
        var controller_add = true;
        var value_old = 0;

        var bcv = "<?php echo e($bcv ?? 1); ?>";

        function selectProduct(product){

            var isChecked = document.getElementById('flexCheckChecked'+product.id).checked;

            if(product.money == 'Bs'){
                product.price = product.price / bcv;
                product.price_buy = product.price_buy / bcv;
            }
            
            if(isChecked){
                document.getElementById('amount'+product.id).value = "1,00";
            }else{
                document.getElementById('amount'+product.id).value = "0,00";
            }
            
            updateValuePrice(isChecked,product.price,product.price_buy);
            
            addProduct(product.id);
        }

        function valueOld(product){
            value_old = parseFloat(newFormat(document.getElementById('amount'+product.id).value));
        }

        function updateAmount(product){
           
            if(product.money == 'Bs'){
                product.price = product.price / bcv;
                product.price_buy = product.price_buy / bcv;
            }

            var isChecked = document.getElementById('flexCheckChecked'+product.id).checked;

            var amount = parseFloat(newFormat(document.getElementById('amount'+product.id).value));

            amount = amount - value_old;

            updateValuePrice(isChecked,product.price * amount,product.price_buy * amount);
        }


        function updateValuePrice(isChecked,price,price_buy){
            
           
            var price_form = newFormat(document.getElementById("price").value);

            var price_buy_form = newFormat(document.getElementById("price_buy").value); 
            
            if(isChecked){
                document.getElementById("price").value = (parseFloat(price_form) + parseFloat(price)).toLocaleString('de-DE', {minimumFractionDigits: 2,maximumFractionDigits: 2});
                document.getElementById("price_buy").value = (parseFloat(price_buy_form) + parseFloat(price_buy)).toLocaleString('de-DE', {minimumFractionDigits: 2,maximumFractionDigits: 2});
            }else{
                document.getElementById("price").value = (parseFloat(price_form) + (parseFloat(price)*-1)).toLocaleString('de-DE', {minimumFractionDigits: 2,maximumFractionDigits: 2});   
                document.getElementById("price_buy").value = (parseFloat(price_buy_form) + (parseFloat(price_buy)*-1)).toLocaleString('de-DE', {minimumFractionDigits: 2,maximumFractionDigits: 2});   
            }
           
        }
        

        
        //esta funcion agrega y elimina productos de la lista que se anadiran al combo
        function addProduct(id_product){
            
            products.forEach(function(element, index, object) {
                if(element == id_product){
                    //elimina el elemento al encontrarlo
                    object.splice(index, 1);
                    controller_add = false;
                }
            });
            
            if(controller_add){
                //agrega el elemento si no existe en la lista de products
                products.push(id_product);
            }else{
                controller_add = true;
            }
            
            document.getElementById("id_products").value = products;
        }

        function newFormat(old_format){
            var montoFormat = old_format.replace(/[$.]/g,'');

            return montoFormat.replace(/[,]/g,'.');       
        }

    </script> 
        

    <?php if(isset($combo_products)): ?>
        <?php
            //Aqui se inicializa los precios y toda la pagina
            $total_price = 0;  
            $total_price_buy = 0;        
        ?>
        <?php $__currentLoopData = $combo_products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $combo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php
                if((isset($combo->products['money'])) && ($combo->products['money'] == 'D')){
                    $total_price += $combo->products['price'] ?? 0;  
                    $total_price_buy += $combo->products['price_buy'] ?? 0; 
                }else{
                    $total_price += ($combo->products['price'] ?? 0) / ($bcv ?? 1);  
                    $total_price_buy += ($combo->products['price_buy'] ?? 0) / ($bcv ?? 1); 
                }
                    
            ?>
            <script>
                //aqui seleccionamos los productos que ya tenga el combo y los asignamos a la lista de productos
                products.push("<?php echo e($combo->id_product); ?>");
                document.getElementById("combo_products").value = products;
                document.getElementById("flexCheckChecked<?php echo e($combo->id_product); ?>").checked = true;
                document.getElementById("amount<?php echo e($combo->id_product); ?>").value = "<?php echo e(number_format($combo->amount_per_product, 2, ',', '.')); ?>";
                document.getElementById("id_products").value = products;
            </script> 
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <script>
            //aqui asignamos los precios
            document.getElementById("price").value = "<?php echo e(number_format($total_price, 2, ',', '.')); ?>";
            document.getElementById("price_buy").value = "<?php echo e(number_format($total_price_buy, 2, ',', '.')); ?>";
        </script> 
    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\aryasoftware\resources\views/admin/combos/selectproduct.blade.php ENDPATH**/ ?>