<!-- cadastrar_evento.php -->
<?php
session_start();
if (!isset($_SESSION['usuario'])) {
  header("Location: login.html");
  exit();
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8" />
  <title>Novo Evento</title>
  <link rel="stylesheet" href="css/styles3.css" />
  <link rel="shortcut icon" href="img/iconsite.png" type="image/x-icon" />
</head>
<body>
  <h2>🆕 Cadastrar Novo Evento</h2>
  <form id="eventForm" action="salvar_evento.php" method="POST" enctype="multipart/form-data">
    <label for="nome">Nome do Evento:</label>
    <input type="text" id="nome" name="nome" required><br><br>

    <label for="data">Data:</label>
    <input type="date" id="data" name="data" required><br><br>

    <label for="descricao">Descrição:</label>
    <textarea id="descricao" name="descricao"></textarea><br><br>

    <label for="foto">Anexar Foto:</label>
    <input type="file" id="foto" name="foto"><br><br>

    <button type="submit">Cadastrar</button>
    <a href="eventos.php" class="login" style="text-align: center; display: inline-block;">⬅ Voltar</a>



  </form>
</body>
</html>
