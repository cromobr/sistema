<?php

//require_once('mysql.php');

//echo geraSQLConsulta("","87","0","100","2014/01/01","2014/01/30","0","100","63");
//echo geraSQLTotalizar("","87","1","100","2014/01/01","2014/01/30");
//echo geraSQLTotalizarPais("","87","0","0","2014/01/01","2014/01/30");
//echo geraSQLTotalizarPaisGrafico1("","87","0","100","2014-01-01","2014-01-01");
//echo geraSQLTotalizarPaisGrafico5("","87","100","200","2014-01-01","2014-01-01");

function geraSQLConsulta($descricao,$modelo, $ncm, $valorIni, $valorFin, $dataInicial, $dataFinal, $tampag, $qtd, $pais){

                $sql = "select SQL_CALC_FOUND_ROWS * from (";
               
                $sql = $sql ."
                    SELECT
                        IMPORTADORESDOSETOR1,
                    	NCM,
                    	MARCA, 
                    	MODELO, 
                    	QUANTIDADE,                     	
                        FOBUNITARIO,
                        FOB,
                        DATAMOV as MES_ANO_DATA,
                       	UNIDADE,
                    	ORIGEM AS PAISORIGEM,
                    	FONTE AS PAISAQUISICAO 
                    FROM argentina 
                    WHERE 
                    DATAMOV BETWEEN '".$dataInicial."' AND '".$dataFinal."'";
                
                if ($descricao <> "")
                    $sql = $sql . " and MARCA LIKE '%".$descricao."%' ";
                    
                if ($modelo <> "")
                    $sql = $sql . " and MODELO LIKE '%".$modelo."%' ";
                
                
                if ($valorFin <> "0")
                    if ($valorFin <> "")
                        $sql = $sql . " and FOB BETWEEN '".$valorIni."' AND '".$valorFin."'";
                
                    
                if ($ncm <> "")
                    $sql = $sql . " and  NCM LIKE '".$ncm."%' ";        
            
            $sql = $sql . " ) as consulta order by NCM, MES_ANO_DATA "." LIMIT ".$tampag.",".$qtd;
        
        //echo $sql;
       return $sql;
}
function geraSQLConsultaAvancada($descricao, $ncm, $valorIni, $valorFin, $dataInicial, $dataFinal, $tampag, $qtd, $pais){
        
        if (strlen($ncm)<2){
            $cap = "select nome from capitulo";
            $cap = mysql_query($cap);
            
            $sql = "";
            
            while ($dados = mysql_fetch_array($cap)){
                
                if ($sql==""){
                    $sql = "select SQL_CALC_FOUND_ROWS * from (";
                } else  {
                    $sql = $sql." UNION ";
                }
                $sql = $sql ."
                    SELECT 
                    	NCM, 
                        MES_ANO_DATA,
                        DESCRICAO_NCM,
                    	UNIDADE_COMERCIALIZACAO AS UNIDADE,
                    	PAIS_ORIGEM AS PAISORIGEM,
                    	PAIS_AQUISICAO AS PAISAQUISICAO,
                    	MES_ANO AS MESANO,
                    	DESCRICAO_DETALHADA, 
                    	QUANTIDADE_PRODUTO_COMERCIALIZADA, 
                    	VALOR_FOB_DOLAR,
                        QUANTIDADE_VALOR_SEGURO_DOLAR,
                        QUANTIDADE_VALOR_FRETE_DOLAR, 
                    	VALOR_UNIDADE_PRODUTO_DOLAR, 
                    	VALOR_PRODUTO_DOLAR_TOTAL 
                    	
                    FROM ".$dados['nome']."
                    WHERE 
                    MES_ANO_DATA BETWEEN '".$dataInicial."' AND '".$dataFinal."'";
                
                if ($descricao <> "")
                    $sql = $sql . " and DESCRICAO_DETALHADA LIKE '%".$descricao."%' ";
                if ($pais <> "")
                    $sql = $sql . " and CODIGO_PAIS_ORIGEM = ".$pais." ";
                
                if ($valorFin <> "0")
                    if ($valorFin <> "")
                        $sql = $sql . " and VALOR_UNIDADE_PRODUTO_DOLAR BETWEEN '".$valorIni."' AND '".$valorFin."'";
                
                    
                if ($ncm <> "")
                    $sql = $sql . " and  NCM LIKE '".$ncm."%' ";        
            };
            $sql = $sql . " ) as consulta order by NCM, MES_ANO_DATA"." LIMIT ".$tampag.",".$qtd;
        } else {
            $sql = "select SQL_CALC_FOUND_ROWS * from (";
            $sql = $sql ."
                    SELECT 
                    	NCM, 
                        MES_ANO_DATA,
                        DESCRICAO_NCM,
                    	UNIDADE_COMERCIALIZACAO AS UNIDADE,
                    	PAIS_ORIGEM AS PAISORIGEM,
                    	PAIS_AQUISICAO AS PAISAQUISICAO,
                    	MES_ANO AS MESANO,
                    	DESCRICAO_DETALHADA, 
                    	QUANTIDADE_PRODUTO_COMERCIALIZADA, 
                    	VALOR_FOB_DOLAR, 
                        QUANTIDADE_VALOR_SEGURO_DOLAR,
                        QUANTIDADE_VALOR_FRETE_DOLAR,
                    	VALOR_UNIDADE_PRODUTO_DOLAR, 
                    	VALOR_PRODUTO_DOLAR_TOTAL 
                    	
                    FROM cap".substr($ncm,0,2)."
                    WHERE 
                    MES_ANO_DATA BETWEEN '".$dataInicial."' AND '".$dataFinal."'";
                
                if ($descricao <> "")
                    $sql = $sql . " and DESCRICAO_DETALHADA LIKE '%".$descricao."%' ";
                
                if ($pais <> "")
                    $sql = $sql . " and CODIGO_PAIS_ORIGEM = ".$pais." ";
                
                if ($valorFin <> "0")
                    if ($valorFin <> "")
                      $sql = $sql . " and VALOR_UNIDADE_PRODUTO_DOLAR BETWEEN '".$valorIni."' AND '".$valorFin."'";
                
                if (strlen($ncm)>2)
                    $sql = $sql . " and  NCM LIKE '".$ncm."%' ";        
            $sql = $sql . " ) as consulta order by NCM, MES_ANO_DATA"." LIMIT ".$tampag.",".$qtd;
        }
       return $sql;
}

