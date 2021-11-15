
  
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
 
<title>Documento sin título</title>
<style>
  table, td, th {
    border: 1px solid black;
    font-size: x-small;
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
  <h4 style="color: black">FACTURA DE COMPRA NRO: <?php echo e(str_pad($expense->id, 6, "0", STR_PAD_LEFT)); ?></h4>

 
   
 
<table>
  <tr>
    <th style="font-weight: normal; width: 40%;">Concesión Postal:</th>
    <th style="font-weight: normal;">Nº <?php echo e($company->franqueo_postal ?? ''); ?></th>
   
  </tr>
  <tr>
    
      <td style="width: 40%;">Fecha de Emisión:</td>
      <td><?php echo e($expense->date); ?></td>
    
  
  </tr>
  
</table>




<table style="width: 100%;">
  <tr>
    <th style="font-weight: normal; ">Nombre / Razón Social: &nbsp;  <?php echo e($expense->providers['razon_social']); ?></th>
    
   
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
    <th style="text-align: center;">Factura de Compra</th>
    <th style="text-align: center;">Nro. Control/Serie</th>
    <th style="text-align: center;">Condiciones de Pago</th>
   
  </tr>
  <tr>
    <td style="text-align: center;"><?php echo e($expense->providers['phone1']); ?></td>
    <td style="text-align: center;"><?php echo e($expense->providers['code_provider']); ?></td>
    <td style="text-align: center;"><?php echo e($expense->invoice); ?></td>
    <td style="text-align: center;"><?php echo e($expense->serie); ?></td>
    <?php if(isset($expense->credit_days)): ?>
      <td style="text-align: center;">Crédito <?php echo e($expense->credit_days); ?> dias</td>
    <?php else: ?>
      <td></td>
    <?php endif; ?>
    
  </tr>
  
</table>

<table style="width: 100%;">
  <tr>
  <th style="font-weight: normal; ">Observaciones: &nbsp; <?php echo e($expense->observation); ?> </th>
</tr>
  
</table>
  <?php if(!$payment_expenses->isEmpty()): ?>
      

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
          <th style="text-align: center; ">Monto</th>
        </tr>

        <?php $__currentLoopData = $payment_expenses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $var): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php 
          if($coin != 'bolivares'){
            $var->amount = $var->amount / $expense->rate;
          }
        ?>
        <tr>
          <th style="text-align: center; font-weight: normal;"><?php echo e($var->payment_type); ?></th>
          <?php if(isset($var->accounts['description'])): ?>
            <th style="text-align: center; font-weight: normal;"><?php echo e($var->accounts['description']); ?></th>
          <?php else: ?>    
            <th style="text-align: center; font-weight: normal;"></th>
          <?php endif; ?>
          <th style="text-align: center; font-weight: normal;"><?php echo e($var->reference); ?></th>
          <th style="text-align: center; font-weight: normal;"><?php echo e(number_format($var->amount, 2, ',', '.')); ?></th>
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
    <th style="text-align: center; ">Total</th>
  </tr> 
  <?php $__currentLoopData = $inventories_expenses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $var): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <?php
        if($coin != 'bolivares'){
          $var->price = $var->price / $expense->rate;
        }
        $total_less_percentage = ($var->price * $var->amount);
      ?>
    <tr>
      <?php if(isset($var->id_inventory)): ?>
        <th style="text-align: center; font-weight: normal;">Inv: <?php echo e($var->inventories['code']); ?></th> 
      <?php else: ?>
        <th style="text-align: center; font-weight: normal;">Cuenta: <?php echo e($var->id_account); ?></th>
      <?php endif; ?>
      <th style="text-align: center; font-weight: normal;"><?php echo e($var->description); ?></th>
      <th style="text-align: center; font-weight: normal;"><?php echo e(number_format($var->amount, 2, ',', '.')); ?></th>
      <th style="text-align: center; font-weight: normal;"><?php echo e(number_format($var->price, 2, ',', '.')); ?></th>
      <th style="text-align: right; font-weight: normal;"><?php echo e(number_format($total_less_percentage, 2, ',', '.')); ?></th>
    </tr> 
  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
</table>

<table style="width: 100%;">
  <tr>
    <th style="text-align: right; font-weight: normal; width: 79%; border-bottom-color: white;">Sub Total</th>
    <th style="text-align: right; font-weight: normal; width: 21%;"><?php echo e(number_format($expense->sub_total / ($bcv ?? 1), 2, ',', '.')); ?></th>
  </tr> 
  <tr>
    <th style="text-align: right; font-weight: normal; width: 79%; border-bottom-color: white;">Base Imponible</th>
    <th style="text-align: right; font-weight: normal; width: 21%;"><?php echo e(number_format($expense->base_imponible / ($bcv ?? 1), 2, ',', '.')); ?></th>
  </tr> 
  
  <?php if($expense->retencion_iva != 0): ?>
    <tr>
      <th style="text-align: right; font-weight: normal; width: 79%; border-bottom-color: white;">Retención de Iva</th>
      <th style="text-align: right; font-weight: normal; width: 21%;"><?php echo e(number_format($expense->retencion_iva / ($bcv ?? 1), 2, ',', '.')); ?></th>
    </tr> 
  <?php endif; ?> 
  <?php if($expense->retencion_islr != 0): ?>
    <tr>
      <th style="text-align: right; font-weight: normal; width: 79%; border-bottom-color: white;">Retención de ISLR</th>
      <th style="text-align: right; font-weight: normal; width: 21%;"><?php echo e(number_format($expense->retencion_islr / ($bcv ?? 1), 2, ',', '.')); ?></th>
    </tr> 
  <?php endif; ?> 
  <tr>
    <th style="text-align: right; font-weight: normal; width: 79%; border-bottom-color: white;">I.V.A.<?php echo e($expense->iva_percentage); ?>%</th>
    <th style="text-align: right; font-weight: normal; width: 21%;"><?php echo e(number_format($expense->amount_iva / ($bcv ?? 1), 2, ',', '.')); ?></th>
  </tr> 
  <?php if($expense->anticipo != 0): ?>
  <tr>
    <th style="text-align: right; font-weight: normal; width: 79%; border-bottom-color: white;">Anticipo</th>
    <th style="text-align: right; font-weight: normal; width: 21%;"><?php echo e(number_format($expense->anticipo / ($bcv ?? 1), 2, ',', '.')); ?></th>
  </tr> 
  <?php endif; ?>
 
  <tr>
    <th style="text-align: right; font-weight: normal; width: 79%; border-top-color: rgb(17, 9, 9); font-size: small;">MONTO TOTAL</th>
    <th style="text-align: right; font-weight: normal; width: 21%;"><?php echo e(number_format($expense->amount_with_iva / ($bcv ?? 1), 2, ',', '.')); ?></th>
  </tr> 
  
</table>

</body>
</html>
<?php /**PATH C:\xampp\htdocs\aryasoftware\resources\views/pdf/expense_media.blade.php ENDPATH**/ ?>