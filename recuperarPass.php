<!DOCTYPE html>
<html lang="en">
<head>
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<form action="" method="POST">
    <label for="email">Ingrese su Correro Electronico</label>
    <input type="text" name="email" id="email">

    <button type="submit" name="recuperar">Recuperar</button>
</form>

<?php
require_once("conexion.php");


if (isset($_POST['recuperar'])) {
    $email = $_POST['email'];
    $sql = "SELECT * FROM usuarios WHERE Email = '$email'";
    $query = mysqli_query($conexion, $sql);

    if (mysqli_num_rows($query) > 0) {
        $registro = mysqli_fetch_array($query);
        $usuario = $registro['Usuario'];
        $token = time();

        $sql2 = "UPDATE usuarios SET Token_u = '$token' WHERE Usuario = '$usuario'";
        $query2 = mysqli_query($conexion, $sql2);
    } else {
        echo '<div class="error">No existe ninguna cuenta asociada a este correo electrónico.</div>';
    }

?>


<script>
  let url_final = 'https://formsubmit.co/ajax/<?php echo $email; ?>'; 
  let usuario = '<?php echo $usuario; ?>';
  let mensaje = 'Hola, para restablecer tu contraseña, haz clic en el siguiente enlace: http://localhost/Proyecto_final/recuperarPass.php?token=<?php echo $token ?>';
  $.ajax({
    method: 'POST',
    url: url_final,
    dataType: 'json',
    accepts: 'application/json',
    data: {
      name: usuario,
      message: mensaje,
    },
    success: (data) => window.location = 'index.php?send=1',
    error: (err) => window.location = 'index.php?send=0',
  });
</script>
<?php } ?>
<?php 

if(isset($_GET['send'])){
  if($_GET['send']==1){
    echo '<script>';
    echo 'alert("Se ha enviado un correo con instrucciones para restablecer tu contraseña.");';
    echo '</script>';
  }else{
    echo '<div class="error">Error al enviar el correo de recuperación de contraseña.</div>';
}
}

if(isset($_GET['token'])){
  $token = $_GET['token'];
  $sql3 = "SELECT * FROM usuarios WHERE Token_u = '$token'";
  $consulta = mysqli_query($conexion, $sql3);
  if(mysqli_num_rows($consulta) > 0){
    $registro = mysqli_fetch_array($consulta);
    $usuario = $registro['Usuario'];
    $sql4 = "UPDATE usuarios SET Token_u = '1' WHERE Token_u = '$token'";
    $actualizar = mysqli_query($conexion, $sql4) ? print ("<script> alert ('Usuario validado correctamente, por favor introduzca la nueva contraseña'); window.location = 'recuperar.php?usuario=" . $usuario . "'</script>") : print ("<script> alert ('Error al validar'</script>");
  }
}

?>



</body>
</html>