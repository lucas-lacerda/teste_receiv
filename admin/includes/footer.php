<footer class="py-4 bg-light mt-auto">
    <div class="container-fluid">
        <div class="d-flex align-items-center justify-content-between small">
            <div class="text-muted">Copyright &copy; Your Website 2019</div>
            <div>
                <a href="#">Privacy Policy</a>
                &middot;
                <a href="#">Terms &amp; Conditions</a>
            </div>
        </div>
    </div>
</footer>
</div>
</div>
        <script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="assets/js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/datatables-demo.js"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>

        <script>
            $(document).ready(function(){
                $('#data_nasc').mask('00/00/0000');
                $('#telefone').mask('(00) 00000-0000');
                $('#cpf').mask('000.000.000-00', {reverse: true});
                $('#cnpj').mask('00.000.000/0000-00', {reverse: true});
                $('#data_venc').mask('00/00/0000');
                $('#valor_div').mask("#.##0,00", {reverse: true});


                function limpa_formulário_cep() {
                    // Limpa valores do formulário de cep.
                    $("#endereco").val("");
                    $("#bairro").val("");
                    $("#cidade").val("");
                    $("#uf").val("");
                    $("#ibge").val("");
                }
            
                //Quando o campo cep perde o foco.
                $("#cep").blur(function() {

                    //Nova variável "cep" somente com dígitos.
                    var cep = $(this).val().replace(/\D/g, '');

                    //Verifica se campo cep possui valor informado.
                    if (cep != "") {

                        //Expressão regular para validar o CEP.
                        var validacep = /^[0-9]{8}$/;

                        //Valida o formato do CEP.
                        if(validacep.test(cep)) {

                            //Preenche os campos com "..." enquanto consulta webservice.
                            $("#endereco").val("...");
                            $("#bairro").val("...");
                            $("#cidade").val("...");
                            $("#uf").val("...");
                            $("#ibge").val("...");

                            //Consulta o webservice viacep.com.br/
                            $.getJSON("https://viacep.com.br/ws/"+ cep +"/json/?callback=?", function(dados) {

                                if (!("erro" in dados)) {
                                    //Atualiza os campos com os valores da consulta.
                                    $("#endereco").val(dados.logradouro);
                                    $("#bairro").val(dados.bairro);
                                    $("#cidade").val(dados.localidade);
                                    $("#uf").val(dados.uf);
                                    $("#ibge").val(dados.ibge);
                                } //end if.
                                else {
                                    //CEP pesquisado não foi encontrado.
                                    limpa_formulário_cep();
                                    alert("CEP não encontrado.");
                                }
                            });
                        } //end if.
                        else {
                            //cep é inválido.
                            limpa_formulário_cep();
                            alert("Formato de CEP inválido.");
                        }
                    } //end if.
                    else {
                        //cep sem valor, limpa formulário.
                        limpa_formulário_cep();
                    }
                });




                // $('.time').mask('00:00:00');
                // $('.date_time').mask('00/00/0000 00:00:00');
                // $('.cep').mask('00000-000');
                // $('.phone').mask('0000-0000');
                
                // $('.phone_us').mask('(000) 000-0000');
                // $('.mixed').mask('AAA 000-S0S');
                
                // $('.money').mask('000.000.000.000.000,00', {reverse: true});
                // $('.money2').mask("#.##0,00", {reverse: true});
                // $('.ip_address').mask('0ZZ.0ZZ.0ZZ.0ZZ', {
                //     translation: {
                //     'Z': {
                //         pattern: /[0-9]/, optional: true
                //     }
                //     }
                // });
                // $('.ip_address').mask('099.099.099.099');
                // $('.percent').mask('##0,00%', {reverse: true});
                // $('.clear-if-not-match').mask("00/00/0000", {clearIfNotMatch: true});
                // $('.placeholder').mask("00/00/0000", {placeholder: "__/__/____"});
                // $('.fallback').mask("00r00r0000", {
                //     translation: {
                //         'r': {
                //         pattern: /[\/]/,
                //         fallback: '/'
                //         },
                //         placeholder: "__/__/____"
                //     }
                //     });
                // $('.selectonfocus').mask("00/00/0000", {selectOnFocus: true});
                });
        </script>

    </body>
</html>
