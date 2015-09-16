<?php

require_once "config.inc.php";
if (php_uname('n') =="zeus"){
    define("db_host","127.0.0.1");
    define("db_user","root");
    define("db_pass","321321");
    define("db_name","encuestas");
}else{
    define("db_host","127.0.0.1");
    define("db_user","atenas_encuestas");
    define("db_pass","claudioAprendePaddle");
    define("db_name","atenas_encuestas");
}

 $__mysql=mysql_connect(db_host, db_user, db_pass, db_name);
 mysql_select_db(db_name);
 $mysql= new _mysql($__mysql);
 
 class _mysql{
     private $link;
     public $error;
     private $result;
     function __construct($link) {
         $this->link = $link;
     }
     function query($q){
         $this->result=mysql_query($q,$this->link);
         $this->error =  mysql_errno($this->link);
         if(empty( $this->error)) {
             return $this; 
         } else {
             return false; 
         }
       
     }
     function fetch_array(){
         return mysql_fetch_array($this->result,MYSQL_ASSOC);
     }
     function real_escape_string($s){
         return mysql_real_escape_string($s);
     }
     function close(){
         //
     }
     
 }
 
if ($mysql=== false) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}

function getRespConfig(){
    $return=array();
    $gralOptions=array(
        "1"=>"Muy bueno"
        ,"2"=>"Bueno"
        ,"3"=>"Regular"
        ,"4"=>"Malo"
        ,"5"=>"Muy malo"
         );
    $return["resp0001"]=array("formType"=>"select", "inline"=>"false","pregunta"=>"Cómo nos conoció?","resp"=>array(
        "1"=>"Me lo recomendó un amigo o conocido"
        ,"2"=>"Google"
        ,"3"=>"Otros Buscadores"
        ,"4"=>"Facebook"
        ,"5"=>"Twitter"
        ,"6"=>"Google+"
        ,"7"=>"Youtube"
        ,"8"=>"Otras redes sociales"
        ,"9"=>"Eventos y/o convenciones"
        ,"10"=>"TV"
        ,"11"=>"Publicidad Gráfica"
        ,"12"=>"Radio"
        ));
    $return["resp0002"]=array("opciones_generales"=>true,"pregunta"=>"Cómo fue atendido?","resp"=>$gralOptions);
    $return["resp0003"]=array("opciones_generales"=>true,"pregunta"=>"Tiempo en envío de respuesta?","resp"=>$gralOptions);
    $return["resp0004"]=array("opciones_generales"=>true,"pregunta"=>"Cortesía en la atención?","resp"=>$gralOptions);
    $return["resp0005"]=array("opciones_generales"=>true,"pregunta"=>"Qué imagen le proporcionan nuestros productos?","resp"=>$gralOptions);
    $return["resp0006"]=array("opciones_generales"=>true,"pregunta"=>"Qué opina sobre la garantía ofrecida?","resp"=>$gralOptions);
    $return["resp0007"]=array("pregunta"=>"Qué canal prefiere para contactarlo?","resp"=>array(
        "1"=>"Telefono",
        "2"=>"Email",
        "3"=>"Facebook",
    ));
    $return["resp0008"]=array("pregunta"=>"Comentarios","resp"=>array("1"=>"Opción 1","2"=>"Opción 2"),"type"=>"text");
    
    $return["resp0009"]=array("opciones_generales"=>true,"pregunta"=>"¿Qué opinión tiene sobre la calidad de nuestros productos?","resp"=>$gralOptions);
    $return["resp0010"]=array("opciones_generales"=>true,"pregunta"=>"¿Y sobre la variedad ofrecida?","resp"=>$gralOptions);
    $return["resp0011"]=array("opciones_generales"=>true,"pregunta"=>"¿Cómo calificaría el nivel de precios?","resp"=>$gralOptions);
    $return["resp0012"]=array("opciones_generales"=>true,"pregunta"=>"¿Qué opina sobre los medios de pagos ofrecidos?","resp"=>$gralOptions);
    $return["resp0013"]=array("opciones_generales"=>true,"pregunta"=>"¿Qué opina sobre nuestro sistema de cobranzas?","resp"=>$gralOptions);
    $return["resp0014"]=array("opciones_generales"=>true,"pregunta"=>"¿Qué opina sobre los plazos de entrega?","resp"=>$gralOptions);
    $return["resp0015"]=array("opciones_generales"=>true,"pregunta"=>"¿Qué opina sobre nuestro sistema de envíos?","resp"=>$gralOptions);
    return $return;
    
}

