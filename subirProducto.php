<?php 

require ("conexion.php");

session_start(); // Iniciamos la sesión y traemos las variables globales del usuario





if (isset($_SESSION['usuario']) && ($_SESSION['pass'])) {

  $pass = $_SESSION['pass'];

  $usuario = $_SESSION['usuario'];
}




if(isset($_POST['publicar'])){

    $titulo = $_POST['titulo'];
    $categoria = $_POST['categoria'];
    $descripcion = $_POST['descripcion'];

    $consulta = mysqli_query($conexion, " SELECT * FROM usuario WHERE usuarioNombre = '$usuario' AND pass = '$pass'");



    $id_usuario = $_SESSION['id_usuario'];

    $titulo = $_POST['titulo'];
    

$sql = "INSERT INTO producto ( nombre , categoria , descripcion, id_fotografias, id_usuario) 
VALUES ('$titulo' , '$categoria' , '$descripcion', 1, '$id_usuario' )";



$resultado = $conexion->query($sql);


$sql2 = "SELECT MAX(id_producto) as id_ultimo FROM producto";
$resultado_consulta = $conexion->query($sql2);

// Verificar si hay resultados
if ($resultado_consulta->num_rows > 0) {
    // 4. Recorrer el resultado
    while($fila = $resultado_consulta->fetch_assoc()) {
        // 5. Asignar cada fila a una variable y 6. Procesar los datos
        $id = $fila["id_ultimo"];
        

        $_SESSION['id_producto'] = $id;
    }

}

}


?>
<style>
   .form-container { max-width: 400px; margin: auto; border: 1px solid #ccc; padding: 20px; border-radius: 5px; }
        input[type="file"] { margin-bottom: 15px; }
        input[type="submit"] { padding: 10px 15px; background-color: #007bff; color: white; border: none; cursor: pointer; }
</style>
    <div class="form-container">
        <h2>Subir Imagen</h2>
        
     
     
        <form action="tu_script.php" method="POST" enctype="multipart/form-data">
            
            <label for="foto">Selecciona una imagen:</label><br>
            <!-- El campo de entrada tipo 'file' -->
            <input type="file" name="foto" id="foto" required>
            
            <br>
            
            <input type="submit" value="Subir Imagen">
        </form>
    </div>



