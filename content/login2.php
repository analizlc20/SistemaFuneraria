<!DOCTYPE html>
<html lang="en">
<?php
session_start();
if (!empty($_SESSION)) {
  header("location: index.php");
} 
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicia Sesion</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <?php include('../php/iniciar_sesion.php') ?>
    <header class="header">
        <img class="portada3" src="img/portada3.jpg" alt="portada1">
        <h1 class="nombre">FUNERARIA <br>"ARIAS"</h1>
    </header>

    <main>
        <div class="main">
            <form action=" <?php htmlspecialchars($_SERVER['PHP_SELF']);?>  "
           id="formlg" class="formulario" method="POST">
           <img class="icono__usuario" src="img/login.svg" alt="Icono usuario"><br><br>
                <div class="tituloL">
                    <label class="" for="Login">LOGIN</label><br>
                </div>
                <label for="user">Usuario</label>
            <input name="f_username" type="text" id="user"
             placeholder="Usuario" value="<?php if(isset($_POST['f_username'])
             && !empty($_POST['f_username'])){echo $_POST['f_username']; } ?>">
             
             <label for="clave">Contraseña</label>
            <input name="f_password" type="password" id="clave" placeholder="Contraseña"
             value="<?php if(isset($_POST['f_password'])
             && !empty($_POST['f_password'])){echo $_POST['f_password']; } ?>">

            <input class="button--sesion" name="btn_click" type="submit" id="ingresar" value="INICIAR SESION">

            <?php if(!empty($errores)): ?>
                  <div style="margin-top:10px; font-size: 13px; border-radius:5px; background:#F44B34; color:white; padding:5px;">
             <?php echo $errores; ?> 
        </div>
        <?php endif; ?>
        </form>

        </div> 
    </main>
</body>
</html>