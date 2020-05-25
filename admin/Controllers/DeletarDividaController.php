<?php

require "../../vendor/autoload.php";

use App\Models\Divida;

$divida = new Divida();
$divida->setIdCliente($_POST['id_divida']);
$divida->deletar( $divida->getIdCliente() );


