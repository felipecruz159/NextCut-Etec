<link rel="stylesheet" href="css/main.css">
<style>
    body {
        margin: 0;
        padding: 100px 0px;
        box-sizing: border-box;
    }
</style>

<?php 

$sql = "SELECT idCabeleireiro, foto, linkFacebook, linkInstagram, Pessoa_idPessoa, Estabelecimento_idBarbearia
FROM cabeleireiro;";
$result = $conn->query($sql);

if ($result) {
    while ($row = $result->fetch_assoc()) {
        $idCabeleireiro = $row['idCabeleireiro'];
        $idPessoa = $row['Pessoa_idPessoa'];
        $Estabelecimento_idBarbearia = $row['Estabelecimento_idBarbearia'];
        $foto = $row['foto'];
        $linkFacebook = $row['linkFacebook'];
        $linkInstagram = $row['linkInstagram'];
    }
} else {
    die($conn->error);
}

$sql = "SELECT nomeFantasia, email FROM estabelecimento WHERE idBarbearia = '$Estabelecimento_idBarbearia';";
$result = $conn->query($sql);

if ($result) {
    while ($row = $result->fetch_assoc()) {
        $nomeFantasia = $row['nomeFantasia'];
        $email = $row['email'];
    }
} else {
    die($conn->error);
}

$sql = "SELECT nome FROM pessoa WHERE idPessoa = '$idPessoa';";
$result = $conn->query($sql);

if ($result){
    while ($row = $result->fetch_assoc()){
        $nome = $row['nome'];
    }
} else {
    die($conn->error);
}

$nome = strtok($nome, " "); $nome = strtolower($nome); $nome = ucfirst($nome);
?>

<div id="todos-cards">
<div class="container">
    <div class="mt-2"><h1>Todos</h1></div>
    <hr>
    <div class="row">

        <div class="col-lg-3 col-md-4 col-6">
            <section>
                <div class="card">
                    <div class="card-content">

                        <div class="image">
                            <img src="https://home.odontosystem.com.br/wp-content/uploads/2018/08/riscos-clareamento-dental.jpg" alt="">
                        </div>

                        <div class="media-icons">
                            <a href="<?php echo $linkFacebook; ?>"><i class="bi bi-facebook"></i></a>
                            <a href="<?php echo $linkInstagram; ?>"><i class="bi bi-instagram"></i></a>
                        </div>

                        <div class="nome-fantasia">
                            <span class="fantasia"><?php echo $nomeFantasia; ?></span>
                            <span class="nome"><?php echo $nome; ?></span>
                        </div>

                        <div class="avaliacao">
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-half"></i>
                            <i class="bi bi-star"></i>
                        </div>

                        <div class="button">
                            <button class="perfil">Ver perfil</button> <!-- ver perfil where id = id -->
                        </div>
                    </div>
                </div>
            </section>
        </div>
<!-- 
        <div class="col-lg-3 col-md-4 col-6">
            <section>
                <div class="card">
                    <div class="card-content">

                        <div class="image">
                            <img src="https://img.freepik.com/fotos-gratis/emocoes-de-pessoas-lazer-do-estilo-de-vida-e-conceito-de-beleza-menina-asiatica-feliz-e-alegre-animada-dancando-e-se-divertindo-festejando-tocando-musica-ritmada-e-sorrindo-sobre-fundo-amarelo_1258-58916.jpg?w=2000" alt="">
                        </div>

                        <div class="media-icons">
                            <i class="bi bi-facebook"></i>
                            <i class="bi bi-instagram"></i>
                        </div>

                        <div class="nome-fantasia">
                            <span class="fantasia">Rafaelos'hair 2</span>
                            <span class="nome">Rafael Gomes</span>
                        </div>

                        <div class="avaliacao">
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-half"></i>
                            <i class="bi bi-star"></i>
                        </div>

                        <div class="button">
                            <button class="perfil">Ver perfil</button>
                        </div>
                    </div>
                </div>
            </section>
        </div>

        <div class="col-lg-3 col-md-4 col-6">
            <section>
                <div class="card">
                    <div class="card-content">

                        <div class="image">
                            <img src="https://static.vecteezy.com/system/resources/previews/003/162/336/non_2x/close-up-view-senior-attractive-man-smiling-looking-free-photo.JPG" alt="">
                        </div>

                        <div class="media-icons">
                            <i class="bi bi-facebook"></i>
                            <i class="bi bi-instagram"></i>
                        </div>

                        <div class="nome-fantasia">
                            <span class="fantasia">Rafaelos'hair 2</span>
                            <span class="nome">Rafael Gomes</span>
                        </div>

                        <div class="avaliacao">
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-half"></i>
                            <i class="bi bi-star"></i>
                        </div>

                        <div class="button">
                            <button class="perfil">Ver perfil</button>
                        </div>
                    </div>
                </div>
            </section>
        </div>

        <div class="col-lg-3 col-md-4 col-6 fundo-card">
            <section>
                <div class="card">
                    <div class="card-content">

                        <div class="image">
                            <img src="http://www.scanct.com.br/estetialign/image/modelo-991.png" alt="">
                        </div>

                        <div class="media-icons">
                            <i class="bi bi-facebook"></i>
                            <i class="bi bi-instagram"></i>
                        </div>

                        <div class="nome-fantasia">
                            <span class="fantasia">Rafaelos'hair 2</span>
                            <span class="nome">Rafael Gomes</span>
                        </div>

                        <div class="avaliacao">
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-half"></i>
                            <i class="bi bi-star"></i>
                        </div>

                        <div class="button">
                            <button class="perfil">Ver perfil</button>
                        </div>
                    </div>
                </div>
            </section>
        </div> -->

    </div>
</div>








<script src="/js/custom.js"></script>