<?php

//require_once('mysql.php');

//echo geraSQLConsulta("","87","0","100","2014/01/01","2014/01/30","0","100","63");
//echo geraSQLTotalizar("","87","1","100","2014/01/01","2014/01/30");
//echo geraSQLTotalizarPais("","87","0","0","2014/01/01","2014/01/30");
//echo geraSQLTotalizarPaisGrafico1("","87","0","100","2014-01-01","2014-01-01");
//echo geraSQLTotalizarPaisGrafico5("","87","100","200","2014-01-01","2014-01-01");

function geraSQLConsultaAvancada($descricao,$modelo, $ncm, $valorIni, $valorFin, $dataInicial, $dataFinal, $tampag, $qtd, $pais){
        
            $sql = "select SQL_CALC_FOUND_ROWS * from (";
               
                $sql = $sql ."
                    SELECT
                        IMPORTADORESDOSETOR1,
                    	NCM,
                        CONDICAOVENDA,
                        ALFANDEGA,
                    	MARCA, 
                    	QUANTIDADE, 
                        UNIDADE,                    	
                        FOBUNITARIO,
                        FOB,
                        FRETE,
                        SEGURO,
                        CIF,
                        DATAMOV as MES_ANO_DATA,
                    	ORIGEM AS PAISORIGEM,
                    	FONTE AS PAISAQUISICAO 
                    FROM uruguai 
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
?>