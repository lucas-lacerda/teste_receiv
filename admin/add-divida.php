<?php 

require "includes/header.php"; 
require "includes/sidebar.php"; 
?>
        
<main>
    <div class="container-fluid">
        <h1 class="mt-4">Adicionar Nova Dívida</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
            <li class="breadcrumb-item active">Nova dívida</li>
        </ol>
        <div class="row">
            <form action="" method="post" class="w-100" autocomplete="off">
                <div class="container">
                    <div class="form-group">                    
                        <div class="row form-group">
                            <div class="col-md-6">
                                <label for="">CPF / CNPJ</label>
                                <input class="form-control" type="text" name="cpf_cnpj" value="52.194.097-7" disabled>
                            </div>
                            <div class="col-md-6">
                                <label for="">Titulo</label>
                                <input class="form-control" type="text" name="titulo_div" placeholder="Digite o Nome">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-6">
                                <label for="">Valor</label>
                                <input class="form-control" type="text" name="valor_div" placeholder="Digite o valor da Dívida">
                            </div>

                            <div class="col-md-6">
                                <label for="">Data de Vencimento</label>
                                <input class="form-control" type="text" name="telefone" placeholder="Digite a data de vencimento">
                            </div>                            
                        </div>

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