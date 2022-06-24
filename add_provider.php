<?php
  $page_title = 'Agregar proveedor';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
  page_require_level(1);

?>
<?php
 if(isset($_POST['add_provider'])){
   $req_fields = array('provider-name','provider-phone','provider-address' );
   validate_fields($req_fields);
   if(empty($errors)){
     $pr_name  = remove_junk($db->escape($_POST['provider-name']));
     $pr_phone   = remove_junk($db->escape($_POST['provider-phone']));
     $pr_address   = remove_junk($db->escape($_POST['provider-address']));
     
     $query  = "INSERT INTO providers (";
     $query .=" name,phone,address";
     $query .=") VALUES (";
     $query .=" '{$pr_name}', '{$pr_phone}', '{$pr_address}'";
     $query .=")";
     $query .=" ON DUPLICATE KEY UPDATE name='{$pr_name}'";
     if($db->query($query)){
       $session->msg('s',"Proveedor agregado exitosamente. ");
       redirect('add_provider.php', false);
     } else {
       $session->msg('d',' Lo siento, registro falló.');
       redirect('providers.php', false);
     }

   } else{
     $session->msg("d", $errors);
     redirect('add_provider.php',false);
   }

 }

?>
<?php include_once('layouts/header.php'); ?>
<div class="row">
  <div class="col-md-12">
    <?php echo display_msg($msg); ?>
  </div>
</div>
  <div class="row">
  <div class="col-md-9">
      <div class="panel panel-default">
        <div class="panel-heading">
          <strong>
            <span class="glyphicon glyphicon-th"></span>
            <span>Agregar proveedor</span>
         </strong>
        </div>
        <div class="panel-body">
         <div class="col-md-12">
          <form method="post" action="add_provider.php" class="clearfix">
              <div class="form-group">
                <div class="input-group">
                  <span class="input-group-addon">
                   <i class="glyphicon glyphicon-th-large"></i>
                  </span>
                  <input type="text" class="form-control" name="provider-name" placeholder="Nombre Proveedor">
               </div>
              </div>             
              <div class="form-group">
              <div class="form-group">
               <div class="row">
                 <div class="col-md-8">
                   <div class="input-group">
                     <span class="input-group-addon">
                      <i class="glyphicon glyphicon-earphone"></i>
                     </span>
                     <input type="number" class="form-control" name="provider-phone" placeholder="Telefono">
                  </div>
                 </div>
                 <div>
                <br><br><br> 
                 <div class="col-md-8">
                   <div class="input-group">
                     <span class="input-group-addon">
                       <i class="glyphicon glyphicon-home"></i>
                     </span>
                     <input type="text" class="form-control" name="provider-address" placeholder="Direccion">
                  </div>
                 </div>

               </div>
              
              </div>
              <br>
              <button type="submit" name="add_provider" class="btn btn-success">Agregar proveedor</button>
          </form>
         </div>
        </div>
      </div>
    </div>
  </div>

<?php include_once('layouts/footer.php'); ?>
