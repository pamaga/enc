<?php 
require '_login.php';
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

   <title>Encuestas atenas Ventilación</title>

   <meta name="robots" content="noindex, nofollow">
   <meta name="description" content="" />
   <meta name="keywords" content="" />
   <meta name="author" content="w3desarrollos"/>
   <link rel="publisher" href="https://plus.google.com/117689250782136016574">

   <!-- remove or comment this line if you want to use the local fonts -->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700' rel='stylesheet' type='text/css'>

   <link rel="stylesheet" type="text/css" href="../assets/css/bootmetro.css">
   <link rel="stylesheet" type="text/css" href="../assets/css/bootmetro-responsive.css">
   <link rel="stylesheet" type="text/css" href="../assets/css/bootmetro-icons.css">
   <link rel="stylesheet" type="text/css" href="../assets/css/bootmetro-ui-light.css">
   <link rel="stylesheet" type="text/css" href="../assets/css/datepicker.css">

   <!--  these two css are to use only for documentation -->
<!--   <link rel="stylesheet" type="text/css" href="../assets/css/demo.css">-->

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
  
   
   <div class="container">
        <div class="panorama-section">
              <h2>Estadísticas</h2>
                <div class="row">
                   <div class="metro span12">
                      <div class="metro-sections">
                        <div class="metro-section" id="section1">
                            <a class="tile wide imagetext bg-color-orange" href="./statsgrals-pre.php">
                               <div class="image-wrapper">
                              <span class="icon  icon-chart"></span>
                                </div>
                              <div class="column-text">
                                  <div class="text">Estadísticas</div>
                                  <h3>Preventa</h3>
                                 </div>
                             </a>
                        </div>
                          
                          <div class="metro-section" id="section1">
                            <a class="tile wide imagetext bg-color-blue" href="./statsgrals-post.php">
                               <div class="image-wrapper">
                              <span class="icon  icon-stats"></span>
                                </div>
                              <div class="column-text">
                                  <div class="text">Estadísticas</div>
                                  <h3>Postventa</h3>
                                 </div>
                             </a>
                        </div>

                      </div>
                   </div>
                </div>
         </div>  

        <div class="panorama-section">
              <h2>Configuraciones</h2>
                <div class="row">
                   <div class="metro span12">
                      <div class="metro-sections">
                        <div class="metro-section" id="section1">
                            <a class="tile wide imagetext bg-color-blueDark" href="./vendedores.php">
                               <div class="image-wrapper">
                              <span class="icon  icon-users"></span>
                                </div>
                              <div class="column-text">
                                  <div class="text">Configurar</div>
                                  <h3>Vendedores</h3>
                                 </div>
                             </a>
                        </div>
                          
                          <div class="metro-section" id="section1">
                            <a class="tile app imagetext bg-color-greenDark" href="../encuesta-preventa.php?id_cliente=0&id_vendedor=0&id_doc=0">
                               <div class="image-wrapper">
                              <span class="icon icon-list-7"></span>
                                </div>
                              <div class="column-text">
                                  <div class="app-label">Encuesta Preventa</div>
                               
                                
                                 </div>
                             </a>
                        </div>
                          <div class="metro-section" id="section1">
                            <a class="tile app imagetext bg-color-purple" href="../encuesta-postventa.php?id_cliente=0&id_vendedor=0&id_doc=0">
                               <div class="image-wrapper">
                              <span class="icon   icon-list-7"></span>
                                </div>
                              <div class="column-text">
                               
                                   <div class="app-label">Encuesta Postventa</div>
                                 </div>
                             </a>
                        </div>
                         

                      </div>
                   </div>
                    <div class="metro span12">
                         <div class="metro-section" id="section1">
                            <a class="tile app imagetext bg-color-grayLight" href="export.php">
                               <div class="image-wrapper">
                              <span class="icon   icon-list-7"></span>
                                </div>
                              <div class="column-text">
                               
                                   <div class="app-label">Exportar Encuestas</div>
                                 </div>
                             </a>
                        </div>
                        
                    </div>
                    <b>Ejemplo URL Preventa:</b> http://www.atenasventilacion.com.ar/encuesta/encuesta-preventa.php?id_cliente=1&id_vendedor=2&id_doc=3
                    <br/><b>Ejemplo URL Postventa:</b> http://www.atenasventilacion.com.ar/encuesta/encuesta-postventa.php?id_cliente=1&id_vendedor=2&id_doc=3
                </div>
         </div>  
       
    </div>
   <!-- Grab Google CDN's jQuery. fall back to local if necessary -->
   <script src="//code.jquery.com/jquery-1.10.0.min.js"></script>
   <script>window.jQuery || document.write("<script src='assets/js/jquery-1.10.0.min.js'>\x3C/script>")</script>

   <!--[if IE 7]>
   <script type="text/javascript" src="scripts/bootmetro-icons-ie7.js">
   <![endif]-->

   <script type="text/javascript" src="../assets/js/min/bootstrap.min.js"></script>
   <script type="text/javascript" src="../assets/js/bootmetro-panorama.js"></script>
   <script type="text/javascript" src="../assets/js/bootmetro-pivot.js"></script>
   <script type="text/javascript" src="../assets/js/bootmetro-charms.js"></script>
   <script type="text/javascript" src="../assets/js/bootstrap-datepicker.js"></script>

   <script type="text/javascript" src="../assets/js/jquery.mousewheel.min.js"></script>
   <script type="text/javascript" src="../assets/js/jquery.touchSwipe.min.js"></script>

<!--   <script type="text/javascript" src="../assets/js/holder.js"></script>-->
   <!--<script type="text/javascript" src="../assets/js/perfect-scrollbar.with-mousewheel.min.js"></script>-->
<!--   <script type="text/javascript" src="../assets/js/demo.js"></script>-->



</body>
</html>
