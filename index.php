<?php
  ob_start();
  require_once('includes/load.php');
  if($session->isUserLoggedIn(true)) { redirect('home.php', false);}
?>
<?php include_once('layouts/headerindex.php'); ?>
<div class="titulo">
        <img src="img/dotaciones colombia 1.png" alt="">
    </div>
        <main>
            

            <div class="contenedor__todo">
                <div class="caja__trasera">
                    <div class="caja__trasera-login">
                        <h3>¿Ya tienes una cuenta?</h3>
                        <p>Inicia sesión para entrar en la página</p>
                        <button id="btn__iniciar-sesion">Iniciar Sesión</button>
                    </div>
                    <div class="caja__trasera-register">
                        <h3>BIENVENIDO A TU </h3>
                        <h3>CONTROL DE INVENTARIOS</h3>
                        <P></P>
                        <br>
                        <br>
                        <span>Ingresa tus datos para iniciar sesión</span>
                    </div>
                </div>

                <!--Formulario de Login y registro-->
                <div class="contenedor__login-register">
                    <!--Login-->
                    
      <form method="post" action="auth.php" class="clearfix">
        <div class="form-group">
              <label for="username" class="control-label">Usuario</label>
              <input type="name" class="form-control" name="username" placeholder="Usuario">
        </div>
        <div class="form-group">
            <label for="Password" class="control-label">Contraseña</label>
            <input type="password" name= "password" class="form-control" placeholder="Contraseña">
        </div>
        <div class="form-group">
                <button type="submit" class="btn btn-primary mt-25">Ingresar</button>
        </div>
    </form>

                    <!--Register-->
                    
                </div>
            </div>

        </main>

        <script src="js/login.js"></script>



<?php include_once('layouts/footer.php'); ?>
