<?php $__env->startSection('content'); ?>

<!-- container-fluid -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row py-lg-2">
        <div class="col-sm-7">
            <h2>Seleccione los Módulos en los que podrá acceder el usuario <?php echo e($user->name ?? ''); ?></h2>
        </div>
        <div class="col-sm-3">
           <input type="button" title="Agregar" value="Guardar Cambios" class="btn btn-primary float-md-right" role="button" aria-pressed="true"  onclick="formSend();" >
        </div>
        <div class="col-sm-2">
            <a href="<?php echo e(route($route_return ?? 'users')); ?>" class="btn btn-danger">
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
<form id="formSend" method="POST" action="<?php echo e(route('users.assignModules')); ?>" enctype="multipart/form-data">
    <?php echo csrf_field(); ?>

    <input id="id_user" type="hidden" class="form-control <?php $__errorArgs = ['id_user'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="id_user" value="<?php echo e($user->id); ?>" readonly required autocomplete="id_user">
    
    <input id="modulos_news" type="hidden" class="form-control <?php $__errorArgs = ['modulos_news'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="modulos_news" readonly required autocomplete="modulos_news">
    <input id="modulos_olds" type="hidden" class="form-control <?php $__errorArgs = ['modulos_olds'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="modulos_olds" readonly required autocomplete="modulos_olds">
            
    
    
<div class="card shadow mb-4">
    
    <div class="card-body">
        <div class="container">
        <div class="table-responsive">
        <table class="table table-light2 table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
            <tr> 
                <th></th>
                <th>Módulo</th>
            </tr>
            </thead>
            <tbody>
                <?php if(empty($modulos)): ?>
                <?php else: ?>  
                    <?php $__currentLoopData = $modulos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $modulo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td>
                                <input onclick="selectmodulo(<?php echo e($modulo); ?>);" type="checkbox" id="flexCheckChecked<?php echo e($modulo->name); ?>">                        
                            </td>
                            <td><?php echo e($modulo->name ?? ''); ?></td>
                        </tr>     
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>   
                <?php endif; ?>
            </tbody>
        </table>
            </div>
        </div>
    </div>
</div>

</form>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('javascript'); ?>
    <script>
        $('#dataTable').DataTable({
            "ordering": false,
            "order": [],
            'aLengthMenu': [[50, 100, 150, -1], [50, 100, 150, "All"]]
        });
        //envia el post
        function formSend(){
            document.getElementById("formSend").submit();       
        }

        let modulos = [];
        var controller_add = true;
        var value_old = 0;

        function selectmodulo(modulo){

            var isChecked = document.getElementById('flexCheckChecked'+modulo.name).checked;

            addmodulo(modulo.name);
        }

        //esta funcion agrega y elimina moduloos de la lista que se anadiran al modulo
        function addmodulo(modulo_name){
            
            modulos.forEach(function(element, index, object) {
                if(element == modulo_name){
                    //elimina el elemento al encontrarlo
                    object.splice(index, 1);
                    controller_add = false;
                }
            });
            
            if(controller_add){
                //agrega el elemento si no existe en la lista de modulos
                modulos.push(modulo_name);
            }else{
                controller_add = true;
            }
            
            document.getElementById("modulos_news").value = modulos;
        }

       
    </script> 
        

    <?php if(isset($user_access)): ?>
        <?php $__currentLoopData = $user_access; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $access): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <script>
                
                //aqui seleccionamos los moduloos que ya tenga el modulo y los asignamos a la lista de moduloos
                modulos.push("<?php echo e($access->modulo); ?>");
                document.getElementById("flexCheckChecked<?php echo e($access->modulo); ?>").checked = true;
                document.getElementById("modulos_olds").value = modulos;
                document.getElementById("modulos_news").value = modulos;
            </script> 
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\aryasoftware\resources\views/admin/users/selectmodulos.blade.php ENDPATH**/ ?>