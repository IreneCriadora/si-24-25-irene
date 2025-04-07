<?php
include 'config.php';

// Adicionar localização
if (isset($_POST['add_localizacao'])) {
    $equipamento = $_POST['equipamento'];
    $sala = $_POST['sala'];
    $data_inicio = $_POST['data_inicio'];
    $data_fim = $_POST['data_fim'];
    $estado = $_POST['estado'];

    $sql = "INSERT INTO equipamentos_localizacao (Cod_Equipamento, Cod_Sala, Data_Inicio, Data_Fim, Estado_localizacao) 
            VALUES ('$equipamento', '$sala', '$data_inicio', '$data_fim', '$estado')";
    $conn->query($sql);
}

// Listar localizações
$result = $conn->query("SELECT * FROM equipamentos_localizacao");

// Editar localização
if (isset($_POST['edit_localizacao'])) {
    $equipamento = $_POST['equipamento'];
    $sala = $_POST['sala'];
    $data_inicio = $_POST['data_inicio'];
    $data_fim = $_POST['data_fim'];
    $estado = $_POST['estado'];

    $sql = "UPDATE equipamentos_localizacao SET Data_Inicio='$data_inicio', Data_Fim='$data_fim', Estado_localizacao='$estado' 
            WHERE Cod_Equipamento=$equipamento AND Cod_Sala=$sala";
    $conn->query($sql);
}

// Excluir localização
if (isset($_GET['delete'])) {
    $equipamento = $_GET['equipamento'];
    $sala = $_GET['sala'];
    $conn->query("DELETE FROM equipamentos_localizacao WHERE Cod_Equipamento=$equipamento AND Cod_Sala=$sala");
}

$conn->close();
?>
