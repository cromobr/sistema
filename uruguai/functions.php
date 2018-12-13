<?php

function RetornaID($campoid, $campodescricao, $tabelamysql){
       
    $mysql_qry= mysql_query("SELECT ID FROM ".$tabelamysql." WHERE CODIGO ='". $campoid."'");
    $numrows=mysql_num_rows($mysql_qry);
  
    if($numrows<>0) {
        while ($dados = mysql_fetch_array($mysql_qry)){
            $mysql_id = $dados['ID'];
        }
        
    } else {
        $mysql_insert = "INSERT INTO ".$tabelamysql." (CODIGO,DESCRICAO) VALUES ('".$campoid."','".$campodescricao."')";
        mysql_query($mysql_insert);
                
        $mysql_ultimo_id =mysql_query( "SELECT LAST_INSERT_ID(ID) as ID FROM ".$tabelamysql);
        while ($dados = mysql_fetch_array($mysql_ultimo_id)){
           $mysql_id=$dados['ID'];
        }
      
    }        
        //echo $tabelamysql.$mysql_id;   
        //echo ".";
    return $mysql_id;
}

function RetornaIDUnidade($campodescricao, $tabelamysql){
       
    $mysql_qry= mysql_query("SELECT ID FROM ".$tabelamysql." WHERE DESCRICAO ='". $campodescricao."'");
    $numrows=mysql_num_rows($mysql_qry);
  
    if($numrows<>0) {
        while ($dados = mysql_fetch_array($mysql_qry)){
            $mysql_id = $dados['ID'];
        }
        
    } else {
        $mysql_insert = "INSERT INTO ".$tabelamysql." (DESCRICAO) VALUES ('".$campodescricao."')";
        mysql_query($mysql_insert);
                
        $mysql_ultimo_id =mysql_query( "SELECT LAST_INSERT_ID(ID) as ID FROM ".$tabelamysql);
        while ($dados = mysql_fetch_array($mysql_ultimo_id)){
           $mysql_id=$dados['ID'];
        }
      
    }        
        //echo $tabelamysql.$mysql_id;   
        //echo ".";
    return $mysql_id;
}


?>