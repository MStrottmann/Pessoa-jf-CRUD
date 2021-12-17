<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $Nome = $_POST['nome'];
    $Email = $_POST['email'];
    $cpf = $_POST['cpf'];
    $cnpj = $_POST['cpnj'];

    $pdo = require_once '../pdo/connection.php';

    $sql = "UPDATE usuario SET nomeUser = ?, email = ?, cpf = ?, cnpj = ?,WHERE idUser = ?";
    $sth = $pdo->prepare($sql);
    $sth->bindParam(1, $Nome, PDO::PARAM_STR);
    $sth->bindParam(2, $Email, PDO::PARAM_STR);
    $sth->bindParam(3, $cpf, PDO::PARAM_STR);
    $sth->bindParam(4, $cnpj, PDO::PARAM_STR);
    $sth->bindParam(5, $id, PDO::PARAM_INT);
    
    $sth->execute();
    unset($sth);
    unset($pdo);
    header("location: ../view/listaUsuarios.php");
}
