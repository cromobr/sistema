<?php ob_start();
require_once('menu.php');
$datapesquisa=  date("H:i:s");
if(isset( $_POST['consultar'])){
    
    if ($_POST['pesquisa2']){
        $cap = "cap".substr($_POST['pesquisa2'],0,2);
        $dataInicial = $_POST['dataInicialAno']."-".$_POST['dataInicialMes']."-01";
        $dataFinal = $_POST['dataFinalAno']."-".$_POST['dataFinalMes']."-01";
        $sqlVerificaNcm = "Select id from ".$cap." where MES_ANO_DATA BETWEEN '".$dataInicial."' AND '".$dataFinal."' and ncm like '".$_POST['pesquisa2']."%' limit 1";
        //echo $sqlVerificaNcm."<BR>";
        $sqlVerificaNcm = mysql_query($sqlVerificaNcm);    
        while ($dados = mysql_fetch_array($sqlVerificaNcm)){
            $totalregistroNCM = $dados['id'];
        };
        //echo $totalregistroNCM;
        if($totalregistroNCM==''){
            echo "<script>alert('Não existem dados para esse NCM. Verifique se está correto na aba Informações.');</script>";
            unset( $_GET['pagina']);
        }
    };   
    
    $_SESSION["descricao1"] = $_POST['pesquisa'];
    $_SESSION["ncm"] = $_POST['pesquisa2'];
    $_SESSION["dataInicial"] = $_POST['dataInicialAno']."-".$_POST['dataInicialMes']."-01";
    $_SESSION["dataFinal"] = $_POST['dataFinalAno']."-".$_POST['dataFinalMes']."-01";
    $_SESSION["valorUnitarioIni"] = $_POST['valorUnitarioIni'];
    $_SESSION["valorUnitarioFin"] = $_POST['valorUnitarioFin'];
    $_SESSION["totalpagina"] = 0;
    
    $sqlLog = "insert into log (DATACONSULTA, NCM, DESCRICAO, DATAINICIAL, DATAFINAL, IDUSUARIO) VALUES (
                '".date("Y/m/d H:i:s")."',
                '".$_SESSION["ncm"]."',
                '".$_SESSION["descricao1"]."',
                '".$_SESSION["dataInicial"]."',
                '".$_SESSION["dataFinal"]."',
                ".$_SESSION["idusuario"]." 
                
                )";
    //echo $sqlLog;
    $qryLog = mysql_query($sqlLog);
}

//echo substr($_SESSION["dataInicial"],0,4). " - " . substr($_SESSION["dataInicial"],5,2)." // ";
//echo substr($_SESSION["dataFinal"],0,4). " - " . substr($_SESSION["dataFinal"],5,2)." // ";

$mesIni = substr($_SESSION["dataInicial"],5,2);
$anoIni = substr($_SESSION["dataInicial"],0,4);

$mesFin = substr($_SESSION["dataFinal"],5,2);
$anoFin = substr($_SESSION["dataFinal"],0,4);
?>