function cleanResp($resp){
    $config= getRespConfig();
    return $resp;
    
}

function process_stats(){
    global $mysql;
    if (!$result = $mysql->query("SELECT respuestas FROM resp_pre_venta ")) {
        printf("Error: %s\n", $mysql->error);
    }
    $config=getRespConfig();
    $resp=array();
    while ($myrow = $result->fetch_array(MYSQLI_ASSOC))
    {
      $aValue=json_decode($myrow["respuestas"],true);
      foreach ($aValue as $pregunta =>$respuesta){
          if(isset($config[$pregunta]["type"]) && $config[$pregunta]["type"]=="text" )continue;
          if(!isset($resp[$pregunta][$respuesta]))$resp[$pregunta][$respuesta]=0;
          $resp[$pregunta][$respuesta]= $resp[$pregunta][$respuesta] + 1;
      }
      
    
    }
    //var_dump($resp);
    $result->close();
    return $resp;
   
}
function get_stats($type="GENERAL"){
    global $mysql;
    if (!$result = $mysql->query("SELECT pregunta, resultados FROM stats_pre_venta ")) {
        printf("Error: %s\n", $mysql->error);
    }
    $config=getRespConfig();
    $resp=array("data"=>array(),"categories"=>array(),"series"=>array(),"seriesNames"=>array(),"pares"=>array());
    $cta=0;
    while ($myrow = $result->fetch_array(MYSQLI_ASSOC))
    {
       
     //   echo "{$myrow["pregunta"]}*{$config[$myrow["pregunta"]]["opciones_generales"]} \n";
        $process=false;
        if ($type=="GENERAL" && isset($config[$myrow["pregunta"]]["opciones_generales"]) && $config[$myrow["pregunta"]]["opciones_generales"]){
            $process=true;
        }elseif($type !="GENERAL" && $myrow["pregunta"] ==$type){
             $process=true;
        }
        
        
      if($process){  
           $cta++;
            $aValue=json_decode($myrow["resultados"],true);
          //  print_r($aValue);
            $resp["data"][] = $myrow;
            $resp["categories"][]=$config[$myrow["pregunta"]]["pregunta"];

            foreach($config[$myrow["pregunta"]]["resp"] as $opNro=>$opText){
                    if(in_array($opNro, array_keys($aValue))){
                        $resp["_series"][$config[$myrow["pregunta"]]["resp"][$opNro]][] = $aValue[$opNro];
                    }else{
                         $resp["_series"][$config[$myrow["pregunta"]]["resp"][$opNro]][] = 0;
                    }
                  
            }
        }
        
     }
     
     //ordeno los valores
    // print_r($resp);
     if(!is_array($resp) || !isset($resp["_series"]))$resp["_series"]=array();
    
     foreach($resp["_series"] as $k=> $v){
         $resp["series"][]=array("name"=>$k,"data"=>$v);
         $resp["seriesNames"][]=$k;
         
         if($v[0]>0) $resp["pares"][]=array($k,$v[0]);
     }
     unset($resp["_series"]);
    $result->close();
    return $resp;
   
}

class Encuesta{
    
    private $aVendedores=array();
   
    public function __construct() {
        global $mysql;
        $this->mysql = $mysql;
    }
    
