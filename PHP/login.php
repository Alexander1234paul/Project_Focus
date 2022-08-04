<?php
	include("controlador.php");		
	if(isset($_POST["btn_ingresar"]))
	{
		if(ctrlVacios())
		{
			if(ctrlExistencia())
			{
				echo '<script> location.href= "menu.php"; </script>';
			}
			else
			{
				echo '<script> alert("Error, las credenciales no coinciden..."); location.href= "../index.html"; </script>';
			}
			
		}
		else
		{
			echo '<script> alert("Error, no deben existir campos vacíos..."); location.href= "../index.html"; </script>';
		}
	}
?>