function geraSQLTotalizar($descricao, $ncm, $valorIni, $valorFin, $dataInicial, $dataFinal){
        if (strlen($ncm)<2){
            $cap = "select nome from capitulo";
            $cap = mysql_query($cap);
            
            $sql = "";
            
            while ($dados = mysql_fetch_array($cap)){
                
                if ($sql==""){
                    $sql = "select NCM, TOTAL_QTD_COMER, TOTAL_VALOR_PROD_TOTAL,DESCRICAO_NCM from (";
                } else  {
                    $sql = $sql." UNION ";
                }
                $sql = $sql ."
                    SELECT 
                    	NCM, 	 
                    	sum(QUANTIDADE_PRODUTO_COMERCIALIZADA) as TOTAL_QTD_COMER, 
                    	sum(VALOR_PRODUTO_DOLAR_TOTAL) as TOTAL_VALOR_PROD_TOTAL,
                        DESCRICAO_NCM                    	
                    FROM ".$dados['nome']."
                    WHERE 
                    MES_ANO_DATA BETWEEN '".$dataInicial."' AND '".$dataFinal."'"; 
                    
                
                if ($descricao <> "")
                    $sql = $sql . " and DESCRICAO_DETALHADA LIKE '%".$descricao."%' ";
                
                if ($valorFin <> "0")
                    if ($valorFin <> "")
                        $sql = $sql . " and VALOR_UNIDADE_PRODUTO_DOLAR BETWEEN '".$valorIni."' AND '".$valorFin."'";
                    
                if ($ncm <> "")
                    $sql = $sql . " and  NCM LIKE '".$ncm."%' ";    
                
                $sql = $sql." group by NCM "; 
            };
            $sql = $sql . "  ) as total order by TOTAL_VALOR_PROD_TOTAL desc";
        } else {
            $sql = "select NCM, TOTAL_QTD_COMER, TOTAL_VALOR_PROD_TOTAL,DESCRICAO_NCM from (";
            $sql = $sql ."
                    SELECT 
                    	NCM, 	 
                    	sum(QUANTIDADE_PRODUTO_COMERCIALIZADA) as TOTAL_QTD_COMER, 
                    	sum(VALOR_PRODUTO_DOLAR_TOTAL) as TOTAL_VALOR_PROD_TOTAL,
                        DESCRICAO_NCM                   	
                    FROM cap".substr($ncm,0,2)."
                    WHERE 
                    MES_ANO_DATA BETWEEN '".$dataInicial."' AND '".$dataFinal."'";
                
                if ($descricao <> "")
                    $sql = $sql . " and DESCRICAO_DETALHADA LIKE '%".$descricao."%' ";
                
             if ($valorFin <> "0")
                if ($valorFin <> "")
                    $sql = $sql . " and VALOR_UNIDADE_PRODUTO_DOLAR BETWEEN '".$valorIni."' AND '".$valorFin."'";
                    
                if (strlen($ncm)>2)
                    $sql = $sql . " and  NCM LIKE '".$ncm."%' ";        
            $sql = $sql . " group by NCM ) as total order by TOTAL_VALOR_PROD_TOTAL desc";
            }
            return $sql;  
    
}

