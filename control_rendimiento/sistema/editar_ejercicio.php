<?php
include_once "includes/header.php";
include "../conexion.php";
if (!empty($_POST)) {
  $alert = "";
  if (empty($_POST['nombre'])) {
    $alert = '<div class="alert alert-primary" role="alert">
              Todo los campos son requeridos
            </div>';
  } else {
      $id=$_POST['id'];
      $nombre = $_POST['nombre'];
      $descripcion = $_POST['descripcion'];
      $video = $_POST['video'];
      $tiempo = $_POST['tiempo'];
      $id_tenista = $_POST['id_tenista'];
      $id_entrenador = $_POST['id_entrenador'];
      $comentario = $_POST['comentario'];
    
      $query_update = mysqli_query($conexion, "UPDATE ejercicio SET nombre = '$nombre', descripcion = '$descripcion', video= '$video',tiempo= '$tiempo', id_tenista = '$id_tenista', id_entrenador='$id_entrenador',comentario='$comentario' WHERE id = $id");
    if ($query_update) {
      $alert = '<div class="alert alert-primary" role="alert">
              Modificado
            </div>';
    } else {
      $alert = '<div class="alert alert-primary" role="alert">
                Error al Modificar
              </div>';
    }
  }
}



if (empty($_REQUEST['id'])) {
  header("Location: lista_ejercicio.php");
} else {
  $id = $_REQUEST['id'];
  if (!is_numeric($id)) {
    header("Location: lista_ejercicio.php");
  }
  $query = mysqli_query($conexion, "SELECT id,nombre, descripcion, video, tiempo, id_tenista,id_entrenador,fecha,comentario FROM ejercicio  WHERE id = $id");
  $result = mysqli_num_rows($query);

  if ($result > 0) {
    $data = mysqli_fetch_assoc($query);
  } else {
    header("Location: lista_ejercicio.php");
  }
}
?>
<!-- Begin Page Content -->
<div class="container-fluid">

  <div class="row">
    <div class="col-lg-6 m-auto">

      <div class="card">
        <div class="card-header bg-primary text-white">
          Modificar Ejercicio
        </div>
        <div class="card-body">
          <form action="" method="post">
            <?php echo isset($alert) ? $alert : ''; ?>
            <div class="form-group">
              <input type="hidden" class="form-control"  name="id" id="id" value="<?php echo $data['id']; ?>">
            </div>
            <div class="form-group">
              <label for="nombre">Nombre</label>             
              <input type="text" class="form-control" placeholder="Ingrese nombre del ejercicio" name="nombre" id="nombre" value="<?php echo $data['nombre']; ?>">
            </div>
            <div class="form-group">
              <label for="producto">Descripcion</label>
              <input type="text" class="form-control" placeholder="Ingrese descripcion" name="descripcion" id="descripcion" value="<?php echo $data['descripcion']; ?>">
            </div>
            <div class="form-group">
              <label for="precio">Video</label>
              <input type="text" placeholder="video" class="form-control" name="video" id="video" value="<?php echo $data['video']; ?>">
            </div>
            <div class="form-group">
              <label for="precio">Tiempo</label>
              <input type="text" placeholder="Tiempo" class="form-control" name="tiempo" id="tiempo" value="<?php echo $data['tiempo']; ?>">
            </div>
            <div class="form-group">
              <label for="precio">Tenista</label>
              <select name="id_tenista" id="id_tenista" class="form-control">
                <option value="0">Seleccione Tenista</option>
                  <?php
                    $id_tenista=$data["id_tenista"];
                    $query1 = mysqli_query($conexion, "SELECT * FROM cliente WHERE idcliente = $id_tenista  ORDER BY idcliente ASC");
                    $result = mysqli_num_rows($query1);
                    if ($result > 0) {
                      while ($data1 = mysqli_fetch_assoc($query1)) { ?>
                        <option value="<?php echo $data1['idcliente']; ?>"><?php echo $data1['nombre']; ?></option>
                      <?php }
                    } ?>
              </select>
            </div>
            <div class="form-group">
              <label for="precio">Entrenador</label>
              <?php
                $query2 = mysqli_query($conexion, "SELECT id, nombres FROM entrenadores ORDER BY id ASC");
                $resultado = mysqli_num_rows($query2);
                ?>
              <select id="id_entrenador" name="id_entrenador" class="form-control">
                  <option value="0">Seleccione Entrenador</option>
                <?php
                  if ($resultado > 0) {
                    while ($datos = mysqli_fetch_array($query2)) {
                  
                  ?>
                    <option value="<?php echo $datos['id']; ?>"><?php echo $datos['nombres']; ?></option>
                <?php
                    }
                  }
                  ?>
              </select>   
            </div>          
            <div class="form-group">
              <label for="precio">Comentario</label>
              <input type="text" placeholder="Comentario" class="form-control" name="comentario" id="comentario" value="<?php echo $data['comentario']; ?>">
            </div>


            <input type="submit" value="Actualizar Ejercicio" class="btn btn-primary">
          </form>
        </div>
      </div>
    </div>
  </div>


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
<?php include_once "includes/footer.php"; ?>