<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>CRUD PHP</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.css">
</head>

<body>

    <div class="container" style="margin-top: 40px">

        <center>
            <h3>Lista de categorias</h3>
        </center>
        <br>
        <br>
        <center>
            <table id="table_id" class="table">
                <thead>
                    <tr>
                        <th scope="col">Nome da categoria</th>
                        <th scope="col">
                            <center>Ação</center>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Aqui você precisa incluir o arquivo de conexão com o banco de dados
                    include 'conexao.php';

                    // Query para selecionar todas as categorias
                    $sql = "SELECT * FROM categoria"; // Alterado para corresponder ao nome da tabela definido no SQL de criação
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        // Exibir cada categoria em uma linha da tabela
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $row['categoria'] . "</td>"; // Alterado para corresponder ao nome da coluna definido no SQL de criação
                            echo "<td>";
                            echo "<center>";
                            echo "<a href='editar_categoria.php?id=" . $row['id_categoria'] . "' role='button' class='btn btn-warning btn-sm'><i class='far fa-edit'></i>&nbsp; Editar</a>";
                            echo "&nbsp;";
                            echo "<a href='excluir_categoria.php?id=" . $row['id_categoria'] . "' role='button' class='btn btn-danger btn-sm'><i class='far fa-trash-alt'></i>&nbsp; Excluir</a>";
                            echo "</center>";
                            echo "</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='2'>Nenhuma categoria encontrada.</td></tr>";
                    }

                    // Fechar conexão com o banco de dados
                    $conn->close();
                    ?>
                </tbody>
            </table>
        </center>

        <div style="text-align: right; margin-top:20px;">
            <a href="adicionar_categoria.php" role="button" class="btn btn-success btn-sm">Nova categoria</a>
            <a href="estoque.php" role="button" class="btn btn-primary btn-sm">Voltar ao menu</a>
        </div>

    </div>

    <script src="https://kit.fontawesome.com/cae6919cdb.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
        crossorigin="anonymous"></script>
    <script type="text/javascript" charset="utf8"
        src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.js"></script>

</body>

</html>