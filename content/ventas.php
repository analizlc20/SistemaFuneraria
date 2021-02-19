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
    <title>Ventas Funeraria</title>
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
                    <p><img class="img" src="img/ventas.svg" alt="personal profile">Ventas</p>
                </div>
                <div class="buscar">
                    <h5 class="h5">Consultar:</h5>
                        <form class="rb rb--ventas">
                            <label for="fechaIni">Fecha Inicio:</label>
                            <input class="input input--difunto input input--difunto--2" type="date" id="user" required="obligatorio"><br>
                            <label for="fechaFin">Fecha Fin:</label>
                            <input class="input input--difunto input input--difunto--2" type="date" id="user" required="obligatorio">
                            <input class="guardar guardar--consultar" type="submit" value="Consultar">
                        </form>  
                </div>
                <div class="buscar--2">
                    <h5 class="h5">Opción:</h5><br>
                    <form class="rb">
                        <label for="btn-modal" class="añadir__personal">REALIZAR VENTA</label><br>
                    </form>
                </div>
                <table class="table-personal">
                    <thead>
                        <tr class="information_dead">

                            <th style="width: 120px;">Nro_dni</th>
                            <th style="width: 160px;">Cliente</th>
                            <th style="width: 100px;">Tipo_Comp</th>
                            <th style="width: 140px;">Nro_Comp</th>
                            <th style="width: 110px;">Fecha Venta</th>
                            <th style="width: 160px;">(S/.)Total</th>
                            <th style="width: 120px;">Información</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="information_dead">

                            <td style="width: 120px;">71229703</td>
                            <td style="width: 160px;">Ana León Cosanatán</td>
                            <td style="width: 100px;">Boleta</td>
                            <td style="width: 140px;">001-000003</td>
                            <td style="width: 110px;">21/01/2021</td>
                            <td style="width: 160px;">S/.5000</td>
                            <td style="width: 120px;"><a class="editar" href="">Ver Información</a>  
                        </tr>
                        
                    </tbody>
                    
                </table>
                
                <div class="button-nuevoPersonal">
                    <input type="checkbox" id="btn-modal">
                    <div class="modal">
                        <div class="contenedor contenedor--ventas">
                            <p class="p1">REALIZAR VENTAS</p><br> 
                            <div class="box1">
                                <label class="name_personal" for="name"><b>Información de la Venta:</b></label><br>
                                <label class="name_personal" for="name">Dirección velatorio:</label><br>
                                <input class="input input--difunto" type="text" id="user" required="obligatorio"><br>
                                <label class="name_personal" for="name">Cementerio:</label>
                                <input class="input input--difunto" type="text" id="user" required="obligatorio"><br>
                                <label class="name_personal" for="name">Fecha Sepelio:</label>
                                <input class="input input--difunto" type="date" id="user" required="obligatorio"><br>
                                <label class="name_personal" for="name">Hora:</label>
                                <input class="input input--difunto" type="time" id="user" required="obligatorio"><br>
                                <label class="name_personal" for="name"><b>Tipo Servicio:</b> </label><br>
                                <select class="select" name="select">
                                    <option value="value1" selected disabled>Seleccionar</option>
                                    <option value="value2">Categoría 1</option>
                                    <option value="value3">Categoría 2</option>
                                    <option value="value4">Categoría 3</option>
                                  </select><br><br><br>
                            </div>
                            <div class="box2">
                                <label class="name_personal" for="name">Cliente:</label>
                                <input class="input input--difunto" type="text" id="user" required="obligatorio"><a class="buscar_cliente" href="">Buscar</a><br>
                                <label class="name_personal" for="name">Fecha Venta:</label>
                                <input class="input input--difunto" type="date" id="user" required="obligatorio"><br>
                                
                                <input class="guardar guardar--cerrar3" type="submit" value="Agregar"><br>
                                
                                <table class="table-compras">
                                    <thead>
                                        <tr>
                                            <th style="width: 160px;">Servicio</th>                                            
                                            <th style="width: 80px;">Precio</th>
                                            <th style="width: 90px;">Opcion</th>                                                                                        
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td style="width: 160px;">Categoria 1</td>
                                            
                                            <td style="width: 80px;">S/3.000</td>
                                            <td style="width: 90px;"><a class="eliminar" href="">Eliminar</a></td> 
                                        </tr>                                        
                                    </tbody>                                 
                                </table>
                            </div>                                                                            
                            <label for="btn-modal" class="button-cerrar">Cancelar</label><br>
                            <input class="registrar" type="submit" value="Registrar"><br>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <footer class="footer">
    Tipo Usuario: <?php echo '  '. $tipo_user; ?>
    </footer>
</body>
</html>