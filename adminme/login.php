<?php
require '_login.php';

?>

<html>
    <head>
           <link rel="stylesheet" type="text/css" href="../assets/css/bootmetro.css">
            <link rel="stylesheet" type="text/css" href="../assets/css/bootmetro-responsive.css">
            <link rel="stylesheet" type="text/css" href="../assets/css/bootmetro-icons.css">
            <link rel="stylesheet" type="text/css" href="../assets/css/bootmetro-ui-light.css">
            <link rel="stylesheet" type="text/css" href="../assets/css/datepicker.css">
    </head>
    <body>
        <div style='text-align:center'>
        <h3>Atenas Administrador</h3>
        </div>
        <hr /><br />
        
        
         <form class="form-horizontal"  method='post' accept-charset='UTF-8'>
      <div class="control-group">
         <label class="control-label" for="inputEmail">Usuario</label>
         <div class="controls">
            <input type="text" name='username' id='username' placeholder="Email">
         </div>
      </div>
      <div class="control-group">
         <label class="control-label" for="inputPassword">Clave</label>
         <div class="controls">
            <input type="password" name='password' id='password' placeholder="Clave">
         </div>
      </div>
      <div class="control-group">
         <div class="controls">
<!--            <label class="checkbox">
               <input type="checkbox"><span class="metro-checkbox">Remember me</span>
            </label>-->
            <button type="submit" class="btn">Ingresar</button>
         </div>
      </div>
   </form>
    </body>
</html>
