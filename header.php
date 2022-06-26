<link rel="stylesheet" href="css/main.css">
  <!--
Fixed Navigation
==================================== -->
  <header class="navigation fixed-top" style="background-color: <?php 
  if ( $page == 'login' ){
    echo 'black';
  }
  else{
    echo 'transparent';
  }
  ;?>">

    <!-- main nav -->
    <nav id="colorScroll" class="navbar navbar-expand-lg navbar-dark navbarColor">

      <!-- logo -->
      <a class="navbar-brand logo" href="./?page=inicio">
        <img class="logo-white" src="/template/images/logo-white.png" alt="logo" />
      </a>
      <!-- /logo -->

      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation"
        aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="navbar-collapse collapse" id="navigation">
        <div>
          <ul class="navbar-nav">
            <li class="nav-item <?php if($page == "inicio" || $page == '') echo 'active'; ?>">
              <a class="nav-link" href="./?page=inicio">Início</a>
            </li>
            <li class="nav-item <?php if($page == "sobre") echo 'active'; ?>">
              <a class="nav-link" href="./?page=sobre">Sobre</a>
            </li>
            <li class="nav-item <?php if($page == "servicos") echo 'active'; ?>">
              <a class="nav-link" href="./?page=servicos">Serviços</a>
            </li>
            <li class="nav-item <?php if($page == "portfolio") echo 'active'; ?>">
              <a class="nav-link" href="./?page=portfolio">Portfolio</a>
            </li>
            <li class="nav-item <?php if($page == "equipe") echo 'active'; ?>">
              <a class="nav-link" href="./?page=equipe">Equipe</a>
            </li>
            <li class="nav-item <?php if($page == "carreiras") echo 'active'; ?>">
              <a class="nav-link" href="./?page=carreiras">Carreiras</a>
            </li>
            <li class="nav-item <?php if($page == "contato") echo 'active'; ?>">
              <a class="nav-link" href="./?page=contato">Contato</a>
            </li>
            <li class="nav-item <?php if($page == "assine") echo 'active'; ?>">
              <a class="nav-link" href="./?page=assine">Assine já</a>
            </li>
          </ul>
        </div>
        <div id="destination">

        </div>
      </div>

      <div id="headerRight">
        <ul class="navbar-nav">
          <li class="item <?php if($page == "cadastro") echo 'active'; ?>">
            <a class="nav-link" href="./?page=cadastro"><span>Cadastre-se</span></a>
          </li>
          <li class="item <?php if($page == "login") echo 'active'; ?>">
            <a class="nav-link" href="./?page=login">Login</a>
          </li>
        </ul>
      </div>

    </nav>
    <!-- /main nav -->

  </header>
  <!--
End Fixed Navigation
==================================== -->
