<?php
session_start();
require_once '../config/conexion.php';

$consulta = $conexion->prepare("SELECT * FROM t_usuario WHERE id_usuario = :id_usuario");
$consulta->bindParam(':id_usuario',$_SESSION['usuario']['id_usuario']);
$consulta->execute();
$datos = $consulta->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($datos);

?>