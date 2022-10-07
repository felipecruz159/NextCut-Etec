<?php
date_default_timezone_set('America/Sao_Paulo');
if (isset($_COOKIE["cliente"])) {
    $cookieEmail = $_COOKIE["cliente"];
} else if (isset($_COOKIE["cabeleireiro"])) {
    $cookieEmail = $_COOKIE["cabeleireiro"];
} else {
    echo '<span style="color:#ff6600;">Login inválido</span>';
}
$sql = "SELECT nome, idPessoa, Endereco_idEndereco FROM pessoa WHERE email='$cookieEmail'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $idPessoa = $row['idPessoa'];
    }
}

$idCab = @$_GET["id"];
$sql = "SELECT * FROM cabeleireiro c
INNER JOIN estabelecimento e on c.Estabelecimento_idEstabelecimento = e.idEstabelecimento
INNER JOIN pessoa p on c.Pessoa_idPessoa = p.idPessoa
INNER JOIN endereco l on e.Endereco_idEndereco = l.idEndereco
WHERE idPessoa = '$idCab'";
$result = $conn->query($sql);


if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $idEstabelecimento = $row["idEstabelecimento"];
    }
}

@$data = $_GET["data"];
$dayofweek = date('w', strtotime($data));

switch ($dayofweek) {
    case 0:
        $diaSemana = 'DOMINGO';
        break;
    case 1:
        $diaSemana = 'SEGUNDA';
        break;
    case 2:
        $diaSemana = 'TERCA';
        break;
    case 3:
        $diaSemana = 'QUARTA';
        break;
    case 4:
        $diaSemana = 'QUINTA';
        break;
    case 5:
        $diaSemana = 'SEXTA';
        break;
    case 6:
        $diaSemana = 'SABADO';
        break;
    default:
}

if ($diaSemana) {
    $sql = "SELECT horaInicio, horarioTermino FROM horariofuncionamento WHERE dia='$diaSemana' && Estabelecimento_idEstabelecimento='$idEstabelecimento'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $fullHoraInicio = $row["horaInicio"];
            $fullHoraTermino = $row["horarioTermino"];
        }
    }
}

if (isset($fullHoraInicio) && isset($fullHoraTermino)) {
    //horas e minutos inicio cada dia
    $horaInicio = strtok($fullHoraInicio, ":");
    $minutosInicio = explode(":", $fullHoraInicio);
    $minutosInicio = $minutosInicio[1];

    //horas e minutos termino cada dia
    $horaTermino = strtok($fullHoraTermino, ":");
    $minutosTermino = explode(":", $fullHoraTermino);
    $minutosTermino = $minutosTermino[1];

    //faz disponibilidade de hora
    $horaAtual = $horaInicio;
    $minutosAtual = $minutosInicio;

?>
    <form method="post">
        <div class="hora-disponiveis">
            <?php for ($i = $horaInicio; $i <= $horaTermino;) {

                if (strlen($horaAtual) > 1) {
                    if (strlen($minutosAtual) > 1) {
                        $horaExibir = $horaAtual . ":" . $minutosAtual;
                    } else {
                        $horaExibir = $horaAtual . ":" .  str_pad($minutosAtual, 2, "0", STR_PAD_RIGHT);
                    }
                } else {
                    if (strlen($minutosAtual) > 1) {
                        $horaExibir = str_pad($horaAtual, 2, "0", STR_PAD_LEFT) . ":" .  $minutosAtual;
                    } else {
                        $horaExibir = str_pad($horaAtual, 2, "0", STR_PAD_LEFT) . ":" .  str_pad($minutosAtual, 2, "0", STR_PAD_RIGHT);
                    }
                }

            ?> <div class="hora-separada">
                    <?php @$linkHora = $_GET["hora"]; ?>
                    <button type="button" style="cursor:pointer" class="agendarHorario <?php if ($linkHora == $horaExibir) echo 'hora-focus'; ?>" onclick="agendarHora(<?php echo $horaAtual; ?>, <?php echo $minutosAtual; ?>)" name="horaInput" value="">
                        <?php echo $horaExibir; ?>
                    </button>
                </div>


            <?php
                $minutosAtual += 30;

                if ($i == $horaTermino) {
                    break;
                } else if ($i == $horaTermino - 1 && $minutosAtual == 60) {
                    if ($minutosTermino == 30) {
                    } else if ($minutosTermino == 0) {
                        break;
                    }
                }

                if ($minutosAtual == 60) {
                    $minutosAtual = 0;
                    $horaAtual++;
                    $i++;
                }
            }

            if (@$_POST["agenda"]) {
                $data = $_GET["data"];
                $hora = $_GET["hora"];

                $sql = "INSERT INTO agendamento (horario, data, status, Pessoa_idPessoa, Estabelecimento_idEstabelecimento) VALUES ('$hora', '$data', 'agendado', '$idPessoa', '$idCab')";
                $result = $conn->query($sql);
            }
            ?>
        </div>
        <div class="confirmar-agendamento" id="confirmacao" style="<?php if (!empty($linkHora)) {
                                                                        echo 'none';
                                                                    } ?>">
            <div class="confirmar-hora">
                <input type="submit" name="agenda">Agendar<i class="bi bi-check-lg"></i></input>
            </div>
    </form>
    <div class="canelar-hora">
        <button type="button" onclick="fecharAgenda()">Cancelar<i class="bi bi-x-lg"></i></button>
    </div>
    </div>
<?php
}
