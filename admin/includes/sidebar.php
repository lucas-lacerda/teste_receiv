<?php session_start(); ?>
<div id="layoutSidenav">
    <div id="layoutSidenav_nav">
        <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
            <div class="sb-sidenav-menu">
                <div class="nav">
                    <div class="sb-sidenav-menu-heading">Home</div>
                    <a class="nav-link" href="index.php"
                        ><div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                        Dashboard</a
                    >
                    <div class="sb-sidenav-menu-heading">Clientes</div>
                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts"
                        >
                            <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                        Clientes
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i>
                    </div>
                    </a>
                    <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link" href="listar-clientes.php">Listar Todos</a>
                            <a class="nav-link" href="add-cliente.php">Adicionar Novo</a>
                        </nav>
                    </div>

                    <div class="sb-sidenav-menu-heading">Dividas</div>
                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts1" aria-expanded="false" aria-controls="collapseLayouts1"
                        >
                            <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                        Dividas
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i>
                    </div>
                    </a>
                    <div class="collapse" id="collapseLayouts1" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link" href="listar-devedores.php">Listar Todos</a>
                        </nav>
                    </div>
                    
                </div>
            </div>
            <div class="sb-sidenav-footer">
                <div class="small">Logado como:</div>
                <?=$_SESSION['nome'];?> <br>
                <?=$_SESSION['email'];?>
            </div>
        </nav>
    </div>
    <div id="layoutSidenav_content">
