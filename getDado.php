<?php ob_start();
require_once('verifica.php');
require_once('libcrm.php');

// Estrutura basica do grafico
$grafico = array(
    'dados' => array(
        'cols' => array(
            array('type' => 'string', 'label' => 'País Origem'),
            array('type' => 'number', 'label' => 'Valor')
        ),  
        'rows' => array()
    ),
    'config' => array(
        'title' => 'Valor total por origem',
        'width' => 800,
        'height' => 600,
        'is3D' => true,
        'backgroundColor' => '#c0cddc',
        'legend.textStyle'=>'font-size: xx-small;'
    )
);

// Consultar dados no BD
$pdo = new PDO('mysql:host=localhost;dbname=infoaler_importacao', 'infoaler_root', 'inf@102030');
$sql = geraSQLTotalizarPaisGrafico5($_SESSION["descricao1"],$_SESSION["ncm"],$_SESSION["valorUnitarioIni"],$_SESSION["valorUnitarioFin"],$_SESSION["dataInicial"],$_SESSION["dataFinal"]);
            
$stmt = $pdo->query($sql);
$valorTotal5 = 0;
while ($obj = $stmt->fetchObject()) {
    $valor = number_format($obj->TOTAL_VALOR_PROD_TOTAL,2,",","");
    $grafico['dados']['rows'][] = array('c' => array(
        array('v' => trim($obj->PAIS_ORIGEM)),
        array('v' => (float)$valor)
    ));
    $valorTotal5 = $valorTotal5 + $obj->TOTAL_VALOR_PROD_TOTAL;
}
$sql =geraSQLTotalizarPaisGrafico1($_SESSION["descricao1"],$_SESSION["ncm"],$_SESSION["valorUnitarioIni"],$_SESSION["valorUnitarioFin"],$_SESSION["dataInicial"],$_SESSION["dataFinal"]);
            
$stmt = $pdo->query($sql);

while ($obj = $stmt->fetchObject()) {
    
    $valor = number_format(($obj->TOTAL_VALOR_PROD_TOTAL-$valorTotal5),2,",","");
    
    //echo $obj->TOTAL_VALOR_PROD_TOTAL."<BR>";

    $grafico['dados']['rows'][] = array('c' => array(
        array('v' => "Outros"),
        array('v' => (float)$valor)
    ));
    
}

//print_r ($grafico);
// Enviar dados na forma de JSON
header('Content-Type: application/json; charset=UTF-8');
echo json_encode($grafico);
exit(0);