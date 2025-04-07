<?php
include 'config.php';

// Criar sala
if (isset($_POST['add_sala'])) {
    $nome = $_POST['nome'];
    $bloco = $_POST['bloco'];
    $piso = $_POST['piso'];
    $obs = $_POST['obs'];
    $estado = $_POST['estado'];

    $sql = "INSERT INTO salas (Nome_sala, Bloco_sala, Piso_sala, Observações, Estado) 
            VALUES ('$nome', '$bloco', '$piso', '$obs', '$estado')";
    $conn->query($sql);
}

// Listar salas
$result = $conn->query("SELECT * FROM salas");

// Editar sala
if (isset($_POST['edit_sala'])) {
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $bloco = $_POST['bloco'];
    $piso = $_POST['piso'];
    $obs = $_POST['obs'];
    $estado = $_POST['estado'];

    $sql = "UPDATE salas SET Nome_sala='$nome', Bloco_sala='$bloco', Piso_sala='$piso', Observações='$obs', Estado='$estado' 
            WHERE cod_sala=$id";
    $conn->query($sql);
}

// Excluir sala
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $conn->query("DELETE FROM salas WHERE cod_sala=$id");
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestão de Salas</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <div class="logo">
            <img src="img/logo.png" alt="Logo">
        </div>

        <h1>Sistema Portal de Ocorrências</h1>
        <button><a style="color: white; text-decoration: none" href="logout.php">Logout</a></button>
    </header>

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
    <h2>Salas</h2>

    <section>
    <form action="salas.php" method="post">
        <input type="text" name="nome" placeholder="Nome da Sala" required>
        <input type="text" name="bloco" placeholder="Bloco">
        <input type="text" name="piso" placeholder="Piso">
        <input type="text" name="obs" placeholder="Observações">
        <select name="estado">
            <option value="ativo">Ativo</option>
            <option value="inativo">Inativo</option>
        </select>
        <button type="submit" name="add_sala">Adicionar</button>
    </form>
    </section>

    <h2>Lista de Salas</h2>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Bloco</th>
            <th>Piso</th>
            <th>Observações</th>
            <th>Estado</th>
            <th>Ações</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>{$row['cod_sala']}</td>
                    <td>{$row['Nome_sala']}</td>
                    <td>{$row['Bloco_sala']}</td>
                    <td>{$row['Piso_sala']}</td>
                    <td>{$row['Observações']}</td>
                    <td>{$row['Estado']}</td>
                    <td>
                        <button><a style='color: white; text-decoration: none' href='editar_sala.php?id={$row['cod_sala']}'>Editar</a></button> 
                        <button><a style='color: white; text-decoration: none' href='salas.php?delete={$row['cod_sala']}' onclick='return confirm(\"Tem certeza?\")'>Excluir</a></button>
                    </td>
                  </tr>";
        }
        ?>
    </table>
    </section>
</body>
</html>

