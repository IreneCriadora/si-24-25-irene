<?php
require_once "config.php";

$id = $_GET['id'];
$sql = "SELECT * FROM blocos WHERE id = :id";
$stmt = $pdo->prepare($sql);
$stmt->execute(['id' => $id]);
$bloco = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$bloco) {
    die("Bloco não encontrado!");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'];

    $sql = "UPDATE blocos SET nome = :nome WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['nome' => $nome, 'id' => $id]);

    header("Location: blocos.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <title>Editar Bloco</title>
</head>
<body>
    <h2>Editar Bloco</h2>
    <form action="" method="POST">
        <label>Nome do Bloco:</label>
        <input type="text" name="nome" value="<?= htmlspecialchars($bloco['nome']) ?>" required><br>
        <button type="submit">Salvar Alterações</button>
    </form>
</body>
</html>
