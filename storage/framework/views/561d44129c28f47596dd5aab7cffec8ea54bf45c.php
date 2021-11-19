<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
 
<title>Nota de Entrega</title>
<style>
  
  body {
    font-family: Arial, Helvetica, sans-serif;
  }

  table, td, th {
    border: 1px solid black;
    font-size: 9pt;
  }
  
  table {
    border-collapse: collapse;
    width: 50%;
  }
  
  th {  
    text-align: left;
  }

  #top {
    margin-top: -35px;
  }

  </style>
</head>

<body>
  <table id="top">
    <tr>
      <th style="text-align: left; font-weight: normal; width: 10%; border-color: white; font-weight: bold;"> <img src="<?php echo e(asset(Auth::user()->company->foto_company ?? 'img/northdelivery.jpg')); ?>" width="120" height="60" class="d-inline-block align-top" alt="">
      </th>
      <th style="text-align: left; font-weight: normal; width: 90%; border-color: white; font-weight: bold;"><h4><?php echo e(Auth::user()->company->code_rif ?? ''); ?> </h4></th>
    </tr> 
  </table>
<div style="margin-top: -15px; margin-top: -15px; color: black;font-size: 9pt;font-weight: bold; text-align: right;">NOTA DE ENTREGA NRO: <?php echo e(str_pad($quotation->number_delivery_note ?? $quotation->id, 6, "0", STR_PAD_LEFT)); ?></div>
<table>
  <?php if(isset($company->franqueo_postal)): ?>
  <tr>
    <th style="font-weight: normal; width: 40%;">Concesión Postal:</th>
    <th style="font-weight: normal;">Nº <?php echo e($company->franqueo_postal ?? ''); ?></th>
   
  </tr>
  <?php endif; ?>
  <tr>
    <td style="width: 40%;">Fecha de Emisión:</td>
    <td><?php echo e(date_format(date_create($quotation->date_delivery_note),"d-m-Y")); ?></td>
    
  </tr>
  
</table>
<table style="width: 100%;">
  <tr>
    <th style="font-weight: normal;">Nombre / Razón Social: &nbsp;  <?php echo e($quotation->clients['name'] ?? ''); ?> </th>
    <th style="font-weight: normal;">Vendedor: <?php echo e($quotation->vendors['name'] ?? 'No aplica'); ?> <?php echo e($quotation->vendors['surname'] ?? ''); ?> </th>
    
  </tr>
</table>
<table style="width: 100%;">
  <tr>
    <th style="font-weight: normal;">Domicilio Fiscal: &nbsp;  <?php echo e($quotation->clients['direction'] ?? ''); ?></th>
  </tr>
</table>
<table style="width: 100%;">
  <tr>
    <th style="text-align: center;">Teléfono</th>
    <th style="text-align: center;">RIF/CI</th>
    <th style="text-align: center;">N° Control / Serie</th>
    <th style="text-align: center;">Condición de Pago</th>
    <th style="text-align: center;">Transporte/Tipo de Entrega</th>
   
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
  <th style="font-weight: normal; ">Observaciones: &nbsp; <?php echo e($quotation->observation ?? ''); ?> </th>
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
      $price = bcdiv(($var->price / ($bcv ?? 1)), '1', 2);
      $percentage = (($price * $var->amount_quotation) * $var->discount)/100;

      $total_less_percentage = (number_format(bcdiv($price, '1', 2),2,'.','') * $var->amount_quotation) - $percentage;
      
      $total_less_percentage = $total_less_percentage ;
      
      ?>
    <tr>
      <th style="text-align: center; font-weight: normal;"><?php echo e($var->code_comercial); ?></th>
      <th style="text-align: center; font-weight: normal;"><?php echo e($var->description); ?></th>
      <th style="text-align: center; font-weight: normal;"><?php echo e(number_format($var->amount_quotation, 0, '', '.')); ?></th>
      <th style="text-align: center; font-weight: normal;"><?php echo e(number_format($price, 2, ',', '.')); ?></th>
      <th style="text-align: center; font-weight: normal;"><?php echo e($var->discount); ?>%</th>
      <th style="text-align: right; font-weight: normal;"><?php echo e(number_format(bcdiv($total_less_percentage, '1', 2), 2, ',', '.')); ?></th>
    </tr> 
  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
</table>


<?php

  $base_imponible = $quotation->base_imponible;
  $total_factura = $quotation->total_factura;

  $iva = ($quotation->base_imponible * $quotation->iva_percentage)/100;

  $total = $total_factura + $iva;

  $total_petro = $total / $company->rate_petro;

  $iva = $iva;

  $total = $total;
