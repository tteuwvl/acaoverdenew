<?php
session_start();

$erro = "";
$nome = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $nome = $_POST['fullname'];
  $email = $_POST['email'];
  $senha_plana = $_POST['password'];

  // Validação da senha
  if (!preg_match('/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}$/', $senha_plana)) {
    $erro = "A senha deve conter no mínimo 8 caracteres, incluindo uma letra maiúscula, uma minúscula e um número.";
  } else {
    $senha = password_hash($senha_plana, PASSWORD_DEFAULT);

    $conn = new mysqli("localhost", "root", "", "usuarios");
    $conn->set_charset("utf8");

    $stmt = $conn->prepare("INSERT INTO cadastros (nome, email, senha) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $nome, $email, $senha);
    $stmt->execute();

    // Salva o nome na sessão e redireciona
    $_SESSION['nome'] = $nome;
    header("Location: sucesso.php");
    exit();
  }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <title>Cadastro</title>
  <link rel="stylesheet" href="css/styles4.css" />
  <link rel="shortcut icon" href="img/iconsite.png" type="image/x-icon" />
  <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
</head>
<body style="background: url('img/loginfundo.jpeg'); background-size: cover; background-position: center;">
  <main>
    <div class="container">
      <div class="login-header">
        <img src="img/iconpagina.png" alt="Logo" class="logo" />
        <h2>Cadastro</h2>
      </div>

      <?php if (!empty($erro)): ?>
        <div style="color: #ff6666; font-weight: bold; margin-bottom: 20px;">
          <?php echo htmlspecialchars($erro); ?>
        </div>
      <?php endif; ?>

      <form method="POST" action="cadastro.php">
        <div class="input-box">
          <input type="text" name="fullname" placeholder="Nome Completo" required maxlength="50" value="<?php echo htmlspecialchars($nome); ?>" />
          <i class="bx bxs-user"></i>
        </div>

        <div class="input-box">
          <input type="email" name="email" placeholder="Email" required />
          <i class="bx bxs-envelope"></i>
        </div>

        <div class="input-box">
          <input type="password" name="password" placeholder="Senha" required maxlength="20" />
          <i class="bx bxs-lock-alt"></i>
        </div>

        <div class="notification-box">
          <input type="checkbox" name="notifications" id="notifications" />
          <label for="notifications">Deseja receber notificações?</label>
        </div>

        <button type="submit" class="login">Cadastrar-se</button>
      </form>

      <div class="cadastra-se">
        <a href="login.html">Já tem conta? Faça login</a>
      </div>
    </div>
  </main>
</body>
</html>
