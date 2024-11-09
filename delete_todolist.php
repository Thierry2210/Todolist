<?php
require_once('conexao.php');

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);

    $sql = "DELETE FROM tarefas WHERE id=$id";

    if (mysqli_query($conn, $sql)) {
        header("Location: index.php");
        exit();
    } else {
        echo "Erro ao excluir a tarefa: " . mysqli_error($conn);
    }
} else {
    echo "ID não especificado.";
}

mysqli_close($conn);
?>