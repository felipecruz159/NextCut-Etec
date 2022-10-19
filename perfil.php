<link rel="stylesheet" href="css/main.css">

<style>
    body {
        padding-top: 120px;
    }
</style>

<?php

$id = $_GET["id"];
$sql = "SELECT * FROM cabeleireiro c
INNER JOIN estabelecimento e on c.Estabelecimento_idEstabelecimento = e.idEstabelecimento
INNER JOIN pessoa p on c.Pessoa_idPessoa = p.idPessoa
INNER JOIN endereco l on e.Endereco_idEndereco = l.idEndereco
WHERE idPessoa = '$id'"; //get info estabelecimento
$result = $conn->query($sql);

if ($result->num_rows > 0){
    while ($row = $result->fetch_assoc()){
        $id = $row["idPessoa"];
        $idEstabelecimento = $row["idEstabelecimento"];

        $filename = 'fotoPerfil/' . $row['foto'] . '.png';

        if (!file_exists($filename) || $row['foto'] == ''){
            $filename = 'fotoPerfil/semfoto.png';
        }
        $nome = $row["nome"]; $nome = strtolower($nome); $nome = ucwords($nome); 
        ?>

<div class="container">
    <div class="row">

        <div class="col-lg-9 col-12 mb-3">
            <div class="conteudo-page">
                <div class="folder-logado">
                    <img src="https://i.pinimg.com/736x/c0/11/87/c0118721f2433d673d6e73782a0a05c0.jpg" class="img-fluid" alt="">
                    <div class="imagem-logado">
                        <img src="<?php echo $filename ?>" class="img-fluid" alt="">
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="infoTudo-barbeiro">
                            <div class="info-barbeiro">
                                <h2><?php if(isset($row["nomeFantasia"])){echo $row["nomeFantasia"];}else{echo $nome;}; ?></h2>
                                <h5><?php if(isset($row["nomeFantasia"])){echo $nome;}?></h5>
                                <p><?php if(isset($row["nomeFantasia"])){echo $row["rua"] . " Nº " . $row["numero"] . ", " .$row["bairro"] . ", " . $row["cidade"];}?></p>
                            </div>

                        </div>
                    </div>
                </div>
                
            </div>
        </div>

        <!-- BARRA AGENDA -->
        <?php 
        if (isset($_COOKIE["cabeleireiro"])){
            ?>
        <div class="col-lg-3 col-12 mb-3">
            <div class="quem-viu">
                <h5 class="text-center">Agendamentos</h5>
                <hr>
        <?php //FAZER LOGICA DE PEGAR DADOS SOMENTE DAS PESSOAS QUE AGENDARAM
        $sql = "SELECT * FROM agendamento
        WHERE Estabelecimento_idEstabelecimento = '$idEstabelecimento'
        ORDER BY data ASC, horario ASC";
        $result = $conn->query($sql);

        if ($result->num_rows > 0){
            while ($row = $result->fetch_assoc()){
                $agendou = $row["Pessoa_idPessoa"];
                echo $agendou; //pegando somente 1, onde era pra pegar 1 e 2

                $sql = "SELECT * FROM agendamento a
                LEFT JOIN estabelecimento e  on e.idEstabelecimento = a.Estabelecimento_idEstabelecimento
                LEFT JOIN pessoa p 			on p.idPessoa = a.Pessoa_idPessoa
                LEFT JOIN endereco l 		on e.Endereco_idEndereco = l.idEndereco
                LEFT JOIN cabeleireiro c 	on c.Estabelecimento_idEstabelecimento = e.idEstabelecimento        
                WHERE a.Estabelecimento_idEstabelecimento = '$idEstabelecimento'
                ORDER BY data ASC, horario ASC";
                // echo $sql;
                $result = $conn->query($sql);

                if ($result->num_rows > 0){
                    while ($row = $result->fetch_assoc()){
                        $filenameAgenda = 'fotoPerfil/' . $row['foto'] . '.png';

                        if (!file_exists($filenameAgenda) || $row['foto'] == ''){
                            $filenameAgenda = 'fotoPerfil/semfoto.png';
                        }

                        $nomeAgenda = $row["nome"];
                        $nomeAgenda = $row["nome"]; $nomeAgenda = strtolower($nomeAgenda); $nomeAgenda = ucwords($nomeAgenda); 

                        $dataAgenda = $row["data"];
                        $horario = $row["horario"];

                        if($row["status"] == 'agendado'){ 
        ?>
        

                <div class="agendamentos">
                    <div class="foto-agendamento">
                        <img src="<?php echo $filenameAgenda ?>" alt="">
                    </div>
                    <div class="agendamento-pessoa">
                        <h2><?php echo $nomeAgenda; ?></h2>
                        <h3><?php echo date('d/m', strtotime($dataAgenda)). ' ' . date('H:i', strtotime($horario)); ?></h3>
                    </div>
                </div>
            
        <?php           }   
                    }
                } 
            }
        }?>
            </div>
        </div>
        <?php } ?>

    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-lg-9 col-md-12">
            <div class="calendario-conteudo">
                <?php include "calendario/cal.php";?>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-lg-9 col-md-12">
            <!-- <div class="container-hora">
                <h3>Horarios Disponiveis</h3>
                <form action="">
                    <?php //include "agendar.php" ?>
                    <div class="btn-horario">
                        <input type="submit" value="Agendar">
                    </div>

                </form>

                <p>Atenção, cada opção selecionada será entendida como um corte de cabelo!</p>
            </div> -->
            <?php
            if (isset($_COOKIE["cabeleireiro"]) && $id == $idPessoa){
                include "configuracao.php";
            }
            else if (isset($_COOKIE["cliente"])){
                
            }
            include 'horarios.php';
            ?>
        </div>
    </div>
</div>
<?php
    }
}
?>
