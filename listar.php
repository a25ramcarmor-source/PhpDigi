<?php
include_once "header.php";

$mysqli = include_once "conexion.php";
$resultado = $mysqli->query("SELECT id, nombre, descripcion FROM videojuegos");
$videojuegos = $resultado->fetch_all(MYSQLI_ASSOC);
?>
<div class="row">
    <div class="col-12">
        <h1>Listado de videojuegos</h1>
    </div>
    <div class="col-12">
        <a class="btn btn-success my-2" href="insertar.php">Agregar nuevo</a>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Editar</th>
                    <th>Eliminar</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($videojuegos as $videojuego) { ?>
                    <tr>
                        <td><?php echo $videojuego["id"] ?></td>
                        <td><?php echo $videojuego["nombre"] ?></td>
                        <td><?php echo $videojuego["descripcion"] ?></td>
                        <td>
                            <a href="editar.php?id=<?php echo $videojuego["id"] ?>">Editar</a>
                        </td>
                        <td>
                            <a href="eliminar.php?id=<?php echo $videojuego["id"] ?>">Eliminar</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>
<?php include_once "footer.php" ?>