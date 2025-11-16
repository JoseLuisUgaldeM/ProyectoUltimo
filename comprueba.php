<?php

require("conexion.php");

session_start();

// Crear una sentencia sql para comprobar que el usuario está registrado


require("conexion.php");

if (isset($_POST['iniciarSesion'])) {

  $_SESSION['usuario'] = $_POST['usuario'];

  $_SESSION['pass'] = $_POST['pass'];


  


}

if (isset($_SESSION['usuario']) && ($_SESSION['pass'])) {

  $pass = $_SESSION['pass'];

  $usuario = $_SESSION['usuario'];

  $_SESSION['inicioSesion'] =true;

header("Location:iniciar.php");
  
}else {

  echo "La sesion no se ha iniciado";
}




