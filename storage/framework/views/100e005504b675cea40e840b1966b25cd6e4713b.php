<?php $__env->startSection('content'); ?>

<div class="container-fluid">
    <div class="row py-lg-2">
       
        <div class="col-sm-10">
            <h2>Seleccione un Producto del Inventario</h2>
        </div>
        <div class="col-sm-2">
            <select class="form-control" name="type" id="type">
                <?php if(isset($type)): ?>
                    <?php if($type == 'productos'): ?>
                        <option disabled selected value="<?php echo e($type); ?>"><?php echo e($type); ?></option>
                        <option disabled  value="<?php echo e($type); ?>">-----------</option>
                    <?php else: ?>
                        <option disabled selected value="servicios">servicios</option>
                        <option disabled  value="servicios">-----------</option>
                    <?php endif; ?>
                    
                <?php else: ?>
                    <option disabled selected value="productos">productos</option>
                <?php endif; ?>
                
                <option  value="productos">productos</option>
                <option value="servicios">servicios</option>
            </select>
        </div>
    
    </div>
</div>


  <!-- /.container-fluid -->
  
  <?php echo $__env->make('admin.layouts.success', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>   
  <?php echo $__env->make('admin.layouts.danger', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>    
  <?php echo $__env->make('admin.layouts.delete', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>    
  
<!-- DataTales Example -->
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
        </div>
        <div class="table-responsive">
        <table class="table table-light2 table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
            <tr> 
                <th class="text-center"></th>
                <th class="text-center">SKU</th>
                <th class="text-center">Descripción</th>
                <th class="text-center">Cantidad</th>
                <th class="text-center">Precio Bs</th>
                <th class="text-center">Precio Moneda</th>
                <th class="text-center">Moneda</th>
                <th class="text-center">Foto del Producto</th>
                
              
                
                
            </tr>
            </thead>
            
            <tbody>
                <?php if(empty($inventories)): ?>
                <?php else: ?>  
                    <?php $__currentLoopData = $inventories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $var): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td>
                                <a href="<?php echo e(route('quotations.createproduct',[$id_quotation,$coin,$var->id_inventory])); ?>" title="Seleccionar"><i class="fa fa-check"></i></a>
                            </td>
                            <td><?php echo e($var->code_comercial); ?></td>
                            <td><?php echo e($var->description); ?></td>
                            <td><?php echo e($var->amount ?? 0); ?></td>
                           
                            <?php if($var->money != 'Bs'): ?>
                                <td style="text-align: right"><?php echo e(number_format($var->price * $bcv_quotation_product, 2, ',', '.')); ?></td>
                                <td style="text-align: right"><?php echo e(number_format($var->price, 2, ',', '.')); ?></td> 
                            <?php else: ?>
                                <td style="text-align: right"><?php echo e(number_format($var->price, 2, ',', '.')); ?></td> 
                                <td style="text-align: right"></td> 
                            <?php endif; ?>
                            
                           
                            <?php if($var->money == "D"): ?>
                                <td>Dolar</td>
                            <?php else: ?>
                                <td>Bolívar</td>
                            <?php endif; ?>

                            <td><?php echo e($var->photo_product ?? ''); ?></td> 
                            
                        </tr>     
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>   
                <?php endif; ?>
            </tbody>
        </table>
        </div>
    </div>
</div>
  
<?php $__env->stopSection(); ?>
<?php $__env->startSection('javascript'); ?>
    <script>
        $('#dataTable').DataTable({
            "ordering": false,
            "order": [],
            'aLengthMenu': [[50, 100, 150, -1], [50, 100, 150, "Todo"]]
        });

        $("#type").on('change',function(){
            type = $(this).val();
            window.location = "<?php echo e(route('quotations.selectproduct', [$id_quotation,$coin,''])); ?>"+"/"+type;
        });


        
        $("body").toggleClass("sidebar-toggled");
        $(".sidebar").toggleClass("toggled");
        if ($(".sidebar").hasClass("toggled")) {
            $('.sidebar .collapse').collapse('hide');
        };
    </script> 
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\aryasoftware\resources\views/admin/quotations/selectinventary.blade.php ENDPATH**/ ?>