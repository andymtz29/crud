<?php
    require_once '../config/conexion.php';

     $eliminar = $conexion->prepare("DELETE FROM t_usuario WHERE id_usuario = :id_usuario");
     $id_usuario = "4";
     $eliminar->bindParam(':id_usuario',$id_usuario);
     $eliminar->execute();
     if ($eliminar) {
         echo "Eliminacion correcta";
     } else {
         echo "Eliminacion no realizada";
     }
?>