    private function loadVendedores(){
        if ( ! empty($this->aVendedores))return;
        
        if (!$result = $this->mysql->query("SELECT codigo,nombre,apellido FROM vendedores")) {
            printf("Error: %s\n", $mysql->error);
        }
        while ($oVend = $result->fetch_array(MYSQLI_ASSOC))
        {
            $this->aVendedores[$oVend["codigo"]] = $oVend;
        }

    }
    private function getVendedor($id){
        if( isset($this->aVendedores[$id]) ){
            return $this->aVendedores[$id];
        }else{
            return array("nombre"=>"","apellido"=>"");
        }
        
    }
    function getEncuesta($id=0){
         $id= intval($id);
         if (!$result = $this->mysql->query("SELECT id, DATE_FORMAT(ins_time,'%d/%m/%Y %H:%i:%s') as fecha, respuestas
                                                FROM resp_pre_venta WHERE id=$id")) {
            printf("Error: %s\n", $this->mysql->error);
        }
        $res= $result->fetch_array(MYSQLI_ASSOC);
        $res["respuestas2"]= json_decode($res["respuestas"],true);
        return $res;
    }
    
    function delete($id=0){
         $id= intval($id);
         
          if (!$result = $this->mysql->query("DELETE FROM resp_pre_venta WHERE id='$id'")) {
            printf("Error: %s\n", $this->mysql->error);
            return false;
          }
          return true;
    }
    
    private function _getFilter($filters){
         $_filter="";
        if( isset($filters["type"]) && ! empty($filters["type"]) && $filters["type"]=="POSTVENTA"){
             $_filter .=" AND respuestas like '%\"type\":\"POSTVENTA\"%'";
        }
        if( isset($filters["type"]) && ! empty($filters["type"]) && $filters["type"]=="PREVENTA"){
             $_filter .=" AND respuestas like '%\"type\":\"PREVENTA\"%'";
        }
        if( isset($filters["id_vendedor"]) && ! empty($filters["id_vendedor"])){
             $_filter .=" AND respuestas like '%\"id_vendedor\":\"".intval($filters["id_vendedor"])."\"%'";
        }
        return $_filter;
    }
    function getAll($filters){
        $this->loadVendedores();
        $_filter= $this->_getFilter($filters);
        
         $return=array();
         if (!$result = $this->mysql->query("SELECT id, DATE_FORMAT(ins_time,'%d/%m/%Y %H:%i:%s') as fecha, respuestas 
                    FROM resp_pre_venta WHERE 1 ".$_filter)) {
            printf("Error: %s\n", $mysql->error);
        }
   
        $resp=array();
        while ($oEncuestas = $result->fetch_array(MYSQLI_ASSOC))
        {
            $aResp = json_decode($oEncuestas["respuestas"],true);
            if( ! isset($aResp["id_vendedor"]) || $aResp["id_vendedor"] <= 0 ){
                $aResp["id_vendedor"] = 0;
            }
            if( ! isset($aResp["id_cliente"]) || $aResp["id_cliente"] <= 0 ){
                $oEncuestas["id_cliente"] = 0;
            }else{
                $oEncuestas["id_cliente"] = $aResp["id_cliente"];
            }
            if( ! isset($aResp["id_doc"]) || $aResp["id_doc"] <= 0 ){
                $oEncuestas["id_doc"] = 0;
            }else{
                $oEncuestas["id_doc"] = $aResp["id_doc"];
            }
            
            $oEncuestas["vendedor"]= $this->getVendedor($aResp["id_vendedor"]);
            if( !isset($aResp["type"])){
                $oEncuestas["type"]="-";
            }else{
               $oEncuestas["type"]=$aResp["type"];  
            }
            $return[] = $oEncuestas;
        }
        return $return;
    }
    
    function processStats($filters){
        $_filter= $this->_getFilter($filters);
        if (!$result = $this->mysql->query("SELECT respuestas FROM resp_pre_venta WHERE 1 {$_filter} ")) {
            printf("Error: %s\n", $this->mysql->error);
        }
        $config=getRespConfig();
        $resp=array();
        while ($myrow = $result->fetch_array(MYSQLI_ASSOC))
        {
          $aValue=json_decode($myrow["respuestas"],true);
          foreach ($aValue as $pregunta =>$respuesta){
              if(isset($config[$pregunta]["type"]) && $config[$pregunta]["type"]=="text" )continue;
              if(!isset($resp[$pregunta][$respuesta]))$resp[$pregunta][$respuesta]=0;
              $resp[$pregunta][$respuesta]= $resp[$pregunta][$respuesta] + 1;
          }


        }
        //var_dump($resp);
        $result->close();
        $stats=$resp;
        $this->mysql->query("TRUNCATE stats_pre_venta");
        foreach($stats as $pregunta=>$respuestas){
            $respuestas=json_encode($respuestas,true);
//             if (!$this->mysql->query("DELETE FROM stats_pre_venta WHERE pregunta = '$pregunta'")) {
//               printf("Error: %s\n", $this->mysql->error);
//              } 
            if (!$this->mysql->query("INSERT INTO stats_pre_venta (pregunta,resultados) VALUES('$pregunta','$respuestas')")) {
               printf("Error: %s\n", $this->mysql->error);
              } 
        }
    }
    
    
}
class Vendedor{
    public $nombre;
    public $apellido;
    public $id;
    public $codigo;
    private $mysql;
    
    public function __construct() {
        global $mysql;
        $this->mysql = $mysql;
    }
    public function mysqlScape(){
        $this->nombre = $this->mysql->real_escape_string($this->nombre);
        $this->apellido = $this->mysql->real_escape_string($this->apellido);
        $this->codigo = $this->mysql->real_escape_string($this->codigo);
        $this->id = intval($this->id);
    }
    public function getVendedores(){
        $return=array();
         if (!$result = $this->mysql->query("SELECT nombre, apellido, codigo,id FROM vendedores")) {
            printf("Error: %s\n", $this->mysql->error);die();
        }
        $config=getRespConfig();
        $resp=array();
      
        while ($oVendedor = $result->fetch_array(MYSQLI_ASSOC))
        {
            $return[] = $oVendedor;
        }
        return $return;
    }
    public function get(){
        $this->mysqlScape();
        if($this->id <=0){
            printf("El id no es mayor que cero");
        }
        $return=array();
         if (!$result = $this->mysql->query("SELECT nombre, apellido, codigo,id 
             FROM vendedores WHERE id = '$this->id'")) {
            printf("Error: %s\n", $mysql->error);
        }
        $oVendedor = $result->fetch_array(MYSQLI_ASSOC);
        $this->nombre = $oVendedor["nombre"];
        $this->apellido =$oVendedor["apellido"];
        $this->codigo = $oVendedor["codigo"];
 
    }
    public function delete(){
        $this->mysqlScape();
        $return=array();
         if (!$result = $this->mysql->query("DELETE from vendedores WHERE id = '$this->id'")) {
            printf("Error: %s\n", $mysql->error);
        }
      
    }
    public function save(){
        $this->mysqlScape();
        if(empty($this->id)){
            //nuevo

            if (!$this->mysql->query("INSERT INTO vendedores (nombre,apellido,codigo) VALUES('{$this->nombre}','{$this->apellido}','{$this->codigo}')")) {
                 printf("Error: %s\n", $this->mysql->error);
              }       
 
        }else{
            //modificando
            
             if (!$this->mysql->query("UPDATE vendedores 
                                        SET nombre = '{$this->nombre}',
                                         apellido = '{$this->apellido}',
                                         codigo = '{$this->codigo}'
                                            WHERE id = {$this->id} ")) {
                                                
                 printf("Error: %s\n", $this->mysql->error);
              }  
        }
    }
    
}

function verifyDataForm(){
    if (!isset($_GET["id_vendedor"]) || !isset($_GET["id_cliente"]) || !isset($_GET["id_doc"]) ){
        echo "Formato de la encuesta incorrecto. Verifique todos los datos necesarios";
        die();
    }
}