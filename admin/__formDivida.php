<div class="form-group">                    
    <div class="row form-group">
        <div class="col-md-6">
            <label for="">CPF / CNPJ</label>
            <input class="form-control" type="text" name="cpf_cnpj" value="<?=$_POST['cpf_cliente']?>" disabled>
        </div>
        <div class="col-md-6">
            <label for="">Titulo</label>
            <input class="form-control" type="text" name="titulo_div" placeholder="Digite o Nome" 
            value="<?= (isset($dados->descricao_divida)) ? $dados->descricao_divida : '' ?>" >
        </div>
    </div>
    <div class="row form-group">
        <div class="col-md-6">
            <label for="">Valor</label>
            <input class="form-control" type="text" id="valor_div" name="valor_div" placeholder="Digite o valor da Dívida" value="<?= (isset($dados->valor_divida)) ? number_format($dados->valor_divida, 2) : '' ?>">
        </div>

        <div class="col-md-6">
            <label for="">Data de Vencimento</label>
            <input class="form-control" type="text" id="data_venc" name="vecimento_div" placeholder="Digite a data de vencimento" value="<?= (isset($dados->vencimento_divida)) ? $dataFormat : '' ?>">
        </div>                            
    </div>