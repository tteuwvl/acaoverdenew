<?php
echo "<pre>";
print_r($_POST);
echo "</pre>";

session_start();

// Coleta os dados do formulário
$usuario = trim($_POST['username']);
$senha = trim($_POST['password']);

// Conecta ao banco de dados
$conn = new mysqli("localhost", "root", "", "usuarios");

if ($conn->connect_error) {
    die("Erro na conexão: " . $conn->connect_error);
}

// Busca o usuário pelo e-mail
$sql = "SELECT * FROM cadastros WHERE email = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $usuario);
$stmt->execute();
$result = $stmt->get_result();

// Verifica se encontrou o usuário
if ($result->num_rows === 1) {
    $row = $result->fetch_assoc();

    // Verifica a senha (em texto plano – apenas para testes!)
    if (password_verify($senha, $row['senha'])) {
        $_SESSION['usuario'] = $row['nome'];
        header("Location: eventos.php");
        exit();
    } else {
        echo "❌ Senha incorreta!<br>";
        echo "Senha digitada: " . htmlspecialchars($senha) . "<br>";
        echo "Senha no banco: " . htmlspecialchars($row['senha']);
    }
} else {
    echo "❌ Usuário não encontrado.<br>";
    echo "Você digitou: " . htmlspecialchars($usuario);
}

$stmt->close();
$conn->close();
?>
