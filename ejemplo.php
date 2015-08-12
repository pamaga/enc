<!doctype html>
<html>
<head>
<meta charset="utf-8">
   <title>TITULO</title>
   <meta name="robots" content="noindex, nofollow">
   <link href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700' rel='stylesheet' type='text/css'>
   <link rel="stylesheet" type="text/css" href="assets/css/bootmetro.css">
   <link rel="stylesheet" type="text/css" href="assets/css/bootmetro-responsive.css">
   <link rel="stylesheet" type="text/css" href="assets/css/bootmetro-icons.css">
   <link rel="stylesheet" type="text/css" href="assets/css/bootmetro-ui-light.css">
   <link rel="stylesheet" type="text/css" href="assets/css/datepicker.css">
   <link rel="stylesheet" type="text/css" href="assets/css/style.css">
</head>

<body>
<div class="container">
   <form method="post" action="saveq.php">
   <input type="hidden" name="id_vendedor" value="<?php if (isset($_GET["id_vendedor"]))echo $_GET["id_vendedor"];?>">
   <input type="hidden" name="id_cliente" value="<?php if (isset($_GET["id_cliente"]))echo $_GET["id_cliente"];?>">
   <input type="hidden" name="id_doc" value="<?php if (isset($_GET["id_doc"]))echo $_GET["id_doc"];?>">
   <input type="hidden" name="type" value="POSTVENTA">

    <div class="subcontainer">
		<div class="header_logo"> 
            <a href="http://www.atenasventilacion.com.ar/" title="Atenas Ventilación"> 
            <img class="logo img-responsive" src="assets/img/logo.jpg" alt="Atenas Ventilación"> 
            </a>
            <hr>
        </div>
        <div class="texto">
                <h2>Cuéntenos su experiencia</h2>
                <p>Agradeceríamos se tome unos minutos para respondernos las siguientes preguntas, considerando que sus respuestas son de mucha importancia para nosotros y darnos la posibilidad de mejorar día a día el servicio que le ofrecemos, desde ya muchas gracias y recordarle que siempre estamos a vuestra disposición.</p>
        </div>
        <div class="pregunta">
             <hr>
             <h4>Acerca de la Venta:</h4>
             <hr>
        </div>

        <div class="contenedor-tabla">
                    <div class="contenedor-fila">
                        <div class="contenedor-columna"></div>
                        <div class="contenedor-columna">Muy Malo</div>
                        <div class="contenedor-columna">Malo</div>
                        <div class="contenedor-columna">Regular</div>
                        <div class="contenedor-columna">Bueno</div>
                        <div class="contenedor-columna">Muy Bueno</div>
                    </div>
                    <div class="contenedor-fila">
                        <div class="contenedor-columna" style="text-align:left">¿Cómo fue atendido?</div>
                        <div class="contenedor-columna">
                            <div class="radio '.$inline.'">
                                <label class="radio "><input type="radio" name="'.$k.'" value="'.$value.'"><span class="metro-radio"></span></label>
                            </div>
                        </div>
                        <div class="contenedor-columna">
                            <div class="radio '.$inline.'">
                                <label class="radio "><input type="radio" name="'.$k.'" value="'.$value.'"><span class="metro-radio"></span></label>
                            </div>
                        </div>
                        <div class="contenedor-columna">
                            <div class="radio '.$inline.'">
                                <label class="radio "><input type="radio" name="'.$k.'" value="'.$value.'"><span class="metro-radio"></span></label>
                            </div>
                        </div>
                        <div class="contenedor-columna">
                            <div class="radio '.$inline.'">
                                <label class="radio "><input type="radio" name="'.$k.'" value="'.$value.'"><span class="metro-radio"></span></label>
                            </div>
                        </div>
                        <div class="contenedor-columna">
                            <div class="radio '.$inline.'">
                                <label class="radio "><input type="radio" name="'.$k.'" value="'.$value.'"><span class="metro-radio"></span></label>
                            </div>
                        </div>
                    </div>
                    <div class="contenedor-fila">
                        <div class="contenedor-columna" style="text-align:left">¿Tiempo en envío de respuesta?</div>
                        <div class="contenedor-columna">
                            <div class="radio '.$inline.'">
                                <label class="radio "><input type="radio" name="'.$k.'" value="'.$value.'"><span class="metro-radio"></span></label>
                            </div>
                        </div>
                        <div class="contenedor-columna">
                            <div class="radio '.$inline.'">
                                <label class="radio "><input type="radio" name="'.$k.'" value="'.$value.'"><span class="metro-radio"></span></label>
                            </div>
                        </div>
                        <div class="contenedor-columna">
                            <div class="radio '.$inline.'">
                                <label class="radio "><input type="radio" name="'.$k.'" value="'.$value.'"><span class="metro-radio"></span></label>
                            </div>
                        </div>
                        <div class="contenedor-columna">
                            <div class="radio '.$inline.'">
                                <label class="radio "><input type="radio" name="'.$k.'" value="'.$value.'"><span class="metro-radio"></span></label>
                            </div>
                        </div>
                        <div class="contenedor-columna">
                            <div class="radio '.$inline.'">
                                <label class="radio "><input type="radio" name="'.$k.'" value="'.$value.'"><span class="metro-radio"></span></label>
                            </div>
                        </div>
                    </div>
                    <div class="contenedor-fila">
                        <div class="contenedor-columna" style="text-align:left">¿Cortesía en la atención?</div>
                        <div class="contenedor-columna">
                            <div class="radio '.$inline.'">
                                <label class="radio "><input type="radio" name="'.$k.'" value="'.$value.'"><span class="metro-radio"></span></label>
                            </div>
                        </div>
                        <div class="contenedor-columna">
                            <div class="radio '.$inline.'">
                                <label class="radio "><input type="radio" name="'.$k.'" value="'.$value.'"><span class="metro-radio"></span></label>
                            </div>
                        </div>
                        <div class="contenedor-columna">
                            <div class="radio '.$inline.'">
                                <label class="radio "><input type="radio" name="'.$k.'" value="'.$value.'"><span class="metro-radio"></span></label>
                            </div>
                        </div>
                        <div class="contenedor-columna">
                            <div class="radio '.$inline.'">
                                <label class="radio "><input type="radio" name="'.$k.'" value="'.$value.'"><span class="metro-radio"></span></label>
                            </div>
                        </div>
                        <div class="contenedor-columna">
                            <div class="radio '.$inline.'">
                                <label class="radio "><input type="radio" name="'.$k.'" value="'.$value.'"><span class="metro-radio"></span></label>
                            </div>
                        </div>
                    </div>
                    <div class="contenedor-fila">
                        <div class="contenedor-columna" style="text-align:left">¿Qué imagen le proporcionan nuestros productos?</div>
                        <div class="contenedor-columna">
                            <div class="radio '.$inline.'">
                                <label class="radio "><input type="radio" name="'.$k.'" value="'.$value.'"><span class="metro-radio"></span></label>
                            </div>
                        </div>
                        <div class="contenedor-columna">
                            <div class="radio '.$inline.'">
                                <label class="radio "><input type="radio" name="'.$k.'" value="'.$value.'"><span class="metro-radio"></span></label>
                            </div>
                        </div>
                        <div class="contenedor-columna">
                            <div class="radio '.$inline.'">
                                <label class="radio "><input type="radio" name="'.$k.'" value="'.$value.'"><span class="metro-radio"></span></label>
                            </div>
                        </div>
                        <div class="contenedor-columna">
                            <div class="radio '.$inline.'">
                                <label class="radio "><input type="radio" name="'.$k.'" value="'.$value.'"><span class="metro-radio"></span></label>
                            </div>
                        </div>
                        <div class="contenedor-columna">
                            <div class="radio '.$inline.'">
                                <label class="radio "><input type="radio" name="'.$k.'" value="'.$value.'"><span class="metro-radio"></span></label>
                            </div>
                        </div>
                    </div>
                    <div class="contenedor-fila">
                        <div class="contenedor-columna" style="text-align:left">¿Qué opina sobre la garantía ofrecida?</div>
                        <div class="contenedor-columna">
                            <div class="radio '.$inline.'">
                                <label class="radio "><input type="radio" name="'.$k.'" value="'.$value.'"><span class="metro-radio"></span></label>
                            </div>
                        </div>
                        <div class="contenedor-columna">
                            <div class="radio '.$inline.'">
                                <label class="radio "><input type="radio" name="'.$k.'" value="'.$value.'"><span class="metro-radio"></span></label>
                            </div>
                        </div>
                        <div class="contenedor-columna">
                            <div class="radio '.$inline.'">
                                <label class="radio "><input type="radio" name="'.$k.'" value="'.$value.'"><span class="metro-radio"></span></label>
                            </div>
                        </div>
                        <div class="contenedor-columna">
                            <div class="radio '.$inline.'">
                                <label class="radio "><input type="radio" name="'.$k.'" value="'.$value.'"><span class="metro-radio"></span></label>
                            </div>
                        </div>
                        <div class="contenedor-columna">
                            <div class="radio '.$inline.'">
                                <label class="radio "><input type="radio" name="'.$k.'" value="'.$value.'"><span class="metro-radio"></span></label>
                            </div>
                        </div>
                    </div>
        </div> <!--end contenedor-tabla -->
        <div class="pregunta">
             <hr>
                <h4>¿Cómo llego a nosotros?</h4>
                <hr>
        </div>
        <div class="contenedor-fila">
             	<div class="radio inline">
       				<select name="resp0001"> <option value="1">Me lo recomendó un amigo o conocido</option> <option value="2">Google</option> <option value="3">Otros Buscadores</option> <option value="4">Facebook</option> <option value="5">Twitter</option> <option value="6">Google+</option> <option value="7">Youtube</option> <option value="8">Otras redes sociales</option> <option value="9">Eventos y/o convenciones</option> <option value="10">TV</option> <option value="11">Publicidad Gráfica</option> <option value="12">Radio</option></select>
             </div>
        </div>
        <div class="pregunta">
             <hr>
                <h4>Con el fin de comprender mejor sus respuestas, ¿Qué canal de comunicacion prefiere para contactarlo?</h4>
             <hr>
        </div>
        <div class="contenedor-fila">
             <div class="contenedor-columna">
             	<div class="radio inline">
       				<label class="radio "><input type="radio" name="resp0002" value="1"><span class="metro-radio">Teléfono</span></label>
      			</div>
             </div>
             <div class="contenedor-columna">
             	<div class="radio inline">
       				<label class="radio "><input type="radio" name="resp0002" value="1"><span class="metro-radio">Email</span></label>
     			</div>
             </div>
             <div class="contenedor-columna">
             	<div class="radio inline">
       				<label class="radio "><input type="radio" name="resp0002" value="1"><span class="metro-radio">No deseo ser contactado</span></label>
      			</div>
             </div>
        </div>
                <div class="pregunta">
             <hr>
                <h4>Por ultimo, ¿Quiere dejarnos algún comentario, reclamo o sugerencia?</h4>
                <hr>
        </div>
        <div class="contenedor-fila">
             	<div class="radio inline">
					<textarea></textarea>
             </div>
        </div>
        <hr>
       <div class="boton">
                <input class="btn btn-large btn-block btn-primary" type="submit" value="Enviar encuesta">
        </div>
    </div> <!--end subcontainer -->
    </form>
</div> <!--end container -->
</body>
</html>


 

 

