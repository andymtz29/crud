<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Usuario</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="editarUsuario.css">

    <style>
        body {
    font-family: Arial, sans-serif;
    background-image: url('https://career.dar-link.ru/img/picture.png'); 
    background-size: cover;
    background-position: center;
    background-attachment: fixed; 
    margin: 0;
    padding: 0;
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
    min-height: 100vh;

}

.login-container {

    border-radius: 10px; /* Bordes redondeados */
}

.login-form {
    width: 100%; /* Asegura que el formulario ocupe todo el ancho */
    max-width: 400px; /* Máximo ancho para el formulario */
    margin: auto; /* Centra el formulario */
}
    </style>
</head>
<body>

    <div class="login-container d-flex justify-content-center align-items-center vh-100">
        <form id="frm_login" class="login-form p-4 shadow rounded bg-light">
            <div class="text-center mb-4">
                <i class="fa-solid fa-user-circle fa-3x text-primary"></i>
                <h3 class="mt-3">Editar Información de Usuario</h3>
            </div>
            <div class="form-floating mb-3">
                <input class="form-control" id="usuario" name="usuario" type="text" placeholder="e-mail">
                <label class="text-primary" for="usuario">
                    <i class="fa-solid fa-envelope me-2"></i>Editar Usuario
                </label>
            </div>
            <div class="form-floating mb-3">
                <input class="form-control" id="pass" name="pass" type="password" placeholder="password">
                <label class="text-primary" for="pass">
                    <i class="fa-solid fa-lock me-2"></i>Editar Contraseña
                </label>
            </div>
            <div class="d-grid">
                <button type="button" id="editar" class="btn btn-primary btn-block">
                    <i class="fa-solid fa-sign-in-alt me-2"></i> Editar
                </button>
            </div>
        </form>
    </div>
    
    <script src="./public/js/info_usuario.js"></script>
</body>
</html>
