<?php
    $host = "localhost";
    $usuario = "root";
    $senha = "mysql";
    $banco = "assistencia_tecnica";
    $porta = "3306";

    $conexao = new mysqli(
        $host,
        $usuario,
        $senha,
        $banco,
        $porta
    );

    if ($conexao->connect_error){
        die("Erro ao conectar: " . $conexao->connect_error);
    }
?>