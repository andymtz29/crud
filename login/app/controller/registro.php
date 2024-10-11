<?php
require_once "../config/conexion.php";
session_start();

$expresion = '/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/';



if ($_POST) {

    if (
        isset($_POST['usuario']) && !empty($_POST['usuario']) &&
        isset($_POST['pass']) && !empty($_POST['pass'])) {
        

        $usuario = $_POST['usuario'];
        $pass = $_POST['pass'];

        $insercion = $conexion->prepare("INSERT INTO t_usuario (usuario,password) 
        VALUES(:usuario,:password)");
             $insercion->bindParam(':usuario',$usuario);
             $insercion->bindParam(':password',$pass);
             $insercion->execute();

        echo json_encode([1, "Registro exitoso"]);
    } else {

        echo json_encode([0, "Faltan datos. Por favor, completa todos los campos."]);
    }
}
?> 









