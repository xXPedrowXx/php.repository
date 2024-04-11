<?php
include 'conexao.php';

// Verifica se os dados foram submetidos via POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recupera os valores dos campos do formulário
    $nome = $_POST['nome'];
    $regiao = $_POST['regiao'];
    $categoria_atende = $_POST['categoria_atende'];
    $prazo_entrega = $_POST['prazo_entrega'];

    // Verifica se todos os campos foram preenchidos
    if (!empty($nome) && !empty($regiao) && !empty($categoria_atende) && !empty($prazo_entrega)) {
        // Insere os dados do novo fornecedor no banco de dados
        $sql = "INSERT INTO fornecedor (nome_fornecedor, regiao, categoria_atende, prazo_entrega) VALUES (?, ?, ?, ?)";

        // Prepara a declaração SQL
        $stmt = $conn->prepare($sql);

        // Vincula os parâmetros com os valores
        $stmt->bind_param("sssi", $nome, $regiao, $categoria_atende, $prazo_entrega);

        // Executa a declaração SQL
        if ($stmt->execute()) {
            // Redireciona de volta para a página listar_fornecedores.php após adicionar o fornecedor
            header("Location: listar_fornecedor.php");
            exit();
        } else {
            echo "Erro ao adicionar fornecedor: " . $conn->error;
        }
    } else {
        echo "Todos os campos devem ser preenchidos.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Adicionar Fornecedor</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>

<body>

    <div class="container mt-5" >
        <h3>Adicionar Novo Fornecedor</h3>
        <form method="POST" action="adicionar_fornecedor.php">
            <div class="form-group">
                <label for="nome">Nome:</label>
                <input type="text" class="form-control" id="nome" name="nome" required>
            </div>
            <div class="form-group">
                <label for="regiao">Região:</label>
                <input type="text" class="form-control" id="regiao" name="regiao" required>
            </div>
            <div class="form-group">
    <label for="categoria_atende">Categoria que atende</label>
    <input type="text" class="form-control" id="categoria_atende" name="categoria_atende">
</div>
            <div class="form-group">
                <label for="prazo_entrega">Prazo de Entrega (em dias):</label>
                <input type="number" class="form-control" id="prazo_entrega" name="prazo_entrega" required>
            </div>
            <button type="submit" class="btn btn-primary">Adicionar Fornecedor</button>
        </form>
    </div>


</body>

</html>