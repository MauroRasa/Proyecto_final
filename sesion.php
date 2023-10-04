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
                <form action="index.html" method="POST">
                    <label for="usuario">Usuario:</label>
                    <input type="text" id="usuario" name="usuario" required><br>

                    <label for="password">Contraseña:</label>
                    <input type="password" id="password" name="password" required><br>

                    <button class="bt" type="submit" name="inicio">iniciar</but> 
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
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Recibe los datos del formulario
    $nombre_usuario = $_POST['nombre_usuario'];
    $contrasena = $_POST['contrasena'];

    // Conexión a la base de datos (reemplaza con tus propios datos)
            $servername = "localhost"; // Cambia a tu servidor MySQL
        $username = "root"; // Cambia a tu nombre de usuario de MySQL
        $password = ""; // Cambia a tu contraseña de MySQL
        $dbname = "registros"; // Cambia al nombre de tu base de datos

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Error de conexión: " . $conn->connect_error);
    }

    // Consulta para verificar las credenciales de inicio de sesión
    $sql = "SELECT * FROM usuarios WHERE nombre_usuario = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $nombre_usuario);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();

    if ($row && password_verify($contrasena, $row['contrasena'])) {
        // Inicio de sesión exitoso
        $_SESSION['nombre_usuario'] = $nombre_usuario; // Guardar el nombre de usuario en la sesión
        header("Location: pagina_de_inicio.php"); // Redirigir a la página de inicio después del inicio de sesión
        exit();
    } else {
        // Las credenciales son incorrectas, muestra un mensaje de error
        echo "Nombre de usuario o contraseña incorrectos. Por favor, inténtalo de nuevo.";
    }

    $stmt->close();
    $conn->close();
}
?>
?>


</body>
</html>
