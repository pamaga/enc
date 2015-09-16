<?php
require '_login.php';
require_once '../conn.php';
 
$filters=array();
$filters["id_vendedor"]=( isset($_POST["filtro-vendedor"]))?$_POST["filtro-vendedor"]:"";
$filters["type"]="POSTVENTA";



$oE= new Encuesta();
if(isset($_POST["delete_encuesta"])){
       $oE->delete($_POST["delete_encuesta"]);
 }


$oV= new Vendedor();
$aVendedores = $oV->getVendedores();

$temp= $oE->getAll($filters);


$oE->processStats($filters);
$data = get_stats();
$data_1=get_stats("resp0001");
$data_7=get_stats("resp0007");


?>

<!DOCTYPE HTML>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>Estadísticas</title>

		<script type="text/javascript" src="external/js/jquery.min.js"></script>
		<script type="text/javascript" src="../assets/js/bootstrap.js"></script>
		<style type="text/css">
${demo.css}
		</style>
		<script type="text/javascript">
$(function () {
    $('#container').highcharts({
        chart: {
            type: 'column'
        },
        title: {
            text: 'Respuestas de calidad'
        },
        subtitle: {
            text: ''
        },
        xAxis: {
            categories: <?php echo json_encode($data["categories"])?>,
            crosshair: true
        },
        yAxis: {
            min: 0,
            title: {
                text: 'Cantidad de encuestas'
            }
        },
        tooltip: {
            headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
            pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                '<td style="padding:0"><b>{point.y:.1f} </b></td></tr>',
            footerFormat: '</table>',
            shared: true,
            useHTML: true
        },
        plotOptions: {
            column: {
                pointPadding: 0.2,
                borderWidth: 0
            },
            area: {pointInterval:1}        
        },
        series:  <?php echo json_encode($data["series"])?>
    });
});
$(function () {
    $('#container1').highcharts({
        chart: {
            type: 'pie',
            options3d: {
                enabled: true,
                alpha: 45,
                beta: 0
            }
        },
        title: {
            text: 'Cómo nos conoció?'
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                depth: 35,
                dataLabels: {
                    enabled: true,
                    format: '{point.name}'
                }
            }
        },
        series: [{
            type: 'pie',
            name: '',
            data: <?php echo json_encode($data_1["pares"])?>
        }]
    });
});
$(function () {
    $('#container7').highcharts({
        chart: {
            type: 'column'
        },
        title: {
            text: 'Que canal prefiere para contactarnos'
        },
        subtitle: {
            text: ''
        },
        xAxis: {
            categories: <?php echo json_encode($data_7["categories"])?>,
            crosshair: true
        },
        yAxis: {
            min: 0,
            title: {
                text: 'Cantidad de encuestas'
            }
        },
        tooltip: {
            headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
            pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                '<td style="padding:0"><b>{point.y:.1f} </b></td></tr>',
            footerFormat: '</table>',
            shared: true,
            useHTML: true
        },
        plotOptions: {
            column: {
                pointPadding: 0.2,
                borderWidth: 0
            },
            area: {pointInterval:1}        
        },
        series:  <?php echo json_encode($data_7["series"])?>
    });
});
    
   


		</script>
                   <link rel="stylesheet" type="text/css" href="../assets/css/bootmetro.css">
   <link rel="stylesheet" type="text/css" href="../assets/css/bootmetro-responsive.css">
   <link rel="stylesheet" type="text/css" href="../assets/css/bootmetro-icons.css">
   <link rel="stylesheet" type="text/css" href="../assets/css/bootmetro-ui-light.css">
                
	</head>
	<body>
<script src="external/js/highcharts.js"></script>
<script src="external/js/modules/exporting.js"></script>
<form method="post" >
    Vendedor:
    <select name="filtro-vendedor">
         <option value='0'>-- TODOS --</option>
        <?php
        foreach ($aVendedores AS $k=> $vendData){
            $checked="";
            if($filters["id_vendedor"]==$vendData["id"])$checked="selected";
            echo "<option $checked value='{$vendData["id"]}'>{$vendData["nombre"]} {$vendData["apellido"]}</option>";
      
            }
          ?>
    </select>


    <button class="btn btn-primary" type="submit">Aplicar filtros</button>
</form>

<table class="table table-condensed table-hover table-striped">
      <thead>
      <tr>
         <th>#</th>
         <th>Fecha</th>
         <th>Vendedor</th>
         <th>Cliente</th>
         <th>Remito</th>
         <th>Tipo Encuesta</th>
         <th></th>
      </tr>
      </thead>
      <tbody>
          <?php
         
          
          // print_r($temp);
          foreach($temp as $k=>$aEnc){
              echo "<tr class='encuesta' id='enc-{$aEnc["id"]}'>
                        <td>{$aEnc["id"]}</td>
                        <td>{$aEnc["fecha"]}</td>
                        <td>{$aEnc["vendedor"]["nombre"]} {$aEnc["vendedor"]["apellido"]}</td>
                        <td>{$aEnc["id_cliente"]}</td>
                        <td>{$aEnc["id_doc"]}</td>
                        <td>{$aEnc["type"]}</td>
                        <td><a class='delete-enc' href='#' >Eliminar</a></td>
                     </tr>";
          }
          ?>
     
      </tbody>
   </table>



<h1 class="text-center">Estadísticas Generales </h1>
<div id="container" style="min-width: 310px; height: 400px; max-width: 600px; margin: 0 auto"></div>
<div id="container1" style="min-width: 310px; height: 400px; max-width: 600px; margin: 0 auto"></div>
<div id="container7" style="min-width: 310px; height: 400px; max-width: 600px; margin: 0 auto"></div>


<div id="myModal" class="modal hide fade">
      <div class="modal-header">
         <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
         <h3 id="myModalLabel">Respuestas</h3>
      </div>
      <div class="modal-body"></div>
      <div class="modal-footer">
         <button class="btn" data-dismiss="modal">Cerrar</button>
      </div>
   </div>

    <div id="winDelete" class="modal message hide fade" aria-hidden="false" style="display: block;">
          <div class="modal-header">
             <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
             <h3>Eliminando una encuesta.</h3>
          </div>
          <div class="modal-body">
             <h4>Desea eliminar la encuesta ?</h4>
             <p></p>
          </div>
          <div class="modal-footer ">
              <div class="eliminando">
                <button class="btn" data-dismiss="modal">Cancelar</button>
                 <button class="btn btn-primary delete">Eliminar</button>
             </div>
          </div>
       </div>
        <script type="text/javascript">
             $(".delete-enc").click(function(event){
                  event.stopPropagation();  
                 // console.log("asdad");
                 // 
                 console.log();
                 var _id=$(this).closest("tr").attr('id');
                 var id =_id.split("-")[1];
                $('#winDelete').modal("show");
                $(".btn.btn-primary.delete").click(function(){
                        $(".eliminando").replaceWith( "...eliminando" );
                       var posting = $.post( "statsgrals-post.php", { "delete_encuesta": id } );
                         posting.done(function( data ) {
                            location.reload();
                        });
                });
                 //console.log(this.parent("tr"));
             });

             $(".encuesta").not(".delete-enc").click( function() {
                var id =$(this).attr("id").split("-")[1];
                 $( ".modal-body" ).empty().append( "...cargando" );
                 $('#myModal').modal('show');
                 
                var posting = $.post( "getEncuesta.php", { "id": id } );
                 posting.done(function( data ) {
                  $( ".modal-body" ).empty().append( data );
                });
            });
        </script>
    
	</body>
</html>
