<link rel="stylesheet" href="css/main.css">

<style>
    body {
        padding-top: 120px;

    }
</style>

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
                                <h2>Dom Nicolini</h2>
                                <h5>Daniel Dias Lima</h5>
                                <p>Bairro Brasil, Itu</p>
                            </div>

                        </div>
                    </div>


                    <div class="col-6">
                        <div class="info-barbeiaria">
                            <h4></h4>
                            <?php include "horarios.php" ?>
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