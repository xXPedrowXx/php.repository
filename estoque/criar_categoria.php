<?php
// Função para criar uma nova categoria
function criarCategoria($conn, $nomeCategoria) {
    // Verifica se o nome da categoria não está vazio
    if (!empty($nomeCategoria)) {
        // Prepara a declaração SQL para inserir a nova categoria no banco de dados
        $stmt = $conn->prepare("INSERT INTO sua_tabela_de_categorias (nome_da_categoria) VALUES (?)");
        $stmt->bind_param("s", $nomeCategoria); // Vincula o parâmetro com o valor do nome da categoria
        // Executa a declaração SQL
        if ($stmt->execute()) {
            return true; // Retorna verdadeiro se a categoria for inserida com sucesso
        } else {
            return false; // Retorna falso se ocorrer um erro ao inserir a categoria
        }
    } else {
        return false; // Retorna falso se o nome da categoria estiver vazio
    }
}
?>