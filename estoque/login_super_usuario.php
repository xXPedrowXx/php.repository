<?php 
    $servername = "localhost";
    $username = "root";
    $password = "";
    $conn = new mysqli($servername, $username, $password);
    
    if ($conn->connect_error) {
        die("Conexão falhou: " . $conn->connect_error);
    }
    
    $databaseName = "seu_banco_de_dados";
    $conn->select_db($databaseName); 
    
    session_start();

    include("../inc/connection.php");
    include("../inc/functions.php");

    $err_username = $err_password = $err_missing = ""; // Inicializando as variáveis de erro

    if($_SERVER['REQUEST_METHOD'] == "POST") {
        $nome_usuario = $_POST['nome_usuario'];
        $senha_usuario = $_POST['senha_usuario'];

        if(empty($nome_usuario) || empty($senha_usuario)) {
            $err_missing = "Todos os campos devem ser preenchidos";
        } else {
            $query = "SELECT * FROM usuarios WHERE nome_usuario = '$nome_usuario' LIMIT 1";
            $result = mysqli_query($con, $query);

            if($result && mysqli_num_rows($result) > 0) {
                $user_data = mysqli_fetch_assoc($result);
                
                if($user_data['senha_usuario'] === $senha_usuario) {
                    $_SESSION['id_usuario'] = $user_data['id_usuario'];
                    header("Location: estoque.php");
                    die;
                } else {
                    $err_password = "Senha incorreta";
                }
            } else {
                $err_username = "Usuário não encontrado";
            }
        }
    }
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/login.css">
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
                    <li><a href="homeSemcontact.php" class="nav-link px-2 text-white">Home</a></li>
                </ul>
               
            </div>
        </div>
    </header>
    <main>
        <div class="page">
            <form method="post" id="loginForm" class="formLogin">
                <h1 id="top">Login de funcionario</h1>
                <p>Digite os seus dados de acesso nos campos abaixo.</p>
                <label for="nome_usuario">Username</label>
				<input id="nome_usuario" type="text" name="nome_usuario" autofocus="true" placeholder="Digite seu username">
				<?php 
					if (!empty($err_username)) {
						echo "<p id='error'>" .$err_username . "</p>";
					}
				?>

<label for="senha_usuario">Senha</label>
				<input id="senha_usuario" type="senha_usuario" name="senha_usuario" autofocus="true" placeholder="Digite sua Senha">
				<?php 
					if (!empty($err_password)) {
						echo "<p id='error'>" . $err_password . "</p>";
					}
				?>

                <input id="button" type="submit" value="Logar" class="btn">

                <a href="cadastro_super_usuario.php">Clique para se Cadastrar</a>

                <?php 
                    if (!empty($err_missing)) {
                        echo "<p id='error'>" . $err_missing . "</p>";
                    }
                ?>
            </form>
        </div>
    </main>
</body>
</html>