<?php
session_start();
require 'conexao.php';
require 'valida_session.php';
// Verificar se o utilizador é técnico
if ($_SESSION['user']['nivel'] !== 'tecnico') {
    header("Location: login.php");
    exit;
    }
    // Obter ocorrências atribuídas ao técnico
    $stmt = $pdo->prepare("
    SELECT * FROM registros WHERE tecnico = ?
    ");
    $stmt->execute([$_SESSION['user']['nome']]);
    $ocorrencias = $stmt->fetchAll();
    ?>
    <!DOCTYPE html>
    <html lang="pt-PT">
    <head>
    <title>Dashboard Técnico</title>
    </head>
    <body>
    <h1>Ocorrências Atribuídas</h1>
    <table border="1">
    <thead>
    <tr>
    <th>ID</th>
    <th>Andar</th>
    <th>Setor</th>
    <th>Problema</th>
    <th>Estado</th>
    <th>Ação</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($ocorrencias as $ocorrencia): ?>
    <tr>
    <td><?= $ocorrencia['id'] ?></td>
    <td><?= $ocorrencia['andar'] ?></td>
    <td><?= $ocorrencia['setor'] ?></td>
    <td><?= $ocorrencia['prob_utilizador'] ?></td>
    <td><?= $ocorrencia['estado'] ?></td>
    <td>
    <a href="atualizar_ocorrencia.php?id=<?= $ocorrencia['id']
    ?>">Atualizar</a>
    </td>
</tr>
<?php endforeach; ?>
</tbody>
</table>
</body>
</html>