<?php
	session_start();
	if(isset($_SESSION['login']) != true )
	{
		echo '<script> location.href= "../index.html"; </script>';
		die();
	}
?>
<!doctype html>
<html xmlns:p="http://primefaces.org/ui">>
<head>
<meta charset="utf-8">
<title>Menú Principal</title>
	<script src="https://kit.fontawesome.com/41bcea2ae3.js" crossoringin="anonymus">
	</script>
	<link rel="stylesheet" href="../css/style_menu.css">
	<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">	
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
								<li><a href="empresa.php">Empresas</a></li>
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
								echo ($_SESSION['login']['NOMBRES']." ".$_SESSION['login']['APELLIDOS']);
							?>	</a>
							<ul>
								<li><a href="cerrar_sesion.php">Cerrar Sesion</a></li>
							</ul>
						</li>
					</ul>
				</nav>
			</div>
		</div>
	</header>
</body>
</html>