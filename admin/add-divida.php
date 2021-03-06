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
        <h1 class="mt-4">Adicionar Nova Dívida</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
            <li class="breadcrumb-item active">Nova dívida</li>
        </ol>
        <div class="row">

            <form action="Controllers/AddDividaController.php" method="post" class="w-100" autocomplete="off">
                <div class="container">
                    <div class="form-group">                    
                        <?php require "__formDivida.php";?>

                        <input type="hidden" name="id_cliente" value="<?=$_POST['id_cliente']?>">
                        <div class="row m-5 text-center">
                            <div class="col-md-12">
                                <button class="btn btn-success">Cadastrar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</main>


<?php require "includes/footer.php"; ?>