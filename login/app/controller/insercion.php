<?php
    require_once '../config/conexion.php';

    $insercion = $conexion->prepare("INSERT INTO t_usuario (usuario) VALUES (:usuario)");
    $usuario = "test";
    $insercion->bindParam(':usuario',$usuario);
    $insercion->execute();
    if ($insercion) {
        echo "insercion correcta";
    } else {
        echo "insercion no realizada";
    }
?>
