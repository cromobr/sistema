<?php ob_start();
session_start();
    require_once('mysql.php');
    set_time_limit(0);

$email = $_POST['edtEmail'];
//$senha = $_POST['edtPass'];

    $qry = "select u.id, u.senha, u.nome, u.razaosocial,u.email, DATE_FORMAT(c.datacontrato,'%d/%m/%Y') as datacontrato
            from usuario u
            left join contrato c on c.idusuario = u.id where u.email='".$email."'";
    //echo $qry;
    $qry = mysql_query($qry);
    while($dados = mysql_fetch_array($qry)){
        $senhabanco = $dados['senha'];
        $_SESSION["idusuario"] =  $dados['id'];
        $_SESSION["nomeusuario"] =  $dados['nome'];
        $_SESSION["emailusuario"] =  $dados['email'];
        $_SESSION["razaosocialusuario"] =  $dados['razaosocial'];
        $_SESSION["datacontratousuario"] =  $dados['datacontrato'];        
        
    }
        
    if( isset($_POST['edtPass'])){
        $senha = $_POST['edtPass'];
        //echo $senha . " - ". $senhabanco;
        if(($senha == $senhabanco) &&($senha<>"") ){
            $_SESSION["login"] = true;
            
            $_SESSION["descricao1"] = "";
            $_SESSION["ncm"] = "";
            $_SESSION["dataInicial"] = "2014-01-01";
            $_SESSION["dataFinal"] = "2014-01-01";
            $_SESSION["valorUnitarioIni"] = "0";
            $_SESSION["valorUnitarioFin"] = "0";
            $_SESSION["qtdPagina"] = "100";
            $_SESSION["paginaAtual"] = "1";
            $_SESSION["qryconsulta"] = "";
            
            $qry = "select idUsuario from contrato where idusuario='".$_SESSION["idusuario"]."'";
            $qry = mysql_query($qry);
            while($dados = mysql_fetch_array($qry)){
                    $idcontrato = $dados['idUsuario'];
            }
            if( $_SESSION["idusuario"] == $idcontrato){
                header('location:'.$header.'consulta.php?pagina=0');        
             } else {
                header('location:'.$header.'contrato.php');
             }
            
            
            
                        
        } else{
            //echo "<script type='text/javascript'> alert('E-mail ou senha inválidos');</script>";
            header('location:'.$header.'sair.php');
            
        }
    } else{
       // echo "<script type='text/javascript'> alert('E-mail ou senha inválidos');</script>";
           header('location'.$header.'sair.php');
            
    }  

?>