<?php 

require "includes/header.php"; 
require "includes/sidebar.php"; 
?>
        
<main>
    <div class="container-fluid">
        <h1 class="mt-4">Detalhes da Dívida</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
            <li class="breadcrumb-item active">detalhes da dívida</li>
        </ol>
        <div class="row">
            <div class="col-md-12">

                <div class="card-header w-100">
                    <div class="row">

                        <div class="col-md-4">
                            <p><b>Nome:</b> Lucas Carlos Lacerda</p>
                            <p><b>E-mail:</b> Lacerda@gmail.com</p>
                            <p><b>Telefone:</b> 47498595</p>
                            <p><b>CEP:</b> 08692-090</p>
                        </div>
                        <div class="col-md-4">
                            <p><b>CPF:</b> 1234656789</p>
                            <p><b>CNPJ:</b> 123456789</p>
                            <p><b>data Nascimento:</b> 22/03/1996 </p>
                            <p><b>Endereço:</b> Rua Avelino Teixeira, 25 - Suzano</p>
                        </div>
                        <div class="col-md-4 text-center">
                            <h1 class="pt-4" style="font-size:50px;"><b>R$ 50,90</b></h1>
                            <span>Total da dívida</span>  
                        </div>
                    </div>
                    
                </div> 
            </div>
        </div>
        <div class="row card-header mt-4">
            <div class=" col-md-6">
                <p class="mb-0" >Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolore </p>
            </div>
            <div class=" col-md-4">
                <p class="mb-0" ><b>Vencimento: 10/10/2020</b> </p>
            </div>
            <div class="col-md-2">
            <span class="text-right"><b>R$ 10.90</b> </span>
            </div>
        </div>
       
        
    </div>
</main>


<?php require "includes/footer.php"; ?>