<?php
include 'conexao.php';

// Verifica se os dados foram submetidos via POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recupera o nome da categoria do formulário
    $categoria = $_POST['categoria'];

    // Verifica se o campo da categoria não está vazio
    if (!empty($categoria)) {
        // Prepara a declaração SQL para inserir a nova categoria no banco de dados
        $sql = "INSERT INTO categoria (categoria) VALUES (?)";

        // Prepara a declaração SQL
        $stmt = $conn->prepare($sql);

        // Vincula o parâmetro com o valor do nome da categoria
        $stmt->bind_param("s", $categoria);

        // Executa a declaração SQL
        if ($stmt->execute()) {
            // Redireciona de volta para a página de listar categorias após adicionar a nova categoria
            header("Location: listar_categorias.php");
            exit(); // Certifica-se de que o script não continue executando após o redirecionamento
        } else {
            echo "Erro ao adicionar categoria: " . $conn->error;
        }
    } else {
        echo "O campo da categoria não pode estar vazio.";
    }

    // Fecha a conexão com o banco de dados
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Adicionar Categoria</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>

<body>
    <div class="container mt-5">
        <h2>Adicionar Nova Categoria</h2>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <div class="form-group">
                <label for="categoria">Nome da Categoria:</label>
                <input type="text" class="form-control" id="categoria" name="categoria">
            </div>
            <button type="submit" class="btn btn-primary">Adicionar Categoria</button>
        </form>
    </div>
</body>

</html>