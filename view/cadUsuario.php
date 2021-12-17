<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
session_start();
if (!isset($_SESSION['logadoM']) && $_SESSION['logadoM'] != true) {
    header("Location: login.php");
} else {
    echo $_SESSION['usuarioM'] . " | " . $_SESSION['emailM'];
    echo " | <a href='../controller/logout.php'>Sair</a>";
}
require_once '../controller/cUsuario.php';
$cadUser = new cUsuario();
?>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="Content-Language" content="pt-br">
        <title></title>
    </head>
    <body>
        <h1>Cadastro de Usuários</h1>
        <form action="<?php $cadUser->inserir(); ?>" method="POST">
            <input type="text" name="nome" placeholder="Nome aqui ..."/>
            <br><br>
            <input type="email" name="email" placeholder="E-mail aqui ..."/>
            <br><br>
            <input type="password" name="pas" placeholder="Senha aqui ..."/>
            <input type="radio" required value="Fisica" name="tpPessoa">Fisíca
            <input type="radio" required value="Juridica" name="tpPessoa">Jurídica
            <br><br>
            <input type="text" placeholder="CPF aqui..." 
                   maxlength="11" name="cpf"/>
            <br><br>

            <input type="number" placeholder="CNPJ aqui..." name="cnpj"/>
            <br><br>
            <input type="submit" name="salvar" value="Salvar"/>
            <input type="reset" name="limpar" value="Limpar"/>
            <input type="button" value="Voltar" 
                   onclick="location.href = '../index.php'"/>
            <br><br>
            
        </form>
        <?php
        // put your code here
        ?>
    </body>
</html>
