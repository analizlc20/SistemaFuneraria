<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
header ('Content-Type: application/json');

//OBTENER TODOS LOS DIFUNTOS
$app->GET('/api/difunto', function(Request $request, Response $response){
    
    $consulta = 'call listarDifuntos()';

    try{
        //instanciar base de datos
        $db = new db();

        //Conexion
        $db = $db->conectar();
        $ejecutar = $db->query($consulta);
        $difunto = $ejecutar->fetchAll(PDO::FETCH_OBJ);
        $db = null;

        //Exportar y mostrar en JSON
        echo json_encode($difunto);

    } catch(PDOException $e){
            echo '{"error": {"text": '.$e->getMessage().'}';
    }
});
//OBTENER UN DIFUNTO
$app->GET('/api/difunto/{dniDifunto}', function(Request $request, Response $response){
    
    $id = $request->getAttribute('dniDifunto');

    $consulta = "SELECT * FROM difunto WHERE dniDifunto ='$id'";

    try{
        //instanciar base de datos
        $db = new db();

        //Conexion
        $db = $db->conectar();
        $ejecutar = $db->query($consulta);
        $difunto = $ejecutar->fetchAll(PDO::FETCH_OBJ);
        $db = null;

        //Exportar y mostrar en JSON un solo cliente
        echo json_encode($difunto);

    } catch(PDOException $e){
            echo '{"error": {"text": '.$e->getMessage().'}';
    }
});
//AGREGAR UN PROVEEDOR
$app->POST('/api/difunto/agregar', function(Request $request, Response $response){
    
    $dniDifunto = $request->getParam('dniDifunto');
    $nombresD = $request->getParam('nombresD');
    $apellidosD = $request->getParam('apellidosD');
    $sexoD = $request->getParam('sexoD');
    $fechaNacD = $request->getParam('fechaNacD');
    $fechaFallD = $request->getParam('fechaFallD');
    $horaFallD = $request->getParam('horaFallD');
    $causaMuerteD = $request->getParam('causaMuerteD');
    $lugarFall = $request->getParam('lugarFall');
    $estadoCivil = $request->getParam('estadoCivil');
    $dniCliente = $request->getParam('dniCliente');


    $consulta = "INSERT INTO difunto (dniDifunto, nombresD, apellidosD, sexoD, fechaNacD, fechaFallD, horaFallD, causaMuerteD, lugarFall, estadoCivil, dniCliente) VALUES (:dniDifunto, :nombresD, :apellidosD, :sexoD, :fechaNacD, :fechaFallD, :horaFallD, :causaMuerteD, :lugarFall, :estadoCivil, :dniCliente)";

    try{
        //instanciar base de datos
        $db = new db();

        //Conexion
        $db = $db->conectar();
        $stmt = $db->prepare($consulta);
        $stmt->bindParam(':dniDifunto', $dniDifunto);
        $stmt->bindParam(':nombresD', $nombresD);
        $stmt->bindParam(':apellidosD', $apellidosD);
        $stmt->bindParam(':sexoD', $sexoD);
        $stmt->bindParam(':fechaNacD', $fechaNacD);
        $stmt->bindParam(':fechaFallD', $fechaFallD);
        $stmt->bindParam(':horaFallD', $horaFallD);
        $stmt->bindParam(':causaMuerteD', $causaMuerteD);
        $stmt->bindParam(':lugarFall', $lugarFall);
        $stmt->bindParam(':estadoCivil', $estadoCivil);
        $stmt->bindParam(':dniCliente', $dniCliente);

        $stmt->execute();
        echo '{"notice": {"text": "Difunto Agregado}';

    } catch(PDOException $e){
            echo '{"error": {"text": '.$e->getMessage().'}';
    }
});
//ACTUALIZAR UN DIFUNTO
$app->PUT('/api/difunto/actualizar/{dniDifunto}', function(Request $request, Response $response){
    
    $id = $request->getAttribute('dniDifunto');
//Debería ir el ruc para poder agregar aqui ?
    /* $ruc = $request->getParam('Ruc'); */
    $nombresD = $request->getParam('nombresD');
    $apellidosD = $request->getParam('apellidosD');
    $sexoD = $request->getParam('sexoD');
    $fechaNacD = $request->getParam('fechaNacD');
    $fechaFallD = $request->getParam('fechaFallD');
    $horaFallD = $request->getParam('horaFallD');
    $causaMuerteD = $request->getParam('causaMuerteD');
    $lugarFall = $request->getParam('lugarFall');
    $estadoCivil = $request->getParam('estadoCivil');
    $dniCliente = $request->getParam('dniCliente');
    

    $consulta = "UPDATE difunto SET 
                    nombresD = :nombresD,
                    apellidosD = :apellidosD,
                    sexoD = :sexoD,
                    fechaNacD = :fechaNacD,
                    fechaFallD = :fechaFallD,
                    horaFallD = :horaFallD,
                    causaMuerteD = :causaMuerteD,
                    lugarFall = :lugarFall,
                    estadoCivil = :estadoCivil,
                    dniCliente = :dniCliente

                    WHERE dniDifunto = $id";

    try{
        //instanciar base de datos
        $db = new db();

        //Conexion
        $db = $db->conectar();
        $stmt = $db->prepare($consulta);
        $stmt->bindParam(':nombresD', $nombresD);
        $stmt->bindParam(':apellidosD', $apellidosD);
        $stmt->bindParam(':sexoD', $sexoD);
        $stmt->bindParam(':fechaNacD', $fechaNacD);
        $stmt->bindParam(':fechaFallD', $fechaFallD);
        $stmt->bindParam(':horaFallD', $horaFallD);
        $stmt->bindParam(':causaMuerteD', $causaMuerteD);
        $stmt->bindParam(':lugarFall', $lugarFall);
        $stmt->bindParam(':estadoCivil', $estadoCivil);
        $stmt->bindParam(':dniCliente', $dniCliente);


        $stmt->execute();
        echo '{"notice": {"text": "Difunto Actualizado}';

    } catch(PDOException $e){
            echo '{"error": {"text": '.$e->getMessage().'}';
    }
});
//ELIMINAR UN DIFUNTO
$app->DELETE('/api/difunto/eliminar/{dniDifunto}', function(Request $request, Response $response){
    
    $id = $request->getAttribute('dniDifunto');

    $consulta = "DELETE FROM difunto WHERE dniDifunto = $id";

    try{
        //instanciar base de datos
        $db = new db();

        //Conexion
        $db = $db->conectar();
        $stmt = $db->prepare($consulta);
        $stmt->execute();
        $db = null;

        echo '{"notice": {"text": "Difunto Eliminado}';

    } catch(PDOException $e){
            echo '{"error": {"text": '.$e->getMessage().'}';
    }
});
