<?php
include_once "includes/header.php";
include "../conexion.php";
if (!empty($_POST)) {
    $alert = "";
    if (empty($_POST['id_tenista'])) {
        $alert = '<div class="alert alert-danger" role="alert">
                        Estos campos son obligatorios
                    </div>';
    } else {
        $id_tenista = $_POST['id_tenista'];
        $aces = $_POST['aces'];
        $pts_ganados = $_POST['pts_ganados'];
        $partidos_ganados = $_POST['partidos_ganados'];
        $pts_r_ganados = $_POST['pts_r_ganados'];
        $t_ganados = $_POST['t_ganados'];
        $pts_ganadores = $_POST['pts_ganadores']; 
        $rendimiento=$aces+$pts_ganados+$partidos_ganados+$pts_r_ganados+$t_ganados+$pts_ganadores;
        $rendimiento=($rendimiento/6);
       

        $query_insert = mysqli_query($conexion, "INSERT INTO rendimiento(id_tenista,ace,pts_ganados,partidos_ganados,pts_r_ganados,t_ganados,pts_ganadores,rendimiento) values ('$id_tenista','$aces','$pts_ganados','$partidos_ganados','$pts_r_ganados','$t_ganados','$pts_ganadores','$rendimiento')");
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
                                        <option value="<?php echo $data['idcliente']; ?>"><?php echo $data['nombre'].' '.$data['apellidos']; ?></option>
                                    <?php }
                                } ?>
                        </select>
                    </div> 
                    
                   <!-- <div class="form-group">
                        <label for="rendimiento">Rendimiento</label>
                        <input type="number" placeholder="Ingrese rendimiento" name="rendimiento" id="rendimiento" class="form-control">
                    </div>-->
                    <div class="form-group">
                        <label for="rendimiento">Cantidad de Aces</label>
                        <input type="number" placeholder="Ingrese aces" name="aces" id="aces" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="rendimiento">Puntos ganados</label>
                        <input type="number" placeholder="Puntos ganados" name="pts_ganados" id="pts_ganados" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="rendimiento">Partidos ganados</label>
                        <input type="number" placeholder="Partidos ganados" name="partidos_ganados" id="partidos_ganados" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="rendimiento">Puntos de recepci??n ganados</label>
                        <input type="number" placeholder="Puntos de recepcion ganados" name="pts_r_ganados" id="pts_r_ganados" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="rendimiento">Tiebreaks ganados</label>
                        <input type="number" placeholder="Tiebreaks ganados" name="t_ganados" id="t_ganados" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="rendimiento">Puntos ganadores</label>
                        <input type="number" placeholder="Puntos ganadores" name="pts_ganadores" id="pts_ganadores" class="form-control">
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