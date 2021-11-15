
  
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

  <br>
  <h4 style="color: black; text-align: center">Pagos Realizados</h4>
  <?php if(isset($client)): ?>
    <h4 style="color: black; text-align: center">Cliente: <?php echo e($client->name ?? ''); ?></h4>
  <?php elseif(isset($provider)): ?>
    <h4 style="color: black; text-align: center">Proveedor: <?php echo e($provider->razon_social ?? ''); ?></h4>
  <?php endif; ?>
  
  <h5 style="color: black; text-align: center">Fecha de Emisión: <?php echo e($date_end ?? $datenow ?? ''); ?></h5>
   
  <?php 
    
    $total_amount = 0;
  
  ?>
    <table style="width: 100%;">
      <tr>
        <th style="text-align: center; width:20%;">Fecha</th>
        <th style="text-align: center; width:20%;">Tipo Pago</th>
        <th style="text-align: center; width:20%;">Cuenta</th>
        <th style="text-align: center;">Monto</th>
      </tr> 
      <?php $__currentLoopData = $quotations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $quotation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php 
          $total_amount += $quotation->amount;
        ?>
        <tr>
          <th style="text-align: center; font-weight: normal;"><?php echo e(date_format(date_create($quotation->created_at),"d-m-Y")); ?></th>
          <th style="text-align: center; font-weight: normal;"><?php echo e($quotation->payment_type ?? ''); ?></th>
          <th style="text-align: center; font-weight: normal;"><?php echo e($quotation->account_description ?? ''); ?></th>
          <th style="text-align: right; font-weight: normal;"><?php echo e(number_format(($quotation->amount ?? 0), 2, ',', '.')); ?></th>
        </tr> 
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 

      <tr>
        <th style="text-align: center; font-weight: normal; border-color: white;"></th>
        <th style="text-align: center; font-weight: normal; border-color: white;"></th>
        <th style="text-align: center; font-weight: normal; border-color: white; border-right-color: black;"></th>
        <th style="text-align: right; font-weight: normal;"><?php echo e(number_format(($total_amount ?? 0), 2, ',', '.')); ?></th>
      </tr> 
    </table>

</body>
</html>
<?php /**PATH C:\xampp\htdocs\aryasoftware\resources\views/admin/reports_payment/payment.blade.php ENDPATH**/ ?>