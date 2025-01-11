<?php

require_once 'src/models/Cliente.php';

class HomeController {
    private $homeModel;

    public function __construct($db) {
        // Conectar ao banco de dados e criar instância do modelo
        $this->homeModel = new Cliente($db);
    }

    // Método para listar clientes
    public function index() {
        include(__DIR__ . '/../views/home/home.php'); // Passa os dados para a view
    }

   
}
