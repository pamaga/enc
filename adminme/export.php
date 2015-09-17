<?php
require '_login.php';
require_once '../conn.php';

header("Content-type: text/plain");
header("Content-Disposition: attachment; filename=".date("Y-m-d")."-export-encuestas.csv");
$oE= new Encuesta();
$fp = fopen('php://output', 'w');
$headers=false;
foreach($oE->getAll() as $data){
    $exp=array("id encuesta"=>$data["id"],
        "tipo"=>$data["type"],
        "fecha_hora"=>$data["ins_time"],
        "id_cliente"=>$data["id_cliente"],
        "id_doc"=>$data["id_doc"],
       
        "codigo_vendedor"=>(isset($data["vendedor"]["codigo"]))?$data["vendedor"]["codigo"]:"",
        "nombre"=>(isset($data["vendedor"]["codigo"]))?$data["vendedor"]["nombre"]:"",
        "apellido"=>(isset($data["vendedor"]["codigo"]))?$data["vendedor"]["apellido"]:"",
        );
    $data["respuestas"]=  json_decode($data["respuestas"],true);
    for($i=1;$i<=20;$i++){
           $key="resp".str_pad($i,4,"0",STR_PAD_LEFT);
          
           $exp[$oE->getPreguntaByCode($key)] = (isset($data["respuestas"][$key]))?$oE->getRespuestaByCode($key,$data["respuestas"][$key]):""; 
    }
    if(!$headers){
        $headers=true;
        fputcsv ( $fp ,  array_keys($exp),   ";" ,  '"' ,  "\""  );
    }
    fputcsv ( $fp ,$exp,   ";" ,  '"' ,  "\""  );
}


fclose($fp);
exit;