<?php
	session_start();
	if(isset($_SESSION['login']) != true )
	{
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
				<?php
					echo ($_SESSION['login']['NOMBRES']." ".$_SESSION['login']['APELLIDOS']);
				?>
				</p>
				<?php
					echo ($_SESSION['login']['ROL']);
				?>
				</p>
				<?php
					echo ($_SESSION['login']['EMPRESA']);
				?>
				</p>
				<a href="cerrar_sesion.php">Cerrar Sesión</a>
			</div>
		<div class="container__menu">
			<div class="menu">
				<input type="checkbox" id="check__menu">
				<label id="label__check" for="check__menu">
					<i class="fa-solid fa-bars icon__menu"></i>
				</label>
				<nav>
					<ul>
						<li><a href="#" id="selected"></a></li>
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
					</ul>
				</nav>
			</div>
		</div>
		<div align="center">
			<img src="../img/user.png" width="128" height="128" alt=""/>
		</div>

	  	<div align="center" style="width:auto; height:200px; overflow: scroll; align-content: center;">
			<?php
				include("controlador.php");	
				DatosUsuarios();
			?>
		</div>
	</header>
</body>
</html>