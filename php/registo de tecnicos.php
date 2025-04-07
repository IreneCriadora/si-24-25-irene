<?php
session_start();
require 'conexao.php';
require 'valida_session.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = htmlspecialchars($_POST['nome']);
    $login = htmlspecialchars($_POST['login']);
    $password = md5($_POST['password']); // Em projetos reais, utilizar
    password_hash
    $stmt = $pdo->prepare("
    INSERT INTO utilizadores (nome, login, pass, status, nivel)
    VALUES (?, ?, ?, 'ativo', 'tecnico')
    ");
    $stmt->execute([$nome, $login, $password]);
    $success = "Técnico registado com sucesso!";
    }
    ?>
    <!DOCTYPE html>
    <html lang="pt-PT">
    <head>
    <title>Registar Técnico</title>
    </head>
    <body>
    <h1>Registar Técnico</h1>
    <form method="POST" action="">
    <label for="nome">Nome:</label>
    <input type="text" id="nome" name="nome" required>
    <label for="login">Login:</label>
    <input type="text" id="login" name="login" required>
    <label for="password">Palavra-passe:</label>
    <input type="password" id="password" name="password" required>
    <button type="submit">Submeter</button>
    </form>
    <?php if (isset($success)) echo "<p>$success</p>"; ?>
    </body>
    </html>