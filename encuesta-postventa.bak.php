<?php
require_once 'conn.php';
verifyDataForm();
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

   <title>Encuesta Postventa</title>

   <meta name="robots" content="noindex, nofollow">
   <meta name="description" content="" />
   <meta name="keywords" content="" />
   <meta name="author" content=""/>


   <!-- remove or comment this line if you want to use the local fonts -->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700' rel='stylesheet' type='text/css'>

   <link rel="stylesheet" type="text/css" href="./assets/css/bootmetro.css">
   <link rel="stylesheet" type="text/css" href="./assets/css/bootmetro-responsive.css">
   <link rel="stylesheet" type="text/css" href="./assets/css/bootmetro-icons.css">
   <link rel="stylesheet" type="text/css" href="./assets/css/bootmetro-ui-light.css">
   <link rel="stylesheet" type="text/css" href="./assets/css/datepicker.css">

   <!--  these two css are to use only for documentation -->
   <link rel="stylesheet" type="text/css" href="./assets/css/demo.css">

   <!-- Le fav and touch icons -->
   <link rel="shortcut icon" href="./assets/ico/favicon.ico">
   <link rel="apple-touch-icon-precomposed" sizes="144x144" href="./assets/ico/apple-touch-icon-144-precomposed.png">
   <link rel="apple-touch-icon-precomposed" sizes="114x114" href="./assets/ico/apple-touch-icon-114-precomposed.png">
   <link rel="apple-touch-icon-precomposed" sizes="72x72" href="./assets/ico/apple-touch-icon-72-precomposed.png">
   <link rel="apple-touch-icon-precomposed" href="./assets/ico/apple-touch-icon-57-precomposed.png">
  
   <!-- All JavaScript at the bottom, except for Modernizr and Respond.
      Modernizr enables HTML5 elements & feature detects; Respond is a polyfill for min/max-width CSS3 Media Queries
      For optimal performance, use a custom Modernizr build: www.modernizr.com/download/ -->
   <script src="./assets/js/modernizr-2.6.2.min.js"></script>


</head>

<body>
   <!--[if lt IE 7]>
   <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
   <![endif]-->

   <!-- Header
   ================================================== -->
  
   
   <div class="container">
 
       
       
           <form method="post" action="saveq.php">
               <input type="hidden" name="id_vendedor" value="<?php if (isset($_GET["id_vendedor"]))echo $_GET["id_vendedor"];?>">
               <input type="hidden" name="id_cliente" value="<?php if (isset($_GET["id_cliente"]))echo $_GET["id_cliente"];?>">
               <input type="hidden" name="id_doc" value="<?php if (isset($_GET["id_doc"]))echo $_GET["id_doc"];?>">
               <input type="hidden" name="type" value="POSTVENTA">
      <!-- Main jumbotron for a primary marketing message or call to action -->
      <div class="jumbotron">
        <h1>Encuesta Postventa</h1>
        <p>Gracias por responder nuestras encuestas</p>
      </div>
     
      <?php
       foreach (getRespConfig() as $k=>$options){
           echo "<br/><br/><p class='lead'>".$options["pregunta"]."</p>";
            if(isset($options["formType"]) && $options["formType"]=="select")echo "<select name='$k'>";
            
           
           foreach($options["resp"] as $value=>$text){
               $inline= (! isset($options["inline"])?"inline":"");
              if(isset($options["formType"]) && $options["formType"]=="select"){
                  echo " <option value='$value'>$text</option>";
                          
               }else{
               echo ' <div class="radio '.$inline.'">
       <label class="radio "><input type="radio" name="'.$k.'" value="'.$value.'"><span class="metro-radio">'.$text.'</span></label>
      </div>';
               }
              
            }
              if(isset($options["formType"]) && $options["formType"]=="select")echo "</select>";
           }
           
       
      ?>
   
      <p>
      <div class="well" style="max-width: 400px; margin: 0 auto 10px;">
           <input class="btn btn-large btn-block btn-primary" type="submit" value="Enviar encuesta">
         
      </div>
     
      </p>
      
      </form>
       
       
       
    </div>
   <!-- Grab Google CDN's jQuery. fall back to local if necessary -->
   <script src="//code.jquery.com/jquery-1.10.0.min.js"></script>
   <script>window.jQuery || document.write("<script src='assets/js/jquery-1.10.0.min.js'>\x3C/script>")</script>

   <!--[if IE 7]>
   <script type="text/javascript" src="scripts/bootmetro-icons-ie7.js">
   <![endif]-->

   <script type="text/javascript" src="./assets/js/min/bootstrap.min.js"></script>
   <script type="text/javascript" src="./assets/js/bootmetro-panorama.js"></script>
   <script type="text/javascript" src="./assets/js/bootmetro-pivot.js"></script>
   <script type="text/javascript" src="./assets/js/bootmetro-charms.js"></script>
   <script type="text/javascript" src="./assets/js/bootstrap-datepicker.js"></script>

   <script type="text/javascript" src="./assets/js/jquery.mousewheel.min.js"></script>
   <script type="text/javascript" src="./assets/js/jquery.touchSwipe.min.js"></script>

   <script type="text/javascript" src="./assets/js/holder.js"></script>
   <!--<script type="text/javascript" src="./assets/js/perfect-scrollbar.with-mousewheel.min.js"></script>-->
   <script type="text/javascript" src="./assets/js/demo.js"></script>



</body>
</html>
