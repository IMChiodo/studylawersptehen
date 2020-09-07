<?php

$dir_subida = 'uploads/';
$fichero_subido = $dir_subida . basename($_FILES['cvenviado']['name']);
$nombrearchivo = $_FILES['cvenviado']['tmp_name'];

if(isset($_POST['g-recaptcha-response']))
  $captcha=$_POST['g-recaptcha-response'];

if(!$captcha){
  header('Location: http://www.estudiochiodo.com/#trabajo');
exit;
}
$response=json_decode(file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=6LfBFyYUAAAAAKq61Y4EKfywMyB32KjCofQxvU4f&response=".$captcha."&remoteip=".$_SERVER['REMOTE_ADDR']), true);
if($response['success'] == false)
{
  header('Location: http://www.estudiochiodo.com/#trabajo');
exit;
}
else {

if (move_uploaded_file($nombrearchivo, $fichero_subido)) {
    header('Location: http://www.estudiochiodo.com/#trabajo');
} else {
    header('Location: http://www.estudiochiodo.com/#trabajo');
}

//error_reporting(0);
$to = "contacto@estudiochiodo.com";
$emailtrabajo = $_REQUEST['emailtrabajo'];

$fichero_subido = str_replace(' ','%20',$fichero_subido);

$subject = "Nuevo curriculum subido a Estudio Chiodo";
$nombretrabajo = $_REQUEST['nombretrabajo'];

$body = "<html><head><title>Nuevo Email</title></head>".
	    "<body><h2>Nuevo CV de: ".$nombretrabajo.
        "</h2><br/><h2>Correo: ".$emailtrabajo.
        '</h2><br/><h2>Link de Descarga: <a href="http://www.estudiochiodo.com/'.$fichero_subido.'">VER / DESCARGAR CV</a></h2></body></hmtl>';
$headers = "From: contacto@estudiochiodo.com\r\n";
$headers.= "MIME-Version: 1.0" . "\r\n";
$headers.= "Content-type: text/html; charset=utf-8" . "\r\n";
$headers.= "Reply-To: ".$emailtrabajo . "\r\n";

 /* if( mail($to, $subject, $body, $headers) )
  {
  $subject2 = "CV enviado a Estudio Chiodo";
  $body2 =  "Gracias por interesarse en nosotros, le responderemos a la brevedad.";
  $headers2 = "From: contaco@estudiochiodo.com\r\n";
  $Response =  mail($emailtrabajo, $subject2, $body2, $headers2);
  }
  else
  {
      echo "<h2>Sorry, there has been an error</h2>";
  }*/

header('Location: http://www.estudiochiodo.com/#trabajo');
exit;}
?>
