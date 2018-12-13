<?php ob_start();
    require_once('menu.php');

    $datapesquisa=  date("H:i:s");

    $sqlNCM = geraSQLTotalizar($_SESSION["descricao1"],$_SESSION["ncm"],$_SESSION["valorUnitarioIni"],$_SESSION["valorUnitarioFin"],$_SESSION["dataInicial"],$_SESSION["dataFinal"]);
  
    $sqlNCM = mysql_query($sqlNCM);
    
    require_once('dadospesquisa.php');
?>

<center>
<span><p style="font-family: Verdana; font-size: normal; font-weight: bold;">Totalização da Consulta Por NCM</p></span>
<table>
<thead>
    <tr>
        <td> NCM</td>
        <td> Descrição NCM</td>
        <td> Qtde</td>
        <td> V. Total</td>
    </tr>
</thead>
    <?php 
    $totalncm = 0;
    $totalqtd = 0;    
    $class="a";
    while($dados = mysql_fetch_array($sqlNCM)){
        $totalncm = $totalncm + $dados['TOTAL_VALOR_PROD_TOTAL'] ;
        $totalqtd = $totalqtd+ $dados['TOTAL_QTD_COMER'];
        
        ?>
    <tr class="<?=$class?>">
        
        <td style="width: 150; text-align: center;"> <?=$dados['NCM']?></td>
        <td style="width: 300; text-align: left;"> <?=$dados['DESCRICAO_NCM']?></td>
        <td style="width: 80; text-align: right;"> <?=number_format($dados['TOTAL_QTD_COMER'],0,"","")?></td>
        <td style="width: 80; text-align: right;"> <?=number_format($dados['TOTAL_VALOR_PROD_TOTAL'],2,",",".")?></td>        
    </tr>
    <?php 
    if ($class == "a")
            $class ="b";
        else
            $class="a"; 
    };?>
    
    <thead>
    <tr>
        
        <td colspan="2" align="center">Totais</td>
        <td style="width: 80; text-align: right;"> <?=number_format($totalqtd,0,"","")?></td>
        <td style="width: 100; text-align: right;"> <?=number_format($totalncm,2,",",".")?></td>   
    
    </tr>
    </thead>
    
</table>
<br /><br />
<?php
//echo $datapesquisa." - ".date("H:i:s")."<BR>";
require_once('footer.php');?>