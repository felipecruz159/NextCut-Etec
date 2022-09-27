<link rel="stylesheet" href="css/main.css">
<style>
    body {
        margin: 0;
        padding: 100px 0px;
        box-sizing: border-box;
    }
</style>

<div id="todos-cards">
<div class="container">
    <div class="mt-2"><h1>Talvez você goste...</h1></div>
    <hr>
    <div class="row">

<?php 

$sql = "SELECT * FROM cabeleireiro c
INNER JOIN estabelecimento e on c.Estabelecimento_idEstabelecimento = e.idEstabelecimento
INNER JOIN pessoa p on c.Pessoa_idPessoa = p.idPessoa
ORDER BY e.idEstabelecimento;";
$result = $conn->query($sql);


if ($result->num_rows > 0){
    while ($row = $result->fetch_assoc()){
        $nome = $row['nome'];
        $nome = strtolower($nome); $nome = ucwords($nome);
        $id = $row["idPessoa"];

        $filename = 'fotoPerfil/' . $row['foto'] . '.png';

        if (!file_exists($filename) || $row['foto'] == ''){
            $filename = 'fotoPerfil/semfoto.png';
        }
        ?>

<div class="col-lg-3 col-md-4 col-6">
            <section>
                <div class="card">
                    <div class="card-content">

                        <div class="image">
                            <img src="<?php echo $filename; ?>" alt="">
                        </div>

                        <div class="media-icons">
                            <a href="<?php echo $row['linkFacebook']; ?>"><i class="bi bi-facebook"></i></a>
                            <a href="<?php echo $row['linkInstagram']; ?>"><i class="bi bi-instagram"></i></a>
                        </div>

                        <div class="nome-fantasia">
                            <span class="fantasia"><?php echo $row['nomeFantasia']; ?></span>
                            <span class="nome"><?php echo $nome; ?></span>
                        </div>

                        <!-- <div class="avaliacao">
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-half"></i>
                            <i class="bi bi-star"></i>
                        </div> -->
                        <?php 
                        $dateAtual = date('Y-m-d');
                        ?>

                        <div class="button">
                            <button class="perfil"><a href="<?php echo './?page=perfil&id='.$id.'&data='.$dateAtual ?>">Ver perfil</a></button> <!-- ver perfil where id = id -->
                        </div>
                    </div>
                </div>
            </section>
        </div>

<?php
    }
}
?>
    </div>
</div>








<script src="/js/custom.js"></script>