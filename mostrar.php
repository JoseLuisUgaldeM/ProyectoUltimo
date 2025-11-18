<?php

    header('Content-Type: application/json');

    require ("conexion.php");

   
    session_start();

    $sql = "SELECT *  from usuario 
            INNER JOIN producto ON producto.id_usuario= usuario.id_usuario 
            INNER JOIN imagenes_ruta ON imagenes_ruta.id_usuario= producto.id_usuario
            WHERE producto.id_producto = imagenes_ruta.id_producto  ;  ";

    $resultado= $conexion->query($sql);


    $datos = array();

    

        while( $row = $resultado->fetch_assoc()){

            $datos[]=$row;
        }

    

    echo json_encode($datos);

    $json_string = json_encode($datos, JSON_PRETTY_PRINT);

        $fichero = 'datos_usuario.json';

    if (file_put_contents($fichero, $json_string, LOCK_EX) !== false) {
    echo "El array JSON se ha copiado correctamente al archivo: $fichero";
} else {
    echo "Error al escribir el archivo.";
}
?>


