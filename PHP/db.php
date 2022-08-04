<?php
	function EjecutarConsulta($sql)
	{
		$conexion=Conectar();
		$result=$conexion->query($sql);
		Desconectar($conexion);
		return($result);
	}
	function Conectar()
	{
		try
		{
			$user='root';
			$password='';
			$hostname='localhost';
			$database='easy';
			$cadenaConexion=mysqli_connect($hostname,$user,$password,$database);
			$cadenaConexion->set_charset('utf8');
			return $cadenaConexion;	
		}
		catch (Exception $e)
		{
			
		}
	}
	
	function Desconectar($cadenaConexion)
	{
		$close =mysqli_close($cadenaConexion)
				or die("Ha sucedido un error inesperado en la desconexión a la base de datos");
		return($close);
	}
?>