<?php
session_start();
if (isset($_SESSION['usuario'])) {
    header('location: ./index.php');
}
require_once("./app/config/dependencias.php");


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?=CSS."bootstrap.min.css";?>">

    <title>Formulario de datos</title>
</head>
<body class="vh-100 d-flex justify-content-center align-items-center" style="background-image: url('https://img.freepik.com/foto-gratis/puesta-sol-siluetas-arboles-montanas-ia-generativa_169016-29371.jpg?w=1060&t=st=1727301044~exp=1727301644~hmac=33b6377ee9f857e2604b75f6467c5752f7498cda8c58bd56a8dcad2dfe349432'); background-size: cover; background-position: center;">
    <form action="./registro_vista.php" method="post" class="w-25 p-4 bg-white shadow rounded">
        <div class="text-center mb-4">
            <i class="bi bi-person-plus fs-1 text-primary"></i>
            <h3 class="text-primary">Crear Cuenta</h3>
        </div>

        <div class="input-group mt-3">
            <span class="input-group-text bg-info text-white"><i class="bi bi-person-fill fs-5"></i></span>
            <input type="text" class="form-control" placeholder="Ingrese su usuario" id="usuario" name="usuario" value="<?= (!empty($_POST['usuario'])) ? $_POST['usuario'] : ''; ?>" required>
        </div>

        <div class="input-group mt-3">
            <span class="input-group-text bg-info text-white"><i class="bi bi-envelope-fill fs-5"></i></span>
            <input type="password" class="form-control" placeholder="Ingrese su password" id="pass" name="pass" value="<?= (!empty($_POST['pass'])) ? $_POST['pass'] : ''; ?>" required>
        </div>

        <div class="d-grid mt-4">
            <button class="btn btn-primary" type="button" id="btn-registrar">Registrarse</button>
        </div>
    </form>

    <!-- Enlace a Bootstrap JS -->


    </form>
    <script src="./public/js/registro.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>