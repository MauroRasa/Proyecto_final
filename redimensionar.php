<?php
function redimensionarImg ($img, $ancho_f, $alto_f){
	//extraemos atributos de la imágen
	list($ancho_i,$alto_i,$nro_tipo)=getimagesize($img);

	//Creamos una variable a partir de la imagen original según su tipo

	switch ($nro_tipo) {
		case 1: $img_inicial = imagecreatefromgif($img); break;
		case 2: $img_inicial = imagecreatefromjpeg($img); break;
		case 3: $img_inicial = imagecreatefrompng($img); break;
		default:
			echo "imagen invalida";
			break;
	}

//Calculamos RATIO proporción entre las magnitudes originales y finales
$ratio_ancho = $ancho_f/$ancho_i;
$ratio_alto = $alto_f/$alto_i;

//obtenemos maximo entre los RATIOS
$ratio_max = max($ratio_ancho, $ratio_alto);

//Utilizamos el ratio maximo para calcular el nuevo ancho y alto de la imágen

$nvo_ancho = $ancho_i * $ratio_max;
$nvo_alto = $alto_i * $ratio_max;

//Calculamos recortes
$cortar_ancho = $nvo_ancho - $ancho_f;
$cortar_alto = $nvo_alto - $alto_f;

//definimos el desplazamiento en o.5 asi se recorta la parte central de la imagen
$desplazamiento = 0.9;

//creamos una imagen en blanco con los tamaños finales
$nueva_img = imagecreatetruecolor($ancho_f, $alto_f);

//copiamos la imagen original sobre la acabamos de crear en blanco

imagecopyresampled($nueva_img, $img_inicial, 0, 0, $cortar_ancho * $desplazamiento, $cortar_alto * $desplazamiento, $ancho_f, $alto_f, $ancho_i - $cortar_ancho, $alto_i - $cortar_alto);

//se destruye la variable original para liberar memoria
imagedestroy($img_inicial);

//definimos calidad de la imagen a guardar
$calidad = 300;

//definimos el nombre final de la imagen, para que sea unico lo concatenamos con la funcion time()
$nbr_img =time()."-".$img;

//creamos la imagen final en el directorio indicado

imagejpeg($nueva_img,'imagenes/imagenes_perfil/'.$nbr_img,$calidad);
chmod('imagenes/imagenes_perfil/'.$nbr_img, 0777);

//retorna el nombre de la nueva imagen
return $nbr_img;
}

 ?>