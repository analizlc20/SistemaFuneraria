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
    <title>Clientes Funeraria</title>
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
                    <p><img class="img" src="img/cliente.svg" alt="personal profile">Clientes</p>
                </div>
                <!-- <div class="buscar">
                    <h5 class="h5">Buscar por:</h5>
                        <form class="rb">
                            <input class="radio-button" type="radio" id="dni" name="gender" value="Dni">
                            <label for="dni">Dni</label><br>
                            <input class="radio-button" type="radio" id="dni" name="gender" value="Nombre">
                            <label for="nombre">Nombres</label>
                        </form>  
                </div> -->
                
                <table id="tablita" class="table-personal">
                    <thead>
                        <tr class="information_dead">
                            
                            <th style="width: 120px;">Nro Dni</th>
                            <th style="width: 120px;">Nombres</th>
                            <th style="width: 100px;">Apellidos</th>
                            <th style="width: 90px;">Parentesco</th>
                            <th style="width: 170px;">Dirección</th>
                            <th style="width: 100px;">Teléfono</th>
                            <th style="width: 170px;">E-mail</th>
                            <th style="width: 62px;">Editar</th>
                            <th style="width: 69px;">Eliminar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="information_dead">
                           
                        </tr>
                        
                    </tbody>
                    
                </table>
                
                <div>
                    <h5 class="h5">Opción:</h5><br>
                    <form class="rb">
                        <label id="nuevo" for="btn-modal" class="añadir__personal">AÑADIR CLIENTE</label><br>
                    </form>
                </div>
                <div class="button-nuevoPersonal">
                    <input type="checkbox" id="btn-modal">
                    <div class="modal">
                        <form class="contenedor">
                            <p class="p1">NUEVO CLIENTE</p><br> 
                            
                            <label class="name_personal">Nro Dni:</label>
                            <input class="input" type="text" placeholder="Ingrese Número" name="numero" id="dniCli" onkeypress="return solonumeros(event)" maxlength="8">
                            <label class="name_personal">Nombres:</label>
                            <input class="input" type="text" placeholder="Ingrese Nombres" name="nombre" id="nombresCli">
                            <label class="name_personal">Apellidos:</label>
                            <input class="input" type="text" placeholder="Ingrese Apellidos" name="apellidos" id="apellidosCli">
                            <label class="name_personal">Dirección:</label>
                            <input class="input" type="text" placeholder="Ingrese Dirección" name="direccion" id="direccionCli">
                            <label class="name_personal">Teléfono:</label>
                            <input class="input" type="text" placeholder="Ingrese teléfono" name="telefono" id="telefonoCli" onkeypress="return solonumeros(event)" maxlength="9">
                            <label class="name_personal">E-mail:</label>
                            <input class="input" type="email" placeholder="Ingrese E-mail" name="email" id="emailCli"><br>
                            <label class="name_personal">Parentesco:</label><br>
                                  <select id="parentesco" name="parentesco" class="select" name="select">
                                      <option value="">Seleccionar</option>
                                      
                                    </select><br>

                            <input id="guardar" class="guardar" type="submit" value="Guardar">
                            <input id="actualizar" class="guardar guardar--actualizar" type="submit" value="Actualizar">
                            <label for="btn-modal" class="guardar guardar--cerrar5">Cancelar</label><br>
                            <!-- <input class="guardar" type="submit" value="Cerrar"> -->
                        </form>
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
    function solonumeros(e){
        key=e.keyCode || e.which;
        teclado=String.fromCharCode(key);
        numeros="0123456789";
        especiales="8-37-38-46";
        teclado_especial=false;

        for( var i in especiales){
            if(key == especiales[i]){
                teclado_especial=true;
            }
        }
        if(numeros.indexOf(teclado)==-1 && !teclado_especial){
            return false;
        }
    }
</script>
<script>

    /* REGISTRAR CLIENTE */

    $('#guardar').click(function(){
        expresion= /\w+@\w+\.+[a-z]/;
        if($('#dniCli').val() == '' ||$('#nombresCli').val()  == '' ||$('#apellidosCli').val()  == '' || $('#direccionCli').val()  == ''|| $('#telefonoCli').val()  == ''|| $('#emailCli').val()  == '' ){
        alert("Todos los campos son obligatorios");
        return false;
    }
        if(!expresion.test($('#emailCli').val()))
        {
            alert("El correo no es válido");
        return false;
        }
            var json = {
                'dniCliente':$('#dniCli').val(),
                'nombresC':$('#nombresCli').val(),
                'apellidosC':$('#apellidosCli').val(),
                'idParentesco':$('#parentesco').val(),
                'direccionC':$('#direccionCli').val(),
                'telefonoC':$('#telefonoCli').val(),
                'emailC':$('#emailCli').val(),
            }
            console.log(json);
            console.log($('#emailCli').val());
            $.ajax({
                method: "POST",
                data: json,
                url : 'http://localhost/funeral/public/api/cliente/agregar',
                success:function(r){
                            alert("Cliente Registrado");
                            clear();

                }       
            });
        });
