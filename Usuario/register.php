<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Registro</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
      rel="stylesheet"
    />
  </head>
  <body class="d-flex align-items-center justify-content-center vh-100">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-4">
          <h2 class="text-center">Registro</h2>
          
          <form method="POST" action="registrar_usuarios.php" >

            <div class="mb-3">
              <label class="form-label">Nombre</label>
              <input type="text" name="n_usuario" class="form-control" required />
            </div>

            <div class="mb-3">
              <label class="form-label">Apellido Paterno</label>
              <input type="text" name="a_p" class="form-control" required/>
            </div>

            <div class="mb-3">
              <label class="form-label">Apellido Materno</label>
              <input type="text" name="a_m" class="form-control" required />
            </div>

            <div class="mb-3">
              <label class="form-label">Edad</label>
              <input type="number" name="edad" class="form-control" required />
            </div>

            <div class="mb-3">
              <label class="form-label">Correo</label>
              <input type="email" name="correo" class="form-control" required />
            </div>

            <div class="mb-3">
              <label class="form-label">Contraseña</label>
              <input type="password" name="contrasena" class="form-control" required />
            </div>

            <div class="mb-3">
            <input type="hidden" value="1" name="id_rol" >
            </div>

            <!-- <div class="mb-3">
                <select name="id_rol">
              <option value="1">Usuario</option>
              <option value="2">Admin</option>
            </select>
            </div> -->

            <button type="submit" name="send" class="btn btn-primary w-100" href="inicio.html" value="Guardar">
              Registrarse
            </button>

          </form>
          <p class="text-center mt-3">
            ¿Ya tienes cuenta? <a href="index.php">Inicia sesión aquí</a>
          </p>
        </div>
      </div>
    </div>
  </body>
</html>
