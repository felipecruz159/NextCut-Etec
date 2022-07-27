<link rel="stylesheet" href="css/main.css">

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
                    <span class="fs-5 fw-semibold">Olá Rafael Gomes</span>
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

<?php include 'card-loop.php' ?>