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
use App\Models\Cliente;

$divida = new Divida();
$cliente = new Cliente();
$divida->setIdCliente($_POST['id_cliente']);
$cli = $cliente->seleciona_cliente($divida->getIdCliente());
$dividas = $divida->detalhe_divida($divida->getIdCliente());
$total = 0;

?>
        
<main>
    <div class="container-fluid">
        <h1 class="mt-4">Detalhes da Dívida</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
            <li class="breadcrumb-item active">detalhes da dívida</li>
        </ol>
        <div class="row">
            <div class="col-md-12">
                <div class="card-header w-100">
                    <div class="row">

                        <?php foreach ($cli as $dado) :?>
                        <div class="col-md-4">
                            <p><b>Nome:</b> <?=$dado->nome_cliente;?></p>
                            <p><b>E-mail:</b> <?=$dado->email_cliente;?></p>
                            <p><b>Telefone:</b> <?=$dado->telefone_cliente;?></p>
                            <p><b>CEP:</b> <?=$dado->cep_cliente;?></p>
                        </div>
                        <div class="col-md-4">
                            <p><b>CPF:</b> <?=$dado->cpf_cliente;?></p>
                            <p><b>CNPJ:</b> <?=$dado->cnpj_cliente;?></p>
                            <?php
                                $data = explode('-', $dado->dataNasc_cliente);
                                $data = $data[2]."/".$data[1]."/".$data[0];
                            ?>
                            <p><b>Data Nascimento:</b> <?=$data;?> </p>
                            <p><b>Endereço:</b> <?=$dado->endereco_cliente .", ". $dado->numero_cliente ." - ".$dado->cidade_cliente.", ".$dado->estado_cliente;?></p>
                        </div>
                        <?php endforeach;?>
                        <?php foreach ($dividas as $divida) :
                            $total += $divida->valor_divida;
                        endforeach;?>

                            <div class="col-md-4 text-center">
                                <h1 class="pt-4" style="font-size:50px;"><b>R$ <?=number_format($total, 2)?></b></h1>
                                <span>Total da dívida</span>  
                            </div>
                        
                    </div>
                    
                </div> 
            </div>
        </div>

        <?php foreach ($dividas as $divida) :?>
        <div class="row card-header mt-4">
            <div class=" col-md-6">
                <p class="mb-0" ><?=$divida->descricao_divida;?></p>
            </div>
            <div class=" col-md-4">
                <?php
                    $data = explode('-', $divida->vencimento_divida);
                    $data = $data[2]."/".$data[1]."/".$data[0];
                ?>

                <p class="mb-0" ><b>Vencimento: <?=$data?></b> </p>
            </div>
            <div class="col-md-2">
            <span class="text-right">
                <b>R$ <?= number_format($divida->valor_divida, 2);?></b> 
                <form action="editar-divida.php" method="POST">
                    <input type="hidden" name="id_divida" value="<?=$divida->id_divida;?>">
                    <input type="hidden" name="cpf_cliente" value="<?=$dado->cpf_cliente;?>">
                    <button class="btn btn-warning">Editar</button>
                </form>
                <form action="Controllers/DeletarDividaController.php" method="POST" onsubmit="return confirm('Deseja realmente excluir essa Pendência?');">
                    <input type="hidden" name="id_divida" value="<?=$divida->id_divida;?>">
                    <button class="btn btn-danger" >Deletar</button>
                </form>               
            </span>
            </div>
        </div>
        <?php endforeach; ?>
       
        
    </div>
</main>


<?php require "includes/footer.php"; ?>