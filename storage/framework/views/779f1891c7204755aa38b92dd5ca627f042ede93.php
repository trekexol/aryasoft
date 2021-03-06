<?php $__env->startSection('content'); ?>

<ul class="nav nav-tabs justify-content-center" id="myTab" role="tablist">
    <li class="nav-item" role="presentation">
      <a class="nav-link font-weight-bold" style="color: black;" id="home-tab"  href="<?php echo e(route('products')); ?>" role="tab" aria-controls="home" aria-selected="true">Productos</a>
    </li>
    <li class="nav-item" role="presentation">
      <a class="nav-link active font-weight-bold" style="color: black;" id="profile-tab"  href="<?php echo e(route('inventories')); ?>" role="tab" aria-controls="profile" aria-selected="false">Inventarios</a>
    </li>
    <li class="nav-item" role="presentation">
        <a class="nav-link font-weight-bold" style="color: black;" id="home-tab"  href="<?php echo e(route('combos')); ?>" role="tab" aria-controls="home" aria-selected="true">Combos</a>
    </li>
    <li class="nav-item" role="presentation">
      <a class="nav-link font-weight-bold" style="color: black;" id="contact-tab"  href="<?php echo e(route('inventories.movement')); ?>" role="tab" aria-controls="contact" aria-selected="false">Movimientos de Inventario</a>
    </li>
    
  </ul>
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row py-lg-2">
       
        <div class="col-md-4">
            <a href="<?php echo e(route('products.create')); ?>" class="btn btn-warning  float-md-center" role="button" aria-pressed="true">Registrar un Producto Nuevo</a>
          </div>
       
        <div class="col-md-2 dropdown mb-4">
            <button class="btn btn-info dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                aria-expanded="false">
                Imprimir
            </button>
            <div class="dropdown-menu animated--fade-in" aria-labelledby="dropdownMenuButton">
                
                <a class="dropdown-item" onclick="pdfinventory();" style="color: rgb(4, 119, 252)"> <i class="fas fa-download fa-sm fa-fw mr-2 text-blue-400"></i><strong>Imprimir Inventario Actual</strong></a>
                <br>
                <a class="dropdown-item" href="" style="color: rgb(4, 119, 252)"> <i class="fas fa-file-export fa-sm fa-fw mr-2 text-blue-400"></i><strong>Imprimir Historial del Inventario</strong></a>
                
            </div>
        </div>
     
    
        
        
       
         <!--
            <div class="col-md-6">
                <a href="<?php echo e(route('inventories.select')); ?>" class="btn btn-success  float-md-right " role="button" aria-pressed="true">Registrar un Inventario</a>
              </div>  -->
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
                <th class="text-center">SKU</th>
                <th class="text-center">Descripci??n</th>
                <th class="text-center">Cantidad</th>
                <th class="text-center">Costo</th>
                
                <th class="text-center">Moneda</th>
              
                <th class="text-center">Foto del Producto</th>
                
                <th class="text-center"></th>
            </tr>
            </thead>
            
            <tbody>
                <?php if(empty($inventories)): ?>
                <?php else: ?>  
                    <?php $__currentLoopData = $inventories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $var): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td class="text-center"><?php echo e($var->code); ?></td>
                            <td class="text-center"><?php echo e($var->description); ?></td>
                            <td class="text-right"><?php echo e(number_format($var->amount, 2, ',', '.')); ?></td> 
                            <td class="text-right"><?php echo e(number_format($var->price, 2, ',', '.')); ?></td>
                            
                            <?php if($var->money == "D"): ?>
                            <td class="text-center">Dolar</td>
                            <?php else: ?>
                            <td class="text-center">Bol??var</td>
                            <?php endif; ?>

                            <td class="text-center"><?php echo e($var->photo_product); ?></td> 
                            
                            <td class="text-center">
                                <a href="<?php echo e(route('inventories.create_increase_inventory',$var->id_inventory)); ?>" style="color: blue;" title="Aumentar Inventario"><i class="fa fa-plus"></i></a>
                                <a href="<?php echo e(route('inventories.create_decrease_inventory',$var->id_inventory)); ?>" style="color: rgb(248, 62, 62);" title="Disminuir Inventario"><i class="fa fa-minus"></i></a>
                            </td>
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

    <script type="text/javascript">
            function pdfinventory() {
                
                var nuevaVentanainventory = window.open("<?php echo e(route('pdf.inventory')); ?>","ventana","left=800,top=800,height=800,width=1000,scrollbar=si,location=no ,resizable=si,menubar=no");
        
            }
     
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
    

        </script> 
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\aryasoftware\resources\views/admin/inventories/index.blade.php ENDPATH**/ ?>