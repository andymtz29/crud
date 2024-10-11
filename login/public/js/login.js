const iniciar_sesion = () => {
    let usuario = $("#usuario").val();
    let password = $("#password").val();
    let data = new FormData();
    data.append("usuario",usuario);
    data.append("password", password);
    fetch("./app/controller/login.php", {
        method: "POST",
        body:data
    }).then(respuesta => respuesta.json())
    .then(respuesta => {
        if (respuesta[0]==1) {
            alert(respuesta[1]);
            window.location="index.php";
        }else{
            alert(respuesta[1]);
        }
    }).catch(error => error);

    
}
$('#btn_iniciar').on('click', ()=>{
    iniciar_sesion();
})