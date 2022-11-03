<?php
include_once "includes/header.php";
include "../conexion.php";
if (!empty($_POST)) {
    $alert = "";
    if (empty($_POST['nombres']) || empty($_POST['apellidos']) || empty($_POST['fecha_nacimiento']) || empty($_POST['direccion'])  || empty($_POST['telefono'])) {
        $alert = '<div class="alert alert-danger" role="alert">
                        Estos campos son obligatorios
                    </div>';
    } else {
        $nombres = $_POST['nombres'];
        $apellidos = $_POST['apellidos'];
        $fecha_nacimiento=$_POST['fecha_nacimiento'];
        $direccion = $_POST['direccion'];
        $telefono = $_POST['telefono']; 
        $user = $_POST['usuario'];
        $clave = md5($_POST['clave']); 
        $correo=$nombres."@gmail.com";
       

        $query_insert = mysqli_query($conexion, "INSERT INTO entrenadores(nombres,apellidos,fecha_nacimiento,direccion,telefono) values ('$nombres', '$apellidos', '$fecha_nacimiento', '$direccion','$telefono')");
        $query_insert2 = mysqli_query($conexion, "INSERT INTO usuario(nombre,correo,usuario,clave,rol) values ('$nombres', '$correo', '$user', '$clave', '2')");

        if ($query_insert && $query_insert2) {
            $alert = '<div class="alert alert-primary" role="alert">
                        Entrenador Registrado
                    </div>';
        } else {
            $alert = '<div class="alert alert-danger" role="alert">
                       Error al registrar Entrenador
                    </div>';
        }
        
    }
}
mysqli_close($conexion);
?>

<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Content Row -->
    <div class="row">
        <div class="col-lg-6 m-auto">
            <div class="card-header bg-primary text-white">
                Registro de Entrenador
            </div>
            <div class="card">
                <form action="" autocomplete="off" method="post" class="card-body p-2">
                    <?php echo isset($alert) ? $alert : ''; ?>
                    <div class="form-group">
                        <label for="nombre">Nombres</label>
                        <input type="text" placeholder="Ingrese Nombres" name="nombres" id="nombres" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="nombre">Apellidos</label>
                        <input type="text" placeholder="Ingrese Apellidos" name="apellidos" id="apellidos" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="telefono">Teléfono</label>
                        <input type="number" placeholder="Ingrese Teléfono" name="telefono" id="telefono" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="direccion">Dirección</label>
                        <input type="text" placeholder="Ingrese Direccion" name="direccion" id="direccion" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="fecha_nac">Fecha de nacimiento</label>
                        <input type="date" placeholder="Ingrese Fecha de nacimiento" name="fecha_nacimiento" id="fecha_nacimiento" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="usuario">Usuario</label>
                        <input type="text" class="form-control" placeholder="Ingrese Usuario" name="usuario" id="usuario">
                     </div>
                    <div class="form-group">
                        <label for="clave">Contraseña</label>
                        <input type="password" class="form-control" placeholder="Ingrese Contraseña" name="clave" id="clave">
                    </div>
                    <input type="submit" value="Guardar Entrenador" class="btn btn-primary">
                    <a href="lista_entrenador.php" class="btn btn-danger">Regresar</a>
                </form>
            </div>
        </div>
    </div>


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
<?php include_once "includes/footer.php"; ?>