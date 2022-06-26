<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/main.css">
    <title>Document</title>
</head>

<body>
    <style>
        body {
            background-color: #FFFCF2 !important;
        }
        a{
            color:black;
        }
    </style>

    <header class="navigation fixed mb-4">

        <!-- main nav -->
        <nav id="colorScroll" class="navbar navbar-expand-lg navbar-dark navbarColor">

            <!-- logo -->
            <a class="navbar-brand logo" href="./?page=inicio">
                <img class="logo-white" src="/template/images/logo-white.png" alt="logo" />
            </a>
            <!-- /logo -->

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="navbar-collapse collapse" id="navigation">
                <div>
                    <ul class="navbar-nav">
                        <li class="nav-item <?php if ($page == "inicio") echo 'active'; ?>">
                            <a class="nav-link" href="./?page=inicio">Início</a>
                        </li>
                        <li class="nav-item <?php if ($page == "sobre") echo 'active'; ?>">
                            <a class="nav-link" href="./?page=sobre">Sobre</a>
                        </li>
                        <li class="nav-item <?php if ($page == "servicos") echo 'active'; ?>">
                            <a class="nav-link" href="./?page=servicos">Serviços</a>
                        </li>
                        <li class="nav-item <?php if ($page == "portfolio") echo 'active'; ?>">
                            <a class="nav-link" href="./?page=portfolio">Portfolio</a>
                        </li>
                        <li class="nav-item <?php if ($page == "equipe") echo 'active'; ?>">
                            <a class="nav-link" href="./?page=equipe">Equipe</a>
                        </li>
                        <li class="nav-item <?php if ($page == "carreiras") echo 'active'; ?>">
                            <a class="nav-link" href="./?page=carreuras">Carreiras</a>
                        </li>
                        <li class="nav-item <?php if ($page == "contato") echo 'active'; ?>">
                            <a class="nav-link" href="./?page=contato">Contato</a>
                        </li>
                        <li class="nav-item <?php if ($page == "assine") echo 'active'; ?>">
                            <a class="nav-link" href="./?page=assine">Assine já</a>
                        </li>
                    </ul>
                </div>
                <div id="destination">

                </div>
            </div>

            <div id="headerRight">
                <ul class="navbar-nav">
                    <li class="item <?php if ($page == "login") echo 'active'; ?>">
                        <a class="nav-link" href="./?page=login"><span>Cadastre-se</span></a>
                    </li>
                    <li class="item">
                        <a class="nav-link" href="#">Login</a>
                    </li>
                </ul>
            </div>

        </nav>
        <!-- /main nav -->
    </header>




    <div class="container ">
        <div class="row container-fluid fundo">
            <div class="col-lg-8 col-md-12 text-center img-login">
                <img src="https://cdni.iconscout.com/illustration/premium/thumb/signup-screen-of-e-wallet-app-3323727-2791556.png" class="img-fluid" alt="klgoa">
            </div>
            <div class="col-lg-4 col-md-12 escrita align-self-center">
                <div class="row">
                    <div class="col-12 mb-4 mt-3">
                        <h2>Nextcut</h2>

                        <div class="inputs text-center mt-4 mb-4">
                            <h2>Login your account</h2>
                            <div class="log">

                                <div class="row mb-4 mt-4">
                                    <div class="com-12">
                                        <input type="text" placeholder="E-mail">
                                    </div>
                                </div>

                                <div class="row mt-4">
                                    <div class="col-12">
                                        <input type="password" placeholder="Password">
                                    </div>
                                </div>

                            </div>
                            <div class="row m-4">
                                <div class="col-12 ">
                                    <a class="nav-link text-end" href="./?page=contato">Forget password?</a>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12 btn-login">
                                    <input class="main-btn" type="submit" placeholder="oasdoaskodiasod">
                                </div>
                            </div>

                            <div class="row m-4">
                                <div class="col-12 ">
                                    <a class="nav-link p-4" href="./?page=contato">Criar conta</a>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>







</body>

</html>