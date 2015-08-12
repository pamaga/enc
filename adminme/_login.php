<?php
session_start();
$username="admin";
$password="%AtenasIndex%";

if( isset($_POST['username']) && isset($_POST['password'])){
    if( $_POST['username'] == $username && $_POST['password'] == $password){
         $_SESSION["atenas-session-login"] = true;
         header( 'Location: index.php' );
    }else{
        unset( $_SESSION["atenas-session-login"]);
    }
   
}
if ( ! isset($_SESSION["atenas-session-login"])){
    if( ! strpos($_SERVER["SCRIPT_NAME"], "login.php") ){
        header( 'Location: login.php' );
    }
    
}

