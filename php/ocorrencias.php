<?php
include 'config.php';

$result = $conn->query("SELECT * FROM blocos");?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema Portal de Ocorrências</title>
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
        <h2>Ocorrências</h2>

        <table border="1">
            <tr>
                <th>ID</th>
                <th>Problema</th>
                <th>Estado</th>
                <th>Técnico</th>
                <th>Ação</th>
            </tr>
        <?php
        $result = $conn->query("SELECT * FROM ocorrencias");
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>{$row['id_ocorrencia']}</td>
                    <td>{$row['prob_encontrado']}</td>
                    <td>{$row['estado']}</td>
                    <td>" . ($row['tecnico'] ?? 'Não atribuído') . "</td>
                    <td><button><a style='color: white; text-decoration: none'>Detalhes</button></a></td>
                  </tr>";}?>
        </table>
    </section>
</body>
</html>
<?php $conn->close();?>