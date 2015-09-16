<?php
require_once 'conn.php';
require __DIR__.'/lib/PHPMailer/PHPMailerAutoload.php';



$respuestas=json_encode(cleanResp($_POST));


if ( false === mysql_query("INSERT INTO resp_pre_venta (respuestas) VALUES('$respuestas')")) {
        printf("Error: %s\n", mysql_error());
    }elseif(SENDMAIL){

        $mail = new PHPMailer;
        $mail->isSendmail();
        $mail->setFrom('no-responder@atenasventilacion.com.ar', 'Encuesta Atenas');
        $mail->addAddress(REPORT_MAIL,REPORT_MAIL);
        $mail->Subject = 'Nueva encuesta cargada en Atenas';
        $mail->msgHTML(file_get_contents('__tpl_email_encuesta.html.html'));
        $mail->AltBody = 'Nueva encuesta cargada en Atenas';
        if (!$mail->send()) {
            //echo "Mailer Error: " . $mail->ErrorInfo;
        } else {
           // echo "Message sent!";
        }
    }

//     $stats=process_stats();
//     foreach($stats as $pregunta=>$respuestas){
//         $respuestas=json_encode($respuestas,true);
//          if (!$mysql->query("DELETE FROM stats_pre_venta WHERE pregunta = '$pregunta'")) {
//            printf("Error: %s\n", $mysql->error);
//           }
//         if (!$mysql->query("INSERT INTO stats_pre_venta (pregunta,resultados) VALUES('$pregunta','$respuestas')")) {
//            printf("Error: %s\n", $mysql->error);
//           }
//     }


//  $mysql->close();


 ?>

<!DOCTYPE HTML>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>Gracias.</title>

		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>


	</head>
	<body>
           Tu opinión es muy valiosa, gracias por contestar la encuesta.
	</body>
</html>
