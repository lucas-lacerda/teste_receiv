<?php 

session_start();
if (!isset($_SESSION['email'])) {
    $_SESSION['danger'] = "Usuario ou senha incorreto";
    header('Location:../index.php');
}

require "includes/header.php"; 
require "includes/sidebar.php"; 
require "../vendor/autoload.php";

use App\Models\Divida;
$divida = new Divida();
$divida->setIdCliente($_POST['id_divida']);

$divida = $divida->seleciona_divida( $divida->getIdCliente() );

?>
        
<main>
    <div class="container-fluid">
        <h1 class="mt-4">Atualizar Nova Dívida</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
            <li class="breadcrumb-item active">Atualizar dívida</li>
        </ol>
        <div class="row">

            <form action="Controllers/AtualizarDividaController.php" method="post" class="w-100" autocomplete="off">
                <div class="container">
                   
                    <?php 
                
                    foreach($divida as $dados) {

                        $data = explode('-', $dados->vencimento_divida);
                        $dataFormat = $data[2].$data[1].$data[0];
                    }
                    ?>

                    <input type="hidden" name="id_divida" value="<?=$dados->id_divida;?>">
                    <input type="hidden" name="id_cliente" value="<?=$dados->id_cliente;?>">
                    
                    <?php
                        require "__formDivida.php";                   
                    ?>

                        
                        <div class="row m-5 text-center">
                            <div class="col-md-12">
                                <button class="btn btn-success">Atualizar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</main>


<?php require "includes/footer.php"; ?>