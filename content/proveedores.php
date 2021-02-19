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
    <title>Proveedores Funeraria</title>
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
                    <p><img class="img" src="img/proveedor.svg" alt="personal profile">Proveedores</p>
                </div>
                <!-- <div class="buscar">
                    <h5 class="h5">Buscar por:</h5>
                        <form class="rb">
                            <input class="radio-button" type="radio" id="dni" name="gender" value="Dni">
                            <label for="dni">Nro RUC</label><br>
                            <input class="radio-button" type="radio" id="dni" name="gender" value="Nombre">
                            <label for="nombre">Razón Social</label>
                        </form>  
                </div> -->
                
                <table id="tablita" class="table-personal">
                    <thead>
                        <tr class="information_dead">
                            <th style="width: 100px;">RUC</th>
                            <th style="width: 220px;">Razón Social</th>
                            <th style="width: 150px;">Representante</th>
                            <th style="width: 100px;">Celular</th>
                            <th style="width: 110px;">Dirección</th>
                            <th style="width: 160px;">E-mail</th>
                            <th style="width: 69px;">Editar</th>
                            <th style="width: 69px;">Eliminar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="information_dead">
                            <!-- <td style="width: 100px;">00171229703</td>
                            <td style="width: 220px;">Carpintería Don Lucho</td>
                            <td style="width: 150px;">Luis Alvitres Carmona</td>
                            <td style="width: 100px;">933791986</td>
                            <td style="width: 110px;">Ayacucho #845</td>
                            <td style="width: 160px;">aleoncosanatan@gmail.com</td>
                            <td style="width: 69px;"><a class="editar" href="">Editar</a>
                            <td style="width: 69px;"><a class="eliminar" href="">Eliminar</a>   -->
                        </tr>
                        
                    </tbody>
                    
                </table>
                
                <div>
                    <h5 class="h5">Opción:</h5><br>
                    <form class="rb">
                        <label id="nuevo" for="btn-modal" class="añadir__personal">NUEVO PROVEEDOR</label><br>
                    </form>
                </div>
                <div class="button-nuevoPersonal">
                    <input type="checkbox" id="btn-modal">
                    <div class="modal">
                        <div class="contenedor contenedor--proveedor">
                            <p class="p1">NUEVO PROVEEDOR</p><br> 
                            <div class="box1">
                                <label class="name_personal" for="name"><b>Datos Proveedor:</b></label><br>
                                <label class="name_personal" for="name">Nombres:</label><br>
                                <input class="input input--difunto" type="text" placeholder="Ingrese Nombre" id="nombreProv"><br>
                                <label class="name_personal" for="name">Celular:</label>
                                <input class="input input--difunto" type="text" placeholder="Ingrese Celular" id="celularProv" onkeypress="return solonumeros(event)" maxlength="9">
                                <label class="name_personal" for="name">Dirección:</label>
                                <input class="input input--difunto" type="text" placeholder="Ingrese Direccion" id="direccionProv"><br>
                                <label class="name_personal" for="name">E-mail:</label>
                                <input class="input input--difunto" type="email" placeholder="Ingrese Email" id="emailProv">
                                
                            </div>
                            <div class="box2"><br><br>
                                
                                <label class="name_personal" for="name">RUC:</label>
                                <input class="input input--difunto" type="text" placeholder="Ingrese RUC" id="rucProv" onkeypress="return solonumeros(event)" maxlength="11">
                                <label class="name_personal" for="name">Razón Social:</label>
                                <input class="input input--difunto" type="text" placeholder="Ingrese Razon Social" id="razonProv"><br><br>
                                
                            </div>                       
                            <input id="guardar" class="guardar guardar--cerrar5" type="submit" value="Guardar">
                            <input id="actualizar" class="guardar guardar--actualizar" type="submit" value="Actualizar">

                            <label for="btn-modal" class="guardar guardar--cerrar5">Cancelar</label><br>
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
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
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

/* REGISTRAR PROVEEDOR */

