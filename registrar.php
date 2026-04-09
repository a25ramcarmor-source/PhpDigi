<?php
$mysqli = include_once "conexion.php";

$nombre = $_POST["nombre"];
$descripcion = $_POST["descripcion"];
$genero = $_POST["genero"];

$sentencia = $mysqli->prepare("INSERT INTO videojuegos
(nombre, descripcion, genero)
VALUES
(?, ?, ?)");

$sentencia->bind_param("sss", $nombre, $descripcion, $genero);

$sentencia->execute();

header("Location: listar.php");