<?php
include 'conexao.php';

// Verifica se os dados foram submetidos
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recupera os valores dos campos do formulário
    $id_categoria = $_POST['id_categoria'];
    $nome_categoria = $_POST['nome_categoria'];

    // Atualiza os dados no banco de dados
    $sql = "UPDATE categoria 
            SET categoria='$nome_categoria' 
            WHERE id_categoria=$id_categoria";

    if ($conn->query($sql) === TRUE) {
        // Redireciona de volta para a página de listar categorias
        header("Location: listar_categorias.php");
        exit(); // Certifica-se de que o script não continue executando após o redirecionamento
    } else {
        echo "Erro ao atualizar categoria: " . $conn->error;
    }

    $conn->close();
} else {
    // Se não houver dados submetidos, exibe o formulário para editar a categoria
    // Recupera o ID da categoria a ser editada
    if(isset($_GET['id'])) {
        $id_categoria = $_GET['id'];

        // Obtém os detalhes da categoria do banco de dados
        $sql = "SELECT * FROM categoria WHERE id_categoria = $id_categoria";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            // Exibe o formulário com os detalhes da categoria
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Editar Categoria</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-5">
        <h2>Editar Categoria</h2>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <input type="hidden" name="id_categoria" value="<?php echo $row['id_categoria']; ?>">
            <div class="form-group">
                <label for="nome_categoria">Nome da Categoria:</label>
                <input type="text" class="form-control" id="nome_categoria" name="nome_categoria" value="<?php echo $row['categoria']; ?>">
            </div>
            <button type="submit" class="btn btn-primary">Atualizar Categoria</button>
        </form>
    </div>
</body>
</html>
<?php
        } else {
            echo "Categoria não encontrada.";
        }
    } else {
        echo "ID da categoria não fornecido.";
    }
}
?>