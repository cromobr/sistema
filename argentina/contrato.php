<?php ob_start();
require_once('mysql.php');
require_once('verifica.php');
if(isset($_POST['btnAceito'])){
    $sqlLog = "insert into contrato (dataContrato,idUsuario) VALUES (
                '".date("Y/m/d H:i:s")."',
                ".$_SESSION["idusuario"]."                
                )";
    $qryLog = mysql_query($sqlLog);
    
    header('location:'.$header.'consulta.php?pagina=0'); 
    
}

if(isset($_POST['btnNaoAceito'])){
    header('location:'.$header.'index.php');
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
	-->
</style>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html  xml:lang="pt" lang="pt">
 
<head>
	<title>infoAlert</title>
</head>
 
<body>
    <div id="top"><img src="img/header.png"/></div>
<br /><br />

<style>
<!--
 /* Font Definitions */
 @font-face
	{font-family:Helvetica;
	panose-1:2 11 6 4 2 2 2 2 2 4;}
@font-face
	{font-family:"Cambria Math";
	panose-1:2 4 5 3 5 4 6 3 2 4;}
@font-face
	{font-family:Calibri;
	panose-1:2 15 5 2 2 2 4 3 2 4;}
@font-face
	{font-family:"Franklin Gothic Book";
	panose-1:2 11 5 3 2 1 2 2 2 4;}
 /* Style Definitions */
 p.MsoNormal, li.MsoNormal, div.MsoNormal
	{margin-top:0cm;
	margin-right:0cm;
	margin-bottom:10.0pt;
	margin-left:0cm;
	line-height:115%;
	font-size:11.0pt;
	font-family:"Calibri","sans-serif";}
p
	{margin-right:0cm;
	margin-left:0cm;
	font-size:12.0pt;
	font-family:"Times New Roman","serif";}
span.apple-converted-space
	{mso-style-name:apple-converted-space;}
p.Default, li.Default, div.Default
	{mso-style-name:Default;
	margin:0cm;
	margin-bottom:.0001pt;
	text-autospace:none;
	font-size:12.0pt;
	font-family:"Franklin Gothic Book","sans-serif";
	color:black;}
@page WordSection1
	{size:595.3pt 841.9pt;
	margin:70.85pt 3.0cm 70.85pt 3.0cm;}
div.WordSection1
	{page:WordSection1;}
-->
</style>
<center>
<table style="width: 700;" ><tr><td>

<div class=WordSection1>

<p class=Default align=center style='text-align:center'><span style='font-size:
9.0pt;font-family:"Calibri","sans-serif";color:windowtext'>Termos e Condi��es
Gerais de Uso</span></p>

<p class=Default align=center style='text-align:center'><span style='font-size:
9.0pt;font-family:"Calibri","sans-serif";color:windowtext'>Descri��o dos
Servi�os</span></p>

<p class=Default align=center style='text-align:center'><span style='font-size:
9.0pt;font-family:"Calibri","sans-serif";color:windowtext'>&nbsp;</span></p>

<p class=Default style='text-align:justify'><span style='font-size:9.0pt;
font-family:"Calibri","sans-serif";color:windowtext'>Disponibilizamos atrav�s
de um login e senha o acesso online ao Banco de Dados de informa��es de
importa��o - Brasil, com busca de dados e descri��o detalhadas. As atualiza��es
das informa��es s�o feitas mensalmente e disponibilizadas pelo� governo. � permitido
realizar buscas atrav�s de NCM ou descri��o ou marca quando dispon�vel. </span></p>


<p class=MsoNormal><span style='font-size:9.0pt;line-height:115%'>A ACEITA��O
DESTES TERMOS E CONDI��ES GERAIS � ABSOLUTAMENTE INDISPENS�VEL � UTILIZA��O DO
SITE INFOALERT E DOS SERVI�OS PRESTADOS PELA INFOALERT. O Usu�rio dever� ler,
certificar-se de haver entendido e aceitar todas as condi��es estabelecidas nos
Termos e Condi��es Gerais de Uso e nas Pol�ticas de Privacidade. </span></p>

<p class=MsoNormal><b><span style='font-size:9.0pt;line-height:115%;color:black'>Propriedade
intelectual </span></b><span style='font-size:9.0pt;line-height:115%;
color:black'>INFOALERT � de propriedade de Cromo Consultoria &amp;
Representa��es e o sistema est� legalmente protegida pelas normas de marcas e
propriedade e � um sistema de computador e o uso da express�o INFOALERT como
marca, nome empresarial ou nome de dom�nio, bem como os conte�dos das telas
relativas aos servi�os assim como os programas, bancos de dados, redes,
arquivos que permitem que o Usu�rio acesse e use sua Conta atrav�s de uma
licen�a de acesso estipulada pelo per�odo tempo contratado s�o propriedade de
Cromo Consultoria e Representa��es e est�o protegidos pelas leis de
propriedades,marcas,patentes, modelos e desenhos industriais. O uso indevido e
a reprodu��o total ou parcial dos referidos conte�dos s�o proibidos, salvo a
autoriza��o expressa pela Cromo Consultoria &amp; Representa��es. </span></p>

<p class=MsoNormal><b><span style='font-size:9.0pt;line-height:115%'>Licen�a do
Sistema </span></b><span style='font-size:9.0pt;line-height:115%'>INFOALERT� �
um programa/sistema criado e desenvolvido de propriedade e-marcas CONSULTORIA E
REPRESENTA��ES Ltda. colocado � disposi��o do Usu�rio atrav�s do sistema
InfoAlert que cont�m compila��o de base de dados e interfaces gr�ficas na �rea
de com�rcio exterior importa��o Brasil, mediante acesso remoto pelos Usu�rios. O
Usu�rio declara e reconhece que� o INFOALERT , atrav�s do sistema, � um site de
informa��es advindas de diversas fontes e n�o tem qualquer responsabilidade
pela garantia da veracidade e autenticidade da informa��o contida no sistema
InfoAlert, devendo as mesmas serem checadas pelo Usu�rio, independente dos
controles que INFOALERT realizada rotineiramente. INFOALERT n�o assume a
obriga��o de conservar qualquer tipo de informa��o que tenha sido
disponibilizada ao Usu�rio. O Usu�rio reconhece que a INFOALERT n�o se
responsabiliza pela exist�ncia, quantidade, qualidade, estado, integridade ou
legitimidade das informa��es fornecidas e utilizadas pelos Usu�rios. Cada
Usu�rio conhece e aceita ser o �nico respons�vel pela interpreta��o e uso das
informa��es do sistema, reconhecendo o Usu�rio que utiliza as informa��es por
sua conta e risco, reconhecendo INFOALERT - CROMO CONSULTORIA E REPRESENTA��ES
Ltda como mero fornecedor de servi�os de informa��es. Em nenhum caso INFOALERT
ser� respons�vel pelo lucro cessante ou por qualquer outro dano e/ou preju�zo
que o Usu�rio possa sofrer devido aos neg�cios ou n�o realizados com as
informa��es do sistema INFOALERT. INFOALERT n�o se responsabiliza por qualquer
dano, preju�zo ou perda sofridos pelo Usu�rio em raz�o de falhas na internet,
no sistema ou no servidor utilizados pelo Usu�rio, decorrentes de condutas de
terceiros, caso fortuito ou for�a maior. INFOALERT tamb�m n�o ser� respons�vel
por qualquer v�rus que possa atacar o equipamento do Usu�rio em decorr�ncia do
acesso, utiliza��o ou navega��o na internet ou como consequ�ncia da
transfer�ncia de dados, arquivos, imagens, textos ou �udio. </span></p>

<p class=MsoNormal><b><span style='font-size:9.0pt;line-height:115%'>Altera��es</span></b></p>

<p class=MsoNormal><span style='font-size:9.0pt;line-height:115%'>INFOALERT a
qualquer tempo, poder� alterar estes Termos e Condi��es, visando o
aperfei�oamento e melhoria dos servi�os prestados. </span></p>

<p class=Default style='text-align:justify'><span style='font-size:9.0pt;
font-family:"Calibri","sans-serif";color:windowtext'>&nbsp;</span></p>

<p class=Default style='text-align:justify'><span style='font-size:9.0pt;
font-family:"Calibri","sans-serif";color:windowtext'>&nbsp;</span></p>

</td></tr></table>
<br />
<form method="POST" action="contrato.php">
<input type="submit" name="btnAceito" value="Aceito"/>

<input type="submit" name="btnNaoAceito" value="N�o Aceito"/></form>
</center>
</div>
<?php
 require_once('footer.php');?>