function geraSQLTotalizarPais($descricao, $ncm, $valorIni, $valorFin, $dataInicial, $dataFinal){
        if (strlen($ncm)<2){
            $cap = "select nome from capitulo";
            $cap = mysql_query($cap);
            
            $sql = "";
            
            while ($dados = mysql_fetch_array($cap)){
                
                if ($sql==""){
                    $sql = "select CODIGO_PAIS_ORIGEM, PAIS_ORIGEM, TOTAL_QTD_COMER, TOTAL_VALOR_PROD_TOTAL,DESCRICAO_NCM from (";
                } else  {
                    $sql = $sql." UNION ";
                }
                $sql = $sql ."
                    SELECT 
                        CODIGO_PAIS_ORIGEM,
                    	PAIS_ORIGEM, 	 
                    	sum(QUANTIDADE_PRODUTO_COMERCIALIZADA) as TOTAL_QTD_COMER, 
                    	sum(VALOR_PRODUTO_DOLAR_TOTAL) as TOTAL_VALOR_PROD_TOTAL,
                        DESCRICAO_NCM                    	
                    FROM ".$dados['nome']."
                    WHERE 
                    MES_ANO_DATA BETWEEN '".$dataInicial."' AND '".$dataFinal."'"; 
                    
                
                if ($descricao <> "")
                    $sql = $sql . " and DESCRICAO_DETALHADA LIKE '%".$descricao."%' ";
                
                if ($valorFin <> "0")
                    if ($valorFin <> "")
                        $sql = $sql . " and VALOR_UNIDADE_PRODUTO_DOLAR BETWEEN '".$valorIni."' AND '".$valorFin."'";
                    
                if ($ncm <> "")
                    $sql = $sql . " and  NCM LIKE '".$ncm."%' ";    
                
                $sql = $sql." group by PAIS_ORIGEM  "; 
            };
            $sql = $sql . "  ) as total order by TOTAL_VALOR_PROD_TOTAL desc";
        } else {
            $sql = "select CODIGO_PAIS_ORIGEM, PAIS_ORIGEM, TOTAL_QTD_COMER, TOTAL_VALOR_PROD_TOTAL,DESCRICAO_NCM from (";
            $sql = $sql ."
                    SELECT 
                        CODIGO_PAIS_ORIGEM,
                    	PAIS_ORIGEM, 	 
                    	sum(QUANTIDADE_PRODUTO_COMERCIALIZADA) as TOTAL_QTD_COMER, 
                    	sum(VALOR_PRODUTO_DOLAR_TOTAL) as TOTAL_VALOR_PROD_TOTAL,
                        DESCRICAO_NCM                   	
                    FROM cap".substr($ncm,0,2)."
                    WHERE 
                    MES_ANO_DATA BETWEEN '".$dataInicial."' AND '".$dataFinal."'";
                
                if ($descricao <> "")
                    $sql = $sql . " and DESCRICAO_DETALHADA LIKE '%".$descricao."%' ";
                
                if ($valorFin <> "0")
                    if ($valorFin <> "")
                        $sql = $sql . " and VALOR_UNIDADE_PRODUTO_DOLAR BETWEEN '".$valorIni."' AND '".$valorFin."'";
                    
                if (strlen($ncm)>2)
                    $sql = $sql . " and  NCM LIKE '".$ncm."%' ";        
            $sql = $sql . " group by PAIS_ORIGEM ) as total order by TOTAL_VALOR_PROD_TOTAL desc";
            }
            return $sql;  
    
}

