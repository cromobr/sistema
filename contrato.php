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
9.0pt;font-family:"Calibri","sans-serif";color:windowtext'>Termos e Condições
Gerais de Uso</span></p>

<p class=Default align=center style='text-align:center'><span style='font-size:
9.0pt;font-family:"Calibri","sans-serif";color:windowtext'>Descrição dos
Serviços</span></p>

<p class=Default align=center style='text-align:center'><span style='font-size:
9.0pt;font-family:"Calibri","sans-serif";color:windowtext'>&nbsp;</span></p>

<p class=Default style='text-align:justify'><span style='font-size:9.0pt;
font-family:"Calibri","sans-serif";color:windowtext'>Disponibilizamos através
de um login e senha o acesso online ao Banco de Dados de informações de
importação - Brasil, com busca de dados e descrição detalhadas. As atualizações
das informações são feitas mensalmente e disponibilizadas pelo  governo. É permitido
realizar buscas através de NCM ou descrição ou marca quando disponível. </span></p>


<p class=MsoNormal><span style='font-size:9.0pt;line-height:115%'>A ACEITAÇÃO
DESTES TERMOS E CONDIÇÕES GERAIS É ABSOLUTAMENTE INDISPENSÁVEL À UTILIZAÇÃO DO
SITE INFOALERT E DOS SERVIÇOS PRESTADOS PELA INFOALERT. O Usuário deverá ler,
certificar-se de haver entendido e aceitar todas as condições estabelecidas nos
Termos e Condições Gerais de Uso e nas Políticas de Privacidade. </span></p>

<p class=MsoNormal><b><span style='font-size:9.0pt;line-height:115%;color:black'>Propriedade
intelectual </span></b><span style='font-size:9.0pt;line-height:115%;
color:black'>INFOALERT é de propriedade de Cromo Consultoria &amp;
Representações e o sistema está legalmente protegida pelas normas de marcas e
propriedade e é um sistema de computador e o uso da expressão INFOALERT como
marca, nome empresarial ou nome de domínio, bem como os conteúdos das telas
relativas aos serviços assim como os programas, bancos de dados, redes,
arquivos que permitem que o Usuário acesse e use sua Conta através de uma
licença de acesso estipulada pelo período tempo contratado são propriedade de
Cromo Consultoria e Representações e estão protegidos pelas leis de
propriedades,marcas,patentes, modelos e desenhos industriais. O uso indevido e
a reprodução total ou parcial dos referidos conteúdos são proibidos, salvo a
autorização expressa pela Cromo Consultoria &amp; Representações. </span></p>

<p class=MsoNormal><b><span style='font-size:9.0pt;line-height:115%'>Licença do
Sistema </span></b><span style='font-size:9.0pt;line-height:115%'>INFOALERT  é
um programa/sistema criado e desenvolvido de propriedade e-marcas CONSULTORIA E
REPRESENTAÇÕES Ltda. colocado à disposição do Usuário através do sistema
InfoAlert que contém compilação de base de dados e interfaces gráficas na área
de comércio exterior importação Brasil, mediante acesso remoto pelos Usuários. O
Usuário declara e reconhece que  o INFOALERT , através do sistema, é um site de
informações advindas de diversas fontes e não tem qualquer responsabilidade
pela garantia da veracidade e autenticidade da informação contida no sistema
InfoAlert, devendo as mesmas serem checadas pelo Usuário, independente dos
controles que INFOALERT realizada rotineiramente. INFOALERT não assume a
obrigação de conservar qualquer tipo de informação que tenha sido
disponibilizada ao Usuário. O Usuário reconhece que a INFOALERT não se
responsabiliza pela existência, quantidade, qualidade, estado, integridade ou
legitimidade das informações fornecidas e utilizadas pelos Usuários. Cada
Usuário conhece e aceita ser o único responsável pela interpretação e uso das
informações do sistema, reconhecendo o Usuário que utiliza as informações por
sua conta e risco, reconhecendo INFOALERT - CROMO CONSULTORIA E REPRESENTAÇÕES
Ltda como mero fornecedor de serviços de informações. Em nenhum caso INFOALERT
será responsável pelo lucro cessante ou por qualquer outro dano e/ou prejuízo
que o Usuário possa sofrer devido aos negócios ou não realizados com as
informações do sistema INFOALERT. INFOALERT não se responsabiliza por qualquer
dano, prejuízo ou perda sofridos pelo Usuário em razão de falhas na internet,
no sistema ou no servidor utilizados pelo Usuário, decorrentes de condutas de
terceiros, caso fortuito ou força maior. INFOALERT também não será responsável
por qualquer vírus que possa atacar o equipamento do Usuário em decorrência do
acesso, utilização ou navegação na internet ou como consequência da
transferência de dados, arquivos, imagens, textos ou áudio. </span></p>

<p class=MsoNormal><b><span style='font-size:9.0pt;line-height:115%'>Alterações</span></b></p>

<p class=MsoNormal><span style='font-size:9.0pt;line-height:115%'>INFOALERT a
qualquer tempo, poderá alterar estes Termos e Condições, visando o
aperfeiçoamento e melhoria dos serviços prestados. </span></p>

<p class=Default style='text-align:justify'><span style='font-size:9.0pt;
font-family:"Calibri","sans-serif";color:windowtext'>&nbsp;</span></p>

<p class=Default style='text-align:justify'><span style='font-size:9.0pt;
font-family:"Calibri","sans-serif";color:windowtext'>&nbsp;</span></p>

</td></tr></table>
<br />
<form method="POST" action="contrato.php">
<input type="submit" name="btnAceito" value="Aceito"/>

<input type="submit" name="btnNaoAceito" value="Não Aceito"/></form>
</center>
</div>
<?php
 require_once('footer.php');?>