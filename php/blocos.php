<?php
include 'config.php';

$result = $conn->query("SELECT * FROM blocos");?>

<!DOCTYPE html>
<html>
<head>
    <title>Gestão de Blocos</title>
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
    <h2>Blocos</h2>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Descrição</th>
            <th>Estado</th>
            <th>Ações</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()) { ?>
            <tr>
                <td><?= $row['cod_bloco'] ?></td>
                <td><?= $row['descricao_bloco'] ?></td>
                <td><?= $row['estado'] == 1 ? 'Ativo' : 'Inativo' ?></td>
                <td>
                    <button><a style="color: white; text-decoration: none" href="edit_blocos.php?id=<?= $row['cod_bloco'] ?>">Editar</a></button>
                    <button><a style="color: white; text-decoration: none" href="excluir_bloco.php?id=<?= $row['cod_bloco'] ?>" onclick="return confirm('Tem certeza?')">Excluir</a></button>
                </td>
            </tr><?php } ?>
    </table>
    </section>
</body>
</html>
<?php $conn->close();?>
