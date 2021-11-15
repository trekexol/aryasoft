<?php $__env->startSection('content'); ?>

   

<!-- container-fluid -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row py-lg-2">
        <div class="col-md-6">
            <h2>Usuarios Registrados</h2>
        </div>
       
        <?php if(Auth::user()->role_id  == '1'): ?>
        <div class="col-md-6">
            <a href="<?php echo e(route('users.create')); ?>" class="btn btn-primary btn-lg float-md-right" role="button" aria-pressed="true">Registrar Usuario</a>
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
                <th>Id</th>
                <th>Usuario</th>
                <th>Email</th>
               
                <?php if(Auth::user()->role_id  == '1' || Auth::user()->role_id  == '2'  ): ?>
                    <th>Rol</th>
                    <th>Status</th>
                <?php endif; ?>
                <?php if(Auth::user()->role_id  == '1'): ?>
                    <th>Tools</th>
                <?php endif; ?>
            </tr>
            </thead>
            
            <tbody>
                <?php if(empty($users)): ?>
                <?php else: ?>
                    <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                    <td><?php echo e($user->id); ?></td>
                    <td><?php echo $user->name; ?></td>
                    <td><?php echo $user->email; ?></td>
                   
                    <td><?php echo e($user->roles['description']); ?></td>
                    <?php if(Auth::user()->role_id  == '1'): ?>
                        <?php if($user->status == 1): ?>
                            <td>Activo</td>
                        <?php else: ?>
                            <td>Inactivo</td>
                        <?php endif; ?>
                        <td class="text-center">
                            <a href="<?php echo e(route('users.createAssignModules',$user->id)); ?>" title="Seleccionar"><i class="fa fa-check"></i></a>
                            <a href="<?php echo e(route('users.edit',$user->id)); ?>"  title="Editar"><i class="fa fa-edit"></i></a>
                            <a href="#" class="delete" data-id-user=<?php echo e($user->id); ?> data-toggle="modal" data-target="#deleteModal" title="Eliminar"><i class="fa fa-trash text-danger"></i></a>  
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
            <form action="<?php echo e(route('users.delete')); ?>" method="post">
                <?php echo csrf_field(); ?>
                <?php echo method_field('DELETE'); ?>
                <input id="id_user_modal" type="hidden" class="form-control <?php $__errorArgs = ['id_user_modal'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="id_user_modal" readonly required autocomplete="id_user_modal">
                       
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
         
         let id_user = $(this).attr('data-id-user');
 
         $('#id_user_modal').val(id_user);
     });
    </script> 

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\aryasoftware\resources\views/admin/users/index.blade.php ENDPATH**/ ?>