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
    <a href="">Estetica</a>
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
          <div class="flex-shrink-0 p-3 bg-white" style="width: 280px;">
            <a href="/" class="d-flex align-items-center pb-3 mb-3 link-dark text-decoration-none border-bottom">
              <svg class="bi pe-none me-2" width="30" height="24">
                <use xlink:href="#bootstrap" />
              </svg>
              <span class="fs-5 fw-semibold">Collapsible</span>
            </a>
            <ul class="list-unstyled ps-0">
              <li class="mb-1">
                <button class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed" data-bs-toggle="collapse" data-bs-target="#home-collapse" aria-expanded="true">
                  Home
                </button>
                <div class="collapse show" id="home-collapse">
                  <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                    <li><a href="#" class="link-dark d-inline-flex text-decoration-none rounded">Overview</a></li>
                    <li><a href="#" class="link-dark d-inline-flex text-decoration-none rounded">Updates</a></li>
                    <li><a href="#" class="link-dark d-inline-flex text-decoration-none rounded">Reports</a></li>
                  </ul>
                </div>
              </li>
              <li class="mb-1">
                <button class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed" data-bs-toggle="collapse" data-bs-target="#dashboard-collapse" aria-expanded="false">
                  Dashboard
                </button>
                <div class="collapse" id="dashboard-collapse">
                  <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                    <li><a href="#" class="link-dark d-inline-flex text-decoration-none rounded">Overview</a></li>
                    <li><a href="#" class="link-dark d-inline-flex text-decoration-none rounded">Weekly</a></li>
                    <li><a href="#" class="link-dark d-inline-flex text-decoration-none rounded">Monthly</a></li>
                    <li><a href="#" class="link-dark d-inline-flex text-decoration-none rounded">Annually</a></li>
                  </ul>
                </div>
              </li>
              <li class="mb-1">
                <button class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed" data-bs-toggle="collapse" data-bs-target="#orders-collapse" aria-expanded="false">
                  Orders
                </button>
                <div class="collapse" id="orders-collapse">
                  <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                    <li><a href="#" class="link-dark d-inline-flex text-decoration-none rounded">New</a></li>
                    <li><a href="#" class="link-dark d-inline-flex text-decoration-none rounded">Processed</a></li>
                    <li><a href="#" class="link-dark d-inline-flex text-decoration-none rounded">Shipped</a></li>
                    <li><a href="#" class="link-dark d-inline-flex text-decoration-none rounded">Returned</a></li>
                  </ul>
                </div>
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
            <li><a class="dropdown-item" href="#">New project...</a></li>
            <li><a class="dropdown-item" href="#">Settings</a></li>
            <li><a class="dropdown-item" href="#">Profile</a></li>
            <li>
              <hr class="dropdown-divider">
            </li>
            <li><a class="dropdown-item" href="./logout.php" style="color: red;">Sair / Início</a></li>
          </ul>
        </div>
      </div>

    </div>
  </div>
  <!-- <div id="headerRight" style="margin-right: 80px;"> 
      <div class="dropdown">
        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Perfil
        </button>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
          <a class="dropdown-item" href="#">Perfil</a>
          <a class="dropdown-item" href="#">Termos de uso</a>
          <a class="dropdown-item" href="#">Configurações</a>
          <a class="dropdown-item" href="./logout.php" style="color: red;">Sair / Início</a>
        </div>
      </div>
    </div>
-->
</header>




<div style="display: none;">
  <div class="header-logado" id="header">

    <button class="btn btn-logado" type="button" data-bs-toggle="offcanvas" data-bs-target="#staticBackdrop" aria-controls="staticBackdrop">
      <i class="bi bi-list"></i>
    </button>

    <div class="offcanvas offcanvas-start" data-bs-backdrop="static" tabindex="-1" id="staticBackdrop" aria-labelledby="staticBackdropLabel">
      <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="staticBackdropLabel">Offcanvas</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body">
        <div class="flex-shrink-0 bg-white" style="width: 300px;">
          <a href="/" class="d-flex align-items-center pb-3 mb-3 link-dark text-decoration-none border-bottom">
            <svg class="bi pe-none me-2" width="30" height="24">
              <use xlink:href="#bootstrap" />
            </svg>
            <span class="fs-5 fw-semibold">Olá, <?php echo @$nome ?></span> <!-- arrumar $sql -->
          </a>
          <ul class="list-unstyled ps-0">
            <li class="mb-1">
              <button class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed" data-bs-toggle="collapse" data-bs-target="#home-collapse" aria-expanded="true">
                Home
              </button>
              <div class="collapse show" id="home-collapse">
                <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                  <li><a href="./?page=inicio" class="link-dark d-inline-flex text-decoration-none rounded">Inicio</a></li>
                  <li><a href="#" class="link-dark d-inline-flex text-decoration-none rounded">Updates</a></li>
                  <li><a href="#" class="link-dark d-inline-flex text-decoration-none rounded">Reports</a></li>
                </ul>
              </div>
            </li>
            <li class="mb-1">
              <button class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed" data-bs-toggle="collapse" data-bs-target="#dashboard-collapse" aria-expanded="false">
                Dashboard
              </button>
              <div class="collapse" id="dashboard-collapse">
                <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                  <li><a href="#" class="link-dark d-inline-flex text-decoration-none rounded">Overview</a></li>
                  <li><a href="#" class="link-dark d-inline-flex text-decoration-none rounded">Weekly</a></li>
                  <li><a href="#" class="link-dark d-inline-flex text-decoration-none rounded">Monthly</a></li>
                  <li><a href="#" class="link-dark d-inline-flex text-decoration-none rounded">Annually</a></li>
                </ul>
              </div>
            </li>
            <li class="mb-1">
              <button class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed" data-bs-toggle="collapse" data-bs-target="#orders-collapse" aria-expanded="false">
                Orders
              </button>
              <div class="collapse" id="orders-collapse">
                <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                  <li><a href="#" class="link-dark d-inline-flex text-decoration-none rounded">New</a></li>
                  <li><a href="#" class="link-dark d-inline-flex text-decoration-none rounded">Processed</a></li>
                  <li><a href="#" class="link-dark d-inline-flex text-decoration-none rounded">Shipped</a></li>
                  <li><a href="#" class="link-dark d-inline-flex text-decoration-none rounded">Returned</a></li>
                </ul>
              </div>
            </li>
            <li class="border-top my-3"></li>
            <li class="mb-1">
              <div class="dropdown">
                <a href="#" class="d-flex align-items-center link-dark text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                  <img src="https://github.com/mdo.png" alt="" width="32" height="32" class="rounded-circle me-2">
                  <strong>Conta</strong>
                </a>
                <ul class="dropdown-menu text-small shadow">
                  <li><a class="dropdown-item" href="#">New project...</a></li>
                  <li><a class="dropdown-item" href="#">Settings</a></li>
                  <li><a class="dropdown-item" href="#">Profile</a></li>
                  <li>
                    <hr class="dropdown-divider">
                  </li>
                  <li><a class="dropdown-item" href="#">Sign out</a></li>
                </ul>
              </div>
        </div>
      </div>
    </div>
  </div>
</div>