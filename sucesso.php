<?php
session_start();
$nome = $_SESSION['nome'] ?? "Usuário";
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <title>Cadastro Realizado</title>
  <link rel="stylesheet" href="css/styles4.css" />
  <link rel="shortcut icon" href="img/iconsite.png" type="image/x-icon" />
  <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
  <style>
    body {
      background: url('img/loginfundo.jpeg');
      background-size: cover;
      background-position: center;
      color: #fff;
      text-align: center;
      padding-top: 10vh;
      font-family: Arial, sans-serif;
    }

    .sucesso {
      background: rgba(0,0,0,0.7);
      display: inline-block;
      padding: 40px;
      border-radius: 12px;
      animation: pop 0.4s ease;
      box-shadow: 0 0 15px rgba(0,0,0,0.4);
    }

    .sucesso i {
      font-size: 50px;
      color: #00d455;
      margin-bottom: 15px;
    }

    .sucesso a {
      margin-top: 20px;
      display: inline-block;
      color: #00ff88;
      border: 1px solid #00ff88;
      padding: 10px 20px;
      text-decoration: none;
      font-weight: bold;
      border-radius: 8px;
      transition: all 0.3s ease;
    }

    .sucesso a:hover {
      background: #00ff88;
      color: #000;
    }

    @keyframes pop {
      0% { transform: scale(0.5); opacity: 0; }
      100% { transform: scale(1); opacity: 1; }
    }
  </style>
</head>
<body>
  <div class="sucesso">
    <i class='bx bxs-user-check'></i>
    <h2>Cadastro realizado com sucesso!</h2>
    <p>Seja bem-vindo, <strong><?php echo htmlspecialchars($nome); ?></strong>.</p>
    <p>Você já pode acessar sua conta.</p>
    <a href="login.html"><i class='bx bx-log-in'></i> Fazer Login</a>
  </div>
</body>
</html>
