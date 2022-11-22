<div class="container mt-5 mb-5">
    <div class="row">
        <div class="text-inicio">
            <h1 class="mb-3">Recomendados</h1>
            <h4 class="mb-3">Escolha o melhor horario para você, agende agora!</h4>
        </div>
       <?php include "card_recomendados.php" ?>

    </div>
</div>
<div class="container-fluid mb-4 mt-5 divisao">
    <div class="container p-5">
        <div class="row ">
            <div class="col-lg-6 col-md-12">
                <div class="text-inicio">
                    <h1>Todos tipos de cabelo!</h1>
                    <h4>Crie seu cadastro para cortar com os melhores cabeleireiros</h4>
                    <div class="estilos-cabelo">
                        
                       <?php include "card_estilo.php"?>

                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-12">
                <div class="col-12 text-center">
                    <img src="./imagens/corte-homem.png" style="width: 70%; height:30%" class="card-img-top text-center" alt="...">
                </div>
                <div class="card-body p-4">
                    <h4>Em duvida do corte?</h4>
                    <div><p class="card-text">O Site de cabeleireiros líder no mundo, oferece serviços de beleza e cuidados com os cabelos.
                        <br> Oferecemos uma experiência que atende às necessidades de cabelos curto, longo, reto, encaracolado, ondulado a altamente texturizado – os afiliados da NextCut criarão um corte e estilo para se adequar ao seu visual e estilo de vida.</p></div>
                    
                </div>
            </div>
        </div>
    </div>
</div>


<div class="container">
    <div class="row">
        <h1 class="text-center">Como funciona o app</h1>
        <div class="container-video">
            <div class="video1">
                <video width="100%" height="100%" controls>
                    <source src="movie.mp4" type="video/mp4">
                </video>
                <!--VICTOR FAZENDO VIDEOS DE COMO FUNCIONA -->
            </div>
            <div class="video2">
                <video width="100%" height="100%" controls>
                    <source src="movie.mp4" type="video/mp4">
                </video>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid mb-4 mt-5 divisao">
    <div class="container p-5">
        <div class="row ">
            <div class="text-beneficio mb-4">
                <h1>Benefícios dos Serviços da NextCut</h1>
                <h4>A equipe da NextCut está focado na individualidade<br> de cada um dos nossos clientes e estamos determinados a proporcionar a melhor<br> experiência possível criando o ambiente personalizado e o visual ideal único para você.</h4>
            </div>
            <div class="row mt-5">
                <div class="col-md-4 col-sm-12 ">
                    <div class="card-beneficio text-center">
                        <img src="./imagens/tempoBranco.png" class="card-img-top img-fluid" alt="...">
                        <div class="card-body">
                            <h5 class="card-title mb-1 mt-2">Economize Tempo</h5>
                            <p class="card-text">Valorizamos muito o seu tempo! Através do agendamento pelo site ou aplicativo, podemos evitar filas e demoras para iniciar o serviço.</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 col-sm-12">
                    <div class="card-beneficio text-center">
                        <img src="./imagens/corte.png" class="card-img-top img-fluid" alt="...">
                        <div class="card-body">
                            <h5 class="card-title mb-1 mt-2">Estilistas Profissionais</h5>
                            <p class="card-text">Existe um tipo de corte perfeito para cada indivíduo, podemos trabalhar juntos para formar um plano ideal para o seu cabelo que combine com seu modelo de rosto</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 col-sm-12">
                    <div class="card-beneficio text-center">
                        <img src="./imagens/tesoura-e-pente-branco.png" class="card-img-top img-fluid" alt="...">

                        <div class="card-body">
                            <h5 class="card-title mb-1 mt-2">Cortes Ágeis</h5>
                            <p class="card-text">Contamos com uma equipe totalmente ágil em questão dos cortes, com o tempo máximo de 30 minutos faça o cadastro e agende o mais rápido.</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<!--plugin jquery-->
<script>
    AOS.init();
</script>