<form action="consulta.php?pagina=1" method="POST">
<table align=center>

    <tr>
        <td> Descricao / Marca / Modelo</td>
        <td><input type="text" name="pesquisa" value="<?=$_SESSION["descricao1"]?>" size="70"/></td>
    </tr>
    <tr>
        <td> NCM </td>
        <td><input type="text" name="pesquisa2" value="<?=$_SESSION["ncm"]?>" size="70"/></td>
    </tr>
    <tr>
        <td> Data Inicial </td>
        <td> Mês: 
            <select name="dataInicialMes">
                <option <?=($mesIni=="01"?"selected='selected'":"")?> value="01">01</option> 
                <option <?=($mesIni=="02"?"selected='selected'":"")?> value="02">02</option>
                <option <?=($mesIni=="03"?"selected='selected'":"")?> value="03">03</option>
                <option <?=($mesIni=="04"?"selected='selected'":"")?> value="04">04</option>
                <option <?=($mesIni=="05"?"selected='selected'":"")?> value="05">05</option>
                <option <?=($mesIni=="06"?"selected='selected'":"")?> value="06">06</option>
                <option <?=($mesIni=="07"?"selected='selected'":"")?> value="07">07</option>
                <option <?=($mesIni=="08"?"selected='selected'":"")?> value="08">08</option>
                <option <?=($mesIni=="09"?"selected='selected'":"")?> value="09">09</option>
                <option <?=($mesIni=="10"?"selected='selected'":"")?> value="10">10</option>
                <option <?=($mesIni=="11"?"selected='selected'":"")?> value="11">11</option>
                <option <?=($mesIni=="12"?"selected='selected'":"")?> value="12">12</option>       
            </select>
            Ano: 
            <select name="dataInicialAno">
                <option <?=($anoIni=="2015"?"selected='selected'":"")?> value="2015">2015</option>
                <option <?=($anoIni=="2014"?"selected='selected'":"")?> value="2014">2014</option> 
                <option <?=($anoIni=="2013"?"selected='selected'":"")?> value="2013">2013</option> 
                <option <?=($anoIni=="2012"?"selected='selected'":"")?> value="2012">2012</option>
                <option <?=($anoIni=="2011"?"selected='selected'":"")?> value="2011">2011</option>
                <option <?=($anoIni=="2010"?"selected='selected'":"")?> value="2010">2010</option>                      
            </select>
        </td>
    </tr>
    <tr>
        <td> Data Final </td>
        <td> Mês: 
            <select name="dataFinalMes">
                <option <?=($mesFin=="01"?"selected='selected'":"")?> value="01">01</option> 
                <option <?=($mesFin=="02"?"selected='selected'":"")?> value="02">02</option>
                <option <?=($mesFin=="03"?"selected='selected'":"")?> value="03">03</option>
                <option <?=($mesFin=="04"?"selected='selected'":"")?> value="04">04</option>
                <option <?=($mesFin=="05"?"selected='selected'":"")?> value="05">05</option>
                <option <?=($mesFin=="06"?"selected='selected'":"")?> value="06">06</option>
                <option <?=($mesFin=="07"?"selected='selected'":"")?> value="07">07</option>
                <option <?=($mesFin=="08"?"selected='selected'":"")?> value="08">08</option>
                <option <?=($mesFin=="09"?"selected='selected'":"")?> value="09">09</option>
                <option <?=($mesFin=="10"?"selected='selected'":"")?> value="10">10</option>
                <option <?=($mesFin=="11"?"selected='selected'":"")?> value="11">11</option>
                <option <?=($mesFin=="12"?"selected='selected'":"")?> value="12">12</option>       
            </select>
            Ano: 
            <select name="dataFinalAno">
                <option <?=($anoFin=="2015"?"selected='selected'":"")?> value="2015">2015</option>
                <option <?=($anoFin=="2014"?"selected='selected'":"")?> value="2014">2014</option> 
                <option <?=($anoFin=="2013"?"selected='selected'":"")?> value="2013">2013</option> 
                <option <?=($anoFin=="2012"?"selected='selected'":"")?> value="2012">2012</option>
                <option <?=($anoFin=="2011"?"selected='selected'":"")?> value="2011">2011</option>
                <option <?=($anoFin=="2010"?"selected='selected'":"")?> value="2010">2010</option>                      
            </select>
        </td>
    </tr>
    <tr>
        <td> Valor Unitário </td>
        <td>Inicial:<input type="text" name="valorUnitarioIni" value="<?=$_SESSION["valorUnitarioIni"]?>" size="15" style="text-align: right;"/>
        Final: <input type="text" name="valorUnitarioFin" value="<?=$_SESSION["valorUnitarioFin"]?>" size="15" style="text-align: right;"/></td>
    </tr>
    <tr>    
        <td colspan="2" align=center> <input  type="submit" name="consultar" value="Pesquisar" /></td>
    </tr>
</table>
</form>
<center>
<?

