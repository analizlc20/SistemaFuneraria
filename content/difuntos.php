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
    <title>Difuntos Funeraria</title>
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
                    <p><img class="img" src="img/difunto.svg" alt="personal profile">Difuntos</p>
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
                            <th style="width: 100px;">Dni</th>
                            <th style="width: 200px;">Nombres</th>
                            <th style="width: 200px;">Apellidos</th>
                            <th style="width: 60px;">Sexo</th>                            
                            <th style="width: 100px;">Fecha Fall.</th>
                            <th style="width: 60px;">Hora</th>
                            <th style="width: 100px;">Dni Cliente</th>                       
                            <th style="width: 70px;">Editar</th>
                            <th style="width: 70px;">Eliminar</th>


                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                        </tr>
                        
                    </tbody>
                    
                </table>
                <div>
                    <h5 class="h5">Opción:</h5><br>
                    <form class="rb">
                        <label id="nuevo" for="btn-modal" class="añadir__personal">AÑADIR DIFUNTO</label><br>   
                    </form>
                </div>
                <div class="button-nuevoPersonal">
                    <input type="checkbox" id="btn-modal">
                    <div class="modal">  
                        <div class="contenedor contenedor--difunto">
                            <p class="p1">NUEVO DIFUNTO</p><br> 
                            <div class="box1">
                                <label class="name_personal" for="name">Dni:</label><br>
                                <input class="input input--difunto" type="text" placeholder="Ingrese Dni" id="dniDif" onkeypress="return solonumeros(event)" maxlength="8"><br>
                                <label class="name_personal" for="name">Nombres:</label>
                                <input class="input input--difunto" type="text" placeholder="Ingrese Nombres" id="nombresDif">
                                <label class="name_personal" for="name">Apellidos:</label>
                                <input class="input input--difunto" type="text" placeholder="Ingrese Apellidos" id="apellidosDif">
                                
                                <label class="name_personal"><b>Sexo:</b> </label><br>
                                <input class="radio-button" type="radio" id="sexoDif" value="F">
                                <label  class="name_personal" for="F">F</label><br>
                                <input class="radio-button" type="radio" id="sexoDif" value="M">
                                <label class="name_personal" for="M">M</label><br>

                                <label class="name_personal" for="name">Fecha Nacimiento:</label>
                                <input class="input input--difunto" type="date" id="NacDif" required="obligatorio">
                            </div>
                            <div class="box2">
                                <label class="name_personal" for="name">Fecha Fallecimiento:</label>
                                <input class="input input--difunto" type="date" id="FallDif" required="obligatorio"><br>

                                <label class="name_personal" for="name">Hora Fallecimiento:</label>
                                <input class="input input--difunto" type="text" id="hFallDif" required="obligatorio">
                                
                                <label class="name_personal" for="name">Lugar Fallecimiento:</label>
                                <input class="input input--difunto" type="text" placeholder="Ingrese Lugar" id="lFallDif" required="obligatorio">
                                <label class="name_personal" for="name">Causa Muerte:</label>
                                <input class="input input--difunto" type="text" placeholder="Ingrese Causa" id="causaMDif" required="obligatorio"><br><br>
                                <label class="name_personal" for="name"><b>Estado Civil:</b> </label><br>
                                <select id="eCivDif" class="select" name="select">
                                    <option value="value1" selected disabled>Seleccionar</option>
                                    <option value="value2">Soltero(a)</option>
                                    <option value="value3">Casado(a)</option>
                                    <option value="value4">Viudo(a)</option>
                                    <option value="value5">Divorciado(a)</option>
                                  </select><br><br>
                                <!-- <label class="name_personal" for="name"><b>Agregar Parentesco:</b> </label><br> -->
                                  <label class="name_personal" for="name"><b>Parentesco:</b></label>
                                  <select class="select" name="select">
                                      <option value="value1" selected disabled>Seleccionar</option>
                                      <option value="value2">Hijo(a)</option>
                                      <option value="value3">Cónyugue</option>
                                      <option value="value4">Hermano(a)</option>
                                      <option value="value5">Abuelo(a)</option>
                                      <option value="value6">Tio(a)</option>
                                      <option value="value7">Madre</option>
                                      <option value="value8">Padre</option>
                                    </select><br>
                                <label class="name_personal" for="name">Dni Cliente:</label>
                                <input class="input input--difunto" type="text" placeholder="Ingrese Dni" id="dniCli" onkeypress="return solonumeros(event)" maxlength="8"><br>                                 
                            </div>                       
                            <input id="guardar" class="guardar guardar--cerrar6" type="submit" value="Guardar">
                            <input id="actualizar" class="guardar" type="submit" value="Actualizar">

                            <label for="btn-modal" class="guardar guardar--cerrar5">Cancelar</label><br>
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
    /* REGISTRAR DIFUNTO */

    $('#guardar').click(function(){
        if($('#dniDif').val() == '' ||$('#nombresDif').val()  == '' ||$('#apellidosDif').val()  == '' || $('#sexoDif').val()  == ''||$('#NacDif').val()  == ''||$('#FallDif').val()  == ''||$('#hFallDif').val()  == '' ||$('#causaMDif').val()  == '' || $('#lFallDif').val()  == '' ||$('#eCivDif').val()  == ''||$('#dniCli').val()  == '' ){
        alert("Todos los campos son obligatorios");
        return false;
        }
            var json = {
                'dniDifunto':$('#dniDif').val(),
                'nombresD':$('#nombresDif').val(),
                'apellidosD':$('#apellidosDif').val(),
                'sexoD':$('#sexoDif').val(),
                'fechaNacD':$('#NacDif').val(),
                'fechaFallD':$('#FallDif').val(),
                'horaFallD':$('#hFallDif').val(),
                'causaMuerteD':$('#causaMDif').val(),
                'lugarFall':$('#lFallDif').val(),
                'estadoCivil':$('#eCivDif').val(),
                'dniCliente':$('#dniCli').val()

            }
             console.log(json)

            $.ajax({
                method: "POST",
                data: json,
                url : 'http://localhost/funeral/public/api/difunto/agregar',
                success:function(r){
                            console.log(r)
                            alert("Difunto Registrado");
                            clear();
                            load();
                        
                }       
            });
        });
