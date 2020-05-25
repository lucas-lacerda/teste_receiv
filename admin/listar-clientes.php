<?php 

session_start();
if (!isset($_SESSION['email'])) {
    $_SESSION['danger'] = "Usuario ou senha incorreto";
    header('Location:../index.php');
}
require "includes/header.php"; 
require "includes/sidebar.php"; 

require "../vendor/autoload.php";

use App\Models\Cliente;
$lista_clientes = new Cliente();


?>
        
<main>
    <div class="container-fluid">
        <h1 class="mt-4">Todos os clientes</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
            <li class="breadcrumb-item active">Todos os clientes</li>
        </ol>
        <div class="card mb-4">
            <div class="card-header"><a class="btn btn-primary" href="add-cliente.php">Adicionar novo cliente</a></div>
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
                                <th>Editar</th>
                                <th>Deletar</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>#ID</th>
                                <th>Nome</th>
                                <th>E-mail</th>
                                <th>CPF/CNPJ</th>
                                <th>Editar</th>
                                <th>Deletar</th>
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
                                    <td>
                                        <?php 
                                        if($cliente->cpf_cliente == Null){
                                           echo $cliente->cnpj_cliente;
                                        } elseif($cliente->cnpj_cliente == Null) {
                                            echo $cliente->cpf_cliente;
                                        }   
                                        ?>
                                    
                                    
                                    </td>
                                    <td>
                                        <form action="editar-cliente.php" method="POST">
                                            <input type="hidden" name="id_cliente" value="<?=$cliente->id_cliente;?>">
                                            <button class="btn btn-warning">Editar</button>
                                        </form>
                                    </td>
                                    <td>
                                        <form action="Controllers/DeletarClienteController.php" method="POST" onsubmit="return confirm('Deseja realmente excluir esse cliente?');">
                                            <input type="hidden" name="id_cliente" value="<?=$cliente->id_cliente;?>">
                                            <button class="btn btn-danger" >Deletar</button>
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