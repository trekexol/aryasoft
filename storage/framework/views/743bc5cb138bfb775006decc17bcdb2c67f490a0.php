<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Arya Software</title>
        <link rel="icon" type="image/x-icon" href="<?php echo e(asset('theme/assets/img/favicon.ico')); ?>" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://kit.fontawesome.com/72e00c2f19.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="<?php echo e(asset('theme/css/styles.css')); ?>" rel="stylesheet" />

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    </head>
    <body id="page-top">
        <!-- Navigation-->
       <?php echo $__env->make('layouts.home_navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <!-- Masthead Bienvenido a nuestro Software Maneja las finanzas de tu empresa-->
        <header class="masthead">
            <div class="container">
                <div class="masthead-subheading">Bienvenido a nuestro Software</div>
                <div class="masthead-heading">Maneja las finanzas de tu empresa</div>
                <a class="btn btn-primary  text-uppercase js-scroll-trigger" href="#about">Saber mas ...</a>
            </div>
        </header>

        <!-- About-->
        <section class="page-section" id="about">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">ARYA SOFTWARE</h2>
                    <h3 class="section-subheading text-muted">Arya es un software programado para gestionar sus tareas financieras y empresariales de una manera r??pida y sencilla</h3>
               
                </div>
                
                <ul class="timeline">
                    <li>
                        <div class="timeline-image"><img class="rounded-circle img-fluid" src="<?php echo e(asset('theme/assets/img/about/1.jpg')); ?>" alt="" /></div>
                        <div class="timeline-panel">
                            <div class="timeline-heading">
                               
                                <h4 class="subheading">Administraci??n</h4>
                            </div>
                            <div class="timeline-body"><p class="text-muted">Puede administrar varias cuentas a la vez, realizar facturas, gestionar pagos, gestionar nomina, controlar de gastos, hacer estimaciones, seguimiento de ventas, flujo de caja, gesti??n de clientes y de proveedores, alertas, pagos y declraraci??n de impuestos de una forma mucho m??s f??cil y ordenada</p></div>
                        </div>
                    </li>
                    <li class="timeline-inverted">
                        <div class="timeline-image"><img class="rounded-circle img-fluid" src="<?php echo e(asset('theme/assets/img/about/2.jpg')); ?>" alt="" /></div>
                        <div class="timeline-panel">
                            <div class="timeline-heading">
                               
                                <h4 class="subheading">Rendimiento</h4>
                            </div>
                            <div class="timeline-body"><p class="text-muted">Le permite analizar el rendimiento de su empresa, como tambi??n planear con anticipaci??n y presupuestaci??n.</p></div>
                        </div>
                    </li>
                    <li>
                        <div class="timeline-image"><img class="rounded-circle img-fluid" src="<?php echo e(asset('theme/assets/img/about/3.jpg')); ?>" alt="" /></div>
                        <div class="timeline-panel">
                            <div class="timeline-heading">
                               
                                <h4 class="subheading">F??cil Acceso</h4>
                            </div>
                            <div class="timeline-body"><p class="text-muted">Arya al ser una herramienta en l??nea, no se necesita instalar ning??n software. Se accede directamente desde el navegador de Internet en cualquier dispositivo inform??tico conectado a la red, f??cil, seguro y donde quiera.</p></div>
                        </div>
                    </li>
                   
                 <li class="timeline-inverted">
                        <div class="timeline-image">
                            <h4>
                                DISFRUTA DE NUESTRO
                                <br />
                                PLAN ??NICO
                            </h4>
                        </div>
                    </li>
                </ul>
            </div>
        </section>


        <!-- Services-->
        <section class="page-section" id="services">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">CARACTERISTICAS Y BENEFICIOS</h2>
                    <h3 class="section-subheading text-muted"></h3>
                </div>
                <div class="row text-center">
                    <div class="col-md-4">
                        <span class="fa-stack fa-4x">
                        <!--https://fontawesome.com/v4.7.0/icons/-->
                            <i class="fas fa-circle fa-stack-2x text-primary"></i>
                            <i class="fas fa-paperclip fa-stack-1x fa-inverse"></i>
                        </span>
                        <h4 class="my-3">REPORTES DE BALANCE</h4>
                        <br>
                        <p class="text-muted">Permite crear su hoja de balance con el Reporte de balance pre-instalado. Arya le permite organizar y revisar sus balances, datos financieros y otros informes financieros en cualquier momento y desde cualquier lugar y todo en una aplicaci??n.</p>
                    </div>
                    <div class="col-md-4">
                        <span class="fa-stack fa-4x">
                            <i class="fas fa-circle fa-stack-2x text-primary"></i>
                            <i class="fas fa-clock fa-stack-1x fa-inverse"></i>
                        </span>
                        <h4 class="my-3">ALERTAS DE CUENTAS POR PAGAR</h4>
                        <p class="text-muted">Arya hace que sea f??cil de manejar las cuentas por pagar, incluyendo el seguimiento y el pago de facturas. Usted podr?? organizar, controlar, acceder y realizar un seguimiento de sus cuentas de datos e informes a pagar en cualquier momento desde su ordenador o dispositivo m??vil.</p>
                    </div>
                    <div class="col-md-4">
                        <span class="fa-stack fa-4x">
                            <i class="fas fa-circle fa-stack-2x text-primary"></i>
                            <i class="fas fa-clipboard-list fa-stack-1x fa-inverse"></i>
                        </span>
                        <h4 class="my-3">PERFIL DE GANANCIAS Y P??RDIDAS</h4>
                        <p class="text-muted">Permite crear informes financieros precisos, tales como el estado de p??rdidas y ganancias, y organiza su fecha financiera. Acceda a sus datos e informes financieros en cualquier momento y desde cualquier lugar por lo que siempre podra tomar decisiones empresariales inteligentes basadas en los informes.</p>
                    </div>
                    <div class="col-md-4">
                        <span class="fa-stack fa-4x">
                        <!--https://fontawesome.com/v4.7.0/icons/-->
                            <i class="fas fa-circle fa-stack-2x text-primary"></i>
                            <i class="fas fa-money-check-alt fa-stack-1x fa-inverse"></i>
                        </span>
                        <h4 class="my-3">MANEJO DE FLUJO DE EFECTIVO</h4>
                        <p class="text-muted">Arya hace que sea f??cil de manejar y vizualizar su flujo de efectivo, siempre sabr?? cu??nto dinero est?? en la mano y activo en sus cuentas bancarias previamente agregadas al sistema. Es f??cil de organizar y acceder a sus datos financieros y estado de flujos de efectivo en cualquier momento y desde cualquier lugar.</p>
                    </div>
                    <div class="col-md-4">
                        <span class="fa-stack fa-4x">
                            <i class="fas fa-circle fa-stack-2x text-primary"></i>
                            <i class="fas fa-address-card fa-stack-1x fa-inverse"></i>
                        </span>
                        <h4 class="my-3">PERFIL DE ESTADO DE INGRESOS</h4>
                        <p class="text-muted">Permite organizar los datos que necesita para mantener su negocio financieramente saludable. Esto hace que sea f??cil de generar su cuenta de resultados utilizando la plantilla cuenta de resultados pre-instalado. Puede ver el estado de resultados y otros informes financieros en cualquier momento y desde cualquier lugar.</p>
                    </div>
                    <div class="col-md-4">
                        <span class="fa-stack fa-4x">
                            <i class="fas fa-circle fa-stack-2x text-primary"></i>
                            <i class="fas fa-tv fa-stack-1x fa-inverse"></i>
                        </span>
                        <h4 class="my-3">CAT??LOGO DE CUENTAS</h4>
                        <br>
                        <p class="text-muted">Arya le ayuda a organizar su contabilidad, podr?? ver todas sus transacciones financieras de un vistazo con una f??cil configuraci??n, puede crear y editar de su cat??logo de cuentas. Gesti??n de compras, ventas entre otras cuentas. Acceda a su plan de cuentas, detalles de la transacci??n, informes financieros, reportes, reportes de compras, ventas y m??s en cualquier momento y desde cualquier lugar.</p>
                    </div>
                    <div class="col-md-4">
                        <span class="fa-stack fa-4x">
                            <i class="fas fa-circle fa-stack-2x text-primary"></i>
                            <i class="fas fa-user fa-stack-1x fa-inverse"></i>
                        </span>
                        <h4 class="my-3">GESTI??N DE USUARIOS Y EMPLEADOS</h4>
                        <p class="text-muted">Permite crear, modificar, eliminar y controlar los usuarios que desee, como tambi??n definir el nivel de acceso y permisolog??a que tendr??n en su cuenta Arya. Arya tambi??n le permite registrar sus empleados, y admistrar la nomina de empleados, como tambi??n gestionar, sincronizar y realizar pagos de todos los beneficios otorgados por la ley y por la empresa a dichos empleados, todo de forma r??pida y sencilla en cualquier momento y desde cualquier lugar.</p>
                    </div>
                    <div class="col-md-4">
                        <span class="fa-stack fa-4x">
                            <i class="fas fa-circle fa-stack-2x text-primary"></i>
                            <i class="fas fa-wallet fa-stack-1x fa-inverse"></i>
                        </span>
                        <h4 class="my-3">CUENTAS POR COBRAR</h4><br>
                        <p class="text-muted">Arya Organiza sus datos contables, incluyendo sus cuentas por cobrar, en un solo lugar. Arya hace f??cil la gesti??n de las cuentas por cobrar automatizando la facturaci??n, seguimiento y presentaci??n de informes y reportes financieros en cualquier momento y en cualquier lugar.</p>
                    </div>
                </div>
            </div>
        </section>
      
        <!-- Contact-->
        <section class="page-section" id="contact">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">Cont??ctanos</h2>
                    <h3 class="section-subheading text-muted">Le responderemos en la brevedad posible.</h3>
                </div>
                <form id="contactForm" name="sentMessage" novalidate="novalidate">
                    <div class="row align-items-stretch mb-5">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input class="form-control" id="name" type="text" placeholder="Su nombre *" required="required" data-validation-required-message="Porfavor, coloque su nombre" />
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="form-group">
                                <input class="form-control" id="email" type="email" placeholder="Su correo electronico *" required="required" data-validation-required-message="Porfavor, coloque su correo electronico" />
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="form-group mb-md-0">
                                <input class="form-control" id="phone" type="tel" placeholder="Su numero telefonico *" required="required" data-validation-required-message="Porfavor, coloque su telefono" />
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group form-group-textarea mb-md-0">
                                <textarea class="form-control" id="message" placeholder="Su mensaje *" required="required" data-validation-required-message="Porfavor, coloque su mensaje"></textarea>
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                    </div>
                    <div class="text-center">
                        <div id="success"></div>
                        <button class="btn btn-primary btn-xl text-uppercase" id="sendMessageButton" type="submit">Enviar Mensaje</button>
                    </div>
                </form>
            </div>
        </section>

        <?php echo $__env->yieldContent('content'); ?>
        <!-- Footer-->
        <footer class="footer py-4">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-4 text-lg-left">Copyright ?? Your Website 2021</div>
                    <div class="col-lg-4 my-3 my-lg-0">
                        <a class="btn btn-dark btn-social mx-2" href="#!"><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-dark btn-social mx-2" href="#!"><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-dark btn-social mx-2" href="#!"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                    <div class="col-lg-4 text-lg-right">
                        <a class="mr-3" href="#!">Privacy Policy</a>
                        <a href="#!">Terms of Use</a>
                    </div>
                </div>
            </div>
        </footer>
        
        <!-- Bootstrap core JS-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Third party plugin JS-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
        <!-- Contact form JS-->
        <script src="<?php echo e(asset('theme/assets/mail/jqBootstrapValidation.js')); ?>"></script>
        <script src="<?php echo e(asset('theme/assets/mail/contact_me.js')); ?>"></script>
        <!-- Core theme JS-->
        <script src="<?php echo e(asset('theme/js/scripts.js')); ?>"></script>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>

        
    </body>
</html>
<?php /**PATH C:\xampp\htdocs\aryasoftware\resources\views/layouts/home.blade.php ENDPATH**/ ?>