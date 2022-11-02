<?php
include_once "includes/header.php";
include "../conexion.php";
if (!empty($_POST)) {
  $alert = "";
  if (empty($_POST['id_tenista'])) {
    $alert = '<div class="alert alert-primary" role="alert">
              Todo los campos son requeridos
            </div>';
  } else {
      $id=$_POST['id'];
      $id_tenista = $_POST['id_tenista'];
      $ace = $_POST['aces'];
      $pts_ganados = $_POST['pts_ganados'];
      $partidos_ganados = $_POST['partidos_ganados'];
      $pts_r_ganados = $_POST['pts_r_ganados'];
      $t_ganados = $_POST['t_ganados'];
      $pts_ganadores = $_POST['pts_ganadores'];
      $rendimiento=$ace+$pts_ganados+$partidos_ganados+$pts_r_ganados+$t_ganados+$pts_ganadores;
      $rendimiento=($rendimiento/6);

    
      $query_update = mysqli_query($conexion, "UPDATE rendimiento SET id_tenista = '$id_tenista',ace = '$ace',pts_ganados = '$pts_ganados',partidos_ganados='$partidos_ganados',pts_r_ganados='$pts_r_ganados',t_ganados='$t_ganados',pts_ganadores='$pts_ganadores' ,rendimiento = '$rendimiento' WHERE id = $id");
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
  header("Location: lista_rendimiento.php");
} else {
  $id = $_REQUEST['id'];
  if (!is_numeric($id)) {
    header("Location: lista_rendimiento.php");
  }
  $query = mysqli_query($conexion, "SELECT * FROM rendimiento  WHERE id = $id");
  $result = mysqli_num_rows($query);

  if ($result > 0) {
    $data = mysqli_fetch_assoc($query);
  } else {
    header("Location: lista_rendimiento.php");
  }
}
?>
<!-- Begin Page Content -->
<div class="container-fluid">

  <div class="row">
    <div class="col-lg-6 m-auto">

      <div class="card">
        <div class="card-header bg-primary text-white">
          Modificar Rendimiento
        </div>
        <div class="card-body">
          <form action="" method="post">
            <?php echo isset($alert) ? $alert : ''; ?>
            <div class="form-group">
              <input type="hidden" class="form-control"  name="id" id="id" value="<?php echo $data['id']; ?>">
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
                        <option value="<?php echo $data1['idcliente']; ?>"><?php echo $data1['nombre'].' '.$data1['apellidos'];; ?></option>
                      <?php }
                    } ?>
              </select>
            </div>                      
            <div class="form-group">
              <label for="precio">Cantidad de Aces</label>
              <input type="number" placeholder="Ingrese aces" class="form-control" name="aces" id="aces" value="<?php echo $data['ace']; ?>">
            </div>
            <div class="form-group">
              <label for="precio">Puntos ganados</label>
              <input type="text" placeholder="Puntos ganados" class="form-control" name="pts_ganados" id="pts_ganados" value="<?php echo $data['pts_ganados']; ?>">
            </div>
            <div class="form-group">
              <label for="precio">Partidos ganados</label>
              <input type="number" placeholder="Partidos ganados" class="form-control" name="partidos_ganados" id="partidos_ganados" value="<?php echo $data['partidos_ganados']; ?>">
            </div>
            <div class="form-group">
              <label for="precio">Puntos de recepción ganados</label>
              <input type="text" placeholder="Puntos de recepción ganados" class="form-control" name="pts_r_ganados" id="pts_r_ganados" value="<?php echo $data['pts_r_ganados']; ?>">
            </div>
            <div class="form-group">
              <label for="precio">Tiebreaks ganados</label>
              <input type="text" placeholder="Tiebreaks ganados" class="form-control" name="t_ganados" id="t_ganados" value="<?php echo $data['t_ganados']; ?>">
            </div>
            <div class="form-group">
              <label for="precio">Puntos ganadores</label>
              <input type="text" placeholder="Puntos ganadores" class="form-control" name="pts_ganadores" id="pts_ganadores" value="<?php echo $data['pts_ganadores']; ?>">
            </div>


            <input type="submit" value="Actualizar Rendimiento" class="btn btn-primary">
            <a href="lista_rendimiento.php" class="btn btn-danger">Regresar</a>

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