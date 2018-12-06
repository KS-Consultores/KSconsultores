  <?php

	$nombre			= $_POST['nombre'];
	$puesto			= $_POST['puesto'];
	$empresa		= $_POST['empresa'];
	$giro			= $_POST['giro'];
	$correo			= $_POST['correo'];
	$telefonos		= $_POST['telefonos'];
	$direccion		= $_POST['direccion'];
	$ciudad			= $_POST['ciudad'];
	$estado			= $_POST['estado'];
	$comentario		= $_POST['comentario'];
	
	

// ENVIAR FORMULARIO
// CREAR EL CORREO PARA HOTEL

	$headers	= "Content-Type: text/html; charset=utf-8\n";
	$headers	.= "From: $nombre <$correo>\n";
	$recipient	= "edgar@bigbox.mx"; //cambiar quien recibe el correo
	$subject	= "Solicitud de Noticas: $nombre";
	//EDITAR EL MENSAJE
   	$mensaje  = "<b> Solicitud de CONTACTO KSConsultores </b> <br /> <br />";
	$mensaje .= "<b>Nombre:</b> ". $nombre . " \r\n <br />";
	$mensaje .= "<b>Puesto:</b> ". $puesto . " \r\n <br />";
	$mensaje .= "<b>Empresa:</b> ". $empresa . " \r\n <br />";
	$mensaje .= "<b>Giro:</b> ". $giro . " \r\n <br />";
	$mensaje .= "<b>Correo:</b> " . $correo . " \r\n <br />";
	$mensaje .= "<b>Telefonos:</b> " . $telefonos . " \r\n <br />";
	$mensaje .= "<b>Dirección:</b> " . $direccion . " \r\n <br />";
	$mensaje .= "<b>Estado:</b> " . $estado . " \r\n <br />";
	$mensaje .= "<b>Ciudad:</b> " . $ciudad . " \r\n <br />";
	$mensaje .= "<b>Comentario:</b> " . $comentario . " \r\n <br />";
	$mensaje .= "<b>Enviado el</b> " . date('d/m/Y', time()) ."\r\n <br />";

// ENVIAR STATUS
if( mail($recipient, $subject, $mensaje, $headers) ) 
	{
		echo "<html><head><style type='text/css'><!--body {background:transparent; font-family: Verdana, Geneva, sans-serif; font-size: 10px; color:#F66;}}--></style></head><body>Envio completado </body></html>";
	}
	else
	{
		echo "<html><head><style type='text/css'><!--body {background:transparent; font-family: Verdana, Geneva, sans-serif; font-size: 10px; color:#F66;}}--></style></head><body>Error de envio</body></html>";
	}
?>