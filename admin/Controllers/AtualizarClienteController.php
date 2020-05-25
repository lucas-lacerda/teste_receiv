<?php

require "../../vendor/autoload.php";

use App\Models\Cliente;

$cliente = new Cliente();

$cliente->setId($_POST['id']);
$cliente->setNome($_POST['nome']);
$cliente->setEmail($_POST['email']);
$cliente->setDataNasc($_POST['data_nascimento']);
$cliente->setTelefone($_POST['telefone']);
$cliente->setTipo($_POST['tipo']);
$cliente->setCPF($_POST['cpf']);
$cliente->setCNPJ($_POST['cnpj']);
$cliente->setCEP($_POST['cep']);
$cliente->setEndereco($_POST['endereco']);
$cliente->setNumero($_POST['numero']);
$cliente->setComplemento($_POST['complemento']);
$cliente->setCidade($_POST['cidade']);
$cliente->setEstado($_POST['estado']);

$cliente->atualizar(
    $cliente->getId(),$cliente->getNome(),$cliente->getEmail(),$cliente->getDataNasc(),$cliente->getTelefone(),$cliente->getTipo(),$cliente->getCPF(),$cliente->getCNPJ(),$cliente->getCEP(),$cliente->getEndereco(),$cliente->getNumero(),$cliente->getComplemento(),$cliente->getCidade(),$cliente->getEstado()
);

