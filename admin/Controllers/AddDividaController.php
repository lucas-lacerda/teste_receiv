<?php

require "../../vendor/autoload.php";

use App\Models\Divida;

$divida = new Divida();

date_default_timezone_set('America/Sao_Paulo');
$data_hora = date("Y-m-d H:i:s");

$divida->setDescricao($_POST['titulo_div']);
$divida->setValor($_POST['valor_div']);
$divida->setVenc($_POST['vecimento_div']);
$divida->setIdCliente($_POST['id_cliente']);
$divida->setUpdated( $data_hora );

$divida->inserir(
    $divida->getDescricao(),
    $divida->getValor(),
    $divida->getVenc(),
    $divida->getIdCliente(),
    $divida->getUpdated()
);