<?php
date_default_timezone_set('America/Sao_Paulo');

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
    $sql = "SELECT horaInicio, horarioTermino FROM horariofuncionamento WHERE dia='$diaSemana'";
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
    <div class="hora-disponiveis">
        <?php for ($i = $horaInicio; $i <= $horaTermino;) {
        ?> <div class="hora-separada">
                <button type="button" style="cursor:pointer" id="agendarHorario" onclick="agendarHora()">
                    <?php if (strlen($horaAtual) > 1) {
                        if (strlen($minutosAtual) > 1) {
                            echo $horaAtual . ":" . $minutosAtual;
                        } else {
                            echo $horaAtual . ":" . $minutosAtual . 0;
                        }
                    } else {
                        if (strlen($minutosAtual) > 1) {
                            echo '<a>' . 0 . $horaAtual . ":" . $minutosAtual . '</a>';
                        } else {
                            echo 0 . $horaAtual . ":" . $minutosAtual . 0;
                        }
                    } ?>
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
        } ?>
    </div>
    <div class="confirmar-agendamento" id="confirmacao" style="display:none;">
        <div class="confirmar-hora">
            <button type="button">Agendar<i class="bi bi-check-lg"></i></button>
        </div>
        <div class="canelar-hora">
            <button type="button">Cancelar<i class="bi bi-x-lg"></i></button>
        </div>
    </div>
<?php
}
