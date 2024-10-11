<?php
// importamos la conexion de la BD
    require_once '../config/conexion.php';
    // usamos la sesion start
    session_start();
    // recuperacion de datos del cliente
    $usuario = $_POST['usuario'];
    $password = $_POST['password'];

    // consulta de datos a la base de datos
    // preparamos la consulta
    $consulta = $conexion->prepare("SELECT * FROM t_usuario WHERE
    usuario = :usuario");
    // brindamos los parametros de consulta
    $consulta->bindParam(':usuario',$usuario);
    // ejecutamos la consulta
    $consulta->execute();
    // obtenemos los datos y guardamos
    $datos = $consulta->fetch(PDO::FETCH_ASSOC);
    // validar que se recuperen datos
    if($datos){
        // validacion de password
        if($datos['password'] == $password){
            // creacion de 
            $_SESSION['usuario'] = $datos;
            echo json_encode([1, "Sesion Iniciada"]);
        }else{
            // regresamos una respuesta en formato json
            echo json_encode([0, "Error en credenciales de acceso!"]);
        }
    }else{
        // error al buscar informacion
        echo json_encode([0, "Informacion no localizada!"]);
    }
?>