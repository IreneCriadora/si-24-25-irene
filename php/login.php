<?php
include 'config.php';

if (isset($_SESSION['user'])) {
    header("Location: valida_session.php");
    exit();}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $login = $_POST['login'];
    $senha = hash("md5", $_POST['senha']); // Criptografando para comparar com a DB

    $sql = "SELECT * FROM utilizadores WHERE login = ? AND pass = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $login, $senha);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();
        $_SESSION['user'] = $user;
        header("Location: sistema_ocorrencias.php");
        exit();} else {$erro = "Login ou senha incorretos!";}} ?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background: url('img/escola.jpg') no-repeat center center/cover;
            color: #000000;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;}

        .overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.3);
            z-index: 0;}

        .login-container {
            background-color: #f4f4f4;
            padding: 20px;
            border-radius: 10px;
            text-align: center;
            width: 300px;}

        div, .login-container{
            position: relative;
            z-index: 1}

        input {
            width: 280px;
            padding: 10px;
            margin: 10px 0;
            border: none;
            border-radius: 5px;}

        button {
            width: 300px;
            padding: 10px;
            background: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;}

        button:hover {
            background: #007bff;
            text-shadow:0 3px 10px 0 #ccc;
            text-shadow:0px 0px 5px #fff;}

        .link {
            margin-top: 10px;
            display: block;
            color: white;
            text-decoration: none;}

        .link:hover {
            text-decoration: underline;}
    </style>
</head>
<body>
    <main>
        <div class="overlay"></div>

        <div class="login-container">
            <h2>Login</h2>
            <?php if (isset($erro)) echo "<p style='color:red;'>$erro</p>"; ?>
            <form method="POST">
                <label>Utilizadore:</label>
                <input type="text" name="login" required>
                <label>Senha:</label>
                <input type="password" name="senha" required>
                <button type="submit">Entrar</button>
            </form>
        </div>
    </main>
</body>
</html>