<?php
include 'conexao.php';

// Verifica se o ID do fornecedor foi passado via GET
if(isset($_GET['id'])) {
    $id = $_GET['id'];

    // Recupera os dados do fornecedor do banco de dados
    $sql = "SELECT * FROM fornecedor WHERE id_fornecedor = $id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $nome = $row['nome_fornecedor'];
        $regiao = $row['regiao'];
        $categoria = $row['categoria_atende'];
        $prazo_entrega = $row['prazo_entrega'];
    } else {
        echo "Nenhum fornecedor encontrado com o ID fornecido.";
        exit();
    }

    // Se o formulário de edição for submetido
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Recupera os valores dos campos do formulário
        $nome = $_POST['nome'];
        $regiao = $_POST['regiao'];
        $categoria = $_POST['categoria'];
        $prazo_entrega = $_POST['prazo_entrega'];

        // Atualiza os dados do fornecedor no banco de dados
        $sql = "UPDATE fornecedor SET nome_fornecedor='$nome', regiao='$regiao', categoria_atende='$categoria', prazo_entrega='$prazo_entrega' WHERE id_fornecedor=$id";

        if ($conn->query($sql) === TRUE) {
            // Redireciona de volta para a página listar_fornecedores.php após a edição
            header("Location: listar_fornecedor.php");
            exit();
        } else {
            echo "Erro ao atualizar fornecedor: " . $conn->error;
        }
    }
} else {
    echo "ID do fornecedor não foi fornecido.";
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Editar Fornecedor</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-5">
        <h2>Editar Fornecedor</h2>
        <form method="post">
            <div class="form-group">
                <label for="nome">Nome:</label>
                <input type="text" class="form-control" id="nome" name="nome" value="<?php echo isset($nome) ? $nome : ''; ?>">
            </div>
            <div class="form-group">
                <label for="regiao">Região:</label>
                <input type="text" class="form-control" id="regiao" name="regiao" value="<?php echo isset($regiao) ? $regiao : ''; ?>">
            </div>
            <div class="form-group">
                <label for="categoria">Categoria que Atende:</label>
                <input type="text" class="form-control" id="categoria" name="categoria" value="<?php echo isset($categoria) ? $categoria : ''; ?>">
            </div>
            <div class="form-group">
                <label for="prazo_entrega">Prazo de Entrega (em dias):</label>
                <input type="number" class="form-control" id="prazo_entrega" name="prazo_entrega" value="<?php echo isset($prazo_entrega) ? $prazo_entrega : ''; ?>">
            </div>
            <button type="submit" class="btn btn-primary">Salvar</button>
        </form>
    </div>
</body>
</html>