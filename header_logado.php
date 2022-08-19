<link rel="stylesheet" href="css/main.css">

<?php
// $sql = "SELECT * FROM cliente WHERE id='$id'";
// $result = $conn->query($sql);
// if ($result->num_rows > 0) {
//     while ($row = $result->fetch_assoc()) {
//         $nome = $row['nome'];
//     }
// }
?>


<header class="fixed-top" id="header-logado">

  <!-- logo -->
  <a class="navbar-brand logo" href="./?page=inicio">
    <img class="img-fluid" style="width: 80px;" src="https://www.seekpng.com/png/full/7-73431_orange-and-white-logo-of-youtube-orange-youtube.png" alt="logo" />
  </a>
  <!-- /logo -->
  <div class="links-logado">
    <a href="">Cortes</a>
    <a href="">Estética</a>
    <a href="">Sombrancelhas</a>
  </div>

  <div class="busca">
    <input type="text">
    <button><i class="bi bi-search"></i></button>
  </div>

  <div class="endereco-logado">
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
      Rua Carlos Cassani <i class="bi bi-chevron-down"></i>
    </button>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            ...
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save changes</button>
          </div>
        </div>
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
              <span class="fs-5 fw-semibold">Olá RF \Apelido...</span> <!--colocar o nome definido pelo usuario..-->
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
              <li class="mb-1">
                <!--
                <button class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed" data-bs-toggle="collapse" data-bs-target="#orders-collapse" aria-expanded="false">
                </button>
                <div class="collapse" id="orders-collapse">
                  <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                    <li><a href="#" class="link-dark d-inline-flex text-decoration-none rounded">New</a></li>
                    <li><a href="#" class="link-dark d-inline-flex text-decoration-none rounded">Processed</a></li>
                    <li><a href="#" class="link-dark d-inline-flex text-decoration-none rounded">Shipped</a></li>
                    <li><a href="#" class="link-dark d-inline-flex text-decoration-none rounded">Returned</a></li>
                  </ul>
                 </div> -->
              </li>
            </ul>
          </div>
        </div>
        <div class="dropdown">
          <a href="#" class="d-flex align-items-center link-dark text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
            <img src="https://github.com/mdo.png" alt="" width="32" height="32" class="rounded-circle me-2">
            <strong>Conta</strong>
          </a>
          <ul class="dropdown-menu text-small shadow">
            <li><a class="dropdown-item" href="#">Informações</a></li>
            <li><a class="dropdown-item" href="#">Configurações</a></li>
            <li><a class="dropdown-item" href="#">Privacidade Seguraança</a></li>
            <li>
              <hr class="dropdown-divider">
            </li>
            <li><a class="dropdown-item" href="./logout.php" style="color: red;">Sair / Início</a></li>
          </ul>
        </div>
      </div>

    </div>
  </div>
</header>


