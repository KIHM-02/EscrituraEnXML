<?php
			//Validar que se reciban los datos posteados
			if(isset ($_POST['btnEnviar'])){
				$nombre = $_POST['nombre'];
				//$edad = $_POST['edad'];
				$carrera = $_POST['carrera'];
				$diaNac = $_POST['diaNacimiento'];
				$mesNac = $_POST['mesNacimiento'];
				$anioNac = $_POST['anioNacimiento'];
				$sexo = $_POST['rbtnSexo'];
				//preparar la cadena en el formato deseado (Mes dia, año)
				$separarCadena = explode('-',$mesNac);
				$fechaNac = $separarCadena[1] . " " . $diaNac . ", " . $anioNac;
				//Creamos el objeto Dom y lo vinculamos al archivo deseado.
				$documentoXml = new DomDocument("1.0","utf-8");
				//Nos damos permiso para poder escribir en el fichero
				$documentoXml->formatOutput = true;
				$documentoXml->LOAD('usuarios.xml');
				//Asignamos la raiz
				$raiz = $documentoXml->getElementsByTagName("estudiantes")->item(0);
					//Creamos una instancia rama
					$rama = $documentoXml->createElement("alumno");
						//Creamos una instancia hoja
						$hoja = $documentoXml->createElement("nombre");
						//Creamos la instancia atributo (sexo)
						$hoja->setAttribute('sexo', $sexo);
						//Creamos el texto del nombre
						$hoja->appendChild($documentoXml->createTextNode($nombre));
					//Guardamos la instancia hoja en la rama
					$rama->appendChild($hoja);
					
						$hoja = $documentoXml->createElement("carrera");
						$hoja->appendChild($documentoXml->createTextNode($carrera));
					$rama->appendChild($hoja);
					
						$hoja = $documentoXml->createElement("fNacimiento");
						$hoja->setAttribute('d', $diaNac);
						$hoja->setAttribute('m', $separarCadena[0]);
						$hoja->setAttribute('a', $anioNac);
						$hoja->appendChild($documentoXml->createTextNode($fechaNac));
					$rama->appendChild($hoja);
				
				$raiz->appendChild($rama);
				
				$documentoXml->appendChild($raiz);
				//Escribimos los datos en el archivo
				$documentoXml-> save('usuarios.xml');
				header("Location: index.html");
			}
		?>
		<script lenguaje="JavaScript" type="text/javascript">
			alert("El registro se ha agregado exitosamente");
		</script>