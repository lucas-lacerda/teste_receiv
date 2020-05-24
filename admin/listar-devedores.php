<?php 

require "includes/header.php"; 
require "includes/sidebar.php"; 
?>
        
<main>
    <div class="container-fluid">
        <h1 class="mt-4">Todos os Devedores</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
            <li class="breadcrumb-item active">Todos os Devedores</li>
        </ol>
        <div class="card mb-4">
            <!-- <div class="card-header"><a class="btn btn-primary" href="add-divida.php">Adicionar nova divida</a></div> -->
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
                            <tr>
                                <td>01</td>
                                <td>Tiger Nixon</td>
                                <td>System Architect</td>
                                <td>79865461</td>
                                <td><a href="detalhes-divida.php" class="btn btn-warning">Visualizar</a></td>
                                <td><a href="add-divida.php" class="btn btn-dark">Add Pendência</a></td>
                            </tr>
                            <tr>
                                <td>01</td>
                                <td>Garrett Winters</td>
                                <td>Accountant</td>
                                <td>12345678</td>
                                <td><a href="detalhes-divida.php" class="btn btn-warning">Visualizar</a></td>
                                <td><a href="add-divida.php" class="btn btn-dark">Add Pendência</a></td>
                            </tr>                                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>


<?php require "includes/footer.php"; ?>