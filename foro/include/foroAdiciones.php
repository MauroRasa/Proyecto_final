<?php
function todoHeader($img, $usuario){
echo '
<header>
    <div class="logoFPG">
        <img onclick="volverARed()" src="../imagenes/Logo.png" alt="">
    </div>
    <div class="barraDeBusqueda">
        <form action="buscarForo.php" method="POST">
            <input type="text" class="iconoPlaceHolder" name="barraDeBusqueda" id="barraDeBusqueda" placeholder="Buscar en FPGForo"> 
            <input type="submit" name="buscar" style="display:none;">
        </form>
    </div>
    <div class="imagenDePerfilHeader">
        <div class="btn-group">
            <button type="button" class="btn dropdown-toggle custom-btn" data-toggle="dropdown" aria-expanded="false">
                <img src ="../imagenes/imagenes_perfil/'; echo $img; echo'" id="imagen_perfil_header">
                <span>'; echo $usuario; echo'</span>
            </button>
            <div class="dropdown-menu dropdown-menu-end">
                <a href="" class="dropdown-item" type="button">Configuración</a>
                <a href="../index.php" class="dropdown-item" type="button">Volver a FPG</a>
                <a href="../logout.php" class="dropdown-item" type="button">Cerrar Sesión</a>
                <div class="menuResponsive">
                    <a href="publicacionesForo.php" class="dropdown-item" type="button">Inicio</a>
                    <a href="" class="dropdown-item" type="button">Tags</a>
                </div>
            </div>
        </div>
    </div>
</header>
';
?>
<script>
function volverARed() {
    document.body.classList.add('slide-out'); // Agrega una clase para desplazarse hacia afuera

    // Obtén la altura total de la página
    const alturaTotal = Math.max(
        document.body.scrollHeight,
        document.body.offsetHeight,
        document.documentElement.clientHeight,
        document.documentElement.scrollHeight,
        document.documentElement.offsetHeight
    );

    // Calcula la duración de la animación en función de la altura de la página
    const duracionAnimacion = alturaTotal / 1000; 
    setTimeout(function () {
        window.location.href = 'publicaciones.php'; // Redirigir a la página 2
    }, duracionAnimacion * 300); // Multiplica la duración de la animación por 1000 para convertirla en milisegundos
}

</script>
<style>
    .slide-out {
        animation: slideOut 1s forwards;
    }

    @keyframes slideOut {
        0% {
            transform: translateY(0);
        }
        100% {
            transform: translateY(300px);
        }
    }
</style>
<?php
}
function pantallaDerecha(){
echo '
<div class="pestanaDerecha">
        <div class="contenidoDerecha">
            <p>Preguntas populares</p>
            <a href="responderForo.php?id=1"><span class="material-symbols-outlined">live_help</span>¿Que plan de la pagina me recomiendan?</a>
            <a href="responderForo.php?id=2"><span class="material-symbols-outlined">live_help</span>¿Estoy haciendo mal press banca?</a>
            <a href="responderForo.php?id=3"><span class="material-symbols-outlined">live_help</span>¿Por que me duele el hombro?</a>
            <a href="responderForo.php?id=4"><span class="material-symbols-outlined">live_help</span>¿Como hago correctamente remo?</a>
            <a href="responderForo.php?id=5"><span class="material-symbols-outlined">live_help</span>¿Es recomendable hacer peso muerto?</a>
        </div>
    </div>
';
}
function pantallaIzquierda(){
echo '
<div class="pestanaIzquierda">
        <div class="contenidoIzquierda">
            <p>Menú</p>
            <a href="publicacionesForo.php"><span class="material-symbols-outlined">house</span>Inicio</a>
            <a class="botonEtiqueta"><span class="material-symbols-outlined">sell</span>Etiquetas</a>
            <div class="mostrarEtiquetas">
                <a href="responderForo.php?id=1" class="etiqueta">#pregunta</a>
                <a href="responderForo.php?id=2" class="etiqueta">#press</a>
                <a href="responderForo.php?id=3" class="etiqueta">#hombro</a>
                <a href="responderForo.php?id=4" class="etiqueta">#remo</a>
                <a href="responderForo.php?id=5" class="etiqueta">#pesomuert</a>
            </div>
        </div>
    </div>
';
?>
<script>
    document.addEventListener('DOMContentLoaded', function() {
    const botonEtiqueta = document.querySelectorAll('.botonEtiqueta');
    const mostrarEtiquetas = document.querySelector('.mostrarEtiquetas');

    botonEtiqueta.forEach(etiqueta => {
        etiqueta.addEventListener('click', function() {
            if (mostrarEtiquetas.style.display === 'block') {
                mostrarEtiquetas.style.display = 'none';
            } else {
                mostrarEtiquetas.style.display = 'block';
            }
        });
    });
});

</script>
<?php
}

?>