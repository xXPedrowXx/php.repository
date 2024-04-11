<?php
// Incluir o arquivo de conexão com o banco de dados
include 'conexao.php';

// Consulta SQL para selecionar todos os fornecedores
$sql = "SELECT * FROM fornecedor";
$resultado = $conn->query($sql);
?>

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
            <h3>Lista de fornecedores</h3>
        </center>
        <br>
        <br>
        <table class="table" id="table_id">
            <thead>
                <tr>
                    <th scope="col">Nome</th>
                    <th scope="col">ID do fornecedor</th>
                    <th scope="col">Região</th>
                    <th scope="col">Categoria que atende</th>
                    <th scope="col">Prazo de entrega</th>
                    <th scope="col">Ação</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Verifica se a consulta retornou algum resultado
                if ($resultado->num_rows > 0) {
                    // Loop através de todos os resultados da consulta
                    while ($row = $resultado->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row["nome_fornecedor"] . "</td>";
                        echo "<td>" . $row["id_fornecedor"] . "</td>";
                        echo "<td>" . $row["regiao"] . "</td>";
                        echo "<td>" . $row["categoria_atende"] . "</td>";
                        echo "<td>" . $row["prazo_entrega"] . "</td>";
                        echo "<td>";
                        echo '<a href="editar_fornecedor.php?id=' . $row["id_fornecedor"] . '" role="button" class="btn btn-warning btn-sm"><i class="far fa-edit"></i>&nbsp; Editar</a>';
                        echo '<a href="excluir_fornecedor.php?id=' . $row["id_fornecedor"] . '" role="button" class="btn btn-danger btn-sm"><i class="far fa-trash-alt"></i>&nbsp; Excluir</a>';
                        echo "</td>";
                        echo "</tr>";
                    }
                } else {
                    // Se não houver fornecedores, exibe uma mensagem na tabela
                    echo '<tr><td colspan="6">Nenhum fornecedor encontrado</td></tr>';
                }
                ?>
            </tbody>
        </table>

        <div style="text-align: right; margin-top:20px;">
            <a href="adicionar_fornecedor.php" role="button" class="btn btn-success btn-sm">Novo fornecedor</a>
            <a href="estoque.php" role="button" class="btn btn-primary btn-sm">Voltar ao menu</a>
        </div>

    </div>

    <script src="https://kit.fontawesome.com/cae6919cdb.js" crossorigin="anonymous"></script>

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.js">
    </script>

</body>

</html>