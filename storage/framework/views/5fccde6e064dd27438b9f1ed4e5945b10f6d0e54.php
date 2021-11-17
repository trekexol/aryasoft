
  
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
 
<title>Nota de Entrega</title>
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
  <h4 style="color: black">NOTA DE ENTREGA NRO: <?php echo e(str_pad($quotation->number_delivery_note ?? $quotation->id, 6, "0", STR_PAD_LEFT)); ?></h4>

 
   
 
<table>
  <tr>
    <th style="font-weight: normal; width: 40%;">Concesión Postal:</th>
    <th style="font-weight: normal;">Nº <?php echo e($company->franqueo_postal ?? ''); ?></th>
   
  </tr>
  <tr>
    <td style="width: 40%;">Fecha de Emisión:</td>
    <?php if(isset($quotation->date_delivery_note)): ?>
      <td><?php echo e(date_format(date_create($quotation->date_delivery_note),"d-m-Y")); ?></td>
    <?php else: ?>
      <td></td>
    <?php endif; ?>
  </tr>
  
</table>


<table style="width: 100%;">
  <tr>
    <th style="font-weight: normal; font-size: medium;">Nombre / Razón Social: &nbsp;  <?php echo e($quotation->clients['name'] ?? ''); ?></th>
    
   
  </tr>
  <tr>
    <td>Domicilio Fiscal: &nbsp;  <?php echo e($quotation->clients['direction'] ?? ''); ?>

    </td>
    
    
  </tr>
  
</table>




<table style="width: 100%;">
  <tr>
    <th style="text-align: center;">Teléfono</th>
    <th style="text-align: center;">RIF/CI</th>
    <th style="text-align: center;">N° Control / Serie</th>
    <th style="text-align: center;">Condición de Pago</th>
    <th style="text-align: center;">Transp./Tipo Entrega</th>
   
  </tr>
  <tr>
    <td style="text-align: center;"><?php echo e($quotation->clients['phone1'] ?? ''); ?></td>
    <td style="text-align: center;"><?php echo e($quotation->clients['type_code'] ?? ''); ?> <?php echo e($quotation->clients['cedula_rif'] ?? ''); ?></td>
    <td style="text-align: center;"><?php echo e($quotation->serie); ?></td>
    <td style="text-align: center;">Nota de Entrega</td>
    <td style="text-align: center;"><?php echo e($quotation->transports['placa'] ?? ''); ?></td>
    
    
  </tr>
  
</table>

<table style="width: 100%;">
  <tr>
  <th style="font-weight: normal; font-size: medium;">Observaciones: &nbsp; <?php echo e($quotation->observation ?? ''); ?> </th>
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
    <th style="text-align: center; ">Desc</th>
    <th style="text-align: center; ">Total</th>
  </tr> 
  <?php $__currentLoopData = $inventories_quotations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $var): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <?php
      $percentage = (($var->price * $var->amount_quotation) * $var->discount)/100;

      $total_less_percentage = ($var->price * $var->amount_quotation) - $percentage;

      $total_less_percentage = $total_less_percentage / ($bcv ?? 1);
      ?>
    <tr>
      <th style="text-align: center; font-weight: normal;"><?php echo e($var->code_comercial); ?></th>
      <th style="text-align: center; font-weight: normal;"><?php echo e($var->description); ?></th>
      <th style="text-align: center; font-weight: normal;"><?php echo e(number_format($var->amount_quotation, 0, '', '.')); ?></th>
      <th style="text-align: center; font-weight: normal;"><?php echo e(number_format($var->price / ($bcv ?? 1), 2, ',', '.')); ?></th>
      <th style="text-align: center; font-weight: normal;"><?php echo e($var->discount); ?>%</th>
      <th style="text-align: right; font-weight: normal;"><?php echo e(number_format($total_less_percentage, 2, ',', '.')); ?></th>
    </tr> 
  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
</table>


<?php
  $iva = ($quotation->base_imponible * $quotation->iva_percentage)/100;

  $total_bs = $quotation->total_factura + $iva;

  $total_petro = $total_bs / ($bcv ?? 1) / $company->rate_petro;

  $iva = $iva / ($bcv ?? 1);

  $total = $total_bs / ($bcv ?? 1);
?>

<table style="width: 100%;">
  <tr>
    <th style="text-align: right; font-weight: normal; width: 79%; border-bottom-color: white;">Sub Total</th>
    <th style="text-align: right; font-weight: normal; width: 21%;"><?php echo e(number_format($quotation->total_factura / ($bcv ?? 1), 2, ',', '.')); ?></th>
  </tr> 
  <tr>
    <th style="text-align: right; font-weight: normal; width: 79%; border-bottom-color: white;">Base Imponible</th>
    <th style="text-align: right; font-weight: normal; width: 21%;"><?php echo e(number_format($quotation->base_imponible / ($bcv ?? 1), 2, ',', '.')); ?></th>
  </tr> 
  <tr>
    <th style="text-align: right; font-weight: normal; width: 79%; border-bottom-color: white;">Ventas Exentas</th>
    <th style="text-align: right; font-weight: normal; width: 21%;"><?php echo e(number_format(($retiene_iva ?? 0) / ($bcv ?? 1), 2, ',', '.')); ?></th>
  </tr> 
  <tr>
    <th style="text-align: right; font-weight: normal; width: 79%; border-bottom-color: white;">I.V.A.<?php echo e($quotation->iva_percentage); ?>%</th>
    <th style="text-align: right; font-weight: normal; width: 21%;"><?php echo e(number_format($iva, 2, ',', '.')); ?></th>
  </tr> 
 
  
    <?php if(isset($coin) && ($coin == 'bolivares')): ?>
      <tr>
        <th style="text-align: right; font-weight: normal; width: 79%; border-bottom-color: white;">TOTAL Bs</th>
        <th style="text-align: right; font-weight: normal; width: 21%;"><?php echo e(number_format($total, 2, ',', '.')); ?></th>
      </tr> 
      <tr>
        <th style="text-align: right; font-weight: normal; width: 79%; border-bottom-color: white; font-size: small;">TOTAL $</th>
        <th style="text-align: right; font-weight: normal; width: 21%;"><?php echo e(number_format($total / $quotation->bcv, 2, ',', '.')); ?></th>
      </tr> 
    <?php else: ?>
      <tr>
        <th style="text-align: right; font-weight: normal; width: 79%; border-bottom-color: white;">TOTAL $</th>
        <th style="text-align: right; font-weight: normal; width: 21%;"><?php echo e(number_format($total, 2, ',', '.')); ?></th>
      </tr> 
      <tr>
        <th style="text-align: right; font-weight: normal; width: 79%; border-bottom-color: white;">TOTAL Bs</th>
        <th style="text-align: right; font-weight: normal; width: 21%;"><?php echo e(number_format($total_bs, 2, ',', '.')); ?></th>
      </tr> 
    <?php endif; ?>
    
  </tr> 
  <tr>
    <th style="text-align: left; font-weight: normal; width: 79%; border-top-color: rgb(17, 9, 9); border-right-color: white; font-size: small;"><pre> Tasa: <?php echo e(number_format($quotation->bcv, 2, ',', '.')); ?></pre></th>
    <th style="text-align: right; font-weight: normal; width: 21%; "></th>
  </tr> 
  
  
  
  
</table>

</body>
</html>
<?php /**PATH C:\xampp\htdocs\aryasoftware\resources\views/pdf/deliverynote.blade.php ENDPATH**/ ?>