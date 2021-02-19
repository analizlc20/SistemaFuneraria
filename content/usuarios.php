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
    <title>Usuarios Funeraria</title>
    <link rel="stylesheet" href="styles.css">
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
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
                    <p><img class="img" src="img/usuario.svg" alt="personal profile">Usuarios</p>
                </div>
                <!-- <div class="buscar">
                    <h5 class="h5">Buscar:</h5>
                        <form class="rb">
                            <label for="nombre">Ingrese nombre:</label><br>
                            <input class="input" type="text" placeholder="Ingrese Nombre" id="user">
                            
                        </form>  
                </div> -->
                
                <table id="tablita" class="table-personal">
                    <thead>
                        <tr class="information_dead">
                            
                            <!-- <th style="width: 120px;">Id</th> -->
                            <th style="width: 120px;">Nombres</th>
                            <th style="width: 150px;">Apellidos</th>
                            <th style="width: 170px;">Usuario</th>
                            <th style="width: 160px;">Tipo_Usuario</th>
                            <th style="width: 70px;">Editar</th>
                            <th style="width: 70px;">Eliminar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="information_dead"></tr>                        
                    </tbody>                    
                </table>
                
                <div>
                    <h5 class="h5">Opción:</h5><br>
                    <form class="rb">
                        <label id="nuevo" for="btn-modal" class="añadir__personal">AÑADIR USUARIO</label><br>
                    </form>
                </div>
                <div class="button-nuevoPersonal">
                    <input type="checkbox" id="btn-modal">
                    <div class="modal">
                        <div class="contenedor contenedor--usuario">
                            <p class="p1">NUEVO USUARIO</p><br> 
                            <input style="display: none;" type="text" id="idusuario"><br>
                            <label class="name_personal" for="name"><b>Tipo Usuario:</b> </label><br>
                                <select id="tipoUsu" class="select">
                                    <option value="">Seleccionar</option>
                                  </select><br><br>
                                  
                            <label class="name_personal" for="name">Nombres:</label>
                            <input class="input" type="text" placeholder="Ingrese Nombres" id="nombresUsu">
                            <label class="name_personal" for="name">Apellidos:</label>
                            <input class="input" type="text" placeholder="Ingrese Apellidos" id="apellidosUsu">
                            <label class="name_personal" for="name">Usuario:</label>
                            <input class="input" type="text" placeholder="Ingrese Dirección" id="loginUsu">
                            <label class="name_personal" for="name">Clave:</label>
                            <input class="input" type="password" placeholder="Ingrese clave" id="claveUsu" maxlength="8">
                                           
                            <input id="guardar" class="guardar" type="submit" value="Registrar">
                            <input id="actualizar" class="guardar guardar--actualizar" type="submit" value="Actualizar">

                            <label for="btn-modal" class="guardar">Cancelar</label><br>
                            
                            
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

<script src="../js/jquery-3.2.1.min.js" ></script>
<script>


/* REGISTRAR USUARIO */
$('#guardar').click(function(){
        var json = {
            'idTipoUsuario':$('#tipoUsu').val(),
            'nombresUsu':$('#nombresUsu').val(),
            'apellidosUsu':$('#apellidosUsu').val(),
            'loginUsuario':$('#loginUsu').val(),
            'claveUsuario':$('#claveUsu').val(),
        }
        $.ajax({
            method:"POST",
            data: json,
            url : 'http://localhost/funeral/public/api/usuario/agregar',
            success:function(r){
                            alert("Usuario Registrado");
                            clear();
                               
                }
                
        });
    });

/* CARGAR LISTADO DE USUARIOS EN LA TABLA */

