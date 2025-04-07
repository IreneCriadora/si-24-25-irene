<?php
include 'config.php';

$result = $conn->query("SELECT * FROM equipamentos");?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestão de Equipamentos</title>
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
    <h2>Equipamentos</h2>

    <section>
    <form action="equipamentos.php" method="post">
        <input type="text" name="descricao" placeholder="Descrição do Equipamento" required>
        <input type="text" name="obs" placeholder="Observação">
        <select name="estado">
            <option value="ativo">Ativo</option>
            <option value="inativo">Inativo</option>
        </select>
        <button type="submit" name="add_equipamento">Adicionar</button>
    </form>
    </section>

    <table border="1">
        <tr>
            <th>ID</th>
            <th>Descrição</th>
            <th>Observação</th>
            <th>Estado</th>
            <th>Ações</th>
        </tr>
        <?php
        $result = $conn->query("SELECT * FROM equipamentos");
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>{$row['Cod_Equipamento']}</td>
                    <td>{$row['Descricao_Equipamento']}</td>
                    <td>{$row['Obs_Equipamento']}</td>
                    <td>{$row['Estado_Equipamento']}</td>
                    <td>
                        <button><a style='color: white; text-decoration: none' href='editar_equipamento.php?id={$row['Cod_Equipamento']}'>Editar</a></button> 
                        <button><a style='color: white; text-decoration: none' href='equipamentos.php?delete={$row['Cod_Equipamento']}' onclick='return confirm(\"Tem certeza?\")'>Excluir</a><button>
                    </td>
                  </tr>";}?>
    </table>
    </section>

    <section>
    <h2>Localização de Equipamentos</h2>

    <table border="1">
        <tr>
            <th>ID</th>
            <th>ID do Equipamento</th>
            <th>ID da Sala</th>
            <th>Ações</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()) { ?>
        <tr>
            <td><?= $row['id'] ?></td>
            <td><?= $row['equipamento_id'] ?></td>
            <td><?= $row['sala_id'] ?></td>
            <td>
                <button><a style="color: white; text-decoration: none" href="edit.php?id=<?= $row['id'] ?>">Editar</a></button>
                <button><a style="color: white; text-decoration: none" href="delete.php?id=<?= $row['id'] ?>" onclick="return confirm('Tem certeza?')">Excluir</a></button>
            </td>
        </tr><?php } ?>
    </table>
    </section>
</body>
</html>
<?php $conn->close(); ?>
