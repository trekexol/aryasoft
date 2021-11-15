
  
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
      <th style="text-align: left; font-weight: normal; width: 15%; border-color: white; font-weight: bold;"> <img src="<?php echo e(asset(Auth::user()->company->foto_company ?? 'img/northdelivery.jpg')); ?>" width="90" height="30" class="d-inline-block align-top" alt="">
      </th>
      <th style="text-align: left; font-weight: normal; width: 85%; border-color: white; font-weight: bold;"><h4><?php echo e(Auth::user()->company->code_rif ?? ''); ?> </h4></th>
    </tr> 
  </table>
  
  <h4 style="color: black; text-align: center; font-weight: bold;">Ingresos y Egresos</h4>

  <h5 style="color: black; text-align: center; font-weight: bold;">Periodo desde <?php echo e(date('d-m-Y', strtotime( $date_begin ?? $detail_old->created_at ?? ''))); ?> al <?php echo e(date('d-m-Y', strtotime( $date_end ?? $datenow))); ?></h5>
   
 
<table>
  <tr>
    <th style="text-align: center; font-weight: normal; width: 58%; border-color: white; font-weight: bold;"></th>
    <th style="text-align: right; font-weight: normal; width: 21%; border-color: white; font-weight: bold;"><?php echo e($coin ?? 'Bs'); ?></th>
    <th style="text-align: center; font-weight: normal; width: 21%; border-color: white; font-weight: bold;">Petro</th>
  </tr> 
  <?php 
      //Variable booleana que me ayuda a controlar el cambio entre cuentas nivel 1
      $controlador_level1 = true;
      $total_level1 = 0;

      $controlador_level2 = true;
      $total_level2 = 0;

      $controlador_level3 = true;
      $total_level3 = 0;

      $controlador_level4 = true;
      $total_level4 = 0;

      $description4 = null;
      $description3 = null;
      $description2 = null;
      $description = null;
       
    ?>

    

  <?php $__currentLoopData = $accounts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $account): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
  <?php if($account->code_one >= 4): ?>
      
  
    <?php if($account->level == 1 ): ?>
      <?php if($controlador_level1 == false): ?>
        <?php if(isset($description4)): ?>
          <tr>
            <th style="text-align: left; font-weight: normal; width: 58%; border-color: white; font-weight: bold; ">Total <?php echo e($description4); ?> : </th>
            <th style="text-align: right; font-weight: normal; width: 21%; border-color: white; font-weight: bold;"><?php echo e(number_format($total_level4, 2, ',', '.')); ?></th>
            <th style="text-align: center; font-weight: normal; width: 21%; border-color: white; font-weight: bold;"></th>
          </tr> 
          <?php 
            $controlador_level4 = true;
          ?>
        <?php endif; ?>
        <?php if(isset($description3)): ?>
        <tr>
          <th style="text-align: left; font-weight: normal; width: 58%; border-color: white; font-weight: bold; ">Total <?php echo e($description3); ?> : </th>
          <th style="text-align: right; font-weight: normal; width: 21%; border-color: white; font-weight: bold;"><?php echo e(number_format($total_level3, 2, ',', '.')); ?></th>
          <th style="text-align: center; font-weight: normal; width: 21%; border-color: white; font-weight: bold;"></th>
        </tr> 
        <?php 
          $controlador_level3 = true;
        ?>
        <?php endif; ?>
        <?php if(isset($description2)): ?>
        <tr>
          <th style="text-align: left; font-weight: normal; width: 58%; border-color: white; font-weight: bold; ">Total <?php echo e($description2); ?> : </th>
          <th style="text-align: right; font-weight: normal; width: 21%; border-color: white; font-weight: bold;"><?php echo e(number_format($total_level2, 2, ',', '.')); ?></th>
          <th style="text-align: center; font-weight: normal; width: 21%; border-color: white; font-weight: bold;"></th>
        </tr> 
        <?php 
          $controlador_level2 = true;
        ?>
        <?php endif; ?>
        
        <tr>
          <th style="text-align: left; font-weight: normal; width: 58%; border-left-color: white; border-right-color: white; background:rgb(171, 224, 255); font-weight: bold; ">Total <?php echo e($description); ?> : </th>
          <th style="text-align: right; font-weight: normal; width: 21%; border-color: white; font-weight: bold;"><?php echo e(number_format($total_level1, 2, ',', '.')); ?></th>
          <th style="text-align: center; font-weight: normal; width: 21%; border-color: white; font-weight: bold;"></th>
        </tr> 
      <?php endif; ?>
        <tr>
          <th style="text-align: center; font-weight: normal; width: 58%; border-color: white; font-weight: bold;"><?php echo e($account->description); ?></th>
          <th style="text-align: center; font-weight: normal; width: 21%; border-color: white; font-weight: bold;"></th>
          <th style="text-align: center; font-weight: normal; width: 21%; border-color: white; font-weight: bold;"></th>
        </tr> 
        <?php 
          $description = $account->description;
          $total_level1 = $account->balance_previus + $account->debe - $account->haber;
        //si vuelve a encontrar otra cuenta nivel 1, nos imprimira el total de la cuenta anterior nivel 1
          $controlador_level1 = false;
        ?>
      
    <?php elseif($account->level == 2 && ($level >= 2)): ?>
      <?php if($controlador_level2 == false): ?>
          <?php if(isset($description4)): ?>
            <tr>
              <th style="text-align: left; font-weight: normal; width: 58%; border-color: white; font-weight: bold; padding-left: 20px;">Total <?php echo e($description4); ?> : </th>
              <th style="text-align: right; font-weight: normal; width: 21%; border-color: white; font-weight: bold;"><?php echo e(number_format($total_level4, 2, ',', '.')); ?></th>
              <th style="text-align: center; font-weight: normal; width: 21%; border-color: white; font-weight: bold;"></th>
            </tr> 
            <?php 
              $controlador_level4 = true;
            ?>
          <?php endif; ?>
          <?php if(isset($description3)): ?>
          <tr>
            <th style="text-align: left; font-weight: normal; width: 58%; border-color: white; font-weight: bold; padding-left: 20px;">Total <?php echo e($description3); ?> : </th>
            <th style="text-align: right; font-weight: normal; width: 21%; border-color: white; font-weight: bold;"><?php echo e(number_format($total_level3, 2, ',', '.')); ?></th>
            <th style="text-align: center; font-weight: normal; width: 21%; border-color: white; font-weight: bold;"></th>
          </tr> 
          <?php 
            $controlador_level3 = true;
          ?>
          <?php endif; ?>
          <?php if(isset($description2)): ?>
          <tr>
            <th style="text-align: left; font-weight: normal; width: 58%; border-color: white; font-weight: bold; padding-left: 20px;">Total <?php echo e($description2); ?> : </th>
            <th style="text-align: right; font-weight: normal; width: 21%; border-color: white; font-weight: bold;"><?php echo e(number_format($total_level2, 2, ',', '.')); ?></th>
            <th style="text-align: center; font-weight: normal; width: 21%; border-color: white; font-weight: bold;"></th>
          </tr> 
          <?php endif; ?>
      <?php endif; ?>
      <tr>
        <th style="text-align: left; font-weight: normal; width: 58%; border-color: white; font-weight: bold; padding-left: 20px;"><?php echo e($account->description); ?></th>
        <th style="text-align: left; font-weight: normal; width: 21%; border-color: white; font-weight: bold; padding-left: 20px;"></th>
        <th style="text-align: left; font-weight: normal; width: 21%; border-color: white; font-weight: bold; padding-left: 20px;"></th>
      </tr> 
      <?php 
          $description2 = $account->description;
          $total_level2 = $account->balance_previus + $account->debe - $account->haber;
        //si vuelve a encontrar otra cuenta nivel 1, nos imprimira el total de la cuenta anterior nivel 1
          $controlador_level2 = false;
        ?>
    <?php elseif($account->level == 3 && ($level >= 3)): ?>
      <?php if($controlador_level3 == false): ?>
          <?php if(isset($description4)): ?>
            <tr>
              <th style="text-align: left; font-weight: normal; width: 58%; border-color: white; font-weight: bold; padding-left: 20px;">Total <?php echo e($description4); ?> : </th>
              <th style="text-align: right; font-weight: normal; width: 21%; border-color: white; font-weight: bold;"><?php echo e(number_format($total_level4, 2, ',', '.')); ?></th>
              <th style="text-align: center; font-weight: normal; width: 21%; border-color: white; font-weight: bold;"></th>
            </tr> 
            <?php 
              $controlador_level4 = true;
            ?>
          <?php endif; ?>
          <?php if(isset($description3)): ?>
          <tr>
            <th style="text-align: left; font-weight: normal; width: 58%; border-color: white; font-weight: bold; padding-left: 40px;">Total <?php echo e($description3); ?> : </th>
            <th style="text-align: right; font-weight: normal; width: 21%; border-color: white; font-weight: bold;"><?php echo e(number_format($total_level3, 2, ',', '.')); ?></th>
            <th style="text-align: center; font-weight: normal; width: 21%; border-color: white; font-weight: bold;"></th>

          </tr> 
          <?php endif; ?>
      <?php endif; ?>
        <tr>
          <th style="text-align: left; font-weight: normal; width: 58%; border-color: white; font-weight: bold; padding-left: 40px;"><?php echo e($account->description); ?></th>
          <th style="text-align: left; font-weight: normal; width: 21%; border-color: white; font-weight: bold; padding-left: 40px;"></th>
          <th style="text-align: left; font-weight: normal; width: 21%; border-color: white; font-weight: bold; padding-left: 40px;"></th>
        </tr> 
        
      <?php 
          $description3 = $account->description;
          $total_level3 = $account->balance_previus + $account->debe - $account->haber;
        //si vuelve a encontrar otra cuenta nivel 1, nos imprimira el total de la cuenta anterior nivel 1
          $controlador_level3 = false;
        ?>
      <?php elseif($account->level == 4 && ($level >= 4)): ?>
      <?php if($controlador_level4 == false): ?>
          <?php if(isset($description4)): ?>
          <tr>
            <th style="text-align: left; font-weight: normal; width: 58%; border-color: white; font-weight: bold; padding-left: 40px;">Total <?php echo e($description4); ?> : </th>
            <th style="text-align: right; font-weight: normal; width: 21%; border-color: white; font-weight: bold;"><?php echo e(number_format($total_level4, 2, ',', '.')); ?></th>
            <th style="text-align: center; font-weight: normal; width: 21%; border-color: white; font-weight: bold;"></th>

          </tr> 
          <?php endif; ?>
      <?php endif; ?>
        <tr>
          <th style="text-align: left; font-weight: normal; width: 58%; border-color: white; font-weight: bold; padding-left: 40px;"><?php echo e($account->description); ?></th>
          <th style="text-align: left; font-weight: normal; width: 21%; border-color: white; font-weight: bold; padding-left: 40px;"></th>
          <th style="text-align: left; font-weight: normal; width: 21%; border-color: white; font-weight: bold; padding-left: 40px;"></th>
        </tr> 
        
      <?php 
          $description4 = $account->description;
          $total_level4 = $account->balance_previus + $account->debe - $account->haber;
        //si vuelve a encontrar otra cuenta nivel 1, nos imprimira el total de la cuenta anterior nivel 1
          $controlador_level4 = false;
        ?>
      <?php elseif($level == 5): ?>
        <?php 
          $total_level5 = $account->balance_previus + $account->debe - $account->haber;
        ?>
        <tr>
          <th style="text-align: left; font-weight: normal; width: 58%; border-color: white; padding-left: 60px;"><?php echo e($account->description); ?></th>
          <th style="text-align: right; font-weight: normal; width: 21%; border-color: white; "><?php echo e(number_format($total_level5, 2, ',', '.')); ?></th>
          <th style="text-align: left; font-weight: normal; width: 21%; border-color: white; "></th>
        </tr> 
      <?php endif; ?>
    <?php endif; ?>
  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  <!-- Imprimir los ultimos totales -->
  <?php if(isset($description4)): ?>
  <tr>
    <th style="text-align: left; font-weight: normal; width: 58%; border-color: white; font-weight: bold; padding-left: 20px;">Total <?php echo e($description4); ?> : </th>
    <th style="text-align: right; font-weight: normal; width: 21%; border-color: white; font-weight: bold;"><?php echo e(number_format($total_level4, 2, ',', '.')); ?></th>
    <th style="text-align: center; font-weight: normal; width: 21%; border-color: white; font-weight: bold;"></th>
  </tr> 
  <?php endif; ?>
  <?php if(isset($description3)): ?>
  <tr>
    <th style="text-align: left; font-weight: normal; width: 58%; border-color: white; font-weight: bold; padding-left: 20px;">Total <?php echo e($description3); ?> : </th>
    <th style="text-align: right; font-weight: normal; width: 21%; border-color: white; font-weight: bold;"><?php echo e(number_format($total_level3, 2, ',', '.')); ?></th>
    <th style="text-align: center; font-weight: normal; width: 21%; border-color: white; font-weight: bold;"></th>
  </tr> 
  <?php endif; ?>
  <?php if(isset($description2)): ?>
  <tr>
    <th style="text-align: left; font-weight: normal; width: 58%; border-color: white; font-weight: bold; ">Total <?php echo e($description2); ?> : </th>
    <th style="text-align: right; font-weight: normal; width: 21%; border-color: white; font-weight: bold;"><?php echo e(number_format($total_level2, 2, ',', '.')); ?></th>
    <th style="text-align: center; font-weight: normal; width: 21%; border-color: white; font-weight: bold;"></th>
  </tr> 
  <?php endif; ?>
  <tr>
    <th style="text-align: left; font-weight: normal; width: 58%; border-left-color: white; border-right-color: white; background:rgb(171, 224, 255); font-weight: bold; ">Total <?php echo e($description); ?> : </th>
    <th style="text-align: right; font-weight: normal; width: 21%; border-color: white; font-weight: bold;"><?php echo e(number_format($total_level1, 2, ',', '.')); ?></th>
    <th style="text-align: center; font-weight: normal; width: 21%; border-color: white; font-weight: bold;"></th>
  </tr> 
