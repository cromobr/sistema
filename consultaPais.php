<?php ob_start();
    require_once('menu.php');
$datapesquisa=  date("H:i:s");
if(isset( $_POST['consultar'])){
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

if(isset($_GET['pais'])){
    $pais = $_GET['pais'];
    }

//echo "Pagina:".$pagina."- Qtde Por Páginas:".($qtd) SQL_CALC_FOUND_ROWS;

$sql = geraSQLConsulta($_SESSION["descricao1"],$_SESSION["ncm"],$_SESSION["valorUnitarioIni"],$_SESSION["valorUnitarioFin"],$_SESSION["dataInicial"],$_SESSION["dataFinal"],$tampag,$qtd,$pais);

   // echo $sql."<BR>";

$i=0;

$sql = mysql_query($sql)or die( mysql_error() );
//echo $sql."<BR>";
require_once('dadospesquisa.php');
?>
<br />
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
        <td style="width: 80; text-align: center;"> <?=$dados['NCM']?></td>
        <td style="width: 150; text-align: left;"> <?=$dados['DESCRICAO_NCM']?></td>
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
    
    
    <form name="consulta" action="consultaPais.php?pagina=n" method="POST">
    <?php
    if($pagina >1){?>
        <a href="consultaPais.php?pagina=<?=$pagina-1?>&pais=<?=$pais?>"> << </a>
    <?php };?>
        <input type="text" value="<?=$pagina?>" size="5" name="edtPagina" style="text-align: center;"/> de <?=$_SESSION["totalpagina"]?>
        <input type="submit" name="btnIr" value="IR" /> 
        <?php
        if($pagina < $_SESSION["totalpagina"]){?>
         <a href="consultaPais.php?pagina=<?=$pagina+1?>&pais=<?=$pais?>"> >> </a>
         <?php }};?>
    </form>
    
        </p>
</center>
<?php


}
//echo $datapesquisa." - ".date("H:i:s")."<BR>";
 require_once('footer.php');?>
