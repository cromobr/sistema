<?php ob_start(); 
session_start();
$header = "/home/tsmcromo/public_html/teste/";
$header = "";
if (!$_SESSION["login"]){
    header("location:sair.php");
}
?>