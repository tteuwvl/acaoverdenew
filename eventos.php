<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: login.html");
    exit();
}

$usuario = $_SESSION['usuario'];
$conn = new mysqli("localhost", "root", "", "eventos_db");
$conn->set_charset("utf8");

$sql = "SELECT * FROM eventos WHERE usuario = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $usuario);
$stmt->execute();
$result = $stmt->get_result();
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <title>Eventos</title>
  <link rel="stylesheet" href="css/styles3.css">
  <link rel="shortcut icon" href="img/iconsite.png">
  <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
</head>
<body>

  <button class="menu-button" onclick="toggleMenu()">☰ Menu</button>
  <div class="sidebar" id="sidebar">
    <button class="close-menu" onclick="toggleMenu()">✖</button>
    <h2 style="color: #28a745;">Menu</h2>
    <ul>
      <li><a href="eventos.php"><i class='bx bxs-calendar-event'></i> Meus Eventos</a></li>
      <li><a href="cadastrar_evento.php"><i class='bx bxs-plus-square'></i> Cadastrar Novo Evento</a></li>
      <li><a href="painel_inscricoes.php"><i class='bx bxs-user-detail'></i> Inscrições de Participantes</a></li>
      <li><a href="logout.php" onclick="return confirm('Tem certeza de que deseja sair?')"><i class='bx bx-log-out'></i> Sair</a></li>
    </ul>
  </div>

  <div class="content">
    <div class="profile">
      <p><strong>👤 Usuário:</strong> <span style="color:#ffffff;"><?php echo htmlspecialchars($usuario); ?></span></p>
    </div>

    <h1 style="color: #28a745;">Bem-vindo ao Gerenciador de Eventos</h1>

    <h2 style="color: #28a745;"><i class='bx bxs-calendar-check'></i> Seus Eventos Cadastrados</h2>

    <table border="1" cellpadding="10">
      <tr>
        <th>Nome</th>
        <th>Data</th>
        <th>Descrição</th>
        <th>Foto</th>
        <th>Ações</th>
      </tr>
      <?php while ($evento = $result->fetch_assoc()): ?>
      <tr>
        <td><?php echo htmlspecialchars($evento['nome']); ?></td>
        <td><?php echo $evento['data']; ?></td>
        <td><?php echo htmlspecialchars($evento['descricao']); ?></td>
        <td>
          <?php if (!empty($evento['foto'])): ?>
            <img src="<?php echo $evento['foto']; ?>" width="100">
          <?php endif; ?>
        </td>
        <td>
          <a href="visualizar_evento.php?id=<?php echo $evento['id']; ?>">Visualizar</a> |
          <a href="editar_evento.php?id=<?php echo $evento['id']; ?>">Editar</a>
          <form method="POST" action="deletar_evento.php" style="display:inline;" onsubmit="return confirm('Excluir este evento?');">
            <input type="hidden" name="id" value="<?php echo $evento['id']; ?>">
            <button type="submit">Excluir</button>
          </form>
        </td>
      </tr>
      <?php endwhile; ?>
    </table>
  </div>

  <script>
    function toggleMenu() {
      const sidebar = document.getElementById("sidebar");
      sidebar.style.left = sidebar.style.left === "0px" ? "-300px" : "0px";
    }
  </script>

</body>
</html>
