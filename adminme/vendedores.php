<?php
require '_login.php';
require_once '../conn.php';
$oV = new Vendedor();
$inputCod="";
$inputNombre="";
$inputApellido="";
$id=0;
if(isset($_POST["nombre"])){
  
    $oV->nombre = (isset($_POST["nombre"]))?$_POST["nombre"]:"";
    $oV->apellido = (isset($_POST["apellido"]))?$_POST["apellido"]:"";
    $oV->codigo = (isset($_POST["codigo"]))?$_POST["codigo"]:"";
    $oV->id = (isset($_POST["id"]))?$_POST["id"]:0;
    $oV->save();
}

if(isset($_POST["op"]) && isset($_POST["opid"])){

    switch($_POST["op"]){
        case "ELIMINAR";
            $oV->id = $_POST["opid"];
            $oV->delete();
           break; 
        case "MODIFICAR";
              $oV->id = $_POST["opid"];
              $oV->get();
              $inputApellido = $oV->apellido;
              $inputNombre = $oV->nombre;
              $inputCod = $oV->codigo;
              $id = $oV->id;
           break; 
            
    }

}



?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
   <meta charset="utf-8" />
   <!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame -->
   <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
   <!-- Mobile viewport optimized: h5bp.com/viewport -->
   <meta name="viewport" content="width=device-width">

   <title>Vendedores</title>

   <meta name="robots" content="noindex, nofollow">
   <meta name="description" content="BootMetro : Simple and complete web UI framework to create web apps with Windows 8 Metro user interface." />
   <meta name="keywords" content="bootmetro, modern ui, modern-ui, metro, metroui, metro-ui, metro ui, windows 8, metro style, bootstrap, framework, web framework, css, html" />
   <meta name="author" content="AozoraLabs by Marcello Palmitessa"/>
   <link rel="publisher" href="https://plus.google.com/117689250782136016574">

   <!-- remove or comment this line if you want to use the local fonts -->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700' rel='stylesheet' type='text/css'>

   <link rel="stylesheet" type="text/css" href="../assets/css/bootmetro.css">
   <link rel="stylesheet" type="text/css" href="../assets/css/bootmetro-responsive.css">
   <link rel="stylesheet" type="text/css" href="../assets/css/bootmetro-icons.css">
   <link rel="stylesheet" type="text/css" href="../assets/css/bootmetro-ui-light.css">
   <link rel="stylesheet" type="text/css" href="../assets/css/datepicker.css">

   <!--  these two css are to use only for documentation -->
   <link rel="stylesheet" type="text/css" href="../assets/css/demo.css">

   <!-- Le fav and touch icons -->
   <link rel="shortcut icon" href="../assets/ico/favicon.ico">
   <link rel="apple-touch-icon-precomposed" sizes="144x144" href="../assets/ico/apple-touch-icon-144-precomposed.png">
   <link rel="apple-touch-icon-precomposed" sizes="114x114" href="../assets/ico/apple-touch-icon-114-precomposed.png">
   <link rel="apple-touch-icon-precomposed" sizes="72x72" href="../assets/ico/apple-touch-icon-72-precomposed.png">
   <link rel="apple-touch-icon-precomposed" href="../assets/ico/apple-touch-icon-57-precomposed.png">
  
   <!-- All JavaScript at the bottom, except for Modernizr and Respond.
      Modernizr enables HTML5 elements & feature detects; Respond is a polyfill for min/max-width CSS3 Media Queries
      For optimal performance, use a custom Modernizr build: www.modernizr.com/download/ -->
   <script src="../assets/js/modernizr-2.6.2.min.js"></script>


</head>

