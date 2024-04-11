<?php
include 'conexao.php';

// Verifica se o ID do produto foi passado via GET
if(isset($_GET['id'])) {
    $id = $_GET['id'];

    // Deleta o produto do banco de dados
    $sql = "DELETE FROM estoque WHERE id_estoque=$id";

    if ($conn->query($sql) === TRUE) {
        // Redireciona para a página listar_produtos.php
        header("Location: listar_produtos.php");
        exit(); // Garante que o código abaixo não seja executado após o redirecionamento
    } else {
        echo "Erro ao excluir produto: " . $conn->error;
    }

    $conn->close();
}
?>