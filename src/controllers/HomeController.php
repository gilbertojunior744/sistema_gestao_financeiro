<?php

require_once 'src/models/Cliente.php';

class HomeController {
    private $homeModel;

    public function __construct($db) {
        $this->homeModel = new Cliente($db);
    }

    public function index() {
        include(__DIR__ . '/../views/home/home.php'); 
    }

   
}
