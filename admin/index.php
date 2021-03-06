<?php 
session_start();
if (!isset($_SESSION['email'])) {
    $_SESSION['danger'] = "Usuario ou senha incorreto";
    header('Location:../index.php');
}
require "includes/header.php"; 
require "includes/sidebar.php"; 
?>
        
<main>
    <div class="container-fluid">
        <?php if(isset($_SESSION['success'])): ?>
            <p class="alert alert-success"><?=$_SESSION['success']?></p>  
        <?php 
            unset($_SESSION['success']);
            endif; 
        ?>
        <?php if(isset($_SESSION['danger'])): ?>
            <p class="alert alert-danger"><?=$_SESSION['danger']?></p>  
        <?php 
            unset($_SESSION['danger']);
            endif; 
        ?>
        <h1 class="mt-4">Dashboard</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Dashboard</li>
        </ol>
        <div class="row">
            
            <div class="col-xl-3 col-md-6">
                <div class="card bg-primary text-white mb-4">
                    <div class="card-body">Clientes</div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="listar-clientes.php">Ver Todos</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card bg-danger text-white mb-4">
                    <div class="card-body">Devedores</div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="listar-devedores.php">Ver Todos</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>


<?php require "includes/footer.php"; ?>