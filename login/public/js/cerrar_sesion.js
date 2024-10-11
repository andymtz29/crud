const cerrar_sesion = () => {
    fetch("app/controller/cerrar.php")
    .then(respuesta => respuesta.json())
    .then(respuesta => {
        alert(respuesta[1]);
        window.location="login.php";
    });
};

$("#cerrar").on('click', () => {
    cerrar_sesion();
});

