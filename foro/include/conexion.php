<?php
// conexion local
$server = "localhost";
$user = "root";
$pass = "";
$db = "foro2023";

//conexion servidor remoto
// $server = "sql105.epizy.com";
// $user = "	epiz_31390326";
// $pass = "szff23T3CoM";
// $db = "epiz_31390326_practicas2023";

$conexion = mysqli_connect($server, $user, $pass, $db) or DIE("ERROR");
mysqli_set_charset($conexion, "utf8");
?>