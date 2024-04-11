<?php
session_start();

// Função para estabelecer conexão com o banco de dados
function conectarBanco() {
    $servername = "localhost";
    $username = "root"; // Altere para o seu nome de usuário do banco de dados
    $password = ""; // Altere para a sua senha do banco de dados
    $databaseName = "seu_banco_de_dados"; // Altere para o nome do seu banco de dados

    // Estabelecer conexão com o banco de dados
    $conn = new mysqli($servername, $username, $password, $databaseName);

    // Verificar a conexão
    if ($conn->connect_error) {
        die("Conexão falhou: " . $conn->connect_error);
    }

    return $conn;
}

// Função para fechar a conexão com o banco de dados
function fecharConexao($conn) {
    mysqli_close($conn);
}

// Estabelecer conexão com o banco de dados
$conn = conectarBanco();

// Definir as colunas padrão de ordenação
$order_by = isset($_POST['order_by']) ? $_POST['order_by'] : 'id';
$order_type = isset($_POST['order_type']) ? $_POST['order_type'] : 'desc';

// Consulta SQL para obter mensagens do formulário junto com os nomes de usuário associados
$query = "SELECT formulario.id, formulario.message, users.username
          FROM formulario 
          INNER JOIN users ON formulario.user_id = users.user_id 
          ORDER BY $order_by $order_type"; // Ordenar conforme selecionado no formulário

// Executar a consulta SQL
$result = mysqli_query($conn, $query);




// Fechar a conexão com o banco de dados
fecharConexao($conn);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <link rel="stylesheet" type="text/css" href="assets/css/avaliacoes.css">
    <title>Ligas</title>
</head>

<body>
    <header class="p-3 menu">
        <div class="container">
            <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
                    <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap">
                        <use xlink:href="#bootstrap" />
                    </svg>
                </a>

                <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                    <li><a href="home.php" class="nav-link px-2 text-white">Home</a></li>

                </ul>
                <div class="text-end">
                    <a href="logout.php"><button type="button" class="btn btn-warning">Logout</button></a>
                </div>
            </div>
        </div>
    </header>
    <main>
        <h2>Feedbacks</h2>
        <div class="results">

            <div class="form">
                <form method="post" action="">
                    <label for="order_by">Ordenar por:</label>
                    <select name="order_by" id="order_by">
                        <option value="id">Data</option>
                        <option value="message">Conteúdo</option>
                    </select>
                    <label for="order_type">Tipo de ordenação:</label>
                    <select name="order_type" id="order_type">
                        <option value="desc"> +recente -  +antigo</option>
                        <option value="asc"> +antigo - +recente</option>
                    </select>
                    <button type="submit">Ordenar</button>
                </form>
            </div>
            
        </div>
        <div id="box-message"> 
        
        <?php
        // Estabelecer conexão com o banco de dados
        $conn = conectarBanco();
    
        // Executar a consulta SQL
        $result = mysqli_query($conn, $query);
    
        // Verificar se a consulta retornou algum resultado
        if ($result) {
            // Exibir as mensagens
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<div class='messagess'>";
                echo "<div class='messages'>";
                echo "<div class='message'>";
                echo "<p>Enviado por: " . $row['username'] . "</p>";
                echo "<p>Mensagem: " . $row['message'] . "</p>";
                echo "</div>";
                echo "</div>";  
                echo "</div>";
            }
        } else {
            echo "Erro ao executar a consulta: " . mysqli_error($conn);
        }
        ?>
    
    </div>
    </div>
       
        </div>
    </main>
</body>

</html>