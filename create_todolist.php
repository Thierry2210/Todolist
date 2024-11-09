<?php
require_once('conexao.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $titulo = $_POST['titulo'];
    $statusTarefa = $_POST['statusTarefa'];
    $dataCriacao = date('Y-m-d H:i:s');

    $sql = "INSERT INTO tarefas (titulo, statusTarefa, dataCriacao) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $titulo, $statusTarefa, $dataCriacao);

    if ($stmt->execute()) {
        echo "Tarefa criada com sucesso!";
        header("Location: index.php");
        exit;
    } else {
        echo "Erro ao criar a tarefa: " . $stmt->error;
    }

    $stmt->close();
}

mysqli_close($conn);
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Criar Tarefa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <header class="bg-warning text-white p-4 mb-3">
            <h1>Criar Nova Tarefa</h1>
        </header>
        <form method="POST" action="">
            <div class="mb-3">
                <label for="titulo" class="form-label">Título</label>
                <input type="text" class="form-control" id="titulo" name="titulo" required>
            </div>
            <div class="mb-3">
                <label for="statusTarefa" class="form-label">Status</label>
                    <select class="form-control" id="statusTarefa" name="statusTarefa">
                        <option value="pendente">Pendente</option>
                        <option value="em andamento">Em andamento</option>
                        <option value="concluido">Concluída</option>
                    </select>
            </div>
            <button type="submit" class="btn btn-success">Criar Tarefa</button>
            <a href="index.php" class="btn btn-secondary">Voltar</a>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>