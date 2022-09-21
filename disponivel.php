<?php
$sql = "SELECT horaInicio, horarioTermino FROM horariofuncionamento";
$result = $conn->query($sql);

//get intervalo
if ($result){
    while($row = $result->fetch_assoc()){
        $horaInicio = $row["horaInicio"];
        $horaTermino = $row["horarioTermino"];
    }
}

$hora = date('H', strtotime($horaInicio));
echo $hour;
?>