$('#guardar').click(function(){

    expresion= /\w+@\w+\.+[a-z]/;
    if($('#rucProv').val() == '' ||$('#razonProv').val()  == '' ||$('#nombreProv').val()  == '' || $('#celularProv').val()  == ''|| $('#direccionProv').val()  == ''|| $('#emailProv').val()  == '' ){
        alert("Todos los campos son obligatorios");
        return false;
    }
    if(!expresion.test($('#emailProv').val()))
        {
            alert("El correo no es válido");
        return false;
        }
        var json = {
            'rucProveedor':$('#rucProv').val(),
            'razonSocialProv':$('#razonProv').val(),
            'nombreRepProv':$('#nombreProv').val(),
            'telefonoProv':$('#celularProv').val(),
            'direccionProv':$('#direccionProv').val(),
            'emailProv':$('#emailProv').val(),
        }
        $.ajax({
            method: "POST",
            data: json,
            url : 'http://localhost/funeral/public/api/proveedores/agregar',
            success:function(r){
                        alert("Proveedor Registrado");
                        clear();
            }       
        });
    });


/* CARGAR LISTADO DE PROVEEDORES EN LA TABLA */

$(document).ready(function(){
        load();
    });
    function load(){
        $.ajax({
            method:"GET",
            url : 'http://localhost/funeral/public/api/proveedores',
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
$('#tablita > tbody').append('<tr class="information_dead"><td style="width: 100px;">'+item.rucProveedor+'</td><td style="width: 220px;">'+item.razonSocialProv+'</td><td style="width: 150px;">'+item.nombreRepProv+'</td><td style="width: 100px;">'+item.telefonoProv+'</td><td style="width: 110px;">'+item.direccionProv+'</td><td style="width: 160px;">'+item.emailProv+'</td><td style="width: 69px;"><label for="btn-modal" id="'+item.rucProveedor+'" class="editar edit">Editar</label></td><td style="width: 69px;"><a id="'+item.rucProveedor+'" class="eliminar delete">Eliminar</a></td></tr>');
    }
    /* EVENTO CLICK PARA EDITAR PROVEEDOR */

    $(document).on('click', '.edit', function () {
                var id = $(this).attr('id');
                try {
                $.ajax({
                    //Url para Recurso Particular
                    
                    'url': 'http://localhost/funeral/public/api/proveedores/'+id,
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
        $('#rucProv').val(datos.rucProveedor);
        $('#razonProv').val(datos.razonSocialProv);
        $('#nombreProv').val(datos.nombreRepProv);
        $('#celularProv').val(datos.telefonoProv);
        $('#direccionProv').val(datos.direccionProv);
        $('#emailProv').val(datos.emailProv);

    }
     /* ACTUALIZAR PROVEEDOR*/

     $('#actualizar').click(function() {
        var id = $('#rucProv').val();
        var newJSON ={
        'razonSocialProv': $.trim($('#razonProv').val()),
        'nombreRepProv': $.trim($('#nombreProv').val()),
        'telefonoProv': $.trim($('#celularProv').val()),
        'direccionProv': $.trim($('#direccionProv').val()),
        'emailProv': $.trim($('#emailProv').val()),
        }
        
        /* function Editado() {
            swal({
                type: 'error',
                title: 'La contraseña es incorrecta',
                showConfirmButton: false,
                timer: 3000 // es ms (mili-segundos)
            })
        } */
        
        try {
        $.ajax({
            'url': 'http://localhost/funeral/public/api/proveedores/actualizar/'+id,
            'method': 'PUT',
            'data':newJSON,
            'success': function (data){
            /* Editado() */
            alert('Proveedor Modificado');
            /* swal("Proveedor modificado!", "You clicked the button!", "success"); */
            load();
            clear();
            window.location.href='http://localhost/funeral/content/proveedores.html'
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
                    'url': 'http://localhost/funeral/public/api/proveedores/eliminar/'+id,
                    'method': 'DELETE',
                    'success': function (data) {

                        /* const swalWithBootstrapButtons = Swal.mixin({
                        customClass: {
                            confirmButton: 'btn btn-success',
                            cancelButton: 'btn btn-danger'
                        },
                        buttonsStyling: false
                        })
                        swalWithBootstrapButtons.fire({
                        title: '¿Desea eliminar proveedor?',
                        text: "Se borrará de la base base de datos.",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonText: 'Si, Eliminar',
                        cancelButtonText: 'No, Cancelar!',
                        reverseButtons: true
                        })  */
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
        $('#rucProv').val("");
        $('#razonProv').val("");
        $('#nombreProv').val("");
        $('#celularProv').val("");
        $('#direccionProv').val("");
        $('#emailProv').val("");
    }

    $('#nuevo').click(function(){
        $('#actualizar').hide();
    });
</script>