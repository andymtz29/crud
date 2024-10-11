<?php
    require_once '../config/conexion.php';

    // $consulta = $conexion->prepare("SELECT * FROM t_usuario WHERE id_usuario = ?");
    // $valor = 1;
    // $consulta->bindParam("?",$valor);
    // $consulta->execute();
    // $datos = $consulta->fetchAll(PDO::FETCH_ASSOC);

    // foreach($datos as $usuario){
    //     echo $usuario['usuario'],'<br>';
    // }
    // echo print_r($datos);

    
    $consulta = $conexion->prepare("SELECT * FROM t_usuario");
    $consulta->execute();
    $datos = $consulta->fetchAll(PDO::FETCH_ASSOC);
    echo print_r($datos);

    

   
?>
