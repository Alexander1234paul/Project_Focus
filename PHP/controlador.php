<?php
	include("db.php");
    
	function ctrlVacios()
	{
		if(!empty($_POST['txt_ci_ruc']) && !empty($_POST['txt_password']))
		{
			return(TRUE);
		}
		return(FALSE);
	}
    
	function ctrlExistencia()
	{
        $USUARIO = $_POST['txt_ci_ruc'];
	    $PASSWORD = $_POST['txt_password'];
		$sql="SELECT tbl_personas.CI_RUC,tbl_personas.NOMBRES,tbl_personas.APELLIDOS,tbl_roles.ROL,tbl_empresa.NOMBRE_COMERCIAL FROM tbl_usuarios INNER JOIN tbl_personas ON tbl_usuarios.ID_PERSONA=tbl_personas.ID_PERSONA INNER JOIN tbl_roles ON tbl_usuarios.ID_ROL=tbl_roles.ID_ROL INNER JOIN tbl_empresa ON tbl_usuarios.ID_EMPRESA=tbl_empresa.ID_EMPRESA WHERE tbl_personas.CI_RUC='$USUARIO' AND tbl_usuarios.PASSWORD='$PASSWORD'";
		$result=EjecutarConsulta($sql);
		if($result->num_rows > 0)
		{
			$row = $result->fetch_assoc();
			iniciarSession($row['CI_RUC'],$row['NOMBRES'],$row['APELLIDOS'],$row['ROL'],$row['NOMBRE_COMERCIAL']);
			return(TRUE);
		}
		return(FALSE);
		
	}
	function iniciarSession($ci_ruc,$nombres,$apellidos,$rol,$empresa)
	{		
		try
		{
			session_start();
			$_SESSION['login']=array();
			$_SESSION['login']['CI_RUC']=$ci_ruc;
			$_SESSION['login']['NOMBRES']=$nombres;
			$_SESSION['login']['APELLIDOS']=$apellidos;
			$_SESSION['login']['ROL']=$rol;
			$_SESSION['login']['EMPRESA']=$empresa;
		}
		catch(Exception $e)
		{
			echo '<script> alert("Error al iniciar sesión".$e->getMessage()) </script>';
		}
	}
	function DatosUsuarios()
	{
		$sql="select tbl_usuarios.ID_USUARIO,tbl_personas.CI_RUC,tbl_personas.NOMBRES,tbl_personas.APELLIDOS,tbl_personas.TELEFONO,tbl_personas.EMAIL from tbl_usuarios inner join tbl_personas on tbl_usuarios.ID_PERSONA=tbl_personas.ID_PERSONA";
		$result=EjecutarConsulta($sql);

		echo("<table border='1'>
				  <tr scope='col'>
					<th>ID</th>
					<th>CI/RUC</th>
					<th>NOMBRES</th>
					<th>APELLIDOS</th>
					<th>TELEFONO</th>
					<th>EMAIL</th>
					<th colspan='2'>ACCIONES</th>
				  </tr>");
		while($row=mysqli_fetch_array($result))
		{
			echo("
				  <tr>
					<td>".$row['ID_USUARIO']."</td>
					<td>".$row['CI_RUC']."</td>
					<td>".$row['NOMBRES']."</td>
					<td>".$row['APELLIDOS']."</td>
					<td>".$row['TELEFONO']."</td>
					<td>".$row['EMAIL']."</td>
					<td align='center' style='width: 30px;' ><input type='image' src='../img/edit.png' height='20' width='20'></td>
					<td align='center' style='width: 30px;'><input type='image' src='../img/delete.png' height='20' width='20'></td>
				  </tr>");
		}
		echo("</table>");
	}
    function Roles() {
        
    }
?>