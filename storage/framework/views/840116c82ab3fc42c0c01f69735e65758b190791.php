<?php $__env->startSection('content'); ?>

    
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
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header text-center font-weight-bold h3">Debito Fiscal IVA por Pagar</div>

                    <div class="card-body">
                       
                            <div class="form-group row">
                                
                                <label id="date_begin" class="col-sm-3 col-form-label text-md-right" for="type" >Fecha del Retiro Mes:</label>
                               
                                <div class="col-sm-3">
                                    <select class="form-control" id="filtro_mount" name="Filtro_Meses" >
                                        <option value="0">Seleccione..</option>
                                        <option value="01">Enero-01</option>
                                        <option value="02">Febrero-02</option>
                                        <option value="03">Marzo-03</option>
                                        <option value="04">Abril-04</option>
                                        <option value="05">Mayo-05</option>
                                        <option value="06">Junio-06</option>
                                        <option value="07">Julio-07</option>
                                        <option value="08">Agosto-08</option>
                                        <option value="09">Septiembre-09</option>
                                        <option value="10">Octubre-10</option>
                                        <option value="11">Noviembre-11</option>
                                        <option value="12">Dicienmbre-12</option>
                                    </select>
                                   
                                </div>
                               
                                <label id="date_begin" class="col-sm-3 col-form-label text-md-right" for="type" >Fecha del Retiro Año:</label>
                                
                                <div class="col-sm-3">
                                    <select class="form-control" id="filtro_year" name="Filtro_Year" >
                                        <option value="<?php echo e($year_anterior); ?>"><?php echo e($year_anterior); ?></option>
                                        <option selected value="<?php echo e($datenow); ?>"><?php echo e($datenow); ?></option>
                                    </select>
                                </div>
                            </div>
                            <br>
                            <div class="form-group row mb-0">
                                <div class="col-sm-3 offset-sm-3">
                                    <a onclick="consultar()" type="submit" class="btn btn-primary">
                                        Consultar Impuesto
                                    </a>
                                </div>
                                <div class="col-sm-3">
                                    <a href="<?php echo e(route('bankmovements')); ?>" id="btnfacturar" name="btnfacturar" class="btn btn-danger" title="facturar">Volver</a>
                                </div>
                            </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('javascript_iva_payment'); ?>

    <script>

        var fecha = new Date();
        var ano = fecha.getFullYear();
        document.getElementsByName("Fecha_Year")[0].value = ano ;
    </script>
    <script>
        function consultar(){
            let filtro_mount = document.getElementById("filtro_mount").value; 
            let filtro_year = document.getElementById("filtro_year").value; 
            
            window.location = "<?php echo e(route('taxes.iva_payment', ['',''])); ?>"+"/"+filtro_mount+"/"+filtro_year;
                           
        }
        
    </script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\aryasoftware\resources\views/admin/taxes/iva_index_payment.blade.php ENDPATH**/ ?>