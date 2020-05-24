<?php 

require "includes/header.php"; 
require "includes/sidebar.php"; 
?>
        
<main>
    <div class="container-fluid">
        <h1 class="mt-4">Adicionar Novo Cliente</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
            <li class="breadcrumb-item active">Novo cliente</li>
        </ol>
        <div class="row">
            <form action="" method="post" class="w-100" autocomplete="off">
                <div class="container">
                    <div class="form-group">                    
                        <div class="row form-group">
                            <div class="col-md-6">
                                <label for="">Nome</label>
                                <input class="form-control" type="text" name="nome" placeholder="Digite o Nome">
                            </div>
                            <div class="col-md-6">
                                <label for="">E-mail</label>
                                <input class="form-control" type="email" name="Email" placeholder="Digite o E-mail">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-4">
                                <label for="">Data de Nascimento</label>
                                <input class="form-control" type="text" name="data_nascimento" placeholder="Digite a data de Nascimento">
                            </div>

                            <div class="col-md-4">
                                <label for="">Telefone</label>
                                <input class="form-control" type="text" name="telefone" placeholder="Digite o Telefone">
                            </div>

                            <div class="col-md-4">
                                <label for="">Tipo de Pessoa</label> <br>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="tipo" id="inlineRadio1" value="cpf">
                                    <label class="form-check-label" for="inlineRadio1">Física</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="tipo" id="inlineRadio2" value="cnpj">
                                    <label class="form-check-label" for="inlineRadio2">Jurídica</label>
                                </div>
                            </div>
                            
                        </div>
                        <div class="row form-group">
                            <div class="col-md-6">
                                <label for="">CPF</label>
                                <input class="form-control" type="text" name="cpf" placeholder="Digite o CPF">
                            </div>
                            <div class="col-md-6">
                                <label for="">CNPJ</label>
                                <input class="form-control" type="text" name="cnpj" placeholder="Digite o CNPJ">
                            </div>
                        </div>
                        <br>
                        <hr>
                        <br>
                        <div class="row form-group">
                            <div class="col-md-4">
                                <label for="">CEP</label>
                                <input class="form-control" type="text" name="cep" id="cep" placeholder="Digite o CEP">
                            </div>
                            <div class="col-md-6">
                                <label for="">Endereço</label>
                                <input class="form-control" type="text" id="endereco" name="endereco" placeholder="Endereço">
                            </div>
                            <div class="col-md-2">
                                <label for="">Número</label>
                                <input class="form-control" type="text" id="numero" name="numero" placeholder="Número">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-4">
                                <label for="">Complemento</label>
                                <input class="form-control" type="text" name="complemento" placeholder="Complemento">
                            </div>
                            <div class="col-md-4">
                                <label for="">Cidade</label>
                                <input class="form-control" type="text" id="cidade" name="cidade" placeholder="Digite o CEP">
                            </div>
                            <div class="col-md-4">
                                <label for="">Estado</label>
                                <input class="form-control" type="text" id="estado" name="estado" placeholder="Endereço">
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