<?php
$host = "localhost";
$usuario = "a25ramcarmor_videos";
$contrasenia = "P@ssw0rd123";
$base_de_datos = "a25ramcarmor_videojocs";
$mysqli = new mysqli($host, $usuario, $contrasenia, $base_de_datos);
if ($mysqli->connect_errno) {
    echo "Falló la conexión a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}
return $mysqli;