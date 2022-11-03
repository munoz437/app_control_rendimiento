<?php include_once "includes/header.php";
include "../conexion.php";
if (!empty($_POST)) {
    $alert = "";
    if (empty($_POST['nombre']) || empty($_POST['telefono']) || empty($_POST['direccion'])) {
        $alert = '<div class="alert alert-danger" role="alert">
                                    Todo los campos son obligatorio
                                </div>';
    } 
    else {
     
        $nombre = $_POST['nombre'];
        $telefono = $_POST['telefono'];
        $direccion = $_POST['direccion'];
        $usuario_id = $_SESSION['idUser'];
        $apellidos = $_POST['apellidos'];
        $fecha_nacimiento = $_POST['fecha_nacimiento'];
        $altura = $_POST['altura'];
        $peso = $_POST['peso'];
        $user = $_POST['usuario'];
        $clave = md5($_POST['clave']); 
        $correo=$nombre."@gmail.com";
     
            $query_insert = mysqli_query($conexion, "INSERT INTO cliente(nombre,telefono,direccion, usuario_id,apellidos,fecha_nacimiento,peso,altura) values ('$nombre', '$telefono', '$direccion', '$usuario_id','$apellidos','$fecha_nacimiento','$altura','$peso')");
            $query_insert2 = mysqli_query($conexion, "INSERT INTO usuario(nombre,correo,usuario,clave,rol) values ('$nombre', '$correo', '$user', '$clave', '3')");

            if ($query_insert && $query_insert2) {
                $alert = '<div class="alert alert-primary" role="alert">
                                    Tenista Registrado
                                </div>';
            }
             else {
                $alert = '<div class="alert alert-danger" role="alert">
                                    Error al Guardar
                            </div>';
            }        
    }
    mysqli_close($conexion);
}
?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Panel de Administración</h1>
        <a href="lista_tenista.php" class="btn btn-primary">Regresar</a>
    </div>

    <!-- Content Row -->
    <div class="row">
        <div class="col-lg-6 m-auto">
            <form action="" method="post" autocomplete="off">
                <?php echo isset($alert) ? $alert : ''; ?>               
                <div class="form-group">
                    <label for="nombre">Nombres</label>
                    <input type="text" placeholder="Ingrese Nombres" name="nombre" id="nombre" class="form-control">
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
                    <label for="peso">Peso</label>
                    <input type="number" placeholder="Ingrese peso del tenista" name="peso" id="peso" class="form-control">
                </div>
                <div class="form-group">
                    <label for="altura">Altura</label>
                    <input type="number" placeholder="Ingrese altura" name="altura" id="altura" class="form-control">
                </div>
                <div class="form-group">
                    <label for="usuario">Usuario</label>
                    <input type="text" class="form-control" placeholder="Ingrese Usuario" name="usuario" id="usuario">
                </div>
                <div class="form-group">
                    <label for="clave">Contraseña</label>
                    <input type="password" class="form-control" placeholder="Ingrese Contraseña" name="clave" id="clave">
                </div>
                <input type="submit" value="Guardar Tenista" class="btn btn-primary btn-block">
                <a href="lista_tenista.php" class="btn btn-danger">Regresar</a>
            </form>
        </div>
    </div>


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
<?php include_once "includes/footer.php"; ?>