/* CARGAR LISTADO DE DIFUNTOS EN LA TABLA */

$(document).ready(function(){
        load();

    });
    function load(){
        $.ajax({
            method:"GET",
            url : 'http://localhost/funeral/public/api/difunto',
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
$('#tablita > tbody').append('<tr class="information_dead"><td style="width: 100px;">'+item.dniDifunto+'</td><td style="width: 200px;">'+item.nombresD+'</td><td style="width: 200px;">'+item.apellidosD+'</td><td style="width: 60px;">'+item.sexoD+'</td><td style="width: 100px;">'+item.fechaFallD+'</td><td style="width: 60px;">'+item.horaFallD+'</td><td style="width: 100px;">'+item.dniCliente+'</td><td style="width: 70px;"><label for="btn-modal" id="'+item.dniDifunto+'" class="editar edit">Editar</label></td><td style="width: 70px;"><a id="'+item.dniDifunto+'" class="eliminar delete">Eliminar</a></d></tr>');
    }
    /* EVENTO CLICK PARA EDITAR DIFUNTO */

    $(document).on('click', '.edit', function () {
                var id = $(this).attr('id');
                try {
                $.ajax({
                    //Url para Recurso Particular
                    
                    'url': 'http://localhost/funeral/public/api/difunto/'+id,
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
        $('#dniDif').val(datos.dniDifunto);
        $('#nombresDif').val(datos.nombresD);
        $('#apellidosDif').val(datos.apellidosD);
        $('#sexoDif').val(datos.sexoD);
        $('#NacDif').val(datos.fechaNacD);
        $('#FallDif').val(datos.fechaFallD);
        $('#hFallDif').val(datos.horaFallD);
        $('#causaMDif').val(datos.causaMuerteD);
        $('#lFallDif').val(datos.lugarFall);
        $('#eCivDif').val(datos.estadoCivil);
        $('#dniCli').val(datos.dniCliente);
    }
     /* ACTUALIZAR DIFUNTO*/

     $('#actualizar').click(function() {
        var id = $('#dniDif').val();
        var newJSON ={

 
        'nombresD': $.trim($('#nombresDif').val()),
        'apellidosD': $.trim($('#apellidosDif').val()),
        'sexoD': $.trim($('#sexoDif').val()),
        'fechaNacD': $.trim($('#NacDif').val()),
        'fechaFallD': $.trim($('#FallDif').val()),
        'horaFallD': $.trim($('#hFallDif').val()),
        'causaMuerteD': $.trim($('#causaMDif').val()),
        'lugarFall': $.trim($('#lFallDif').val()),
        'estadoCivil': $.trim($('#eCivDif').val()),
        'dniCliente': $.trim($('#dniCli').val()),

        }
        
        try {
        $.ajax({
            'url': 'http://localhost/funeral/public/api/difunto/actualizar/'+id,
            'method': 'PUT',
            'data':newJSON,
            'success': function (data) {
            alert('Difunto Actualizado'); 
            load();
            clear();
            window.location.href='http://localhost/funeral/content/difuntos.html'           
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
                    'url': 'http://localhost/funeral/public/api/difunto/eliminar/'+id,
                    'method': 'DELETE',
                    'success': function (data) {

                    alert('Difunto Eliminado'); 
                    load();
                    }
                });
                } catch (error) {
                    alert("Algo no salió bien");
                }
    });
/* LIMPIAR CAMPOS */

function clear() {
        $('#dniDif').val("");
        $('#nombresDif').val("");
        $('#apellidosDif').val("");
        $('#sexoDif').val("");
        $('#NacDif').val("");
        $('#FallDif').val("");
        $('#hFallDif').val("");
        $('#causaMDif').val("");
        $('#lFallDif').val("");
        $('#eCivDif').val("");
        $('#dniCli').val("");
    }
    $('#nuevo').click(function(){
        $('#actualizar').hide();
    });
</script>