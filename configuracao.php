<!-- MESMA HORA TDS DIAS -->
<link rel="stylesheet" href="css/main.css">
<div class="container">
    <div class="btn-personalizar">
        <button type="button" style="cursor:pointer" id="corte1" onclick="horaIgual()">Corto no mesmo horario todos dias</button>
        <button type="button" style="cursor:pointer" id="corte2" onclick="horaPerso()">Quero horarios personalizados</button>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="horarios-container">
                <form action="" method="POST">
                    <input type="text" id="tipoAgenda" name="tipoAgenda" value="" style="display:none;">

                    <div class="row" id="horasIguais" style="display:none;">
                        <div class="col-6 hrcoluna">
                            <label for="hora1">Horário Início</label>
                            <input type="time" name="inicio">
                        </div>
                        <div class="col-6 hrcoluna">
                            <label for="hora2">Horário Término</label>
                            <input type="time" name="termino">
                        </div>
                    </div>

                    <div class="row">
                        <div class="alerta-minutos text-center">
                            <p>Por padrão, o intervalo entre os cortes serão de 30 minutos!</p>
                        </div>
                    </div>

                    <div class="row" id="diasIguais" style="display:none;">
                        <h3>Dias da semana</h3>
                        <div class="semanas">
                            <div class="dias">
                                <label for="check">Domingo</label>
                                <input type="checkbox" name="check">
                            </div>
                            <div class="dias">
                                <label for="check2">Segunda</label>
                                <input type="checkbox" name="check2">
                            </div>
                            <div class="dias">
                                <label for="check3">Terça</label>
                                <input type="checkbox" name="check3">
                            </div>
                            <div class="dias">
                                <label for="check4">Quarta</label>
                                <input type="checkbox" name="check4">
                            </div>
                            <div class="dias">
                                <label for="check5">Quinta</label>
                                <input type="checkbox" name="check5">
                            </div>
                            <div class="dias">
                                <label for="check6">Sexta</label>
                                <input type="checkbox" name="check6">
                            </div>
                            <div class="dias">
                                <label for="check7">Sabado</label>
                                <input type="checkbox" name="check7">
                            </div>

                        </div>
                    </div>
                    <!-- HORAS DIFERENTES -->
                    <div id="diasDif" style="display:none">
                        <div class="diaPesonalizado">
                            <label for="personalizado1">Segunda<input type="checkbox" name="seg" id="personalizado1"></label> <input type="time" step="1800" name="seginicio"> <input type="time" step="1800" name="segtermino">
                        </div>

                        <div class="diaPesonalizado">
                            <label for="personalizado2">Terça<input type="checkbox" name="ter" id="personalizado2"></label> <input type="time" step="1800" name="terinicio"> <input type="time" step="1800" name="tertermino">
                        </div>

                        <div class="diaPesonalizado">
                            <label for="personalizado3">Quarta<input type="checkbox" name="qua" id="personalizado3"></label><input type="time" step="1800" name="quainicio"> <input type="time" step="1800" name="quatermino">
                        </div>

                        <div class="diaPesonalizado">
                            <label for="personalizado4">Quinta<input type="checkbox" name="qui" id="personalizado4"></label> <input type="time" step="1800" name="quiinicio"> <input type="time" step="1800" name="quitermino">
                        </div>

                        <div class="diaPesonalizado">
                            <label for="personalizado5">Sexta<input type="checkbox" name="sex" id="personalizado5"></label><input type="time" step="1800" name="sexinicio"> <input type="time" step="1800" name="sextermino">
                        </div>

                        <div class="diaPesonalizado">
                            <label for="personalizado6">Sabado<input type="checkbox" name="sab" id="personalizado6"></label> <input type="time" step="1800" name="sabinicio"> <input type="time" step="1800" name="sabtermino">
                        </div>

                        <div class="diaPesonalizado">

                            <label for="personalizado7">Domingo<input type="checkbox" name="dom" id="personalizado7"></label> <input type="time" step="1800" name="dominicio"> <input type="time" step="1800" name="domtermino">
                        </div>
                    </div>

                    <div class="definir-horario" id="definirFuncionamento" style="display:none; margin: 0px 0px 40px 0px;">
                        <input type="submit" class="btn-horario" value="Definir horario de funcionamento" name="botaotime">
                    </div>


                </form>
            </div>
        </div>
    </div>
</div>




<?php

//getcookie
if (isset($_COOKIE["cabeleireiro"])) {
    $cookieEmail = $_COOKIE["cabeleireiro"];
} else {
    $cookieEmail = $_COOKIE["cliente"];
}
//idpessoa
$sql = "SELECT idPessoa FROM pessoa WHERE email='$cookieEmail'";
$result = $conn->query($sql);

if ($result) {
    while ($row = $result->fetch_assoc()) {
        $idPessoa = $row["idPessoa"];
    }
}
//idcabeleireiro
$sql = "SELECT idCabeleireiro FROM cabeleireiro WHERE Pessoa_idPessoa='$idPessoa'";
$result = $conn->query($sql);

if ($result) {
    while ($row = $result->fetch_assoc()) {
        $idCabeleireiro = $row["idCabeleireiro"];
    }
}
//idestabelecimento
$sql = "SELECT Estabelecimento_idEstabelecimento FROM cabeleireiro WHERE idCabeleireiro='$idCabeleireiro'";
$result = $conn->query($sql);

if ($result) {
    while ($row = $result->fetch_assoc()) {
        $idEstabelecimento = $row["Estabelecimento_idEstabelecimento"];
    }
}


