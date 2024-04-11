<?php
include 'conexao.php';

// Verifica se os dados foram submetidos via POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recupera os valores dos campos do formulário
    $numproduto = $_POST['numproduto'];
    $nomeproduto = $_POST['nomeproduto'];
    $categoria = $_POST['categoria'];
    $quantidade = $_POST['quantidade'];
    $fornecedor = $_POST['fornecedor'];

    // Verifica se todos os campos foram preenchidos
    if (!empty($numproduto) && !empty($nomeproduto) && !empty($categoria) && !empty($quantidade) && !empty($fornecedor)) {
        // Insere os dados no banco de dados
        $sql = "INSERT INTO seu_banco_de_dados.estoque (numproduto, nomeproduto, categoria, quantidade, fornecedor) 
                VALUES (?, ?, ?, ?, ?)";

        // Prepara a declaração SQL
        $stmt = $conn->prepare($sql);

        // Vincula os parâmetros com os valores
        $stmt->bind_param("sssis", $numproduto, $nomeproduto, $categoria, $quantidade, $fornecedor);

        // Executa a declaração SQL
        if ($stmt->execute()) {
            // Redireciona para evitar o reenvio do formulário
            header("Location: listar_produtos.php");
            exit();
        } else {
            echo "Erro: " . $sql . "<br>" . $conn->error;
        }
    } else {
        
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Adicionar Produto</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-5">
        <h1>Adicionar Novo Produto</h1>
        <form method="post">
            <div class="form-group">
                <label for="numproduto">Número do Produto:</label>
                <input type="text" class="form-control" id="numproduto" name="numproduto">
            </div>
            <div class="form-group">
                <label for="nomeproduto">Nome do Produto:</label>
                <input type="text" class="form-control" id="nomeproduto" name="nomeproduto">
            </div>
            <div class="form-group">
                <label for="categoria">Categoria:</label>
                <input type="text" class="form-control" id="categoria" name="categoria">
            </div>
            <div class="form-group">
                <label for="quantidade">Quantidade:</label>
                <input type="text" class="form-control" id="quantidade" name="quantidade">
            </div>
            <div class="form-group">
                <label for="fornecedor">Fornecedor:</label>
                <input type="text" class="form-control" id="fornecedor" name="fornecedor">
            </div>
            <button type="submit" class="btn btn-primary">Adicionar Produto</button>
        </form>
    </div>
</body>
</html>