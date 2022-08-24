<?php
$page = @$_GET['page'];

//PADRÃO
$img1 = 'imagens/backgroundHeader.jpg';
$img2 = 'https://hips.hearstapps.com/esq.h-cdn.co/assets/17/29/1500667303-es-072117-talk-to-your-barber-about-your-hair.jpg';
$img3 = 'https://img.freepik.com/free-photo/vintage-wooden-table-with-beard-shaping-salon-tools_53876-127084.jpg?w=2000';

$title1 = 'NextCut';
$title2 = 'NextCut2';
$title3 = 'NextCut3';

$desc1 = 'Conte conosco, temos mais de 30 barbearias no portfólio.';
$desc2 = 'Conte conosco, temos mais de 30 barbearias no portfólio.2';
$desc3 = 'Conte conosco, temos mais de 30 barbearias no portfólio.3';

$botao1 = 'Ver portfólio';
$botao2 = 'Ver portfólio2';
$botao3 = 'Ver portfólio3';

if ($page == 'sobre'){
    $img1 = 'https://blog.tangerino.com.br/wp-content/uploads/2020/09/Missao-visao-e-valores-definindo-os-conceitos-da-sua-empresa.jpg';
    $img2 = 'https://blog.tangerino.com.br/wp-content/uploads/2020/09/Missao-visao-e-valores-definindo-os-conceitos-da-sua-empresa.jpg';
    $img3 = 'https://blog.fortestecnologia.com.br/wp-content/uploads/2019/02/fortes-tecnologia-missao-visao-valores.png';

    $title1 = 'Sobre Nós';
    $title2 = 'Sobre Nós';
    $title3 = 'Sobre Nós';

    $desc1 = '';
    $desc2 = '';
    $desc3 = '';

    $botao1 = 'Ver equipe';
    $botao2 = 'Ver equipe';
    $botao3 = 'Ver equipe';
}
// else if ($page == ''){
//     $img1 = '';
//     $img2 = '';
//     $img3 = '';

//     $title1 = '';
//     $title2 = '';
//     $title3 = '';

//     $desc1 = '';
//     $desc2 = '';
//     $desc3 = '';

//     $botao1 = '';
//     $botao2 = '';
//     $botao3 = '';
// }
else{

}
?>

<main>
    <div class="container-fluid">
        <div id="mainSlider" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#mainSlider" data-slide-to="0" class="active"></li>
                <li data-target="#mainSlider" data-slide-to="1"></li>
                <li data-target="#mainSlider" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner background-header">
                <div class="carousel-item active">
                    <img src="<?php echo $img1 ?>" class="d-block w-100" alt="">
                    <div class="carousel-caption d-none d-md-block">
                        <h2><?php echo $title1 ?></h2>
                        <p><?php echo $desc1 ?></p>
                        <a href="./?page=equipe" class="main-btn"><?php echo $botao1 ?></a>
                    </div>
                </div>

                <div class="carousel-item">
                    <img src="<?php echo $img2 ?>" class="d-block w-100" alt="">
                    <div class="carousel-caption d-none d-md-block">
                        <h2><?php echo $title2 ?></h2>
                        <p><?php echo $desc2 ?></p>
                        <a href="./?page=equipe" class="main-btn"><?php echo $botao2 ?></a>
                    </div>
                </div>

                <div class="carousel-item">
                    <img src="<?php echo $img3 ?>" class="d-block w-100" alt="">
                    <div class="carousel-caption d-none d-md-block">
                        <h2><?php echo $title3 ?></h2>
                        <p><?php echo $desc3 ?></p>
                        <a href="./?page=equipe" class="main-btn"><?php echo $botao3 ?></a>
                    </div>
                </div>
            </div>
            <a href="#mainSlider"></a>
            <a class="carousel-control-prev" href="#mainSlider" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only"></span>
            </a>
            <a class="carousel-control-next" href="#mainSlider" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only"></span>
            </a>
        </div>
    </div>
</main>