?>

<table style="width: 100%;">
  <!--<tr>
    <th style="text-align: right; font-weight: normal; width: 79%; border-bottom-color: white;">Sub Total</th>
    <th style="text-align: right; font-weight: normal; width: 21%;"><?php echo e(number_format($quotation->total_factura, 2, ',', '.')); ?></th>
  </tr>--> 

  <tr>
    <th style="text-align: right; font-weight: normal; width: 79%; border-bottom-color: white;">Base Imponible</th>
    <th style="text-align: right; font-weight: normal; width: 21%;"><?php echo e(number_format($base_imponible, 2, ',', '.')); ?></th>
  </tr> 
  <tr>
    <th style="text-align: right; font-weight: normal; width: 79%; border-bottom-color: white;">Ventas Exentas</th>
    <th style="text-align: right; font-weight: normal; width: 21%;"><?php echo e(number_format(($retiene_iva ?? 0), 2, ',', '.')); ?></th>
  </tr> 
  <tr>
    <th style="text-align: right; font-weight: normal; width: 79%; border-bottom-color: white;">I.V.A.<?php echo e($quotation->iva_percentage); ?>%</th>
    <th style="text-align: right; font-weight: normal; width: 21%;"><?php echo e(number_format($iva, 2, ',', '.')); ?></th>
  </tr> 
  <tr>
    <th style="text-align: right; font-weight: normal; width: 79%; border-top-color: rgb(17, 9, 9); ">MONTO TOTAL</th>
    <th style="text-align: right; font-weight: normal; width: 21%; border-top-color: rgb(17, 9, 9);"><?php echo e(number_format($total, 2, ',', '.')); ?></th>
  </tr> 
  
</table>

<div style="color: black;font-size: 9pt; text-align: center;">Original Cliente</div>
<table>
  <tr>
    <th style="text-align: left; font-weight: normal; width: 10%; border-color: white; font-weight: bold;"> <img src="<?php echo e(asset(Auth::user()->company->foto_company ?? 'img/northdelivery.jpg')); ?>" width="120" height="60" class="d-inline-block align-top" alt="">
    </th>
    <th style="text-align: left; font-weight: normal; width: 90%; border-color: white; font-weight: bold;"><h4><?php echo e(Auth::user()->company->code_rif ?? ''); ?> </h4></th>
  </tr> 
</table>
<!-- Repeticion de lo mismo -->
<div style="margin-top: -15px; color: black;font-size: 9pt;font-weight: bold; text-align: right;">NOTA DE ENTREGA NRO: <?php echo e(str_pad($quotation->number_delivery_note ?? $quotation->id, 6, "0", STR_PAD_LEFT)); ?></div>
<table>
  <?php if(isset($company->franqueo_postal)): ?>
  <tr>
    <th style="font-weight: normal; width: 40%;">Concesión Postal:</th>
    <th style="font-weight: normal;">Nº <?php echo e($company->franqueo_postal ?? ''); ?></th>
   
  </tr>
  <?php endif; ?>
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
    <th style="font-weight: normal;">Nombre / Razón Social: &nbsp;  <?php echo e($quotation->clients['name'] ?? ''); ?> </th>
    <th style="font-weight: normal;">Vendedor: <?php echo e($quotation->vendors['name'] ?? 'No aplica'); ?> <?php echo e($quotation->vendors['surname'] ?? ''); ?> </th>
    
  </tr>
</table>
<table style="width: 100%;">
  <tr>
    <th style="font-weight: normal;">Domicilio Fiscal: &nbsp;  <?php echo e($quotation->clients['direction'] ?? ''); ?></th>
  </tr>
