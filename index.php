<head>
  <link rel="stylesheet" href="estilo.css">
  <script src="javascript.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
    integrity="sha512-SfTiTlX6kk+qitfevl/7LibUOeJWlt9rbyDn92a1DqWOw9vWG2MFoays0sgObmWazO5BQPiFucnnEAjpAB+/Sw=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="estilo.css">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
    crossorigin="anonymous"></script>
  <title>TrueChange</title>
</head>

<body>

  <div class="loader">
    <div class="spinner"></div>
    <p>Cargando...</p>
  </div>

  <?php
  session_start();
  
  include "conexion.php";
  ?>
  <header class="header">

    <div class="px-2 py-1 bg-opacity-30 bg-info bg-gradient text-white contenedor">
      <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-around">
          <img src="imagenes/icono_proyecto.png" alt="icono de la aplicacion" width="100" height="100">


          <div class="botones">
            <button type="button" class="btn btn-light text-dark me-2" data-bs-toggle="modal"
              data-bs-target="#exampleModal2">Inicio sesión</button>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
              data-bs-target="#exampleModal">Registrarme</button>
          </div>
          <!-- Modal registro-->


          <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Completa los campos del formulario</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <form class="row g-3" action="insertar.php" method="post">
                    <div class="col-md-12">
                      <label for="nombre" class="form-label">Nombre</label>
                      <input type="text" class="form-control" id="nombre" name="nombre" pattern="[a-zA-Z]+" required>
                    </div>
                    <div class="col-md-12">
                      <label for="primerApellido" class="form-label">Primer pellido</label>
                      <input type="text" class="form-control" id="primerApellido" name="primerApellido" pattern="[a-zA-Z]+" required>
                    </div>
                    <div class="col-md-12">
                      <label for="segundoApellido" class="form-label">Segundo Apellido</label>
                      <input type="text" class="form-control" id="segundoApellido" name="segundoApellido" pattern="[a-zA-Z]+" required>
                    </div>
                    <div class="col-md-12">
                      <label for="usuarioNombre" class="form-label">Nombre de usuario</label>
                      <input type="text" class="form-control" id="usuarioNombre" name="usuarioNombre" pattern="[a-zA-Z]+" required>
                    </div>
                    <div class="col-md-12">
                      <label for="pass" class="form-label">Contraseña</label>
                      <input type="password" class="form-control" id="pass" name="pass" required>
                    </div>
                    <div class="col-md-12">
                      <label for="email" class="form-label">Correo electrónico</label>
                      <div class="input-group">
                        <span class="input-group-text" id="inputGroupPrepend2">@</span>
                        <input type="text" class="form-control" id="email" name="email"
                          pattern="[a-zA-Z0-9]+@[a-zA-Z0-9]+.[a-zA-Z]+" aria-describedby="inputGroupPrepend2"
                          required>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <label for="validationDefault03" class="form-label">Ciudad</label>
                      <input type="text" class="form-control" id="validationDefault03" required>
                    </div>
                    <div class="col-md-6">

                    </div>
                    <div class="col-md-6">
                      <label for="validationDefault05" class="form-label">Código postal</label>
                      <input type="text" class="form-control" id="validationDefault05" required>
                    </div>

                    <div class="col-12">
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="invalidCheck2" required>
                        <label class="form-check-label" for="invalidCheck2">
                          Acepta los términos y condiciones
                        </label>
                      </div>
                    </div>
                    <div class="col-12">
                      <button class="btn btn-primary" type="submit">Enviar formulario</button>
                    </div>
                  </form>
                </div>

              </div>
            </div>
          </div>

          <!-- Modal inicio de sesión-->

          <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">¡¡Bienvenido/a a TrueChange!!</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <form method="post" action="comprueba.php" class="row g-3">
                    <div class="col-md-12">
                      <label for="validationDefault10" class="form-label">Usuario</label>
                      <input type="text" name="usuario" class="form-control" id="validationDefault10" pattern="[a-zA-Z]+" required>
                    </div>
                    <div class="col-md-12">
                      <label for="validationDefault11" class="form-label">Contraseña</label>
                      <input type="password" name="pass" class="form-control" id="validationDefault11" required>
                    </div>

                    <div class="col-12">
                      <button class="btn btn-primary" type="submit" name="iniciarSesion">Entrar</button>
                    </div>
                  </form>
                </div>


              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    </div>



    </div>
    </div>
    </div>
    <div>
  </header>
  <!-- Barra de navegación-->
  <div class="barraNavegacion mx-auto ">

    <nav class="navbar navbar-expand-lg ">
      <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01"
          aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0 nav-item nav-underline">
            <li class="nav-item">
              <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"
                href="#">Categorias</a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#">Electrónica</a></li>
                <li><a class="dropdown-item" href="#">Informática</a></li>
                <li><a class="dropdown-item" href="#">Hogar</a></li>
                <li><a class="dropdown-item" href="#">Jardineria</a></li>
                <li><a class="dropdown-item" href="#">Coches</a></li>
                <li><a class="dropdown-item" href="#">Motos</a></li>
              </ul>
            </li>


            <li class="nav-item ">
              <a class="nav-link" href="#">Electronica</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Informática</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Hogar</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Coches</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Motos</a>
            </li>
          </ul>
        </div>
        <form class="d-flex col-lg-5 col-md-8 col-sm-9" role="search">
          <input class="form-control me-2 text-primary" type="search" placeholder="Ej.Iphone" aria-label="Search">
          <button class="btn btn-outline-primary" type="submit">Buscar</button>

        </form>
      </div>
    </nav>

  </div>
  </div>
  <!-- Hasta aquí la barra de navegación-->

  <script>
    window.onload = function() {
      const loader = document.querySelector('.loader');
      loader.style.transition = 'opacity 0.5s ease'; // Transición para el desvanecimiento
      loader.style.opacity = '0'; // Hace que el loader se desvanezca

      // Opcional: Eliminar el loader del DOM después de la transición
      setTimeout(() => {
        loader.remove();
      }, 500);
    };
  </script>

</body>

</html>