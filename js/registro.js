function validarFormulario() {
    var contra = document.getElementById('passwordRegistro').value.trim();
    var contraConfirm = document.getElementById('confirm_password').value.trim();
    var email = document.getElementById('email').value;

    fetch('js/verificar_email.php?email=' + email)
        .then(function(response) {
            return response.text();
        })
        .then(function(data) {
            if (data == 'existe') {
                alert('El correo electrónico ya existe en la base de datos. Por favor, utiliza otro correo electrónico.');
            } else {
                if (contra == contraConfirm) {
                    document.getElementById('formularioRegistro').action = 'registro.php';
                    document.getElementById('formularioRegistro').submit();
                } else {
                    alert('Las contraseñas no coinciden');
                }
            }
        })
        .catch(function(error) {
            console.log('Error en la solicitud:', error);
        });


    return false;
}