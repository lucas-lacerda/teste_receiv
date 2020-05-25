<?php

require '../../vendor/autoload.php';
use App\Models\Logar;

$logar = new Logar;
$logar->setEmail($_POST['email']);
$logar->setSenha($_POST['senha']);
$logar->logar($logar->getEmail(), $_POST['senha']);