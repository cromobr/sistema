<?php ob_start();
    require_once('verifica.php');
    require_once('mysql.php');
    require_once('menu.php');
    require_once('libcrm.php');
    
    if(isset($_GET['pais'])){
    $pais = $_GET['pais'];
    };
    
    $dataIniFormatada = "01-".substr($_SESSION['dataInicial'],5,2)."-".substr($_SESSION['dataInicial'],0,4);
    $dataFinFormatada = "01-".substr($_SESSION['dataFinal'],5,2)."-".substr($_SESSION['dataFinal'],0,4);

    //echo $pais;
    $sql = geraSQLConsulta($_SESSION["descricao1"],$_SESSION["ncm"],$_SESSION["valorUnitarioIni"],$_SESSION["valorUnitarioFin"],$_SESSION["dataInicial"],$_SESSION["dataFinal"],$_SESSION["paginaAtual"],$_SESSION["qtdPagina"],$pais);
    //echo $sql;
    $arq = "";
    
    $arq = "
    <table border='0'>
        <tr >
            <td style='background-color: darkblue; color: white;' colspan='6'> </td>            
        </tr>
        <tr >
            <td style='background-color: darkblue; color: white;' colspan='6'> 
                BRASIL IMPORTAÇÃO DETALHADA / DESCRIÇÃO DE MARCAS
            </td>            
        </tr>
        <tr >
            <td colspan='6'> Empresa: ".$_SESSION["razaosocialusuario"]."</td>
        </tr>
        <tr >
            <td colspan='6'> Usuário: ".$_SESSION["nomeusuario"]."</td>
        </tr>
     </table>
     <BR />        
     ";
     
    $arq = $arq.
    "
        <table align=center cellpadding=3>
            <tr>    
                <td colspan='6' style='background-color: darkblue; color: white;'> Dados da Consulta</td>
            </tr>
            <tr>
                <td colspan='3'> Descricao / Marca / Modelo</td>
                <td colspan='3' style='text-align: left;'>".$_SESSION['descricao1']."</td>
            </tr>
            <tr>
                <td colspan='3'> NCM </td>
                <td colspan='3' style='text-align: left;'> ".$_SESSION['ncm']." </td>
            </tr>
            <tr>
                <td colspan='3'> Data Inicial </td>
                <td colspan='3' style='text-align: left;'>
                    ".$dataIniFormatada."
                </td>
            </tr>
            <tr>
                <td colspan='3'> Data Final </td>
                <td colspan='3' style='text-align: left;'> 
                    ".$dataFinFormatada."
                </td>
            </tr>
            <tr>
                <td colspan='3'> Valor Unitário </td>
                <td colspan='3' style='text-align: left;'>Inicial: ".$_SESSION['valorUnitarioIni']."
                Final: ".$_SESSION['valorUnitarioFin']."</td>
            </tr>
        </table>
        <br />";    
    
    $arq =$arq. "
    <table border='1'>
        <tr style='background-color: darkblue; color: white;'>
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
    ";
    $sql = mysql_query($sql);
    while($dados = mysql_fetch_array($sql)){
    $arq = $arq."    
        <tr>     
        <td style='width: 80; text-align: center;'> ".$dados['MESANO']."</td>
        <td style='width: 80; text-align: center;'> ".$dados['PAISORIGEM']."</td>
        <td style='width: 80; text-align: center;'> ".$dados['PAISAQUISICAO']."</td>
        <td style='width: 80; text-align: center;'> ".$dados['NCM']."</td>
        <td style='width: 150; text-align: left;'> ".$dados['DESCRICAO_NCM']."</td>
        <td style='width: 50; text-align: right;'> ".number_format($dados['QUANTIDADE_PRODUTO_COMERCIALIZADA'],0,"","")."</td>
        <td style='width: 80; text-align: center;'> ".$dados['UNIDADE']."</td>        
        <td style='width: 80; text-align: right;'> ".number_format($dados['VALOR_UNIDADE_PRODUTO_DOLAR'],2,",",".")."</td>
        <td style='width: 80; text-align: right;'>".number_format($dados['VALOR_PRODUTO_DOLAR_TOTAL'],2,",",".")."</td>
        <td style='height: 80; width: 500'> ".str_replace(",",", ",$dados['DESCRICAO_DETALHADA'])."</td>
        </tr>";  
    
    }
    
    $arq = $arq. "<tr> <td  colspan='10' style='text-align: center';> Obs.: Dados preliminares sujeitos a modificaçoes </td></tr>";
    $arq = $arq. "<tr> <td  colspan='10' style='text-align: center';>Fonte: Informação Oficial </td></tr>";
    $arq = $arq. "<tr> <td  colspan='10' style='text-align: center';>* Corresponde ao Total da Declaração </td></tr>";   
    $arq = $arq. "<tr> <td  colspan='10' style='text-align: center';>www.infoalert.com.br </td></tr>";
    $arq = $arq. "<tr> <td  colspan='10' style='text-align: center';>Email: comercial@infoalert.com.br </td></tr>";
    
    $arq = $arq."</table>";
    $nomeFp = "upload/exportacao.xls";
    
    $fp = fopen("upload/exportacao.xls", "w");
       
    $escreve = fwrite($fp,$arq);
    fclose($fp);
    
     if (file_exists($nomeFp)) {
        header('Content-Description: File Transfer');
        header('Content-Type: text/plain');
        header('Content-Disposition: attachment; filename=' . basename($nomeFp));
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($nomeFp));
        ob_clean();
        flush();
        readfile($nomeFp);
        exit;
    }else {
        echo "Arquivo não existe: ".$nomeFp;
    }
?>
<td style="text-align: center;" ></td>