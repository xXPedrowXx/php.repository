<?php
include 'conexao.php';

// Consulta SQL para obter os dados do estoque
$sql = "SELECT * FROM estoque";
$result = $conn->query($sql);

// Verifica se há resultados
if ($result->num_rows > 0) {
    // Loop através dos resultados para exibir na tabela
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["nomeproduto"] . "</td>";
        echo "<td>" . $row["numproduto"] . "</td>";
        echo "<td>" . $row["categoria"] . "</td>";
        echo "<td>" . $row["quantidade"] . "</td>";
        echo "<td>" . $row["fornecedor"] . "</td>";
        echo "<td>";
        echo "<center>";
        echo "<a href='editar_produto.php?id=" . $row["id_estoque"] . "' role='button' class='btn btn-warning btn-sm'><i class='far fa-edit'></i>&nbsp; Editar</a>";
        echo "<a href='excluir_produto.php?id=" . $row["id_estoque"] . "' role='button' class='btn btn-danger btn-sm'><i class='far fa-trash-alt'></i>&nbsp; Excluir</a>";
        echo "</center>";
        echo "</td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='6'>Nenhum produto encontrado.</td></tr>";
}
$conn->close();
?>