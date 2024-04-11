<?php
include 'conexao.php';

// Verifica se o ID do fornecedor foi passado via GET
if(isset($_GET['id'])) {
    $id = $_GET['id'];

    // Deleta o fornecedor do banco de dados
    $sql = "DELETE FROM fornecedor WHERE id_fornecedor=$id";

    if ($conn->query($sql) === TRUE) {
        // Redireciona de volta para a página listar_fornecedores.php após a exclusão
        header("Location: listar_fornecedor.php");
        exit();
    } else {
        echo "Erro ao excluir fornecedor: " . $conn->error;
    }
} else {
    echo "ID do fornecedor não foi fornecido.";
}
?>