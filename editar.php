<?php
    include "config/conexao.php";

    $id = intval($_GET["id"]);

    $sql = "SELECT * FROM ordens_servico WHERE ID = ?";

    $stmt = $conexao->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();

    $resultado = $stmt->get_result();
    $ordem = $resultado->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Ordem</title>
    <link rel="stylesheet" href="estilo/estilo.css"
</head>
<body>
    <div class="container">
        <h1>Editar ordem de serviço</h1>
        <form action="atualizar.php" method="POST">
            <input 
                type="hidden"
                name="id"
                value="<?php echo $ordem["id"];?>"
            >
            <label>Cliente</label>
            <input 
                type="text"
                name="cliente"
                value="<?php echo htmlspecialchars($ordem["cliente"]);?>"
                required
            >
            <label>Equipamento</label>
            <input 
                type="text"
                name="equipamento"
                value="<?php echo htmlspecialchars($ordem["equipamento"]);?>"
                required
            >
            <label>Problema</label>
            <textarea name="problema" required>
                <?php echo htmlspecialchars($ordem["problema"]);?>
            </textarea>
            
            <label>Data de entrada</label>
            <input 
                type="date"
                name="data_entrada"
                value="<?php echo $ordem["data_entrada"];?>"
                required
            >
            <label>Status</label>
            <select name="status">
                <option value="Recebido">Recebido</option>
                <option value="Em análise">Em análise</option>
                <option value="Em manutenção">Em manutenção</option>
                <option value="Concluído">Concluído</option>
            </select>

            <button type="submit">Atualizar</button>
        </form>
    </div>
</body>
</html>