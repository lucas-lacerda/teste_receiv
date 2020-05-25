<?php

require "../../vendor/autoload.php";

use App\Models\Cliente;

$cliente = new Cliente();
$cliente->setId($_POST['id_cliente']);
$cliente->deletar( $cliente->getId() );


