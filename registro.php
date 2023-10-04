<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link rel="stylesheet" type="text/css" href="estilos/style.css">
</head>
<body>
    <div class="outer-container">
        <div class="container">
            <div class="form-container">
                <h2>Registro</h2>
                <form action="sesion.php" method="POST">
                    <label for="usuario">Usuario:</label>
                    <input type="text" id="usuario" name="usuario" required><br>

                    <label for="password">Contraseña:</label>
                    <input type="password" id="password" name="password" required><br>

                    <label for="email">email:</label>
                    <input type="text" id="email" name="email" required><br>

                    <label for="confirm_password">Confirmar Contraseña:</label>
                    <input type="password" id="confirm_password" name="confirm_password" required><br>
                    
                    <button class="bt" type="submit" name="registrarse" action="sesion.php">Registrarse </but>
                    
                </form>
            </div>   
                    <a href="index.html" class="back-button">
                        <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 50 50">
                            <line x1="10" y1="10" x2="40" y2="40" stroke="white" stroke-width="3" />
                            <line x1="40" y1="10" x2="10" y2="40" stroke="white" stroke-width="3" />
                        </svg>
                  </a>
            <div class="image-container">
                <img src="imagenes/image.jpg" alt="Imagen">
            </div>
        </div>
    </div>
<?php
if (isset($_POST['registrarse'])) {
    // Recibe los datos del formulario
    $usuario = $_POST['usuario'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // Validación de los datos (las contraseñas deben coincidir)
    if ($password !== $confirm_password) {
        echo "Las contraseñas no coinciden.";
    } else {
         $conn = mysqli($servername, $username, $password, $dbname);
        // Verificar la conexión
        if ($conn->connect_error) {
            die("Error de conexión: " );
        }

        // Consulta para insertar los datos en la base de datos
        $sql = "INSERT INTO usuarios (usuario, password) VALUES (id, usuaris, contrasenea)";

        // Preparar la consulta
        $stmt = $conn->prepare($sql);

        // Enlazar los parámetros
        $stmt->bind_param("usuarios,password", $usuario, $hashed_password);

        // Ejecutar la consulta
        if ($stmt->execute()) {
            echo "Registro exitoso. ¡Bienvenido!";
        } else {
            echo "Error al registrar: " . $conn->error;
        }

        // Cerrar la conexión y liberar recursos
        $stmt->close();
        $conn->close();
    }
}
?>


</body>
</html>
