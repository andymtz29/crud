<?php
session_start();
require_once '../config/conexion.php';

$usuario = $_POST['usuario'];
$pass = $_POST['pass'];

$actualizacion = $conexion->prepare("UPDATE t_usuario SET usuario = :usuario, password = :password WHERE id_usuario = :id_usuario");
$actualizacion->bindParam(':usuario',$usuario);
$actualizacion->bindParam(':password',$pass);
$actualizacion->bindParam(':id_usuario',$_SESSION['usuario']['id_usuario']);
$actualizacion->execute();
if ($actualizacion) {
    echo json_encode([1,"actualizacion correcta"]);
} else {
    echo json_encode([0,"actualizacion no correcta"]);
}


?>