<?php
// /public/index.php

require_once 'config/Database.php';
require_once 'src/controllers/ClienteController.php';

$db = new Database();
$clienteController = new ClienteController($db->connect());

// Roteamento
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['nome'])) {
    $clienteController->cadastrarPost();
} else {
    // $clienteController->cadastrar();
}