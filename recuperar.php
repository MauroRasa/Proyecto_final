<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<form action="" method="POST">
    <label for="newContrasenia"> Introduzca la nueva contraseña</label>
    <input type="pasword" name="newContra" id="newContra">

    <label for="newContrasenia"> Confirme la nueva contraseña</label>
    <input type="pasword" name="newContraConf" id="newContraConf">

    <button type="submit" name="recuperar">Recuperar</button>
</form>
    
<?php
require_once("conexion.php");

if (isset($_POST['recuperar'])) {
    $usuario = $_GET['usuario'];
    $newContra = $_POST['newContra'];
    $newContraConf = $_POST['newContraConf'];

    if ($newContra !== $newContraConf) {
        echo "Las contraseñas no coinciden.";
    }else {
        $newContra = password_hash($newContra, PASSWORD_DEFAULT);
        $sql = "UPDATE usuarios SET Pass='$newContra' WHERE Usuario = '$usuario'";
        $query = mysqli_query($conexion, $sql)? print ("<script> alert ('Contraseña cambiada con exito'); window.location = 'index.php'</script>") : print ("<script> alert ('Error al recuperar'</script>");
    }
}
?>

</body>
</html>