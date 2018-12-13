<?php ob_start();
    require_once('menu.php');
    require_once('dadospesquisa.php');
?>
<script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript" src="jquery.js"></script>

    <script type="text/javascript">
      google.load('visualization', '1.0', {'packages':['corechart']});
      google.setOnLoadCallback(function(){
        var json_text = $.ajax({url: "getDado.php", dataType:"json", async: false}).responseText;
        var json = eval("(" + json_text + ")");
        var dados = new google.visualization.DataTable(json.dados);

        var chart = new google.visualization.PieChart(document.getElementById('area_grafico'));
        chart.draw(dados, json.config);
      });
    </script>
<style>
    table{
        border-collapse: collapse;
    }
    table tr td {
        border:1px solid black;
        font-family: verdana;
        font-size: xx-small;
        
    }
    thead{
        background-color: Blue;
        font-family: Verdana;
        font-weight: bold;
        font-size: small;
        color: white;
    }
    tr:hover{
        background-color: #d0dafd;
    }
</style>

<center>

<div id="area_grafico"></div>
</center>
<?require_once('footer.php');?>