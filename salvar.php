<?php
    include "config/conexao.php";
    // post é uma variável especial do php, recebe dados enviados pelo formulário quando usamos o method = "post" do html.
    $cliente = $_POST ["cliente"];
    $equipamento = $_POST ["equipamento"];
    $problema = $_POST ["problema"];
    $data_entrada = $_POST ["data_entrada"];
    $status = $_POST ["status"];

    $sql = "INSERT INTO ordens_servico
            (cliente, equipamento, problema, data_entrada, status)
            VALUES (?, ?, ?, ?, ?)";
    //STATEMENT
    $stmt = $conexao->prepare($sql);

    $stmt->bind_param(
        "sssss",
        $cliente,
        $equipamento,
        $problema,
        $data_entrada,
        $status
    );
    
    if ($stmt->execute()){
        header("Location: index.php");
        exit;
    } else{
        echo "Erro ao cadastrar ordem de serviço.";
    }
?>