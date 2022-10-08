 <?php include_once "includes/header.php";
  include "../conexion.php";
  if (!empty($_POST)) {
    $alert = "";
    if (empty($_POST['nombre']) || empty($_POST['descripcion'])) {
      $alert = '<div class="alert alert-danger" role="alert">
                Todo los campos son obligatorios
              </div>';
    } else {
      $nombre = $_POST['nombre'];
      $descripcion = $_POST['descripcion'];
      $video = $_POST['video'];
      $tiempo = $_POST['tiempo'];
      $id_tenista = $_POST['id_tenista'];
      $id_entrenador = $_POST['id_entrenador'];
      $fecha = date("Y-m-d");   
      $comentario = $_POST['comentario'];
      $usuario_id = $_SESSION['idUser'];

      $query_insert = mysqli_query($conexion, "INSERT INTO ejercicio(nombre, descripcion, video, tiempo, id_tenista, id_entrenador, fecha, comentario) values ('$nombre', '$descripcion', '$video', '$tiempo','$id_tenista','$id_entrenador','$fecha','$comentario')");
      if ($query_insert) {
        $alert = '<div class="alert alert-primary" role="alert">
                Ejercicio Registrado
              </div>';
      } else {
        $alert = '<div class="alert alert-danger" role="alert">
                Error al registrar el ejercicio
              </div>';
      }
    }
  }
  ?>

 <!-- Begin Page Content -->
 <div class="container-fluid">

   <!-- Page Heading -->
   <div class="d-sm-flex align-items-center justify-content-between mb-4">
     <h1 class="h3 mb-0 text-gray-800">Panel de Administración</h1>
     <a href="lista_ejercicio.php" class="btn btn-primary">Regresar</a>
   </div>

   <!-- Content Row -->
   <div class="row">
     <div class="col-lg-6 m-auto">
       <form action="" method="post" autocomplete="off">
         <?php echo isset($alert) ? $alert : ''; ?>         
        
         <div class="form-group">
           <label for="precio">Nombre</label>
           <input type="text" placeholder="Ingrese nombre" class="form-control" name="nombre" id="nombre">
         </div>
         <div class="form-group">
           <label for="cantidad">Descripcion</label>
           <input type="text" placeholder="Ingrese Descripcion" class="form-control" name="descripcion" id="descripcion">
         </div>
         <div class="form-group">
           <label for="cantidad">Video</label>
           <input type="text" placeholder="Ingrese link de video" class="form-control" name="video" id="video">
         </div>
         <div class="form-group">
           <label for="cantidad">Tiempo</label>
           <input type="text" placeholder="Ingrese tiempo" class="form-control" name="tiempo" id="tiempo">
         </div>
         <div class="form-group">
           <label for="cantidad">Tenista</label>
           <select name="id_tenista" id="id_tenista" class="form-control">
            <option value="0">Seleccione Tenista</option>
              <?php
                $query = mysqli_query($conexion, "SELECT * FROM cliente ORDER BY idcliente ASC");
                $result = mysqli_num_rows($query);

                if ($result > 0) {
                  while ($data = mysqli_fetch_assoc($query)) { ?>
                    <option value="<?php echo $data['idcliente']; ?>"><?php echo $data['nombre']; ?></option>
                  <?php }
                } ?>
           </select>
         </div>
         <div class="form-group">
           <label>Entrenador</label>
           <?php
            $query = mysqli_query($conexion, "SELECT id, nombres FROM entrenadores ORDER BY id ASC");
            $resultado = mysqli_num_rows($query);
            ?>
           <select id="id_entrenador" name="id_entrenador" class="form-control">
              <option value="0">Seleccione Entrenador</option>
             <?php
              if ($resultado > 0) {
                while ($proveedor = mysqli_fetch_array($query)) {
                  // code...
              ?>
                 <option value="<?php echo $proveedor['id']; ?>"><?php echo $proveedor['nombres']; ?></option>
             <?php
                }
              }
              ?>
           </select>
         </div>
         <div class="form-group">
           <label for="ejercicio">Comentario</label>
           <input type="text" placeholder="Ingrese un comenetario" name="comentario" id="comentario" class="form-control">
         </div>
        
         <input type="submit" value="Guardar Ejercicio" class="btn btn-primary">
       </form>
     </div>
   </div>


 </div>
 <!-- /.container-fluid -->

 </div>
 <!-- End of Main Content -->
 <?php include_once "includes/footer.php"; ?>