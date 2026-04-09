<?php
include_once "header.php";
$mysqli = include_once "conexion.php";

$id = $_GET["id"];

$sentencia = $mysqli->prepare("SELECT id, nombre, descripcion, genero FROM videojuegos WHERE id = ?");
$sentencia->bind_param("i", $id);
$sentencia->execute();

$resultado = $sentencia->get_result();
$videojuego = $resultado->fetch_assoc();

if (!$videojuego) {
    exit("No hay resultados para ese ID");
}
?>

<div class="row">
    <div class="col-12">
        <h1>Actualizar videojuego</h1>

        <form action="actualizar.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $videojuego["id"] ?>">

            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input value="<?php echo $videojuego["nombre"] ?>" class="form-control" type="text" name="nombre" id="nombre" required>
            </div>

            <div class="form-group">
                <label for="descripcion">Descripción</label>
                <textarea class="form-control" name="descripcion" id="descripcion" cols="30" rows="10" required><?php echo $videojuego["descripcion"] ?></textarea>
            </div>

            <div class="form-group">
                <label for="genero">Género</label>
                <select name="genero" id="genero" class="form-control" required>
                    <option value="Acción" <?php if($videojuego["genero"] == "Acción") echo "selected"; ?>>Acción</option>
                    <option value="Aventura" <?php if($videojuego["genero"] == "Aventura") echo "selected"; ?>>Aventura</option>
                    <option value="RPG" <?php if($videojuego["genero"] == "RPG") echo "selected"; ?>>RPG</option>
                </select>
            </div>

            <div class="form-group">
                <button class="btn btn-success">Guardar</button>
                <a class="btn btn-warning" href="listar.php">Volver</a>
            </div>

        </form>
    </div>
</div>

<?php include_once "footer.php"; ?>