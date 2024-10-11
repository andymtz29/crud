
// Función para registrar un producto
const registrar_producto = () => {
    let nombre_producto = document.getElementById('producto').value;
    let cantidad_producto = document.getElementById('cantidad').value;
    let precio_producto = document.getElementById('precio').value;

    let data = new FormData();
    data.append("producto", nombre_producto);
    data.append("cantidad", cantidad_producto);
    data.append("precio", precio_producto);
    data.append("action", "registrar");

    fetch("./agregar.php", {
        method: "POST",
        body: data
    }).then(respuesta => respuesta.json())
    .then(respuesta => {
        alert(respuesta[1]);
        if (respuesta[0] == 1) {
            window.location = "../../index.php"; 
        }
    });
}

// Función para eliminar producto
const eliminar_producto = (id_producto) => {
    if (confirm("¿Estás seguro de que deseas eliminar este producto?")) {
        let data = new FormData();
        data.append("producto_key", id_producto); 
        data.append("action", "eliminar");

        fetch("./app/controller/eliminarProducto.php", {
            method: "POST",
            body: data
        }).then(respuesta => respuesta.json())
        .then(respuesta => {
            alert(respuesta[1]); 
            if (respuesta[0] == 1) {
                alert(respuesta[1]);
                window.location = "index.php"; 
            }
        });
    }
}


// Función para editar producto
const editar_producto = (precio) => {
    let nombre_producto = document.getElementById('producto').value;
    let cantidad_producto = document.getElementById('cantidad').value;
    let precio_producto = document.getElementById('precio').value;

    let data = new FormData();
    data.append("producto", nombre_producto);
    data.append("cantidad", cantidad_producto);
    data.append("precio", precio_producto);
    data.append("action", "editar");

    fetch("./editar.php?id=" + precio, { 
        method: "POST",
        body: data
    }).then(respuesta => respuesta.json())
    .then(respuesta => {
        alert(respuesta[1]);
        if (respuesta[0] == 1) {
            alert(respuesta[1]);
            window.location = "../../index.php"; // Redirigir al listado después de la actualización
        }
    });
}
