<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
header ('Content-Type: application/json');

//OBTENER TODOS LOS usuarios
$app->GET('/api/usuario', function(Request $request, Response $response){
    
    $consulta = 'call listarUsuarios';

    try{
        //instanciar base de datos
        $db = new db();

        //Conexion
        $db = $db->conectar();
        $ejecutar = $db->query($consulta);
        $usuario = $ejecutar->fetchAll(PDO::FETCH_OBJ);
        $db = null;

        //Exportar y mostrar en JSON
        echo json_encode($usuario);

    } catch(PDOException $e){
            echo '{"error": {"text": '.$e->getMessage().'}';
    }
});


//OBTENER UN usuario
$app->GET('/api/usuario/{idusuario}', function(Request $request, Response $response){
    
    $id = $request->getAttribute('idusuario');

    $consulta = "SELECT idusuario, idTipoUsuario, nombresUsu, apellidosUsu, loginUsuario, claveUsuario FROM usuario WHERE idusuario =$id";

    try{
        //instanciar base de datos
        $db = new db();

        //Conexion
        $db = $db->conectar();
        $ejecutar = $db->query($consulta);
        $usuario = $ejecutar->fetchAll(PDO::FETCH_OBJ);
        $db = null;

        //Exportar y mostrar en JSON un solo usuario
        echo json_encode($usuario);

    } catch(PDOException $e){
            echo '{"error": {"text": '.$e->getMessage().'}';
    }
});


//AGREGAR UN usuario
$app->POST('/api/usuario/agregar', function(Request $request, Response $response){
    
    $idTipoUsuario = $request->getParam('idTipoUsuario');
    $nombresUsu = $request->getParam('nombresUsu');
    $apellidosUsu = $request->getParam('apellidosUsu');
    $loginUsuario = $request->getParam('loginUsuario');
    $claveUsuario = $request->getParam('claveUsuario');

    $consulta = "INSERT INTO usuario (idTipoUsuario, nombresUsu, apellidosUsu, loginUsuario, claveUsuario) VALUES(:idTipoUsuario, :nombresUsu, :apellidosUsu,:loginUsuario, :claveUsuario)";

    try{
        //instanciar base de datos
        $db = new db();

        //Conexion
        $db = $db->conectar();
        $stmt = $db->prepare($consulta);
        $stmt->bindParam(':idTipoUsuario', $idTipoUsuario);
        $stmt->bindParam(':nombresUsu', $nombresUsu);
        $stmt->bindParam(':apellidosUsu', $apellidosUsu);
        $stmt->bindParam(':loginUsuario', $loginUsuario);
        $stmt->bindParam(':claveUsuario', $claveUsuario);
        $stmt->execute();
        echo '{"notice": {"text": "Usuario Agregado}';

    } catch(PDOException $e){
            echo '{"error": {"text": '.$e->getMessage().'}';
    }
});



//ACTUALIZAR UN usuario
$app->PUT('/api/usuario/actualizar/{idusuario}', function(Request $request, Response $response){
    
    $id = $request->getParam('idusuario');
//Debería ir el ruc para poder agregar aqui ?
    /* $ruc = $request->getParam('Ruc'); */
    $idTipoUsuario = $request->getParam('idTipoUsuario');
    $nombresUsu = $request->getParam('nombresUsu');
    $apellidosUsu = $request->getParam('apellidosUsu');
    $loginUsuario = $request->getParam('loginUsuario');
    $claveUsuario = $request->getParam('claveUsuario');

    $consulta = "UPDATE usuario SET 
                    idTipoUsuario = :idTipoUsuario,
                    nombresUsu = :nombresUsu,
                    apellidosUsu = :apellidosUsu,
                    loginUsuario = :loginUsuario,
                    claveUsuario = :claveUsuario

                    WHERE idusuario = $id";

    try{
        //instanciar base de datos
        $db = new db();

        //Conexion
        $db = $db->conectar();
        $stmt = $db->prepare($consulta);
        $stmt->bindParam(':idTipoUsuario', $idTipoUsuario);
        $stmt->bindParam(':nombresUsu', $nombresUsu);
        $stmt->bindParam(':apellidosUsu', $apellidosUsu);
        $stmt->bindParam(':loginUsuario', $loginUsuario);
        $stmt->bindParam(':claveUsuario', $claveUsuario);
        $stmt->execute();
        echo '{"notice": {"text": "Usuario Actualizado}';

    } catch(PDOException $e){
            echo '{"error": {"text": '.$e->getMessage().'}';
    }
});


//ELIMINAR UN usuario
$app->DELETE('/api/usuario/eliminar/{idusuario}', function(Request $request, Response $response){
    
    $id = $request->getAttribute('idusuario');

    $consulta = "DELETE FROM usuario WHERE idusuario = $id";

    try{
        //instanciar base de datos
        $db = new db();

        //Conexion
        $db = $db->conectar();
        $stmt = $db->prepare($consulta);
        $stmt->execute();
        $db = null;

        echo '{"notice": {"text": "Usuario Eliminado}';

    } catch(PDOException $e){
            echo '{"error": {"text": '.$e->getMessage().'}';
    }
});
//OBTENER Tipo de usuario
$app->GET('/api/tipoUsuario', function(Request $request, Response $response){
    
    $consulta = 'SELECT * FROM tipoUsuario';

    try{
        //instanciar base de datos
        $db = new db();

        //Conexion
        $db = $db->conectar();
        $ejecutar = $db->query($consulta);
        $tipoUsuario = $ejecutar->fetchAll(PDO::FETCH_OBJ);
        $db = null;

        //Exportar y mostrar en JSON
        echo json_encode($tipoUsuario);

    } catch(PDOException $e){
            echo '{"error": {"text": '.$e->getMessage().'}';
    }
});