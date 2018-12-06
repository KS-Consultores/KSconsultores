  <?php

	$nombre			= $_POST['nombre'];
	$correo			= $_POST['correo'];

	if($nombre == '' || $nombre == 'ninguno' || $nombre == "Nombre"){
			echo "<html><head><style type='text/css'><!--body {background:transparent; font-family: Verdana, Geneva, sans-serif; font-size: 10px; color:#F66;}}--></style></head><body>Ingresa tu nombre</body></html>";
	}
	elseif(!strpos($correo, '@') || !strpos($correo, '.')){
		echo "<html><head><style type='text/css'><!--body {background:transparent; font-family: Verdana, Geneva, sans-serif; font-size: 10px; color:#F66;}}--></style></head><body>Ingresa un correo válido.</body></html>";
	}
	else{
		// ENVIAR FORMULARIO
		// CREAR EL CORREO PARA HOTEL

		$headers	= "Content-Type: text/html; charset=utf-8\n";
		$headers	.= "From: $nombre <$correo>\n";
		$recipient	= "edgar@bigbox.mx"; //cambiar quien recibe el correo
		$subject	= "Solicitud de Noticas: $nombre";
		//EDITAR EL MENSAJE
	   	$mensaje  = "<b> Solicitud de Noticias Ks Consultores </b> <br /> <br />";
		$mensaje .= "<b>Nombre:</b> ". $nombre . " \r\n <br />";
		$mensaje .= "<b>Correo:</b> " . $correo . " \r\n <br />";
		$mensaje .= "<b>Enviado el</b> " . date('d/m/Y', time()) ."\r\n <br />";

		if( mail($recipient, $subject, $mensaje, $headers) ) {
			echo "<html><head><style type='text/css'><!--body {background:transparent; font-family: Verdana, Geneva, sans-serif; font-size: 10px; color:#F66;}}--></style></head><body>Envio completado </body></html>";
		}
		else{
			echo "<html><head><style type='text/css'><!--body {background:transparent; font-family: Verdana, Geneva, sans-serif; font-size: 10px; color:#F66;}}--></style></head><body>Error de envio</body></html>";
		}
	}
?>