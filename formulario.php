<?php
	$to = "contacto@estudiochiodo.com";
	$emailcontacto = $_REQUEST['emailcontacto'];
	
    $subject = "Nueva consulta a Estudio Chiodo"; 
	$nombrecontacto = $_REQUEST['nombrecontacto'];
	$mensaje = $_REQUEST['mensaje'];
	$asunto = $_REQUEST['asunto'];
	
	$body = "<html><head><title>Nuevo Email</title></head>".
	"<body><h3>Nuevo mensaje de: ".$nombrecontacto.
    "</h3><h4>Correo: ".$emailcontacto.
	"</h4><h4>Asunto: ".$asunto.
	"</h4><h4>Consulta: </h4><p>".$mensaje."</p><br/></body></html>";
    $headers = "From: contacto@estudiochiodo.com\r\n";
    $headers.= "MIME-Version: 1.0" . "\r\n";
    $headers.= "Content-type: text/html; charset=utf-8" . "\r\n";
    $headers.= "Reply-To: ".$emailcontacto . "\r\n";
    
   /* if(mail($to, $subject, $body, $headers) )
    {
        $headers2 = "From: contacto@estudiochiodo.com\r\n"; 
		$subject2 = "Consulta a Estudio Chiodo"; 
		$body2 =  "Gracias por realizar una consulta, le responderemos a la brevedad.";	
		$Response =  mail($email, $subject2, $body2, $headers2); 
    }
    else
    {
         echo "Algo salió mal";
    }*/
header('Location: http://www.estudiochiodo.com/#contacto');
?>	