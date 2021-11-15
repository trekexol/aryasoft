<?php $__env->startSection('content'); ?>

<ul class="nav nav-tabs justify-content-center" id="myTab" role="tablist">
    <li class="nav-item" role="presentation">
        <a class="nav-link font-weight-bold" style="color: black;" id="home-tab"  href="<?php echo e(route('expensesandpurchases')); ?>" role="tab" aria-controls="home" aria-selected="true">Gastos y Compras</a>
    </li>
    <li class="nav-item" role="presentation">
        <a class="nav-link font-weight-bold" style="color: black;" id="home-tab"  href="<?php echo e(route('expensesandpurchases.indexdeliverynote')); ?>" role="tab" aria-controls="home" aria-selected="true">Ordenes de Compra</a>
    </li>
    <li class="nav-item" role="presentation">
        <a class="nav-link font-weight-bold" style="color: black;" id="profile-tab"  href="<?php echo e(route('expensesandpurchases.index_historial')); ?>" role="tab" aria-controls="profile" aria-selected="false">Historial</a>
    </li>
    <li class="nav-item" role="presentation">
        <a class="nav-link active font-weight-bold" style="color: black;" id="profile-tab"  href="<?php echo e(route('anticipos.index_provider')); ?>" role="tab" aria-controls="profile" aria-selected="false">Anticipo a Proveedores</a>
    </li>
</ul>
<!-- container-fluid -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row py-lg-2">
        <div class="col-md-4 h4">
            Anticipos a Proveedores
        </div>
        <?php if($control != 'index'): ?>
            <div class="col-md-2 offset-md-3">
                <a href="<?php echo e(route('anticipos.index_provider')); ?>" class="btn btn-info btn-icon-split">
                    <span class="icon text-white-50">
                        <i class="fas fa-hand-holding-usd"></i>
                    </span>
                    <span class="text">Anticipos</span>
                </a>
            </div>
        <?php else: ?>
            <div class="col-md-4 offset-md-1">
                <a href="<?php echo e(route('anticipos.historic_provider')); ?>" class="btn btn-success btn-icon-split">
                    <span class="icon text-white-50">
                        <i class="fas fa-book"></i>
                    </span>
                    <span class="text">Ver Historico de Anticipos</span>
                </a>
            </div>
        <?php endif; ?>
        
        
       
        <?php if(Auth::user()->role_id  == '1' || Auth::user()->role_id  == '2' ): ?>
        <div class="col-md-3">
            <a href="<?php echo e(route('anticipos.create_provider')); ?>" class="btn btn-primary" role="button" aria-pressed="true">Registrar un Anticipo</a>
         
        </div>
        <?php endif; ?>
       
            
       
    </div>

  </div>

  
<?php echo $__env->make('admin.layouts.success', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>   
<?php echo $__env->make('admin.layouts.danger', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>    
<?php echo $__env->make('admin.layouts.delete', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>    


<div class="card shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">
        <table class="table table-light2 table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
            <tr>
                <th class="text-center">Cliente</th>
                <th class="text-center">Caja/Banco</th>
                <th class="text-center">Fecha del Anticipo</th>
                <th class="text-center">Referencia</th>
                <th class="text-center">Monto</th>
                <th class="text-center">Moneda</th>
               <th class="text-center" width="7%"></th>
              
            </tr>
            </thead>
            
            <tbody>
                <?php if(empty($anticipos)): ?>
                <?php else: ?>
                    <?php $__currentLoopData = $anticipos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $anticipo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php 
                        if($anticipo->coin != 'bolivares'){
                            $anticipo->amount = $anticipo->amount / $anticipo->rate;
                        }
                    ?>
                    <tr>
                    <?php if(isset($anticipo->expenses['serie'])): ?>
                        <td class="text-center"><?php echo e($anticipo->providers['razon_social'] ?? ''); ?> , fact(<?php echo e($anticipo->expenses['serie'] ?? ''); ?>)</td>
                    <?php else: ?>
                        <td class="text-center"><?php echo e($anticipo->providers['razon_social'] ?? ''); ?></td>
                    <?php endif; ?>
                    
                    <td class="text-center"><?php echo e($anticipo->accounts['description'] ?? ''); ?></td>
                    <td class="text-center"><?php echo e($anticipo->date); ?></td>
                    <td class="text-center"><?php echo e($anticipo->reference ?? ''); ?></td>
                    <td class="text-right"><?php echo e(number_format($anticipo->amount, 2, ',', '.')); ?></td>
                    <td class="text-center"><?php echo e($anticipo->coin); ?></td>
                   
                    <?php if(Auth::user()->role_id  == '1'): ?>
                        <td>
                            <a href="<?php echo e(route('anticipos.edit',$anticipo->id)); ?>"  title="Editar"><i class="fa fa-edit"></i></a>
                            <a href="#" class="delete" data-id-anticipo=<?php echo e($anticipo->id); ?> data-toggle="modal" data-target="#deleteModal" title="Eliminar"><i class="fa fa-trash text-danger"></i></a>  
                            </td>
                    <?php endif; ?>
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
            <form action="<?php echo e(route('anticipos.delete_provider')); ?>" method="post">
                <?php echo csrf_field(); ?>
                <?php echo method_field('DELETE'); ?>
                <input id="id_anticipo_modal" type="hidden" class="form-control <?php $__errorArgs = ['id_anticipo_modal'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="id_anticipo_modal" readonly required autocomplete="id_anticipo_modal">
                       
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
         
         let id_anticipo = $(this).attr('data-id-anticipo');

         $('#id_anticipo_modal').val(id_anticipo);
        });
    </script> 
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\aryasoftware\resources\views/admin/anticipos/index_provider.blade.php ENDPATH**/ ?>