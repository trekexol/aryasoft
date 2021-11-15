
  
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


  <br><br><br><br><br><br><br><br><br>
  <h4 style="color: black">FACTURA NRO: <?php echo e(str_pad($quotation->number_invoice ?? $quotation->id, 6, "0", STR_PAD_LEFT)); ?></h4>

 
   
 
<table style="width: 60%;">
  <tr>
    <th style="font-weight: normal; width: 20%;">Concesión Postal:</th>
    <th style="font-weight: normal; width: 40%;">Nº <?php echo e($company->franqueo_postal ?? ''); ?></th>
   
  </tr>
  <tr>
    <?php if(isset($quotation->credit_days)): ?>
      <td style="width: 20%;">Fecha de Emisión:</td>
      <td style="width: 40%;"> <?php echo e(date_format(date_create($quotation->date_billing),"d-m-Y")); ?> | Dias de Crédito: <?php echo e($quotation->credit_days); ?></td>
    <?php else: ?>
      <td style="width: 20%;">Fecha de Emisión:</td>
      <td style="width: 40%;"><?php echo e(date_format(date_create($quotation->date_billing),"d-m-Y")); ?></td>
    <?php endif; ?>
    
  </tr>
  
</table>




<table style="width: 100%;">
  <tr>
    <th style="font-weight: normal; font-size: medium;">Nombre / Razón Social: &nbsp;  <?php echo e($quotation->clients['name']); ?></th>
    
   
  </tr>
  <tr>
    <td>Domicilio Fiscal: &nbsp;  <?php echo e($quotation->clients['direction']); ?>

    </td>
    
    
  </tr>
  
</table>




<table style="width: 100%;">
  <tr>
    <th style="text-align: center;">Teléfono</th>
    <th style="text-align: center;">RIF/CI</th>
    <th style="text-align: center;">N° Control / Serie</th>
    <th style="text-align: center;">Nota de Entrega</th>
    <th style="text-align: center;">Transp./Tipo Entrega</th>
   
  </tr>
  <tr>
    <td style="text-align: center;"><?php echo e($quotation->clients['phone1'] ?? ''); ?></td>
    <td style="text-align: center;"><?php echo e($quotation->clients['type_code'] ?? ''); ?> <?php echo e($quotation->clients['cedula_rif'] ?? ''); ?></td>
    <td style="text-align: center;"><?php echo e($quotation->serie ?? ''); ?></td>
    <td style="text-align: center;"><?php echo e($quotation->number_delivery_note ?? ''); ?></td>
    <td style="text-align: center;"><?php echo e($quotation->transports['placa'] ?? ''); ?></td>
    
    
  </tr>
  
</table>

<table style="width: 100%;">
  <tr>
  <th style="font-weight: normal; font-size: medium;">Observaciones: &nbsp; <?php echo e($quotation->observation); ?> </th>
</tr>
  
</table>
  <?php if(!empty($payment_quotations)): ?>
      

      <br>
      <table style="width: 100%;">
        <tr>
          <th style="text-align: center; width: 100%;">Condiciones de Pago</th>
        </tr> 
      </table>

      <table style="width: 100%;">
        <tr>
          <th style="text-align: center; ">Tipo de Pago</th>
          <th style="text-align: center; ">Cuenta</th>
          <th style="text-align: center; ">Referencia</th>
          <th style="text-align: center; ">Dias de Credito</th>
          <th style="text-align: center; ">Monto</th>
        </tr>

        <?php $__currentLoopData = $payment_quotations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $var): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
          <th style="text-align: center; font-weight: normal;"><?php echo e($var->payment_type); ?></th>
          <?php if(isset($var->accounts['description'])): ?>
            <th style="text-align: center; font-weight: normal;"><?php echo e($var->accounts['description']); ?></th>
          <?php else: ?>    
            <th style="text-align: center; font-weight: normal;"></th>
          <?php endif; ?>
          <th style="text-align: center; font-weight: normal;"><?php echo e($var->reference); ?></th>
          <th style="text-align: center; font-weight: normal;"><?php echo e($var->credit_days); ?></th>
          <th style="text-align: center; font-weight: normal;"><?php echo e(number_format($var->amount , 2, ',', '.')); ?></th>
        </tr> 
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
        
      </table>
  <?php endif; ?>
<br>
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

  //$total = $quotation->sub_total_factura + $iva - $quotation->anticipo;

  $total = $quotation->amount_with_iva;

  $total_petro = ($total - $quotation->anticipo) / $company->rate_petro;

  $iva = $iva / ($bcv ?? 1);

  $total = $total / ($bcv ?? 1);
