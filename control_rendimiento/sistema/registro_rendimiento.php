<?php
include_once "includes/header.php";
include "../conexion.php";
if (!empty($_POST)) {
    $alert = "";
    if (empty($_POST['rendimiento'])) {
        $alert = '<div class="alert alert-danger" role="alert">
                        Estos campos son obligatorios
                    </div>';
    } else {
        $id_tenista = $_POST['id_tenista'];
        $rendimiento = $_POST['rendimiento']; 
       

        $query_insert = mysqli_query($conexion, "INSERT INTO rendimiento(id_tenista,rendimiento) values ('$id_tenista', '$rendimiento')");
        if ($query_insert) {
            $alert = '<div class="alert alert-primary" role="alert">
                        Rendimiento Registrado
                    </div>';
        } else {
            $alert = '<div class="alert alert-danger" role="alert">
                       Error al registrar el rendimiento
                    </div>';
        }
        
    }
}
?>

<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Content Row -->
    <div class="row">
        <div class="col-lg-6 m-auto">
            <div class="card-header bg-primary text-white">
                Registro de Rendimiento
            </div>
            <div class="card">
                <form action="" autocomplete="off" method="post" class="card-body p-2">
                    <?php echo isset($alert) ? $alert : ''; ?>  
                    

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
                        <label for="rendimiento">Rendimiento</label>
                        <input type="number" placeholder="Ingrese rendimiento" name="rendimiento" id="rendimiento" class="form-control">
                    </div>
                    
                  
                    <input type="submit" value="Guardar Rendimiento" class="btn btn-primary">
                    <a href="lista_rendimiento.php" class="btn btn-danger">Regresar</a>
                </form>
            </div>
        </div>
    </div>


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
<?php include_once "includes/footer.php"; ?>