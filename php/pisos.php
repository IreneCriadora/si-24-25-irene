<?php
include 'config.php';

// Criar piso
if (isset($_POST['add_piso'])) {
    $descricao = $_POST['descricao'];
    $estado = $_POST['estado'];

    $sql = "INSERT INTO pisos (Descricao_piso, Estado) VALUES ('$descricao', '$estado')";
    $conn->query($sql);
}

// Listar pisos
$result = $conn->query("SELECT * FROM pisos");

// Editar piso
if (isset($_POST['edit_piso'])) {
    $id = $_POST['id'];
    $descricao = $_POST['descricao'];
    $estado = $_POST['estado'];

    $sql = "UPDATE pisos SET Descricao_piso='$descricao', Estado='$estado' WHERE Cod_piso=$id";
    $conn->query($sql);
}

// Excluir piso
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $conn->query("DELETE FROM pisos WHERE Cod_piso=$id");
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciar Pisos</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <div class="logo">
            <img src="img/logo.png" alt="Logo">
        </div>

        <h1>Sistema Portal de Ocorrências</h1>
        <button><a style="color: white; text-decoration: none" href="logout.php">Logout</a></button>
    </header>>

    <nav>
        <ul>
            <button><a style="color: white; text-decoration: none" href="sistema_ocorrencias.php">Gestão de Utilizadores</a></button>
            <button><a style="color: white; text-decoration: none" href="ocorrencias.php">Gestão de Ocorrências</a></button> 
            <button><a style="color: white; text-decoration: none" href="blocos.php">Gestão de Blocos</a></button>
            <button><a style="color: white; text-decoration: none" href="equipamentos.php">Gestão de Equipamentos</a></button>
            <button><a style="color: white; text-decoration: none" href="pisos.php">Gestão de Pisos</a></button>
            <button><a style="color: white; text-decoration: none" href="salas.php">Gestão de Salas</a></button>
        </ul>
    </nav>

    <section>
    <h2>Pisos</h2>

    <section>
    <form action="pisos.php" method="post">
        <input type="text" name="descricao" placeholder="Descrição do Piso" required>
        <select name="estado">
            <option value="ativo">Ativo</option>
            <option value="inativo">Inativo</option>
        </select>
        <button type="submit" name="add_piso">Adicionar</button>
    </form>
    </section>

    <table border="1">
        <tr>
            <th>ID</th>
            <th>Descrição</th>
            <th>Estado</th>
            <th>Ações</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>{$row['Cod_piso']}</td>
                    <td>{$row['Descricao_piso']}</td>
                    <td>{$row['Estado']}</td>
                    <td>
                        <button><a style='color: white; text-decoration: none'  href='editar_piso.php?id={$row['Cod_piso']}'>Editar</a></button> 
                        <button><a style='color: white; text-decoration: none' href='pisos.php?delete={$row['Cod_piso']}' onclick='return confirm(\"Tem certeza?\")'>Excluir</a></button>
                    </td>
                  </tr>";}?>
    </table>
    </section>
</body>
</html>