$(document).ready(function(){
        load();
        loadTipo();
    });
    function load(){
        $.ajax({
            method:"GET",
            url : 'http://localhost/funeral/public/api/usuario',
            success:function(data){
                $('#tablita > tbody').empty();
                //Convertir JSON a Array
                let datos = JSON.parse(data)
                //Recorrer Cada Item del JSON
                for (let item of datos) {
                add(item);
                }

            }            
        });
    }
    function add(item){
    $('#tablita > tbody').append('<tr class="information_dead"><td style="width: 120px;">'+item.nombresUsu+'</td><td style="width: 150px;">'+item.apellidosUsu+'</td><td style="width: 170px;">'+item.loginUsuario+'</td><td style="width: 160px;">'+item.Descripcion+'</td><td style="width: 70px;"><label for="btn-modal" id="'+item.idusuario+'" class="editar edit">Editar</label></td><td style="width: 70px;"><a id="'+item.idusuario+'" class="eliminar delete">Eliminar</a></td></tr>');
    }

/* CARGAR LOS TIPOS DE USUARIOS */
    function loadTipo(){ 
        $.ajax(
        {
            //Llamado a WebServies
            'url': 'http://localhost/funeral/public/api/tipoUsuario',
            'success': function (data) {
            $('#tipoUsu').empty();
            //Convertir JSON a Array
            let datos = JSON.parse(data)
            //Recorrer Cada Item del JSON
            for (let item of datos) {
                addTipo(item);
            }
            }
        });
    }
  
    function addTipo(item){
        $('#tipoUsu').append('<option value="'+ item.idTipoUsuario +'">'+ item.Descripcion +'</option>');
    }
    /* EVENTO CLICK PARA EDITAR USUARIO */

    $(document).on('click', '.edit', function () {
                var id = $(this).attr('id');
                try {
                $.ajax({
                    //Url para Recurso Particular
                    'url': 'http://localhost/funeral/public/api/usuario/'+id,
                    'success': function (data) {
                    //Convertir JSON a Array
                    let datos = JSON.parse(data)
                    //Cargar Datos a Inputs
                    loadInput(datos);
                    $('#guardar').hide();
                    }
                });
                } catch (error) {
                    alert('Error');
                }
    });
    /* FUNCION PARA CARGAR DATOS EN INPUTS */

    function loadInput(datos) {
        //Acceder a la primera posciion del JSON 
        datos = datos[0];
        $('#idusuario').val(datos.idusuario);
        $('#tipoUsu').val(datos.idTipoUsuario);
        $('#nombresUsu').val(datos.nombresUsu);
        $('#apellidosUsu').val(datos.apellidosUsu);
        $('#loginUsu').val(datos.loginUsuario);
        $('#claveUsu').val(datos.claveUsuario);

    }
     /* ACTUALIZAR USUARIO*/

     $('#actualizar').click(function() {
        var id = $('#idusuario').val();
        var newJSON ={
        'idTipoUsuario': $.trim($('#tipoUsu').val()),
        'nombresUsu': $.trim($('#nombresUsu').val()),
        'apellidosUsu': $.trim($('#apellidosUsu').val()),
        'loginUsuario': $.trim($('#loginUsu').val()),
        'claveUsuario': $.trim($('#claveUsu').val()),
        }
        
        try {
        $.ajax({
            'url': 'http://localhost/funeral/public/api/usuario/actualizar/'+id,
            'method': 'PUT',
            'data':newJSON,
            'success': function (data) {
            alert('Usuario Actualizado'); 
            load();
            clear();
            window.location.href='http://localhost/funeral/content/usuarios.html'           
            }
        });
        
        } catch (error) {
            alert('Algo no salió bien');
        }
    });
    /* EVENTO CLICK PARA ELIMINAR (ICONS) */

    $(document).on('click', '.delete', function () {
        
                var id = $(this).attr('id');

                try {
                $.ajax({
                    //Url para Recurso Particular
                    'url': 'http://localhost/funeral/public/api/usuario/eliminar/'+id,
                    'method': 'DELETE',
                    'success': function (data) {
                    alert('Usuario Eliminado'); 
                    load();
                    }

                });
                
                } catch (error) {
                    alert("Algo no salió bien");
                }
    });
    /* LIMPIAR CAMPOS */

    function clear() {

        $('#nombresUsu').val("");
        $('#apellidosUsu').val("");
        $('#loginUsu').val("");
        $('#claveUsu').val("");
    }
    $('#nuevo').click(function(){
        $('#actualizar').hide();
    });
</script>