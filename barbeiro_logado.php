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
WHERE c.Estabelecimento_idEstabelecimento = '$id'";
$result = $conn->query($sql);


if ($result->num_rows > 0){
    while ($row = $result->fetch_assoc()){
        $nome = $row['nome'];
        $nome = strtok($nome, " "); $nome = strtolower($nome); $nome = ucfirst($nome);
        $id = $row["idEstabelecimento"];

        $filename = 'fotoPerfil/' . $row['foto'] . '.png';

        if (!file_exists($filename) || $row['foto'] == ''){
            $filename = 'fotoPerfil/semfoto.png';
        }
        ?>

<div class="container">
    <div class="row">

        <div class="col-lg-9 col-12 mb-3">
            <div class="conteudo-page">
                <div class="folder-logado">
                    <img src="https://i.pinimg.com/736x/c0/11/87/c0118721f2433d673d6e73782a0a05c0.jpg" class="img-fluid" alt="">
                    <div class="imagem-logado">
                        <img src="https://img.freepik.com/fotos-gratis/barbeiro-profissional-com-ferramentas-de-barbeiro-close-up_1303-20983.jpg" class="img-fluid" alt="">
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="infoTudo-barbeiro">
                            <div class="info-barbeiro">
                                <h2><?php echo $row["nomeFantasia"]; ?></h2>
                                <h5><?php $nome = $row["nome"]; $nome = strtolower($nome); $nome = ucwords($nome); echo $nome;?></h5>
                                <p><?php echo $row["rua"] . " Nº " . $row["numero"] . ", " .$row["bairro"] . ", " . $row["cidade"]?></p>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div class="col-lg-3 col-12 mb-3">
            <div class="quem-viu">
                <h5 class="text-center">Agendamentos</h5>
                <hr>

                <div class="agendamentos">
                    <div class="foto-agendamento">
                        <img src="https://s2.glbimg.com/4rs66b2IRNYef4YX7OjTf4o0SU8=/e.glbimg.com/og/ed/f/original/2018/12/06/modelo1.jpg" alt="">
                    </div>
                    <div class="agendamento-pessoa">
                        <h2>Rafael</h2>
                        <h3>14:30</h3>
                    </div>
                </div>

                <div class="agendamentos">
                    <div class="foto-agendamento">
                        <img src="https://i.pinimg.com/236x/fe/a8/1c/fea81cf56c6c19e45650757d36d4d7a5--hot-male-models-drawing-models.jpg" alt="">
                    </div>
                    <div class="agendamento-pessoa">
                        <h2>Marcos</h2>
                        <h3>15:00</h3>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-lg-9 col-md-12">
            <div class="calendario-conteudo">
                <?php include "calendario/cal.php" ?>
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
                    <?php include "agendar.php" ?>
                    <div class="btn-horario">
                        <input type="submit" value="Agendar">
                    </div>

                </form>

                <p>Atenção, cada opção selecionada será entendida como um corte de cabelo!</p>
            </div> -->
            <?php
            include 'configuracao.php';
            include 'horarios.php';
            ?>
        </div>
    </div>
</div>
<?php
    }
}
?>
