<?php ob_start();
    require_once('verifica.php');
    require_once('mysql.php');
    require_once('menu.php');
    
    if(isset($_POST['btnSalvar'])){
        $senhaAntiga = $_POST['edtSenhaAntiga'];
        $senhaNova = $_POST['edtSenhaNova'];
        $senhaConfirma = $_POST['edtSenhaConfirma'];
        $senhaAntigaConfirmacao = "";
        
        $qry = "select senha from admin where senha='".$senhaAntiga."'";
        $qry = mysql_query($qry);
        while($dados = mysql_fetch_array($qry)){
            $senhaAntigaConfirmacao = $dados['senha'];
        }
        
        if(($senhaAntiga == $senhaAntigaConfirmacao) && ($senhaAntigaConfirmacao<>"")) {
            if (($senhaNova == $senhaConfirma)  && ($senhaNova<>"")){
                $qry="update admin set senha='".$senhaNova."' where senha ='".$senhaAntiga."'";    
                if(mysql_query($qry)) echo "<script type='text/javascript'>alert('Senha atualizada com sucesso!');</script>";
                                
            } else {
                echo "<script type='text/javascript'>alert('Confirmação de senha diferente da nova senha!');</script>";    
            }
        } else{
            echo "<script type='text/javascript'>alert('Senha Inválida');</script>";
            
        }
    }    

?>
<div style="width: 100%; height: 73%;">
<h1 style="font-family: Verdana; color: gray; font-weight: bold; font-size: medium; margin-left: 50px;">Admin - Alteração de Senha</h1>
<form method="POST" action="admin.php"> 
    <table style="margin-left: 50px; font-family: Verdana; color: gray; font-size: small;">
        <tr>
            <td> Senha Antiga</td>
            <td> <input type="password" max="10" size="30" name="edtSenhaAntiga"/></td>
        </tr>
        <tr>
            <td> Nova Senha</td>
            <td> <input type="password" max="10" size="30" name="edtSenhaNova"/></td>
        </tr>
        <tr>
            <td>Confirmar Nova Senha</td>
            <td> <input type="password" max="10" size="30" name="edtSenhaConfirma"/></td>
        </tr>
        <tr>
            <td colspan="2" align=center><input type="submit" name="btnSalvar"value="Salvar" style="width: 150;"/> </td>
            
        </tr>
    </table>
</form>
</div>

<?php require_once('footer.php');?>