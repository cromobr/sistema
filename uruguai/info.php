<?php ob_start();
    require_once('verifica.php');
    require_once('mysql.php');
    require_once('menu.php');
    
 ?>
<style>
    table{
        border-collapse: collapse;
    }
    table tr td {
        border:1px solid black;
        font-family: verdana;
        font-size: small;        
    }
    thead{
        background-color: #7c7c8b;
        font-family: Verdana;
        font-weight: bold;
        font-size: small;
        color: white;
    }
    tr:hover{
        background-color: #d0dafd;
    }
    tbody{
        background-color: #e5e5e5;
    }
</style>
<iframe src="http://www4.receita.fazenda.gov.br/simulador/PesquisarNCM.jsp" height="700" width="800" frameborder="0"></iframe>
<?php
   if ($_SESSION["idusuario"]==1){
        $sql = "SELECT l.*, u.NOME from log l
            inner join usuario u on u.id = l.IDUSUARIO where u.id <> 1 and u.id <> 2 order by  DATACONSULTA desc ";
   // } else {
    //    $sql = "SELECT * from log where IDUSUARIO=".$_SESSION["idusuario"]." order by  DATACONSULTA desc";
   // }
$sql = mysql_query($sql);
?>
<table>
<thead>
    <tr>
        <td> Data Consulta</td>
        <td> Descrição</td>
        <td> Ncm</td>
        <td> Data Inicial</td>
        <td> Data Final</td>
        <td> Usuário</td>        
    </tr>
</thead>

    <?php while($dados = mysql_fetch_array($sql)){ ?>
       <tr>
        <td style="width: 200; text-align: center;"> <?=$dados['DATACONSULTA']?></td>
        <td style="width: 200; text-align: center;"> <?=$dados['DESCRICAO']?></td>
        <td style="width: 150; text-align: center;"> <?=$dados['NCM']?></td>
        <td style="width: 150; text-align: center;"> <?=$dados['DATAINICIAL']?></td>
        <td style="width: 150; text-align: left;"> <?=$dados['DATAFINAL']?></td>
        <td style="width: 150; text-align: left;"> <?=$dados['NOME']?></td>
    </tr>
    <?php };?>
</table>

<?php } require_once('footer.php');
?>