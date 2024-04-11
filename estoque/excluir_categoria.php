<?php
include 'conexao.php';

// Função para excluir uma categoria
function excluirCategoria($conn, $idCategoria) {
    // Verifica se o ID da categoria não está vazio
    if (!empty($idCategoria)) {
        // Deleta a categoria do banco de dados
        $sql = "DELETE FROM categoria WHERE id_categoria=$idCategoria";

        if ($conn->query($sql) === TRUE) {
            // Redireciona de volta para a página de listar categorias após a exclusão
            header("Location: listar_categorias.php");
            exit(); // Certifica-se de que o script não continue executando após o redirecionamento
        } else {
            echo "Erro ao excluir categoria: " . $conn->error;
        }
    } else {
        echo "ID da categoria não foi fornecido.";
    }
}

// Verifica se o ID da categoria foi passado via GET
if(isset($_GET['id'])) {
    $id = $_GET['id'];
    // Chama a função para excluir a categoria
    excluirCategoria($conn, $id);
} else {
    echo "ID da categoria não foi fornecido.";
}
?>