?>

<table style="width: 100%;">
  <tr>
    <th style="text-align: right; font-weight: normal; width: 79%; border-bottom-color: white;">Sub Total</th>
    <th style="text-align: right; font-weight: normal; width: 21%;"><?php echo e(number_format($quotation->amount / ($bcv ?? 1), 2, ',', '.')); ?></th>
  </tr> 
  <tr>
    <th style="text-align: right; font-weight: normal; width: 79%; border-bottom-color: white;">Base Imponible</th>
    <th style="text-align: right; font-weight: normal; width: 21%;"><?php echo e(number_format($quotation->base_imponible / ($bcv ?? 1), 2, ',', '.')); ?></th>
  </tr>
  <?php if($quotation->retencion_iva != 0): ?>
    <tr>
      <th style="text-align: right; font-weight: normal; width: 79%; border-bottom-color: white;">Retención de Iva</th>
      <th style="text-align: right; font-weight: normal; width: 21%;"><?php echo e(number_format($quotation->retencion_iva / ($bcv ?? 1), 2, ',', '.')); ?></th>
    </tr> 
  <?php endif; ?> 
  <?php if($quotation->retencion_islr != 0): ?>
    <tr>
      <th style="text-align: right; font-weight: normal; width: 79%; border-bottom-color: white;">Retención de ISLR</th>
      <th style="text-align: right; font-weight: normal; width: 21%;"><?php echo e(number_format($quotation->retencion_islr / ($bcv ?? 1), 2, ',', '.')); ?></th>
    </tr> 
  <?php endif; ?> 
  <tr>
    <th style="text-align: right; font-weight: normal; width: 79%; border-bottom-color: white;">I.V.A.<?php echo e($quotation->iva_percentage); ?>%</th>
    <th style="text-align: right; font-weight: normal; width: 21%;"><?php echo e(number_format($iva, 2, ',', '.')); ?></th>
  </tr> 
  <?php if($quotation->anticipo != 0): ?>
  <tr>
    <th style="text-align: right; font-weight: normal; width: 79%; border-bottom-color: white;">Anticipo</th>
    <th style="text-align: right; font-weight: normal; width: 21%;"><?php echo e(number_format($quotation->anticipo / ($bcv ?? 1), 2, ',', '.')); ?></th>
  </tr> 
  <?php endif; ?>
 
  <tr>
    <th style="text-align: right; font-weight: normal; width: 79%; border-bottom-color: white;">MONTO TOTAL</th>
    <th style="text-align: right; font-weight: normal; width: 21%;"><?php echo e(number_format($total , 2, ',', '.')); ?></th>
  </tr> 
  <?php if(isset($company->pie_nota)): ?>
    <tr>
      <th style="text-align: right; font-weight: normal; width: 79%; border-bottom-color: white; font-size: small;">MONTO TOTAL Petro</th>
      <th style="text-align: right; font-weight: normal; width: 21%;"><?php echo e(number_format($total_petro, 6, ',', '.')); ?></th>
    </tr> 
    <tr>
      <th style="text-align: left; font-weight: normal; width: 79%; border-top-color: rgb(17, 9, 9); border-right-color: white; font-size: small;"><pre> Tasa: <?php echo e(number_format($quotation->bcv, 2, ',', '.')); ?></pre></th>
      <th style="text-align: right; font-weight: normal; width: 21%; "></th>
    </tr> 
  <?php else: ?>
    <tr>
      <th style="text-align: right; font-weight: normal; width: 79%; border-bottom-color: white; font-size: small;">MONTO TOTAL Petro</th>
      <th style="text-align: right; font-weight: normal; width: 21%;"><?php echo e(number_format($total_petro, 6, ',', '.')); ?></th>
    </tr> 
    <tr>
      <th style="text-align: left; font-weight: normal; width: 79%; border-top-color: rgb(17, 9, 9); border-right-color: white; font-size: small;"> Tasa: <?php echo e(number_format($quotation->bcv, 2, ',', '.')); ?></th>
      <th style="text-align: right; font-weight: normal; width: 21%; "></th>
    </tr> 
  <?php endif; ?>
  
  
  
  
  
</table>

</body>
</html>
<?php /**PATH C:\xampp\htdocs\aryasoftware\resources\views/pdf/factura.blade.php ENDPATH**/ ?>