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
    <title>Compras Funeraria</title>
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
                    <p><img class="img" src="img/compras.svg" alt="personal profile">Compras</p>
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
                        <label for="btn-modal" class="añadir__personal">REALIZAR COMPRA</label><br>
                    </form>
                </div>
                <table class="table-personal">
                    <thead>
                        <tr class="information_dead">
                            <th style="width: 160px;">RUC</th>
                            <th style="width: 320px;">Razón Social</th>
                            <th style="width: 190px;">Comprobante</th>
                            <th style="width: 150px;">Fecha Compra</th>
                            <th style="width: 150px;">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="information_dead">
                            <td style="width: 160px;">00171229703</td>
                            <td style="width: 320px;">Carpintería Don Lucho</td>
                            <td style="width: 190px;">001-000003</td>
                            <td style="width: 150px;">12/03/2021</td>
                            <td style="width: 150px;">S/.2000</td>
                        </tr>
                        
                    </tbody>
                    
                </table>
                
                <div class="button-nuevoPersonal">
                    <input type="checkbox" id="btn-modal">
                    <div class="modal">
                        <div class="contenedor contenedor--ventas">
                            <p class="p1">REALIZAR COMPRAS</p><br> 
                            <div class="box1">
                                <label class="name_personal" for="name"><b>Proveedor:</b></label><br>
                                <label class="name_personal" for="name">Proveedor:</label>
                                <input class="input input--proveedor" type="text" id="user" required="obligatorio"><a class="buscar_cliente" href="">Buscar</a>
                                <label class="name_personal" for="name">Nro Documento:</label>
                                <input class="input input--difunto" type="text" id="user" required="obligatorio"><br>
                                <label class="name_personal" for="name"><b>Tipo Documento:</b> </label><br>
                                <select class="select" name="select">
                                    <option value="value1" selected disabled>Seleccionar</option>
                                    <option value="value2">Boleta</option>
                                    <option value="value3">Factura</option>
                                  </select><br>
                                
                                  <label class="name_personal" for="name"><b>Producto:</b></label><br>
                                <label class="name_personal" for="name">Producto:</label><br>
                                <input class="input input--difunto" type="text" id="user" required="obligatorio"><br>
                                <label class="name_personal" for="name">Cantidad:</label>
                                <input class="input input--cantidad" type="number" id="user" required="obligatorio">
                                <label class="name_personal" for="name">Precio Compra:</label>
                                <input class="input input--precio" type="number" id="user" required="obligatorio">
                                <input class="guardar guardar--cerrar3" type="submit" value="Agregar"><br>
                            </div>
                            <div class="box2">
                                <label class="name_personal" for="name"><b>Comprobante de Pago:</b></label><br>
                                <label class="name_personal" for="name">Serie:</label>
                                <input class="input input--difunto" type="text" id="user" required="obligatorio"><br>
                                <label class="name_personal" for="name">Fecha:</label>
                                <input class= "input input--fecha" type="date" id="user" required="obligatorio">
                                <label class="name_personal" for="name">Hora:</label>
                                <input class="input input--precio" type="time" id="user" required="obligatorio"><br><br>
                                
                                
                                <table class="table-compras">
                                    <thead>
                                        <tr>
                                            <th style="width: 120px;">Producto</th>
                                            <th style="width: 70px;">Cantidad</th>
                                            <th style="width: 80px;">Precio</th>
                                            <th style="width: 60px;">Opcion</th>
                                            
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td style="width: 120px;">Ataúd de Madera</td>
                                            <td style="width: 70px;">3</td>
                                            <td style="width: 80px;">S/3.000</td>
                                            <td style="width: 60px;"><a class="eliminar" href="">Eliminar</a></td>

                                            
                                        </tr>
                                        
                                    </tbody>
                                    
                                </table>
                            </div>    <br><br>                   
                            
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