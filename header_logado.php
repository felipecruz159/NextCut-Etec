<link rel="stylesheet" href="css/main.css">

<?php
include 'config.php';
$cookieEmail = $_COOKIE["login"];

$conn = Conectar();
$sql = "SELECT nome, idPessoa, Endereco_idEndereco FROM pessoa WHERE email='$cookieEmail'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    $nome = $row['nome'];
    $idPessoa = $row['idPessoa'];
    $idEndereco = $row['Endereco_idEndereco'];
  }
}

$sql = "SELECT cep, rua FROM endereco WHERE idEndereco='$idEndereco'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    $cep = $row['cep'];
    $rua = $row['rua'];
  }
}

if (@$_POST['salvaCep']) {
  $cep = $_POST['addCep'] || $_POST['changeCep'];
  $estado = $_POST['estado'];
  $cidade = $_POST['cidade'];
  $bairro = $_POST['bairro'];
  $rua = $_POST['endereco'];
  $numero = $_POST['numero'];
  $complemento = $_POST['complemento'];

  $sql = "UPDATE endereco
  SET cep = '$cep', estado = '$estado', cidade='$cidade', bairro='$bairro', rua= ";
}
?>

<header class="fixed-top" id="header-logado">

  <!-- logo -->
  <a class="navbar-brand logo" href="./?page=inicio">
    <img class="img-fluid" style="width: 80px;" src="https://www.seekpng.com/png/full/7-73431_orange-and-white-logo-of-youtube-orange-youtube.png" alt="logo" />
  </a>
  <!-- /logo -->
  <div class="links-logado">
    <a href="./?page=form_redirect">Cortes</a>
    <a href="./?page=form_redirect">Estética</a>
    <a href="./?page=form_redirect">Sombrancelhas</a>
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

  <div class="busca">
    <input type="text">
    <button><i class="bi bi-search"></i></button>
  </div>

  <div class="endereco-logado">
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
      <?php if (!isset($cep)) {
        echo 'Adicione um endereço...';
      } else {
        if (isset($rua)) {
          echo $rua . ' ';
        }
      }
      ?><i class="bi bi-chevron-down"></i>
    </button>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <!-- <h5 class="modal-title" id="exampleModalLabel">Modal title</h5> -->
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <?php if (isset($cep)) {
              echo '<div>' . $rua . '</div>';
              echo '<div>' . 'Alterar endereço...' . '</div>';
            } else {
              include 'enderecoInputFalse.php';
            } ?>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" style="background-color: blue;">Voltar</button>
            <button type="button" class="btn btn-primary" style="background-color: pink;" name="salvaCep">Salvar</button>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div id="appCep" style="display: none;">

    <div class="row">
      <div class="col-12 mb-4">
        <label class="" for="estado">Estado</label>
        <input type="text" name="estado" v-model="endereco.estado" readonly>
      </div>
    </div>

    <div class="row">
      <div class="col-12 mb-4">
        <label class="" for="cidade">Cidade</label>
        <input type="text" name="cidade" v-model="endereco.cidade" readonly>
      </div>
    </div>

    <div class="row">
      <div class="col-12 mb-4">
        <label class="" for="bairro">Bairro</label>
        <input type="text" name="bairro" v-model="endereco.bairro" readonly>
      </div>
    </div>

    <div class="row">
      <div class="col-12 mb-4">
        <label class="" for="endereco">Rua</label>
        <input type="text" name="endereco" v-model="endereco.rua" readonly>
      </div>
    </div>

    <div class="row">
      <div class="col-12 mb-4">
        <label class="" for="numero">Número</label>
        <input type="text" name="numero" onkeypress="return onlynumber();" required>
      </div>
    </div>

    <div class="row">
      <div class="col-12 mb-4">
        <label class="" for="complemento">Complemento <small class="text-muted">— opcional</small></label>
        <input type="text" name="complemento">
      </div>
    </div>
  </div>


  <div class="canva">
    <button class="btn btn-person" type="button" data-bs-toggle="offcanvas" data-bs-target="#staticBackdrop" aria-controls="staticBackdrop">
      <i class="bi bi-person"></i>
    </button>

    <div class="offcanvas offcanvas-start" data-bs-backdrop="static" tabindex="-1" id="staticBackdrop" aria-labelledby="staticBackdropLabel">
      <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="staticBackdropLabel">Offcanvas</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body">
        <div>
          <div class="flex-shrink-0 p-3 bg-white" style="width: 300px;">
            <a href="#" class="d-flex align-items-center pb-3 mb-3 link-dark text-decoration-none border-bottom">
              <svg class="bi pe-none me-2" width="30" height="24">
                <use xlink:href="#bootstrap" />
              </svg>

              <p style="color: var(--black) !important; font-size: 14pt; font-weight: bold;">Olá, <span class="fs-5 fw-semibold"><?php echo strtok($nome, " "); ?></span></p>
            </a>
            <ul class="list-unstyled ps-0">
              <li class="mb-1">
                <button class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed" data-bs-toggle="collapse" data-bs-target="#home-collapse" aria-expanded="true">
                  Inicio
                </button>
                <div class="collapse show" id="home-collapse">
                  <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                    <li><a href="#" class="link-dark d-inline-flex text-decoration-none rounded">Cortes</a></li>
                    <li><a href="#" class="link-dark d-inline-flex text-decoration-none rounded">Estética</a></li>
                    <li><a href="#" class="link-dark d-inline-flex text-decoration-none rounded">Sombrancelhas</a></li>
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
            <img src="https://github.com/mdo.png" alt="" width="32" height="32" class="rounded-circle me-2">
            <strong>Perfil</strong>
          </a>
          <ul class="dropdown-menu text-small shadow">
            <li><a class="dropdown-item" href="#">Configurações</a></li>
            <li><a class="dropdown-item" href="#">Termos e condições de uso</a></li>
            <li><a class="dropdown-item" href="#">Privacidade</a></li>
            <li>
              <hr class="dropdown-divider">
            </li>
            <li><a class="dropdown-item" href="./logout.php" style="color:red !important;">Fazer logout</a></li>
          </ul>
        </div>
      </div>

    </div>
  </div>
</header>