<?php
include "includes/header.php";
include "../conexion.php";
if (!empty($_POST)) {
  $alert = "";
  if (empty($_POST['nombres'])) {
    $alert = '<p class"msg_error">Todo los campos son requeridos</p>';
  } else {
    $id = $_GET['id'];
    $nombres = $_POST['nombres'];
    $apellidos = $_POST['apellidos'];
    $fecha_nacimiento = $_POST['fecha_nacimiento'];
    $direccion = $_POST['direccion'];
    $telefono = $_POST['telefono'];

    $sql_update = mysqli_query($conexion, "UPDATE entrenadores SET nombres = '$nombres', apellidos = '$apellidos' , fecha_nacimiento = '$fecha_nacimiento', direccion = '$direccion', telefono = '$telefono' WHERE id = $id");

    if ($sql_update) {
      $alert = '<p class"msg_save">Entrenador Actualizado correctamente</p>';
    } else {
      $alert = '<p class"msg_error">Error al Actualizar el Entrenador</p>';
    }
  }
}
// Mostrar Datos

if (empty($_REQUEST['id'])) {
  header("Location: lista_entrenador.php");
  mysqli_close($conexion);
}
$id = $_REQUEST['id'];
$sql = mysqli_query($conexion, "SELECT * FROM entrenadores WHERE id = $id");
mysqli_close($conexion);
$result_sql = mysqli_num_rows($sql);
if ($result_sql == 0) {
  header("Location: lista_entrenador.php");
} else {
  while ($data = mysqli_fetch_array($sql)) {
    $id = $data['id'];
    $nombres = $data['nombres'];
    $apellidos = $data['apellidos'];
    $fecha_nacimiento = $data['fecha_nacimiento'];
    $direccion = $data['direccion'];
    $telefono = $data['telefono'];
  }
}
?>
<!-- Begin Page Content -->
<div class="container-fluid">

  <div class="row">
    <div class="col-lg-6 m-auto">
      <?php echo isset($alert) ? $alert : ''; ?>
      <form class="" action="" method="post">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <div class="form-group">
          <label for="nombres">Nombres</label>
          <input type="text" placeholder="Ingrese nombres" name="nombres" class="form-control" id="nombres" value="<?php echo $nombres; ?>">
        </div>
        <div class="form-group">
          <label for="nombre">Apellidos</label>
          <input type="text" placeholder="Ingrese apellidos" name="apellidos" class="form-control" id="apellidos" value="<?php echo $apellidos; ?>">
        </div>
        <div class="form-group">
          <label for="fecha_nacimiento">Fecha nacimiento</label>
          <input type="date"  name="fecha_nacimiento" class="form-control" id="fecha_nacimiento" value="<?php echo $fecha_nacimiento; ?>">
        </div>
        <div class="form-group">
          <label for="direccion">Dirección</label>
          <input type="text" placeholder="Ingrese Direccion" name="direccion" class="form-control" id="direccion" value="<?php echo $direccion; ?>">
        </div>
        <div class="form-group">
          <label for="direccion">Telefono</label>
          <input type="number" placeholder="Ingrese telefono" name="telefono" class="form-control" id="telefono" value="<?php echo $telefono; ?>">
        </div>

        <input type="submit" value="Editar Entrenador" class="btn btn-primary">
      </form>
    </div>
  </div>


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
<?php include_once "includes/footer.php"; ?>