<?php
require_once('conexao.php');

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $sql = "SELECT * FROM tarefas WHERE id = $id";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $tarefa = mysqli_fetch_assoc($result);
    } else {
        echo "Tarefa não encontrada.";
        exit();
    }
} else {
    echo "ID não especificado.";
    exit();
}

mysqli_close($conn);
?>

<!doctype html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Editar Tarefa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <h1>Editar Tarefa</h1>
        <form action="acoes.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $tarefa['id']; ?>">
            <div class="mb-3">
                <label for="titulo" class="form-label">Título</label>
                <input type="text" class="form-control" id="titulo" name="titulo" value="<?php echo htmlspecialchars($tarefa['titulo']); ?>" required>
            </div>
            <div class="mb-3">
                <label for="statusTarefa" class="form-label">Status</label>
                <select class="form-select" id="statusTarefa" name="statusTarefa" required>
                    <option value="Pendente" <?php echo $tarefa['statusTarefa'] == 'Pendente' ? 'selected' : ''; ?>>Pendente</option>
                    <option value="Em Andamento" <?php echo $tarefa['statusTarefa'] == 'Em Andamento' ? 'selected' : ''; ?>>Em Andamento</option>
                    <option value="Concluído" <?php echo $tarefa['statusTarefa'] == 'Concluído' ? 'selected' : ''; ?>>Concluído</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Atualizar Tarefa</button>
            <a href="index.php" class="btn btn-secondary">Voltar</a>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>