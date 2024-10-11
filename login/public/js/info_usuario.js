const obtener_datos = () => {
    fetch("app/controller/info_usuario.php")
    .then(respuesta => respuesta.json())
    .then(respuesta => {
        document.getElementById('usuario').value = respuesta[0]['usuario'];
        document.getElementById('pass').value = respuesta[0]['password'];
    });
}

const editar = () => {
    let usuario = document.getElementById('usuario').value;
    let pass = document.getElementById('pass').value;
    let data = new FormData();
    data.append("usuario", usuario);
    data.append("pass", pass);

    fetch("app/controller/editar_usuario.php", { 
        method: "POST",
        body: data
    }).then(respuesta => respuesta.json())
    .then(respuesta => {
        if (respuesta[0] == 1) {
            alert(respuesta[1]);
            window.location = "index.php"; // Redirigir al listado después de la actualización
        }
    });
}

document.addEventListener('DOMContentLoaded',() => {
    obtener_datos();
});

document.getElementById('editar').addEventListener('click',() => {
    editar();
});