if(isset($_GET['pagina']) && ($_GET['pagina']>0 ||$_GET['pagina']=="n") ){

$qtd = 100;
$_SESSION["qtdPagina"] = $qtd;


if(isset($_GET['pagina'])){
        if ($_GET['pagina']=="n"){
            $pagina = (int)$_POST['edtPagina'];
        } else {
            $pagina = $_GET['pagina'];
        }
        if ($pagina==1){
            $tampag = 0;
        } else {
            //$tampag = $qtd*$pagina;
            $tampag = $qtd*$pagina -$qtd ;
        }
        $_SESSION["paginaAtual"] = $tampag;
}

//echo "Pagina:".$pagina."- Qtde Por Páginas:".($qtd) SQL_CALC_FOUND_ROWS;

$sql = geraSQLConsulta($_SESSION["descricao1"],$_SESSION["ncm"],$_SESSION["valorUnitarioIni"],$_SESSION["valorUnitarioFin"],$_SESSION["dataInicial"],$_SESSION["dataFinal"],$tampag,$qtd,"");

    echo $sql."<BR>";

$i=0;



$sql = mysql_query($sql)or die( mysql_error() );
//echo $sql."<BR>";

?>
<table>
<thead>
    <tr>
        <td> </td>
        <td> Data</td>
        <td> Origem</td>
        <td> Compra</td>
        <td> NCM</td>
        <td> Descrição NCM</td>
        <td> Qtde</td>
        <td> Unidade</td>
        <td> V. Unitário </td>
        <td> V. Total</td>
        <td> Produto Descricao Detalhada</td>
        
    </tr>
</thead>
    
    <?php
        $class="a";
     while($dados = mysql_fetch_array($sql)){ $i++ ?>
    <tr class="<?=$class?>">
        <td style="width: 20; text-align: center;"> <?=$i+($tampag)?></td>
        <td style="width: 80; text-align: center;"> <?=$dados['MESANO']?></td>
        <td style="width: 80; text-align: center;"> <?=$dados['PAISORIGEM']?></td>
        <td style="width: 80; text-align: center;"> <?=$dados['PAISAQUISICAO']?></td>
        <td style="width: 70; text-align: center;"> <?=$dados['NCM']?></td>
        <td style="width: 210; text-align: left;"> <?=$dados['DESCRICAO_NCM']?></td>
        <td style="width: 50; text-align: center;"> <?=number_format($dados['QUANTIDADE_PRODUTO_COMERCIALIZADA'],0,"","")?></td>
        <td style="width: 80; text-align: center;"> <?=$dados['UNIDADE']?></td>        
        <td style="width: 80; text-align: right;"> <?=number_format($dados['VALOR_UNIDADE_PRODUTO_DOLAR'],2,",",".")?></td>
        <td style="width: 80; text-align: right;"> <?=number_format($dados['VALOR_PRODUTO_DOLAR_TOTAL'],2,",",".")?></td>
        <td style="height: 60; "> <?=str_replace(",",", ",$dados['DESCRICAO_DETALHADA'])?></td>
        
    </tr>
    <?php
        if ($class == "a")
            $class ="b";
        else
            $class="a"; 
    
    };?>
</table>

<?php

if ($_SESSION["totalpagina"]==0){

        $sqlTotal = "SELECT FOUND_ROWS() as total;";
 
$sqlTotal = mysql_query($sqlTotal);
while ($dados = mysql_fetch_array($sqlTotal)){
    $totalregistro = $dados['total'];
    $totalregistro = $totalregistro / $qtd;
    $totalmod = ($totalregistro % $qtd);
    if ($totalmod > 0){
        $totalregistro = $totalregistro + 1 ;
    } else{
        $totalregistro = (int) $totalregistro;
    }
    $_SESSION["totalpagina"] = (int) $totalregistro;
}}

if ($_SESSION["totalpagina"]<>0){
?>
<center>
    <p>
    
    
    <form name="consulta" action="consulta.php?pagina=n" method="POST">
    <?php
    if($pagina >1){?>
        <a href="consulta.php?pagina=<?=$pagina-1?>"> página anterior</a> &nbsp;
    <?php };?>
        <input type="text" value="<?=$pagina?>" size="5" name="edtPagina" style="text-align: center;"/> de <?=$_SESSION["totalpagina"]?>
        <input type="submit" name="btnIr" value="IR" /> 
        <?php
        if($pagina < $_SESSION["totalpagina"]){?>
         &nbsp; <a href="consulta.php?pagina=<?=$pagina+1?>"> próxima página </a>
         <?php }};?>
    </form>
    
        </p>
</center>
<?php


}
//echo $datapesquisa." - ".date("H:i:s")."<BR>";
 require_once('footer.php');?>
