<?php
$mysql = mysql_connect("192.254.200.184", "infoaler_root", "inf@102030") or print (mysql_error());
mysql_select_db("infoaler_importacao");

//$mysql = mysql_connect("127.0.0.1", "root", "") or print (mysql_error());
//mysql_select_db("importacao2");

mysql_query( "SET @@global.max_allowed_packet = 32M");
mysql_query( "SET @@global.wait_timeout = 86400");
mysql_query( "SET @@global.innodb_buffer_pool_size=1G");

mysql_query( "SET @@global.key_buffer_size=536870912");
mysql_query( "SET @@global.read_buffer_size=2097152");
mysql_query( "SET @@global.max_used_connections=39");
mysql_query( "SET @@global.max_threads=1000");
mysql_query( "SET @@global.threads_connected=28");

set_time_limit(0);   

date_default_timezone_set('America/Sao_Paulo');

//echo "Conexao MYSQL - OK <br />";
/*
$qry = mysql_query("SELECT count(id) as count from movimentacao");
while ($dados = mysql_fetch_array($qry)){
    echo "nro de registros -> ".$dados['count'];
};

$qry = mysql_query("
	
	SELECT 
	(sum( data_length + index_length ) / 1024 / 1024 /1024) as 'tam'
	FROM information_schema.TABLES

	
	");

while ($dados = mysql_fetch_array($qry)){
    echo " ---- Tamanho -> ".$dados['tam']." GB";
};*/
?>
