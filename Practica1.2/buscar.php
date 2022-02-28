<?php 

	if (isset($_POST['buscar']))
	{
		$nombre = $_POST['nombre'];

		if (!$agenda = simplexml_load_file("usuarios.xml")) 
		{
			echo "No se pudo hacer la carga del archivo debido a que no se econtró";
		}
		else
		{
			foreach($agenda as $contacto)
			{
				if ($contacto->{"nombre"} == $nombre)
				{
					echo "<p>El nombre del usuario es: ".$contacto->{"nombre"}."</p>";
					echo "<p>El apellido del usuario es: ".$contacto->{"apellido"}."</p>";
					echo "<p>La empresa del usuario es: ".$contacto->{"empresa"}."</p>";
					echo "<p>El telefono fijo del usuario es: ".$contacto->{"telefonoFijo"}."</p>";
					echo "<p>El telefono móvil del usuario es: ".$contacto->{"telefonoMovil"}."</p>";
					echo "<p>El apellido del usuario es: ".$contacto->{"email"}."</p></br>";
				}
			}
		}
	}
?>