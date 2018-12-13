<?php ob_start();
    require_once('menu.php');
    
$datapesquisa=  date("H:i:s");

$sqlPAISORIGEM = geraSQLTotalizarPais($_SESSION["descricao1"],$_SESSION["ncm"],$_SESSION["valorUnitarioIni"],$_SESSION["valorUnitarioFin"],$_SESSION["dataInicial"],$_SESSION["dataFinal"]);
             
$sqlPAISORIGEM = mysql_query($sqlPAISORIGEM);    
$_SESSION["totalpagina"] = 0;


require_once('dadospesquisa.php');
?>

<center>
<span><p style="font-family: Verdana; font-size: normal; font-weight: bold;">Totalização da Consulta Por País Origem</p></span>
<table>
<thead>
    <tr>
        <td> País Origem</td>
        <td> Qtde</td>
        <td> Valor Total</td>
    </tr>
</thead>
    <?php 
        $totalncm = 0;
        $totalqtd = 0; 
        $class="a";
        while($dados = mysql_fetch_array($sqlPAISORIGEM)){ 
            $totalncm = $totalncm + $dados['TOTAL_VALOR_PROD_TOTAL'] ;
            $totalqtd = $totalqtd+ $dados['TOTAL_QTD_COMER'];
        ?>
    <tr class="<?=$class?>">
        
        <td style="width: 250; text-align: center;"> <a href="consultaPais.php?pagina=1&pais=<?=$dados['CODIGO_PAIS_ORIGEM']?>" target="_blank"> <?=$dados['PAIS_ORIGEM']?> </a></td>
        <td style="width: 150; text-align: right;"> <?=number_format($dados['TOTAL_QTD_COMER'],0,"","")?></td>
        <td style="width: 200; text-align: right;"> <?=number_format($dados['TOTAL_VALOR_PROD_TOTAL'],2,",",".")?></td>        
    </tr>
    <?php
        if ($class == "a")
            $class ="b";
        else
            $class="a";  
    };?>    
    <thead>
    <tr>        
        <td align="center">Totais</td>
        <td style="width: 150; text-align: right;"> <?=number_format($totalqtd,0,"","")?></td>
        <td style="width: 200; text-align: right;"> <?=number_format($totalncm,2,",",".")?></td>       
    </tr>
    </thead>    
</table>
<br /><br />
<a href="grafico.php" target="_blank">Gerar Gráfico</a>
<br /><br />
<?php 
//echo $datapesquisa." - ".date("H:i:s")."<BR>";
require_once('footer.php');?>