</table>
<table style="width: 100%;">
  <tr>
    <th style="text-align: center;">Teléfono</th>
    <th style="text-align: center;">RIF/CI</th>
    <th style="text-align: center;">N° Control / Serie</th>
    <th style="text-align: center;">Condición de Pago</th>
    <th style="text-align: center;">Transporte</th>
   
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
  <th style="font-weight: normal; ">Observaciones: &nbsp; <?php echo e($quotation->observation ?? ''); ?> </th>
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
      $price = bcdiv(($var->price / ($bcv ?? 1)), '1', 2);
      $percentage = (($price * $var->amount_quotation) * $var->discount)/100;

      $total_less_percentage = (number_format(bcdiv($price, '1', 2),2,'.','') * $var->amount_quotation) - $percentage;
      
      $total_less_percentage = $total_less_percentage ;
    
    ?>
  <tr>
    <th style="text-align: center; font-weight: normal;"><?php echo e($var->code_comercial); ?></th>
    <th style="text-align: center; font-weight: normal;"><?php echo e($var->description); ?></th>
    <th style="text-align: center; font-weight: normal;"><?php echo e(number_format($var->amount_quotation, 0, '', '.')); ?></th>
    <th style="text-align: center; font-weight: normal;"><?php echo e(number_format($price, 2, ',', '.')); ?></th>
    <th style="text-align: center; font-weight: normal;"><?php echo e($var->discount); ?>%</th>
    <th style="text-align: right; font-weight: normal;"><?php echo e(number_format(bcdiv($total_less_percentage, '1', 2), 2, ',', '.')); ?></th>
  </tr> 
  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
  </table>


  <?php

  $base_imponible = $quotation->base_imponible;
  $total_factura = $quotation->total_factura;

  $iva = ($quotation->base_imponible * $quotation->iva_percentage)/100;

  $total = $total_factura + $iva;

  $total_petro = $total / $company->rate_petro;

  $iva = $iva;

  $total = $total;
?>


  <table style="width: 100%;">
  <!--<tr>
  <th style="text-align: right; font-weight: normal; width: 79%; border-bottom-color: white;">Sub Total</th>
  <th style="text-align: right; font-weight: normal; width: 21%;"><?php echo e(number_format($quotation->total_factura, 2, ',', '.')); ?></th>
  </tr>--> 

  <tr>
  <th style="text-align: right; font-weight: normal; width: 79%; border-bottom-color: white;">Base Imponible</th>
  <th style="text-align: right; font-weight: normal; width: 21%;"><?php echo e(number_format($base_imponible, 2, ',', '.')); ?></th>
  </tr> 
  <tr>
  <th style="text-align: right; font-weight: normal; width: 79%; border-bottom-color: white;">Ventas Exentas</th>
  <th style="text-align: right; font-weight: normal; width: 21%;"><?php echo e(number_format(($retiene_iva ?? 0), 2, ',', '.')); ?></th>
  </tr> 
  <tr>
  <th style="text-align: right; font-weight: normal; width: 79%; border-bottom-color: white;">I.V.A.<?php echo e($quotation->iva_percentage); ?>%</th>
  <th style="text-align: right; font-weight: normal; width: 21%;"><?php echo e(number_format($iva, 2, ',', '.')); ?></th>
  </tr> 
  <tr>
  <th style="text-align: right; font-weight: normal; width: 79%; border-top-color: rgb(17, 9, 9); ">MONTO TOTAL</th>
  <th style="text-align: right; font-weight: normal; width: 21%; border-top-color: rgb(17, 9, 9);"><?php echo e(number_format($total, 2, ',', '.')); ?></th>
  </tr> 
</table>
<div style="color: black;font-size: 9pt; text-align: center;">Copia (Sin Derecho a Crédito Fiscal)</div>

<table>
  <tr>
    <th style="text-align: left; font-weight: normal; width: 10%; border-color: white; font-weight: bold;"> <img src="<?php echo e(asset(Auth::user()->company->foto_company ?? 'img/northdelivery.jpg')); ?>" width="120" height="60" class="d-inline-block align-top" alt="">
    </th>
    <th style="text-align: left; font-weight: normal; width: 90%; border-color: white; font-weight: bold;"><h4><?php echo e(Auth::user()->company->code_rif ?? ''); ?> </h4></th>
  </tr> 
</table>

<!-- Repeticion de lo mismo -->
<div style="margin-top: -15px; color: black;font-size: 9pt;font-weight: bold; text-align: right;">NOTA DE ENTREGA NRO: <?php echo e(str_pad($quotation->number_delivery_note ?? $quotation->id, 6, "0", STR_PAD_LEFT)); ?></div>
<table>
  <?php if(isset($company->franqueo_postal)): ?>
  <tr>
    <th style="font-weight: normal; width: 40%;">Concesión Postal:</th>
    <th style="font-weight: normal;">Nº <?php echo e($company->franqueo_postal ?? ''); ?></th>
  </tr>
  <?php endif; ?>
  
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
    <th style="font-weight: normal;">Nombre / Razón Social: &nbsp;  <?php echo e($quotation->clients['name'] ?? ''); ?> </th>
    <th style="font-weight: normal;">Vendedor: <?php echo e($quotation->vendors['name'] ?? 'No aplica'); ?> <?php echo e($quotation->vendors['surname'] ?? ''); ?> </th>
    
  </tr>
