<?php

$dataIniFormatada = "01-".substr($_SESSION['dataInicial'],5,2)."-".substr($_SESSION['dataInicial'],0,4);
$dataFinFormatada = "01-".substr($_SESSION['dataFinal'],5,2)."-".substr($_SESSION['dataFinal'],0,4);
?>
<table align=center cellpadding=3>
    <tr>    
        <td colspan="2" align=center style="font-weight: bold;"> Dados da Consulta</td>
    </tr>
    <tr>
        <td style="width: 200px;"> Descricao / Marca / Modelo</td>
        <td style="width: 200px;"><?=$_SESSION['descricao1'];?></td>
    </tr>
    <tr>
        <td> NCM </td>
        <td> <?=$_SESSION['ncm'];?> </td>
    </tr>
    <tr>
        <td> Data Inicial </td>
        <td>
            <?=$dataIniFormatada;?>
        </td>
    </tr>
    <tr>
        <td> Data Final </td>
        <td> 
            <?=$dataFinFormatada?>
        </td>
    </tr>
    <tr>
        <td> Valor Unitário </td>
        <td>Inicial: <?=$_SESSION['valorUnitarioIni'];?>
        Final: <?=$_SESSION['valorUnitarioFin'];?></td>
    </tr>
</table>