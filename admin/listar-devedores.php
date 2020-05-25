<?php 

session_start();
require "includes/header.php"; 
require "includes/sidebar.php"; 

require "../vendor/autoload.php";

use App\Models\Cliente;
$lista_clientes = new Cliente();

?>
        
<main>
    <div class="container-fluid">
        <h1 class="mt-4">Todos os Devedores</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
            <li class="breadcrumb-item active">Todos os Devedores</li>
        </ol>
        <div class="card mb-4">
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
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>#ID</th>
                                <th>Nome</th>
                                <th>E-mail</th>
                                <th>CPF/CNPJ</th>
                                <th>Visualizar Dívidas</th>
                                <th>Adicionar dívida</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>#ID</th>
                                <th>Nome</th>
                                <th>E-mail</th>
                                <th>CPF/CNPJ</th>
                                <th>Visualizar Dívidas</th>
                                <th>Adicionar dívida</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php 
                                foreach($lista_clientes->lista_clientes() as $cliente) :
                            ?>
                                <tr>
                                    <td><?=$cliente->id_cliente;?></td>
                                    <td><?=$cliente->nome_cliente;?></td>
                                    <td><?=$cliente->email_cliente;?></td>
                                    <td><?=$cliente->cpf_cliente;?></td>
                                    <td>
                                        <form action="detalhes-divida.php" method="POST">
                                            <input type="hidden" name="id_cliente" value="<?=$cliente->id_cliente;?>">
                                            <button class="btn btn-warning">Visualizar</button>
                                        </form>
                                    </td>
                                    <td>
                                        <form action="add-divida.php" method="POST">
                                            <input type="hidden" name="id_cliente" value="<?=$cliente->id_cliente;?>">
                                            <button class="btn btn-dark">Add Pendência</button>
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach; ?>                                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>


<?php require "includes/footer.php"; ?>