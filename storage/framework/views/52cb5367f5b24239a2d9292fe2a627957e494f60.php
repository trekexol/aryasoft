
  
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
  <h4 style="color: black; text-align: center">CUENTAS</h4>
  <h5 style="color: black; text-align: center">Fecha de Emisión: <?php echo e($date_end ?? $datenow ?? ''); ?></h5>
   
 
<table style="width: 100%;">
  <tr>
    <th style="text-align: center; ">Código</th>
    <th style="text-align: center; ">Descripción</th>
    <th style="text-align: center; ">Nivel</th>
    <th style="text-align: center; ">Saldo Anterior</th>
    <th style="text-align: center; ">Debe</th>
    <th style="text-align: center; ">Haber</th>
    <th style="text-align: center; ">Saldo Actual</th>
  </tr> 
  <?php $__currentLoopData = $accounts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $account): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    
    <tr>
      <?php if($account->level <= 4): ?>
        <th style="text-align: center; "><?php echo e($account->code_one ?? ''); ?>.<?php echo e($account->code_two ?? ''); ?>.<?php echo e($account->code_three ?? ''); ?>.<?php echo e($account->code_four ?? ''); ?>.<?php echo e($account->code_five ?? ''); ?></th>
        <th style="text-align: center; "><?php echo e($account->description ?? ''); ?></th>
        <th style="text-align: center; "><?php echo e($account->level ?? ''); ?></th>
      <?php else: ?>
        <th style="text-align: center; font-weight: normal;"><?php echo e($account->code_one ?? ''); ?>.<?php echo e($account->code_two ?? ''); ?>.<?php echo e($account->code_three ?? ''); ?>.<?php echo e($account->code_four ?? ''); ?>.<?php echo e($account->code_five ?? ''); ?></th>
        <th style="text-align: center; font-weight: normal;"><?php echo e($account->description ?? ''); ?></th>
        <th style="text-align: center; font-weight: normal;"><?php echo e($account->level ?? ''); ?></th>
      <?php endif; ?>
      
      <th style="text-align: right; font-weight: normal;"><?php echo e(number_format(($account->balance_previus ?? 0), 2, ',', '.')); ?></th>
      <th style="text-align: right; font-weight: normal;"><?php echo e(number_format(($account->debe ?? 0), 2, ',', '.')); ?></th>
      <th style="text-align: right; font-weight: normal;"><?php echo e(number_format(($account->hacer ?? 0), 2, ',', '.')); ?></th>
      <th style="text-align: right; font-weight: normal;"><?php echo e(number_format(($account->balance_previus ?? 0)+($account->debe ?? 0)-($account->hacer ?? 0), 2, ',', '.')); ?></th>
    </tr> 
  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 

  
</table>

</body>
</html>
<?php /**PATH C:\xampp\htdocs\aryasoftware\resources\views/admin/reports/accounts.blade.php ENDPATH**/ ?>