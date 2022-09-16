<?php include_once "includes/header.php";
include "../conexion.php";
if (!empty($_POST)) {
  $alert = "";
  if (empty($_POST['nombre']) || empty($_POST['telefono']) || empty($_POST['direccion'])) {
    $alert = '<p class"error">Todo los campos son requeridos</p>';
  }
   else {
    $idcliente = $_POST['id'];   
    $nombre = $_POST['nombre'];
    $telefono = $_POST['telefono'];
    $direccion = $_POST['direccion'];
    $apellido=$_POST['apellido'];
    $fecha_nacimiento=$_POST['fecha_nacimiento'];
    $altura=$_POST['altura'];
    $peso=$_POST['peso'];

    
      $sql_update = mysqli_query($conexion, "UPDATE cliente SET nombre = '$nombre' , telefono = '$telefono', direccion = '$direccion', apellidos = '$apellido',fecha_nacimiento = '$fecha_nacimiento' ,altura = '$altura', peso = '$peso' WHERE idcliente = $idcliente");

      if ($sql_update) {
        $alert = '<p class"exito">Tenista Actualizado correctamente</p>';
      }
      else {
        $alert = '<p class"error">Error al Actualizar Tenista</p>';
      }
    
  }
}
// Mostrar Datos

if (empty($_REQUEST['id'])) {
  header("Location: lista_cliente.php");
}
$idcliente = $_REQUEST['id'];
$sql = mysqli_query($conexion, "SELECT * FROM cliente WHERE idcliente = $idcliente");
$result_sql = mysqli_num_rows($sql);
if ($result_sql == 0) {
  header("Location: lista_cliente.php");
} else {
  while ($data = mysqli_fetch_array($sql)) {
    $idcliente = $data['idcliente'];    
    $nombre = $data['nombre'];
    $telefono = $data['telefono'];
    $direccion = $data['direccion'];
    $apellido=$data['apellidos'];
    $fecha_nacimiento=$data['fecha_nacimiento'];
    $altura=$data['altura'];
    $peso=$data['peso'];
  }
}
?>
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <div class="row">
            <div class="col-lg-6 m-auto">

              <form class="" action="" method="post">
                <?php echo isset($alert) ? $alert : ''; ?>
                <input type="hidden" name="id" value="<?php echo $idcliente; ?>">                
                <div class="form-group">
                  <label for="nombre">Nombres</label>
                  <input type="text" placeholder="Ingrese Nombre" name="nombre" class="form-control" id="nombre" value="<?php echo $nombre; ?>">
                </div>
                <div class="form-group">
                  <label for="apellido">Apellidos</label>
                  <input type="text" placeholder="Ingrese apellido" name="apellido" class="form-control" id="apellido" value="<?php echo $apellido; ?>">
                </div>
                <div class="form-group">
                  <label for="telefono">Teléfono</label>
                  <input type="number" placeholder="Ingrese Teléfono" name="telefono" class="form-control" id="telefono" value="<?php echo $telefono; ?>">
                </div>
                <div class="form-group">
                  <label for="direccion">Dirección</label>
                  <input type="text" placeholder="Ingrese Direccion" name="direccion" class="form-control" id="direccion" value="<?php echo $direccion; ?>">
                </div>
                <div class="form-group">
                    <label for="fecha_nac">Fecha de nacimiento</label>
                    <input type="date" placeholder="Ingrese Fecha de nacimiento" name="fecha_nacimiento" id="fecha_nacimiento" class="form-control"  value="<?php echo $fecha_nacimiento; ?>">
                </div>
                <div class="form-group">
                  <label for="altura">Altura</label>
                  <input type="text" placeholder="Ingrese altura" name="altura" class="form-control" id="altura" value="<?php echo $altura; ?>">
                </div>
                <div class="form-group">
                  <label for="peso">Peso</label>
                  <input type="text" placeholder="Ingrese peso" name="peso" class="form-control" id="peso" value="<?php echo $peso; ?>">
                </div>
                <button type="submit" class="btn btn-primary"><i class="fas fa-user-edit"></i> Editar Tenista</button>
              </form>
            </div>
          </div>


        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->
      <?php include_once "includes/footer.php"; ?>