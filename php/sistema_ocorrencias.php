<?php
include 'config.php';

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sistema_ocorrencias";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {die("Erro na conexão: " . $conn->connect_error);}

$sql_usuarios = "SELECT * FROM utilizadores";
$result_usuarios = $conn->query($sql_usuarios);

$sql_ocorrencias = "SELECT * FROM ocorrencias";
$result_ocorrencias = $conn->query($sql_ocorrencias); ?>

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
    
    <main>
        <section>
            <h2>Utilizadores</h2>
            <table>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Login</th>
                    <th>Status</th>
                    <th>Nível</th>
                    <th>Ação</th>
                </tr>
                <?php while ($row = $result_usuarios->fetch_assoc()): ?>
                <tr>
                    <td><?= $row['id'] ?></td>
                    <td><?= $row['nome'] ?></td>
                    <td><?= $row['login'] ?></td>
                    <td><?= $row['status'] ?></td>
                    <td><?= $row['nivel'] ?></td>
                    <td><button>Editar</button></td>
                </tr>
                <?php endwhile; ?>
            </table>
        </section>
    </main>
</body>
</html>
<?php $conn->close();?>