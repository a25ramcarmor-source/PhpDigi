<?php
$mysqli = include_once "conexion.php";

$id = $_POST["id"];
$nombre = $_POST["nombre"];
$descripcion = $_POST["descripcion"];
$genero = $_POST["genero"];

$sentencia = $mysqli->prepare("UPDATE videojuegos SET
nombre = ?,
descripcion = ?,
genero = ?
WHERE id = ?");

$sentencia->bind_param("sssi", $nombre, $descripcion, $genero, $id);

$sentencia->execute();

header("Location: listar.php");