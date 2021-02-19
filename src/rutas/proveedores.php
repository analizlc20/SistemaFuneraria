<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
header ('Content-Type: application/json');

//OBTENER TODOS LOS PROVEEDORES
$app->GET('/api/proveedores', function(Request $request, Response $response){
    
    $consulta = 'SELECT * FROM proveedores';

    try{
        //instanciar base de datos
        $db = new db();

        //Conexion
        $db = $db->conectar();
        $ejecutar = $db->query($consulta);
        $proveedor = $ejecutar->fetchAll(PDO::FETCH_OBJ);
        $db = null;

        //Exportar y mostrar en JSON
        echo json_encode($proveedor);

    } catch(PDOException $e){
            echo '{"error": {"text": '.$e->getMessage().'}';
    }
});


//OBTENER UN PROVEEDOR
$app->GET('/api/proveedores/{rucProveedor}', function(Request $request, Response $response){
    
    $id = $request->getAttribute('rucProveedor');

    $consulta = "SELECT * FROM proveedores WHERE rucProveedor ='$id'";

    try{
        //instanciar base de datos
        $db = new db();

        //Conexion
        $db = $db->conectar();
        $ejecutar = $db->query($consulta);
        $proveedor = $ejecutar->fetchAll(PDO::FETCH_OBJ);
        $db = null;

        //Exportar y mostrar en JSON un solo cliente
        echo json_encode($proveedor);

    } catch(PDOException $e){
            echo '{"error": {"text": '.$e->getMessage().'}';
    }
});


//AGREGAR UN PROVEEDOR
$app->POST('/api/proveedores/agregar', function(Request $request, Response $response){
    
    $rucProveedor = $request->getParam('rucProveedor');
    $razonSocialProv = $request->getParam('razonSocialProv');
    $nombreRepProv = $request->getParam('nombreRepProv');
    $telefonoProv = $request->getParam('telefonoProv');
    $direccionProv = $request->getParam('direccionProv');
    $emailProv = $request->getParam('emailProv');

    $consulta = "INSERT INTO proveedores (rucProveedor, razonSocialProv, nombreRepProv,  telefonoProv, direccionProv, emailProv) VALUES (:rucProveedor, :razonSocialProv, :nombreRepProv, :telefonoProv, :direccionProv, :emailProv)";

    try{
        //instanciar base de datos
        $db = new db();

        //Conexion
        $db = $db->conectar();
        $stmt = $db->prepare($consulta);
        $stmt->bindParam(':rucProveedor', $rucProveedor);
        $stmt->bindParam(':razonSocialProv', $razonSocialProv);
        $stmt->bindParam(':nombreRepProv', $nombreRepProv);
        $stmt->bindParam(':direccionProv', $direccionProv);
        $stmt->bindParam(':telefonoProv', $telefonoProv);
        $stmt->bindParam(':emailProv', $emailProv);
        $stmt->execute();
        echo '{"notice": {"text": "Proveedor Agregado}';

    } catch(PDOException $e){
            echo '{"error": {"text": '.$e->getMessage().'}';
    }
});



//ACTUALIZAR UN PROVEEDOR
$app->PUT('/api/proveedores/actualizar/{rucProveedor}', function(Request $request, Response $response){
    
    $id = $request->getAttribute('rucProveedor');
//Debería ir el ruc para poder agregar aqui ?
    /* $ruc = $request->getParam('Ruc'); */
    $razonSocialProv = $request->getParam('razonSocialProv');
    $nombreRepProv = $request->getParam('nombreRepProv');
    $direccionProv = $request->getParam('direccionProv');
    $telefonoProv = $request->getParam('telefonoProv');
    $emailProv = $request->getParam('emailProv');

    $consulta = "UPDATE proveedores SET 
                    razonSocialProv = :razonSocialProv,
                    nombreRepProv = :nombreRepProv,
                    direccionProv = :direccionProv,
                    telefonoProv = :telefonoProv,
                    emailProv = :emailProv
                    WHERE rucProveedor = $id";

    try{
        //instanciar base de datos
        $db = new db();

        //Conexion
        $db = $db->conectar();
        $stmt = $db->prepare($consulta);
        $stmt->bindParam(':razonSocialProv', $razonSocialProv);
        $stmt->bindParam(':nombreRepProv', $nombreRepProv);
        $stmt->bindParam(':direccionProv', $direccionProv);
        $stmt->bindParam(':telefonoProv', $telefonoProv);
        $stmt->bindParam(':emailProv', $emailProv);
        $stmt->execute();
        echo '{"notice": {"text": "Proveedor Actualizado}';

    } catch(PDOException $e){
            echo '{"error": {"text": '.$e->getMessage().'}';
    }
});

//ELIMINAR UN PROVEEDOR
$app->DELETE('/api/proveedores/eliminar/{rucProveedor}', function(Request $request, Response $response){
    
    $id = $request->getAttribute('rucProveedor');

    $consulta = "DELETE FROM proveedores WHERE rucProveedor = $id";

    try{
        //instanciar base de datos
        $db = new db();

        //Conexion
        $db = $db->conectar();
        $stmt = $db->prepare($consulta);
        $stmt->execute();
        $db = null;

        echo '{"notice": {"text": "Proveedor Eliminado}';

    } catch(PDOException $e){
            echo '{"error": {"text": '.$e->getMessage().'}';
    }
});