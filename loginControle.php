<?php

$acao = $_REQUEST['acao'];
$emailUsuario = empty($_REQUEST['emailusuario']) ? '' : $_REQUEST['emailusuario'];
$senhaUsuario = empty($_REQUEST['senhausuario']) ? '' : $_REQUEST['senhausuario'];

require "Conexao.php";
switch ($acao) {
    case "login":
        $sql = "select * from usuario 
                where emailusuario = '$emailUsuario' 
                and senhausuario = '$senhaUsuario' 
                and ativo = 1";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $idUsuario = $row["idusuario"];
            $nomeUsuario = $row['nomeusuario'];
            $emailUsuario = $row["emailusuario"];
            $senhaUsuario = $row["senhausuario"];

            session_start();
            $_SESSION['usuario'] = $row;
            echo "1";
        }else{
            echo "2";
        }
        break;
    case "cadastrar":
        break;
}
