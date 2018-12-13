<?php ob_start();
require_once('menu.php');


?>
<style>
    .tablebandeiras{
        border-collapse: collapse;
        border:0px solid black;
        font-family: verdana;
        font-size: xx-small; 
        border-spacing: 10px;
    }
    tr {
        border:0px solid black;
        font-family: verdana;
        font-size: xx-small;        
    }
    .tdbandeiras {
        border:0px solid black;
        font-family: verdana;
        font-size: xx-small;  
         padding: 10px;      
    }
    thead{
        background-color: #c0cddc;
        font-family: Verdana;
        font-weight: bold;
        font-size: small;
        color: white;
        text-align: center;
    }
    tr:hover{
        background-color: #c0cddc;
    }
    tbody{
        background-color: #c0cddc;
    }
    .a {
        background-color: #c0cddc;
    }
    .b {
        background-color: #c0cddc;
    }
    .footer {
    	position: relative;
    	bottom:0;
    	width:100%; 
   }
   .tfooter{
        border:0px;
        background-color:#c0cddc ;
   }


</style>
<center>

<table class="tablebandeiras">
    <tr>
    <td class="tdbandeiras">
        <a href="consulta.php?pagina=0" target="_blank"> <img  title="Módulo - Brasil" src="img/bandeiras/bbrasil.png"/> </a>    
    </td>
    
    <td class="tdbandeiras">
    <? if ($_SESSION["idusuario"]==1 |$_SESSION["idusuario"]==10){?>
        <a href="argentina/consulta.php?pagina=0" target="_blank"><img title="Módulo - Argentina" src="img/bandeiras/bargentina.png"/> </a>
    <?} else{ ?>
        <img title="Módulo - Argentina" src="img/bandeiras/bargentinacinza.png"/> 
    <?} ?>
    </td> 
    
    <td class="tdbandeiras">
    <? if ($_SESSION["idusuario"]==1 |$_SESSION["idusuario"]==10){?>
        <a href="peru/consulta.php?pagina=0" target="_blank"><img title="Módulo - Peru" src="img/bandeiras/bperu.png"/> </a>
    <?} else{ ?>
        <img title="Módulo - Peru" src="img/bandeiras/bperucinza.png"/> 
    <?} ?>
    </td> 
    
    
   
     
    </tr>
    <tr>
    <td class="tdbandeiras">
    <? if ($_SESSION["idusuario"]==1 |$_SESSION["idusuario"]==10){?>
        <a href="chile/consultaAvancada.php?pagina=0" target="_blank"><img title="Módulo - Chile" src="img/bandeiras/bchile.png"/> </a>
    <?} else{ ?>
        <img title="Módulo - Chile" src="img/bandeiras/bchilecinza.png"/> 
    <?} ?>
     </td> 
    <td class="tdbandeiras">
    <? if ($_SESSION["idusuario"]==1 |$_SESSION["idusuario"]==10){?>
        <a href="colombia/consulta.php?pagina=0" target="_blank"><img title="Módulo - Colombia" src="img/bandeiras/bcolombia.png"/> </a>
    <?} else{ ?>
        <img title="Módulo - colombia" src="img/bandeiras/bcolombiacinza.png"/> 
    <?} ?>
     </td> 
    <td class="tdbandeiras">
    <? if ($_SESSION["idusuario"]==1 |$_SESSION["idusuario"]==10){?>
        <a href="uruguai/consultaAvancada.php?pagina=0" target="_blank"><img title="Módulo - Uruguai" src="img/bandeiras/buruguai.png"/> </a>
    <?} else{ ?>
        <img title="Módulo - Uruguai" src="img/bandeiras/buruguaicinza.png"/> 
    <?} ?>
     </td> 
    </tr>
    <tr>
    
    <td class="tdbandeiras">
    <? if ($_SESSION["idusuario"]==1 |$_SESSION["idusuario"]==10){?>
        <a href="equador/consultaAvancada.php?pagina=0" target="_blank"><img title="Módulo - Equador" src="img/bandeiras/bequador.png"/> </a>
    <?} else{ ?>
        <img title="Módulo - Equador" src="img/bandeiras/bequadorcinza.png"/> 
    <?} ?>
     </td> 
    <td class="tdbandeiras"><img  title="Módulo - Paraguai" src="img/bandeiras/bparaguaicinza.png"/></td>
    <td class="tdbandeiras"><img  title="Módulo - Bolivia" src="img/bandeiras/bboliviacinza.png"/></td>

    </tr>




</table>

</center>

<?php require_once('footer.php');?>