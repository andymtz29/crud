<?php

session_start();
if (!isset($_SESSION['usuario'])) {
    header('location: login.php');
}
require_once "./app/config/dependencias.php";
require_once "./app/controller/db.php";

// Consulta a la tabla t_producto
$sql = "SELECT * FROM t_producto";
$query = $conn->prepare($sql);
$query->execute();
$productos = $query->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Productos</title>
    <link rel="stylesheet" href="<?=CSS.'tabla.css';?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <style>
        .cerrar-sesion, .editar {
            position: absolute;
            top: 10px;
            padding: 10px 20px;
            font-size: 16px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            text-decoration: none;
            color: white;
            font-weight: bold;
            transition: background-color 0.3s ease, box-shadow 0.3s ease;
        }

        .cerrar-sesion {
            right: 10px;
            background-color: #ff4d4d;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .cerrar-sesion:hover {
            background-color: #ff1a1a;
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
        }

        .editar {
            right: 160px;
            background-color: #4CAF50;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .editar:hover {
            background-color: #45a049;
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
        }

        .cerrar-sesion i, .editar i {
            margin-right: 8px;
        }
    </style>

</head>
<body>

<h1> <i class="fas fa-list"></i> 
Lista de Productos
</h1>

<div class="table-container">
    <table>
        <thead>
            <tr>
                <th><i class="fas fa-hashtag"></i>ID</th>
                <th><i class="fas fa-box"></i>Producto</th>
                <th><i class="fas fa-dollar-sign"></i>Precio</th>
                <th><i class="fas fa-layer-group"></i>Cantidad</th>
                <th><i class="fas fa-cog"></i>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($productos as $producto): ?>
            <tr>
                <td><?php echo $producto['id_producto']; ?></td>
                <td><?php echo $producto['producto']; ?></td>
                <td><?php echo $producto['precio']; ?></td>
                <td><?php echo $producto['cantidad']; ?></td>
                <td class="actions">
                    <a href="./app/controller/editar.php?id=<?php echo $producto['id_producto']; ?>" class="edit">
                        <i class="fas fa-edit"></i>Editar
                    </a>
                    <a href="#" class="delete" onclick="eliminar_producto(<?php echo $producto['id_producto']; ?>);">
                        <i class="fas fa-trash-alt"></i>Eliminar
                    </a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <div class="container">
        <a href="./app/controller/agregar.php" class="add-product">
            <i class="fas fa-plus"></i>Agregar Producto
        </a>


        <button class="cerrar-sesion" id="cerrar">
            <i class="fas fa-sign-out-alt"></i>Cerrar Sesión
        </button>

    </div>

    <a href="./info_usuario.php" class="editar" id="editar">
            <i class="fas fa-sign-out-alt"></i>Editar Usuario
    </a>



</div>

</div>

<script src="./public/js/jquery.js"></script>
<script src="./public/js/cerrar_sesion.js"></script>
<script src="./public/js/crud.js"></script>
</body>
</html>
