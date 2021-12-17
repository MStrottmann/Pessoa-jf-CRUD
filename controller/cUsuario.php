<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of cUsuario
 *
 * @author jairb
 */
class cUsuario {

    //put your code here
    public function inserir() {
        if (isset($_POST['salvar'])) {
             if ($this->input->post('tpPessoa') == 'Fisica') {
            $cpf = $_POST['cpf'];
        } else {
           $cnpj = $_POST['cnpj'];
        }
            $nome = $_POST['nome'];
            $email = $_POST['email'];
            $pas = $_POST['pas'];

            $pdo = require_once '../pdo/connection.php';
            $sql = "insert into usuario (nomeUser, email, pas) values (?,?,?)";
            $sth = $pdo->prepare($sql);
            $sth->bindParam(1, $nome, PDO::PARAM_STR);
            $sth->bindParam(2, $email, PDO::PARAM_STR);
            $sth->bindParam(3, $pass, PDO::PARAM_STR);
            $pass = password_hash($pas, PASSWORD_DEFAULT);
            $sth->bindParam(4, $cnpj, PDO::PARAM_STR);
            $sth->bindParam(5, $cpf, PDO::PARAM_STR);
            $sth->execute();
            unset($sth);
            unset($pdo);
        }
    }

    public function getUsuario() {
        $pdo = require_once '../pdo/connection.php';
        $sql = "select idUser, nomeUser, email from usuario";
        $sth = $pdo->prepare($sql);
        $sth->execute();
        $result = $sth->fetchAll();
        unset($sth);
        unset($pdo);
        return $result;
    }

    public function deletarUser() {
        if (isset($_POST['deletar'])) {
            $id = (int) $_POST['idUser'];
            $pdo = require_once '../pdo/connection.php';
            $sql = "delete from usuario where idUser = ?";
            $sth = $pdo->prepare($sql);
            $sth->bindParam(1, $id, PDO::PARAM_INT);
            $sth->execute();
            unset($sth);
            unset($pdo);
            header("Refresh: 0");
        }
    }

    public function getUsuarioById($id) {
        $pdo = require_once '../pdo/connection.php';
        $sql = "select idUser, nomeUser, email from usuario where idUser = ?";
        $sth = $pdo->prepare($sql);
        $sth->execute([$id]);
        $result = $sth->fetchAll();
        unset($sth);
        unset($pdo);
        return $result;
    }

}
