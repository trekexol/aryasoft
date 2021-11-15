<?php $__env->startSection('content'); ?>

   
<ul class="nav nav-tabs justify-content-center" id="myTab" role="tablist">
    <li class="nav-item" role="presentation">
      <a class="nav-link  font-weight-bold" style="color: black;" id="home-tab"  href="<?php echo e(route('quotations')); ?>" role="tab" aria-controls="home" aria-selected="true">Cotizaciones</a>
    </li>
    <li class="nav-item" role="presentation">
      <a class="nav-link font-weight-bold" style="color: black;" id="profile-tab"  href="<?php echo e(route('invoices')); ?>" role="tab" aria-controls="profile" aria-selected="false">Facturas</a>
    </li>
    <li class="nav-item" role="presentation">
      <a class="nav-link font-weight-bold" style="color: black;" id="contact-tab"  href="<?php echo e(route('quotations.indexdeliverynote')); ?>" role="tab" aria-controls="contact" aria-selected="false">Notas De Entrega</a>
    </li>
    <li class="nav-item" role="presentation">
        <a class="nav-link font-weight-bold" style="color: black;" id="contact-tab"  href="<?php echo e(route('orders.index')); ?>" role="tab" aria-controls="contact" aria-selected="false">Pedidos</a>
    </li>
    <li class="nav-item" role="presentation">
        <a class="nav-link font-weight-bold" style="color: black;" id="profile-tab"  href="<?php echo e(route('sales')); ?>" role="tab" aria-controls="profile" aria-selected="false">Ventas</a>
      </li>
    <li class="nav-item" role="presentation">
        <a class="nav-link active font-weight-bold" style="color: black;" id="contact-tab"  href="<?php echo e(route('anticipos')); ?>" role="tab" aria-controls="contact" aria-selected="false">Anticipos Clientes</a>
    </li>
    <li class="nav-item" role="presentation">
        <a class="nav-link font-weight-bold" style="color: black;" id="profile-tab"  href="<?php echo e(route('clients')); ?>" role="tab" aria-controls="profile" aria-selected="false">Clientes</a>
    </li>
    <li class="nav-item" role="presentation">
        <a class="nav-link font-weight-bold" style="color: black;" id="contact-tab"  href="<?php echo e(route('vendors')); ?>" role="tab" aria-controls="contact" aria-selected="false">Vendedores</a>
    </li>
  </ul>

<!-- container-fluid -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row py-lg-2">
        <div class="col-md-3 h4">
            Anticipos de Clientes
        </div>
        <div class="col-md-2">
            <a href="<?php echo e(route('anticipos')); ?>" class="btn btn-info btn-icon-split">
                <span class="icon text-white-50">
                    <i class="fas fa-hand-holding-usd"></i>
                </span>
                <span class="text">Anticipos</span>
            </a>
        </div>
        <div class="col-md-4">
            <a href="<?php echo e(route('anticipos.historic')); ?>" class="btn btn-success btn-icon-split">
                <span class="icon text-white-50">
                    <i class="fas fa-book"></i>
                </span>
                <span class="text">Ver Historico de Anticipos</span>
            </a>
        </div>
       
        <?php if(Auth::user()->role_id  == '1' || Auth::user()->role_id  == '2' ): ?>
        <div class="col-md-3">
            <a href="<?php echo e(route('anticipos.create')); ?>" class="btn btn-primary" role="button" aria-pressed="true">Registrar un Anticipo</a>

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
                <th class="text-center">REF</th>
                <th class="text-center">Monto</th>
                <th class="text-center">Moneda</th>
                <?php if(isset($control) && ($control == 'index')): ?>
                    <th class="text-center"></th>
                <?php endif; ?>
            </tr>
            </thead>
            
            <tbody>
                <?php if(empty($anticipos)): ?>
                <?php else: ?>
                    <?php $__currentLoopData = $anticipos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $anticipo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php 

                        $amount_bcv = 0;
                        
                        $amount_bcv = $anticipo->amount / $anticipo->rate;


                        if($anticipo->coin != 'bolivares'){
                            $anticipo->amount = $anticipo->amount / $anticipo->rate;
                        }


                        if (isset($anticipo->quotations['number_invoice'])) {
                            
                            $num_fac = 'Factura: '.$anticipo->quotations['number_invoice'].' Ctrl/Serie: '.$anticipo->quotations['serie'];

                        } else {

                            if (isset($anticipo->quotations['number_delivery_note'])) {
                            
                            $num_fac = 'Nota de Entrega: '.$anticipo->quotations['number_delivery_note'].' Ctrl/Serie: '.$anticipo->quotations['serie'];
                            
                            } else {

                                $num_fac = '';
                            }
                        }

                    ?>
                    <tr>
                       
                    <td class="text-center"><?php echo e($anticipo->clients['name'] ?? ''); ?><br><?php echo e($num_fac); ?></td>
                    <td class="text-center"><?php echo e($anticipo->accounts['description'] ?? ''); ?></td>
                    <td class="text-center"><?php echo e($anticipo->date ?? ''); ?></td>
                    <td class="text-center"><?php echo e($anticipo->reference ?? ''); ?></td>
                    <td class="text-right">$<?php echo e(number_format($amount_bcv ?? 0, 2, ',', '.')); ?></td>
                    <td class="text-right"><?php echo e(number_format($anticipo->amount ?? 0, 2, ',', '.')); ?></td>
                    <td class="text-center"><?php echo e($anticipo->coin ?? ''); ?></td>
                   
                    <?php if(Auth::user()->role_id  == '1'): ?>
                        
                        <?php if(isset($control) && ($control == 'index')): ?>
                            <td>
                                <a href="<?php echo e(route('anticipos.edit',$anticipo->id)); ?>"  title="Editar"><i class="fa fa-edit"></i></a>
                                <a href="#" class="delete" data-id-anticipo=<?php echo e($anticipo->id); ?> data-toggle="modal" data-target="#deleteModal" title="Eliminar"><i class="fa fa-trash text-danger"></i></a>  
                            </td>
                        <?php endif; ?>
                        
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
            <form action="<?php echo e(route('anticipos.delete')); ?>" method="post">
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
<?php echo $__env->make('admin.layouts.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\aryasoftware\resources\views/admin/anticipos/index.blade.php ENDPATH**/ ?>