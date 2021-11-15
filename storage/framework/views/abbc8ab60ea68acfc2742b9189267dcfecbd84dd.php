
  
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
 
<title></title>
<style>
  table, td, th {
    border: 1px solid black;
    font-size: x-small;
  }
  
  table {
    border-collapse: collapse;
    width: 100%;
  }
  
  th {
    
    text-align: left;
  }
  </style>
</head>

<body>
  <table>
    <tr>
      <th style="text-align: left; font-weight: normal; width: 10%; border-color: white; font-weight: bold;"> <img src="<?php echo e(asset(Auth::user()->company->foto_company ?? 'img/northdelivery.jpg')); ?>" width="90" height="30" class="d-inline-block align-top" alt="">
      </th>
      <th style="text-align: left; font-weight: normal; width: 90%; border-color: white; font-weight: bold;"><h4><?php echo e(Auth::user()->company->code_rif ?? ''); ?> </h4></th>
    </tr> 
  </table>
  <h4 style="color: black; text-align: center">Clientes</h4>
  <h5 style="color: black; text-align: center">Fecha de Emisión: <?php echo e($datenow ?? ''); ?> / Fecha desde: <?php echo e($date_begin ?? ''); ?> Fecha Hasta: <?php echo e($date_end ?? ''); ?></h5>
   
 
<table style="width: 100%;">
  <tr>
    <th style="text-align: center; ">Código</th>
    <th style="text-align: center; ">Nombre</th>
    <th style="text-align: center; ">Dirección</th>
    <th style="text-align: center; ">teléfono</th>
  </tr> 
  <?php $__currentLoopData = $clients; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $client): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <tr>
      
      <td style="text-align: center; "><?php echo e($client->id ?? ''); ?></td>
      <td style="text-align: center; "><?php echo e($client->name ?? ''); ?></td>=
      <td style="text-align: center; "><?php echo e($client->direction ?? ''); ?></td>
      <td style="text-align: center; "><?php echo e($client->phone1 ?? ''); ?></td>
     
    </tr> 
  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 

  
</table>

</body>
</html>
<?php /**PATH C:\xampp\htdocs\aryasoftware\resources\views/admin/reports/clients.blade.php ENDPATH**/ ?>