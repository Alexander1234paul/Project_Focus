<?php
session_start();
if (isset($_SESSION['login']) != true) {
	echo '<script> location.href= "../index.html"; </script>';
	die();
}
?>

<!doctype html>
<html>

<head>
	<meta charset="utf-8">
	<title>Gestor de Usuarios</title>
	<script src="https://kit.fontawesome.com/41bcea2ae3.js" crossoringin="anonymus">
	</script>
	<link rel="stylesheet" href="../css/style_menu.css">
	<link rel="stylesheet" href="../css/style-bootstrap.css">
	<!-- CSS only -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous" />

	

</head>

<body>
<header>
		<div class="heder__superior">
			<div class="logo">
				<img src="../img/logo.png" alt="">
			</div>
			<div class="search">
				<input type="search" placeholder="¿Qué deseas buscar?">
			</div>
		</div>
		<div class="login">
		</div>
		<div class="container__menu">
			<div class="menu">
				<input type="checkbox" id="check__menu">
				<label id="label__check" for="check__menu">
					<i class="fa-solid fa-bars icon__menu"></i>
				</label>
				<nav>
					<ul>
						<li><a href="menu.php" id="selected"></a></li>
						<li>
							<a href="#">Administración</a>
							<ul>
								<li><a href="usuarios.php">Usuarios</a></li>
								<li><a href="#">Roles</a></li>
								<li><a href="#">Permisos</a></li>
								<li><a href="#">Categorías</a></li>
							</ul>

						</li>
						<li>
							<a href="#">Compras</a>
							<ul>
								<li><a href="#">Productos</a></li>
								<li><a href="#">Proveedores</a></li>
							</ul>
						</li>
						<li>
							<a href="#">Ventas</a>
							<ul>
								<li><a href="#">Clientes</a></li>
								<li><a href="#">Proformas</a></li>
								<li><a href="#">Contratos</a></li>
							</ul>
						</li>
						<li><a href="#">Cartera</a></li>
						<li><a href="#">Ayuda</a></li>
						<li>
							<a href="#"><?php
										echo ($_SESSION['login']['NOMBRES'] . " " . $_SESSION['login']['APELLIDOS']);
										?> </a>
							<ul>
								<li><a href="cerrar_sesion.php">Cerrar Sesion</a></li>
							</ul>
						</li>
					</ul>
				</nav>
			</div>
		</div>
		<div align="center">
			<img src="../img/user.png" width="128" height="128" alt="" />
		</div>
		<div class="main-content ">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-12">
						<div class="card">
							<div class="header">
								<div class="row">
									<div class="col-md-5">
										<h4 class="title">Usuarios</h4>
										<p class="category">Lista de Usuarios</p>
									</div>
									<!-- Modal -->
									<div class="modal fade" id="studentaddmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
										<div class="modal-dialog" role="document">
											<div class="modal-content">
												<div class="modal-header">
													<h5 class="modal-title" id="exampleModalLabel">Agrege  usuario </h5>
													<button type="button" class="close" data-dismiss="modal" aria-label="Close">
														<span aria-hidden="true">&times;</span>
													</button>
												</div>

												<form action="insertcode.php" method="POST">

													<div class="modal-body">
														<div class="form-group">
															<label> Nombre </label>
															<input type="text" name="fname" class="form-control" placeholder="Ingrese nombre">
														</div>

														<div class="form-group">
															<label> Rol </label>
															<input type="text" name="lname" class="form-control" placeholder="Asigne el Rol">
														</div>

														<div class="form-group">
															<label> Nombre de la Empresa </label>
															<input type="text" name="course" class="form-control" placeholder="Ingrese Empresa">
														</div>

														<div class="form-group">
															<label> Contraseña </label>
															<input type="password" name="password"  class="form-control" placeholder="Ingrese Contraseña">
														</div>
													</div>
													<div class="modal-footer">
														<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
														<button type="submit" name="insertdata" class="btn btn-primary">Save Data</button>
													</div>
												</form>

											</div>
										</div>
									</div>

									<div class="card-body">
										<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#studentaddmodal">
											Crear Usuarios
										</button>
									</div>
									<div align="center">
										<table class="table table-hover table-striped" style="width: 50%; height: 100px;">
											<thead>
												<tr>
													<th>ID</th>
													<th>CI/RUC</th>
													<th>NOMBRES</th>
													<th>APELLIDOS</th>
													<th>TELEFONO</th>
													<th>EMAIL</th>
													<th colspan='2'>ACCIONES</th>
												</tr>
											</thead>
											<?php
											include("db.php");
											$sql = "select tbl_usuarios.ID_USUARIO,tbl_personas.CI_RUC,tbl_personas.NOMBRES,tbl_personas.APELLIDOS,tbl_personas.TELEFONO,tbl_personas.EMAIL from tbl_usuarios inner join tbl_personas on tbl_usuarios.ID_PERSONA=tbl_personas.ID_PERSONA";
											$result = EjecutarConsulta($sql);
											/*DatosUsuarios();*/
											foreach ($result as $row) {
											?>
												<tbody>
													<tr>
														<td><?php echo $row['ID_USUARIO'] ?></td>
														<td><?php echo $row['CI_RUC'] ?></td>
														<td><?php echo $row['NOMBRES'] ?></td>
														<td><?php echo $row['APELLIDOS'] ?></td>
														<td><?php echo $row['TELEFONO'] ?></td>
														<td><?php echo $row['EMAIL'] ?></td>
														<td align='center' style='width: 30px;'><input type='image' src='../img/edit.png' height='20' width='20'></td>
														<td align='center' style='width: 30px;'><input type='image' src='../img/delete.png' height='20' width='20'></td>
													</tr>
												</tbody>
											<?php
											}
											?>
										</table>

									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		</div>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>

	<script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>
	</header>
	
</body>

</html>