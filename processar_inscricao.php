<?php
$evento_id = $_POST['evento_id'];
$nome = $_POST['nome'];
$email = $_POST['email'];

$conn = new mysqli("localhost", "root", "", "eventos_db");
$conn->set_charset("utf8");

$stmt = $conn->prepare("INSERT INTO inscricoes (evento_id, nome, email) VALUES (?, ?, ?)");
$stmt->bind_param("iss", $evento_id, $nome, $email);
$stmt->execute();

// Inclui a confirmação estilizada
?>

<!DOCTYPE html>
<html lang="pt">
<head>
  <meta charset="UTF-8">
  <title>Inscrição Confirmada</title>
  <link rel="stylesheet" href="css/styles2.css" />
  <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
  <style>
    body {
      background: url('img/loginfundo.jpeg');
      background-size: cover;
      background-position: center;
      font-family: Arial, sans-serif;
      color: #fff;
      text-align: center;
      padding-top: 10vh;
    }

    .sucesso {
      background: rgba(0, 0, 0, 0.7);
      display: inline-block;
      padding: 40px;
      border-radius: 12px;
      animation: pop 0.5s ease;
      box-shadow: 0 0 15px rgba(0,0,0,0.4);
    }

    .sucesso i {
      font-size: 50px;
      color: #00d455;
      margin-bottom: 10px;
    }

    @keyframes pop {
      0% { transform: scale(0.5); opacity: 0; }
      100% { transform: scale(1); opacity: 1; }
    }

    .sucesso a {
      display: inline-block;
      margin-top: 20px;
      color: #00ff88;
      text-decoration: none;
      font-weight: bold;
      border: 1px solid #00ff88;
      padding: 8px 16px;
      border-radius: 8px;
      transition: all 0.3s ease;
    }

    .sucesso a:hover {
      background: #00ff88;
      color: #000;
    }
  </style>
</head>
<body>
  <div class="sucesso">
    <i class="bx bxs-check-circle"></i>
    <h2>Inscrição Confirmada!</h2>
    <p>Olá <strong><?php echo htmlspecialchars($nome); ?></strong>, você foi inscrito com sucesso no evento.</p>
    <p>Um e-mail de confirmação foi enviado para <strong><?php echo htmlspecialchars($email); ?></strong>.</p>
    <a href="index.php">Voltar para a página inicial</a>
  </div>
</body>
</html>
