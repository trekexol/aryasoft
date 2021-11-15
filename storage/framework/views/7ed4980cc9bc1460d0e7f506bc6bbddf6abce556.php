<?php $__env->startSection('content'); ?>
  
    <!-- container-fluid -->
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="row py-lg-2">
            <div class="col-md-6">
                <h2>Editar Producto</h2>
            </div>

        </div>
    </div>
    <!-- /container-fluid -->

    
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

    <div class="card shadow mb-4">
        <div class="card-body">
            <form  method="POST"   action="<?php echo e(route('products.update',$product->id)); ?>" enctype="multipart/form-data" >
                <?php echo method_field('PATCH'); ?>
                <?php echo csrf_field(); ?>
                <div class="container py-2">
                    <div class="row">
                        <div class="col-12 ">
                            <form >
                               
                                <div class="form-group row">
                                        <label for="segment_id" class="col-md-2 col-form-label text-md-right">Segmento</label>
                                        <div class="col-md-4">   
                                            <select id="segment" name="segment" class="form-control" required>
                                                <?php $__currentLoopData = $segments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $segment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <?php if( $product->segment_id == $segment->id   ): ?>
                                                        <option  selected style="backgroud-color:blue;" value="<?php echo e($segment->id); ?>"><strong><?php echo e($segment->description); ?></strong></option>
                                                    <?php endif; ?>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <option class="hidden" disabled data-color="#A0522D" value="-1">------------------</option>
                                                <?php $__currentLoopData = $segments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $var2): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($var2->id); ?>" >
                                                        <?php echo e($var2->description); ?>

                                                    </option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </div> 
                                        <label for="subsegment" class="col-md-2 col-form-label text-md-right">Sub Segmento</label>
                                        <div class="col-md-4">
                                            <select id="subsegment" name="Subsegment" class="form-control" required>
                                                <?php $__currentLoopData = $subsegments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subsegment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <?php if( $product->subsegment_id == $subsegment->id   ): ?>
                                                        <option  selected style="backgroud-color:blue;" value="<?php echo e($subsegment->id); ?>"><strong><?php echo e($subsegment->description); ?></strong></option>
                                                    <?php endif; ?>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                               
                                            </select>
                                        </div> 
                                </div>
                                <div class="form-group row">
                                    <label for="twosubsegment" class="col-md-2 col-form-label text-md-right">Segundo Sub Segmento</label>
                                    <div class="col-md-4">
                                        <select id="twosubsegment" name="twoSubsegment" class="form-control" >
                                                <?php if( isset($product->twosubsegment_id) ): ?>
                                                    <option  selected style="backgroud-color:blue;" value="<?php echo e($product->twosubsegments['id']); ?>"><strong><?php echo e($product->twosubsegments['description']); ?></strong></option>
                                                <?php else: ?>
                                                    <option  selected style="backgroud-color:blue;" value="null"><strong>No tiene</strong></option>
                                                <?php endif; ?>
                                                <option disabled  style="backgroud-color:blue;"><strong>------------</strong></option>
                                                <option style="backgroud-color:blue;" value="null"><strong>Ninguno</strong></option>
                                                <?php $__currentLoopData = $twosubsegments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $twosubsegment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option style="backgroud-color:blue;" value="<?php echo e($twosubsegment->id); ?>"><strong><?php echo e($twosubsegment->description); ?></strong></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div> 
                                    <label for="threesubsegment" class="col-md-2 col-form-label text-md-right">Tercer Sub Segmento</label>
                                    <div class="col-md-4">
                                        <select id="threesubsegment" name="threeSubsegment" class="form-control" >
                                                <?php if( isset($product->threesubsegments['id']) ): ?>
                                                    <option  selected style="backgroud-color:blue;" value="<?php echo e($product->threesubsegments['id']); ?>"><strong><?php echo e($product->threesubsegments['description']); ?></strong></option>
                                                <?php else: ?>
                                                    <option  selected style="backgroud-color:blue;" value="null"><strong>No tiene</strong></option>
                                                <?php endif; ?>
                                                <option disabled  style="backgroud-color:blue;"><strong>------------</strong></option>
                                                <option style="backgroud-color:blue;" value="null"><strong>Ninguno</strong></option>
                                                <?php $__currentLoopData = $threesubsegments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $threesubsegment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option style="backgroud-color:blue;" value="<?php echo e($threesubsegment->id); ?>"><strong><?php echo e($threesubsegment->description); ?></strong></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div> 
                            </div>
           
        
                                <div class="form-group row">
                                    <label for="unitofmeasure" class="col-md-2 col-form-label text-md-right">Unidad de Medida</label>
                                     <div class="col-md-4">
                                        <select id="unit_of_measure_id" name="unit_of_measure_id" class="form-control" required>
                                            <?php $__currentLoopData = $unitofmeasures; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $var): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php if( $product->unit_of_measure_id == $var->id   ): ?>
                                                    <option  selected style="backgroud-color:blue;" value="<?php echo e($var->id); ?>"><strong><?php echo e($var->description); ?></strong></option>
                                                <?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <option class="hidden" disabled data-color="#A0522D" value="-1">------------------</option>
                                            <?php $__currentLoopData = $unitofmeasures; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $var2): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($var2['id']); ?>" >
                                                    <?php echo e($var2['description']); ?>

                                                </option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div> 
                                    <label for="code_comercial" class="col-md-2 col-form-label text-md-right">Código Comercial</label>
        
                                    <div class="col-md-4">
                                        <input id="code_comercial" type="text" class="form-control <?php $__errorArgs = ['code_comercial'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="code_comercial" value="<?php echo e($product->code_comercial); ?>" required autocomplete="code_comercial">
        
                                        <?php $__errorArgs = ['code_comercial'];
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
                                    <label for="type" class="col-md-2 col-form-label text-md-right">Tipo</label>
                                    <div class="col-md-4">
                                        <select class="form-control" id="type" name="type" title="type">
                                            <?php if($product->type == "MERCANCIA"): ?>
                                                <option value="MERCANCIA">Mercancía</option>
                                            <?php else: ?>
                                                <option value="SERVICIO">Servicio</option>
                                            <?php endif; ?>
                                            <option value="nulo">----------------</option>
                                            
                                            <div class="dropdown">
                                                <option value="MERCANCIA">Mercancía</option>
                                                <option value="SERVICIO">Servicio</option>
                                            </div>
                                            
                                            
                                        </select>
                                    </div>
                                    <label for="description" class="col-md-2 col-form-label text-md-right">descripción</label>
        
                                    <div class="col-md-4">
                                        <input id="description" type="text" class="form-control <?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="description" value="<?php echo e($product->description); ?>" required autocomplete="description">
        
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
                                    <label for="price" class="col-md-2 col-form-label text-md-right">Precio</label>
        
                                    <div class="col-md-4">
                                        <input id="price" type="text" class="form-control <?php $__errorArgs = ['price'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="price" value="<?php echo e($product->price); ?>" required autocomplete="price">
        
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
                                    <label for="price_buy" class="col-md-2 col-form-label text-md-right">Precio Compra</label>
        
                                    <div class="col-md-4">
                                        <input id="price_buy" type="text" class="form-control <?php $__errorArgs = ['price_buy'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="price_buy" value="<?php echo e($product->price_buy); ?>" required autocomplete="price_buy">
        
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
                                </div>
        
                                
                                <div class="form-group row">
                                    <label for="cost_average" class="col-md-2 col-form-label text-md-right">Costo Promedio</label>
        
                                    <div class="col-md-4">
                                        <input id="cost_average" type="text" class="form-control <?php $__errorArgs = ['cost_average'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="cost_average" value="<?php echo e($product->cost_average); ?>" required autocomplete="cost_average">
        
                                        <?php $__errorArgs = ['cost_average'];
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
                                    <label for="photo_product" class="col-md-2 col-form-label text-md-right">Foto del Producto</label>
        
                                    <div class="col-md-4">
                                        <input type="image" src="" alt="" width="48" height="48">
                                        <?php $__errorArgs = ['photo_product'];
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
                                    <label for="money" class="col-md-2 col-form-label text-md-right">Moneda</label>
        
                                    <div class="col-md-4">
                                        <select class="form-control" id="money" name="money" title="money">
                                            <?php if($product->money == "D"): ?>
                                                <option value="D">Dolar</option>
                                            <?php else: ?>
                                                <option value="Bs">Bolívares</option>
                                            <?php endif; ?>
                                            <option value="nulo">----------------</option>
                                            
                                            <div class="dropdown">
                                                <option value="D">Dolar</option>
                                                <option value="Bs">Bolívares</option>
                                            </div>
                                            
                                            
                                        </select>
                                    </div>
                                    <label for="exento" class="col-md-2 col-form-label text-md-right">exento</label>
                                    <div class="form-check">
                                        <?php if($product->exento == "1"): ?>
                                            <input class="form-check-input position-static" type="checkbox" id="exento" name="exento" value="1" checked aria-label="...">
                                        <?php else: ?>
                                            <input class="form-check-input position-static" type="checkbox" id="exento" name="exento"  aria-label="...">
                                        <?php endif; ?>
                                    </div>
                                  
                                    <label for="islr" class="col-md-1 col-form-label text-md-right">Islr</label>
                                    <div class="form-check">
                                        <?php if($product->islr == "1"): ?>
                                            <input class="form-check-input position-static" type="checkbox" id="islr" name="islr" value="1" checked aria-label="...">
                                        <?php else: ?>
                                            <input class="form-check-input position-static" type="checkbox" id="islr" name="islr"  aria-label="...">
                                        <?php endif; ?>
                                    </div>
                                </div>
                               
                                <div class="form-group row">
                                    <label for="special_impuesto" class="col-md-2 col-form-label text-md-right">Impuesto Especial</label>
        
                                    <div class="col-md-4">
                                        <input id="special_impuesto" type="text" class="form-control <?php $__errorArgs = ['special_impuesto'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="special_impuesto" value="<?php echo e($product->special_impuesto); ?>" required autocomplete="special_impuesto">
        
                                        <?php $__errorArgs = ['special_impuesto'];
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
                                   
                                    <label for="rol" class="col-md-2 col-form-label text-md-right">Status</label>
                
                                    <div class="col-md-4">
                                        <select class="form-control" id="status" name="status" title="status">
                                            <?php if($product->status == 1): ?>
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
                                    <div class="col-md-3 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                           Actualizar Producto
                                        </button>
                                    </div>
                                    <div class="col-md-2">
                                        <a href="<?php echo e(route('products')); ?>" id="btnfacturar" name="btnfacturar" class="btn btn-danger" title="facturar">Volver</a>  
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
 <?php $__env->stopSection(); ?>
 <?php $__env->startSection('validacion'); ?>
    <script>    
        $(document).ready(function () {
            $("#price").mask('000.000.000.000.000,00', { reverse: true });
            
        });
        $(document).ready(function () {
            $("#price_buy").mask('000.000.000.000.000,00', { reverse: true });
            
        });
        $(document).ready(function () {
            $("#cost_average").mask('000.000.000.000.000,00', { reverse: true });
            
        });
        $(document).ready(function () {
            $("#special_impuesto").mask('000.000.000.000.000,00', { reverse: true });
            
        });

	$(function(){
        soloAlfaNumerico('code_comercial');
        soloAlfaNumerico('description');
    });
    </script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('product_edit'); ?>
    <script>
            
            $("#segment").on('change',function(){
                var segment_id = $(this).val();
                $("#subsegment").val("");
               
                // alert(segment_id);
                getSubsegment(segment_id);
            });

        function getSubsegment(segment_id){
            
            $.ajax({
                url:"<?php echo e(route('subsegment.list')); ?>" + '/' + segment_id,
             
                beforSend:()=>{
                    alert('consultando datos');
                },
                success:(response)=>{
                    let subsegment = $("#subsegment");
                    let htmlOptions = `<option value='' >Seleccione..</option>`;
                    // console.clear();
                    if(response.length > 0){
                        response.forEach((item, index, object)=>{
                            let {id,description} = item;
                            htmlOptions += `<option value='${id}' <?php echo e(old('Subsegment') == '${id}' ? 'selected' : ''); ?>>${description}</option>`

                        });
                    }
                    //console.clear();
                    // console.log(htmlOptions);
                    subsegment.html('');
                    subsegment.html(htmlOptions);
                
                    
                
                },
                error:(xhr)=>{
                    alert('Presentamos inconvenientes al consultar los datos');
                }
            })
        }

        $("#subsegment").on('change',function(){
                var subsegment_id = $(this).val();
                //$("#twosubsegment option").remove();
                getTwoSubsegment(subsegment_id);
            });

     
    
            function getTwoSubsegment(subsegment_id){
            $.ajax({
                url:"<?php echo e(route('products.listtwosubsegment','')); ?>" + '/' + subsegment_id,
             
                beforSend:()=>{
                    alert('consultando datos');
                },
                success:(response)=>{
                    let twosubsegment = $("#twosubsegment");
                    let htmlOptions = `<option value='' >Seleccione..</option>`;
                    // console.clear();
                    if(response.length > 0){
                        response.forEach((item, index, object)=>{
                            let {id,description} = item;
                            htmlOptions += `<option value='${id}' <?php echo e(old('TwoSubsegment') == '${id}' ? 'selected' : ''); ?>>${description}</option>`

                        });
                    }
                    //console.clear();
                    // console.log(htmlOptions);
                    twosubsegment.html('');
                    twosubsegment.html(htmlOptions);
                
                    
                
                },
                error:(xhr)=>{
                    alert('Presentamos inconvenientes al consultar los datos');
                }
            })
        }
        $("#twosubsegment").on('change',function(){
                var twosubsegment_id = $(this).val();
                $("#threesubsegment").val("");

                getThreeSubsegment(twosubsegment_id);
            });

     
    
            function getThreeSubsegment(twosubsegment_id){
            
            $.ajax({
                url:"<?php echo e(route('products.listthreesubsegment','')); ?>" + '/' + twosubsegment_id,
             
                beforSend:()=>{
                    alert('consultando datos');
                },
                success:(response)=>{
                    let subsegment = $("#threesubsegment");
                    let htmlOptions = `<option value='' >Seleccione..</option>`;
                    // console.clear();
                    if(response.length > 0){
                        response.forEach((item, index, object)=>{
                            let {id,description} = item;
                            htmlOptions += `<option value='${id}' <?php echo e(old('ThreeSubsegment') == '${id}' ? 'selected' : ''); ?>>${description}</option>`

                        });
                    }
                    //console.clear();
                    // console.log(htmlOptions);
                    subsegment.html('');
                    subsegment.html(htmlOptions);
                
                    
                
                },
                error:(xhr)=>{
                    alert('Presentamos inconvenientes al consultar los datos');
                }
            })
        }



    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\aryasoftware\resources\views/admin/products/edit.blade.php ENDPATH**/ ?>