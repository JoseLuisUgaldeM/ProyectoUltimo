<!-- Botón que activa el modal y define la URL del contenido a cargar -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalBootstrap" data-url="contenido.html">
  Abrir Modal Bootstrap
</button>

<!-- Estructura del Modal Bootstrap -->
<div class="modal fade" id="modalBootstrap" tabindex="-1" role="dialog" aria-labelledby="modalBootstrapLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalBootstrapLabel">Título del Modal</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
<?php
require "conexion.php";

session_start();

$id_usuario = $_SESSION['id_usuario'];

$id_producto = $_SESSION['id_producto'];

$directorioSubidas = "uploads/";


if (!is_dir($directorioSubidas)) {
    mkdir($directorioSubidas, 0755, true);
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["foto"])) {
    $nombreOriginal = $_FILES["foto"]["name"];
    $tempArchivo = $_FILES["foto"]["tmp_name"];
    $extension = pathinfo($nombreOriginal, PATHINFO_EXTENSION);

    // Generar un nombre único para evitar sobrescrituras y problemas de seguridad
    $nombreGuardado = uniqid() . "." . $extension;
    $rutaCompleta = $directorioSubidas . $nombreGuardado;

    // Mover el archivo de la carpeta temporal a la carpeta permanente
    if (move_uploaded_file($tempArchivo, $rutaCompleta)) {
        try {
            // Guardar solo la ruta relativa en la base de datos
            $sql = "INSERT INTO imagenes_ruta (nombre_imagen, ruta_imagen, id_usuario, id_producto) VALUES (?, ? , ?, ?)";
            $stmt = $conexion->prepare($sql);
            $stmt->execute([$nombreOriginal, $rutaCompleta, $id_usuario, $id_producto]);

            echo "La imagen se ha subido correctamente. Ruta guardada: " . $rutaCompleta;

            header ("Location:iniciar.php");

        } catch (PDOException $e) {
            die("Error al guardar la ruta en la DB: " . $e->getMessage());
        }
    } else {
        echo "Error al mover el archivo subido.";
    }
}
?>
       
      </div>
    </div>
  </div>
</div>

