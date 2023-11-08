<?php
function sendCorreoVerificar(){
    if(isset($_GET['send'])){
        if($_GET['send']==1){
          echo '<script>';
          echo 'alert("Se ha enviado un correo para verificar la cuenta.");';
          echo '</script>';
        }else{
          echo 'error al enviar correo';
      }
      }
}


//Funciones para recuperar contraseña
function recuperar($conexion)
{
    if (isset($_POST['recuperar'])) {
        $emailRecuperar = $_POST['email'];
        $sqlRecuperar = "SELECT * FROM usuarios WHERE Email = '$emailRecuperar'";
        $queryRecuperar = mysqli_query($conexion, $sqlRecuperar);

        if (mysqli_num_rows($queryRecuperar) > 0) {
            $registroRecuperar = mysqli_fetch_array($queryRecuperar);
            $usuarioRecuperar = $registroRecuperar['Usuario'];
            $tokenRecuperar = time();

            $sqlRecuperar2 = "UPDATE usuarios SET Token_u = '$tokenRecuperar' WHERE Usuario = '$usuarioRecuperar'";
            $queryRecuperar2 = mysqli_query($conexion, $sqlRecuperar2);

            if ($queryRecuperar2) {
                ?>
                <script>
                    let url_finalRecuperar = 'https://formsubmit.co/ajax/<?php echo $emailRecuperar; ?>';
                    let usuarioRecuperar = '<?php echo $usuarioRecuperar; ?>';
                    let mensajeRecuperar = 'Hola, para restablecer tu contraseña, haz clic en el siguiente enlace: http://localhost/Proyecto_final/index.php?tokenRec=<?php echo $tokenRecuperar ?>';
                    $.ajax({
                        method: 'POST',
                        url: url_finalRecuperar,
                        dataType: 'json',
                        accepts: 'application/json',
                        data: {
                            name: usuarioRecuperar,
                            message: mensajeRecuperar,
                        },
                        success: (data) => window.location = 'index.php?sendRec=1',
                        error: (err) => window.location = 'index.php?sendRec=0',
                    });
                </script>
                <?php
            } else {
                echo '<div class="error">Hubo un problema al actualizar el token de recuperación.</div>';
            }
        } else {
            echo '<div class="error">No existe ninguna cuenta asociada a este correo electrónico.</div>';
        }
    }
}

function sendCorreoRecuperar(){
    if(isset($_GET['sendRec'])){
        if($_GET['sendRec']==1){
          echo '<script>';
          echo 'alert("Se ha enviado un correo con instrucciones para restablecer tu contraseña.");';
          echo '</script>';
        }else{
          echo '<div class="error">Error al enviar el correo de recuperación de contraseña.</div>';
      }
      }
}

function tokenRecuperar($conexion){
    if(isset($_GET['tokenRec'])){
        $tokenRecuperar = $_GET['tokenRec'];
        $sqlRecuperar3 = "SELECT * FROM usuarios WHERE Token_u = '$tokenRecuperar'";
        $consultaRecuperar = mysqli_query($conexion, $sqlRecuperar3);
        if(mysqli_num_rows($consultaRecuperar) > 0){
          $registroRecuperar = mysqli_fetch_array($consultaRecuperar);
          $usuarioRecuperar = $registroRecuperar['Usuario'];
          $sqlRecuperar4 = "UPDATE usuarios SET Token_u = '1' WHERE Token_u = '$tokenRecuperar'";
          $actualizarRecuperar = mysqli_query($conexion, $sqlRecuperar4) ? print ("<script> alert ('Usuario validado correctamente, por favor introduzca la nueva contraseña'); window.location = 'index.php?mostrarModal=true&usuario=" . $usuarioRecuperar . "'</script>") : print ("<script> alert ('Error al validar'</script>");
        }
      }
}

function recuperarFin($conexion){
    if (isset($_POST['recuperarFin'])) {
        $usuarioFinRecuperar = $_GET['usuario'];
        $newContra = $_POST['newContra'];
        $newContraConf = $_POST['newContraConf'];

        if ($newContra !== $newContraConf) {
            echo "Las contraseñas no coinciden.";
        }else {
            $newContra = password_hash($newContra, PASSWORD_DEFAULT);
            $sql = "UPDATE usuarios SET Pass='$newContra' WHERE Usuario = '$usuarioFinRecuperar'";
            $query = mysqli_query($conexion, $sql)? print ("<script> alert ('Contraseña cambiada con exito'); window.location = 'index.php'</script>") : print ("<script> alert ('Error al recuperar'</script>");
        }
    }
}

//Fin

function configuracionUsuario($conexion, $idConfig){
    include("redimensionar.php");

    if(isset($_POST['configuracionUsuario'])){
        $nuevoUsuario = $_POST['usuarioConfig'];

        if(is_uploaded_file($_FILES['imgConfig']['tmp_name'])){
            move_uploaded_file($_FILES['imgConfig']['tmp_name'], $_FILES['imgConfig']['name']);
      
            $nuevaImagen = redimensionarImg($_FILES['imgConfig']['name'], 100, 100);
            unlink($_FILES['imgConfig']['name']); //Borra imagen original
      
      
        }

        $consultaConfig = "UPDATE usuarios SET Usuario='$nuevoUsuario', Img_u='$nuevaImagen' WHERE ID_user='$idConfig'";
        $guardar = mysqli_query($conexion, $consultaConfig) ? print ("<script> alert ('Datos guardados correctamente'); window.location = 'index.php'</script>") : print ("<script> alert ('Error al guardar'</script>");
      }
}

?>