/* CARGAR LISTADO DE CLIENTES EN LA TABLA */

$(document).ready(function(){
        load();
        loadTipo();
    });
    function load(){
        $.ajax({
            method:"GET",
            url : 'http://localhost/funeral/public/api/cliente',
            success:function(data){
                $('#tablita > tbody').empty();
                //Convertir JSON a Array
                let datos = JSON.parse(data)
                //Recorrer Cada Item del JSON
                for (let item of datos) {
                add(item);
                }
                console.log(datos);
            }         
              
        });
    }
    function add(item){
$('#tablita > tbody').append('<tr class="information_dead"><td style="width: 120px;">'+item.dniCliente+'</td><td style="width: 120px;">'+item.nombresC+'</td><td style="width: 100px;">'+item.apellidosC+'</td><td style="width: 90px;">'+item.descripcionParen+'</td><td style="width: 170px;">'+item.direccionC+'</td><td style="width: 100px;">'+item.telefonoC+'</td><td style="width: 170px;">'+item.emailC+'</td><td style="width: 62px;"><label for="btn-modal" id="'+item.dniCliente+'" class="editar edit">Editar</label></td><td style="width: 69px;"><a id="'+item.dniCliente+'" class="eliminar delete">Eliminar</a></td></tr>');
    }
/* CARGAR PARENTESCO */
function loadTipo(){ 
        $.ajax(
        {
            //Llamado a WebServies
            'url': 'http://localhost/funeral/public/api/parentesco',
            'success': function (data) {
            $('#parentesco').empty();
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
        $('#parentesco').append('<option value="'+ item.idParentesco +'">'+ item.descripcionParen +'</option>');
    }
    /* EVENTO CLICK PARA EDITAR CLIENTE */

    $(document).on('click', '.edit', function () {
                var id = $(this).attr('id');
                try {
                $.ajax({
                    //Url para Recurso Particular
                    
                    'url': 'http://localhost/funeral/public/api/cliente/'+id,
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
        $('#dniCli').val(datos.dniCliente);
        $('#nombresCli').val(datos.nombresC);
        $('#apellidosCli').val(datos.apellidosC);
        $('#direccionCli').val(datos.direccionC);
        $('#telefonoCli').val(datos.telefonoC);
        $('#emailCli').val(datos.emailC);
        $('#parentesco').val(datos.idParentesco);


    }
    
    /* ACTUALIZAR CLIENTE*/

    $('#actualizar').click(function() {
        var id = $('#dniCli').val();
        var newJSON ={

        'nombresC': $.trim($('#nombresCli').val()),
        'apellidosC': $.trim($('#apellidosCli').val()),
        'direccionC': $.trim($('#direccionCli').val()),
        'telefonoC': $.trim($('#telefonoCli').val()),
        'emailC': $.trim($('#emailCli').val()),
        'parentesco': $.trim($('#parentesco').val()),

        }

        try {
        $.ajax({
            'url': 'http://localhost/funeral/public/api/cliente/actualizar/'+id,
            'method': 'PUT',
            'data':newJSON,
            'success': function (data){
            /* Editado() */
            alert('Cliente Modificado');
            /* swal("Proveedor modificado!", "You clicked the button!", "success"); */
            load();
/*             clear(); */
            window.location.href='http://localhost/funeral/content/clientes.html'
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
                    'url': 'http://localhost/funeral/public/api/cliente/eliminar/'+id,
                    'method': 'DELETE',
                    'success': function (data) {

                    alert('Cliente Eliminado'); 
                    load();
                    }
                });
                } catch (error) {
                    alert("Algo no salió bien");
                }
    });
    /* LIMPIAR CAMPOS */

    function clear() {
        $('#dniCli').val("");
        $('#nombresCli').val("");
        $('#apellidosCli').val("");
        $('#direccionCli').val("");
        $('#telefonoCli').val("");
        $('#emailCli').val("");
    }
    $('#nuevo').click(function(){
        $('#actualizar').hide();
    });
</script>