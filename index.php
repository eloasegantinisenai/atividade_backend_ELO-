<?php
    include "config/conexao.php";

    $sql = "SELECT * FROM ordens_servico";
    $resultado = $conexao->query($sql);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Assistência Técnica</title>
    <link rel="stylesheet" href="estilo/estilo.css">
</head>
<body>
    <div class="container">
        <h1>Ordens de Serviço</h1>
        <a href="cadastrar.php" class="botao">Nova Ordem</a>

        <table>
            <tr>
                <th>ID</th>
                <th>Cliente</th> 
                <th>Equipamento</th>               
                <th>Problema</th>               
                <th>Data</th>                
                <th>Status</th>                
                <th>Ações</th> 
            </tr>
            
            <?php while ($ordem = $resultado->fetch_assoc()) { ?>
                <tr>
                    <td><?php echo $ordem["id"]; ?></td>
                    <td><?php echo $ordem["cliente"]; ?></td>
                    <td><?php echo $ordem["equipamento"]; ?></td>
                    <td><?php echo $ordem["problema"]; ?></td>
                    <td><?php echo $ordem["data_entrada"]; ?></td>
                    <td><?php echo $ordem["status"]; ?></td>
                    <td>
                        <a href="editar.php?id=<?php echo $ordem["id"]; ?>">Editar</a>
                    </td>
                </tr>
            <?php } ?>
        </table>
    </div>
</body>
</html>