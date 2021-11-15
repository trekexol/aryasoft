<?php $__env->startSection('content'); ?>
  
    <!-- container-fluid -->
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="row py-lg-2">
            <div class="col-md-6">
                <h2>Editar de Usuario </h2>
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
            <form  method="POST"   action="<?php echo e(route('users.update',$user->id)); ?>" enctype="multipart/form-data" >
                <?php echo method_field('PATCH'); ?>
                <?php echo csrf_field(); ?>
                <div class="container py-2">
                    <div class="row">
                        <div class="col-12 ">
                            <form>
                            <?php if(Auth::user()->role_id  == '1'): ?>
                            <div class="form-group row">
                                    <div class="col-sm-2">
                                        <label for="inputEmail">Roles:</label>
                                        <?php $__errorArgs = ['roles'];
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
                                        </label>
                                    </div>
                                    <div class="col-sm-4">
                                        <select class="form-control" id="roles" name="Roles" title="Color del Producto">
                                            <option value="<?php echo e($user->role_id); ?>"><?php echo e($user->roles['description']); ?></option>
                                            <option value="0">----------------</option>
                                            <?php if(empty($roles)): ?>
                                            <?php else: ?>
                                                <div class="dropdown">
                                                    <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option value="<?php echo e($role->id); ?>" <?php echo e(old('Roles')); ?>><?php echo e($role->description); ?></option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </div>
                                            <?php endif; ?>
                                        </select>
                                    </div>
                            </div>
                            <?php endif; ?>
                               <div class="form-group row">
                                    
                                    <div class="col-sm-2">
                                        <label for="name">Nombre:</label>
                                    </div>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" id="name" name="name" value="<?php echo e($user->name); ?>" >
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-2">
                                        <label for="xcedula">Correo Electrónico:</label>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" id="email" name="email" value="<?php echo e($user->email); ?>" >
                                    </div>
                                    
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-2">
                                        <label for="xcedula">Status:</label>
                                    </div>
                                    <div class="col-sm-4">
                                        <select class="form-control" id="status" name="status" title="status">
                                            <?php if($user->status == 1): ?>
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


                                <div class="form-group row">
                                    <div class="col-sm-2">
                                        <label for="inputPassword">Clave</label>
                                        <?php $__errorArgs = ['password'];
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
                                        </label>
                                    </div>
                                    <div class="col-sm-4">
                                        <input type="password" id="inputPassword" class="form-control <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="password" placeholder="Password" >
                                    </div>

                                    <div class="col-sm-2">
                                        <label for="inputConfirmPassword">Confirmación Clave:</label>
                                        </label>
                                    </div>
                                    <div class="col-sm-4">
                                        <input type="password" id="inputConfirmPassword" class="form-control" placeholder="Password" name="password_confirmation" >
                                    </div>
                                </div>
                            <br>
                                <div class="form-group row">
                                    <div class="form-group col-sm-6">
                                        <button type="submit" class="btn btn-success btn-block"><i class="fa fa-send-o"></i>Registrar</button>
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <a href="<?php echo e(route('users')); ?>" name="danger" type="button" class="btn btn-danger btn-block">Cancelar</a>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>

                    <?php $__env->stopSection(); ?>

                    <?php $__env->startSection('validacion_usuario'); ?>
                    <script>
                           
                    $(function(){
                        soloLetras('name');
                       
                    });
                    
                 
                
                
                
                    </script>
                <?php $__env->stopSection(); ?>
                
<?php echo $__env->make('admin.layouts.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\aryasoftware\resources\views/admin/users/edit.blade.php ENDPATH**/ ?>