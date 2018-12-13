<?php ob_start();
    
    require_once('verifica.php');
    require_once('mysql.php');
    require_once('libcrm.php');
    
    if(isset($_GET['pais'])){
        $pais = $_GET['pais'];
    }
?>
<style type="text/css">
	<!--
		body {
			padding:0px;
			margin:0px;
            background-color: #c0cddc;
		} 
		#menu ul {
			padding:0px;
			margin:0px;
			float: left;
			width: 100%;
			background-color:#EDEDED;
			list-style:none;
			font:80% Tahoma;
		} 
		#menu ul li { display: inline; }
 		#menu ul li a {
			background-color:#EDEDED;
			color: #333;
			text-decoration: none;
			border-bottom:3px solid #EDEDED;
			padding: 2px 10px;
			float:left;
		}
		#menu ul li a:hover {
			background-color:#D6D6D6;
			color: #6D6D6D;
			border-bottom:3px solid #EA0000;
		}
        #top{
            height: 85px;
            width: 100%;
        }
        #left{
            width: 350px;
            float: left;
        }
        #right{
            float: right;
            font-family: Verdana;
            font-size: x-small;
            margin-right: 30px;
        }
	-->
</style>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html  xml:lang="pt" lang="pt">
 
<head>
	<title>infoAlert - Colombia</title>
    <link rel="stylesheet" type="text/css"href="css/consulta.css" />
</head>
 
<body>
    <div id="top">
        <div id="left"><img src="img/header.png"/></div>
        <div id="right">
            <br />
                Empresa: <?=$_SESSION["razaosocialusuario"]?> <br />
                Uruário: <?=$_SESSION["nomeusuario"]?><br />
                E-mail: <?=$_SESSION["emailusuario"]?><br />
                Data Inicial do Contrato: <?=$_SESSION["datacontratousuario"]?> <br />
                Status do Contrato: ATIVO<br />
        </div>
    </div>    
<div id="menu">
		<ul>
			<li><a href="../modulo.php">Módulos</a></li>
			<li><a href="consulta.php?pagina=0" target="_blank">Consulta</a></li>
            <li><a href="excel.php">Excel</a></li>            
            <li><a href="../sair.php">Sair</a></li>
		</ul>
</div>
<br /><br />