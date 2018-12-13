<?php ob_start();
require_once('libcrm.php');
require_once('mysql.php');
/**
 * @author gencyolcu
 * @copyright 2013
 */


$imagem = $_GET['id'];
$path = 'upload/';

$qry = "Select TITULO, DESCRICAO from galeria where imagem='".$imagem."'";
$qry = mysql_query($qry);
while($dados = mysql_fetch_array($qry)){
    



?>
<html>
<head>
<style type="text/css">
a:link, a:visited, a:hover {
    text-decoration: none;
    font-family: verdana;
    font-size: smaller;
    color:#05376C ;
}
p{
    font-family: verdana;
    font-size: smaller;
    color:#05376C ;
}
</style>
</head>
<body>
<p><?=$dados['TITULO']?></p>
<center>
<a href="galeria.php"><img src="<?=imageResize($path,$imagem,'600','400','l')?>" /></a>
<p><?=$dados['DESCRICAO']?></p>
</center>
<a href="galeria.php">Fechar</a>
</body>

</html>
<?php }?>