</table>

<br><br>
<table style="width: 79%;">
  <tr>
    <th style="text-align: left; font-weight: normal; width: 29%; border-color: white; font-weight: bold;background-color: #FFCCFD;">UTILIDAD DE OPERACIÓN:</th>
    <th style="text-align: right; font-weight: normal; width: 50%; border-color: white; font-weight: bold; background-color: #FFCCFD;"><?php echo e(number_format(($utilidad ?? 0) + ($islr ?? 0), 2, ',', '.') ?? ''); ?></th>
  </tr> 
  <tr>
      <td style="text-align: left; font-weight: normal; width: 58%; border-color: white; font-weight: bold;"></td>
  </tr>   
  <tr>
    <td style="text-align: left; font-weight: normal; width: 29%; border-color: white; font-weight: bold;background-color: #FFCCFD">IMPUESTO SOBRE LA RENTA: </td>
    <td style="text-align: right; font-weight: normal; width: 50%; border-color: white; font-weight: bold;background-color: #FFCCFD"><?php echo e(number_format(($islr ?? 0), 2, ',', '.') ?? ''); ?></td>
  </tr> 
  <tr>
      <td style="text-align: center; font-weight: normal; width: 58%; border-color: white; font-weight: bold;"></td>
  </tr>   
  <tr>
    <td style="text-align: left; font-weight: normal; width: 29%; border-color: white; font-weight: bold;background-color: #FFCCFD">RESULTADO DEL EJERCICIO:</td>
    <td style="text-align: right; font-weight: normal; width: 50%; border-color: white; font-weight: bold;background-color: #FFCCFD"><?php echo e(number_format((($utilidad ?? 0)), 2, ',', '.') ?? ''); ?></td>
  </tr> 
</table>

</body>
</html>
<?php /**PATH C:\xampp\htdocs\aryasoftware\resources\views/admin/reports/ingresos_egresos.blade.php ENDPATH**/ ?>