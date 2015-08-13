<?php

require_once 'conn.php';
verifyDataForm();
?>
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
   <script src="assets/js/jquery-1.10.0.min.js"></script>
</head>

<body>
<div class="container">
   <form method="post" action="saveq.php" id="formEncuesta">
   <input type="hidden" name="id_vendedor" value="<?php if (isset($_GET["id_vendedor"]))echo $_GET["id_vendedor"];?>">
   <input type="hidden" name="id_cliente" value="<?php if (isset($_GET["id_cliente"]))echo $_GET["id_cliente"];?>">
   <input type="hidden" name="id_doc" value="<?php if (isset($_GET["id_doc"]))echo $_GET["id_doc"];?>">
   <input type="hidden" name="type" value="PREVENTA">

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
             <h4>Acerca del presupuesto <span class="requerido">*</span></h4>
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
                            <div class="radio ">
                                <label class="radio "><input type="radio" name="resp0002" value="5"><span class="metro-radio"></span></label>
                            </div>
                        </div>
                        <div class="contenedor-columna">
                            <div class="radio ">
                                <label class="radio "><input type="radio" name="resp0002" value="4"><span class="metro-radio"></span></label>
                            </div>
                        </div>
                        <div class="contenedor-columna">
                            <div class="radio ">
                                <label class="radio "><input type="radio" name="resp0002" value="3"><span class="metro-radio"></span></label>
                            </div>
                        </div>
                        <div class="contenedor-columna">
                            <div class="radio ">
                                <label class="radio "><input type="radio" name="resp0002" value="2"><span class="metro-radio"></span></label>
                            </div>
                        </div>
                        <div class="contenedor-columna">
                            <div class="radio ">
                                <label class="radio "><input type="radio" name="resp0002" value="1"><span class="metro-radio"></span></label>
                            </div>
                        </div>
                    </div>
                    <div class="contenedor-fila">
                        <div class="contenedor-columna" style="text-align:left">¿Tiempo en envío de respuesta?</div>
                        <div class="contenedor-columna">
                            <div class="radio ">
                                <label class="radio "><input type="radio" name="resp0003" value="5"><span class="metro-radio"></span></label>
                            </div>
                        </div>
                        <div class="contenedor-columna">
                            <div class="radio ">
                                <label class="radio "><input type="radio" name="resp0003" value="4"><span class="metro-radio"></span></label>
                            </div>
                        </div>
                        <div class="contenedor-columna">
                            <div class="radio ">
                                <label class="radio "><input type="radio" name="resp0003" value="3"><span class="metro-radio"></span></label>
                            </div>
                        </div>
                        <div class="contenedor-columna">
                            <div class="radio ">
                                <label class="radio "><input type="radio" name="resp0003" value="2"><span class="metro-radio"></span></label>
                            </div>
                        </div>
                        <div class="contenedor-columna">
                            <div class="radio ">
                                <label class="radio "><input type="radio" name="resp0003" value="1"><span class="metro-radio"></span></label>
                            </div>
                        </div>
                    </div>
                    <div class="contenedor-fila">
                        <div class="contenedor-columna" style="text-align:left">¿Cortesía en la atención?</div>
                        <div class="contenedor-columna">
                            <div class="radio ">
                                <label class="radio "><input type="radio" name="resp0004" value="5"><span class="metro-radio"></span></label>
                            </div>
                        </div>
                        <div class="contenedor-columna">
                            <div class="radio ">
                                <label class="radio "><input type="radio" name="resp0004" value="4"><span class="metro-radio"></span></label>
                            </div>
                        </div>
                        <div class="contenedor-columna">
                            <div class="radio ">
                                <label class="radio "><input type="radio" name="resp0004" value="3"><span class="metro-radio"></span></label>
                            </div>
                        </div>
                        <div class="contenedor-columna">
                            <div class="radio ">
                                <label class="radio "><input type="radio" name="resp0004" value="2"><span class="metro-radio"></span></label>
                            </div>
                        </div>
                        <div class="contenedor-columna">
                            <div class="radio ">
                                <label class="radio "><input type="radio" name="resp0004" value="1"><span class="metro-radio"></span></label>
                            </div>
                        </div>
                    </div>
                    <div class="contenedor-fila">
                        <div class="contenedor-columna" style="text-align:left">¿Qué imagen le proporcionan nuestros productos?</div>
                        <div class="contenedor-columna">
                            <div class="radio ">
                                <label class="radio "><input type="radio" name="resp0005" value="5"><span class="metro-radio"></span></label>
                            </div>
                        </div>
                        <div class="contenedor-columna">
                            <div class="radio ">
                                <label class="radio "><input type="radio" name="resp0005" value="4"><span class="metro-radio"></span></label>
                            </div>
                        </div>
                        <div class="contenedor-columna">
                            <div class="radio ">
                                <label class="radio "><input type="radio" name="resp0005" value="3"><span class="metro-radio"></span></label>
                            </div>
                        </div>
                        <div class="contenedor-columna">
                            <div class="radio ">
                                <label class="radio "><input type="radio" name="resp0005" value="2"><span class="metro-radio"></span></label>
                            </div>
                        </div>
                        <div class="contenedor-columna">
                            <div class="radio ">
                                <label class="radio "><input type="radio" name="resp0005" value="1"><span class="metro-radio"></span></label>
                            </div>
                        </div>
                    </div>
                    <div class="contenedor-fila">
                        <div class="contenedor-columna" style="text-align:left">¿Qué opina sobre la garantía ofrecida?</div>
                        <div class="contenedor-columna">
                            <div class="radio ">
                                <label class="radio "><input type="radio" name="resp0006" value="5"><span class="metro-radio"></span></label>
                            </div>
                        </div>
                        <div class="contenedor-columna">
                            <div class="radio ">
                                <label class="radio "><input type="radio" name="resp0006" value="4"><span class="metro-radio"></span></label>
                            </div>
                        </div>
                        <div class="contenedor-columna">
                            <div class="radio ">
                                <label class="radio "><input type="radio" name="resp0006" value="3"><span class="metro-radio"></span></label>
                            </div>
                        </div>
                        <div class="contenedor-columna">
                            <div class="radio ">
                                <label class="radio "><input type="radio" name="resp0006" value="2"><span class="metro-radio"></span></label>
                            </div>
                        </div>
                        <div class="contenedor-columna">
                            <div class="radio ">
                                <label class="radio "><input type="radio" name="resp0006" value="1"><span class="metro-radio"></span></label>
                            </div>
                        </div>
                    </div>
        </div> <!--end contenedor-tabla -->
        <div class="pregunta">
             <hr>
                <h4>¿Cómo llego a nosotros? <span class="requerido">*</span></h4>
                <hr>
        </div>
        <div class="contenedor-fila">
             	<div class="radio inline">
       				<select name="resp0001" id="resp0001">  <option value="0">-- SELECCIONAR --</option><option value="1">Me lo recomendó un amigo o conocido</option> <option value="2">Google</option> <option value="3">Otros Buscadores</option> <option value="4">Facebook</option> <option value="5">Twitter</option> <option value="6">Google+</option> <option value="7">Youtube</option> <option value="8">Otras redes sociales</option> <option value="9">Mercado Libre</option> <option value="10">Eventos y/o convenciones</option> <option value="11">TV</option> <option value="12">Publicidad Gráfica</option> <option value="13">Radio</option></select>
             </div>
        </div>
        <div class="pregunta">
             <hr>
                <h4>Por ultimo, ¿Quiere dejarnos algún comentario, reclamo o sugerencia?</h4>
                <hr>
        </div>
        <div class="contenedor-fila">
             	<div class="radio inline">
					<textarea name="resp0008"></textarea>
             </div>
        </div>
        <hr>
       <div class="boton">
                <input class=" btn-block1 " id="enviar" type="button" value="Enviar encuesta"><div class="obligatorio">* Campos Requeridos</div>
        </div>
         
    </div> 
    </form>
</div> <!--end container -->
<script type="text/javascript">
    $(document).ready(function(){
        $("#enviar").click(function(e){
            e.preventDefault();   
            enviar();
        });

        function enviar(){

            if(validar()){
                $("#formEncuesta").submit();
            }
        }

        function validar(){
                var bComplete=true;
                var resp0002=$("input:radio[name=resp0002]:checked").val();    
                var resp0003=$("input:radio[name=resp0003]:checked").val();    
                var resp0004=$("input:radio[name=resp0004]:checked").val();    
                var resp0005=$("input:radio[name=resp0005]:checked").val();    
                var resp0006=$("input:radio[name=resp0006]:checked").val();    
                var resp0001=$("#resp0001 :checked").val();

                if ( resp0001 == "0" || typeof resp0003 == "undefined" || typeof resp0004 == "undefined" || typeof resp0005 == "undefined" || typeof resp0006 == "undefined"  ){
                    bComplete=false;
                }
                if(!bComplete){
                    alert("Por favor, complete todas las preguntas marcadas con '*'. Gracias");
                }
                return bComplete;
        }
   });
</script>
    

</body>
</html>


 

 

