
  
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
 
<title>Factura</title>
<style>
  table, td, th {
    border: 1px solid black;
  }
  
  table {
    border-collapse: collapse;
    width: 50%;
  }
  
  th {
    
    text-align: left;
  }
  </style>
</head>

<body>
  <table>
    <tbody>
    <?php if(isset($expenses)): ?>
    <?php $__currentLoopData = $expenses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $expense): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td><?php echo e($company->code_rif); ?></td>
            <td><?php echo e($expense->date->format('Ym')); ?></td>
            <td><?php echo e($expense->date->format('Y-m-d')); ?></td>
            <td><?php echo e($expense->invoice); ?></td>
            <td><?php echo e($expense->serie); ?></td>
            <td><?php echo e($expense->amount_with_iva); ?></td>
            <td><?php echo e($expense->base_imponible); ?></td>
            <td><?php echo e($expense->retencion_iva); ?></td>
            <td><?php echo e($expense->date->format('Ym').str_pad($expense->id, 8, "0", STR_PAD_LEFT)); ?></td>
            <td><?php echo e($expense->total_retiene_iva); ?></td>
            <td><?php echo e($expense->iva_percentage); ?></td>
        </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
    <?php endif; ?>
</table>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\aryasoftware\resources\views/export_excel/expense_iva.blade.php ENDPATH**/ ?>