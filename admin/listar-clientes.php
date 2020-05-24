<?php 

require "includes/header.php"; 
require "includes/sidebar.php"; 
?>
        
<main>
    <div class="container-fluid">
        <h1 class="mt-4">Todos os clientes</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
            <li class="breadcrumb-item active">Todos os clientes</li>
        </ol>
        <div class="card mb-4">
            <div class="card-header"><a class="btn btn-primary" href="add-cliente.php">Adicionar novo cliente</a></div>
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

                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>#ID</th>
                                <th>Nome</th>
                                <th>E-mail</th>
                                <th>CPF/CNPJ</th>
                                <th>Editar</th>

                            </tr>
                        </tfoot>
                        <tbody>
                            <tr>
                                <td>01</td>
                                <td>Tiger Nixon</td>
                                <td>System Architect</td>
                                <td>Edinburgh</td>
                                <td><a href="#!" class="btn btn-warning">Editar</a></td>
                            </tr>
                            <tr>
                                <td>01</td>
                                <td>Garrett Winters</td>
                                <td>Accountant</td>
                                <td>Tokyo</td>
                                <td><a href="#!" class="btn btn-warning">Editar</a></td>
                            </tr>                                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>


<?php require "includes/footer.php"; ?>