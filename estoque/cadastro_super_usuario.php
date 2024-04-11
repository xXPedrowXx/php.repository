<?php 
	session_start();
    
    include("auth.php");
    include("../inc/connection.php");
    include("../inc/functions.php");

	if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $nome_usuario = $_POST['nome_usuario'];
        $mail_usuario = $_POST['mail_usuario'];
        $senha_usuario = $_POST['senha_usuario'];
        $c_senha_usuario = $_POST['c_senha_usuario'];
        $nivel_usuario = $_POST['nivel']; // Correção aqui
        $status = 'Ativo';
    
        if (!$err) {
            $query = "INSERT INTO usuarios (nome_usuario, mail_usuario, senha_usuario, nivel_usuario, status) 
                      VALUES ('$nome_usuario', '$mail_usuario', '$senha_usuario', '$nivel_usuario' ,'$status')";
    
            mysqli_query($con, $query);
    
            header("Location: login_super_usuario.php");
            die;
		}else
		{
			
		}
	}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/cadastro.css">
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
                <div class="text-end">
                    <a href="login_super_usuario.php"><button type="button"
                            class="btn btn-warning">Login</button></a>
                </div>
            </div>
        </div>
    </header>
	<main>
		<div class="page">
			<form method="post" class="formLogin" id="formLogin">
				<h1>Novo funcionario</h1>
				<label for="nome_usuario">Username</label>
				<input id="nome_usuario" type="text" name="nome_usuario" autofocus="true" placeholder="Digite seu username">
				<?php 
					if (!empty($err_username)) {
						echo "<p id='error'>" .$err_username . "</p>";
					}
				?>
				<label for="mail_usuario">Email</label>
				<input id="mail_usuario" type="text" name="mail_usuario" autofocus="true" placeholder="Digite seu Email">
				<?php
					if (!empty($err_email)) {
						echo "<p id='error'>" . $err_email . "</p>";
					}
				?>
				<label for="c_mail_usuario">Confirmar email</label>
				<input id="c_mail_usuario" type="text" name="c_mail_usuario" autofocus="true" placeholder="Confirme seu Email">
				<?php
				
                if (!empty($err_c_email)) {
                    echo "<p id='error'>" . $err_c_email . "</p>";
                }
            ?>
				
				<label for="senha_usuario">Senha</label>
				<input id="senha_usuario" type="senha_usuario" name="senha_usuario" autofocus="true" placeholder="Digite sua Senha">
				<?php 
					if (!empty($err_password)) {
						echo "<p id='error'>" . $err_password . "</p>";
					}
				?>
				<label for="c_senha_usuario">Confirmar senha</label>
				<input id="c_senha_usuario" type="c_senha_usuario" name="c_senha_usuario" autofocus="true" placeholder="Confirme sua senha">
				<?php
					if (!empty($err_c_password)) {
						echo "<p id='error'>" . $err_c_password . "</p>";
					}
				?>
<label for="nivel">Nível de acesso</label>
<select name="nivel" class="form-control" id="nivel">
    <option value="1">Administrador</option>
    <option value="2">Funcionário</option>
    <option value="3">Conferente</option>
</select>
				
				<input id="button" type="submit" value="Cadastrar" class="btn" id="enviar">
				
			</form>
		</div>
	</main>
</body>
</html>