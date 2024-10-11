<?php
    require_once '../config/conexion.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Verificamos que la acción es "registrar"
    if (isset($_POST['action']) && $_POST['action'] === 'registrar') {
        $producto = $_POST['producto'];
        $precio = $_POST['precio'];
        $cantidad = $_POST['cantidad'];

        // Insertar producto en la base de datos
        $sql = "INSERT INTO t_producto (producto, precio, cantidad) VALUES (:producto, :precio, :cantidad)";
        $query = $conexion->prepare($sql);
        $query->bindParam(':producto', $producto);
        $query->bindParam(':precio', $precio);
        $query->bindParam(':cantidad', $cantidad);

        if ($query->execute()) {
            // Si la inserción es exitosa, devolvemos una respuesta JSON
            echo json_encode([1, "Producto registrado exitosamente."]);
        } else {
            // Si hay un error en la inserción
            echo json_encode([0, "Error al registrar el producto."]);
        }
    } else {
        echo json_encode([0, "Acción no válida."]);
    }
    exit(); // Finalizamos el script PHP aquí
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Producto</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="<?php echo '../../public/css/agregarProductos.css'; ?>">
</head>

<body>

<div class="container">
        <h1><i class="fas fa-box-open"></i> Agregar Producto</h1> <!-- Icono al lado del título -->

        <form id="producto-form" class="formulario">
            <div class="form-group">
                <label for="producto"><i class="fas fa-tag"></i> Producto:</label> <!-- Icono de etiqueta -->
                <input type="text" id="producto" class="input-text" required>
            </div>

            <div class="form-group">
                <label for="precio"><i class="fas fa-dollar-sign"></i> Precio:</label> <!-- Icono de dólar -->
                <input type="number" step="0.01" id="precio" class="input-text" required>
            </div>

            <div class="form-group">
                <label for="cantidad"><i class="fas fa-boxes"></i> Cantidad:</label> <!-- Icono de cajas -->
                <input type="number" id="cantidad" class="input-text" required>
            </div>

            <button type="button" class="btn" onclick="registrar_producto()">
                <i class="fas fa-plus-circle"></i> Agregar <!-- Icono de agregar -->
            </button>

        </form>

        <a href="../../index.php" class="regresar"><i class="fas fa-arrow-left"></i> Regresar al listado</a> <!-- Icono de regresar -->
    </div>

    <script src="../../public/js/crud.js"></script> <!-- Asegúrate de que la ruta sea correcta -->
</body>
</html>
