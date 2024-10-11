<?php
    require_once '../config/conexion.php';

    $actualizacion = $conexion->prepare("UPDATE t_usuario SET usuario = :usuario WHERE id_usuario = :id_usuario");
    $usuario = "usuario actualizado";
    $id_usuario = 2;
    $actualizacion->bindParam(':usuario',$usuario);
    $actualizacion->bindParam(':id_usuario',$id_usuario);
    $actualizacion->execute();
    if ($actualizacion) {
        echo "actualizacion correcta";
    } else {
        echo "actualizacion no realizada";
    }
?>


