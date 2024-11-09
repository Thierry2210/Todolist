<?php
session_start();
require_once("conexao.php");

$sql = "SELECT * FROM tarefas";
$tarefas = mysqli_query($conn, $sql);
?>

<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Todolist</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <header id="main-header" class="bg-warning text-white p-4 mb-3">
            <h1 id="header-title">ToDo List</h1>
            <a href="create_todolist.php" class="btn btn-success float-end">Criar Nova Tarefa</a>
        </header>
        <div class="card">
            <div class="card-body">
                <div class="to-dos" id="toDoContainer">

                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Título</th>
                                <th>Status</th>
                                <th>Data Criação</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($tarefa = mysqli_fetch_assoc($tarefas)): ?> 
                                <tr>
                                    <td><?php echo $tarefa['id']; ?></td>
                                    <td><?php echo $tarefa['titulo']; ?></td>
                                    <td><?php echo $tarefa['statusTarefa']; ?></td>
                                    <td><?php echo date('d/m/Y', strtotime($tarefa['dataCriacao'])); ?></td>
                                    <td>
                                        <a href="edit_todolist.php?id=<?php echo $tarefa['id']; ?>" class="btn btn-secondary btn-sm">
                                            <i class="bi bi-pencil-fill"></i> Editar
                                        </a>
                                        <a href="delete_todolist.php?id=<?php echo $tarefa['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza que deseja excluir esta tarefa?');">
                                            <i class="bi bi-trash-fill"></i> Excluir                          
                                        </a>
                                        </form>
                                    </td>
                                </tr>
                            <?php endwhile; ?> 
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstr
