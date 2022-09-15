<?php
function Conectar()
{
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "nextcut";

    // cria a conexão
    $conn = new mysqli($servername, $username, $password, $dbname);
    // checa a conexão
    if ($conn->connect_error) {
    die("Falha ao conectar ao banco de dados: " . $conn->connect_error);
    }
    return $conn;
}

$pdo = new PDO('mysql:host=localhost;dbname=nextcut', 'root', '');
?>