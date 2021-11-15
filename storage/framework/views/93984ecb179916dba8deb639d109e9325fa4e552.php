
  
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
 
<title>Orden de Compra</title>
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


  <br><br><br><br><br><br><br><br><br>
  <h4 style="color: black">ORDEN DE COMPRA NRO: <?php echo e(str_pad($expense->id, 6, "0", STR_PAD_LEFT)); ?> / SERIE: <?php echo e($expense->serie); ?></h4>

 
   
 
<table>
  <tr>
    <th style="font-weight: normal; width: 40%;">Concesión Postal:</th>
    <th style="font-weight: normal;">Nº <?php echo e($company->franqueo_postal ?? ''); ?></th>
   
  </tr>
  <tr>
    <td style="width: 40%;">Fecha de Emisión:</td>
    <td><?php echo e($expense->date_delivery_note); ?></td>
    
  </tr>
  
</table>




<table style="width: 100%;">
  <tr>
    <th style="font-weight: normal; font-size: medium;">Nombre / Razón Social: &nbsp;  <?php echo e($expense->providers['razon_social']); ?></th>
    
   
  </tr>
  <tr>
    <td>Domicilio Fiscal: &nbsp;  <?php echo e($expense->providers['direction']); ?>

    </td>
    
    
  </tr>
  
</table>




<table style="width: 100%;">
  <tr>
    <th style="text-align: center;">Teléfono</th>
    <th style="text-align: center;">RIF/CI</th>
    <th style="text-align: center;">N° Control / Serie</th>
    <th style="text-align: center;">Condición de Pago</th>
   
  </tr>
  <tr>
    <td style="text-align: center;"><?php echo e($expense->providers['phone1']); ?></td>
    <td style="text-align: center;"><?php echo e($expense->providers['code_provider']); ?></td>
    <td style="text-align: center;"><?php echo e($expense->serie); ?></td>
    <td style="text-align: center;">Nota de Entrega</td>
    
    
  </tr>
  
</table>

<table style="width: 100%;">
  <tr>
  <th style="font-weight: normal; font-size: medium;">Observaciones: &nbsp; <?php echo e($expense->observation ?? ''); ?> </th>
</tr>
  
</table>

<table style="width: 100%;">
  <tr>
    <th style="text-align: center; width: 100%;">Productos</th>
  </tr> 
</table>
<table style="width: 100%;">
  <tr>
    <th style="text-align: center; ">Código</th>
    <th style="text-align: center; ">Descripción</th>
    <th style="text-align: center; ">Cantidad</th>
    <th style="text-align: center; ">P.V.J.</th>
    <th style="text-align: center; ">Total</th>
  </tr> 
  <?php $__currentLoopData = $inventories_expenses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $var): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <?php
      
      $total_less_percentage = ($var->price * $var->amount_expense);

      $total_less_percentage = $total_less_percentage / ($bcv ?? 1);
      ?>
    <tr>
      <th style="text-align: center; font-weight: normal;"><?php echo e($var->code_comercial); ?></th>
      <th style="text-align: center; font-weight: normal;"><?php echo e($var->description); ?></th>
      <th style="text-align: center; font-weight: normal;"><?php echo e(number_format($var->amount_expense, 0, '', '.')); ?></th>
      <th style="text-align: center; font-weight: normal;"><?php echo e(number_format($var->price / ($bcv ?? 1), 2, ',', '.')); ?></th>
      <th style="text-align: right; font-weight: normal;"><?php echo e(number_format($total_less_percentage, 2, ',', '.')); ?></th>
    </tr> 
  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
</table>


<?php
  $iva = ($expense->base_imponible * $expense->iva_percentage)/100;

  $total = $expense->total_factura + $iva;

  $total_petro = $total / ($bcv ?? 1) / $company->rate_petro;

  $iva = $iva / ($bcv ?? 1);

  $total = $total / ($bcv ?? 1);
?>

<table style="width: 100%;">
  <tr>
    <th style="text-align: right; font-weight: normal; width: 79%; border-bottom-color: white;">Sub Total</th>
    <th style="text-align: right; font-weight: normal; width: 21%;"><?php echo e(number_format($expense->total_factura / ($bcv ?? 1), 2, ',', '.')); ?></th>
  </tr> 
  <tr>
    <th style="text-align: right; font-weight: normal; width: 79%; border-bottom-color: white;">Base Imponible</th>
    <th style="text-align: right; font-weight: normal; width: 21%;"><?php echo e(number_format($expense->base_imponible / ($bcv ?? 1), 2, ',', '.')); ?></th>
  </tr> 
  <tr>
    <th style="text-align: right; font-weight: normal; width: 79%; border-bottom-color: white;">Ventas Exentas</th>
    <th style="text-align: right; font-weight: normal; width: 21%;"><?php echo e(number_format($expense->ventas_exentas / ($bcv ?? 1), 2, ',', '.')); ?></th>
  </tr> 
  <tr>
    <th style="text-align: right; font-weight: normal; width: 79%; border-bottom-color: white;">I.V.A.<?php echo e($expense->iva_percentage); ?>%</th>
    <th style="text-align: right; font-weight: normal; width: 21%;"><?php echo e(number_format($iva, 2, ',', '.')); ?></th>
  </tr> 
  <tr>
    <th style="text-align: right; font-weight: normal; width: 79%; border-bottom-color: white;">MONTO TOTAL</th>
    <th style="text-align: right; font-weight: normal; width: 21%;"><?php echo e(number_format($total, 2, ',', '.')); ?></th>
  </tr> 
  <tr>
    <th style="text-align: right; font-weight: normal; width: 79%; border-bottom-color: white; font-size: small;">MONTO TOTAL Petro</th>
    <th style="text-align: right; font-weight: normal; width: 21%;"><?php echo e(number_format($total_petro, 6, ',', '.')); ?></th>
  </tr> 
  <tr>
    <th style="text-align: left; font-weight: normal; width: 79%; border-top-color: rgb(17, 9, 9); border-right-color: white; font-size: small;"><pre>ORDEN DE COMPRA        </pre></th>
    <th style="text-align: right; font-weight: normal; width: 21%; "></th>
  </tr> 
  
  
  
  
</table>

</body>
</html>
<?php /**PATH C:\xampp\htdocs\aryasoftware\resources\views/pdf/deliverynote_expense.blade.php ENDPATH**/ ?>