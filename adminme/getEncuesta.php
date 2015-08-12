<?php
require '_login.php';
require_once '../conn.php';
$oE= new Encuesta();
$aEncuesta=$oE->getEncuesta($_REQUEST["id"]);

?>
 <?php
       foreach (getRespConfig() as $k=>$options){
           echo "<br/><p class='lead'>".$options["pregunta"]."</p>";
            foreach($options["resp"] as $value=>$text){
               
               if( in_array($k,array_keys($aEncuesta["respuestas2"]) ) ){
                   //SE RESPONDIO LA PREGUNTA RESP0001
                   if($value==$aEncuesta["respuestas2"][$k] ){
                       echo "Respuesta: <b>$text</b>";
                   }
               }

            }
           }      
