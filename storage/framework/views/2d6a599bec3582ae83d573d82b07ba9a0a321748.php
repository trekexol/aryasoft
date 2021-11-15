<?php $__env->startSection('content'); ?>

<ul class="nav nav-tabs justify-content-center" id="myTab" role="tablist">
    <li class="nav-item" role="presentation">
      <a class="nav-link font-weight-bold" style="color: black;" id="home-tab"  href="<?php echo e(route('products')); ?>" role="tab" aria-controls="home" aria-selected="true">Productos</a>
    </li>
    <li class="nav-item" role="presentation">
      <a class="nav-link font-weight-bold" style="color: black;" id="profile-tab"  href="<?php echo e(route('inventories')); ?>" role="tab" aria-controls="profile" aria-selected="false">Inventarios</a>
    </li>
    <li class="nav-item" role="presentation">
      <a class="nav-link active font-weight-bold" style="color: black;" id="home-tab"  href="<?php echo e(route('combos')); ?>" role="tab" aria-controls="home" aria-selected="true">Combos</a>
    </li>
    <li class="nav-item" role="presentation">
      <a class="nav-link font-weight-bold" style="color: black;" id="contact-tab"  href="<?php echo e(route('inventories.movement')); ?>" role="tab" aria-controls="contact" aria-selected="false">Movimientos de Inventario</a>
    </li>
    
  </ul>

<!-- container-fluid -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row py-lg-2">
      <div class="col-md-6">
      </div>
      <div class="col-md-6">
        <a href="<?php echo e(route('combos.create')); ?>" class="btn btn-primary float-md-right" role="button" aria-pressed="true">Registrar un Combo</a>
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
               
            
              <th class="text-center">Código</th>
              <th class="text-center">Descripción</th>
              <th class="text-center">Precio</th>
              <th class="text-center">Moneda</th>
            
              <th class="text-center" width="9%"></th>
            </tr>
            </thead>
            
            <tbody>
                <?php if(empty($combos)): ?>
                <?php else: ?>  
                    <?php $__currentLoopData = $combos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $combo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                           
                            <td class="text-center"><?php echo e($combo->code_comercial); ?></td>
                            <td class="text-center"><?php echo e($combo->description); ?></td>
                            <td class="text-right"><?php echo e(number_format($combo->price, 2, ',', '.')); ?></td>
                            
                            <?php if($combo->money == 'Bs'): ?>
                              <td class="text-center">Bolivares</td>
                            <?php else: ?>
                              <td class="text-center">Dolares</td>
                            <?php endif; ?>
                            
                            <td class="text-center">
                              <a href="<?php echo e(route('combos.create_assign',$combo->id)); ?>"  title="Asignar Productos"><i class="fa fa-check"></i></a>
                              <a href="<?php echo e(route('combos.edit',$combo->id)); ?>"  title="Editar"><i class="fa fa-edit"></i></a>
                                <a href="#" class="delete" data-id-combo=<?php echo e($combo->id); ?> data-toggle="modal" data-target="#deleteModal" title="Eliminar"><i class="fa fa-trash text-danger"></i></a>  
                            </td>
                        </tr>     
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>   
                <?php endif; ?>
            </tbody>
        </table>
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
          <form action="<?php echo e(route('combos.delete')); ?>" method="post">
              <?php echo csrf_field(); ?>
              <?php echo method_field('DELETE'); ?>
              <input id="id_combo_modal" type="hidden" class="form-control <?php $__errorArgs = ['id_combo_modal'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="id_combo_modal" readonly required autocomplete="id_combo_modal">
                     
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
<?php $__env->startSection('javascript'); ?>
     <script>
        $('#dataTable').DataTable({
            "ordering": false,
            "order": [],
            'aLengthMenu': [[50, 100, 150, -1], [50, 100, 150, "All"]]
        });

        $(document).on('click','.delete',function(){
         
            let id_combo = $(this).attr('data-id-combo');
    
            $('#id_combo_modal').val(id_combo);
        });
        </script> 
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\aryasoftware\resources\views/admin/combos/index.blade.php ENDPATH**/ ?>