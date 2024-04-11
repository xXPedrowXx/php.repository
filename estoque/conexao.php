<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "seu_banco_de_dados";

// Cria a conexão
$conn = new mysqli($servername, $username, $password, $database);

// Verifica a conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}
?>