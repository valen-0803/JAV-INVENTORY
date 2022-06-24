<?php
  $page_title = 'Editar Grupo';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(1);
?>
<?php
  $e_prov = find_by_id('providers',(int)$_GET['id']);
  if(!$e_prov){
    $session->msg("s","Proveedor Actualizado");
    redirect('providers.php');
  }
?>
<?php
  if(isset($_POST['update'])){

   $req_fields = array('provider-name','provider-phone','provider-address');
   validate_fields($req_fields);
   if(empty($errors)){
          $name = remove_junk($db->escape($_POST['provider-name']));
          $phone = remove_junk($db->escape($_POST['provider-phone']));
          $address = remove_junk($db->escape($_POST['provider-address']));

        $query  = "UPDATE providers SET ";
        $query .= "name='{$name}',phone='{$phone}',address='{$address}'";
        $query .= "WHERE ID='{$db->escape($e_prov['id'])}'";
        $result = $db->query($query);
         if($result && $db->affected_rows() === 1){
          //sucess
          $session->msg('s',"El proveedor ha sido actualizado! ");
          redirect('edit_provider.php?id='.(int)$e_group['id'], false);
        } else {
          //failed
          $session->msg('d','No fue posible actualizar el proveedor!');
          redirect('edit_provider.php?id='.(int)$e_prov['id'], false);
        }
   } else {
     $session->msg("d", $errors);
    redirect('edit_provider.php?id='.(int)$e_prov['id'], false);
   }
 }
?>
<?php include_once('layouts/header.php'); ?>
<div class="login-page">
    <div class="text-center">
       <h3>Editar Proveedor</h3>
     </div>
     <?php echo display_msg($msg); ?>
      <form method="post" action="edit_provider.php?id=<?php echo (int)$e_prov['id'];?>" class="clearfix">
        <div class="form-group">
              <label for="name" class="control-label">Nombre del proveedor</label>
              <input type="name" class="form-control" name="provider-name" value="<?php echo remove_junk(ucwords($e_prov['name'])); ?>">
        </div>
        <div class="form-group">
              <label for="phone" class="control-label">Telefono</label>
              <input type="number" class="form-control" name="provider-phone" value="<?php echo (int)$e_prov['phone']; ?>">
        </div>
        <div class="form-group">
              <label for="address" class="control-label">Direccion</label>
              <input type="text" class="form-control" name="provider-address" value="<?php echo remove_junk(ucwords($e_prov['address'])); ?>">
        </div>
        <div class="form-group clearfix">
                <button type="submit" name="update" class="btn btn-info">Actualizar</button>
        </div>
    </form>
</div>

<?php include_once('layouts/footer.php'); ?>
