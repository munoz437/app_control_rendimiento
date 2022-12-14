<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

	<!-- Sidebar - Brand -->
	<a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
		<div class="sidebar-brand-icon rotate-n-15">
			<!--<img src="img/logo.jpg" class="img-thumbnail">-->
		</div>
		<div class="sidebar-brand-text mx-3">Match Point</div>
	</a>

	<!-- Divider -->
	<hr class="sidebar-divider my-0">

	<!-- Divider -->
	<hr class="sidebar-divider">

	<!-- Heading -->
	<div class="sidebar-heading">
		<!--Interface-->
	</div>

	<!-- Nav Item - Pages Collapse Menu
	<li class="nav-item">
		<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
			<i class="fas fa-fw fa-cog"></i>
			<span>Ventas</span>
		</a>
		<div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
			<div class="bg-white py-2 collapse-inner rounded">
				<a class="collapse-item" href="nueva_venta.php">Nueva venta</a>
				<a class="collapse-item" href="ventas.php">Ventas</a>
			</div>
		</div>
	</li> -->

	<li class="nav-item">
		<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
			<i class="fas fa-tasks"></i>
			<span>Ejercicios</span>
		</a>
		<div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
			<div class="bg-white py-2 collapse-inner rounded">
			<?php if ($_SESSION['rol'] == 1 || $_SESSION['rol'] == 2) { ?>
				<a class="collapse-item" href="registro_ejercicio.php">Nuevo Ejercicio</a>
			<?php } ?>	
				<a class="collapse-item" href="lista_ejercicio.php">Ejercicios</a>
			</div>
		</div>
	</li>

	<?php if ($_SESSION['rol'] == 1 ||$_SESSION['rol'] == 2) { ?>
	<li class="nav-item">
		<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseClientes" aria-expanded="true" aria-controls="collapseUtilities">
			<i class="fas fa-users"></i>
			<span>Tenistas</span>
		</a>
		<div id="collapseClientes" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
			<div class="bg-white py-2 collapse-inner rounded">
				<a class="collapse-item" href="registro_tenista.php">Nuevo Tenista</a>
				<a class="collapse-item" href="lista_tenista.php">Tenistas</a>
			</div>
		</div>
	</li>
	<?php } ?>
	<?php if ($_SESSION['rol'] == 1) { ?>			
		<li class="nav-item">
			<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseProveedor" aria-expanded="true" aria-controls="collapseUtilities">
				<i class="fas fa-baseball-ball"></i>
				<span>Entrenador</span>
			</a>
			<div id="collapseProveedor" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
				<div class="bg-white py-2 collapse-inner rounded">
					<a class="collapse-item" href="registro_entrenador.php">Nuevo Entrenador</a>
					<a class="collapse-item" href="lista_entrenador.php">Entrenadores</a>
				</div>
			</div>
		</li>
	<?php } ?>
	
		<li class="nav-item">
			<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseRendimiento" aria-expanded="true" aria-controls="collapseUtilities">
				<i class="fas fa-chart-bar"></i>
				<span>Rendimiento</span>
			</a>
			<div id="collapseRendimiento" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
				<div class="bg-white py-2 collapse-inner rounded">
					<a class="collapse-item" href="registro_rendimiento.php">Medir rendimiento</a>
					<a class="collapse-item" href="lista_rendimiento.php">Rendimiento</a>
				</div>
			</div>
		</li>
	
	<?php if ($_SESSION['rol'] == 1) { ?>
		<!-- Nav Item - Usuarios Collapse Menu -->
		<li class="nav-item">
			<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUsuarios" aria-expanded="true" aria-controls="collapseUtilities">
				<i class="fas fa-user"></i>
				<span>Usuarios</span>
			</a>
			<div id="collapseUsuarios" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
				<div class="bg-white py-2 collapse-inner rounded">
					<a class="collapse-item" href="registro_usuario.php">Nuevo Usuario</a>
					<a class="collapse-item" href="lista_usuarios.php">Usuarios</a>
				</div>
			</div>
		</li>
	<?php } ?>
	<?php if ($_SESSION['rol'] == 1) { ?>
		<!-- Nav Item - Usuarios Collapse Menu -->
		<li class="nav-item">
			<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseConfiguracion" aria-expanded="true" aria-controls="collapseConfiguracion">
				<i class="fas fa-cog"></i>
				<span>Configuraci??n</span>
			</a>
			<div id="collapseConfiguracion" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
				<div class="bg-white py-2 collapse-inner rounded">
					<a class="collapse-item" href="configuracion.php">Ver configuraci??n</a>
				</div>
			</div>
		</li>
	<?php } ?>

</ul>