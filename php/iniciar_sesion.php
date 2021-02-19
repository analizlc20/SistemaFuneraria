<?php 

$server ='localhost';
$username = 'root';
$password= '';
$database = 'funeral';

try{
    $conn = new PDO("mysql:host=$server;dbname=$database",$username,$password);
}catch(PDOException $e){
    echo "Failed connect database: ".$e->getMessage();
}

include('../src/config/db.php');

$errores = '';


if(isset($_POST['btn_click'])){
    if(!empty($_POST['f_username'])){
        $b_username = $_POST['f_username'];
        $b_username = filter_var($b_username , FILTER_SANITIZE_STRING);
    }else{
        $errores = 'Por favor ingresa tu usuario.';
    }

    if(!empty($_POST['f_password'])){
        $b_password = $_POST['f_password'];
        $b_password = filter_var($b_password , FILTER_SANITIZE_STRING);
    }else{
        $errores = 'Por favor ingresa tu contraseña.';
    }
    
    //loginUsuario claveUsuario
    if(empty($errores)){
        $query = "SELECT *FROM usuario WHERE loginUsuario = :user
        AND claveUsuario = :pass ";

        $statement = $conn->prepare($query);
        $statement->execute( array (
             ':user' => $b_username,
            ':pass' => $b_password 
        ));
                
       $result = $statement->fetch();
       if($result){
             $query2 = "SELECT TU.Descripcion AS tipoUsuario, U.nombresUsu AS nombres,
             U.apellidosUsu AS apellidos FROM usuario U INNER JOIN 
             tipoUsuario TU ON TU.idTipoUsuario = U.idTipoUsuario  WHERE U.loginUsuario = :user2
             AND U.claveUsuario = :pass2";
             $statement2 = $conn->prepare($query2);
             $statement2->execute( array (
                ':user2' => $b_username,
               ':pass2' => $b_password 
            ));
      
                    while($row = $statement2->fetch()){
                        $description_user = $row['tipoUsuario'];
                        $name_user = $row['nombres'];
                        $fullname_user = $row['apellidos'];
                      };

                    $_SESSION['usuario_logeado'] = $b_username;
                    $_SESSION['usuario_nombre'] = $name_user;
                    $_SESSION['usuario_apellido'] = $fullname_user;
                    $_SESSION['usuario_descripcion'] = $description_user;
                    header('location: index.php');

                }else{
                    $errores = 'Usuario o contraseña incorrecta.';

                }

    }

}





?>