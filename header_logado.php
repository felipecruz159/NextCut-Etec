<link rel="stylesheet" href="css/main.css">

<?php
include 'config.php';
if (isset($_COOKIE["cliente"])){
  $cookieEmail = $_COOKIE["cliente"];
}
else if (isset($_COOKIE["cabeleireiro"])){
  $cookieEmail = $_COOKIE["cabeleireiro"];
}
else {
  echo '<span style="color:#ff6600;">Login inválido</span>';
}

$conn = Conectar();
$sql = "SELECT nome, idPessoa, Endereco_idEndereco, foto FROM pessoa WHERE email='$cookieEmail'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    $GLOBALS["nome"] = $row['nome'];
    $idPessoa = $row['idPessoa'];
    $idEndereco = $row['Endereco_idEndereco'];

    $filename = 'fotoPerfil/' . $row['foto'] . '.png';

        if (!file_exists($filename) || $row['foto'] == ''){
            $filename = 'fotoPerfil/semfoto.png';
        }
  }
}
?>

<header class="fixed-top" id="header-logado">

  <!-- logo -->
  <a class="navbar-brand logo" href="./?page=inicio">
    <img class="img-fluid" style="width: 80px;" src="https://logopng.com.br/logos/namecheap-146.png" alt="logo" />
  </a>
  <!-- /logo -->
  <div class="links-logado">
    <a href="./?page=form_redirect">Barbeiros</a>
    <a href="./?page=form_redirect">Favoritos</a>

    <div class="dropdown">
      <a class="btn dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
        Navegação
      </a>

      <ul class="dropdown-menu">
        <li><a class="dropdown-item" href="./?page=sobre">Sobre</a></li>
        <li><a class="dropdown-item" href="./?page=equipe">Equipe</a></li>
        <li><a class="dropdown-item" href="./?page=carreiras">Carreiras</a></li>
        <li><a class="dropdown-item" href="./?page=contato">Contato</a></li>
      </ul>
    </div>
  </div>

  <!-- <div class="busca">
    <input type="text">
    <button><i class="bi bi-search"></i></button>
  </div> -->

  


  <div class="canva">
    <button class="btn btn-person" type="button" data-bs-toggle="offcanvas" data-bs-target="#staticBackdrop" aria-controls="staticBackdrop">
      <i class="bi bi-person"></i>
    </button>

    <div class="offcanvas offcanvas-start" data-bs-backdrop="static" tabindex="-1" id="staticBackdrop" aria-labelledby="staticBackdropLabel">
      <div class="offcanvas-header">
        <button type="button" class="btn-close-off" data-bs-dismiss="offcanvas" aria-label="Close"><i class="bi bi-x-lg"></i></button>
      </div>
      <div class="offcanvas-body">
        <div>
          <div class="flex-shrink-0 p-3 offConteudo" style="width: 300px;">
            <a href="#" class="d-flex align-items-center pb-3 mb-3 link-dark text-decoration-none border-bottom">
              <svg class="bi pe-none me-2" width="30" height="24">
                <use xlink:href="#bootstrap" />
              </svg>

              <p style="color: var(--white) !important; font-size: 1.2em; font-weight: bold;">Olá, <span class="fs-5 fw-semibold"><?php echo strtok($GLOBALS["nome"], " "); ?></span></p>
            </a>
            <ul class="list-unstyled ps-0">
              <li class="mb-1">
                <button class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed" data-bs-toggle="collapse" data-bs-target="#home-collapse" aria-expanded="true">
                  Inicio
                </button>
                <div class="collapse show" id="home-collapse">
                  <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                    <li><a href="#" class="link-dark d-inline-flex text-decoration-none rounded">Barbeiros</a></li>
                    <li><a href="#" class="link-dark d-inline-flex text-decoration-none rounded">Favoritos</a></li>
                  </ul>
                </div>
              </li>
              <li class="mb-1">
                <button class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed" data-bs-toggle="collapse" data-bs-target="#dashboard-collapse" aria-expanded="false">
                  Categorias
                </button>
                <div class="collapse" id="dashboard-collapse">
                  <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                    <li><a href="#" class="link-dark d-inline-flex text-decoration-none rounded">Liso</a></li>
                    <li><a href="#" class="link-dark d-inline-flex text-decoration-none rounded">Crespo</a></li>
                    <li><a href="#" class="link-dark d-inline-flex text-decoration-none rounded">Cacheado</a></li>
                    <li><a href="#" class="link-dark d-inline-flex text-decoration-none rounded">Ondulado</a></li>
                  </ul>
                </div>
              </li>
            </ul>
          </div>
        </div>
        <div class="dropdown">
          <a href="#" class="d-flex align-items-center link-dark text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
            <img src="<?= $filename ?>" alt="" width="40" height="40" class="rounded-circle me-2">
            <strong>Perfil</strong>
          </a>
          <ul class="dropdown-menu text-small shadow">
            <li><a class="dropdown-item" href="#">Configurações</a></li>
            <li><a class="dropdown-item" href="#">Termos e condições de uso</a></li>
            <li><a class="dropdown-item" href="#">Privacidade</a></li>
            <li><a class="dropdown-item" href="./meuPerfil.php">Meu perfil</a></li>
            <li>
              <hr>
            </li>
            <li><a class="dropdown-item" href="./logout.php" style="color:red !important;">Fazer logout</a></li>
          </ul>
        </div>
      </div>

    </div>
  </div>
</header>