<body>
   <!--[if lt IE 7]>
   <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
   <![endif]-->

   <!-- Header
   ================================================== -->
   <fieldset>
      <legend>Vendedores</legend>
      <label>Datos del vendedor</label>
   <form class="form-horizontal" name="form" method="post" >
      <div class="control-group">
         <label class="control-label" for="inputNombre">Nombre</label>
         <div class="controls">
            <input type="text" name="nombre" id="inputNombre" placeholder="Nombre" value="<?php echo $inputNombre;?>">
         </div>
      </div>
      <div class="control-group">
         <label class="control-label" for="inputApellido">Apellido</label>
         <div class="controls">
            <input type="text" name="apellido" id="inputApellido" placeholder="Apellido" value="<?php echo $inputApellido;?>">
         </div>
      </div>
      <div class="control-group">
         <label class="control-label" for="inputCod">Código</label>
         <div class="controls">
            <input type="text" name="codigo" id="inputCod" placeholder="Código vendedor"  value="<?php echo $inputCod;?>">
         </div>
      </div>
      <div class="control-group">
         <div class="controls">
           
            <button type="submit" class="btn">Guardar</button>
         </div>
      </div>
        <input type="hidden" id="id" name="id" value="<?php echo $id;?>">
   </form>
   </fieldset>
   <div class="container">
            <?php
                $aListVendedores=$oV->getVendedores();
                foreach($aListVendedores as $k=> $vend){
                
            ?>
       
 
            <div class="listview-item big bg-color-blue ">
               <div class="listview-item-body ">
                  <h4 class="listview-item-heading"><?php echo $vend["nombre"] . " ".$vend["apellido"]; ?></h4>
                  <h5 class="listview-item-subheading">Código <?php echo $vend["codigo"];?></h5>
                 
             </div><br/>
                <div class="text-right">
                    <button type="button" class="btn btn-danger" id='eli-<?php echo $vend["id"];?>'>Eliminar</button>
                    <button type="button" class="btn btn-warning" id='mod-<?php echo $vend["id"];?>'>Modificar</button>
              </div>
           </div>
       
       <?php
                }
            
       ?>
            
    </div>
   <!-- Grab Google CDN's jQuery. fall back to local if necessary -->
   <script src="//code.jquery.com/jquery-1.10.0.min.js"></script>
   <script>window.jQuery || document.write("<script src='assets/js/jquery-1.10.0.min.js'>\x3C/script>")</script>

   <!--[if IE 7]>
   <script type="text/javascript" src="scripts/bootmetro-icons-ie7.js">
   <![endif]-->

   <script type="text/javascript" src="../assets/js/min/bootstrap.min.js"></script>
<!--   <script type="text/javascript" src="../assets/js/bootmetro-panorama.js"></script>
   <script type="text/javascript" src="../assets/js/bootmetro-pivot.js"></script>
   <script type="text/javascript" src="../assets/js/bootmetro-charms.js"></script>
   <script type="text/javascript" src="../assets/js/bootstrap-datepicker.js"></script>

   <script type="text/javascript" src="../assets/js/jquery.mousewheel.min.js"></script>
   <script type="text/javascript" src="../assets/js/jquery.touchSwipe.min.js"></script>-->

<!--   <script type="text/javascript" src="../assets/js/holder.js"></script>-->
   <!--<script type="text/javascript" src="../assets/js/perfect-scrollbar.with-mousewheel.min.js"></script>-->
<!--   <script type="text/javascript" src="../assets/js/demo.js"></script>-->
<form method="post" action="vendedores.php" id="accion">
    <input type="hidden" name="op" id="op" value="">   
    <input type="hidden" name="opid" id="opid" value="">   
 </form>
   
<!--   modal-->

<div id="myModal2" class="modal message hide fade" aria-hidden="false" style="display: block;">
      <div class="modal-header">
         <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
         <h3>Eliminando un vendedor.</h3>
      </div>
      <div class="modal-body">
         <h4>Desea eliminar el vendedor ?</h4>
         <p></p>
      </div>
      <div class="modal-footer">
         <button class="btn" data-dismiss="modal">Cancelar</button>
         <button class="btn btn-primary">Eliminar</button>
      </div>
   </div>
   
</body>
</html>
<script type="text/javascript" >
    $(".btn-danger").click( function() {
         var id =$(this).attr("id").split("-")[1];
         $("#op").val("ELIMINAR");
         $("#opid").val(id);
       
         $('#myModal2').modal("show");
         $(".btn.btn-primary").click(function(){
                $("#accion").submit();
         });
      
    });
    $(".btn-warning").click( function() {
        var id =$(this).attr("id").split("-")[1];
        
         $("#op").val("MODIFICAR");
         $("#opid").val(id);
         $("#accion").submit();
       
    });
</script>