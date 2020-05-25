                 
    <div class="row form-group">
        <div class="col-md-6">
            <label for="">Nome</label>
            <input class="form-control" type="text" name="nome" placeholder="Digite o Nome" 
            value="<?= (isset($dados->nome_cliente)) ? $dados->nome_cliente : '' ?>">
        </div>
        <div class="col-md-6">
            <label for="">E-mail</label>
            <input class="form-control" type="email" name="email" placeholder="Digite o E-mail"
            value="<?= (isset($dados->email_cliente)) ? $dados->email_cliente : '' ?>">
        </div>
    </div>
    <div class="row form-group">
        <div class="col-md-4">
            <label for="">Data de Nascimento</label>
            <input class="form-control" type="text" name="data_nascimento" placeholder="Digite a data de Nascimento" value="<?= (isset($dados->dataNasc_cliente)) ? $dados->dataNasc_cliente : '' ?>">
        </div>

        <div class="col-md-4">
            <label for="">Telefone</label>
            <input class="form-control" type="text" name="telefone" placeholder="Digite o Telefone"
            value="<?= (isset($dados->telefone_cliente)) ? $dados->telefone_cliente : '' ?>">
        </div>

        <div class="col-md-4">
            <label for="">Tipo de Pessoa</label> <br>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="tipo" id="inlineRadio1" value="cpf" 
                <?=(isset($dados->tipo_cliente)) && $dados->tipo_cliente == 'cpf' ? 'checked' : '' ?>
                >
                <label class="form-check-label" for="inlineRadio1">Física</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="tipo" id="inlineRadio2" value="cnpj"
                <?=(isset($dados->tipo_cliente)) && $dados->tipo_cliente == 'cnpj' ? 'checked' : '' ?>>
                <label class="form-check-label" for="inlineRadio2">Jurídica</label>
            </div>
        </div>
        
    </div>
    <div class="row form-group">
        <div class="col-md-6">
            <label for="">CPF</label>
            <input class="form-control" type="text" name="cpf" placeholder="Digite o CPF" 
            value="<?= (isset($dados->cpf_cliente)) ? $dados->cpf_cliente : '' ?>">
        </div>
        <div class="col-md-6">
            <label for="">CNPJ</label>
            <input class="form-control" type="text" name="cnpj" placeholder="Digite o CNPJ" 
            value="<?= (isset($dados->cnpj_cliente)) ? $dados->cnpj_cliente : '' ?>">
        </div>
    </div>
    <br>
    <hr>
    <br>
    <div class="row form-group">
        <div class="col-md-4">
            <label for="">CEP</label>
            <input class="form-control" type="text" name="cep" id="cep" placeholder="Digite o CEP"
            value="<?= (isset($dados->cep_cliente)) ? $dados->cep_cliente : '' ?>">
        </div>
        <div class="col-md-6">
            <label for="">Endereço</label>
            <input class="form-control" type="text" id="endereco" name="endereco" placeholder="Endereço" 
            value="<?= (isset($dados->endereco_cliente)) ? $dados->endereco_cliente : '' ?>">
        </div>
        <div class="col-md-2">
            <label for="">Número</label>
            <input class="form-control" type="text" id="numero" name="numero" placeholder="Número"
            value="<?= (isset($dados->numero_cliente)) ? $dados->numero_cliente : '' ?>">
        </div>
    </div>
    <div class="row form-group">
        <div class="col-md-4">
            <label for="">Complemento</label>
            <input class="form-control" type="text" name="complemento" placeholder="Complemento" 
            value="<?= (isset($dados->complemento_cliente)) ? $dados->complemento_cliente : '' ?>">
        </div>
        <div class="col-md-4">
            <label for="">Cidade</label>
            <input class="form-control" type="text" id="cidade" name="cidade" placeholder="Cidade"
            value="<?= (isset($dados->cidade_cliente)) ? $dados->cidade_cliente : '' ?>">
        </div>
        <div class="col-md-4">
            <label for="">Estado</label>
            <input class="form-control" type="text" id="estado" name="estado" placeholder="Estado"
            value="<?= (isset($dados->estado_cliente)) ? $dados->estado_cliente : '' ?>">
        </div>
        
    </div>