function geraSQLTotalizarPaisGrafico5($descricao, $ncm, $valorIni, $valorFin, $dataInicial, $dataFinal){
        if (strlen($ncm)<2){
            $cap = "select nome from capitulo";
            $cap = mysql_query($cap);
            
            $sql = "";
            
            while ($dados = mysql_fetch_array($cap)){
                
                if ($sql==""){
                    $sql = "select PAIS_ORIGEM, TOTAL_VALOR_PROD_TOTAL from (";
                } else  {
                    $sql = $sql." UNION ";
                }
                $sql = $sql ."
                    SELECT 
                    	PAIS_ORIGEM, 	 
                    	sum(VALOR_PRODUTO_DOLAR_TOTAL) as TOTAL_VALOR_PROD_TOTAL                                           	
                    FROM ".$dados['nome']."
                    WHERE 
                    MES_ANO_DATA BETWEEN '".$dataInicial."' AND '".$dataFinal."'"; 
                    
                
                if ($descricao <> "")
                    $sql = $sql . " and DESCRICAO_DETALHADA LIKE '%".$descricao."%' ";
                
                if ($valorFin <> "0")
                    if ($valorFin <> "")
                        $sql = $sql . " and VALOR_UNIDADE_PRODUTO_DOLAR BETWEEN '".$valorIni."' AND '".$valorFin."'";
                    
                if ($ncm <> "")
                    $sql = $sql . " and  NCM LIKE '".$ncm."%' ";    
                
                $sql = $sql." group by PAIS_ORIGEM  "; 
            };
            $sql = $sql . "  ) as total order by TOTAL_VALOR_PROD_TOTAL desc limit 0,5";
        } else {
            $sql = "select PAIS_ORIGEM, TOTAL_VALOR_PROD_TOTAL from (";
            $sql = $sql ."
                    SELECT 
                    	PAIS_ORIGEM, 	 
                    	sum(VALOR_PRODUTO_DOLAR_TOTAL) as TOTAL_VALOR_PROD_TOTAL                                          	
                    FROM cap".substr($ncm,0,2)."
                    WHERE 
                    MES_ANO_DATA BETWEEN '".$dataInicial."' AND '".$dataFinal."'";
                
                if ($descricao <> "")
                    $sql = $sql . " and DESCRICAO_DETALHADA LIKE '%".$descricao."%' ";
                
                if ($valorFin <> "0")
                    if ($valorFin <> "")
                        $sql = $sql . " and VALOR_UNIDADE_PRODUTO_DOLAR BETWEEN '".$valorIni."' AND '".$valorFin."'";
                    
                if (strlen($ncm)>2)
                    $sql = $sql . " and  NCM LIKE '".$ncm."%' ";        
            $sql = $sql . " group by PAIS_ORIGEM ) as total order by TOTAL_VALOR_PROD_TOTAL desc limit 0,5";
            }
            return $sql;  
}

function geraSQLTotalizarPaisGrafico1($descricao, $ncm, $valorIni, $valorFin, $dataInicial, $dataFinal){
        if (strlen($ncm)<2){
            $cap = "select nome from capitulo";
            $cap = mysql_query($cap);
            
            $sql = "";
            
            while ($dados = mysql_fetch_array($cap)){
                
                if ($sql==""){
                    $sql = "select sum(TOTAL_VALOR_PROD_TOTAL) as TOTAL_VALOR_PROD_TOTAL from (";
                } else  {
                    $sql = $sql." UNION ";
                }
                $sql = $sql ."
                    SELECT         	 
                    	sum(VALOR_PRODUTO_DOLAR_TOTAL) as TOTAL_VALOR_PROD_TOTAL,
                        PAIS_ORIGEM                  	
                    FROM ".$dados['nome']."
                    WHERE 
                    MES_ANO_DATA BETWEEN '".$dataInicial."' AND '".$dataFinal."'"; 

                if ($descricao <> "")
                    $sql = $sql . " and DESCRICAO_DETALHADA LIKE '%".$descricao."%' ";
                
                if ($valorFin <> "0")
                    if ($valorFin <> "")
                        $sql = $sql . " and VALOR_UNIDADE_PRODUTO_DOLAR BETWEEN '".$valorIni."' AND '".$valorFin."'";
                    
                if ($ncm <> "")
                    $sql = $sql . " and  NCM LIKE '".$ncm."%' ";    
                
                $sql = $sql." group by PAIS_ORIGEM  "; 
            };
            $sql = $sql . "  ) as total ";
        } else {
            $sql = "select sum(TOTAL_VALOR_PROD_TOTAL) as TOTAL_VALOR_PROD_TOTAL from (";
            $sql = $sql ."
                    SELECT 
                        sum(VALOR_PRODUTO_DOLAR_TOTAL) as TOTAL_VALOR_PROD_TOTAL,
                        PAIS_ORIGEM                   	
                    FROM cap".substr($ncm,0,2)."
                    WHERE 
                    MES_ANO_DATA BETWEEN '".$dataInicial."' AND '".$dataFinal."'";
                
                if ($descricao <> "")
                    $sql = $sql . " and DESCRICAO_DETALHADA LIKE '%".$descricao."%' ";
                    
                if ($valorFin <> "0")
                    if ($valorFin <> "")
                        $sql = $sql . " and VALOR_UNIDADE_PRODUTO_DOLAR BETWEEN '".$valorIni."' AND '".$valorFin."'";
                    
                if (strlen($ncm)>2)
                    $sql = $sql . " and  NCM LIKE '".$ncm."%' ";        
            $sql = $sql . " group by PAIS_ORIGEM ) as total ";
            }
            return $sql;  
}

?>