if (@$_POST["botaotime"]) {
    $segunda = "SEGUNDA";
    $terca = "TERCA";
    $quarta = "QUARTA";
    $quinta = "QUINTA";
    $sexta = "SEXTA";
    $sabado = "SABADO";
    $domingo = "DOMINGO";

    if (@$_POST["tipoAgenda"] == 1) {
        $inicio = $_POST["inicio"];
        $termino = $_POST["termino"];

        if (@$_POST["check"]) {
            $sql = "INSERT INTO horariofuncionamento (horaInicio, horarioTermino, dia, Estabelecimento_idEstabelecimento) VALUES ('$inicio', '$termino', '$domingo', '$idEstabelecimento')";
            $result = $conn->query($sql);
        }
        if (@$_POST["check2"]) {
            $sql = "INSERT INTO horariofuncionamento (horaInicio, horarioTermino, dia, Estabelecimento_idEstabelecimento) VALUES ('$inicio', '$termino', '$segunda', '$idEstabelecimento')";
            $result = $conn->query($sql);
        }
        if (@$_POST["check3"]) {
            $sql = "INSERT INTO horariofuncionamento (horaInicio, horarioTermino, dia, Estabelecimento_idEstabelecimento) VALUES ('$inicio', '$termino', '$terca', '$idEstabelecimento')";
            $result = $conn->query($sql);
        }
        if (@$_POST["check4"]) {
            $sql = "INSERT INTO horariofuncionamento (horaInicio, horarioTermino, dia, Estabelecimento_idEstabelecimento) VALUES ('$inicio', '$termino', '$quarta', '$idEstabelecimento')";
            $result = $conn->query($sql);
        }
        if (@$_POST["check5"]) {
            $sql = "INSERT INTO horariofuncionamento (horaInicio, horarioTermino, dia, Estabelecimento_idEstabelecimento) VALUES ('$inicio', '$termino', '$quinta', '$idEstabelecimento')";
            $result = $conn->query($sql);
        }
        if (@$_POST["check6"]) {
            $sql = "INSERT INTO horariofuncionamento (horaInicio, horarioTermino, dia, Estabelecimento_idEstabelecimento) VALUES ('$inicio', '$termino', '$sexta', '$idEstabelecimento')";
            $result = $conn->query($sql);
        }
        if (@$_POST["check7"]) {
            $sql = "INSERT INTO horariofuncionamento (horaInicio, horarioTermino, dia, Estabelecimento_idEstabelecimento) VALUES ('$inicio', '$termino', '$sabado', '$idEstabelecimento')";
            $result = $conn->query($sql);
        }
    } else if ($_POST["tipoAgenda"] == 2) {
        $segInicio = $_POST["seginicio"];
        $segTermino = $_POST["segtermino"];

        $terInicio = $_POST["terinicio"];
        $terTermino = $_POST["tertermino"];

        $quaInicio = $_POST["quainicio"];
        $quaTermino = $_POST["quatermino"];

        $quiInicio = $_POST["quiinicio"];
        $quiTermino = $_POST["quitermino"];

        $sexInicio = $_POST["sexinicio"];
        $sexTermino = $_POST["sextermino"];

        $sabInicio = $_POST["sabinicio"];
        $sabTermino = $_POST["sabtermino"];

        $domInicio = $_POST["dominicio"];
        $domTermino = $_POST["domtermino"];

        if (@$_POST["seg"]) {
            $sql = "INSERT INTO horariofuncionamento (horaInicio, horarioTermino, dia, Estabelecimento_idEstabelecimento) VALUES ('$segInicio', '$segTermino', '$segunda', '$idEstabelecimento')";
            $result = $conn->query($sql);
        }
        if (@$_POST["ter"]) {
            $sql = "INSERT INTO horariofuncionamento (horaInicio, horarioTermino, dia, Estabelecimento_idEstabelecimento) VALUES ('$terInicio', '$terTermino', '$terca', '$idEstabelecimento')";
            $result = $conn->query($sql);
        }
        if (@$_POST["qua"]) {
            $sql = "INSERT INTO horariofuncionamento (horaInicio, horarioTermino, dia, Estabelecimento_idEstabelecimento) VALUES ('$quaInicio', '$quaTermino', '$quarta', '$idEstabelecimento')";
            $result = $conn->query($sql);
        }
        if (@$_POST["qui"]) {
            $sql = "INSERT INTO horariofuncionamento (horaInicio, horarioTermino, dia, Estabelecimento_idEstabelecimento) VALUES ('$quiInicio', '$quiTermino', '$quinta', '$idEstabelecimento')";
            $result = $conn->query($sql);
        }
        if (@$_POST["sex"]) {
            $sql = "INSERT INTO horariofuncionamento (horaInicio, horarioTermino, dia, Estabelecimento_idEstabelecimento) VALUES ('$sexInicio', '$sexTermino', '$sexta', '$idEstabelecimento')";
            $result = $conn->query($sql);
        }
        if (@$_POST["sab"]) {
            $sql = "INSERT INTO horariofuncionamento (horaInicio, horarioTermino, dia, Estabelecimento_idEstabelecimento) VALUES ('$sabInicio', '$sabTermino', '$sabado', '$idEstabelecimento')";
            $result = $conn->query($sql);
        }
        if (@$_POST["dom"]) {
            $sql = "INSERT INTO horariofuncionamento (horaInicio, horarioTermino, dia, Estabelecimento_idEstabelecimento) VALUES ('$domInicio', '$domTermino', '$domingo', '$idEstabelecimento')";
            $result = $conn->query($sql);
        }
    }
}
?>