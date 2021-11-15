<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Arya Software</title>

    <?php echo $__env->yieldContent('header'); ?>

    <!-- Custom fonts for this template INDEX-->
    <link href="<?php echo e(asset('vendor/sb-admin/vendor/fontawesome-free/css/all.min.css')); ?>" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <link href="<?php echo e(asset('vendor/sb-admin/css/sb-admin-2.css')); ?>" rel="stylesheet">
    <!--End INDEX-->

    <link href="<?php echo e(asset('vendor/sb-admin/css/carlos.css')); ?>" rel="stylesheet">

    <link href="<?php echo e(asset('css/watch.css')); ?>" rel="stylesheet">
      <!-- Custom fonts for this template TABLES-->

    <link href="<?php echo e(asset('vendor/sb-admin/vendor/datatables/dataTables.bootstrap4.min.css')); ?>" rel="stylesheet">
    <!--End TABLES-->

</head>

<body id="page-top">
    <body onload="startTime()">
    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php echo $__env->make('admin.layouts.dashboard_sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content" >

                <!-- Topbar -->
                <?php echo $__env->make('admin.layouts.dashboard_topbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->

                <?php echo $__env->yieldContent('content'); ?>

                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->

            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

     <!-- Logout Modal-->
     <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="logoutModalLabel"
     aria-hidden="true">
     <div class="modal-dialog" role="document">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="logoutModalLabel">Seguro que desea Cerrar Sesión?</h5>
                 <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">×</span>
                 </button>
             </div>
             <div class="modal-body">Seleccione "Cerrar Sesión" si desea salir de Arya Software</div>
             <div class="modal-footer">
                 <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                 <a class="btn btn-primary" href="<?php echo e(route('logout')); ?>"onclick="event.preventDefault();
                 document.getElementById('logout-form').submit();">
                 Cerrar Sesión
                </a>
                <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                  <?php echo csrf_field(); ?>
               </form>
             </div>
         </div>
     </div>
 </div>


   <!-- END SCRIPTS INDEX -->
        <!-- Bootstrap core JavaScript-->
        <script src="<?php echo e(asset('vendor/sb-admin/vendor/jquery/jquery.min.js')); ?>"></script>
        <script src="<?php echo e(asset('vendor/sb-admin/vendor/bootstrap/js/bootstrap.bundle.min.js')); ?>"></script>

        <!-- Core plugin JavaScript-->
        <script src="<?php echo e(asset('vendor/sb-admin/vendor/jquery-easing/jquery.easing.min.js')); ?>"></script>

        <!-- Custom scripts for all pages-->
        <script src="<?php echo e(asset('vendor/sb-admin/js/sb-admin-2.min.js')); ?>"></script>

        <!-- Page level plugins -->
        <script src="<?php echo e(asset('vendor/sb-admin/vendor/chart.js/Chart.min.js')); ?>"></script>

        <!-- Page level custom scripts -->
        <script src="<?php echo e(asset('vendor/sb-admin/js/demo/chart-area-demo.js')); ?>"></script>
        <script src="<?php echo e(asset('vendor/sb-admin/js/demo/chart-pie-demo.js')); ?>"></script>
    <!-- END SCRIPTS INDEX -->

     <!-- SCRIPTS FOR TABLES-->
        <!-- Page level plugins -->
        <script src="<?php echo e(asset('vendor/sb-admin/vendor/datatables/jquery.dataTables.min.js')); ?>"></script>
        <script src="<?php echo e(asset('vendor/sb-admin/vendor/datatables/dataTables.bootstrap4.min.js')); ?>"></script>

        <!-- Page level custom scripts -->
        <script src="<?php echo e(asset('vendor/sb-admin/js/demo/datatables-demo.js')); ?>"></script>
    <!-- END SCRIPTS FOR TABLES -->

        <script src="<?php echo e(asset('js/formulario.js')); ?>"></script>

        <!-- Para las mascaras -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js" integrity="sha512-pHVGpX7F/27yZ0ISY+VVjyULApbDlD0/X0rgGbTqCE7WFW5MezNTWG/dnhtbBuICzsd0WQPgpE4REBLv+UqChw==" crossorigin="anonymous"></script>


  <?php echo $__env->yieldContent('javascript1'); ?>
  <?php echo $__env->yieldContent('javascript2'); ?>
  <?php echo $__env->yieldContent('javascript'); ?>
  <?php echo $__env->yieldContent('validacionbtn'); ?>
  <?php echo $__env->yieldContent('validacionbtn2'); ?>
  <?php echo $__env->yieldContent('consulta'); ?>
  <?php echo $__env->yieldContent('javascript_edit'); ?>
  <?php echo $__env->yieldContent('js_charts'); ?>

  <?php echo $__env->yieldContent('consultadeposito'); ?>

  <?php echo $__env->yieldContent('validacion_usuario'); ?>



  <?php echo $__env->yieldContent('validacion'); ?>
  <?php echo $__env->yieldContent('validacionExpense'); ?>

  <?php echo $__env->yieldContent('validacion_time'); ?>
  <?php echo $__env->yieldContent('product_edit'); ?>
  <?php echo $__env->yieldContent('quotation_create'); ?>
  <?php echo $__env->yieldContent('quotation_facturar'); ?>
  <?php echo $__env->yieldContent('quotation_facturar_after'); ?>
  <?php echo $__env->yieldContent('validacion_transport'); ?>
  <?php echo $__env->yieldContent('validacion_vendor'); ?>
  <?php echo $__env->yieldContent('javascript_iva_payment'); ?>
  <?php echo $__env->yieldContent('imports'); ?>

  <script>
    function soloNumeros(idCampo){
    $('#'+idCampo).keyup(function (){
          this.value = (this.value + '').replace(/[^0-9]/g, '');
      });
    }
  </script>
  <script>
    function soloLetras(idCampo){
    $('#'+idCampo).keyup(function (){
          this.value = (this.value + '').replace(/[^a-zA-Z\s]/g, '');
      });
    }
  </script>
    <script>
        function soloAlfaNumerico(idCampo){
        $('#'+idCampo).keyup(function (){
              this.value = (this.value + '').replace(/[^a-zA-Z0-9\s]/g, '');
          });
        }
      </script>
      <script>
        function soloNumeroPunto(idCampo){
        $('#'+idCampo).keyup(function (){
              this.value = (this.value + '').replace(/[^0-9.]/g, '');
          });
        }
      </script>



</body>

</html>
<?php /**PATH C:\xampp\htdocs\aryasoftware\resources\views/admin/layouts/dashboard.blade.php ENDPATH**/ ?>