<?php 

	if (isset($_POST['btnAgregar'])) 
	{
		$nombre  = $_POST['nombre'];
		$apellido = $_POST['apellido'];
		$empresa = $_POST['empresa'];
		$telefonoFijo = $_POST['telefonoFijo'];
		$telefonoMovil = $_POST['telefonoMovil'];
		$email = $_POST['email'];

		$documentoXml = new DomDocument("1.0", "utf-8");  //esta es la creacion del documento

		$documentoXml->formatOutput = true;				  //Permisos de escritura sobre el archivo xml
		$documentoXml->LOAD('usuarios.xml');

		//iniciamos el proceso de raiz, rama, tags
		$raiz = $documentoXml->getElementsByTagName("agenda")->item(0);

		//creamos una rama
			$rama = $documentoXml->createElement("contacto");

		//creamos los tags
				$tags = $documentoXml->createElement("nombre");
				$tags->appendChild($documentoXml->createTextNode($nombre));
		
		//Guardamos la instancia tags en la rama
			$rama->appendChild($tags);

				$tags = $documentoXml->createElement("apellido");
				$tags->appendChild($documentoXml->createTextNode($apellido));
			$rama->appendChild($tags);

				$tags = $documentoXml->createElement("empresa");
				$tags->appendChild($documentoXml->createTextNode($empresa));
			$rama->appendChild($tags);

				$tags = $documentoXml->createElement("telefonoFijo");
				$tags->appendChild($documentoXml->createTextNode($telefonoFijo));
			$rama->appendChild($tags);

				$tags = $documentoXml->createElement("telefonoMovil");
				$tags->appendChild($documentoXml->createTextNode($telefonoMovil));
			$rama->appendChild($tags);

				$tags = $documentoXml->createElement("email");
				$tags->appendChild($documentoXml->createTextNode($email));
			$rama->appendChild($tags);

			//se cierra completamente la rama
			$raiz->appendChild($rama);

			//se cierra la raiz
			$documentoXml->appendChild($raiz);

			//Escribimos los datos en el archivo
			$documentoXml->save('usuarios.xml');
			header("Location: index.html");
	}
?>

<script lenguaje="JavaScript" type="text/javascript">
		alert("El registro se ha agregado exitosamente");
</script>