</table>
<table style="width: 100%;">
  <tr>
    <th style="font-weight: normal;">Domicilio Fiscal: &nbsp;  <?php echo e($quotation->clients['direction'] ?? ''); ?></th>
  </tr>
</table>
<table style="width: 100%;">
  <tr>
    <th style="text-align: center;">Teléfono</th>
    <th style="text-align: center;">RIF/CI</th>
    <th style="text-align: center;">N° Control / Serie</th>
    <th style="text-align: center;">Condición de Pago</th>
    <th style="text-align: center;">Transporte</th>
   
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
  <th style="font-weight: normal; ">Observaciones: &nbsp; <?php echo e($quotation->observation ?? ''); ?> </th>
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
      $price = bcdiv(($var->price / ($bcv ?? 1)), '1', 2);
      $percentage = (($price * $var->amount_quotation) * $var->discount)/100;

      $total_less_percentage = (number_format(bcdiv($price, '1', 2),2,'.','') * $var->amount_quotation) - $percentage;
      
      $total_less_percentage = $total_less_percentage ;
      
      ?>
    <tr>
      <th style="text-align: center; font-weight: normal;"><?php echo e($var->code_comercial); ?></th>
      <th style="text-align: center; font-weight: normal;"><?php echo e($var->description); ?></th>
      <th style="text-align: center; font-weight: normal;"><?php echo e(number_format($var->amount_quotation, 0, '', '.')); ?></th>
      <th style="text-align: center; font-weight: normal;"><?php echo e(number_format($price, 2, ',', '.')); ?></th>
      <th style="text-align: center; font-weight: normal;"><?php echo e($var->discount); ?>%</th>
      <th style="text-align: right; font-weight: normal;"><?php echo e(number_format(bcdiv($total_less_percentage, '1', 2), 2, ',', '.')); ?></th>
    </tr> 
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
    </table>


    <?php

        $base_imponible = $quotation->base_imponible;
        $total_factura = $quotation->total_factura;

        $iva = ($quotation->base_imponible * $quotation->iva_percentage)/100;

        $total = $total_factura + $iva;

        $total_petro = $total / $company->rate_petro;

        $iva = $iva;

        $total = $total;
    ?>

    <table style="width: 100%;">
    <!--<tr>
    <th style="text-align: right; font-weight: normal; width: 79%; border-bottom-color: white;">Sub Total</th>
    <th style="text-align: right; font-weight: normal; width: 21%;"><?php echo e(number_format($total_factura / ($bcv ?? 1), 2, ',', '.')); ?></th>
    </tr>--> 

    <tr>
    <th style="text-align: right; font-weight: normal; width: 79%; border-bottom-color: white;">Base Imponible</th>
    <th style="text-align: right; font-weight: normal; width: 21%;"><?php echo e(number_format($base_imponible, 2, ',', '.')); ?></th>
    </tr> 
    <tr>
    <th style="text-align: right; font-weight: normal; width: 79%; border-bottom-color: white;">Ventas Exentas</th>
    <th style="text-align: right; font-weight: normal; width: 21%;"><?php echo e(number_format(($retiene_iva ?? 0), 2, ',', '.')); ?></th>
    </tr> 
    <tr>
    <th style="text-align: right; font-weight: normal; width: 79%; border-bottom-color: white;">I.V.A.<?php echo e($quotation->iva_percentage); ?>%</th>
    <th style="text-align: right; font-weight: normal; width: 21%;"><?php echo e(number_format($iva, 2, ',', '.')); ?></th>
    </tr> 
    <tr>
    <th style="text-align: right; font-weight: normal; width: 79%; border-top-color: rgb(17, 9, 9); ">MONTO TOTAL</th>
    <th style="text-align: right; font-weight: normal; width: 21%; border-top-color: rgb(17, 9, 9);"><?php echo e(number_format($total, 2, ',', '.')); ?></th>
    </tr> 

</table>
<div style="color: black;font-size: 9pt; text-align: center;">Copia Contabilidad (Sin Derecho a Crédito Fiscal)</div>

</body>
</html>
<?php /**PATH C:\xampp\htdocs\aryasoftware\resources\views/pdf/deliverynotemediacarta.blade.php ENDPATH**/ ?>