<?php
// Conexión a la base de datos (reemplaza con tus credenciales)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tu_base_de_datos";
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST["subirFotos"])) {
    // Directorio donde se guardarán las imágenes
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["imagen"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // 1. Verificar si la imagen es real o un ataque de imagen falso
    if(isset($_POST["subirFotos"])) {
        $check = getimagesize($_FILES["imagen"]["tmp_name"]);
        if($check !== false) {
            $uploadOk = 1;
        } else {
            echo "El archivo no es una imagen.";
            $uploadOk = 0;
        }
    }

    // 2. Verificar si el archivo ya existe
    if (file_exists($target_file)) {
        echo "Lo sentimos, el archivo ya existe.";
        $uploadOk = 0;
    }

    // 3. Permitir ciertos formatos de archivo
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
        echo "Lo sentimos, solo se permiten archivos JPG, JPEG y PNG.";
        $uploadOk = 0;
    }

    // 4. Verificar si $uploadOk es 0 por algún error
    if ($uploadOk == 0) {
        echo "Lo sentimos, su archivo no fue subido.";
    } else {
        // Intentar subir el archivo
        if (move_uploaded_file($_FILES["imagen"]["tmp_name"], $target_file)) {
            echo "El archivo ". htmlspecialchars( basename( $_FILES["imagen"]["name"])). " ha sido subido.";

            // 5. Insertar la ruta del archivo en la base de datos
            $sql = "INSERT INTO tu_tabla (ruta_imagen) VALUES ('$target_file')";
            if ($conn->query($sql) === TRUE) {
                echo "Imagen guardada en la base de datos.";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        } else {
            echo "Lo sentimos, hubo un error al subir su archivo.";
        }
    }
} else {
    echo "Error: No se recibió ningún archivo.";
}


?>
