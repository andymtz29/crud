

const confirmacion = () => {

    let usuario = document.getElementById("usuario").value;
    let pass = document.getElementById("pass").value;

    let datos = new FormData();
    

    datos.append("usuario", usuario);
    datos.append("pass", pass);
    
    fetch("app/controller/registro.php",{
        method:"POST",
        body:datos
    }).then(respuesta => respuesta.json())
        .then(respuesta => {            
            if (respuesta[0] == 1) {
                alert(respuesta[1]);
                window.location="login.php";
            } else{
                alert(respuesta[1]);
            }
            
        })   
}

document.getElementById("btn-registrar").addEventListener("click",()=>{
    confirmacion();
});

