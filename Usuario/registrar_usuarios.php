<?php
include "../modelo/conexion.php";

if (isset($_POST['send'])) {

    if (
        strlen($_POST['n_usuario']) >= 1 &&
        strlen($_POST['a_p']) >= 1 &&
        strlen($_POST['a_m']) >= 1 &&
        strlen($_POST['edad']) >= 1 &&
        strlen($_POST['correo']) >= 1 &&
        strlen($_POST['contrasena']) >= 1 
       


    ) {
        $n_usuario = trim($_POST['n_usuario']);
        $a_p = trim($_POST['a_p']);
        $a_m = trim($_POST['a_m']);
        $edad = trim($_POST['edad']);
        $correo = trim($_POST['correo']);
        $contrasena = trim($_POST['contrasena']);
        $id_rol=1;
        


        $consulta = "INSERT INTO usuarios (n_usuario, a_p, a_m, edad, correo, contrasena, id_rol) VALUES ('$n_usuario', '$a_p', '$a_m', '$edad', '$correo', '$contrasena', '$id_rol')";
        $resultado = mysqli_query($conexion, $consulta);
        
        if ($resultado) {
            header("location:login_usuario.php")
            
?>
            <h3 class="success">Tu registro se ha completado</h3>
        <?php
        } else {
        ?>
            <h3 class="error">Clave ya registrada</h3>
        <?php

        }
    } else {
        ?>
        <h3 class="error">Llena todos los campos</h3>
<?php
    }
}


?>