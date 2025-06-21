<?php
session_start();
$conn = new mysqli("localhost", "root", "", "eventos_db");
$conn->set_charset("utf8");

$sql = "SELECT i.id, i.nome, i.email, e.nome AS evento
        FROM inscricoes i
        JOIN eventos e ON i.evento_id = e.id
        ORDER BY i.data_inscricao DESC";

$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <title>Inscrições Confirmadas</title>
  <link rel="stylesheet" href="css/styles3.css">
  <link rel="shortcut icon" href="img/iconsite.png" type="image/x-icon" />
</head>
<body>
  <h1>📋 Lista de Inscrições</h1>
  <table border="1" cellpadding="10">
   <tr>
  <th>ID</th>
  <th>Nome</th>
  <th>E-mail</th>
  <th>Evento</th>
</tr>
<?php while($row = $result->fetch_assoc()): ?>
  <tr>
    <td><?php echo $row['id']; ?></td>
    <td><?php echo htmlspecialchars($row['nome']); ?></td>
    <td><?php echo htmlspecialchars($row['email']); ?></td>
    <td><?php echo htmlspecialchars($row['evento']); ?></td>
  </tr>
<?php endwhile; ?>
  </table>
  <p><a href="eventos.php">⬅ Voltar</a></p>
</body>
</html>
