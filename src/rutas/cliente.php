<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
header ('Content-Type: application/json');

//OBTENER TODOS LOS CLIENTES
$app->GET('/api/cliente', function(Request $request, Response $response){
    
    $consulta = 'call listarParentesco()';

    try{
        //instanciar base de datos
        $db = new db();

        //Conexion
        $db = $db->conectar();
        $ejecutar = $db->query($consulta);
        $cliente = $ejecutar->fetchAll(PDO::FETCH_OBJ);
        $db = null;

        //Exportar y mostrar en JSON
        echo json_encode($cliente);

    } catch(PDOException $e){
            echo '{"error": {"text": '.$e->getMessage().'}';
    }
});


//OBTENER UN CLIENTE
$app->GET('/api/cliente/{dniCliente}', function(Request $request, Response $response){
    
    $id = $request->getAttribute('dniCliente');

    $consulta = "SELECT * FROM cliente WHERE dniCliente =$id";

    try{
        //instanciar base de datos
        $db = new db();

        //Conexion
        $db = $db->conectar();
        $ejecutar = $db->query($consulta);
        $cliente = $ejecutar->fetchAll(PDO::FETCH_OBJ);
        $db = null;

        //Exportar y mostrar en JSON un solo cliente
        echo json_encode($cliente);

    } catch(PDOException $e){
            echo '{"error": {"text": '.$e->getMessage().'}';
    }
});


//AGREGAR UN CLIENTE
$app->POST('/api/cliente/agregar', function(Request $request, Response $response){
    
    $id = $request->getParam('dniCliente');
    $nombresC = $request->getParam('nombresC');
    $apellidosC = $request->getParam('apellidosC');
    $idParentesco = $request->getParam('idParentesco');
    $direccionC = $request->getParam('direccionC');
    $telefonoC = $request->getParam('telefonoC');
    $emailC = $request->getParam('emailC');


    $consulta = "INSERT INTO cliente (dniCliente, nombresC, apellidosC, direccionC, telefonoC, emailC, idParentesco) VALUES (:dniCliente, :nombresC, :apellidosC, :direccionC, :telefonoC, :emailC,  :idParentesco)";

    try{
        //instanciar base de datos
        $db = new db();

        //Conexion
        $db = $db->conectar();
        $stmt = $db->prepare($consulta);
        $stmt->bindParam(':dniCliente', $id);
        $stmt->bindParam(':nombresC', $nombresC);
        $stmt->bindParam(':apellidosC', $apellidosC);
        $stmt->bindParam(':idParentesco', $idParentesco);
        $stmt->bindParam(':direccionC', $direccionC);
        $stmt->bindParam(':telefonoC', $telefonoC);
        $stmt->bindParam(':emailC', $emailC);
        $stmt->execute();
        echo '{"notice": {"text": "Cliente Agregado}';

    } catch(PDOException $e){
            echo '{"error": {"text": '.$e->getMessage().'}';
    }
});


//ACTUALIZAR UN CLIENTE
$app->PUT('/api/cliente/actualizar/{dniCliente}', function(Request $request, Response $response){
    
    $id = $request->getAttribute('dniCliente');
//Debería ir el dni para poder agregar aqui ?
    /* $dni = $request->getParam('Dni'); */
    $nombresC = $request->getParam('nombresC');
    $apellidosC = $request->getParam('apellidosC');
    $direccionC = $request->getParam('direccionC');
    $telefonoC = $request->getParam('telefonoC');
    $emailC = $request->getParam('emailC');
    $parentesco = $request->getParam('parentesco');


    $consulta = "UPDATE cliente SET 
                    
                    nombresC = :nombresC,
                    apellidosC = :apellidosC,
                    direccionC = :direccionC,
                    telefonoC = :telefonoC,
                    emailC = :emailC,
                    idParentesco = :parentesco

                    WHERE dniCliente = $id";

    try{
        //instanciar base de datos
        $db = new db();

        //Conexion
        $db = $db->conectar();
        $stmt = $db->prepare($consulta);
        $stmt->bindParam(':nombresC', $nombresC);
        $stmt->bindParam(':apellidosC', $apellidosC);
        $stmt->bindParam(':direccionC', $direccionC);
        $stmt->bindParam(':telefonoC', $telefonoC);
        $stmt->bindParam(':emailC', $emailC);
        $stmt->bindParam(':parentesco', $parentesco);


        $stmt->execute();
        echo '{"notice": {"text": "Cliente Actualizado}';

    } catch(PDOException $e){
            echo '{"error": {"text": '.$e->getMessage().'}';
    }
});


//ELIMINAR UN CLIENTE
$app->DELETE('/api/cliente/eliminar/{dniCliente}', function(Request $request, Response $response){
    
    $id = $request->getAttribute('dniCliente');

    $consulta = "DELETE FROM cliente WHERE dniCliente = $id";

    try{
        //instanciar base de datos
        $db = new db();

        //Conexion
        $db = $db->conectar();
        $stmt = $db->prepare($consulta);
        $stmt->execute();
        $db = null;

        echo '{"notice": {"text": "Cliente Eliminado}';

    } catch(PDOException $e){
            echo '{"error": {"text": '.$e->getMessage().'}';
    }
});
//OBTENER Tipo de parentesco
$app->GET('/api/parentesco', function(Request $request, Response $response){
    
    $consulta = 'SELECT * FROM parentesco';

    try{
        //instanciar base de datos
        $db = new db();

        //Conexion
        $db = $db->conectar();
        $ejecutar = $db->query($consulta);
        $parentesco = $ejecutar->fetchAll(PDO::FETCH_OBJ);
        $db = null;

        //Exportar y mostrar en JSON
        echo json_encode($parentesco);

    } catch(PDOException $e){
            echo '{"error": {"text": '.$e->getMessage().'}';
    }
});