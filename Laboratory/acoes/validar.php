<?php
  session_start();

  if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: dashboard.php");
    exit;
}
  require_once '../acoes/conexao.php';
?>

<?php
$servername = "127.0.0.1";
$username = "root";
$password = "";
$database = "reserva"; 

// Criar uma conexão com o banco de dados
@$conn = new mysqli($servername, $username, $password, $database);
 

// Verificar se houve algum erro na conexão
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}


// Coletar as informações de login do usuário
$email = $_POST['email'];
$senha = $_POST['senha'];

 

// Preparar uma consulta para verificar o login
$stmt = $conn->prepare("SELECT * FROM professor WHERE email = ? AND senha = ?");
$stmt->bind_param("ss", $email, $senha);
$stmt->execute();
$result = $stmt->get_result();

 

// Verificar o resultado da consulta
if ($result->num_rows === 1) {
    // Login válido, permitir o acesso ao sistema
    echo "Login válido. Acesso permitido.";
} else {
    // Login inválido, negar o acesso
    echo "Login inválido. Acesso negado.";
}

 

// Fechar a conexão com o banco de dados
$stmt->close();
$conn->close();
?>

