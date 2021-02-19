<?php
session_start();
if (empty($_SESSION)) {
  header("location: login2.php");
} else {
  $username_user =  $_SESSION['usuario_logeado'];
  $name_user =  $_SESSION['usuario_nombre'];
  $apellido_user = $_SESSION['usuario_apellido'];
  $tipo_user =  $_SESSION['usuario_descripcion'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Servicios Funeraria</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header class="header2">
        <p class="title">S i s t e m a - d e - V e n t a s</p> 
    </header>
    <main>
    <?php include('menu.php') ?>
        <div class="portada2">
            <img class="portada-principal" src="img/portada4.jpg" alt="portada profile">
            <div class="form-personal">
                <div class="personal-header">
                    <p><img class="img" src="img/servicios.svg" alt="producto profile">Servicios</p>
                </div>
                <table class="table-personal">
                    <thead>
                        <tr class="information_dead">
                            <th style="width: 170px;">Tipo Servicio</th>
                            <th style="width: 380px;">Descripción</th>
                            <th style="width: 150px;">Precio</th>
                            <th style="width: 95px;">Editar</th>
                            <th style="width: 95px;">Eliminar</th>
                            <th style="width: 100px;">Estado</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="information_dead">
                            <td style="width: 170px;">Categoría 1</td>
                            <td style="width: 380px;">-Ataúd de cedro, redondo (lincon)<br>
                                                      -Carroza Presidencial marca Chevrolet<br>
                                                      -Coche de flores marca Pejot<br>
                                                      -Capilla iluminada </td>
                            <td style="width: 150px;">S/.5000</td>
                            <td style="width: 95px;"><a class="editar" href="">Editar</a>  
                            <td style="width: 95px;"><a class="eliminar" href="">Eliminar</a>
                            <td style="width: 100px;"><a class="estado" href="">Disponible</a>
                                
                        </tr>
                        
                    </tbody>           
                    
                </table>
                <div">
                    <h5 class="h5">Opción:</h5><br>
                    <form class="rb">
                        <label for="btn-modal" class="añadir__personal">AÑADIR SERVICIO</label><br>
                    </form>
                </div>
                <div class="button-nuevoPersonal">
                    
                    <input type="checkbox" id="btn-modal">
                    <div class="modal">
                        <div class="servicios">
                            <p class="p1">NUEVO SERVICIO</p><br>
                            <div class="box1"> 
                                <label class="name_personal" for="name">Tipo Servicio:</label>
                                <input class="input" type="text" placeholder="Ingrese Tipo Servicio" id="tipoSer" required="obligatorio">
                                
                                <label class="name_personal" for="name">Precio:</label>
                                <input class="input" type="text" placeholder="Ingrese Precio" id="precioS" required="obligatorio">
                                <label class="name_personal" for="name">Categoría:</label>
                                  <select id="categoriaSer" class="select" name="select">
                                      <option value="">Seleccionar</option>
                                      
                                    </select>
                                <label class="name_personal" for="name">Producto:</label>
                                  <select id="productoSer" class="select" name="select">
                                      <option value="">Seleccionar</option>
                                      
                                    </select><br>
                                <!-- <label class="name_personal" for="name">Precio:</label>
                                <input class="input" type="text" placeholder="Ingrese Precio" id="user" required="obligatorio"> -->
                                <input class="guardar guardar--cerrar3" type="submit" value="Agregar"><br>

                                <input class="registrar registrar--2" type="submit" value="Guardar">
                                <label for="btn-modal" class="button-cerrar button-cerrar--2">Cancelar</label><br>
                            </div>
                            <div class="box2"><br><br>
                                <table class="table-compras">
                                    <thead>
                                        <tr>
                                            <th style="width: 120px;">Nombre Servicio</th>
                                            <th style="width: 130px;">Producto</th>
                                            <th style="width: 60px;">Opcion</th>                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td style="width: 120px;">Categoria 1</td>
                                            <td style="width: 130px;">Ataúd de Madera</td>
                                            <td style="width: 60px;"><a class="eliminar" href="">Eliminar</a></td>                                            
                                        </tr>       
                                    </tbody>                                    
                                </table>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <footer class="footer">
    Tipo Usuario: <?php echo '  '. $tipo_user; ?>
    </footer>
</body>
</html>