<?php
$evento_id = $_GET['evento_id'] ?? null;
if (!$evento_id) {
  echo "<p>Evento inválido. <a href='index.php'>Voltar</a></p>";
  exit();
}
?>

<!DOCTYPE html>
<html lang="pt">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Inscrição no Evento</title>

  <!-- Estilos -->
  <link rel="stylesheet" href="css/styles2.css" />
  <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />

  <!-- Ícone da página -->
  <link rel="shortcut icon" href="img/iconsite.png" type="image/x-icon" />
</head>
<body style="background: url('img/loginfundo.jpeg'); background-size: cover; background-position: center;">
  <main>
    <div class="container">
      <div class="login-header">
        <img src="img/iconpagina.png" alt="Logo" class="logo" />
        <h2>Inscrição</h2>
      </div>

      <form method="POST" action="processar_inscricao.php">
        <input type="hidden" name="evento_id" value="<?php echo $evento_id; ?>">

        <div class="input-box">
          <input type="text" name="nome" placeholder="Seu nome completo" required />
          <i class="bx bxs-user"></i>
        </div>

        <div class="input-box">
          <input type="email" name="email" placeholder="Seu e-mail" required />
          <i class="bx bxs-envelope"></i>
        </div>

        <button type="submit" class="login">Confirmar Inscrição</button>
      </form>
    </div>
  </main>
</body>
</html>
