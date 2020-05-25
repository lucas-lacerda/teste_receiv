<?php 

session_start();
require "includes/header.php"; 
require "includes/sidebar.php"; 

require "../vendor/autoload.php";

use App\Models\Cliente;
$cliente = new Cliente();
$cliente->setId($_POST['id_cliente']);

$cliente = $cliente->seleciona_cliente( $cliente->getId() );

?>
        
<main>
    <div class="container-fluid">
        <h1 class="mt-4">Editar Cliente</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
            <li class="breadcrumb-item active">Editar Cliente</li>
        </ol>
        <div class="row">
            <form action="Controllers/AtualizarClienteController.php" method="post" class="w-100" autocomplete="off">
                <div class="container">
                    <div class="form-group">

                        <?php 
                        foreach ($cliente as $dados) : ?>

                        <input type="hidden" name="id" value="<?=$dados->id_cliente;?>">

                        <?php require "__formCliente.php"; 
                        
                        endforeach;
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