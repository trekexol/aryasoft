<?php $__env->startSection('content'); ?>

   

<!-- container-fluid -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row py-lg-2">
        <div class="col-md-6 h4">
            Anticipos del Proveedor: <?php echo e($provider->razon_social ?? ''); ?>

        </div>
        
        <div class="col-md-3">
            <a href="<?php echo e(route('expensesandpurchases.create_payment',[$id_expense,$coin])); ?>" id="btngasto" name="btngasto" class="btn btn-info" title="volver">Volver al Gasto o Compra</a>  
        </div>
            
       
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
                <th class="text-center">Proveedor</th>
                <th class="text-center">Caja/Banco</th>
                <th class="text-center">Fecha del Anticipo</th>
                <th class="text-center">Referencia</th>
                <th class="text-center">Monto</th>
                <th class="text-center">Moneda</th>
               <th class="text-center"></th>
              
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
                    <td class="text-center"><?php echo e($anticipo->providers['razon_social'] ?? ''); ?></td>
                    <td class="text-center"><?php echo e($anticipo->accounts['description']); ?></td>
                    <td class="text-center"><?php echo e($anticipo->date); ?></td>
                    <td class="text-center"><?php echo e($anticipo->reference); ?></td>
                    <td class="text-right"><?php echo e(number_format($anticipo->amount, 2, ',', '.')); ?></td>
                    <td class="text-center"><?php echo e($anticipo->coin); ?></td>
                   
                    <?php if(Auth::user()->role_id  == '1'): ?>
                        <td>
                            <?php if($anticipo->status == 1): ?>
                                <input onclick="changestatus(<?php echo e($anticipo->id); ?>);" type="checkbox" id="flexCheckChecked<?php echo e($anticipo->id); ?>" checked>                        
                            <?php else: ?>
                                <input onclick="changestatus(<?php echo e($anticipo->id); ?>);" type="checkbox" id="flexCheckChecked<?php echo e($anticipo->id); ?>">                        
                            <?php endif; ?>
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

<?php $__env->stopSection(); ?>
<?php $__env->startSection('javascript'); ?>

    <script>
    $('#dataTable').DataTable({
        "ordering": false,
        "order": [],
        'aLengthMenu': [[50, 100, 150, -1], [50, 100, 150, "All"]]
    });
    

    function changestatus(anticipo){
        var verify = document.getElementById("flexCheckChecked"+anticipo).checked;
        
            $.ajax({
                
                url:"<?php echo e(route('anticipos.changestatus',['',''])); ?>" + '/' + anticipo+'/' + verify,
                beforSend:()=>{
                    alert('consultando datos');
                },
                success:(response)=>{
                 
                    
                },
                error:(xhr)=>{
                    alert('Presentamos Inconvenientes');
                }
            })
    }



    $("body").toggleClass("sidebar-toggled");
    $(".sidebar").toggleClass("toggled");
    if ($(".sidebar").hasClass("toggled")) {
        $('.sidebar .collapse').collapse('hide');
    };
    </script> 
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\aryasoftware\resources\views/admin/anticipos/selectanticipo_provider.blade.php ENDPATH**/ ?>