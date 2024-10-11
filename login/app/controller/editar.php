<?php
    require_once '../config/conexion.php';

$id = $_GET['id'];

// Obtener datos del producto a editar
$sql = "SELECT * FROM t_producto WHERE id_producto = :id";
$query = $conexion->prepare($sql);
$query->bindParam(':id', $id);
$query->execute();
$producto = $query->fetch(PDO::FETCH_ASSOC);

// Procesar la solicitud POST desde fetch
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['action']) && $_POST['action'] === 'editar') {
        $producto_nombre = $_POST['producto'];
        $precio = $_POST['precio'];
        $cantidad = $_POST['cantidad'];

        // Actualizar producto en la base de datos
        $sql = "UPDATE t_producto SET producto = :producto, precio = :precio, cantidad = :cantidad WHERE id_producto = :id";
        $query = $conexion->prepare($sql);
        $query->bindParam(':producto', $producto_nombre);
        $query->bindParam(':precio', $precio);
        $query->bindParam(':cantidad', $cantidad);
        $query->bindParam(':id', $id);

        if ($query->execute()) {
            // Respuesta exitosa en formato JSON
            echo json_encode([1, "Producto actualizado exitosamente."]);
        } else {
            // Error al actualizar
            echo json_encode([0, "Error al actualizar el producto."]);
        }
    } else {
        echo json_encode([0, "Acción no válida."]);
    }
    exit(); // Terminar el script después de enviar la respuesta JSON
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Producto</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="<?php echo '../../public/css/editarProducto.css'; ?>">
</head>

<body>

<div class="container">
        <h1><i class="fas fa-edit"></i> Editar Producto</h1>

        <form id="editar-form">
            <div class="form-group">
                <label for="producto"><i class="fas fa-box"></i> Producto:</label>
                <input type="text" id="producto" value="<?php echo $producto['producto']; ?>" required>
            </div>

            <div class="form-group">
                <label for="precio"><i class="fas fa-dollar-sign"></i> Precio:</label>
                <input type="number" step="0.01" id="precio" value="<?php echo $producto['precio']; ?>" required>
            </div>

            <div class="form-group">
                <label for="cantidad"><i class="fas fa-sort-numeric-up"></i> Cantidad:</label>
                <input type="number" id="cantidad" value="<?php echo $producto['cantidad']; ?>" required>
            </div>

            <button type="button" onclick="editar_producto(<?php echo $producto['id_producto']; ?>)">
                <i class="fas fa-save"></i> Guardar Cambios
            </button>
        </form>

        <a href="../../index.php" class="regresar"><i class="fas fa-arrow-left"></i> Regresar al listado</a>
    </div>

    <script src="../../public/js/crud.js"></script>

</body>

</html>
