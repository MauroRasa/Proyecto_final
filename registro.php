<!DOCTYPE html>
<html lang="en">
<head>
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    


<?php
require_once("conexion.php");
if (isset($_POST['registrarse'])) {
    // Recibe los datos del formulario
    $usuario = $_POST['usuario'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $token = time();
    $confirm_password = $_POST['confirm_password'];

    // Validación de los datos (las contraseñas deben coincidir)
    if ($password !== $confirm_password) {
        echo "Las contraseñas no coinciden.";
    }

        $password = password_hash($password, PASSWORD_DEFAULT);

        // Consulta para insertar los datos en la base de datos
        $sql = "INSERT INTO usuariosprincipal (usuario, password, email, Token_u) VALUES ('$usuario', '$password', '$email', '$token')";
        $registrar = mysqli_query($conexion, $sql);

    
?>

<script>
  let url_final = 'https://formsubmit.co/ajax/<?php echo $email; ?>'; 
  let usuario = '<?php echo $usuario; ?>';
  let mensaje = 'Valide su correo : http://localhost/Proyecto_final/registrar.php?token=<?php echo $token; ?>';

  $.ajax({
    method: 'POST',
    url: url_final,
    dataType: 'json',
    accepts: 'application/json',
    data: {
      name: usuario,
      message: mensaje,
    },
    success: (data) => window.location = 'index.html?send=1',
    error: (err) => window.location = 'index.html?send=0',
  });
</script>
<?php } ?>
<?php 

if(isset($_GET['send'])){
  if($_GET['send']==1){
    echo 'bien';
  }else{
    echo 'error al enviar correo';
}
}

if(isset($_GET['token'])){
  $token = $_GET['token'];
  $sql2 = "SELECT * FROM usuariosprincipal WHERE Token_u = '$token'";
  $consulta = mysqli_query($conexion, $sql2);
  if(mysqli_num_rows($consulta) > 0){
    $sql3 = "UPDATE usuariosprincipal SET Token_u = '1' WHERE Token_u = '$token'";
    $actualizar = mysqli_query($conexion, $sql3) ? print ("<script> alert ('Usuario validado correctamente, por favor inicie sesion'); window.location = 'index.html'</script>") : print ("<script> alert ('Error al validar'</script>");
  }
}

?>

</body>
</html>