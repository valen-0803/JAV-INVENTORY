<?php
  $page_title = 'Lista de proveedores';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(1);
  $all_providers = find_all('providers');
?>
<?php include_once('layouts/header.php'); ?>
<div class="row">
   <div class="col-md-12">
     <?php echo display_msg($msg); ?>
   </div>
</div>
<div class="row">
  <div class="col-md-12">
    <div class="panel panel-default">
    <div class="panel-heading clearfix">
      <strong>
        <span class="glyphicon glyphicon-th"></span>
        <span>Proveedores</span>
     </strong>
       <a href="add_provider.php" class="btn btn-info pull-right btn-sm"> Agregar proveedor</a>
    </div>
     <div class="panel-body">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th class="text-center" style="width: 50px;">#</th>
            <th>Nombre del Proveedor</th>
            <th class="text-center" style="width: 20%;">Direccion</th>
            <th class="text-center" style="width: 15%;">Telefono</th>
            <th class="text-center" style="width: 100px;">Acciones</th>
          </tr>
        </thead>
        <tbody>
        <?php foreach($all_providers as $a_prov): ?>
          <tr>
           <td class="text-center"><?php echo count_id();?></td>
           <td><?php echo remove_junk(ucwords($a_prov['name']))?></td>
           <td class="text-center">
             <?php echo remove_junk(ucwords($a_prov['address']))?>
           </td>
           <td class="text-center">
             <?php echo remove_junk(ucwords($a_prov['phone']))?>
           </td>
           <td class="text-center">
             <div class="btn-group">
                <a href="edit_provider.php?id=<?php echo (int)$a_prov['id'];?>" class="btn btn-xs btn-warning" data-toggle="tooltip" title="Editar">
                  <i class="glyphicon glyphicon-pencil"></i>
               </a>
                <a href="delete_provider.php?id=<?php echo (int)$a_prov['id'];?>" class="btn btn-xs btn-danger" data-toggle="tooltip" title="Eliminar">
                  <i class="glyphicon glyphicon-remove"></i>
                </a>
                </div>
           </td>
          </tr>
        <?php endforeach;?>
       </tbody>
     </table>
     </div>
    </div>
  </div>
</div>
  <?php include_once('layouts/footer.php'); ?>
