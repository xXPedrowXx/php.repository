<?php
include 'conexao.php';

// Verifica se os dados foram submetidos
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recupera os valores dos campos do formulário
    $id = $_POST['id'];
    $nomeproduto = $_POST['nomeproduto'];
    $categoria = $_POST['categoria'];
    $quantidade = $_POST['quantidade'];
    $fornecedor = $_POST['fornecedor'];

    // Atualiza os dados no banco de dados
    $sql = "UPDATE seu_banco_de_dados.estoque 
            SET nomeproduto='$nomeproduto', categoria='$categoria', quantidade='$quantidade', fornecedor='$fornecedor' 
            WHERE id_estoque=$id";

    if ($conn->query($sql) === TRUE) {
        // Redireciona de volta para a página de listar produtos
        header("Location: listar_produtos.php");
        exit(); // Certifica-se de que o script não continue executando após o redirecionamento
    } else {
        echo "Erro ao atualizar produto: " . $conn->error;
    }

    $conn->close();
} else {
    // Se não houver dados submetidos, exibe o formulário para editar o produto
    // Recupera o ID do produto a ser editado
    if(isset($_GET['id'])) {
        $id = $_GET['id'];

        // Obtém os detalhes do produto do banco de dados
        $sql = "SELECT * FROM seu_banco_de_dados.estoque WHERE id_estoque = $id";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            // Exibe o formulário com os detalhes do produto
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Editar Produto</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-5">
    <h2>Editar Produto</h2>

        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <input type="hidden" name="id" value="<?php echo $row['id_estoque']; ?>">
            <div class="form-group">
                <label for="nomeproduto">Nome do Produto:</label>
                <input type="text" class="form-control" id="nomeproduto" name="nomeproduto" value="<?php echo $row['nomeproduto']; ?>">
            </div>
            <div class="form-group">
                <label for="categoria">Categoria:</label>
                <input type="text" class="form-control" id="categoria" name="categoria" value="<?php echo $row['categoria']; ?>">
            </div>
            <div class="form-group">
                <label for="quantidade">Quantidade:</label>
                <input type="text" class="form-control" id="quantidade" name="quantidade" value="<?php echo $row['quantidade']; ?>">
            </div>
            <div class="form-group">
                <label for="fornecedor">Fornecedor:</label>
                <input type="text" class="form-control" id="fornecedor" name="fornecedor" value="<?php echo $row['fornecedor']; ?>">
            </div>
            <button type="submit" class="btn btn-primary">Atualizar Produto</button>
        </form>
    </div>
</body>
</html>
<?php
        } else {
            echo "Produto não encontrado.";
        }
    } else {
        echo "ID do produto não fornecido.";
    }
}
?>