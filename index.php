<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
session_start();
if (!isset($_SESSION['logadoM']) && $_SESSION['logadoM'] != true) {
    header("Location: view/login.php");
}else{
    echo $_SESSION['usuarioM'] . " | " . $_SESSION['emailM'];
    echo " | <a href='controller/logout.php'>Sair</a>";
}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <h1>Página Inicial</h1>
        <br><br>
        <button onclick="location.href='view/cadUsuario.php'">Cadastro de Usuário</button>
    </body>
</html>
